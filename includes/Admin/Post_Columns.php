<?php

namespace Robiul\CPT\Admin;

class Post_Columns {
    public function __construct() {
        add_filter( 'manage_books_posts_columns', array( $this, 'robi_cpt_books_post_type_columns' ) );
    }

    public function robi_cpt_books_post_type_columns( $post_columns ) {
        // print_r( $post_columns );
    }
}