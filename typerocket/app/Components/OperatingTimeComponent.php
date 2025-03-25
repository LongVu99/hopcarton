<?php
namespace App\Components;

use TypeRocket\Template\Component;

class OperatingTimeComponent extends Component
{
    protected $title = 'OperatingTime Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading small 1');
        echo $form->text('Heading');
        echo $form->text('Heading small 2');
        echo $form->image('Background');

        $customers = $form->repeater('Customers')->setFields([
            $form->image('Image'),
        ]);

        echo $customers;

        $feedbacks = $form->repeater('Feedback')->setFields([
            $form->textarea('Content'),
            $form->image('Image'),
            $form->text('Name'),
            $form->text('Job'),
        ]);

        echo $feedbacks;
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
            <section class="section box-active position-relative">
                <?php if(!empty($data['background'])) { 
                    $background = wp_get_attachment_url($data['background']);
                    ?>
                    <div class="banner-box-active">
                        <img src="<?php echo esc_url($background); ?>" alt="Background" class="position-absolute start-0 object-fit-cover w-100 height-100">
                    </div>
                <?php } ?>
                <div class="container">
                    <div class="justify-content-center py-5 wrap-feedback row">
                        <div class="col-12">
                            <div class="cutomer-feedback">
                                <div class="text-title text-center">
                                    <?php if(!empty($data['heading_small_1'])) { ?>
                                        <p class="text-white text-uppercase"><?php echo $data['heading_small_1']; ?></p>
                                    <?php } ?>
                                    <?php if(!empty($data['heading'])) { ?>
                                        <h2 class="text-white fs-26 text-uppercase"><?php echo $data['heading']; ?></h2>
                                    <?php } ?>
                                    <?php if(!empty($data['heading_small_2'])) { ?>
                                        <p class="text-white text-uppercase"><?php echo $data['heading_small_2']; ?></p>
                                    <?php } ?>
                                </div>
                                <?php if(count($data['customers']) > 0 ) { ?>
                                    <div class="brands">
                                        <ul class="custom_slider d-flex w-100" data-slides-to-show="8" data-slides-to-scroll="1"
                                            data-slides-to-show-mobile="3" data-slides-to-show-min-mobile="2" data-slides-to-scroll-min-mobile="2" data-slides-to-scroll-mobile="6"
                                            data-slides-to-show-tablet="5">
                                            <?php foreach($data['customers'] as $v) { 
                                                if(!empty($v['image'])) {
                                                    $image = wp_get_attachment_url($v['image']);
                                                ?>
                                                <li class="img-brand w-100 overflow-hidden">
                                                    <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                                </li>
                                            <?php } } wp_reset_postdata(); ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if(count($data['feedback']) > 0 ) { ?>
                                    <div class="feedback wrap-content-feedback custom_slider d-flex w-100 flex-wrap row" data-slides-to-show="3"
                                        data-slides-to-scroll="1" data-slides-to-show-tablet="2" data-slides-to-show-mobile="1">
                                        <?php foreach($data['feedback'] as $v) { 
                                            if(!empty($v['content'])) {
                                            ?>
                                            <div class="col-4 box-feedback bg-white position-relative">
                                                <p class="text-line-clamp-3 ps-3 text-justify fs-15">
                                                    <?php echo $v['content']; ?>
                                                </p>
                                                <ul class="row align-items-center pt-3">
                                                    <li class="col-3">
                                                        <?php if(!empty($v['image'])) { 
                                                            $image = wp_get_attachment_url($v['image']); 
                                                        ?>
                                                            <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                                        <?php } ?>
                                                    </li>
                                                    <li class="col-9 p-0">
                                                        <h4 class="text-line-clamp-1 fs-18 m-0"><?php echo $v['name']; ?></h4>
                                                        <p class="text-line-clamp-1"><?php echo $v['job']; ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } } wp_reset_postdata(); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
}