<h1><?php bloginfo(); ?> Theme Options</h1>
<?php settings_errors(); ?>
<?php
$firstName = esc_attr(get_option('first_name'));
$lastName = esc_attr(get_option('last_name'));
$fullName = $firstName . " " . $lastName;
$about = esc_attr(get_option('about_me'));
$twitter = esc_attr(get_option('twitter_handler'));
$facebook = esc_attr(get_option('facebook_handler'));
$gplus = esc_attr(get_option('gplus_handler'));
$picture = esc_attr(get_option('profile_picture'));
?>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-settings-group'); ?>
    <?php do_settings_sections('alecaddd_sunset'); ?>
    <?php submit_button(); ?>
</form>
<div class="sunset-sidebar-top-preview">
    <h2 class="this-preview">- Profile Preview -</h2>
</div>
<div class="sunset-sidebar-preview">
    <?php if (!$firstName) : ?>
        <h1 class="sunset-username">Fill In Your Profile</h1>
        <h2 class="sunset-description">Awaiting Saved Changes</h2>
    <?php else : ?>
    <div class="image-container">
        <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php echo $picture; ?>);">
        </div>
    </div>
    <div class="sunset-sidebar">
        <h1 class="sunset-username"><?php echo $fullName; ?></h1>
        <h2 class="sunset-description"><?php echo $about; ?></h2>
        <div class="icons-wrapper"></div>
    </div>
    <?php endif; ?>
</div>