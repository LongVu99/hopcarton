<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<section class="news-list">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 5,
                            'meta_key'       => 'featured', 
                            'orderby'        => array(
                                'meta_value_num' => 'ASC', 
                                'date'           => 'DESC'
                            ),
                            'order'          => 'ASC',
                            'meta_query'     => array(
                                array(
                                    'key'     => 'featured',
                                    'compare' => 'EXISTS',
                                ),
                            ),
                        );

                        $query = new WP_Query($args);
                        $featured_post_ids = array(); 

                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $featured_post_ids[] = get_the_ID(); 
                            }
                        }
                        $total_posts = $query->post_count;

                        if ($total_posts > 0) :
                        ?>
                            <div class="featured-news mb-4">
                                <div class="row">
                                    <?php
                                    $count = 0;
                                    while ($query->have_posts()) : $query->the_post();
                                        $count++;
                                        $featured_value = get_post_meta(get_the_ID(), 'featured', true);
                                        $thumbnail_id = get_post_thumbnail_id(get_the_ID()); 
                                        $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 

                                        if (!$thumbnail_alt) {
                                            $thumbnail_alt = get_the_title();
                                        }

                                        if ($count == 1) :
                                    ?>
                                            <div class="col-12 col-md-7 col-lg-7 col-xl-8">
                                                <article class="news-top-left mb-md-0 mb-4">
                                                    <figure>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="wrap-img img-100">
                                                            <?= get_the_post_thumbnail(get_the_ID(), 'medium', ['alt' => esc_attr($thumbnail_alt)]); ?>
                                                        </a>
                                                    </figure>
                                                    <h3 class="mt-2">
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="name fs-24 fw-700 text-black text-line-clamp-4">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <div class="des fs-14 my-2 text-line-clamp-4">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                    <div class="time-post d-flex align-items-center fs-12">
                                                        <div class="user-post"><?php the_author(); ?></div>
                                                        <time class="time">
                                                            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'hupuna'); ?>
                                                        </time>
                                                    </div>
                                                </article >
                                            </div>
                                            <div class="col-12 col-md-5 col-lg-5 col-xl-4">
                                        <?php
                                        elseif ($count == 2) :
                                        ?>
                                                <article  class="news-top-right">
                                                    <figure>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="wrap-img img-100">
                                                            <?= get_the_post_thumbnail(get_the_ID(), 'medium', ['alt' => esc_attr($thumbnail_alt)]); ?>
                                                        </a>
                                                    </figure>
                                                    <h3 class="my-2">
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="name fs-20 fw-700 text-black text-line-clamp-4">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <div class="time-post d-flex align-items-center fs-12">
                                                        <div class="user-post"><?php the_author(); ?></div>
                                                        <div class="time">
                                                            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'hupuna'); ?>
                                                        </div>
                                                    </div>
                                                </article >
                                        <?php
                                        elseif ($count > 2) :
                                        ?>
                                                <article  class="post3 mt-2 pt-2">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="name text-black text-line-clamp-4 fs-16 fw-500">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </article >
                                        <?php
                                        endif;
                                        endwhile;
                                        ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                        endif;

                        $args2 = array(
                            'post_type'      => 'post',
                            // 'posts_per_page' => 2,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'post__not_in'   => $featured_post_ids,
                            'paged'          => $paged,
                        );

                        $query2 = new WP_Query($args2);

                        if ($query2->have_posts()) :
                            while ($query2->have_posts()) : $query2->the_post();
                            $thumbnail_id = get_post_thumbnail_id(get_the_ID()); 
                            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 

                            if (!$thumbnail_alt) {
                                $thumbnail_alt = get_the_title();
                            }
                        ?>
                                <article  class="item-news py-3">
                                    <div class="row">
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                            <figure>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="wrap-img img-100">
                                                    <?= get_the_post_thumbnail(get_the_ID(), 'medium', ['alt' => esc_attr($thumbnail_alt)]); ?>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                                            <h3 class="mb-2 mt-2 mt-sm-0">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="name fs-20 fw-700 text-black text-line-clamp-4">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <div class="time-post d-flex align-items-center fs-12">
                                                <div class="user-post"><?php the_author(); ?></div>
                                                <time class="time">
                                                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'hupuna'); ?>
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </article >
                        <?php
                            endwhile;
                        ?>

                            <!-- Phân trang -->
                            <div class="pagination">
                            <?php 
                            echo paginate_links(array(
                                'total' => $query2->max_num_pages,
                                'current' => max(1, get_query_var('paged')),
                                'format' => 'page/%#%/', 
                                'prev_text' => '«',
                                'next_text' => '»',
                            )); 
                            ?>
                        </div>

                        <?php
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <div class="col-12 col-lg-4">
                            <?php
                            get_sidebar();
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
