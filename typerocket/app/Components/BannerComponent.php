<?php
namespace App\Components;

use TypeRocket\Template\Component;

class BannerComponent extends Component
{
    protected $title = 'Banner Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->gallery('Banner Images');
    }

    /**
     * Render
     *
     * @var array $data component fields
     * @var array $info name, item_id, model, first_item, last_item, component_id, hash
     */
    public function render(array $data, array $info)
    {
        ?>
            <?php if (!empty($data['banner_images'])) { ?>
                <section class="section sc-box-banner">
                    <div class="col-12">
                        <div class="banner">
                            <div class="custom_slider img-100 m-0" data-slides-to-show="1" data-slides-to-scroll="1" data-slides-to-show-tablet="1" data-slides-to-show-mobile="1">
                                <?php foreach($data['banner_images'] as $id) { 
                                    $image_url = wp_get_attachment_url($id);
                                    ?>
                                    <img src="<?php echo esc_url($image_url); ?>" width="100%" alt="Ảnh">
                                <?php } wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php
    }
}