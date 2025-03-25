<?php 
// Thêm cột "Tin nổi bật" vào danh sách bài viết
function custom_add_post_columns($columns) {
    $screen = get_current_screen();
    if ($screen->post_type === 'post') { // Chỉ áp dụng cho post
        $columns['featured_post'] = 'Tin nổi bật';
    }
    return $columns;
}
add_filter('manage_posts_columns', 'custom_add_post_columns');

// Hiển thị nội dung trong cột "Tin nổi bật"
function custom_show_post_column_content($column_name, $post_id) {
    if (get_post_type($post_id) !== 'post') {
        return; // Chỉ áp dụng cho bài viết
    }

    if ($column_name == 'featured_post') {
        $featured_value = get_post_meta($post_id, 'featured', true);
        echo !empty($featured_value) ? esc_html($featured_value) : '0';
    }
}
add_action('manage_posts_custom_column', 'custom_show_post_column_content', 10, 2);

// Thêm cột "Promotion" vào danh sách bài viết
function custom_add_promotion_column($columns) {
    $screen = get_current_screen();
    if ($screen->post_type === 'post') { // Chỉ áp dụng cho post
        $columns['promotion'] = 'Khuyến mãi';
    }
    return $columns;
}
add_filter('manage_posts_columns', 'custom_add_promotion_column');

// Hiển thị nội dung trong cột "Promotion"
function custom_show_promotion_column_content($column_name, $post_id) {
    if (get_post_type($post_id) !== 'post') {
        return; // Chỉ áp dụng cho bài viết
    }

    if ($column_name == 'promotion') {
        $promotion_value = get_post_meta($post_id, 'promotion', true);
        echo !empty($promotion_value) ? esc_html($promotion_value) : '0';
    }
}
add_action('manage_posts_custom_column', 'custom_show_promotion_column_content', 10, 2);
?>
