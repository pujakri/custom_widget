<?php
	// Creating the widget 
class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'wpb_widget', 

		// Widget name will appear in UI
		__('Sample Widget', 'wpb_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$textarea = apply_filters( 'widget_textarea', $instance['textarea'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		/*if ( ! empty( $title )) {
			echo $args['before_title'] . $title . $args['after_title'];
			
		}*/

		if( ! empty( $title ) && !empty( $textarea )) {
			//echo $args['before_title'] . $title . $args['after_title'];
			echo "description = ".$args['before_textarea'] . $textarea . $args['after_textarea']."";
			echo "<br>";
			echo "title = ". $title ."";
		}
		// This is where you run the code and display the output
		//echo __( 'Hello, World!', 'wpb_widget_domain' );
		echo $args['after_widget'];
	}
        
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) && isset( $instance['textarea'] )) {
			$title = $instance[ 'title' ];
			$textarea = $instance[ 'textarea' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
			$textarea = __( 'New textarea', 'wpb_widget_domain' );
		}
	// Widget admin form
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

	<label for="<?php echo $this->get_field_id( 'textarea' ); ?>"><?php _e( 'Textarea:' ); ?></label> 
	<textarea class="widefat" id="<?php echo $this->get_field_id( 'textarea' ); ?>" name="<?php echo $this->get_field_name( 'textarea' ); ?>" type="text" ><?php echo esc_attr( $textarea ); ?>
	</textarea>
	</p>
	<?php 
	//echo $args['after_widget'];
	}
    
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['textarea'] = ( ! empty( $new_instance['textarea'] ) ) ? strip_tags( $new_instance['textarea'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


?>