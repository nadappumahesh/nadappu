<div class="box_inner cat_box" >
  <div class="news_box">
    <h3 class="news_box_title2">
      <a href="<?php echo get_category_link($GLOBALS['bd_cat_id']); ?> ">
      	<?php echo get_cat_name($GLOBALS['bd_cat_id']);?>
      </a>
    </h3>
    <ul>
      <?php query_posts(array('showposts' => 1, 'cat' => $GLOBALS['bd_cat_id']  )); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="first_news">
        <div class="inner_post">
        <h2>
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
            	<?php the_title();?>
            </a>

          </h2>
          <div class="first-post-thumbnail-box">
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=93&amp;w=93&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 93, 93, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  	<img src="<?php echo bd_post_image('large'); ?>" width="93" height="93" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  	<img src="<?php echo bd_post_image('large'); ?>" width="93" height="93" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  	<img src="<?php echo bd_post_image('large'); ?>" width="93" height="93" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  	<img src="<?php echo $ntImage; ?>" width="93" height="93"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
          </div><!--//post_thumbnail-->
          <div class="post_meta">
            <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
            	<?php echo get_the_author() ?>
            </a>
            <a class="date">
            	<?php the_time(get_option('date_format')); ?>
            </a>
          </div>
          <?php if(bdayh_get_option('posts_ratings_home') == 1){ ?>
				<span class="post-rate-box-first-post-top"><?php print PostRatings()->getControl(); ?></span>
			<?php } ?>

          <p>
            <?php the_excerpt_max_charlength('160'); ?>
          </p>
        </div>
      </li>
      <?php endwhile; endif;?>
      <?php wp_reset_query(); ?>

      <?php query_posts(array('showposts' => $GLOBALS['bd_total_posts'],'offset'=>1, 'cat' => $GLOBALS['bd_cat_id']  )); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li>
        <div class="inner_post">
          <div class="post_thumbnail">
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=69&amp;w=69&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            <?php } else { ?>
	            <?php
                    $thumb = bd_post_image('large');
                    $ntImage = aq_resize( $thumb, 69, 69, true );
					if($ntImage == '')
						{
							$ntImage = BD_IMG .'/default_thumb.png';
						}
                    ?>
		            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="69" height="69" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="69" height="69" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="69" height="69" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } ?>
	            <?php } ?>
            </a>
          </div><!--//post_thumbnail-->
          <h2>
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
            	<?php the_title();?>
            </a>
          </h2>
          <div class="post_meta">
            <a class="date">
            	<?php the_time(get_option('date_format')); ?>
            </a>
          </div>
        </div>
      </li>
      <?php endwhile; endif;?>
      <?php wp_reset_query(); ?>
    </ul>
  </div>
</div>
