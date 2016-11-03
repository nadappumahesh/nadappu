<?php

	add_action( 'widgets_init', 'Facebook_widget_box' );
	function Facebook_widget_box()
	{
		register_widget( 'facebook_widget' );
	}

	class facebook_widget extends WP_Widget
	{

		function facebook_widget()
		{
			$widget_ops = array( 'classname' => 'facebook-widget' );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'facebook-widget' );
			$this->WP_Widget( 'facebook-widget',Cherry .' - Facebook', $widget_ops, $control_ops );
		}

		function widget( $args, $instance )
		{
			extract( $args );

			$title = apply_filters('widget_title', $instance['title'] );
			$page_url = $instance['page_url'];

			echo $before_widget;
			if ( $title )
			  echo $before_title;
			  echo $title ; ?>
			<?php echo $after_title; ?>

			<div class="widget_facebook">
			  <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $page_url ?>&amp;width=288&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=245" scrolling="no" frameborder="0" style="background:#FFF; border:none; overflow:hidden; width:288px; height:245px;" allowTransparency="true"></iframe>
			</div>

			<?php
			echo $after_widget;
		}


		function update( $new_instance, $old_instance )
		{
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		return $instance;
		}

		function form( $instance )
		{
			$defaults = array( 'title' =>__( 'Find us on Facebook' , 'bd') );


			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
			  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','bd') ?> : </label>
			  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'page_url' ); ?>">Page Url : </label>
			  <input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" class="widefat" type="text" />
			  <small><?php _e('example','bd') ?>:<em>http://www.facebook.com/envato</em></small>
			</p>
			<?php
		}
	}
?>
