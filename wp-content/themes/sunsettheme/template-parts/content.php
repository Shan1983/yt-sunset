<?php
/**
 * Content Template - Standard Post Format
 * @package sunsetTheme
 */
?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>')?>
        <div class="entry-meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php if (has_post_thumbnail()): ?>
            <div class="standard-featured">
                <?php the_post_thumbnail();?>
            </div>
        <?php endif;?>
        <div class="entry-excerpt">
            <?php the_excerpt();?>
        </div>
    </div>

    <div class="button-container">
        <a href="<?php the_permalink();?>" class="btn btn-default">
            <?php _e('Read More');?>
        </a>
    </div>

    <footer class="entry-footer">
    <?php echo sunset_posted_footer(); ?>
    </footer>
</article>


