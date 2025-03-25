<?php
namespace App\Components;

use TypeRocket\Template\Component;

class MissionComponent extends Component
{
    protected $title = 'Mission Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Heading');
        echo $form->image('Background');
        echo $form->text('Link youtube');

        $missions = $form->repeater('Mission')->setFields([
            $form->image('Image'),
            $form->text('Title'),
            $form->text('Content'),
        ]);

        echo $missions;
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
                <section class="section box-benefit bg-no-repeat bg-position-right bg-size-cover"
                    <?php 
                        if(!empty($data['background'])) { 
                            $image_url = wp_get_attachment_url($data['background']);
                        ?>
                            style="background-image: url('<?php echo esc_url($image_url); ?>')"
                    <?php 
                        }
                    ?>
                    >
                    <div class="container">
                        <div class="row justify-content-center py-5">
                            <div class="col-12">
                                <div class=" row benefit-buy-product">
                                    <?php if(!empty($data['heading'])) { ?>
                                        <h2 class="fs-26 text-white text-center pb-4"><?php echo $data['heading']; ?></h2>
                                    <?php } ?>
                                    <?php if(!empty($data['link_youtube'])) { ?>
                                        <?php 
                                            $yurl = $data['link_youtube'];
                                            $yid = '';  
                                            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $yurl, $yid);
                                            $youtube_id = isset($yid[0]) ? $yid[0] : ''; 
                                        ?>
                                        <div class="col-12 col-lg-6 video-contact">
                                            <iframe width="1250" height="100%"
                                                src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1&mute=1"
                                                title="Công ty cổ phần Hupuna Group [240204]" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    <?php } ?>

                                    <?php if(count($data['mission']) > 0 ) { ?>
                                        <div class="col-12 col-lg-6 content-benefit ">
                                            <?php foreach($data['mission'] as $v) { ?>
                                                <div class="row py-2">
                                                    <div class="col-2 d-flex justify-content-end">
                                                        <?php if(!empty($v['image'])) { 
                                                            $image = wp_get_attachment_url($v['image']);
                                                            ?>
                                                            <img src="<?php echo esc_url($image); ?>" alt="Ảnh" height="60">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-10">
                                                        <h2 class="text-white fs-20"><?php echo $v['title']; ?></h2>
                                                        <p class="text-white fs-15"><?php echo $v['content']; ?></p>
                                                    </div>
                                                </div>
                                            <?php } wp_reset_postdata(); ?>
                                        </div>
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