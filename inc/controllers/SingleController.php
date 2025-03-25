<?php
class SingleController{

    public function __construct()
    {
        add_filter('the_content', array($this,'wrap_images_in_figure_for_single'));

    }

    function wrap_images_in_figure_for_single($content) {
        if (is_single()) {
            $content = preg_replace('/(<p>)?(<img .*?>)(<\/p>)?/', '<figure>$2</figure>', $content);
        }
        return $content;
    }
}