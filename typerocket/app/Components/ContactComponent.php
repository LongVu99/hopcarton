<?php
namespace App\Components;

use TypeRocket\Template\Component;

class ContactComponent extends Component
{
    protected $title = 'Contact Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->image('Banner Images')->setLabel('Chọn Banner Tiêu Đề');
        echo $form->editor('Content')->setLabel('Nhập thông tin');
        echo $form->text('Address1')->setLabel('Địa chỉ 1');
        echo $form->text('Address2')->setLabel('Địa chỉ 2');
        echo $form->text('Address3')->setLabel('Địa chỉ 3');
        echo $form->text('Address Other')->setLabel('Địa chỉ khác');
        echo $form->repeater('Socical')->setFields([
            $form->image('Photo'),
            $form->text('Name'),
            $form->text('Slides URL')
        ]);
        $form_list = [
            null => null,
        ];
        $forms = get_posts([
            'post_type' => 'wpcf7_contact_form',
            'posts_per_page' => -1
        ]);

        if (!empty($forms)) {
            foreach ($forms as $items) {
                $form_list[$items->ID . esc_html($items->post_title)] = $items->ID;
            }
        }
        echo $form->select('contact_form')
            ->setOptions($form_list)
            ->setLabel('Chọn Form Liên Hệ');

        echo $form->url('Maps')->setLabel('Google Maps');
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
        <style>
            /* Set riêng cho Contact-Form 7 */
            .contact-form-wrapper form span {
                font-size: 12px;
            }

            .contact-form-wrapper form .wpcf7-response-output {
                background: #fbeaea;
                border-left: 4px solid #e74c3c;
                padding: 10px;
                color: #e74c3c;
                margin-top: 10px;
                font-size: 12px;
            }

            /* Chia sđt và mail thành 1 cột */
            .contact-form-wrapper form .contact-row {
                display: flex;
                gap: 10px;
            }

            .contact-form-wrapper form .contact-column {
                width: 50%;
            }
        </style>
        <?php get_header(); ?>
        <div class="page_contact">
            <div class="text-center py-4 text-"
                style="background: url('<?php echo wp_get_attachment_url($data['banner_images']) ?>') no-repeat center center / cover fixed;">
                <h1 class="text-uppercase"><?php the_title(); ?></h1>
            </div>
            <div class="container">
                <div class="row py-5">
                    <div class="col-12 col-sm-6">
                        <div class="address">
                            <h3><?php echo $data['content']; ?></h3>

                            <?php if ($data['address1']): ?>
                                <p>
                                    <img src="<?= get_template_directory_uri(); ?>/icons/location-black.svg" class="mx-1" width="20"
                                        alt="">
                                    <?php echo esc_html($data['address1']); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ($data['address2']): ?>
                                <p>
                                    <img src="<?= get_template_directory_uri(); ?>/icons/location-black.svg" class="mx-1" width="20"
                                        alt="">
                                    <?php echo esc_html($data['address2']); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ($data['address3']): ?>
                                <p>
                                    <img src="<?= get_template_directory_uri(); ?>/icons/location-black.svg" class="mx-1" width="20"
                                        alt="">
                                    <?php echo esc_html($data['address3']); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ($data['address_other']): ?>
                                <p>
                                    <img src="<?= get_template_directory_uri(); ?>/icons/location-black.svg" class="mx-1" width="20"
                                        alt="">
                                    <?php echo esc_html($data['address_other']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="social-icons d-flex align-items-center">
                            <?php if ($data['socical']):
                                foreach ($data['socical'] as $itemss): ?>
                                    <a href="<?php echo esc_url($itemss['slides_url']) ?>" target="_blank">
                                        <img src="<?= wp_get_attachment_url($itemss['photo']) ?>" width="30">
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($data['contact_form'] <> null): ?>
                        <div class="col-12 col-sm-6">
                            <div class="contact-form-wrapper">
                                <?php
                                echo do_shortcode('[contact-form-7 id="' . esc_attr($data['contact_form']) . '"]');
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-5">
                    <?php
                    if ($data['maps']) {
                        echo '<iframe 
                                width="100%" 
                                height="300" 
                                frameborder="0" 
                                style="border:0" 
                                src="' . esc_url($data['maps']) . '&output=embed" 
                                allowfullscreen>
                            </iframe>';
                    }

                    ?>
                </div>
            </div>
        </div>
        <?php get_footer(); ?>
    <?php
    }
}