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
    register_setting('sunset-settings-group', 'first_name');
    add_settings_section(
        'sunset-sidebar-options',
        'Sidebar Options',
        'sunset_sidebar_options',
        'alecaddd_sunset'
    );
    add_settings_field(
        'sidebar-name',
        'First Name',
        'sunset_sidebar_name',
        'alecaddd_sunset',
        'sunset-sidebar-options'
    );
}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_theme_create_page()
{
    require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />';
}

function sunset_sidebar_options()
{
    echo 'customise your sidebar infomation';
}

function sunset_theme_settings_page()
{
    echo '<h1>Sunset CSS Settings</h1>';
}

