<?php
/**
 * Custom template tags for this theme.
 *
 * @package QOD_Starter_Theme
 */

/**
 * Display navigation to next/previous set of posts when applicable.
 */
function qod_numbered_pagination( $query_type = '' ) {

	if ( $query_type ) {
		$the_query = $query_type;
	} else {
		global $wp_query;
		$the_query = $wp_query;
	}
	$big = 999999999;

	// Don't print empty markup if there's only one page.
	if ( $the_query->max_num_pages > 1 ) :
		echo '<nav role="navigation" class="number-pagination">';
		echo paginate_links(
			array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $the_query->max_num_pages,
				'prev_text' => '&larr; Previous',
				'next_text' => 'Next &rarr;',
			)
		);
		echo '</nav>';
	endif;
}

//show only one post on home page
function quote_home_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
		return;
		
	if(is_home()){
		$query->set( 'posts_per_page', 1 );
        return;
	}
}
add_action( 'pre_get_posts', 'quote_home_posts', 1 );

//show five posts on archive page
function quote_archive_posts( $query ) {
	if(is_archive()){
		$query->set( 'posts_per_page', 5 );
        return;
	}
}
add_action( 'pre_get_posts', 'quote_archive_posts', 1 );