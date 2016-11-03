<?php

	add_action( 'widgets_init', 'counter_widget_box' );
	function counter_widget_box()
	{
		register_widget( 'counter_widget' );
	}
	class counter_widget extends WP_Widget
	{

		function counter_widget()
		{
			$widget_ops = array( 'classname' => 'counter-widget', 'description' => 'Widget display a count of your rss subscribers, Twitter followers, facebook fans'  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'counter-widget' );
			$this->WP_Widget( 'counter-widget', Cherry .' - Social Counter', $widget_ops, $control_ops );
		}

		function widget( $args, $instance )
		{
			$facebook_page = $instance['facebook'] ;
			$rss_id = $instance['rss'] ;
			$twitter_id =  $instance['twitter'] ;
            $youtube_url = $instance['youtube'] ;
            $vimeo_url = $instance['vimeo'] ;
			$dribbble_url = $instance['dribbble'];
            $new_window = $instance['new_window'];

			if( $new_window ) $new_window =' target="_blank" ';
			else $new_window ='';

			$counter = 0;
			if( $rss_id ) $counter ++ ;
			if( $twitter_id ) $counter ++ ;
			if( $facebook_page ) $counter ++ ;
			if( $youtube_url ) $counter ++ ;
			if( $vimeo_url ) $counter ++ ;
			if( $dribbble_url ) $counter ++ ;

			?>

<div id="widget-counters" class="widget">
<div class="widget_container widget_counters">
<ol>
<?php if( $rss_id ): ?>
<li class="rss_subscribers">
<a href="<?php echo $rss_id ?>" <?php echo $new_window ?> >
<span class="icon"></span>
<span><?php _e('Subscribe' , 'bd' ) ?><?php __('Subscribers' , 'bd' ) ?></span>
<small><?php _e('Rss' , 'bd' ) ?></small>
</a>
</li>
<?php endif; ?>
<?php
	if( $facebook_page ):
	$facebook = ags_facebook_fans( $facebook_page );
?>
<li class="facebook_fans">
<a href="<?php echo $facebook_page ?>" <?php echo $new_window ?> >
<span class="icon"></span>
<span><?php echo @number_format( $facebook ) ?></span>
<small><?php _e('Fans' , 'bd' ) ?></small>
</a>
</li>
<?php endif; ?>
<?php
	if( $twitter_id ):
	$twitter = AGS_followers_count();
?>
<li class="twitter_followers">
<a href="<?php echo $twitter['page_url'] ?>"<?php echo $new_window ?>>
<span class="icon"></span>
<span><?php echo @number_format($twitter['followers_count']) ?></span>
<small><?php _e('Followers' , 'bd' ) ?></small>
</a>
</li>
<?php endif; ?>
<?php
	if( $youtube_url ):
	$youtube = AGS_youtube_subs( $youtube_url );
?>
<li class="youtube_subs">
<a href="<?php echo $youtube_url ?>" <?php echo $new_window ?> >
<span class="icon"></span>
<span><?php echo @number_format( $youtube ) ?></span>
<small><?php _e('Subscribers' , 'bd' ) ?></small>
</a>
</li>
<?php endif; ?>
<?php
	if( $vimeo_url ):
	$vimeo = AGS_vimeo_count( $vimeo_url );
?>
<li class="vimeo_subs">
<a href="<?php echo $vimeo_url ?>"<?php echo $new_window ?>>
<span class="icon"></span>
<span><?php echo @number_format( $vimeo ) ?></span>
<small><?php _e('Subscribers' , 'bd' ) ?></small>
</a>
</li>
<?php endif; ?>
<?php
	if( $dribbble_url ):
	$dribbble = AGS_dribbble_count( $dribbble_url );
?>
<li class="dribbble_followers">
<a href="<?php echo $dribbble_url ?>"<?php echo $new_window ?>>
<span class="icon"></span>
<span><?php echo @number_format( $dribbble ) ?></span>
<small><?php _e('Followers' , 'bd' ) ?></small>
</a>
</li>
<?php endif; ?>
</ol>
</div>
</div><!--//widget counters-->
		<?php
		}

		function update( $new_instance, $old_instance )
		{
			$instance = $old_instance;
			$instance['new_window'] = strip_tags( $new_instance['new_window'] );
			$instance['facebook'] = $new_instance['facebook'] ;
			$instance['rss'] =  $new_instance['rss'] ;
			$instance['twitter'] =  $new_instance['twitter'] ;
			$instance['youtube'] =  $new_instance['youtube'] ;
			$instance['vimeo'] =  $new_instance['vimeo'] ;
			$instance['dribbble'] =  $new_instance['dribbble'] ;

			return $instance;
		}

		function form( $instance )
		{
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
            <p>
				<label for="<?php echo $this->get_field_id( 'new_window' ); ?>">Open links in a new window : </label>
				<input id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="true" <?php if( $instance['new_window'] ) echo 'checked="checked"'; ?> type="checkbox" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Feed URL : </label>
				<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" type="text" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook Page URL : </label>
				<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" type="text" />
				<small>http://www.facebook.com/username/ or http://www.facebook.com/PageID/</small>

			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Enable Twitter : </label>
				<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="true" <?php if( $instance['twitter'] ) echo 'checked="checked"'; ?> type="checkbox"  />
				<small><span style="color:red;">Make sure you Setup Twitter API OAuth settings under Theme Panel > Advanced Settings tab .</span></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Youtube Channel URL : </label>
				<input id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" class="widefat" type="text" />
				<small>http://www.youtube.com/user/username</small>
			</p>
			<p style="border-bottom: 1px solid #DDD;padding-bottom: 10px;">
				<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>">Vimeo Channel URL : </label>
				<input id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" class="widefat" type="text" />
				<small>Link must be like http://vimeo.com/channels/username </small>

			</p>
			<p style="border-bottom: 1px solid #DDD;padding-bottom: 10px;">
				<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>">dribbble Page URL : </label>
				<input id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" class="widefat" type="text" />
				<small>Link must be like http://dribbble.com/username</small>

			</p>

		<?php
		}
	}


?>