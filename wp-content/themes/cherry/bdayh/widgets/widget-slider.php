<?php

	add_action( 'widgets_init', 'bd_slider_widget' );
	function bd_slider_widget() {
		register_widget( 'bd_slider' );
	}

	class bd_slider extends WP_Widget {

		function bd_slider() {
			$widget_ops = array( 'classname' => 'bd-slider' );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'bd-slider-widget' );
			$this->WP_Widget( 'bd-slider-widget',theme_name .' - Slider', $widget_ops, $control_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );

			$no_of_posts = $instance['no_of_posts'];
			$cats_id = $instance['cats_id'];

			$argss= array('posts_per_page'=> $no_of_posts , 'category__in' => $cats_id);
			$featured_query = new WP_Query( $argss );

		if( $featured_query->have_posts() ) : ?>
		<div class="flexslider widgetslider" id="<?php echo $args['widget_id']; ?>">
			<ul class="slides">
			<?php while ( $featured_query->have_posts() ) : $featured_query->the_post()?>
				<li>
					<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			           <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
			           	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=215&amp;w=298&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			           <?php } else { ?>
			           <?php

			               $thumb = bd_post_image('large');
			               $ntImage = aq_resize( $thumb, 298, 215, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
			               ?>

			            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
			            	<img src="<?php echo bd_post_image('large'); ?>" width="298" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
			            	<img src="<?php echo bd_post_image('large'); ?>" width="298" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
			            	<img src="<?php echo bd_post_image('large'); ?>" width="298" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } else { ?>
			            	<img src="<?php echo $ntImage; ?>" width="298" height="215"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } ?>
			           <?php } ?>
		           </a>
					<div class="slider-caption">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</div>
				</li>
			<?php endwhile;?>
			</ul>
		</div>
		<?php endif; ?>
		<script>
		jQuery(window).load(function() {
		  jQuery('#<?php echo $args['widget_id']; ?>').flexslider({
			animation: "fade",
			slideshowSpeed: 7000,
			animationSpeed: 600,
			randomize: false,
			pauseOnHover: true,
			controlNav: false
		  });
		});
		</script>

		<?php
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['cat_posts_title'] = strip_tags( $new_instance['cat_posts_title'] );
			$instance['no_of_posts'] = strip_tags( $new_instance['no_of_posts'] );

			$instance['cats_id'] = implode(',' , $new_instance['cats_id']  );

			$instance['thumb'] = strip_tags( $new_instance['thumb'] );
			return $instance;
		}

		function form( $instance ) {
			$defaults = array( 'no_of_posts' => '5' , 'cats_id' => '1' );
			$instance = wp_parse_args( (array) $instance, $defaults );

			$categories_obj = get_categories();
			$categories = array();

			foreach ($categories_obj as $pn_cat) {
				$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
			}
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>">Number of posts to show: </label>
				<input id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php echo $instance['no_of_posts']; ?>" type="text" size="3" />
			</p>
			<p>
				<?php $cats_id = explode ( ',' , $instance['cats_id'] ) ; ?>
				<label for="<?php echo $this->get_field_id( 'cats_id' ); ?>">Category : </label>
				<select multiple="multiple" id="<?php echo $this->get_field_id( 'cats_id' ); ?>[]" name="<?php echo $this->get_field_name( 'cats_id' ); ?>[]">
					<?php foreach ($categories as $key => $option) { ?>
					<option value="<?php echo $key ?>" <?php if ( in_array( $key , $cats_id ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
					<?php } ?>
				</select>
			</p>


		<?php
		}
	}
?>