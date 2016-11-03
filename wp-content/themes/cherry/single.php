<?php get_header(); ?>

<?php if(bdayh_get_option('article_meta_pagination_stick') == 1){ ?>
	<ul class="pp-prev-next-article">
	  <li class="pp-next">
	      <span class="pp-arrow-right"></span>
	      <p class="pp-nn-t">Next article</p>
	      <p class="pp-nn-b"><?php next_post_link( '%link', '%title' ); ?></p>
	  </li>
	  <li class="pp-prev">
	      <span class="pp-arrow-prev"></span>
	      <p class="pp-nn-t">Previous article</p>
	      <p class="pp-nn-b"> <?php previous_post_link( '%link', '%title' ); ?></p>
	  </li>
	</ul>
<?php } ?>

<div class="sidebar_content <?php if (!comments_open() ||  post_password_required()) { ?>comments_close<?php }else{ ?>comments_open<?php } ?>">
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="box_inner">
      <div class="news_box">

		<?php if(bdayh_get_option('article_crumbs') == 1) { ?>
			<div class="pp-breadcrumbs">
			<?php bd_breadcrumbs() ?>
			</div><!--//end breadcrumbs-->
		<?php } ?>

		<?php
			$ppslider_show = get_post_meta($post->ID, 'cherry_ppslider_show', true);
		?>
		<?php if($ppslider_show == 'on') { ?>
			<?php
		        pp_gallery( $post->ID );
		    ?>
	    <?php } ?>

		<?php
			$thumb_show = get_post_meta($post->ID, 'cherry_thumb_show', true);
		?>
        <?php if($thumb_show == 'on') { ?>

			<?php $timthumb = bdayh_get_option('timthumb');
	        if ($timthumb == true) { ?>

	        	<div class="pp-thumb">
	        	<a href="<?php echo bd_post_image('large'); ?>" rel="prettyPhoto">
	    			<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=999999&amp;w=853&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            </a>
	            </div><!--//end thumb-->
		    <?php } else { ?>
					<?php
						$thumb = bd_post_image('large');
						$ntImage = aq_resize( $thumb, 853, 999999, true );
						if($ntImage == ''){ $ntImage = BD_IMG .'/default_thumb.png'; }
					?>
					<?php if (strpos(bd_post_image(), 'youtube')) { ?>
						<img src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
						<img src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
						<img src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } else { ?>
						<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					<?php } ?>
					<br />
					<div class="clear bottom20"> </div>
		    <?php } ?>

	    <?php } ?>

		<?php
			$article_type = get_post_meta($post->ID, 'cherry_article_type', true);
			$type = get_post_meta($post->ID, 'cherry_video_type', true);
			$id = get_post_meta($post->ID, 'cherry_video_id', true);
			$vid_show = get_post_meta($post->ID, 'cherry_video_show', true);
		?>

        <?php if($vid_show == 'on') { ?>
			<div class="pp-video">
	        <?php if($type == 'youtube') { ?>
	        	<iframe width="100%" height="380" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
	        <?php } elseif($type == 'vimeo') { ?>
	        	<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="100%" height="380" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	        <?php } elseif($type == 'daily') { ?>
	        	<iframe frameborder="0" width="100%" height="380" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
	        <?php } ?>
        	</div><!--//end video-->
        <?php } ?>

        <h1 class="name news_box_title4 singlepost-titles-pp" itemprop="name"><?php the_title(); ?></h1>
        <!--//end entry title-->

        <?php if(bdayh_get_option('article_meta_entry') == 1){ ?>
        <div class="entry_meta">
          <div class="left">

            <?php if(bdayh_get_option('article_author_avatar') == 1) { ?>
	            <div class="post_thumbnail"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 52 ) ); ?></div>
	            <!--//avatar-->
            <?php } ?>

            <?php if(bdayh_get_option('article_author') == 1) { ?>
	            <span class="meta_author"><?php _e('Posted by :', 'bd'); ?>
	            	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
	            		<?php echo get_the_author() ?>
	            	</a>
	            </span>
            <?php } ?>

            <?php if(bdayh_get_option('article_date') == 1){ ?>
	            <span class="meta_date"><?php _e('Posted date :', 'bd'); ?><strong> <?php the_time(get_option('date_format')); ?></strong></span>
            <?php } ?>

            <?php if(bdayh_get_option('article_category') == 1){ ?>
	            <span class="meta_cat"><strong><?php _e( 'In ' , 'bd' ); ?> <?php printf('%1$s', get_the_category_list( ', ' ) ); ?></strong></span>
            <?php } ?>

            <?php if(bdayh_get_option('article_comments') == 1){ ?>
	            <span class="meta_comments"><?php comments_popup_link( __( '0', 'bd' ), __( '1 Comment', 'bd' ), __( '% Comments', 'bd' ) ); ?></span>
            <?php } ?>

          </div>

	        <?php if(bdayh_get_option('posts_ratings_article') == 1){ ?>
	         <div class="rate"><?php print PostRatings()->getControl(); ?></div>
	        <?php } ?>

        </div>
        <!--//end entry_meta-->
        <?php } ?>

        <div class="inner_post single_article_content">

        <?php if(bdayh_get_option('article_above_ads') == 1){ ?>
	        <div class="article_above_ads">
		        <?php if(bdayh_get_option('above_ads_code') != '') { ?>
		     	<?php echo stripslashes(bdayh_get_option('above_ads_code')); ?>
		        <?php } else { ?>
		         <a href="<?php echo bdayh_get_option('above_ads_img_url'); ?>" title="<?php echo bdayh_get_option(__('above_ads_img_altname')); ?>">
		         	<img src="<?php echo bdayh_get_option('above_ads_img'); ?>" alt="<?php echo bdayh_get_option(__('above_ads_img_altname')); ?>" />
		         </a>
		        <?php }?>
	        </div>
	        <!--//article_above_ads-->
        <?php }?>


		<div class="pp-code post-page-entry-pp">
		<?php the_content(); ?>

  		<span style="display:none" class="updated"><?php the_time( 'Y-m-d' ); ?></span>
		<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><?php the_author_posts_link(); ?></strong></div>
		</div><!--//END Content-->

        <?php if(bdayh_get_option('article_below_ads') == 1){ ?>

	        <div class="article_above_ads">
	          <?php if(bdayh_get_option('below_ads_code') != '') { ?>
					<?php echo stripslashes(bdayh_get_option('below_ads_code')); ?>
	          <?php } else { ?>
					<a href="<?php echo bdayh_get_option('below_ads_img_url'); ?>" title="<?php echo bdayh_get_option(__('below_ads_img_altname')); ?>">
						<img src="<?php echo bdayh_get_option('below_ads_img'); ?>" alt="<?php echo bdayh_get_option(__('below_ads_img_altname')); ?>" />
					</a>
	          <?php }?>
	        </div>
	        <!--//article_below_ads-->

        <?php }?>

        </div>
        <!--//end entry-->

        <?php if(bdayh_get_option('article_tags') == 1){ ?>
	        <div class="tags article_tags">
	          <span class="title"><?php _e('Tags','bd')?></span>
		          <div class="tagcloud">
		            <?php the_tags('','',''); ?>
		          </div>
	        </div>
	        <!--//end tags-->
        <?php } ?>

        <?php if(bdayh_get_option('article_socail') == 1){ ?>
        	<div class="postmeta_share">
	        	<?php require BD_TM .'/post-social-shers.php'; ?>
	        </div><!--//postmeta_share-->
        <?php } ?>

      </div>
    </div>
  </div>
  <!--//end post-->
  <?php endwhile;?>

		<?php if(bdayh_get_option('article_meta_pagination') == 1){ ?>
		 <div class="bdayh_post_nav">
		   <div class="bdayh_post_previous">
		     <?php previous_post_link( '%link', '%title' ); ?>
		   </div>
		   <div class="bdayh_post_next">
		     <?php next_post_link( '%link', '%title' ); ?>
		   </div>
		 </div>
		<?php } ?>

		<?php if(bdayh_get_option('article_author_box') == 1){ ?>
			<div class="box_inner author_box">
			  <div class="news_box">
			    <h2 class="news_box_title2">
			      <?php _e( 'About', 'bd' ) ?>
			      <span>
			      <?php the_author() ?>
			      </span></h2>
			    <?php bd_author_box(get_the_author_meta('ID')) ?>
			  </div>
			</div>
			<!--//end author box-->
		<?php } ?>

		<?php if(bdayh_get_option('article_related') == 1){ ?>
			<?php require BD_TM . '/related.php';?>
		<?php } ?>

		<?php if (comments_open() && !post_password_required()) { ?>
			<?php comments_template('', true); ?>
		<?php } ?>

</div>
<!--//content-->

		<div class="sidebar_wrapper">
		  <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Article Sidebar')){ }else { ?>
		  	<?php get_sidebar(); ?>
		  <?php } ?>
		</div>

<?php get_footer(); ?>