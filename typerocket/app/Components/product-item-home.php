<div class="col-3 product-item-right pb-4">
    <a href="<?php echo get_permalink($post->ID); ?>" class="product-item-right-img img-100">
        <?php if ($featured_image) { ?>
            <img src="<?php echo esc_url($featured_image); ?>" alt="Ảnh đại diện">
        <?php } ?>
        <?php if (!empty($gallery_images)) { 
            $gallery_ids = explode(',', $gallery_images);
            $image_url = wp_get_attachment_image_url($gallery_ids[0]); // Lấy ảnh từ ID
            if ($image_url) {
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Ảnh thứ 2" class="hover-img">
        <?php } } ?>
    </a>
    <div class="product-item-right-content text-center">
        <a href="<?php echo get_permalink($post->ID); ?>" class="d-block fs-14 fw-700">Hộp carton 10x8x4cm nắp đối, 3 lớp, sóng B, mặt nâu đáy
            mộc...</a>
        <div>
            <img src="<?= get_template_directory_uri(); ?>/images/rating.png" alt="" class="img-rating">
        </div>
        <button class="btn btn-outline-secondary btn-best-seller bg-white">Giá chỉ từ <span
                class="text-danger">2.160.000đ</span>/10 Hộp</button>
    </div>
</div>