<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>


	<!-- Content -->
	<p>Sorry, we couldn't find what you were looking for.</p>
	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Pomelo Project</a></p>

<?php
get_footer();
