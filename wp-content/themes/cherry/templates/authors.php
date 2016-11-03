<?php
/*
Template Name: Authors
*/
?>
<?php get_header(); ?>

<div class="sidebar_content">
  <?php bd_breadcrumbs() ?>
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title2">
        <?php the_title(); ?>
      </h2>
      <div class="clear"></div>
      <?php if(have_posts()) : while(have_posts()) : the_post('');?>
      <div class="entry_cont">
        <?php the_content(); ?>
      </div>
      <div>
        <ul class="authors_wrap">
          <?php $users = get_users('blog_id=1&orderby=post_count&order=DESC'); foreach ($users as $user) {	?>
	          <li>
	            <div class="post_thumbnail">
	              <?php echo get_avatar( get_the_author_meta( 'user_email' , $user->ID ), apply_filters( 'MFW_author_bio_avatar_size', 80 ) ); ?>
	            </div>
	            <div class="author-description">
	              <h3>
	                <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
	                <?php echo $user->display_name ?>
	                </a>
	              </h3>
	              <?php the_author_meta( 'description'  , $user->ID ); ?>
	            </div>
	            <div class="author_social">
	              <?php if ( get_the_author_meta( 'url' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'url' , $user->ID); ?>" title="<?php echo $user_identity ?> <?php _e( 'site', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/home.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'facebook' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'facebook', $user->ID ); ?>" title="<?php echo $user_identity ?><?php _e( 'on Facebook', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/facebook.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'twitter' , $user->ID) ) : ?>
	              <a href="http://twitter.com/<?php the_author_meta( 'twitter', $user->ID ); ?>" title="<?php echo $user_identity ?><?php _e( 'on Twitter', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/twitter.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'google' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'google', $user->ID ); ?>" title="<?php echo $user_identity ?><?php _e( 'on Google+', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/gplus.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'linkedin' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'linkedin' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( 'on Linkedin', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/linkedin.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'pinterest' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'pinterest' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( 'on Pinterest', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/pinterest.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'youtube' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'youtube' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( 'on YouTube', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/youtube.png" alt="" />
	              </a>
	              <?php endif ?>

	              <?php if ( get_the_author_meta( 'flickr' , $user->ID) ) : ?>
	              <a href="<?php the_author_meta( 'flickr' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( 'on Flickr', 'bd' ); ?>">
	              	<img src="<?php echo BD_IMG; ?>/small_social_icons/flickr.png" alt="" />
	              </a>
	              <?php endif ?>

	            </div>
	            <div class="clear"></div>
	          </li>
          <?php } ?>

        </ul>
      </div>
      <?php endwhile; ?>
      <?php  else:  ?>
      <?php  endif; ?>
    </div>
  </div><!--//end author box-->
  <div class="clear"></div>
  <?php comments_template('', true); ?>
</div><!--//content-->
<div class="sidebar_wrapper">
  <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Page Sidebar')){ }else { ?>
  <?php get_sidebar(); ?>
  <?php } ?>
</div>
<?php get_footer(); ?>
