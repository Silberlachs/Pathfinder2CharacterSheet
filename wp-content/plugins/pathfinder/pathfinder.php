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
 * Version:           Albatros-1
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
    echo $pageRenderer->renderPage();

    return "";
}

function load_scripts_and_styles() {
    wp_register_style( 'charactersheet', plugins_url( 'pathfinder/css/charactersheet.css' ));
    wp_enqueue_style( 'charactersheet' );
    //wp_enqueue_script( 'namespaceformyscript', 'http://locationofscript.com/myscript.js', array( 'jquery' ) );
}
add_action('init', 'load_scripts_and_styles');
add_shortcode('charactersheet', 'charactersheet_function');

/*
The wp_enqueue_scripts action will set things up for the "frontend".
You can use the admin_enqueue_scripts action for the backend (anywhere within wp-admin)
and the login_enqueue_scripts action for the login page.

change size of content only for custom page (under appearance in backend) :

.page-id-150 #primary
{
	min-width: 100%;
}

*/

?>