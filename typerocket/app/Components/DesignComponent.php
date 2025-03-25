<?php
namespace App\Components;

use TypeRocket\Template\Component;

class DesignComponent extends Component
{
    protected $title = 'Design Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Description');
        echo $form->text('Heading');

        $designs = $form->repeater('Design')->setFields([
            $form->image('Image'),
            $form->text('Name'),
            $form->text('Link'),
            $form->text('Quantity'),
            $form->text('Category'),
        ]);

        echo $designs;
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
            <section class="section box-design">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-12">
                            <div class="content-design">
                                <?php if(!empty($data['description'])) { ?>
                                    <div class="text-design">
                                        <p class="fs-15 text-uppercase"><?php echo $data['description']; ?></p>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($data['heading'])) { ?>
                                    <div class="title-degin">
                                        <h2 class="fs-28 m-0 text-uppercase"><?php echo $data['heading']; ?></h2>
                                        <div class="border-bottom bg-black"></div>
                                    </div>
                                <?php } ?>
                            </div>

                            <?php if(count($data['design']) > 0 ) { ?>
                                <div class="carousel-container overflow-hidden position-relative w-100 m-auto">
                                    <div class="custom_slider d-flex w-100 w-100" data-slides-to-show="4" data-slides-to-scroll="1"
                                        data-slides-to-show-mobile="2" data-slides-to-show-tablet="3">
                                            <?php foreach($data['design'] as $v) { ?>
                                                <div class="item-category col-4 text-center w-100">
                                                    <a href="<?php echo $v['link']; ?>" class="zoom-img overflow-hidden d-block">
                                                        <?php if(!empty($v['image'])) {
                                                            $image = wp_get_attachment_url($v['image']);
                                                            ?>
                                                            <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                                        <?php } ?>
                                                    </a>
                                                    <?php if(!empty($v['name'])) { ?>
                                                        <a href="<?php echo $v['link']; ?>" class="carousel-title text-black fw-700 fs-18 text-line-clamp-1 text-uppercase"><?php echo $v['name']; ?></a>
                                                    <?php } ?>
                                                    <?php if(!empty($v['quantity'])) { ?>
                                                        <div class="carousel-text fs-14 text-line-clamp-1"><?php echo $v['quantity']; ?> sản phẩm đã thiết kế</div>
                                                    <?php } ?>
                                                    <?php if(!empty($v['category'])) { ?>
                                                        <button class="carousel-button text-white fs-14 cursor-pointer"><?php echo $v['category']; ?></button>
                                                    <?php } ?>
                                                </div>
                                            <?php }  wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
}