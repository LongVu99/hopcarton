<?php
namespace App\Components;

use TypeRocket\Template\Component;

class ContentComponent extends Component
{
    protected $title = 'Content Component';

    /**
     * Admin Fields
     */
    public function fields()
    {
        $form = $this->form();
        echo $form->editor('Content');
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
        <div class="col-12 component-blog">
            <div class="container">
                <?php echo wpautop( $data['content'] ); ?>
            </div>
        </div>
        <?php
    }
}