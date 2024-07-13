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
 * Requires Plugins: advanced-custom-fields
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

    private function __construct() {

        // after plugin loaded
        add_action( 'plugin_loaded', array( $this, 'robi_cpt_init' ) );

        // post type registration
        add_action('init', array($this, 'robi_custom_post_type_register'));

        // activation hook
        register_activation_hook(__FILE__, array($this, 'active'));
    }

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

    /**
     * After Plugin Loaded Call this class
     *
     * @return mixed
     * @since 1.0.0
     */
    public function robi_cpt_init() {

        new Robiul\CPT\Admin();

    }

    /**
     * 
     * Register Custom post type
     * 
     * @return mixed
     */
    public function robi_custom_post_type_register(){
        $books = new Robiul\CPT\Admin\Post_Types();
        $books->robi_books_post_type_register();
        $books->robi_chapters_post_type_register();
        $books->robi_author_taxonomy_register_on_books();
    }

    /**
     * 
     * After activation 
     * 
     * @return void
     */
    public function active(){
        new Robiul\CPT\Installer();
    }
}

// get instance
function robi_cpt() {
    return Robi_Custom_Post_Type::getInstance();
}

// Kick of the class
robi_cpt();