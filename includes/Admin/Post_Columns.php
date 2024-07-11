<?php

namespace Robiul\CPT\Admin;

class Post_Columns {
    public function __construct() {
        add_filter( 'manage_books_posts_columns', array( $this, 'robi_cpt_books_columns' ) );
    }

    public function robi_cpt_books_columns( $post_columns ) {

        // create a new array
        $new_columns = [];

        // loop the post_columns array
        foreach($post_columns as $key=>$column){

            if ( 'cb' == $key ) {
				$new_columns[ $key ] = $column;
				$new_columns['book_image'] = 'Thumbnail';
				continue;
			}

            if ( 'title' == $key ) {
				$new_columns[ $key ] = $column;
				$new_columns['book_author'] = 'Author';

                $new_columns[ $key ] = $column;
				$new_columns['book_price'] = 'Price';

				continue;
			}

            $new_columns[ $key ] = $column;
        }
        
        return $new_columns;
    }
}