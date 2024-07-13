<?php

namespace Robiul\CPT;

class Installer {
    public function __construct() {
        add_action( 'acf/include_fields', array( $this, 'robi_custom_acf_field_groups' ) );
    }

    public function robi_custom_acf_field_groups() {
        if ( !function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( array(
            'key'                   => 'group_66900fa56680b',
            'title'                 => 'Books Field',
            'fields'                => array(
                array(
                    'key'               => 'field_669227c39cccd',
                    'label'             => 'Books Genre',
                    'name'              => 'books_genre',
                    'aria-label'        => '',
                    'type'              => 'select',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'choices'           => array(
                        'Business'    => 'Business',
                        'Thriller'    => 'Thriller',
                        'Informative' => 'Informative',
                        'Islamic'     => 'Islamic',
                    ),
                    'default_value'     => false,
                    'return_format'     => 'value',
                    'multiple'          => 0,
                    'allow_null'        => 0,
                    'ui'                => 0,
                    'ajax'              => 0,
                    'placeholder'       => '',
                ),
                array(
                    'key'               => 'field_669010f924455',
                    'label'             => 'Book Price',
                    'name'              => 'book_price',
                    'aria-label'        => '',
                    'type'              => 'number',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'min'               => '',
                    'max'               => '',
                    'placeholder'       => '',
                    'step'              => '',
                    'prepend'           => '',
                    'append'            => '',
                ),
                array(
                    'key'               => 'field_66911b3aa73dd',
                    'label'             => 'Numbers of chapter',
                    'name'              => 'numbers_of_chapter',
                    'aria-label'        => '',
                    'type'              => 'number',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'min'               => '',
                    'max'               => '',
                    'placeholder'       => '',
                    'step'              => '',
                    'prepend'           => '',
                    'append'            => '',
                ),
            ),
            'location'              => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'books',
                    ),
                ),
            ),
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
            'show_in_rest'          => 0,
        ) );

        acf_add_local_field_group( array(
            'key'                   => 'group_669202fd3d849',
            'title'                 => 'Chapters Field',
            'fields'                => array(
                array(
                    'key'                  => 'field_669202fd4c1d8',
                    'label'                => 'Book Name',
                    'name'                 => 'book_name',
                    'aria-label'           => '',
                    'type'                 => 'post_object',
                    'instructions'         => '',
                    'required'             => 0,
                    'conditional_logic'    => 0,
                    'wrapper'              => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'post_type'            => array(
                        0 => 'books',
                    ),
                    'post_status'          => array(
                        0 => 'publish',
                    ),
                    'taxonomy'             => '',
                    'return_format'        => 'object',
                    'multiple'             => 0,
                    'allow_null'           => 0,
                    'bidirectional'        => 0,
                    'ui'                   => 1,
                    'bidirectional_target' => array(
                    ),
                ),
                array(
                    'key'               => 'field_66920a0c0acb1',
                    'label'             => 'Chapter Number',
                    'name'              => 'chapter_number',
                    'aria-label'        => '',
                    'type'              => 'number',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'min'               => '',
                    'max'               => '',
                    'placeholder'       => '',
                    'step'              => '',
                    'prepend'           => '',
                    'append'            => '',
                ),
            ),
            'location'              => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'chapters',
                    ),
                ),
            ),
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
            'show_in_rest'          => 0,
        ) );
    }
}