<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div id="entry-content" class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <div class="entry-author">
		<?php the_title('<p id="entry-title" class="entry-title">—', '</p>'); ?>

		<!-- //GET THE QUOTE META -->
		
    </div><!-- .entry-header -->
</article><!-- #post-## --> 