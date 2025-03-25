<?php
namespace App\Components;

use TypeRocket\Template\Component;

class LibraryComponent extends Component
{
    protected $title = 'Library Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading');
        echo $form->text('Link');
        echo $form->image('Image');

        $cate_product = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false, // true để ẩn danh mục không có sản phẩm
            'parent'     => 0,
        ) );

        $options = []; 
        foreach($cate_product as $v){
            $options[$v->name] = $v->term_id;
            $child_cats = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'parent'     => $v->term_id, // Lấy danh mục con
            ));

            if (!empty($child_cats)) {
                foreach($child_cats as $ch) {
                    $options['Danh mục con của' . $v->name][$ch->name] = $ch->term_id;
                }
            }
        }

        echo $form->select('Category product')->setOptions($options)->multiple();

    }

    /**
     * Render
     *
     * @var array $data component fields
     * @var array $info name, item_id, model, first_item, last_item, component_id, hash
     */
    public function render(array $data, array $info)
    {
        ?>
            <section class="section box-library">
                <div class="container tab_wrap">
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-3 tab-title-library">
                            <div class="d-flex gap-5 title-library">
                                <?php if(!empty($data['heading'])) { ?>
                                    <h2 class="fs-24 library d-flex m-0 text-uppercase">
                                        <?php if(!empty($data['image'])) {
                                            $image = wp_get_attachment_url($data['image']);
                                            ?>
                                            <img src="<?php echo esc_url($image); ?>" width="28px" height="25px" alt="ảnh">
                                        <?php } ?>
                                        <?php echo $data['heading']; ?>
                                    </h2>
                                <?php } ?>
                                <div class="mobile-library d-none justify-content-between px-2 py-2">
                                    <?php if(!empty($data['heading'])) { ?>
                                        <h2 class="fs-18 text-uppercase">
                                            <?php if(!empty($data['image'])) {
                                                $image = wp_get_attachment_url($data['image']);
                                                ?>
                                                <img src="<?php echo esc_url($image); ?>" width="28px" height="25px" alt="ảnh">
                                            <?php } ?>
                                            <?php echo $data['heading']; ?>
                                        </h2>
                                    <?php } ?>
                                    <li class="see-more fw-700">
                                        <a class="text-black fw-700" href="<?php echo $data['link']; ?>">XEM THÊM</a>
                                    </li>
                                </div>
                                <?php if(count($data['category_product']) > 0 ) { ?>
                                    <div class="nav nav-tabs tab-title align-items-center d-flex fs-16" id="productTabs">
                                        <?php $i = 0; foreach($data['category_product'] as $v) { 
                                            $i++;
                                            $category = get_term($v, 'product_cat');
                                            ?>
                                            
                                            <span class="nav-link fw-700 text-black tab_button text-uppercase cursor-pointer <?php echo $i == 1 ? 'active' : ''; ?>" data-tab-target="#library-<?php echo $i; ?>">
                                                <?php echo $category->name; ?>
                                            </span>
                                            
                                        <?php } wp_reset_postdata(); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <li class="see-more see-more-desk fw-700">
                                <a href="<?php echo $data['link']; ?>" class="text-black fw-700">
                                    XEM THÊM
                                </a>
                            </li>
                        </div>
                        <?php if(count($data['category_product']) > 0 ) { ?>
                            <div class="tab-content">
                                <?php $i = 0; foreach($data['category_product'] as $v) { 
                                    $i++; 

                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => 8, // Giới hạn số sản phẩm
                                        'orderby'        => array(
                                            'meta_value_num' => 'DESC', // Sắp xếp theo đơn mua
                                            'date'           => 'DESC', // Nếu bằng nhau, ưu tiên sản phẩm mới hơn
                                        ),
                                        'meta_key'       => 'total_sales', // Chỉ áp dụng cho meta_value_num
                                        'meta_query'     => array(
                                            array(
                                                'key'     => 'total_sales', 
                                                'type'    => 'NUMERIC', 
                                                'compare' => 'EXISTS'
                                            ),
                                        ),
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'term_id',
                                                'terms'    => $v,
                                            ),
                                        ),
                                    );
                                    
                                    $products = get_posts($args);

                                    ?>
                                    <div id="library-<?php echo $i; ?>" class="tab-pane fade <?php echo $i == 1 ? 'show active' : ''; ?>">
                                        <?php if (!empty($products)) { ?>
                                            <div class="row product-list-right d-grid">
                                                <?php foreach ($products as $post) {
                                                    $featured_image = get_the_post_thumbnail_url($post->ID);
                                                    $gallery_images = get_post_meta($post->ID, '_product_image_gallery', true); // Album ảnh
                                                    ?> 
                                                    <div class="product-item-right pb-4">
                                                        <a href="<?php echo get_permalink($post->ID); ?>" class="product-item-right-img img-100">
                                                            <?php if (!empty($featured_image)) { ?>
                                                                <img src="<?php echo esc_url($featured_image); ?>" alt="Ảnh đại diện">
                                                            <?php } ?>
                                                            <?php if (!empty($gallery_images)) { 
                                                                $gallery_ids = explode(',', $gallery_images);
                                                                $image_url = wp_get_attachment_image_url($gallery_ids[0]); // Lấy ảnh từ ID
                                                                if ($image_url) {
                                                                ?>
                                                                <img src="<?php echo esc_url($image_url); ?>" alt="Ảnh thứ 2" class="hover-img">
                                                            <?php } } ?>
                                                        </a>
                                                        <div class="product-item-right-content text-center">
                                                            <a href="<?php echo get_permalink($post->ID); ?>" class="d-block fs-14 fw-700">
                                                                <?php echo $post->post_title; ?>
                                                            </a>
                                                            <div>
                                                                <img src="<?= get_template_directory_uri(); ?>/images/rating.png" alt="" class="img-rating">
                                                            </div>
                                                            <button class="btn btn-outline-secondary btn-best-seller bg-white ">Giá chỉ từ <span
                                                                    class="text-danger">2.160.000đ</span>/10 Hộp</button>
                                                        </div>
                                                    </div>
                                                <?php } wp_reset_postdata(); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } wp_reset_postdata();?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php
    }
}