<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
	?>

	<?php if ( is_single() ) : ?>
	<div class="entry-summary">
		
		<?php the_content(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>">&rarr;</a>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
