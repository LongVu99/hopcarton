<?php
namespace App\Components;

use TypeRocket\Template\Component;

class BoxBannerComponent extends Component
{
    protected $title = 'BoxBanner Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->image('Image 1');
        echo $form->image('Image 2');
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
            <?php if (count($data) > 0 ) { ?>
                <section class="box-banner-slide">
                    <div class="container">
                        <div class="row banner-slide justify-content-center">
                            <div class="col-12 d-flex">
                                <?php if(!empty($data['image_1'])) {
                                    $image = wp_get_attachment_url($data['image_1']);
                                    ?>
                                    <div class="col-5 slide-left img-100">
                                        <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                    </div>
                                <?php } ?>
                                <?php if(!empty($data['image_2'])) {
                                    $image = wp_get_attachment_url($data['image_2']);
                                    ?>
                                    <div class="col-7 slide-right img-100">
                                        <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php
    }
}