<?php
/**
 * Content Template - Status Post Format
 * @package sunsetTheme
 */
?>

<article id="post-<?php the_ID();?>" <?php post_class('sunset-formats-status');?>>
    <header class="entry-header text-center">
        <div class="row">
            <div class="well quote-spacer col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <h1 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
                <?php the_title('<h2 class="quote-author">', '<h2>')?>
            </div>
        </div>
    </header>

    <footer class="entry-footer">
    <?php echo sunset_posted_footer(); ?>
    </footer>
</article>


