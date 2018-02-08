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
        'Sunset Sidebar Options',
        'Sidebar',
        'manage_options',
        'alecaddd_sunset',
        'sunset_theme_create_page'
    );

    add_submenu_page(
        'alecaddd_sunset',
        'Sunset Theme Options',
        'Theme Options',
        'manage_options',
        'alecaddd_sunset_theme',
        'sunset_theme_support_page'
    );

    add_submenu_page(
        'alecaddd_sunset',
        'Sunset Contact Form',
        'Contact Form',
        'manage_options',
        'alecaddd_sunset_theme_contact',
        'sunset_contact_form_page'
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
     * Sunset Options
     */
    register_setting('sunset-settings-group', 'profile_picture');
    register_setting('sunset-settings-group', 'first_name', 'sunset_sanitize_first_name_handler');
    register_setting('sunset-settings-group', 'about_me', 'sunset_sanitize_about_me_handler');
    register_setting('sunset-settings-group', 'last_name', 'sunset_sanitize_last_name_handler');
    register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting('sunset-settings-group', 'facebook_handler', 'sunset_sanitize_facebook_handler');
    register_setting('sunset-settings-group', 'gplus_handler', 'sunset_sanitize_gplus_handler');

    /**
     * Theme Support Options
     */
    register_setting('sunset-theme-support', 'post_formats');
    register_setting('sunset-theme-support', 'custom_header');
    register_setting('sunset-theme-support', 'custom_background');

    /**
     * Contact Form Options
     */
    register_setting('sunset-contact-options', 'activate_contact');

    /**
     * Custom CSS
     */
    register_setting('sunset-custom-css-options', 'sunset_css', 'sunset_sanitize_custom_css_textarea');

    /**
     * Setup New Section
     */
    add_settings_section(
        'sunset-sidebar-options',
        'Sidebar Options',
        'sunset_sidebar_options',
        'alecaddd_sunset'
    );

    add_settings_section(
        'sunset-theme-options',
        'Theme Options',
        'sunset_theme_options',
        'alecaddd_sunset_theme'
    );

    add_settings_section(
        'sunset-contact-section',
        'Contact Form',
        'sunset_contact_section',
        'alecaddd_sunset_theme_contact'
    );

    add_settings_section(
        'sunset-custom-css-section',
        'Custom CSS',
        'sunset_custom_css_section_callback',
        'alecaddd_sunset_css'
    );

    /**
     * =========================================================
     * Sidebar Options
     */

    /**
     * Profile Picture
     */
    add_settings_field(
        'sidebar-profile-picture',
        'Profile Picture',
        'sunset_sidebar_profile_picture',
        'alecaddd_sunset',
        'sunset-sidebar-options'
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
     * About Me
     */
    add_settings_field(
        'sidebar-about',
        'About Me',
        'sunset_sidebar_about',
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
    /**
     * ===================================================
     * end sidebar options
     */

    /**
     * ===================================================
     * Theme Support
     */

    add_settings_field(
        'post-formats',
        'Post Formats',
        'sunset_post_formats',
        'alecaddd_sunset_theme',
        'sunset-theme-options'
    );

    add_settings_field(
        'message-message',
        'Below Customizations',
        'sunset_theme_options_info',
        'alecaddd_sunset_theme',
        'sunset-theme-options'
    );

    add_settings_field(
        'custom-header',
        'Custom Header',
        'sunset_custom_header',
        'alecaddd_sunset_theme',
        'sunset-theme-options'
    );

    add_settings_field(
        'custom-background',
        'Custom Background',
        'sunset_custom_background',
        'alecaddd_sunset_theme',
        'sunset-theme-options'
    );

    /**
     * ===================================================
     * end theme options
     */

    /**
     * ===================================================
     * Contact Form Options
     */

    add_settings_field(
        'activate-form',
        'Activate Contact Form',
        'sunset_activate_contact',
        'alecaddd_sunset_theme_contact',
        'sunset-contact-section'
    );

    /**
     * ===================================================
     * end contact form
     */

    /**
     * ===================================================
     * Custom CSS Options
     */

    add_settings_field(
        'sunset-custom-css',
        'Insert your Custom CSS',
        'sunset_custom_css_callback',
        'alecaddd_sunset_css',
        'sunset-custom-css-section'
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

function sunset_sidebar_profile_picture()
{
    $picture = esc_attr(get_option('profile_picture'));
    if (empty($picture)) {
        echo '<input id="profile-picture" type="hidden" name="profile_picture" value=""  />';
        echo '<input type="button" value="Upload" class="button button-primary" id="upload-button"  />';
    } else {
        echo '<input id="profile-picture" type="hidden" name="profile_picture" value="' . $picture . '"  />';
        echo '<input type="button" value="Update" class="button button-primary" id="upload-button"  />';
        echo '<input type="button" class="button button-secondary" value="Remove" id="remove-picture" />';
    }
}

function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />';
    echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
    echo '<p class=description">This will display your full name in the side bar menu</p>';
}

function sunset_sidebar_about()
{
    $about = esc_attr(get_option('about_me'));
    echo '<input type="text" size="43" name="about_me" value="' . $about . '" placeholder="About Myself" />';
    echo '<p class=description">This will display a short description about yourself, in the side bar menu</p>';
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

function sunset_sanitize_about_me_handler($input)
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

function sunset_sanitize_custom_css_textarea($input)
{
    $output = esc_textarea($input);
    return $output;
}

/**
 * Template Pages
 * ./templates
 */

function sunset_theme_create_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-admin.php';
}

/**
 * Contact Form options
 */
function sunset_contact_section()
{
    echo 'Activate this themes contact form. ';
    echo 'Leave this unactivated<br>if you wish to use a different contact form plugin.';
}

function sunset_contact_form_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-contact-form.php';
}

function sunset_activate_contact()
{
    //@ makes sure it exists
    $options = get_option('activate_contact');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" ' . $checked . ' />Activate</label>';
}

/**
 * Support Page
 */
function sunset_theme_options_info()
{
    echo 'Activating Custom Header and/or Custom Background will add new menu\'s to the Appearence panel.';
}

function sunset_theme_support_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-theme-support.php';
}

function sunset_theme_options()
{
    echo 'Activate or deactivate specific theme support options';
}

function sunset_post_formats()
{
    $options = get_option('post_formats');
    $formats = array('aside', 'gallery', 'link', 'image', 'status', 'video', 'audio', 'chat');
    $output = '';
    foreach ($formats as $format) {
        $checked = (@$options[$format] == 1 ? 'checked' : '');
        $output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . ' />' . $format . '</label><br>';
    }

    echo $output;
}

function sunset_custom_header()
{
    $options = get_option('custom_header');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . ' />Activate</label>';
}

function sunset_custom_background()
{
    $options = get_option('custom_background');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . ' />Activate</label>';

}

/**
 * CSS custom admin page
 */
function sunset_theme_settings_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-custom-css.php';
}

function sunset_custom_css_section_callback()
{
    echo 'Customize the Sunset Theme with your own css.';
}

function sunset_custom_css_callback()
{
    //@ makes sure it exists
    $css = get_option('sunset_css');
    $css = (empty($css) ? '/* Sunset Theme Custom CSS */' : $css);
    echo '<div id="customCss">' . $css . '</div>';
    echo '<textarea id="sunset_css" name="sunset_css" style="display:none;visibility:hidden;">' . $css . '</textarea>';
}
