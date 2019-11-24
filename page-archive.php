<?php
/**
 * The template for displaying archive pages.
 * Template Name: Archives Main Page
 * @package Quote_On_Dev_Theme
 */

get_header(); ?>

<div id="primary" class="content-area content-area-archive-page">
    <main id="main" class="site-main" role="main">

        <h1>Archives</h1>
        <h2>Quote Authors</h2>
        <?php
            //reference  https://www.wpexplorer.com/random-posts-wordpress/
        // Query random posts
        $the_query = new WP_Query(array(
            'post_type'      => 'post',
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
        <ul class="all-categories">

            <?php wp_list_categories(array()); ?>

    </ul>
        <!-- wp_tag_cloud( $args ); -->
        <!-- //Tags -->
        <!-- reference: https://stackoverflow.com/questions/39685167/list-all-the-tags-in-a-wordpress-blog-->
        <div class="all-tags"> 
        <h2>Tags</h2>
            <ul>
                <?php $tags = get_tags('post_tag'); //taxonomy=post_tag
                if ($tags): foreach ($tags as $tag): ?>
                <li><a class="tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" title="<?php echo esc_attr($tag->name); ?>">
                        <?php echo esc_html($tag->name); ?></a></li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?> 