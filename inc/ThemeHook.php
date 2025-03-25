<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// remove default widget recent posts and update template widget recent post
add_action('widgets_init',"hupuna_theme_remove_default_widgets_init");
function hupuna_theme_remove_default_widgets_init(): void
{
    unregister_widget('WP_Widget_Recent_Posts');
    register_widget('Hupuna_Widget_Recent_Posts');
}

// get archive title
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="archive_title">' . get_the_author() . '</span>' ;
    }
    return $title;
});

// register sidebar for theme
add_action( 'widgets_init', 'hupuna_theme_register_widgets_init' );
function hupuna_theme_register_widgets_init(): void
{
    register_sidebar( array(
        'name' =>'Sidebar Main',
        'id' => 'sidebar-main',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'client' ),
        'before_widget' => '<div id="%1$s" class="widget client-widget-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="client-title-widget-sidebar"><span>',
        'after_title'   => '</span></div>',
    ) );

};

// Change text read more
function hupuna_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'hupuna_excerpt_more');



// get options theme
function hupuna_get_options_theme($name=null){

    if(isset($name)){

        if(is_array($name)){
            $response=[];
            foreach($name as $key=>$value){
                $response[$value]=tr_option_field('my_theme_options.'.$value);
            }
            return $response;
        }
        else{
            return tr_option_field('my_theme_options.'.$name);
        }

    }

}