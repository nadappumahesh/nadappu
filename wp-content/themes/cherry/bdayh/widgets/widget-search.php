<?php

	add_action( 'widgets_init', 'search_widget_box' );
	function search_widget_box() {
		register_widget( 'search_widget' );
	}

	class search_widget extends WP_Widget {

		function search_widget() {
			$widget_ops = array( 'classname' => 'search-widget' );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'search-widget' );
			$this->WP_Widget( 'search-widget',Cherry .' - Search', $widget_ops, $control_ops );
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

			<div class="search_content">
			  <form method="get" action="<?php echo home_url();?>">
			    <div class="enter_search">
			      <input type="text" name="s" id="search-form" value="<?php _e('Search' , 'bd' ) ?>" onfocus="if (this.value=='<?php _e('Search' , 'bd' ) ?>') this.value       = '';" onblur="if (this.value=='') this.value='<?php _e('Search' , 'bd' ) ?>';" />
			    </div>
				    <?php global $data ?>
				    <?php if($data['customsearch'] != '0') { ?>
				    <div class="cat_search">
				      <?php $select = wp_dropdown_categories('show_option_all='.__('All Content','bd').'&orderby=name&hierarchical=0&selected=-1&depth=1&show_count=1');?>
				    </div>
				    <?php } else { ?>
				    <?php } ?>
			    <div class="go_search">
			      <button value="Search" name="Submit" type="submit"><?php _e('Search','bd')?></button>
			    </div>
			  </form>
			</div><!--//end widget-->

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
			$defaults = array( 'title' =>__( 'Search' , 'bd'));
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
			  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','bd')?> : </label>
			  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
			</p>
		<?php
		}
	}
?>
