<?php

////////////////////
// CPT: Dev Pages //
////////////////////

add_action( 'init', 'cpt_register_devpage' );
function cpt_register_devpage() {
    register_post_type( 'dev-page',
        array(
            'labels' => array(
                'name' => __( 'Dev Pages' ),
                'singular_name' => __( 'Dev Page' ),
            ),
            'public' => true,
            'exclude_from_search' => true,
            'menu_position' => 3,
            'menu_icon' => 'dashicons-welcome-write-blog',
            'has_archive' => false,
            'supports' => array( 'title', 'editor', 'thumbnail','page-attributes'),
            'show_in_rest' => true,
            'hierarchical' => true
        )
    );
}