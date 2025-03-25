
<?php
// Prevent direct access to the file
// This check ensures that this file can only be accessed within the WordPress environment.
// If someone tries to access this file directly via the browser, the script execution stops.
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
};

// Include the initialization file from the 'inc' directory
// This line includes the 'init.php' file from the '/inc' directory of the current theme.
// It's commonly used to load various theme setups, functions, and configurations.

include_once __DIR__."/typerocket/init.php";

global $HUPUNA_DIR;

global $HUPUNA_THEME;

global $HUPUNA_VERSION;

foreach (glob(dirname(__FILE__)."/inc/*.php") as $filename)
{
    require $filename;
}

$HUPUNA_DIR=dirname(__FILE__);

$HUPUNA_VERSION="6.0.5";

$HUPUNA_THEME=new HupunaTheme();


add_filter('typerocket_theme_options_controller', function($controller) {
    if(isset($GLOBALS['user_id'])){
           unset($GLOBALS['user_id']);
    }
    return function($themeOptions) {
        $form = tr_form()->useRest()->setGroup( $themeOptions->getName() );
        return tr_view( __DIR__ . '/ThemeOptions.php', ['form' => $form]);
    };
});

add_filter('typerocket_theme_options_name', function() {
    if(isset($GLOBALS['user_id'])){
           unset($GLOBALS['user_id']);
    }
    return 'my_theme_options';
});
