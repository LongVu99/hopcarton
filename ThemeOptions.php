<?php
/** @var \App\Elements\Form $form */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="box-theme-options-admin">

    <div class="header-theme-options">
        <h1>HUPUNA V1</h1>
        <h2>HUPUNA THEME OPTIONS</h2>
        <em class="version-theme-options">Version 6.0.5</em>
    </div>

    <div class="notice-theme">
        <p> Please enter all required information</p>
    </div>

<?php
echo $form->useRest()->open();

$get_all_menu=get_all_wordpress_menus(true);
?>

<div class="typerocket-container">
    <?php
    echo $form->open();

    // $general=$form->row([
    //     $form->textContent("General Options")
    // ]);


    // Header
    $header = $form->fieldset('Header', '', [  
        $form->image('logo'),  
        $form->image('Logo mobile'),  
        $form->text('phone'),   
    ]); 

    // Header
    $footer = $form->fieldset('Footer', '', [  
        $form->image('logo footer'),  
        $form->image('background footer'),   
        $form->wpEditor('Company location'),    
        $form->text('CNDKKD'),    
        $form->text('Link messenger'),    
        $form->text('Link email'),      
        $form->text('Link zalo'),    
        $form->text('Link facebook'),    
        $form->text('Link tiktok'),    
        $form->text('Link youtube'),    
        $form->text('Link instagram'),    
        $form->textarea('Google map'),    
        $form->text('Copyright'),    
    ]); 

    // Header
    $single_product = $form->fieldset('Single product', '', [    
        $form->text('Text 1'),    
        $form->text('Text 2'),    
        $form->text('Text 3'),         
    ]); 
    // save

    $save= $form->submit( 'Save' );

    $tabs=tr_tabs()->setFooter($save)->layoutLeft();


    // $tabs->tab( 'General','dashicons-dashboard', $general );

    $tabs->tab('Header', 'building', $header)->setDescription('Header information');  
    $tabs->tab('Footer', 'building', $footer)->setDescription('Footer information');  
    $tabs->tab('Single product', 'building', $single_product)->setDescription('Single product information');  

    $tabs->render();

    echo $form->close();
    ?>

    
</div>

</div>

