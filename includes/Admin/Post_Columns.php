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
        add_filter( 'manage_edit-chapters_sortable_columns', array( $this, 'robi_chapters_column_sortable' ), 10, 1 );

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
                $new_columns['book_chapter'] = "Chapter";
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

        // book thumbnail show
        if ( 'book_image' == $column ) {
            if ( has_post_thumbnail( $post_id ) ) {
                echo get_the_post_thumbnail( $post_id, 'thumbnail' );
            } else {
                echo 'No Image';
            }
        }

        // book author show
        if ( 'book_author' === $column ) {

            $author = get_post_meta( $post_id, 'author', true );

            echo $author;
        }

        // price show
        if ( 'book_price' === $column ) {

            $book_price = get_post_meta( $post_id, 'book_price', true );

            echo $book_price;
        }

        // chapters count
        if ( 'number_of_chapter' === $column ) {

            // get the book from books post type
            $post_args = [
                'post_type' => 'chapters',
            ];

            $chapters = get_posts( $post_args );
            $chapters_no = 0;

            foreach ( $chapters as $chapter ) {
                $book_name = get_post_meta( $chapter->ID, 'book_name', true );
                if ( $book_name == $post_id ) {
                    $chapters_no++;
                }
            }

            echo $chapters_no;

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
                'post_type' => 'books',
            ];

            $posts = get_posts( $post_args );
            $book_name = "";
            $book_url = "";

            foreach ( $posts as $book_post ) {
                if ( $book_id == $book_post->ID ) {
                    $book_name = $book_post->post_title;
                    $book_url = get_permalink( $book_post->ID );
                    break;
                }
            }

            if ( $book_name && $book_url ) {
                echo '<a href="' . esc_url( $book_url ) . '">' . esc_html( $book_name ) . '</a>';
            } else {
                echo esc_html( $book_name );
            }
        }

        if( 'book_chapter' === $column ){
            $chapter = get_post_meta( $post_id, 'chapter_number', true );
            
            echo $chapter;
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

    public function robi_chapters_column_sortable( $cols){
        $cols['book_name'] = 'book_name';
        return $cols;
    }

}