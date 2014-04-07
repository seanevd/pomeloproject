<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 */

get_header(); ?>

<div id="main-content" class="main-content row">
	<div class="small-12 columns">
		<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						
					endwhile;
				?>

	</div>

</div>

<?php
get_footer();
?>