<?php
namespace App\Components;

use TypeRocket\Template\Component;

class BusinessComponent extends Component
{
    protected $title = 'Business Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading');

        $repeater = $form->repeater('Business Item')->setFields([
            $form->image('Image'),
            $form->text('Title'),
            $form->textarea('Content')
        ]);

        echo $repeater;
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
            <?php if(count($data['business_item']) > 0 ) { ?>
                <section class="section box-besiness">
                    <div class="container">
                        <div class="col-12">
                            <?php if(!empty($data['heading'])) { ?>
                                <div class="besiness-title py-4">
                                    <h2 class="fs-28 d-flex justify-content-center text-uppercase"><?php echo $data['heading']; ?></h2>
                                    <div class="border-bottom bg-black"></div>
                                </div>
                            <?php } ?>
                            <div class="wrap-content-besiness d-flex gap-4 justify-content-between flex-wrap">
                                <?php $i = 0; foreach($data['business_item'] as $v) { $i++;
                                    $image = wp_get_attachment_url($v['image']);
                                    ?>
                                    <div class="col-4 content-besiness content-besiness1">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo $v['title']; ?>">
                                            </div>
                                            <div class="col-9">
                                                <h3 class="fs-18 text-uppercase"><?php echo $v['title']; ?></h3>
                                                <p class="text-line-clamp-3 fs-15">
                                                    <?php echo $v['content']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($i == 6) break; ?>
                                <?php } wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php
    }
}