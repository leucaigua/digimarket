<?php
/**
 * Template Style One for Team
 *
 * @package RadiantThemes
 */

// get raw date.
$date = get_field( 'event_start_date', false, false );


// make date object.
$date = new DateTime( $date );

?>

	<div class="<?php echo esc_attr( $custom_class ); ?>">
		<div class="up-event-box">
			<div class="up-event-calender-box">
				<div class="date">
				<?php echo $date->format( 'j' ); ?>
				</div>
				<div class="month">
					<?php the_time( ' F ' ); ?>
				</div>
			</div>
			<div class="up-event-text-box">
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<p>
					<span><i class="fa fa-clock-o"></i> <?php the_field( 'event_start_time' ); ?> - <?php the_field( 'event_end' ); ?> </span>
					<span><i class="fa fa-map-marker"></i> <?php the_field( 'event_location' ); ?> </span>
				</p>
			</div>
		</div>
	</div>
