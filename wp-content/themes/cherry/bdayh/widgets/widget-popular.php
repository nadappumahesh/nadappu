<?php

	add_action( 'widgets_init', 'popular_widget_box' );
	function popular_widget_box() {
		register_widget( 'popular_widget' );
	}

	class popular_widget extends WP_Widget {

		function popular_widget() {
			$widget_ops = array( 'classname' => 'popular-widget' );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'popular-widget' );
			$this->WP_Widget( 'popular-widget',Cherry .' - Popular Posts With Images', $widget_ops, $control_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );

			$title = apply_filters('widget_title', $instance['title'] );
			$page_url = $instance['page_url'];

			echo $before_widget;
			echo $before_title;
			echo $title ;
			echo $after_title;
			?>

			<ul>
			  <?php AGS_popular_posts(); ?>
			</ul>

			<?php
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['page_url'] = strip_tags( $new_instance['page_url'] );
			return $instance;
		}

		function form( $instance ) {
			$defaults = array( 'title' =>__( 'Popular Posts' , 'bd'));
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
			  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ','bd') ?></label>
			  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
			</p>
			<?php
		}
	}
?>
