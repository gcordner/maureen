<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$event_date   = get_field( 'event_date' );
$event_source = get_field( 'source' );
$source_url   = get_field( 'source_link' );

?>

<article <?php post_class( 'shadow mb-4 p-3' ); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<p class="event-date"><?php echo esc_html( $event_date ); ?></p>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_content();
		?>
		<div class="event-source">
		<p><b>Source:</b> 
		<?php
		if ( ! empty( $source_url ) ) :
			// Output anchor tag when $source_url is not empty.
			echo '<a href="' . esc_url( $source_url ) . '" target="_blank">' . esc_html( $event_source ) . '</a>';
	else :
		// Output $event_source without anchor tag when $source_url is empty.
		echo esc_html( $event_source );
	endif;
	?>

</p>
		</div>

		<?php
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
