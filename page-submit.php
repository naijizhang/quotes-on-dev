<?php
/**
 * The template for displaying all pages.
 * Template Name: Submit Page
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area content-area-submit">
    <main id="main" class="site-main" role="main">
        <h1>Submit a Quote</h1>
        <?php if (is_user_logged_in() && current_user_can('edit_post')): ?>
        <form>
            <div class="eachform author-of-quote">
                <label for="new-author">Author of Quote</label>
                <input class="each-field" type="text" name="new-author" id="new-author">
            </div>

            <div class="eachform quote-content">
                <label for="new-content">Quote</label>
                <input class="each-field" type="text" name="new-content" id="new-content">
            </div>
            <div class="eachform quote-source">
                <label for="new-quote-source">Where did you find this quote? (e.g. book name)</label>
                <input class="each-field" type="text" name="new-quote-source" id="new-quote-source">
            </div>
            <div class="eachform quote-source-url">
                <label for="new-quote-source-url">Provide the URL of the quote source, if available.</label>
                <input class="each-field" type="text" name="new-quote-source-url" id="new-quote-source-url">
            </div>
            <input id="submit-new" type="button" value="Submit Quote">
        </form>
        <?php else: ?>
        <p>Sorry, you must be logged in to submit a quote!</p>

        <a href="<?php echo esc_url(wp_login_url()) ?>">Click here to login.</a>


        <?php endif ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 