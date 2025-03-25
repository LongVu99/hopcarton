

<?php 
    // Menu 
    function register_my_menus() {
        register_nav_menus(
            array(
                'header-menu' => __('Menu Header'),
                'footer-menu' => __('Menu Footer'),
                'category-product-menu' => __('Product Category'),
                'menu-mobile' => __('Menu Mobile'),
            )
        );
    }
    add_action('init', 'register_my_menus');
    
    // Custom menu mobile 
    class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
        // Bắt đầu cấp <ul> (submenu)
        function start_lvl(&$output, $depth = 0, $args = null) {
            $menu_level_class = $depth == 0 ? 'menu-level2' : 'menu-level3';
            
            // Lấy tên của menu cha từ biến tạm `$GLOBALS['parent_menu_title']`
            $parent_title = isset($GLOBALS['parent_menu_title']) ? esc_html($GLOBALS['parent_menu_title']) : 'Quay lại';
    
            $output .= '<ul class="' . $menu_level_class . '">';
            
            // Thêm nút "Back" với tên menu cha
            $output .= '<li>';
            $output .= '<a href="javascript:;" class="back-menu-level' . ($depth + 1) . '">';
            $output .= '<img src="' . get_template_directory_uri() . '/images/chervon-right.svg" alt="Chervon">';
            $output .= $parent_title;
            $output .= '</a>';
            $output .= '</li>';
        }
    
        // Kết thúc cấp <ul>
        function end_lvl(&$output, $depth = 0, $args = null) {
            $output .= '</ul>';
        }
    
        // Bắt đầu mỗi <li>
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $classes = implode(' ', $item->classes);
            $has_children = !empty($args->walker->has_children); // Kiểm tra có submenu không
    
            $output .= '<li class="' . esc_attr($classes) . '">';
    
            // Thêm thẻ <a>
            $output .= '<a href="' . esc_url($item->url) . '" title="' . esc_attr($item->title) . '">' . esc_html($item->title) . '</a>';
    
            // Nếu có submenu, lưu tên menu cha vào `$GLOBALS['parent_menu_title']`
            if ($has_children) {
                $GLOBALS['parent_menu_title'] = $item->title; // Lưu tên cha để sử dụng trong `start_lvl()`
                
                // Thêm icon chuyển menu
                $output .= '<span class="next-menu-level' . ($depth + 1) . ' position-absolute top-50 end-0 translate-middle-y d-flex justify-content-center align-items-center cursor-pointer">';
                $output .= '<img src="' . get_template_directory_uri() . '/images/chervon-right.svg" alt="Chervon">';
                $output .= '</span>';
            }
        }
    
        // Kết thúc mỗi <li>
        function end_el(&$output, $item, $depth = 0, $args = null) {
            $output .= '</li>';
        }
    }

    // View news 
    function set_post_views($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        
        if ($count == '') {
            $count = 1;
            update_post_meta($postID, $count_key, $count);
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
    
    // Gọi hàm này mỗi khi bài viết được xem
    function track_post_views($post_id) {
        if (!is_single()) return;
        if (empty($post_id)) {
            global $post;
            $post_id = $post->ID;
        }
        set_post_views($post_id);
    }
    add_action('wp_head', 'track_post_views');

    // Thêm Meta Box vào trang chỉnh sửa sản phẩm
    function add_custom_product_editors() {
        add_meta_box(
            'custom_product_editors', 
            'Thông Tin Bổ Sung', 
            'render_custom_product_editors', 
            'product', 
            'normal', 
            'high'
        );
    }
    add_action('add_meta_boxes', 'add_custom_product_editors');

    // Hiển thị các Editor trong Meta Box
    function render_custom_product_editors($post) {
        $editor_1 = get_post_meta($post->ID, 'instructions', true);
        $editor_2 = get_post_meta($post->ID, 'promotional', true);
        $editor_3 = get_post_meta($post->ID, 'customer_support', true);
        $editor_4 = get_post_meta($post->ID, 'wholesale_price', true);

        wp_nonce_field('save_custom_product_editors', 'custom_product_editors_nonce');

        echo '<h4>Hướng dẫn sử dụng</h4>';
        wp_editor($editor_1, 'instructions', array('textarea_name' => 'instructions'));

        echo '<h4>Chương trình khuyến mại</h4>';
        wp_editor($editor_2, 'promotional', array('textarea_name' => 'promotional'));

        echo '<h4>Hỗ trợ khách hàng</h4>';
        wp_editor($editor_3, 'customer_support', array('textarea_name' => 'customer_support'));

        echo '<h4>Giá buôn/sỉ</h4>';
        wp_editor($editor_4, 'wholesale_price', array('textarea_name' => 'wholesale_price'));
    }

    // Lưu dữ liệu từ Meta Box khi nhấn "Cập nhật" sản phẩm
    function save_custom_product_editors($post_id) {
        if (!isset($_POST['custom_product_editors_nonce']) || 
            !wp_verify_nonce($_POST['custom_product_editors_nonce'], 'save_custom_product_editors')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['instructions'])) {
            update_post_meta($post_id, 'instructions', $_POST['instructions']);
        }
        if (isset($_POST['promotional'])) {
            update_post_meta($post_id, 'promotional', $_POST['promotional']);
        }
        if (isset($_POST['customer_support'])) {
            update_post_meta($post_id, 'customer_support', $_POST['customer_support']);
        }
        if (isset($_POST['wholesale_price'])) {
            update_post_meta($post_id, 'wholesale_price', $_POST['wholesale_price']);
        }
    }
    add_action('save_post', 'save_custom_product_editors');


    // Form đánh giá 
    // Shortcode đánh giá 
    function custom_product_review_form() {
        if (!is_product()) return;
    
        global $product;
        $product_id = $product->get_id();
    
        ob_start();
        ?>
        <form id="custom-review-form">
            <div class="star-ratingg">
                <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
            </div>
            <div class="row">
                <div class="col-sm-4 mt-2">
                    <div><?php _e('Full name','hupuna'); ?></div>
                    <input type="text" id="reviewer-name" required class="fs-16 w-100 px-3">
                </div>
                <div class="col-sm-4 mt-2">
                    <div><?php _e('Phone number','hupuna'); ?></div>
                    <input type="text" id="reviewer-phone" required class="fs-16 w-100 px-3">
                </div>
                <div class="col-sm-4 mt-2">
                    <div><?php _e('Email','hupuna'); ?></div>
                    <input type="email" id="reviewer-email" required class="fs-16 w-100 px-3">
                </div>
                <div class="col-12 mt-2">
                    <div><?php _e('Evaluation content','hupuna'); ?></div>
                    <textarea id="review-content" required class="fs-16 w-100 p-3"></textarea>
                </div>
            </div>
    
            <input type="hidden" id="product-id" value="<?php echo $product_id; ?>">
            <button type="submit" class="fs-16 text-white cursor-pointer border-0">
                <?php _e('Send', 'hupuna'); ?>
            </button>
        </form>
    
        <script>
            function validatePhone(phone) {
                var re = /((09|03|07|08|05)+([0-9]{8})\b)/g;

                if (re.test(phone) == false || phone.length != 10) {
                    alert('Số điện thoại của bạn không đúng định dạng');
            
                    return false;
                }
            
                return true;
            }
            
            function validateEmail(email) {
                var re =
                    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;


                if (re.test(email) == false) {
                    alert('Email của bạn sai định dạng');
                    return false;
                }

                return true;
            }

            var is_sending = false;
            document.getElementById("custom-review-form").addEventListener("submit", function(event) {
                event.preventDefault();
                if(is_sending == true){
                    return false;
                }

                let name = document.getElementById("reviewer-name").value;
                let phone = document.getElementById("reviewer-phone").value;
                let email = document.getElementById("reviewer-email").value;
                let content = document.getElementById("review-content").value;
                let rating = document.querySelector('input[name="rating"]:checked');
                let productId = document.getElementById("product-id").value;
                
                if (!rating) {
                    alert("Vui lòng chọn số sao!");
                    return;
                }

                if (validatePhone(phone) == false) return false; 

                if (validateEmail(email) == false) return false; 
    
                let formData = new FormData();
                formData.append("action", "save_product_review");
                formData.append("product_id", productId);
                formData.append("name", name);
                formData.append("phone", phone);
                formData.append("email", email);
                formData.append("content", content);
                formData.append("rating", rating.value);
    
                is_sending = true;
                fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert("Cảm ơn bạn đã đánh giá!");
                    document.getElementById("custom-review-form").reset();
                    is_sending = false;
                });
            });
        </script>
    
        <style>
            .star-ratingg {
                direction: rtl;
                display: inline-flex;
                font-size: 30px;
            }
            .star-ratingg input {
                display: none;
            }
            .star-ratingg label {
                color: #a5a1a1;
                cursor: pointer;
            }
            .star-ratingg input:checked ~ label {
                color: gold;
            }

            #custom-review-form button{
                background-color: #295CF6;
                border-radius: 4px;
                padding: 10px 30px;
                min-width: 250px;
                margin-top: 10px;
            }

            #custom-review-form input{
                border: 1px solid #a5a1a1;
                border-radius: 4px;
                line-height: 32px;
            }

            #custom-review-form textarea {
                border-radius: 4px;
                border: 1px solid #a5a1a1;
            }

            .review-item .content{
                margin-top: 10px;
            }
        </style>
        <?php
        return ob_get_clean();
    }
    add_shortcode('custom_review_form', 'custom_product_review_form');
    
    // Save review 
    function save_product_review() {
        if (isset($_POST['product_id']) && isset($_POST['rating'])) {
            $product_id = intval($_POST['product_id']);
            $name = sanitize_text_field($_POST['name']);
            $phone = sanitize_text_field($_POST['phone']);
            $email = sanitize_email($_POST['email']);
            $content = sanitize_textarea_field($_POST['content']);
            $rating = intval($_POST['rating']);
    
            // Tạo bình luận WooCommerce
            $commentdata = array(
                'comment_post_ID' => $product_id,
                'comment_author' => $name,
                'comment_author_email' => $email,
                'comment_content' => $content,
                'comment_type' => 'review',
                'comment_approved' => 1,
            );
            $comment_id = wp_insert_comment($commentdata);
    
            if ($comment_id) {
                // Lưu số sao vào metadata của bình luận
                add_comment_meta($comment_id, 'rating', $rating, true);
            }
    
            // echo "Đánh giá đã được lưu!";
        }
        wp_die();
    }
    add_action('wp_ajax_save_product_review', 'save_product_review');
    add_action('wp_ajax_nopriv_save_product_review', 'save_product_review');

    // Get rating  
    function get_average_product_rating($product_id) {
        $comments = get_comments(array('post_id' => $product_id, 'status' => 'approve'));
        
        if (!$comments) return ['average' => 0, 'count' => 0];
    
        $total_stars = 0;
        $total_reviews = 0;
    
        foreach ($comments as $comment) {
            $rating = get_comment_meta($comment->comment_ID, 'rating', true);
            if ($rating) {
                $total_stars += intval($rating);
                $total_reviews++;
            }
        }
    
        if ($total_reviews > 0) {
            $average_rating = round($total_stars / $total_reviews, 1);
            return ['average' => $average_rating, 'count' => $total_reviews];
        }
    
        return ['average' => 0, 'count' => 0];
    }

    

    // Get review 
    function get_approved_reviews_for_product($product_id, $paged = 1, $per_page = 5) {
        $args = array(
            'post_id'   => $product_id,
            'status'    => 'approve',
            'type'      => 'review',
            'orderby'   => 'comment_date',
            'order'     => 'DESC',
            'number'    => $per_page,
            'offset'    => ($paged - 1) * $per_page,
        );
    
        $comments = get_comments($args);
        $total_comments = get_comments([
            'post_id' => $product_id,
            'status'  => 'approve',
            'type'    => 'review',
            'count'   => true,
        ]);
    
        if (empty($comments)) {
            return '<p class="mt-3">Chưa có đánh giá nào.</p>';
        }
    
        $output = '<div id="review-container" data-product-id="' . $product_id . '">';
    
        foreach ($comments as $comment) {
            $rating = get_comment_meta($comment->comment_ID, 'rating', true);
            $rating_stars = str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
            $output .= '
                <div class="review-item mt-4">
                    <div class="info-person d-flex gap-3">
                        <div>
                            <img src="' . get_template_directory_uri() . '/images/avt.jpg" alt="' . esc_html($comment->comment_author) .'" width="50" height="50" class="m-0">
                        </div>
                        <div>
                            <div class="fw-700">' . esc_html($comment->comment_author) .'</div>
                            <div class="text-warning fs-20">' . $rating_stars . '</div>
                            <div class="fs-14">' . esc_html(get_comment_date('d/m/Y', $comment)) . '</div>
                            <div class="content">
                                ' . esc_html($comment->comment_content) . '
                            </div>
                        
            ';
    
            // Lấy phản hồi của admin
            $replies = get_comments([
                'parent' => $comment->comment_ID,
                'status' => 'approve',
            ]);
    
            if (!empty($replies)) {
                foreach ($replies as $reply) {
                    $output .= '
                        <div class="admin-reply mt-3">
                            <div class="info-person d-flex gap-3">
                                <div>
                                    <img src="' . get_template_directory_uri() . '/images/avt.jpg" alt="Admin" width="40" height="40">
                                </div>
                                <div>
                                    <div class="fw-700">ADMIN</div>
                                    <div class="fs-14">' . esc_html(get_comment_date('d/m/Y', $reply)) . '</div>
                                    <div class="content">
                                        ' . esc_html($reply->comment_content) . '
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    ';
                }
            }
    
            $output .= '</div>
                    </div>
                </div>';
        }
    
        // Hiển thị phân trang
        $total_pages = ceil($total_comments / $per_page);
        if ($total_pages > 1) {
            $output .= '<div class="review-pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active_class = ($i == $paged) ? 'active' : '';
                $output .= '<a href="#" class="page-link ' . $active_class . '" data-page="' . $i . '">' . $i . '</a> ';
            }
            $output .= '</div>';
        } 
        
        $output .= '</div>';
        ?>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.addEventListener("click", function(event) {
                    if (event.target.classList.contains("page-link")) {
                        event.preventDefault();
                        let page = event.target.getAttribute("data-page");
                        let productId = document.querySelector("#review-container").getAttribute("data-product-id");

                        let formData = new FormData();
                        formData.append("action", "load_reviews");
                        formData.append("product_id", productId);
                        formData.append("page", page);

                        fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            let container = document.getElementById("review-container");
                            
                            // Xóa nội dung cũ trước khi cập nhật
                            container.innerHTML = "";
                            
                            // Cập nhật nội dung mới
                            container.innerHTML = data;

                             // Cập nhật class active cho trang hiện tại
                            document.querySelectorAll(".page-link").forEach(link => {
                                link.classList.remove("active"); // Xóa active cũ
                            });

                            document.querySelector('.page-link[data-page="' + page + '"]').classList.add("active"); // Thêm active vào trang mới
                        });
                    }
                });
            });
        </script>

        <style>
            .review-pagination {
                margin-top: 15px;
                text-align: center;
            }

            .review-pagination .page-link {
                display: inline-block;
                padding: 5px 12px;
                margin: 0 5px;
                background: #f5f5f5;
                color: #333;
                text-decoration: none;
                border-radius: 5px;
            }

            .review-pagination .page-link:hover,
            .review-pagination .page-link.active {
                background: #0073aa;
                color: white;
            }
        </style>
        <?php 
        return $output;
    }
    
    // Tạo shortcode cho đánh giá sản phẩm
    function show_reviews_shortcode($atts) {
        $atts = shortcode_atts([
            'id' => get_the_ID(),  // Nếu không truyền ID, mặc định lấy ID trang hiện tại
            'per_page' => 5, // Số đánh giá mỗi trang
        ], $atts);
    
        return get_approved_reviews_for_product($atts['id'], 1, $atts['per_page']);
    }
    
    add_shortcode('product_reviews', 'show_reviews_shortcode');

    function load_reviews_ajax() {
        if (isset($_POST['product_id']) && isset($_POST['page'])) {
            $product_id = intval($_POST['product_id']);
            $paged = intval($_POST['page']);
            echo get_approved_reviews_for_product($product_id, $paged, 5);
        }
        wp_die();
    }
    add_action('wp_ajax_load_reviews', 'load_reviews_ajax');
    add_action('wp_ajax_nopriv_load_reviews', 'load_reviews_ajax');


    // Buy now
    function custom_buy_now_button_shortcode($atts) {
        // Nhận tham số từ shortcode
        $atts = shortcode_atts(array(
            'id' => '',          // ID sản phẩm
        ), $atts, 'buy_now');
    
        // Nếu không có ID sản phẩm, không hiển thị nút
        if (empty($atts['id'])) return '';
    
        // Tạo URL thêm vào giỏ hàng với số lượng
        $buy_now_url = wc_get_cart_url();
    
        // HTML của nút "Mua ngay"
        ob_start();
        ?>
        <a href="javascript:;" title="<?php _e('Buy now','hupuna'); ?>" class="buy-now button-add fs-14 text-third-color text-uppercase fw-500"><?php _e('Buy now','hupuna'); ?></a>
        <script>
            var is_sending = false;
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".buy-now").addEventListener("click", function(e) {
                    e.preventDefault();
                    if(is_sending == true){
                        return false;
                    }
                    var id = <?php echo $atts['id'] ?>;
                    let qty = document.querySelector("input.input-prd-qty").value;
                    let formData = new FormData();
                    formData.append("add-to-cart", id);
                    formData.append("quantity", qty);

                    is_sending = true;
                    fetch("<?php echo esc_url(admin_url('admin-ajax.php')); ?>", {
                        method: "POST",
                        body: formData
                    }).then(response => response.json())
                    .then(data => {
                        is_sending = false;
                        window.location.href = "<?php echo $buy_now_url; ?>";
                    })

                    
                }); 
            });
        </script>
        <?php
        return ob_get_clean();
    }
    
    // Đăng ký shortcode
    add_shortcode('buy_now', 'custom_buy_now_button_shortcode');
     
    // Adđ to cart
    function custom_add_to_cart_button_shortcode($atts) {
        // Nhận tham số từ shortcode
        $atts = shortcode_atts(array(
            'id' => '',         // ID sản phẩm
        ), $atts, 'add_to_cart');
    
        // Nếu không có ID sản phẩm, không hiển thị nút
        if (empty($atts['id'])) return '';
    
        // HTML của nút "Thêm vào giỏ hàng"
        ob_start();
        ?>
        <a href="javascript:;" title="<?php _e('Add to cart','hupuna'); ?>" class="add-cart button-add fs-14 text-third-color text-uppercase fw-500"><?php _e('Add to cart','hupuna'); ?></a>
        <script>
            var is_sending = false;
            document.addEventListener("DOMContentLoaded", function() {
                
                document.querySelector(".add-cart").addEventListener("click", function(e) {
                    e.preventDefault();
                    if(is_sending == true){
                        return false;
                    }
                    var id = <?php echo $atts['id'] ?>;
                    let qty = document.querySelector("input.input-prd-qty").value;
                    let formData = new FormData();
                    // formData.append("action", "custom_ajax_add_to_cart");
                    formData.append("add-to-cart", id);
                    formData.append("quantity", qty);
                    
                    is_sending = true;
                    fetch("<?php echo esc_url(admin_url('admin-ajax.php')); ?>", {
                        method: "POST",
                        body: formData
                    }).then(response => response.json())
                    .then(data => {
                        
                        alert("Sản phẩm đã được thêm vào giỏ hàng!");
                        is_sending = false;
                    })
                  
                });
               
            });
        </script>
        <?php
        return ob_get_clean();
    }
    
    // Đăng ký shortcode
    add_shortcode('add_to_cart_custom', 'custom_add_to_cart_button_shortcode');


    add_action('wp_ajax_add_to_cart', 'custom_add_to_cart');
    add_action('wp_ajax_nopriv_add_to_cart', 'custom_add_to_cart');
    
    function custom_add_to_cart() {
        if (isset($_POST['product_id'])) {
            $product_id = intval($_POST['product_id']);
            $quantity = intval($_POST['quantity']);
            WC()->cart->add_to_cart($product_id, $quantity);
    
            wp_send_json_success(["message" => "Đã thêm vào giỏ hàng!"]);
        }
        wp_send_json_error(["message" => "Lỗi khi thêm vào giỏ hàng."]);
    }

    function enqueue_custom_scripts() {
        if (is_product()) {
            ?>
            <!-- <script>
                jQuery(document).ready(function ($) {
                    console.log(window.woocommerce_variation_data);
                    
                    let selectedAttributes = {};

                    $('.attribute-button').click(function (e) {
                        e.preventDefault();
                        console.log('click');
                        

                        let attributeName = $(this).data('attribute-name');
                        let attributeValue = $(this).data('attribute-value');
                        let attributeID = $(this).data('attribute-id');

                        $('.attribute-button').prop('disabled', true);
                        $('.attribute-button.variation_' + attributeID).prop('disabled', false);
                        
                        if (!$('.attribute-button.variation_' + attributeID).hasClass('selected')) {
                            $(this).siblings().prop('disabled', false);
                        } 
                        // Cập nhật giá trị thuộc tính đã chọn
                        selectedAttributes[attributeName] = attributeValue;
                        console.log(selectedAttributes);
                        
                        // Highlight button được chọn
                        $(this).siblings().removeClass('selected');
                        $(this).addClass('selected');

                        // Kiểm tra biến thể nào khớp với thuộc tính đã chọn
                        let variations = window.woocommerce_variation_data;
                        
                        for (let i = 0; i < variations.length; i++) {
                            let variation = variations[i];
                            let match = true;

                            for (let attr in selectedAttributes) {
                                
                                if (variation.attributes['attribute_' + attr] !== selectedAttributes[attr]) {
                                    match = false;
                                    break;
                                }
                            }

                            if (match) {
                                $('.woocommerce-Price-amount').text(variation.display_price + ' đ');
                                $('.single_add_to_cart_button').attr('data-variation-id', variation.variation_id);
                                break;
                            }
                        }
                    });
                });

            </script> -->
            <?php 
        }
    }
    add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
    
     

    function add_variation_data_to_js() {
        if (!is_product()) return;
        global $product;
    
        if ($product->is_type('variable')) {
            $variations = $product->get_available_variations();
            ?>
            <script>
                window.woocommerce_variation_data = <?php echo json_encode($variations); ?>;
            </script>
            <?php
        }
    }
    add_action('wp_footer', 'add_variation_data_to_js');
    
?>