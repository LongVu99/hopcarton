<?php
namespace App\Components;

use TypeRocket\Template\Component;

class BestSellerComponent extends Component
{
    protected $title = 'BestSeller Component';

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
            <section class="section box-product-best-seller">
                <div class="container tab_wrap">
                    <div class="justify-content-center">
                        <div class="col-12">
                            <div class="d-flex justify-content-between pb-3">
                                <div class="pro-tab-title d-flex align-items-center">
                                    <?php if(!empty($data['heading'])) { ?>
                                        <h2 class="fs-24 library m-0 text-uppercase"><?php echo $data['heading']; ?></h2>
                                    <?php } ?>
                                    <div class="mobile-library d-none justify-content-between px-2 py-2">
                                        <?php if(!empty($data['heading'])) { ?>
                                            <h2 class="fs-18"><?php echo $data['heading']; ?></h2>
                                        <?php } ?>
                                        <li class="see-more fw-700">
                                            <a class="text-black fw-700" href="<?php echo $data['link']; ?>">XEM THÊM</a>
                                        </li>
                                    </div>
                                    <?php if(count($data['category_product']) > 0 ) { ?>
                                        <div class="nav nav-tabs tab-title align-items-center fs-16 d-flex" id="productTabs">
                                            <?php $i = 0; foreach($data['category_product'] as $v) { 
                                                $i++;
                                                $category = get_term($v, 'product_cat');
                                                ?>
                                                
                                                <span class="nav-link fw-700 text-black tab_button text-uppercase cursor-pointer <?php echo $i == 1 ? 'active' : ''; ?>" data-tab-target="#best-seller-<?php echo $i; ?>">
                                                    <?php echo $category->name; ?>
                                                </span>
                                               
                                            <?php } wp_reset_postdata(); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <li class="see-more see-more-desk fw-700">
                                    <a class="fs-15 fw-700 text-black" href="<?php echo $data['link']; ?>">XEM THÊM</a>
                                </li>
                            </div>
                            <div id="product-best-diversity" class="row product-list-best-seller">
                                <div class="col-3 product-img">
                                    <?php if(!empty($data['image'])) {
                                        $image = wp_get_attachment_url($data['image']);
                                        ?>
                                        <div class="img-100 product-banner-left-img">
                                            <img src="<?php echo esc_url($image); ?>" alt="product-best-seller">
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-9 product-list-best">
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
                                                
                                                <div id="best-seller-<?php echo $i; ?>" class="tab-pane fade <?php echo $i == 1 ? 'show active' : ''; ?>">
                                                    <?php if (!empty($products)) { ?>
                                                        <div class="row product-list-right d-flex">
                                                            <?php foreach ($products as $post) {
                                                                $featured_image = get_the_post_thumbnail_url($post->ID);
                                                                $gallery_images = get_post_meta($post->ID, '_product_image_gallery', true); // Album ảnh
                                                                ?> 
                                                                
                                                                <?php include 'product-item-home.php'; ?>
                                                                
                                                            <?php } wp_reset_postdata(); ?>
                                                        </div>
                                                    <?php }  ?>
                                                </div> 
                                            <?php } wp_reset_postdata(); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
}