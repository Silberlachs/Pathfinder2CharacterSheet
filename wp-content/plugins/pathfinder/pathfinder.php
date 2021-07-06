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
 * Version:           Albatros-3
 * Requires at least: 5.6
 * Requires PHP:      8.0
 * Author:            clockw0rk
 * Author URI:        http://clockwork.ddnss.org
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

//   ./vendor/bin/phpunit tests
require __DIR__ . '/vendor/autoload.php';
use Pathfinder\Character\Character;
use Pathfinder\Renderer\PageRenderer;
use Pathfinder\Renderer\TemplateLoader;

function charactersheet_function($atts): string
{
    $character = new Character();
    $pageRenderer = new PageRenderer(new TemplateLoader(__DIR__ . '/template/CharacterSheet.html'));

    $pageRenderer->loadCharacterDetails([$character->getProficiencyBonus()]);
    $pageRenderer->loadAbilityScores($character->getAbilityScores());
    $pageRenderer->loadSkillList($character->getSkillList());
    $pageRenderer->loadSavingThrows($character->getSavingThrowList());
    $pageRenderer->loadResistances($character->getResistances());
    echo $pageRenderer->renderPage();

    return "";
}

function load_scripts_and_styles() {
    wp_register_style( 'charactersheet', plugins_url( 'pathfinder/css/charactersheet.css' ));
    wp_enqueue_style( 'charactersheet' );

    //TODO: make mobile
    wp_register_style( 'page_settings_desktop', plugins_url( 'pathfinder/css/pageSettings_desktop.css' ));
    wp_enqueue_style( 'page_settings_desktop' );
    //wp_enqueue_script( 'namespaceformyscript', 'http://locationofscript.com/myscript.js', array( 'jquery' ) );
}
add_action('init', 'load_scripts_and_styles');
add_shortcode('charactersheet', 'charactersheet_function');

?>