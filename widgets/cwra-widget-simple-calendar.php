<?php
/**
 * A simple calendar widget
 *
 * @package	CWRA_Widget_Simple_Calendar
 * @subpackage	CWRA_Widget_Simple_Calendar/widget
 * @author	Chris Richardson <cwr@cwrichardson.com>
 * @since	0.99.1
 */
class CWRA_Widget_Simple_Calendar_Widget extends WP_Widget {

	/*
	 * Constructor for the widget
	 *
	 * @since 0.99.1
	 */
	public function __construct() {
	    parent::__construct(
		'cwra_widget_simple_calendar', // Base ID
		'A Simple Calendar', // Name in the UI
		array(
		    'description' => 'Add a simple calendar',
		    'cwra-widget-simple-calendar'
		) // Description in the UI
	    );
	}

	/**
	 * Admin form in the widget area
	 *
	 * @since 0.99.1
	 */
	public function form ( $instance ) {
		$title = ( !empty($instance) ?
		    strip_tags($instance['title']) : '' );

	// Widget admin form
	?>

		<p>
		    <label for="<?php echo $this->get_field_id('title'); ?>">
		      <?php _e('Title:'); ?></label>
		    <input class="widefat"
		      id="<?php echo $this->get_field_id('title'); ?>"
		      name="<?php echo $this->get_field_name('title'); ?>"
		      type="text"
		      value="<?php echo esc_attr($title); ?>" />
		</p>

	<?php
	}

	/**
	 * Updating widget, replacing old instances with new. Processes
	 * widget options to be saved
	 *
	 * @since 0.99.1
	 */
	public function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	/**
	 * Creating widget front-end: outputs the widget with the selected
	 * settings.
	 *
	 * @since 0.99.1
	 */
	public function widget( $args, $instance ) {
		extract($args);

		$settings = apply_filters(
		    'cwra_widget_simple_calendar_settings',
		    get_option('cwra_wdiget_simple_calendar_settings'));
		$title = apply_filters(
		    'widget_title',
		    empty($instance['title']) ? '' : $instance['title'],
		    $instance,
		    $this->id_base);

		// The content of the widget
		echo $before_widget;
		if ( !empty($title) ) {
			echo $before_title . $title . $after_title;
		}
		?>
			<div class="cwra-wsc"></div>
		<?php
		echo $after_widget;
	}
}
?>
