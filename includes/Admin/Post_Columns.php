<?php

namespace Robiul\CPT\Admin;

class Post_Columns {
    public function __construct() {

        // book post type
        add_filter( 'manage_books_posts_columns', array( $this, 'robi_cpt_books_columns' ) );
        add_action( 'manage_books_posts_custom_column', array( $this, 'robi_custom_book_column' ), 10, 2 );
        add_filter( 'manage_edit-books_sortable_columns', array( $this, 'robi_column_sortable' ), 10, 1 );

        // Chapters post type
        add_filter( 'manage_chapters_posts_columns', array( $this, 'robi_cpt_chapter_columns' ) );
        add_action( 'manage_chapters_posts_custom_column', array( $this, 'robi_custom_chapter_column' ), 10, 2 );

    }

    /**
     * Add Custom Columns for Books Post Type
     *
     * @param array $post_columns
     * @return array
     *
     * @since 1.0.0
     */
    public function robi_cpt_books_columns( $post_columns ) {

        // create a new array
        $new_columns = [];

        // loop the post_columns array
        foreach ( $post_columns as $key => $column ) {

            if ( 'cb' == $key ) {
                $new_columns[$key] = $column;
                $new_columns['book_image'] = 'Thumbnail';
                continue;
            }

            if ( 'title' == $key ) {
                $new_columns[$key] = $column;

                $new_columns['book_author'] = 'Author';
                $new_columns['book_price'] = 'Price';
                $new_columns['number_of_chapter'] = 'Chapters';

                continue;
            }

            $new_columns[$key] = $column;
        }

        return $new_columns;
    }

    /**
     * Add custom columns for chapters
     *
     * @param array $columns
     * @return array
     *
     * @since 1.0.0
     *
     */
    public function robi_cpt_chapter_columns( $columns ) {

        $new_columns = [];

        foreach ( $columns as $key => $column ) {
            if ( 'title' === $key ) {
                $new_columns[$key] = $column;
                $new_columns['book_name'] = "Book";
                continue;
            }

            $new_columns[$key] = $column;
        }

        return $new_columns;
    }

    /**
     * Show custom value on book custom columns
     *
     * @param array $column
     * @param int $post_id
     *
     * @since 1.0.0
     */
    public function robi_custom_book_column( $column, $post_id ) {
        if ( 'book_image' == $column ) {
            if ( has_post_thumbnail( $post_id ) ) {
                echo get_the_post_thumbnail( $post_id, 'thumbnail' );
            } else {
                echo 'No Image';
            }
        }

        if ( 'book_author' === $column ) {

            global $post;
            // get previous count
            $author = get_post_meta( $post->ID, 'author', true );

            echo $author;
        }

        if ( 'book_price' === $column ) {

            global $post;
            // get previous count
            $book_price = get_post_meta( $post->ID, 'book_price', true );

            echo $book_price;
        }

        if ( 'number_of_chapter' === $column ) {

            global $post;
            // get previous count
            $chapters = get_post_meta( $post->ID, 'numbers_of_chapter', true );

            echo $chapters;
        }
    }

    /**
     * Show custom value on chapter post custom columns
     *
     * @param object $column
     * @param int $post_id
     *
     * @since 1.0.0
     */
    public function robi_custom_chapter_column( $column, $post_id ) {

        if ( 'book_name' === $column ) {

            // get book id
            $book_id = get_post_meta( $post_id, 'book_name', true );

            // get the book from books post type
            $post_args = [
                'post_type'   => 'books',
            ];

            $posts = get_posts( $post_args );
            $book_name = "";
            $book_url = "";

            foreach ( $posts as $book_post ) {
                if ( $book_id == $book_post->ID ) {
                    $book_name = $book_post->post_title;
                    $book_url = get_permalink($book_post->ID);
                    break; 
                }
            }

            if ( $book_name && $book_url ) {
                echo '<a href="' . esc_url($book_url) . '">' . esc_html($book_name) . '</a>';
            } else {
                echo esc_html($book_name); 
            }
        }
    }

    /**
     * Make books post type cols sortable
     *
     * @param array $cols
     * @return array
     *
     * @since 1.0.0
     */
    public function robi_column_sortable( $cols ) {
        $cols['book_author'] = 'book_author';
        $cols['book_price'] = 'book_price';
        $cols['number_of_chapter'] = 'number_of_chapter';

        return $cols;
    }

}