<?php

	add_action('widgets_init','cherry_ads120_90');
	function cherry_ads120_90() {
		register_widget('cherry_ads120_90');
	}

	class cherry_ads120_90 extends WP_Widget {
		function cherry_ads120_90() {
			$widget_ops = array('classname' => 'cherry_ads120_90','description' => __('Widget display 120 x 90 Ads','bd'));
			$this->WP_Widget( 'cherry_ads120_90',Cherry .' - Ads 120 x 90', $widget_ops, '');
		}

		function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters('widget_title', $instance['title'] );
			$show_bg = $instance['show_bg'];
			$img = $instance['img'];
			$link = $instance['link'];
			$titletip = $instance['titletip'];
			$code = $instance['code'];
			// ad2
			$img2 = $instance['img2'];
			$link2 = $instance['link2'];
			$code2 = $instance['code2'];
			$titletip2 = $instance['titletip2'];

			// ad3
			$img3 = $instance['img3'];
			$link3 = $instance['link3'];
			$code3 = $instance['code3'];
			$titletip3 = $instance['titletip3'];

			// ad4
			$img4 = $instance['img4'];
			$link4 = $instance['link4'];
			$code4 = $instance['code4'];
			$titletip4 = $instance['titletip4'];
			?>

			<div class="bd_ads_125">

			  <?php if($code != '') { ?>
			  	<div class="ad_code"><?php echo $code; ?></div>
			  <?php } else { ?>
			  	<a href="<?php echo $link ?>" title="<?php echo $titletip ?>"><img src="<?php echo $img ?>" alt="<?php echo $titletip ?>" /></a>
			  <?php } ?>
			  <?php if($code2 != '') { ?>
			  	<div class="ad_code"><?php echo $code2; ?></div>
			  <?php } else { ?>
			  	<a href="<?php echo $link2 ?>" title="<?php echo $titletip ?>"><img src="<?php echo $img2 ?>" alt="<?php echo $titletip ?>" /></a>
			  <?php } ?>
			  <?php if($code3 != '') { ?>
			  	<div class="ad_code"><?php echo $code3; ?></div>
			  <?php } else { ?>
			  	<a href="<?php echo $link3 ?>" title="<?php echo $titletip ?>"><img src="<?php echo $img3 ?>" alt="<?php echo $titletip ?>" /></a>
			  <?php } ?>
			  <?php if($code4 != '') { ?>
			  	<div class="ad_code"><?php echo $code4; ?></div>
			  <?php } else { ?>
			  	<a href="<?php echo $link4 ?>" title="<?php echo $titletip ?>"><img src="<?php echo $img4 ?>" alt="<?php echo $titletip ?>" /></a>
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
			//ad2
			$instance['link2'] = $new_instance['link2'];
			$instance['img2'] = $new_instance['img2'];
			$instance['code2'] = $new_instance['code2'];
			$instance['titletip2'] = $new_instance['titletip2'];

			//ad3
			$instance['link3'] = $new_instance['link3'];
			$instance['img3'] = $new_instance['img3'];
			$instance['code3'] = $new_instance['code3'];
			$instance['titletip3'] = $new_instance['titletip3'];

			//ad4
			$instance['link4'] = $new_instance['link4'];
			$instance['img4'] = $new_instance['img4'];
			$instance['code4'] = $new_instance['code4'];
			$instance['titletip4'] = $new_instance['titletip4'];

			return $instance;
		}

		function form( $instance ) {
			$defaults = array( 'title' =>__( 'advertisement' , 'bd'),
			'titletip' => __( 'Ads120x90' , 'bd'),
			'titletip2' => __( 'Ads120x90' , 'bd'),
			'titletip3' => __( 'Ads120x90' , 'bd'),
			'titletip4' => __( 'Ads120x90' , 'bd'),
			'img' => BD_IMG.'ads120-90.png',
			'link' => '#',
			'img2' => BD_IMG.'ads120-90.png',
			'link2' => '#',
			'img3' => BD_IMG.'ads120-90.png',
			'link3' => '#',
			'img4' => BD_IMG.'ads120-90.png',
			'link4' => '#',
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
			<h3>
			  <?php _e('Second Ads', 'bd') ?>
			</h3>
			<p>
			  <label for="<?php echo $this->get_field_id( 'img2' ); ?>">
			    <?php _e('image:', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'img2' ); ?>" name="<?php echo $this->get_field_name( 'img2' ); ?>" value="<?php if(isset($instance['img2'])){ echo $instance['img2']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'link2' ); ?>">
			    <?php _e('link2 :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php  if(isset($instance['link2'])){ echo $instance['link2']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'titletip2' ); ?>">
			    <?php _e('titletip2 :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'titletip2' ); ?>" name="<?php echo $this->get_field_name( 'titletip2' ); ?>" value="<?php if(isset($instance['titletip2'])){ echo $instance['titletip2'];  } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'code2' ); ?>">
			    <?php _e('ad code :', 'bd') ?>
			  </label>
			  <textarea id="<?php echo $this->get_field_id( 'code2' ); ?>" name="<?php echo $this->get_field_name( 'code2' ); ?>" class="widefat"  ><?php if(isset($instance['code2'])){ echo $instance['code2'];  } ?></textarea>
			</p>
			<h3>
			  <?php _e('Third Ads', 'bd') ?>
			</h3>
			<p>
			  <label for="<?php echo $this->get_field_id( 'img3' ); ?>">
			    <?php _e('image:', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'img3' ); ?>" name="<?php echo $this->get_field_name( 'img3' ); ?>" value="<?php if(isset($instance['img3'])){ echo $instance['img3'];} ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'link3' ); ?>">
			    <?php _e('link3 :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php if(isset($instance['link3'])){ echo $instance['link3']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'titletip3' ); ?>">
			    <?php _e('titletip3 :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'titletip3' ); ?>" name="<?php echo $this->get_field_name( 'titletip3' ); ?>" value="<?php if(isset($instance['titletip3'])){ echo $instance['titletip3']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'code3' ); ?>">
			    <?php _e('ad code :', 'bd') ?>
			  </label>
			  <textarea  name="<?php echo $this->get_field_name( 'code3' ); ?>" class="widefat"  ><?php if(isset($instance['code3'])){ echo $instance['code3']; } ?></textarea>
			</p>
			<h3>
			  <?php _e('Fourth Ads', 'bd') ?>
			</h3>
			<p>
			  <label for="<?php echo $this->get_field_id( 'img4' ); ?>">
			    <?php _e('image:', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'img4' ); ?>" name="<?php echo $this->get_field_name( 'img4' ); ?>" value="<?php if(isset($instance['img4'])){ echo $instance['img4']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'link4' ); ?>">
			    <?php _e('link4 :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" value="<?php if(isset($instance['link4'])){ echo $instance['link4']; } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'titletip4' ); ?>">
			    <?php _e('titletip4 :', 'bd') ?>
			  </label>
			  <input id="<?php echo $this->get_field_id( 'titletip4' ); ?>" name="<?php echo $this->get_field_name( 'titletip4' ); ?>" value="<?php if(isset($instance['titletip4'])){ echo $instance['titletip4'];  } ?>" class="widefat" />
			</p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'code4' ); ?>">
			    <?php _e('ad code :', 'bd') ?>
			  </label>
			  <textarea name="<?php echo $this->get_field_name( 'code4' ); ?>" class="widefat"  ><?php if(isset($instance['code4'])){ echo $instance['code4']; }  ?></textarea>
			</p>
		<?php
		}
	}

?>
