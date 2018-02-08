<?php

/*
 * @package sunsettheme
 * =============
 *  THEME CUSTOM POST TYPES
 * =============
 */


$contact = get_option('activate_contact');
if (@$contact == 1) {
    add_action('init', 'sunset_contact_custom_post_type');
}

/**
 * Custom Post Type - Contact
 */
function sunset_contact_custom_post_type()
{
    $labels = array(
        'name' => 'Messages',
        'singular_name' => 'Message',
        'menu_name' => 'Messages',
        'name_admin_bar' => 'Message',
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 26,
        'supports' => array('title', 'editor', 'author'),
        'menu_icon' => 'dashicons-email-alt',
    );

    register_post_type('sunset-contact', $args);
}