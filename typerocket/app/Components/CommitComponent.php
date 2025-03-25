<?php
namespace App\Components;

use TypeRocket\Template\Component;

class CommitComponent extends Component
{
    protected $title = 'Commit Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->image('Section Image');
        echo $form->image('Background');

        $commits = $form->repeater('Commit')->setFields([
            $form->image('Image'),
            $form->text('Name'),
            $form->text('Description'),
        ]);

        echo $commits;
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
                <section class="section box-banner-footer">
                    <div class="col-12">
                        <div class="container">
                            <?php if(!empty($data['background'])) { 
                                $background = wp_get_attachment_url($data['background']);
                                ?>
                                <div class="banner-bg-footer">
                                    <img src="<?php echo esc_url($background); ?>" alt="Background" class="position-absolute start-0 z-n1 object-fit-cover w-100">
                                </div>
                            <?php } ?>
                            
                            <?php if(count($data['commit']) > 0 ) { ?>
                                <div class="row py-4 info-block">
                                    <?php $i = 0; foreach($data['commit'] as $v) { $i++; ?>
                                        <div class="col-3 d-flex justify-content-center info-block-content">
                                            <?php if(!empty($v['image'])) { 
                                                $image = wp_get_attachment_url($v['image']);
                                                ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="Ảnh">
                                            <?php } ?>
                                            <div class="text-white">
                                                <h2 class="fs-18 text-uppercase"><?php echo $v['name']; ?></h2>
                                                <div class="fs-14 fw-500 mt-1"><?php echo $v['description']; ?></div>
                                            </div>
                                        </div>
                                        <?php if($i == 4) break; ?>
                                    <?php } wp_reset_postdata(); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if(!empty($data['section_image'])) { 
                            $image = wp_get_attachment_url($data['section_image']);
                            ?>
                            <div class="banner-footer">
                                <img src="<?php echo esc_url($image); ?>" width="100%" alt="Ảnh">
                            </div>
                        <?php } ?>
                    </div>
                </section>
            <?php } ?>
        <?php
    }
}