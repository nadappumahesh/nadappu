<?php

	add_action( 'widgets_init', 'cherry_social_widget' );
	function cherry_social_widget()
		{
			register_widget( 'social_widget' );
		}
	class social_widget extends WP_Widget
	{
		function social_widget()
		{
			$widget_ops = array( 'classname' => 'social-widget'  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'social-widget' );
			$this->WP_Widget( 'social-widget',Cherry .' - Widget Social', $widget_ops, $control_ops );
		}

		function widget( $args, $instance )
		{
			extract( $args );

			$title = apply_filters('widget_title', $instance['cherry_title'] );
			$text_code = $instance['text_code'];
			$tran_bg = $instance['tran_bg'];
			$center = $instance['center'];

			if ($center)
			$center = '';
			else
			$center = '';

			widget_social();
		}

		function update( $new_instance, $old_instance )
		{
			$instance = $old_instance;
			$instance['cherry_title'] = strip_tags( $new_instance['cherry_title'] );
			$instance['text_code'] = $new_instance['text_code'] ;
			$instance['tran_bg'] = strip_tags( $new_instance['tran_bg'] );
			$instance['center'] = strip_tags( $new_instance['center'] );
			return $instance;
		}

		function form( $instance )
		{
			$defaults = array( 'cherry_title' =>__('Socials Icon' , 'bd')  );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'cherry_title' ); ?>"><?php _e('Title : ','bd')?></label>
				<input id="<?php echo $this->get_field_id( 'cherry_title' ); ?>" name="<?php echo $this->get_field_name( 'cherry_title' ); ?>" value="<?php echo $instance['cherry_title']; ?>" class="widefat" type="text" />
			</p>
		<?php
		}
	}

?>