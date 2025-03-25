<?php 
tr_post_type('Video');
$videos = tr_post_type('Video');
$videos -> setIcon('dashicons-format-video');
$upperPlural = 'Videos';
$upperSingular = 'Video';
$lowerSingular = 'video';
$pluralLower = 'videos';

tr_post_type('Video', 'Videos')->setLabels([
    'add_new'               => _x('Thêm Mới', 'post_type:video', 'your-custom-domain'),
    'all_items'             => sprintf( _x('Tất cả %s', 'post_type:video', 'your-custom-domain'), $upperPlural),
    'archives'              => sprintf( _x('%s Archives', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'add_new_item'          => sprintf( _x('Thêm mới %s', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'attributes'            => sprintf( _x('%s Attributes', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'edit_item'             => sprintf( _x('Edit %s', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'filter_items_list'     => sprintf( _x('Filter %s list %s', 'post_type:video', 'your-custom-domain'), $pluralLower, $upperSingular),
    'insert_into_item'      => sprintf( _x('Insert into %s', 'post_type:video', 'your-custom-domain'), $lowerSingular),
    'item_published'        => sprintf( _x('%s published.', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'item_published_privately' => sprintf( _x('%s published privately.', 'your-custom-domain'), $upperSingular),
    'item_updated'          => sprintf( _x('%s updated.', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'item_reverted_to_draft'=> sprintf( _x('%s reverted to draft.', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'item_scheduled'        => sprintf( _x('%s scheduled.', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'items_list'            => sprintf( _x('%s list', 'post_type:video', 'your-custom-domain'), $upperPlural),
    'menu_name'             => sprintf( _x('%s',  'post_type:video:admin menu', 'your-custom-domain'), $upperPlural),
    'name'                  => sprintf( _x('%s', 'post_type:video:post type general name', 'your-custom-domain'), $upperPlural),
    'name_admin_bar'        => sprintf( _x('%s', 'post_type:video:add new from admin bar', 'your-custom-domain'), $upperSingular),
    'items_list_navigation' => sprintf( _x('%s list navigation', 'post_type:video', 'your-custom-domain'), $upperPlural),
    'new_item'              => sprintf( _x('New %s', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'not_found'             => sprintf( _x('No %s found', 'post_type:video', 'your-custom-domain'), $pluralLower),
    'not_found_in_trash'    => sprintf( _x('No %s found in Trash', 'post_type:video', 'your-custom-domain'), $pluralLower),
    'parent_item_colon'     => sprintf( _x("Parent %s:", 'post_type:video', 'your-custom-domain'), $upperPlural),
    'search_items'          => sprintf( _x('Search %s', 'post_type:video', 'your-custom-domain'), $upperPlural),
    'singular_name'         => sprintf( _x('%s',  'post_type:video:post type singular name', 'your-custom-domain'), $upperSingular),
    'uploaded_to_this_item' => sprintf( _x('Uploaded to this %s', 'post_type:video', 'your-custom-domain'), $lowerSingular),
    'view_item'             => sprintf( _x('View %s', 'post_type:video', 'your-custom-domain'), $upperSingular),
    'view_items'            => sprintf( _x('View %s', 'post_type:video', 'your-custom-domain'), $upperPlural),
], 'Video');
