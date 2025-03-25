<?php
namespace App\Components;

use TypeRocket\Template\Component;

class CategoryComponent extends Component
{
    protected $title = 'Category Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading');
        echo $form->text('Description 1');
        echo $form->text('Company Name');
        echo $form->text('Description 2');

        $categories = $form->repeater('Category')->setFields([
            $form->image('Image'),
            $form->text('Name'),
            $form->text('Link'),
        ]);

        echo $categories;
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
            <?php if(count($data) > 0 ) { ?>
                <section class="section ceo-box">
                    <div class="container">
                        <div class="justify-content-center">
                            <?php if(!empty($data['heading'])) { ?>
                                <h2 class="title-box-category-mobile fs-22 fw-700 d-none text-center pb-4 text-uppercase"><?php echo $data['heading']; ?></h2>
                            <?php } ?>
                            <div class="category-right align-items-center position-relative">
                                <div class="box-categories text-center d-grid">
                                    <div class="info-content-category text-start p-3">
                                        <?php if(!empty($data['description_1'])) { ?>
                                            <p class="mb-0 fs-18 fw-500"><?php echo $data['description_1']; ?></p>
                                        <?php } ?>
                                        <?php if(!empty($data['company_name'])) { ?>
                                            <h2 class="fs-28"><?php echo $data['company_name']; ?></h2>
                                        <?php } ?>
                                        <?php if(!empty($data['description_2'])) { ?>
                                            <p class="fs-15 fw-400"><?php echo $data['description_2']; ?></p>
                                        <?php } ?>
                                    </div>

                                    <?php if(count($data['category']) > 0 ) { ?>
                                        <?php foreach($data['category'] as $v) { ?>
                                            <div class="item-categories p-5">
                                                <div class="item-categories-content">
                                                    <a href="<?php echo $v['link']; ?>" class="item-categories-icon d-block">
                                                        <?php if(!empty($v['image'])) { 
                                                            $image = wp_get_attachment_url($v['image']);
                                                            ?>
                                                            <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                                        <?php } ?>
                                                    </a>
                                                    <div class="item-categories-title pt-3">
                                                        <a href="<?php echo $v['link']; ?>" class="text-black fs-16 fw-600"><?php echo $v['name']; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }  wp_reset_postdata(); ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php
    }
}