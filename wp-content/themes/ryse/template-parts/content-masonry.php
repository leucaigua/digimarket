<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ryse
 */

?>



	<li id="post-<?php the_ID(); ?>">
	<?php
	if ( 'video' === get_post_format() ) {
		$video_link = get_post_meta( $post->ID, 'video_link', true );
		?>
		<div class="masonry-video" data-popup-video-align="center">
			<a class="video-link" href="<?php echo esc_url( $video_link ); ?>" rel="nofollow">
				<button id="lightbutton"><i class="fa fa-play" aria-hidden="true"></i></button>
			</a>
		</div>
				<?php if ( has_post_thumbnail() ) { ?>
					<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>"></a>
				<?php endif; ?>
	<?php } ?>
				<div class="mas_cont">
					<?php the_title( '<h3 ><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
					<p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
					<span><?php echo esc_html__( 'Posted on ', 'ryse' ); ?> <?php the_date(); ?></span>
				</div>
	<?php } else { ?>
		<?php if ( has_post_thumbnail() ) { ?>
			<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
	<a href="<?php the_permalink(); ?>">
	<img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>">
	</a>
	<?php endif; ?>
	<?php } ?>
		<?php if ( true == ryse_global_var( 'display_categries', '', false ) ) : ?>
	<div class="cat_detail">
	<div class="col-md-12 pad_top">
			<?php
			$category_detail = get_the_category( get_the_id() );
			$result          = '';
			foreach ( $category_detail as $item ) :
				$category_link = get_category_link( $item->cat_ID );
				$result       .= '<a href = "' . esc_url( $category_link ) . '" class="blue">' . $item->name . '</a>';
	endforeach;
			echo wp_kses_post( $result );
			?>
	</div>

	</div>
	<?php endif; ?>
	<div class="mas_cont">
		<?php the_title( '<h3 ><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
		<span><?php echo esc_html__( 'Posted on ', 'ryse' ); ?> <?php the_date(); ?></span>
	</div>
	<?php } ?>
	</li>


