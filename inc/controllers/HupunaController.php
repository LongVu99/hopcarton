<?php

if (!defined('ABSPATH')) {
    exit;
}
class HupunaController
{
    public function __construct()
    {
        add_action( 'admin_enqueue_scripts',array($this,'hupuna_admin_style'));
        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
        add_action( 'wp_enqueue_scripts', array($this,'remove_woocommerce_scripts'), 99 );
    }
    function hupuna_admin_style(): void
    {
        wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/admin-style.css' );
    }
    function remove_woocommerce_scripts() {
        wp_dequeue_script( 'woocommerce' );
        wp_dequeue_script( 'wc-cart-fragments' );
        wp_dequeue_script( 'wc-add-to-cart' );
        wp_dequeue_script( 'wc-checkout' );
        wp_dequeue_script( 'wc-single-product' );
    
    }
}