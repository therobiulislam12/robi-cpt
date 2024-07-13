<?php 

namespace Robiul\CPT\Admin;

class Menu{
    public function __construct(){

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
    public function robi_cpt_move_chapters_on_book(){

        global $menu;
        global $submenu;
        $book_menu_index = null;
        foreach($menu as $key => $menu_item){
            if('edit.php?post_type=books' === $menu_item[2]){
                $book_menu_index = $key;
                break;
            }
        }

        if($book_menu_index){
            $submenu['edit.php?post_type=books'][10] = $submenu['edit.php?post_type=chapters'][5];
            unset($submenu['edit.php?post_type=chapters'][5]);
        }

        // remove chapters menu
        remove_menu_page('edit.php?post_type=chapters');
    }
}