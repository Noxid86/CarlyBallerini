<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.5.13
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();
$posts = tribe_get_list_widget_events();

// Check if any event posts are found.
if ( $posts ) : ?>
	<ol class="tribe-list-widget">
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">
				<?php
					$dumb_date_string = tribe_get_start_date();
					$date_time = explode('@', $dumb_date_string);
					$date = $date_time[0];
					$time = $date_time[1];
				?>
				<!-- Event Date -->
				<div class="tribe-event-date clearfix">
					<h4><?php echo $date ?></h4>
				</div>

				<!-- Event Title -->
				<div class="tribe-event-title clearfix">
					<p><?php echo the_title()?></p>
				</div>

				<!-- Event Time -->
				<div class="tribe-event-duration clearfix">
					<p><?php echo $time ?></p>
				</div>
			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .tribe-list-widget -->

	<p class="tribe-events-widget-link">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" target="_blank" rel="bookmark"><?php printf( esc_html__( 'View All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;
