<?php
/**
 * This is where all Theme Functions runs.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
};

if ( ! class_exists( 'HupunaTheme' ) ) :
    class HupunaTheme {
        public function __construct() {
            add_action( 'after_setup_theme', array( $this, 'setup' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10);
        }
        public function setup(): void
        {

        $directories = glob(dirname(__FILE__) . '/*' , GLOB_ONLYDIR);

        foreach ($directories as $key => $value) {

            $val=basename($value);
        
            if($val!="views" && $val!='block') {

                if (in_array($val,['plugins','woocommerce','helps'])) {
                    foreach (glob(dirname(__FILE__) . "/{$val}/*.php") as $filename) {
                        include_once $filename;
                    }
                }
                else{
                    foreach (glob(dirname(__FILE__)."/{$val}/*.php") as $filename){
                        include_once $filename;
                        $nameclass=basename($filename,'.php');
                        new $nameclass();
                    }
                }

            }

        }
            add_theme_support( 'post-thumbnails' );
            add_theme_support('menus');
            add_theme_support( 'title-tag' );
            add_theme_support("woocommerce");
            add_theme_support( 'wc-product-gallery-slider' );
        }

        public function views($file=null,$data=array()): void
        {
            global $HUPUNA_DIR;
            $file=trim($file);
            if(file_exists($HUPUNA_DIR.'/inc/views/'.$file.".php")){
                extract($data);
                include $HUPUNA_DIR.'/inc/views/'.$file.".php";
                ob_start();
                $content=ob_get_contents();
                ob_clean();
                echo $content;
            }

        }
        
        public function scripts(): void
        {
            global $HUPUNA_VERSION;

            global $HUPUNA_DIR;

            foreach (glob($HUPUNA_DIR."/css/*.css") as $filename) {
                wp_enqueue_style("hupuna-css-".basename($filename,'.css'),get_template_directory_uri().'/css/'.basename($filename), '', $HUPUNA_VERSION );
            }
            wp_enqueue_style( 'hupuna-css-style', get_template_directory_uri() . '/style.css', '', $HUPUNA_VERSION );
            wp_enqueue_style( 'hupuna-css-responsive', get_template_directory_uri() . '/responsive.css', '', $HUPUNA_VERSION );
    
            foreach (glob($HUPUNA_DIR."/js/*.js") as $filename) {
                wp_enqueue_script("hupuna-js-".basename($filename,'.js'),get_template_directory_uri().'/js/'.basename($filename), array( 'jquery' ), $HUPUNA_VERSION, true );
            }
        }
    }
endif;