<?php
/**
 * The template for displaying archive pages.
 * Template Name: Archives Main Page
 * @package Quote_On_Dev_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <h1>Archives</h1>
        <h2>Quote Authors</h2>
        <?php
            //reference  https://www.wpexplorer.com/random-posts-wordpress/
        // Query random posts
        $the_query = new WP_Query(array(
            'post_type'      => 'post',
            'orderby'        => 'title',
            'order'          => 'ASC',
            'posts_per_page' => -1,
        )); ?>
        <div class="all-authors">
            <?php  /* Start the Loop */ ?>
            <?php while ($the_query->have_posts()): $the_query->the_post();  ?>
            <?php the_title(sprintf('<span class="each-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></span>'); ?>
            <?php endwhile;
        wp_reset_postdata(); ?>
        </div>

        <!-- //Categories -->
        <div class="all-categories">

				<?php wp_list_categories(array());?>
	
        </div>



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 