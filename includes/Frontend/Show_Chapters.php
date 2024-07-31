<?php

namespace Robiul\CPT\Frontend;

class Show_Chapters {

    public function __construct() {
        add_filter( 'the_content', [$this, 'robi_show_chapters_in_book'] );
    }

    public function robi_show_chapters_in_book( $content ) {

        if ( is_singular( 'books' ) ) {

            $book_id = get_the_ID();

            $args = array(
                'post_type'  => 'chapters',
                // 'meta_query' => array(
                //     array(
                //         'key'     => 'book',
                //         'value'   => $book_id,
                //         'compare' => '=',
                //     ),
                // ),
                // 'meta_value' => $book_id,
                'meta_key'   => $book_id,
                'orderby'    => 'meta_value_num',
                'order'      => 'ASC',
            );

            $chapters = get_posts( $args );

            

            if ( $chapters ) {
                $heading = "<h3>Chapters</h3>";
                $content = $content . $heading;
                $content .= '<ul>';
                foreach ( $chapters as $chapter ) {
                    $content .= '<li><a href="' . get_permalink( $chapter->ID ) . '">' . $chapter->post_title . '</a></li>';
                }
                $content .= '</ul>';
            }

        }

        return $content;
    }

}