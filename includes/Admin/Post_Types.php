<?php

namespace Robiul\CPT\Admin;

class Post_Types {

    public function __construct() {
        # code..
    }

    /**
     * Post Type: Books.
     */
    public function robi_books_post_type_register() {

        $labels = [
            "name"               => esc_html__( "Books", "robi-cpt" ),
            "singular_name"      => esc_html__( "Book", "robi-cpt" ),
            "menu_name"          => esc_html__( "Books", "robi-cpt" ),
            "all_items"          => esc_html__( "Books", "robi-cpt" ),
            "add_new"            => esc_html__( "Add New Book", "robi-cpt" ),
            "add_new_item"       => esc_html__( "Add New Book", "robi-cpt" ),
            "edit_item"          => esc_html__( "Edit Book", "robi-cpt" ),
            "new_item"           => esc_html__( "Add New Book", "robi-cpt" ),
            "view_item"          => esc_html__( "View Book", "robi-cpt" ),
            "view_items"         => esc_html__( "View Books", "robi-cpt" ),
            "search_items"       => esc_html__( "Search Books", "robi-cpt" ),
            "not_found"          => esc_html__( "Sorry, you haven't any book", "robi-cpt" ),
            "not_found_in_trash" => esc_html__( "No books found in trash", "robi-cpt" ),
        ];

        $args = [
            "label"                 => esc_html__( "Books", "robi-cpt" ),
            "labels"                => $labels,
            "description"           => "Add you book",
            "public"                => true,
            "publicly_queryable"    => true,
            "show_ui"               => true,
            "show_in_rest"          => true,
            "rest_base"             => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace"        => "wp/v2",
            "has_archive"           => "chapters",
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "delete_with_user"      => false,
            "exclude_from_search"   => false,
            "capability_type"       => "post",
            "map_meta_cap"          => true,
            "hierarchical"          => false,
            "can_export"            => false,
            "rewrite"               => ["slug" => "books", "with_front" => true],
            "query_var"             => true,
            "menu_icon"             => "dashicons-grid-view",
            "supports"              => ["title", "editor", "thumbnail"],
            "show_in_graphql"       => false,
        ];

        register_post_type( "books", $args );
    }

    /**
     * Post Type: Chapters.
     */
    public function robi_chapters_post_type_register() {

        $labels = [
            "name"               => esc_html__( "Chapters", "robi-cpt" ),
            "singular_name"      => esc_html__( "Chapter", "robi-cpt" ),
            "menu_name"          => esc_html__( "Chapters", "robi-cpt" ),
            "all_items"          => esc_html__( "All Chapters", "robi-cpt" ),
            "add_new"            => esc_html__( "Add New Chapter", "robi-cpt" ),
            "add_new_item"       => esc_html__( "Add New Chapter", "robi-cpt" ),
            "edit_item"          => esc_html__( "Edit Chapter", "robi-cpt" ),
            "new_item"           => esc_html__( "New Chapter", "robi-cpt" ),
            "view_item"          => esc_html__( "View Chapter", "robi-cpt" ),
            "view_items"         => esc_html__( "View Chapters", "robi-cpt" ),
            "search_items"       => esc_html__( "Search Chapter", "robi-cpt" ),
            "not_found"          => esc_html__( "No Chapters Found", "robi-cpt" ),
            "not_found_in_trash" => esc_html__( "No Chapter found on Trash", "robi-cpt" ),
        ];

        $args = [
            "label"                 => esc_html__( "Chapters", "robi-cpt" ),
            "labels"                => $labels,
            "description"           => "Add Book Chapter",
            "public"                => true,
            "publicly_queryable"    => true,
            "show_ui"               => true,
            "show_in_rest"          => true,
            "rest_base"             => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace"        => "wp/v2",
            "has_archive"           => true,
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "delete_with_user"      => false,
            "exclude_from_search"   => false,
            "capability_type"       => "post",
            "map_meta_cap"          => true,
            "hierarchical"          => false,
            "can_export"            => false,
            "rewrite"               => ["slug" => "chapters", "with_front" => true],
            "query_var"             => true,
            "menu_icon"             => "dashicons-book",
            "supports"              => ["title", "editor"],
            "show_in_graphql"       => false,
        ];

        register_post_type( "chapters", $args );
    }

    /**
     * Taxonomy: Authors.
     */
    public function robi_author_taxonomy_register_on_books() {

        $labels = [
            "name"          => esc_html__( "Authors", "hello-elementor" ),
            "singular_name" => esc_html__( "Author", "hello-elementor" ),
        ];

        $args = [
            "label"                 => esc_html__( "Authors", "hello-elementor" ),
            "labels"                => $labels,
            "public"                => true,
            "publicly_queryable"    => true,
            "hierarchical"          => true,
            "show_ui"               => true,
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "query_var"             => true,
            "rewrite"               => ['slug' => 'robi-authors', 'with_front' => true],
            "show_admin_column"     => false,
            "show_in_rest"          => true,
            "show_tagcloud"         => false,
            "rest_base"             => "authors",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace"        => "wp/v2",
            "show_in_quick_edit"    => false,
            "sort"                  => false,
            "show_in_graphql"       => false,
        ];
        register_taxonomy( "authors", ["books"], $args );
    }
}