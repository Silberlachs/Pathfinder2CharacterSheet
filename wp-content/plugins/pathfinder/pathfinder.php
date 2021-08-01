<?php

/**
 * pathfinder2CharacterSheet
 *
 * @package           PluginPackage
 * @author            clockw0rk
 * @copyright         clockw0rk
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       pathfinder2CharacterSheet
 * Plugin URI:        http://clockwork.ddnss.org
 * Description:       online pathfinder2 character sheet and roll20_requests
 * Version:           Albatros-4
 * Requires at least: 5.6
 * Requires PHP:      8.0
 * Author:            clockw0rk
 * Author URI:        http://clockwork.ddnss.org
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Start testsuite with  ./vendor/bin/phpunit tests
use Pathfinder\MainMenu\MainMenuHandler;

require __DIR__ . '/vendor/autoload.php';

function initialize(): void
{
    if(isset($_POST['loadCharacter']))
    {
        (new MainMenuHandler())->loadCharacter(
                    __DIR__ . '/template/CharacterSheet.html',
                    htmlspecialchars($_POST['loadCharacter'])
                    );
        return;
    }

    if(isset($_POST['newChar']))
    {
        (new MainMenuHandler())->createNewCharacter(
            __DIR__ . '/template/CharacterCreator.html'
        );
        return;
    }

    (new MainMenuHandler())->loadMainMenu(__DIR__ . '/template/MainMenu.html');
}

function load_scripts_and_styles() {
    //TODO: split css into multiple files
    wp_register_style( 'charactersheet', plugins_url( 'pathfinder/css/charactersheet.css' ));
    wp_enqueue_style( 'charactersheet' );

    wp_register_style( 'main_menu', plugins_url( 'pathfinder/css/main_menu.css' ));
    wp_enqueue_style( 'main_menu' );

    //TODO: make mobile
    //if(browser = desktop)
    wp_register_style( 'page_settings_desktop', plugins_url( 'pathfinder/css/pageSettings_desktop.css' ));
    wp_enqueue_style( 'page_settings_desktop' );

    //TODO: add scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'MainMenuController', plugins_url('pathfinder/js/MainMenuController.js'));
}
add_action('init', 'load_scripts_and_styles');
add_shortcode('charactersheet', 'initialize');

?>