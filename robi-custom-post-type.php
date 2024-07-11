<?php
/**
 * Plugin Name:       Robi CPT
 * Description:       Learning more about CPT with 2 default plugin
 * Plugin URI:        #
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul-islam.netlify.app
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:      robi-cpt
 */

// check if not "ABSPATH" declare
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Declare main file
 */
final class Robi_Custom_Post_Type {

    // declare instance
    public static $instance;

    /**
     * create a getInstance method
     *
     * @return \Robi_Custom_Post_Type
     */
    public static function getInstance() {

        if ( !self::$instance ) {

            self::$instance = new self();

        }

        return self::$instance;
    }
}

// get instance
function robi_cpt(){
    return Robi_Custom_Post_Type::getInstance();
}

// Kick of the class
robi_cpt();