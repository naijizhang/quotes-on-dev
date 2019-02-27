<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()): ?>

        <?php if (is_home() && !is_front_page()): ?>
        <header>
            <h1 class="page-title screen-reader-text">
                <?php single_post_title(); ?>
            </h1>
        </header>
        <?php endif; ?>

        <?php
        //reference  https://www.wpexplorer.com/random-posts-wordpress/
        // Query random posts
        $the_query = new WP_Query(array(
            'post_type'      => 'post',
            'orderby'        => 'rand',
            'posts_per_page' => 1,
        )); ?>

        <?php  /* Start the Loop */ ?>
        <?php while ($the_query->have_posts()):$the_query->the_post();  ?>
        <?php get_template_part('template-parts/content'); ?>
        <?php endwhile;
  		wp_reset_postdata(); ?>

        <?php else: ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

        <button type="button" id="get-new-post">Get More</button>


    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 