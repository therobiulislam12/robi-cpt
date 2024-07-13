<?php

namespace Robiul\CPT\Admin;

class Menu {
    public function __construct() {

        add_action('admin_menu', array($this, 'robi_cpt_move_chapters_on_book'));

    }

    /**
     * Here function call for menu position set and remove from admin menu
     *
     * @return void
     *
     * @since 1.0.0
     *
     */
    public function robi_cpt_move_chapters_on_book() {
        global $menu;
        global $submenu;

        // Initialize variables
        $book_menu_index = null;
        $chapters_menu_index = null;

        // Find the index of the 'books' menu
        foreach ( $menu as $key => $menu_item ) {
            if ( isset( $menu_item[2] ) && 'edit.php?post_type=books' === $menu_item[2] ) {
                $book_menu_index = $key;
                break;
            }
        }

        // Check if the 'books' menu was found
        if ( $book_menu_index !== null ) {
            // Find the index of the 'chapters' submenu under 'books'
            if ( isset( $submenu['edit.php?post_type=chapters'][5] ) ) {
                $chapters_menu_index = 5; // Default index for the 'chapters' post type
            }

            // Move 'chapters' submenu to 'books' submenu if it exists
            if ( $chapters_menu_index !== null ) {
                $submenu['edit.php?post_type=books'][10] = $submenu['edit.php?post_type=chapters'][$chapters_menu_index];
                unset( $submenu['edit.php?post_type=chapters'][$chapters_menu_index] );
            }

            // Remove the 'chapters' menu
            remove_menu_page( 'edit.php?post_type=chapters' );
        }
    }

}