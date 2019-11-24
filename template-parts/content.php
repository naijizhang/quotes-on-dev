<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <div class="entry-author">
    <p class="entry-title">—
      <?php the_title(); ?>
      <?php if(get_post_meta($post->ID, '_qod_quote_source_url', true)!==''):?>
      <span class="quote-meta">, <a href="<?php echo get_post_meta($post->ID, '_qod_quote_source_url', true); ?>"><?php echo get_post_meta($post->ID, '_qod_quote_source', true); ?></a></span>
      <?php elseif(get_post_meta($post->ID, '_qod_quote_source', true)!==''):?>
      <span class="quote-meta">, <?php echo get_post_meta($post->ID, '_qod_quote_source', true); ?></span>
      <?php endif?>
    </p>
    <!-- //GET THE QUOTE META -->
	
    </div><!-- .entry-header -->
</article><!-- #post-## --> 