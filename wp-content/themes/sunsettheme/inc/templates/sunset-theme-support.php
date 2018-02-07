<h1><?php bloginfo(); ?> Theme Support</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post" class="sunset-general-form">
    <?php settings_fields('sunset-theme-support'); ?>
    <?php do_settings_sections('alecaddd_sunset_theme'); ?>
    <?php submit_button(); ?>
</form>

