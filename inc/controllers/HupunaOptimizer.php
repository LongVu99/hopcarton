<?php

if (!defined('ABSPATH')) {
    exit;
}

class HupunaOptimizer
{

    public function __construct()
    {

            add_filter('style_loader_src', array($this, 'remove_version_from_style_js'));
            add_filter('script_loader_src', array($this, 'remove_version_from_style_js'));
            add_filter('tiny_mce_before_init',array($this,'configure_tinymce'));
            add_filter('tiny_mce_before_init', array($this,'tinymce_paste_options'));
            add_filter( 'mime_types', array($this,'webp_upload_mimes') );
            add_filter( 'use_block_editor_for_post', '__return_false' );

            add_filter( 'use_block_editor_for_post_type', function( $enabled, $post_type ) {
                return false;
            }, 10, 2 );

            add_filter( 'use_widgets_block_editor', '__return_false' );
            add_action('wp_enqueue_scripts',array($this,'hupuna_deregister_script'));



    }
    public function remove_version_from_style_js( $src ) {
        if ( strpos( $src, '?ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }

    public function configure_tinymce($in){
        $in['paste_preprocess'] = "function(plugin, args){
    var whitelist = 'p,span,b,strong,i,em,h3,h4,h5,h6,ul,li,ol';
    var stripped = jQuery('<div>' + args.content + '</div>');
    var els = stripped.find('*').not(whitelist);
    for (var i = els.length - 1; i >= 0; i--) {
      var e = els[i];
      jQuery(e).replaceWith(e.innerHTML);
    }
    stripped.find('*').removeAttr('id').removeAttr('class');
    args.content = stripped.html();
    }";
        return $in;
    }

    public function tinymce_paste_options($init) {
        $init['paste_auto_cleanup_on_paste'] = true;
        $init['paste_convert_headers_to_strong'] = true;
        return $init;
    }

    public function webp_upload_mimes( $existing_mimes ) {
        $existing_mimes['webp'] = 'image/webp';
        return $existing_mimes;
    }

    public function client_set_content_type( $content_type ): string
    {
        return 'text/html';
    }

public function hupuna_deregister_script(): void
    {

        if (!is_user_logged_in()) {
            wp_deregister_script('mediaelement');
            wp_deregister_style('mediaelement');
        }

        if (!is_user_logged_in()) {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-blocks-style');
            wp_dequeue_style('classic-theme-styles');
            wp_dequeue_style('global-styles');
        }
    }
}