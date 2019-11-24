<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area content-area-404">
    <main id="main" class="site-main" role="main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">
                    <?php echo esc_html('Oops!'); ?>
                </h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p>
                    <?php echo esc_html('It looks like nothing was found at this location. Maybe try a search?'); ?>
                </p>


                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                    <div>
                        <label class="screen-reader-text" for="s">
                            <?php _x('Search for:', 'label'); ?></label>
                        <input type="text" placeholder="SEARCH..." value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-text-box" />
                        <label for="searchsubmit">
                            <i class="fas fa-search search-icon"></i>
                        </label>
                        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" class="banner-text-btn" />
                    </div>
                </form>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 