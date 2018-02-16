<?php
/**
 * Content Template - Gallery Post Format
 * @package sunsetTheme
 */
?>

    <article id="post-<?php the_ID();?>" <?php post_class('sunset-formats-gallery');?>>
        <header class="entry-header text-center">

            <?php if (sunset_get_attachment()):?>
            <div id="post-gallery-<?php the_ID();?>" class="carousel slide sunset-carousel-thumb" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
					<?php

					$attachments = sunset_get_bs_slides(sunset_get_attachment(7));

					foreach($attachments as $attachment): ?>

                       <div class="item <?php echo $attachment['class']; ?> background-image standard-featured" style="background-image: url(<?php echo $attachment['url']; ?>);">
                            <div class="hide next-image-preview" data-image="<?php echo $attachment['next_image']; ?>"></div>
                            <div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_image']; ?>"></div>
							<?php if($attachment['caption']): ?>
							<div class="entry-excerpt image-caption">
                                <p><?php echo $attachment['caption']; ?></p>
							</div>
							<?php endif; ?>
                        </div>

                        <?php endforeach;?>
                </div>
                <a href="#post-gallery-<?php the_ID();?>" class="left carousel-control" role="button" data-slide="prev">
                    <div class="table">
                        <div class="table-cell">

                            <div class="preview-container">
                                <span class="thumbnail-container background-image"></span>
                                <span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </div>

                        </div>
                    </div>
                </a>
                <a href="#post-gallery-<?php the_ID();?>" class="right carousel-control" role="button" data-slide="next">
                    <div class="table">
                        <div class="table-cell">

                            <div class="preview-container">
                                <span class="thumbnail-container background-image"></span>
                                <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </div>

                       </div>
                   </div>
                </a>
            </div>
            <?php endif;?>

            <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>')?>
            <div class="entry-meta">
                <?php echo sunset_posted_meta(); ?>
            </div>
        </header>

        <div class="entry-content">

            <div class="entry-excerpt">
                <?php the_excerpt();?>
            </div>
        </div>

        <div class="button-container text-center">
            <a href="<?php the_permalink();?>" class="btn btn-sunset">
                <?php _e('Read More');?>
            </a>
        </div>

        <footer class="entry-footer">
            <?php echo sunset_posted_footer(); ?>
        </footer>
    </article>
