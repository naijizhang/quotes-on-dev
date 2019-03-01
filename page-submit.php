<?php
/**
 * The template for displaying all pages.
 * Template Name: Submit Page
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <h1>Submit a Quote</h1>
        <form>
            <div class="author-of-quote">
                <label for="new-author">Author of Quote</label>
                <input type="text" name="new-author" id="new-author">
            </div>

            <div class="quote-content">
                <label for="new-content">Quote</label>
                <input type="text" name="new-content" id="new-content">
            </div>
            <div class="quote-source">
                <label for="new-quote-source">Where did you find this quote? (e.g. book name)</label>
                <input type="text" name="new-quote-source" id="new-quote-source">
            </div>
            <div class="quote-source-url">
                <label for="new-quote-source-url">Provide the URL of the quote source, if available.</label>
                <input type="text" name="new-quote-source-url" id="new-quote-source-url">
            </div>
            <input id="submit-new" type="button" value="Submit Quote">
		</form>
		

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 