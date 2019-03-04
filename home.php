<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main home" role="main">

        <?php if (have_posts()): ?>

        <?php if (is_home() && !is_front_page()): ?>
        <header>
            <h1 class="page-title screen-reader-text">
                <?php single_post_title(); ?>
            </h1>
        </header>
        <?php endif; ?>

        <?php  /* Start the Loop */ ?>
        <?php while (have_posts()): the_post();  ?>
        <?php get_template_part('template-parts/content-structure'); ?>
        <?php endwhile; ?>

        <?php else: ?>

        <?php get_template_part('template-parts/content-structure', 'none'); ?>

        <?php endif; ?>
        <div class="button-new-post">
            <button type="button" id="get-new-post">Show Me Another!</button>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 