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
		<p>This is basic template for front page. Delete this comment. Make sure that the content is wrapped in .columns.</p>
		<?php
					if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {
    include( get_page_template() );
}
				?>

	</div>

</div>

<?php
get_footer();
?>