<?php
/**
 * The template for displaying all single posts.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area content-area-single">
    <main id="main" class="site-main" role="main">

        <?php while (have_posts()): the_post(); ?>

        <?php get_template_part('template-parts/content'); ?>


        <?php endwhile; ?>
        <div class="button-new-post">
            <button type="button" id="get-new-post">Show Me Another!</button>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 