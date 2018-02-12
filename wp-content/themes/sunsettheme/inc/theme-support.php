<?php

/*
 * @package sunsettheme
 * =============
 *  THEME SUPPORT PAGE
 * =============
 */

$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}
if (!empty($options)) {
    add_theme_support('post-formats', $output);
}

$header = get_option('custom_header');
if (@$header == 1) {
    add_theme_support('custom-header');
}

$background = get_option('custom_background');
if (@$background == 1) {
    add_theme_support('custom-background');
}

add_theme_support('post-thumbnails');

/**
 * Activate Nav menu options
 */
function sunset_register_nav_menu()
{
    register_nav_menu('primary', 'Header Navigation Menu');
}
add_action('after_setup_theme', 'sunset_register_nav_menu');

/**
 * Blog loop custom functions
 */
function sunset_posted_meta()
{
    $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $i = 1;

    if (!empty($categories)) {
        foreach ($categories as $cat) {
            if ($i > 1) {
                $output .= $separator;
            }
            $output .= '<a href="' . esc_url(get_category_link($cat->term_id)) . '" alt="' . esc_attr('View all posts in%s', $cat->name) . '">' . esc_html($cat->name) . '</a>';
            $i++;
        }
    }

    return '<span class="posted-on">Posted <a href="' . esc_url(get_permalink()) . '">' . $posted_on . '</a> ago / </span><span class="posted-in">' . $output . '</span>';
}

function sunset_posted_footer()
{
    $comments_num = get_comments_number();

    if (comments_open()) {
        if ($comments_num == 0) {
            $comments = __('No Comments');
        } else if ($comments_num > 1) {
            $comments = $comments_num . __(' Comments');
        } else {
            $comments = __('1 Comment');
        }
        $comments = '<a class="comments-link" href="' . get_comments_link() . '">' . $comments . ' <span class="sunset-icon sunset-comment"></span></a>';
    } else {
        $comments = __('Comments are closed');
    }

    return '<div class="post-footer-container">
    <div class="row">
    <div class="col-xs-12 col-sm-6">' . get_the_tag_list('<div class="tags-list"><span class="sunset-icon sunset-tag"></span> ', ' ', '</div>') . '</div>
    <div class="col-xs-12 col-sm-6 text-right">' . $comments . '</div>
    </div>
    </div>';
}

function sunset_get_attachment()
{
    $output = '';
    if (has_post_thumbnail()):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    else:
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => 1,
            'post_parent' => get_the_ID(),
        ));
        if ($attachments):
            foreach ($attachments as $attachment):
                $output = wp_get_attachment_url($attachment->ID);
            endforeach;

        endif;
    endif;
    wp_reset_postdata();
    return $output;
}

function sunset_get_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed = get_media_embedded_in_content($content, $type);

    if (in_array('audio', $type)):
        $output = str_replace('?visual=true', '?visual=false', $embed[0]);
    else:
        $output = $embed[0];
    endif;
    return $output;
}
