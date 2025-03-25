<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
// filter wp schema pro role
add_filter( 'wp_schema_pro_role', 'edit_wp_schema_pro_role');
function edit_wp_schema_pro_role( $roles ): array
{
    $new_roles = array('editor','author','contributor');
    $roles = array_merge($roles,$new_roles);
    return $roles;
}
// hidden version yoast seo
add_filter( 'wpseo_hide_version', '__return_true' );

// disable wp calculate image srcset
add_filter( 'wp_calculate_image_srcset', '__return_false' );

// add framework typerocket builder for page
add_filter('typerocket_ext_builder_post_types', function($post_types) {
    return ['page'];
});


// filter search only post
function hupuna_theme_filter_search($query) {

    if ($query->is_search && !is_admin() && !class_exists('WooCommerce')) {
        $query->set('post_type', 'post');
    };
    return $query;
};

add_filter('pre_get_posts','hupuna_theme_filter_search');

function filter_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_comment_status', 10 , 2 );


function get_all_wordpress_menus($type=false)
{
    if($type===true){
        $term=get_terms( 'nav_menu', array( 'hide_empty' => false) );
        $return=array();
        $return['none']='None';
        foreach ($term as $key=>$value){
            $return[$value->term_id]=$value->name;
        }
        return $return;
    }
    else{
        return get_terms( 'nav_menu', array( 'hide_empty' => false) );
    }
}
