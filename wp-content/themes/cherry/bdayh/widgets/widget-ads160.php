<?php

	add_action('widgets_init','cherry_ads160');
	function cherry_ads160() {
		register_widget('cherry_ads160');
	}

	class cherry_ads160 extends WP_Widget {

		function cherry_ads160() {
			$widget_ops = array('classname' => 'cherry_ads160','description' => __('Widget display 160 x 600 Ads','bd'));
			$this->WP_Widget( 'cherry_ads160',Cherry .' - Ads 160 x 600', $widget_ops, '');
		}

		function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters('widget_title', $instance['title'] );
			$show_bg = $instance['show_bg'];
			$img = $instance['img'];
			$link = $instance['link'];
			$titletip = $instance['titletip'];
			$code = $instance['code'];
			?>

			<div class="ads_160x600">
			  <?php if($code != '') { ?>
			  <div class="ad_code"><?php echo $code; ?></div>
			  <?php } else { ?>
			  <a href="<?php echo $link ?>" title="<?php echo $titletip ?>"><img src="<?php echo $img ?>" alt="<?php echo $titletip ?>" /></a>
			  <?php } ?>
			</div>

		<?php
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['show_bg'] = $new_instance['show_bg'];
			$instance['link'] = $new_instance['link'];
			$instance['titletip'] = $new_instance['titletip'];
			$instance['img'] = $new_instance['img'];
			$instance['code'] = $new_instance['code'];
			return $instance;
		}

		function form( $instance ) {
			$defaults = array( 'title' =>__( 'advertisement' , 'bd'),
			'titletip' => __( 'Ads160x600' , 'bd'),
			'img' => BD_IMG.'ads160.png',
			'link' => '#',
			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
			  <label for="<?php echo $this->get_field_id( 'title' ); ?>">
			    <?php _e('Title:', 'bd') ?>
			  </label>
			  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<p>
			  <input class="checkbox" type="checkbox" <?php if(isset($instance['show_bg'])){ checked( $instance['show_bg'], 'on' ); } ?> id="<?php echo $this->get_field_id( 'show_bg' ); ?>" name="<?php echo $this->get_field_name( 'show_bg' ); ?>" />
			  <label for="<?php echo $this->get_field_id( 'show_bg' ); ?>">
			    <?php _e('transparent background', 'bd'); ?>
			  </label>
			</p>
			<h3>
			  <?php _e('First Ads', 'bd') ?>
			</h3>
			<p>
			  <label for="<?php echo $this->get_field_id( 'img' ); ?>">
			    <?php _e('image:', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" value="<?php if(isset($instance['img'])){ echo $instance['img']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'link' ); ?>">
			    <?php _e('Link :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php if(isset($instance['link'])){ echo $instance['link']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'titletip' ); ?>">
			    <?php _e('titletip :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'titletip' ); ?>" name="<?php echo $this->get_field_name( 'titletip' ); ?>" value="<?php if(isset($instance['titletip'])){ echo $instance['titletip']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'code' ); ?>">
			    <?php _e('ad code :', 'bd') ?>
			  </label>
			  <textarea id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" class="widefat"  ><?php if(isset($instance['code'])){ echo $instance['code']; } ?></textarea>
			</p>
		<?php
		}
	}
?>