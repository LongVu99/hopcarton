<?php
namespace App\Components;

use TypeRocket\Template\Component;

class SpaceComponent extends Component
{
    protected $title = 'Space Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->text('Height');
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
            <section class="space-wrap"
                <?php if(!empty($data['height']) && is_numeric($data['height'])) { ?>
                    style="margin-top: <?php echo $data['height']; ?>px"
                <?php } ?>
            ></section>
        <?php
    }
}