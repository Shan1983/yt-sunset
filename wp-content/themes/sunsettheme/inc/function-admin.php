<?php

/*
 * @package sunsettheme
 * =============
 *  ADMIN PAGE
 * =============
 */

function sunset_add_admin_page()
{
    /**
     * creates the sunset admin page
     */

    add_menu_page(
        'Sunset Theme Options',
        'Sunset',
        'manage_options',
        'alecaddd_sunset',
        'sunset_theme_create_page',
        get_template_directory_uri() . '/img/sunset-icon.png',
        110
    );

    /**
     * Create admin subpages
     * Note: The first submenu needs to reflect the add_menu_page
     * settings, otherwise you get funky formatting where the page
     * is repeated. All further submenu's do not need to worry about this.
     */

    add_submenu_page(
        'alecaddd_sunset',
        'Sunset Theme Options',
        'General',
        'manage_options',
        'alecaddd_sunset',
        'sunset_theme_create_page'
    );

    add_submenu_page(
        'alecaddd_sunset',
        'Sunset CSS Options',
        'Custom CSS',
        'manage_options',
        'alecaddd_sunset_css',
        'sunset_theme_settings_page'
    );

    /**
     * Activate custom settings
     * This is generated inside this function
     * to prevent the system from creating these
     * settings if the admin panel is not created
     * beforehand.
     */
    add_action('admin_init', 'sunset_custom_settings');

}

function sunset_custom_settings()
{
    /**
     * register database fields
     */
    register_setting('sunset-settings-group', 'first_name', 'sunset_sanitize_first_name_handler');
    register_setting('sunset-settings-group', 'last_name', 'sunset_sanitize_last_name_handler');
    register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting('sunset-settings-group', 'facebook_handler', 'sunset_sanitize_facebook_handler');
    register_setting('sunset-settings-group', 'gplus_handler', 'sunset_sanitize_gplus_handler');

    /**
     * Setup New Section
     */
    add_settings_section(
        'sunset-sidebar-options',
        'Sidebar Options',
        'sunset_sidebar_options',
        'alecaddd_sunset'
    );

    /**
     * Full Name
     */
    add_settings_field(
        'sidebar-name',
        'Full Name',
        'sunset_sidebar_name',
        'alecaddd_sunset',
        'sunset-sidebar-options'
    );

    /**
     * Twitter
     */
    add_settings_field(
        'sidebar-twitter',
        'Twitter',
        'sunset_sidebar_twitter',
        'alecaddd_sunset',
        'sunset-sidebar-options'
    );

    /**
     * Facebook
     */
    add_settings_field(
        'sidebar-facebook',
        'Facebook',
        'sunset_sidebar_facebook',
        'alecaddd_sunset',
        'sunset-sidebar-options'
    );

    /**
     * Google Plus
     */
    add_settings_field(
        'sidebar-gplus',
        'Google Plus',
        'sunset_sidebar_gplus',
        'alecaddd_sunset',
        'sunset-sidebar-options'
    );

}

/**
 * Hooks
 */
add_action('admin_menu', 'sunset_add_admin_page');

/**
 * General Custom Fields
 */
function sunset_sidebar_options()
{
    echo 'customise your sidebar infomation';
}

function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />';
    echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
    echo '<p class=description">This will display your full name in the side bar menu</p>';
}

function sunset_sidebar_twitter()
{
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '@<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="@Twitter Handle" />';
    echo '<p class=description">This will display an icon and link to your Twitter account.<br><strong>Please Note:</strong> your Twitter Handle should be entered without the \'@\' symbol</p>';
}

function sunset_sidebar_facebook()
{
    $facebook = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="' . $facebook . '" placeholder="Facebook Name" />';
    echo '<p class=description">This will display an icon and link to your Facebook account.</p>';
}

function sunset_sidebar_gplus()
{
    $gplus = esc_attr(get_option('gplus_handler'));
    echo '<input type="text" name="gplus_handler" value="' . $gplus . '" placeholder="Google Plus Name" />';
    echo '<p class=description">This will display an icon and link to your Google+ account.</p>';
}

/**
 * Santize Custom Fields
 */
function sunset_sanitize_first_name_handler($input)
{
    $output = sanitize_text_field($input);
    return $output; // always return, never echo!
}

function sunset_sanitize_last_name_handler($input)
{
    $output = sanitize_text_field($input);
    return $output; // always return, never echo!
}

function sunset_sanitize_twitter_handler($input)
{
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output; // always return, never echo!
}

function sunset_sanitize_facebook_handler($input)
{
    $output = sanitize_text_field($input);
    return $output; // always return, never echo!
}

function sunset_sanitize_gplus_handler($input)
{
    $output = sanitize_text_field($input);
    return $output; // always return, never echo!
}

/**
 * Template Pages
 * ./templates
 */

function sunset_theme_create_page()
{
    require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}


/**
 * CSS custom admin page
 */
function sunset_theme_settings_page()
{
    echo '<h1>Sunset CSS Settings</h1>';
}

