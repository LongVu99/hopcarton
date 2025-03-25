<?php
namespace App\Components;

use TypeRocket\Template\Component;

class CeoComponent extends Component
{
    protected $title = 'Ceo Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();

        echo $form->text('Name');
        echo $form->text('Office');
        echo $form->image('Image');
        echo $form->image('Background image');
        echo $form->textarea('Description');
        echo $form->text('Link youtube');
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
                    <div class=" justify-content-center">
                        <div class="banner-1 bg-size-cover bg-no-repeat bg-position-right" 
                            <?php 
                                if(!empty($data['background_image'])) { 
                                    $image_url = wp_get_attachment_url($data['background_image']);
                                ?>
                                    style="background-image: url('<?php echo esc_url($image_url); ?>')"
                            <?php 
                                }
                            ?>
                            >
                            <div class="container">

                                <div class="row">
                                    <div class="col-12 col-lg-6 video-contact">
                                        <?php if(!empty($data['link_youtube'])) { ?>
                                            <?php 
                                                $yurl = $data['link_youtube'];
                                                $yid = '';  
                                                preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $yurl, $yid);
                                                $youtube_id = isset($yid[0]) ? $yid[0] : ''; 
                                            ?>
                                            <iframe width="1250" height="80%"
                                                src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1&mute=1"
                                                title="Công ty cổ phần Hupuna Group [240204]" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        <?php } ?>
                                    </div>
                                    <div class="col-12 col-lg-6 wrap-ceo position-relative">
                                        <div class="box-ceo text-center rounded overflow-hidden">
                                            <?php if(!empty($data['image'])) {
                                                $image = wp_get_attachment_url($data['image']);
                                                ?>
                                                <div class="info-block bg-ceo pb-3">
                                                    <img src="<?php echo esc_url($image); ?>" alt="CEO">
                                                </div>
                                            <?php } ?>
                                            <div class="text-block-content">
                                                <div class="info-content-title">
                                                    <?php if(!empty($data['name'])) { ?>
                                                        <h2 class="text-white fs-28 m-0 text-uppercase"><?php echo $data['name']; ?></h2>
                                                    <?php } ?>
                                                    <?php if(!empty($data['office'])) { ?>
                                                        <h4 class="text-white fs-16"><?php echo $data['office']; ?></h4>
                                                    <?php } ?>
                                                </div>
                                                <?php if(!empty($data['description'])) { ?>
                                                    <div class="info-content-text">
                                                        <p class="text-white pb-4 pt-3 px-3 lh-lg text-justify fs-18">
                                                            ``<?php echo $data['description']; ?>``
                                                        </p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php
    }
}