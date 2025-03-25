<?php
namespace App\Components;

use TypeRocket\Template\Component;

class FeaturedProductComponent extends Component
{
    protected $title = 'FeaturedProduct Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading');
        echo $form->text('Link');
        echo $form->gallery('Image');

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

        echo $form->select('Category product')->setOptions($options);

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
            <section class="section box-product-hight">
                <div class="container">
                    <div class="justify-content-center">
                        <div class="col-12 container-product-hight">
                            <div class="product-hight-title pb-3 d-flex justify-content-between">
                                <?php if(!empty($data['heading'])) { ?>
                                    <h2 class="fs-24 m-0 text-uppercase"><?php echo $data['heading']; ?></h2>
                                <?php } ?>
                                <a href="<?php echo $data['link']; ?>" class="see-more fw-700 text-black">XEM THÊM</a>
                            </div>
                            <div class="row box-product-list-hight">
                                <div class="col-9 product-list-hight">
                                    <?php 
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
                                                    'terms'    => $data['category_product'],
                                                ),
                                            ),
                                        );
                                        
                                        $products = get_posts($args);
                                    ?>
                                    <div id="product-popular" class="tab-pane fade show active">
                                        <?php if (!empty($products)) { ?>
                                            <div class="row product-list-right d-flex">
                                                <?php foreach ($products as $post) {
                                                    $featured_image = get_the_post_thumbnail_url($post->ID);
                                                    $gallery_images = get_post_meta($post->ID, '_product_image_gallery', true); // Album ảnh
                                                    ?> 
                                                    <?php include 'product-item-home.php'; ?>
                                                <?php } wp_reset_postdata(); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-3 product-img">
                                    <?php if (!empty($data['image'])) { ?>
                                        <?php $i = 0; foreach($data['image'] as $id) { 
                                            $i++; 
                                            $image_url = wp_get_attachment_url($id);
                                            ?>
                                            <div class="img-100 pro-img-hight-right <?php echo $i > 1 ? 'pt-3': ''; ?>">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="product-best-seller">
                                            </div>
                                            <?php if($i == 2) break; ?>
                                        <?php } wp_reset_postdata(); ?>
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