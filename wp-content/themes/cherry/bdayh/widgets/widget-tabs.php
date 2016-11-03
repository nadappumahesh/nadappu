<?php

	add_action( 'widgets_init', 'cherry_tabs_widget' );
	function cherry_tabs_widget()
	{
		register_widget( 'tabs_widget' );
	}

	class tabs_widget extends WP_Widget {
		function tabs_widget() {
			$widget_ops = array( 'classname' => 'tabs-widget'  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'tabs-widget' );
			$this->WP_Widget( 'tabs-widget',Cherry .' - Tabs', $widget_ops, $control_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );

			$title = apply_filters('widget_title', $instance['cherry_title'] );
			$text_code = $instance['text_code'];
			$tran_bg = $instance['tran_bg'];
			$center = $instance['center'];

			if ($center)
			$center = '';
			else
			$center = '';
			?>

			<div class="widget widget_tabs">
			  <div class="widget_container">
			    <ol class="tabs_nav">
			      <li class="active">
			        <a href="#tab1">
			        	<?php _e( 'Popular' , 'bd' ) ?>
			        </a>
			      </li>
			      <li>
			        <a href="#tab2">
			        	<?php _e( 'Recent' , 'bd' ) ?>
			        </a>
			      </li>
			      <li>
			        <a href="#tab3">
			        	<?php _e( 'Comments' , 'bd' ) ?>
			        </a>
			      </li>
			      <li>
			        <a href="#tab4">
			        	<?php _e( 'Tags' , 'bd' ) ?>
			        </a>
			      </li>
			    </ol>
			    <div class="tabs_content">
			      <div class="tab_container" id="tab1">
			        <ul>
			          <?php AGS_popular_posts(); ?>
			        </ul>
			      </div><!--//end tab1-->
			      <div class="tab_container" id="tab2">
			        <ul>
			          <?php cherry_last_posts(); ?>
			        </ul>
			      </div><!--//end tab2-->
			      <div class="tab_container" id="tab3">
			        <ul>
			          <?php cherry_commented(); ?>
			        </ul>
			      </div><!--//end tab3-->
			      <div class="tab_container" id="tab4">
			        <div class="tagcloud">
			          <?php wp_tag_cloud( $args = array('largest' => 8,'number' => 25,'orderby'=> 'count', 'order' => 'DESC' )); ?>
			        </div>
			      </div><!--//end tab4-->
			    </div>
			  </div>
			</div><!--//end tabs-->
			<?php
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['cherry_title'] = strip_tags( $new_instance['cherry_title'] );
			$instance['text_code'] = $new_instance['text_code'] ;
			$instance['tran_bg'] = strip_tags( $new_instance['tran_bg'] );
			$instance['center'] = strip_tags( $new_instance['center'] );
			return $instance;
		}

		function form( $instance ) {
			$defaults = array( 'cherry_title' =>__('Tabs' , 'cherry')  );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
			  <label for="<?php echo $this->get_field_id( 'cherry_title' ); ?>">Title : </label>
			  <input id="<?php echo $this->get_field_id( 'cherry_title' ); ?>" name="<?php echo $this->get_field_name( 'cherry_title' ); ?>" value="<?php echo $instance['cherry_title']; ?>" class="widefat" type="text" />
			</p>
			<?php
		}
	}
?>
