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
    /**
     * Filter
     * add_filter('manage_yourcustomposttype_posts_columns');
     * to change the layout of the cpt
     */
    add_filter('manage_sunset-contact_posts_columns', 'sunset_set_contact_columns');
    add_action('manage_sunset-contact_posts_custom_column', 'sunset_contact_custom_column', 10, 2);
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

function sunset_set_contact_columns($columns)
{
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function sunset_contact_custom_column($column, $post_id)
{
    switch ($column) {
        case 'message':
            echo get_the_excerpt();
            break;
        case 'email':
            echo 'email_address';
            break;

    }
}