<?php
namespace App\Components;

use TypeRocket\Template\Component;

class StoryComponent extends Component
{
    protected $title = 'Story Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading small');
        echo $form->text('Link');

        $cate_news = get_terms( array(
            'taxonomy'   => 'category',
            'hide_empty' => false, // true để ẩn danh mục không có sản phẩm
            'parent'     => 0,
        ) );

        $options = []; 
        foreach($cate_news as $v){
            $options[$v->name] = $v->term_id;
            $child_cats = get_terms(array(
                'taxonomy'   => 'category',
                'hide_empty' => false,
                'parent'     => $v->term_id, // Lấy danh mục con
            ));

            if (!empty($child_cats)) {
                foreach($child_cats as $ch) {
                    $options['Danh mục con của' . $v->name][$ch->name] = $ch->term_id;
                }
            }
        }

        echo $form->select('Category news')->setOptions($options);

    }

    /**
     * Render
     *
     * @var array $data component fields
     * @var array $info name, item_id, model, first_item, last_item, component_id, hash
     */
    public function render(array $data, array $info)
    {
        if(!empty($data['category_news'])) { 
        $category_news = get_term($data['category_news'], 'category');

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 9,
            'cat'            => $data['category_news'],
        );
        
        $list_news = get_posts($args);
        ?>
            <section class="section box-news">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="news-title text-center">
                                <?php if(!empty($data['heading_small'])) { ?>
                                    <p class="text-uppercase"><?php echo $data['heading_small']; ?></p>
                                <?php } ?>
                                <h2 class="fs-28 text-uppercase"><?php echo esc_html($category_news->name); ?></h2>
                                <div class="border-bottom bg-black"></div>
                            </div>
                            <?php if (!empty($list_news)) { ?>
                                <div class="news-content d-flex row">
                                    <div class="col-9">
                                        <div class="custom_slider d-flex w-100 news-content d-flex gap-3" data-slides-to-show="3"
                                            data-slides-to-scroll="1" data-slides-to-show-mobile="2">
                                            <?php $i = 0; foreach($list_news as $post) {
                                                $i++;
                                                $image = get_the_post_thumbnail_url($post->ID);
                                                ?>
                                                <div class="card col-4 overflow-hidden d-flex justify-content-between position-relative">
                                                    <div class="date text-white fs-14 position-absolute"><?php echo get_the_date('j F', $post->ID); ?></div>
                                                    <div class="zoom-img overflow-hidden">
                                                        <?php if (!empty($image)) { ?>
                                                            <a href="<?php echo get_permalink($post->ID); ?>">
                                                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo $post->post_title; ?>" class="object-fit-cover w-100 w-100">
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="actions d-flex align-items-center fs-14">
                                                        <span class="d-flex gap-1 align-items-center">
                                                            <i class="fa-regular fa-comment">
                                                                <img src="<?= get_template_directory_uri(); ?>/images/chat.png" alt="" width="15" height="15">
                                                            </i>
                                                            <?php echo $post->comment_count; ?>
                                                        </span>
                                                        <span class="d-flex gap-1 align-items-center">
                                                            <i class="fa-solid fa-eye">
                                                                <img src="<?= get_template_directory_uri(); ?>/images/eye.png" alt="">
                                                            </i>
                                                            <?php echo get_post_meta($post->ID, 'post_views_count', true) ?: '0'; ?>
                                                        </span>
                                                    </div>
                                                    <div class="content">
                                                        <a href="<?php echo get_permalink($post->ID); ?>" class="title text-black fs-14 fw-700 text-line-clamp-2">
                                                            <?php echo $post->post_title; ?>
                                                        </a>
                                                        <div class="description pt-2 pb-3">
                                                            <div class="text-line-clamp-2">
                                                                <?php echo get_the_excerpt($post->ID); ?>
                                                            </div>
                                                        </div>
                                                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn-new fw-600 d-block text-center fs-14 w-50">XEM CHI TIẾT</a>
                                                    </div>
                                                </div>
                                                <?php if($i == 6) break; ?>
                                            <?php } wp_reset_postdata(); ?>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <?php if(count($list_news) > 6) { ?>
                                            <div class="list-news overflow-hidden col-4">
                                                <div class="list-content-news d-flex justify-content-between">
                                                    <?php $i = 0; foreach($list_news as $post) { $i++; ?>
                                                        <?php if($i < 7) continue; ?>
                                                        <div class="content">
                                                            <a href="<?php echo get_permalink($post->ID); ?>" class="title text-black fs-14 fw-700 text-line-clamp-2">
                                                                <?php echo $post->post_title; ?>
                                                            </a>
                                                            <div class="actions d-flex justify-content-between px-0">
                                                                <span class="d-flex gap-1 align-items-center">
                                                                    <i class="fa-regular fa-comment">
                                                                        <img src="<?= get_template_directory_uri(); ?>/images/clock.png" alt="" width="15" height="15">
                                                                    </i>
                                                                    <?php echo get_the_date('d/m/Y', $post->ID); ?>
                                                                </span>
                                                                <span class="d-flex gap-1 align-items-center">
                                                                    <i class="fa-solid fa-eye">
                                                                        <img src="<?= get_template_directory_uri(); ?>/images/eye.png" alt="">
                                                                    </i>
                                                                    <?php echo get_post_meta($post->ID, 'post_views_count', true) ?: '0'; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <?php } wp_reset_postdata(); ?>
                                                    <a href="<?php echo $data['link']; ?>" class="btn-new fw-600 d-block text-center fs-14 w-50">XEM CHI TIẾT</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
    }
}