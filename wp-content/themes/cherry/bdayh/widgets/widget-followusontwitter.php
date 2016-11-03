<?php

	add_action( 'widgets_init', 'followusontwitter_widget_box' );
	function followusontwitter_widget_box()
	{
	register_widget( 'followusontwitter_widget' );
	}

	class followusontwitter_widget extends WP_Widget
	{

	function followusontwitter_widget()
		{
			$widget_ops = array( 'classname' => 'followusontwitter-widget' );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'followusontwitter-widget' );
			$this->WP_Widget( 'followusontwitter-widget',Cherry .' - Follow Us On Twitter', $widget_ops, $control_ops );
		}

		function widget( $args, $instance )
		{
			extract( $args );

			$title = apply_filters('widget_title', $instance['title'] );
			$twitter_id = $instance['twitter_id'];
			$page_url = $instance['page_url'];

			echo $before_widget;
			echo $before_title;
			echo $title ;
			echo $after_title;

			?>

			<div>
			  <a href="https://twitter.com/<?php echo $twitter_id ?>" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Follow @<?php echo $twitter_id ?></a>
			  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<!--//twiiter_share-->

			<?php
			echo $after_widget;
		}

		function update( $new_instance, $old_instance )
		{
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['twitter_id'] = strip_tags( $new_instance['twitter_id'] );
			$instance['page_url'] = strip_tags( $new_instance['page_url'] );
			return $instance;
		}

		function form( $instance )
		{
			$defaults = array( 'title' =>__( 'Follow Us On Twitter' , 'bd') );

			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
			  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'twitter_id' ); ?>">Twitter ID : </label>
			  <textarea id="<?php echo $this->get_field_id( 'twitter_id' ); ?>" name="<?php echo $this->get_field_name( 'twitter_id' ); ?>" class="widefat" ><?php echo $instance['twitter_id']; ?></textarea>
			  <small> example: <br />
			  <em>envato</em>
			  </small>
			</p>
			<?php
		}
	}
?>
