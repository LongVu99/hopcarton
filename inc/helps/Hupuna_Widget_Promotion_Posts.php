<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Hupuna_Widget_Promotion_Posts extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'widget_promotion_entries',
            'description' => __( 'Display posts with promotion.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'promotion-posts', __( 'Promotion Posts' ), $widget_ops );
        $this->alt_option_name = 'widget_promotion_entries';
    }

    public function widget( $args, $instance ): void {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Promotion Posts' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

        $r = new WP_Query( array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'meta_query'          => array(
                array(
                    'key'     => 'promotion',
                    'compare' => 'EXISTS'
                )
            ),
        ) );

        if ( ! $r->have_posts() ) {
            return;
        }

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>
        <div class="row">
            <?php $count = 0; ?>
            <?php foreach ( $r->posts as $promotion_post ) : ?>
                <?php
				$post_title = get_the_title( $promotion_post->ID );
				$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
                $thumbnail_id = get_post_thumbnail_id($promotion_post->ID);
                $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                if (!$thumbnail_alt) {
                    $thumbnail_alt = get_the_title($promotion_post->ID);
                }
                
				?>

                <?php if ($count === 0) : ?>
                    <div class="col-sm-6 col-md-6 col-lg-12">
                        <article  class="item first py-2 py-sm-2 py-lg-3">
                            <figure>
                                <a href="<?php the_permalink( $promotion_post->ID ); ?>" title="" class="wrap-img img-100">
                                    <?= get_the_post_thumbnail($promotion_post->ID, 'medium', ['alt' => esc_attr($thumbnail_alt)]); ?>
                                </a>
                            </figure>
                            <h3 class="mt-2">
                                <a href="<?php the_permalink( $promotion_post->ID ); ?>" title="" class="name fs-18 fw-700 text-black text-line-clamp-4">
                                    <?php echo $title ; ?>
                                </a>
                            </h3>
                        </article >
                    </div>
                <?php else : ?>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <article  class="item py-2">
                            <figure>
                                <a href="<?php the_permalink( $promotion_post->ID ); ?>" title="" class="wrap-img img-100">
                                    <?= get_the_post_thumbnail($promotion_post->ID, 'medium', ['alt' => esc_attr($thumbnail_alt)]); ?>
                                </a>
                            </figure>
                            <h3 class="mt-2">
                                <a href="<?php the_permalink( $promotion_post->ID ); ?>" title="" class="name fs-14 fw-500 text-black text-line-clamp-4">
                                    <?php echo $title ; ?>
                                </a>
                            </h3>
                        </article >
                    </div>
                <?php endif; ?>

                <?php $count++; ?>
            <?php endforeach; ?>
        </div>

        <?php
        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset($new_instance['show_date']) && (bool)$new_instance['show_date'];
        return $instance;
    }

    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) && (bool) $instance['show_date'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                   name="<?php echo $this->get_field_name( 'title' ); ?>" 
                   type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" 
                   name="<?php echo $this->get_field_name( 'number' ); ?>" 
                   type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> 
                   id="<?php echo $this->get_field_id( 'show_date' ); ?>" 
                   name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
        </p>
        <?php
    }
}

// Đăng ký widget
function register_hupuna_promotion_posts_widget() {
    register_widget( 'Hupuna_Widget_Promotion_Posts' );
}
add_action( 'widgets_init', 'register_hupuna_promotion_posts_widget' );


