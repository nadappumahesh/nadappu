<?php
/*
Template Name: Authors blocks
*/
?>

<?php get_header(); ?>

<script src="<?php echo BD_JS; ?>/jquery.masonry.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(function() {
			var $container = jQuery('.bd_authors');
				$container.masonry({
					//columnWidth: 220,
					isResizable: true,
					itemSelector: '.author_box',
					isAnimated: true,
					isAnimatedFromBottom: true,
					isFitWidth: true,
					animationOptions: {
						duration: 750,
						easing: 'easeInOutExpo'
					}
				});
			});

		});
</script>

<div class="sidebar_content">
  <div class="authors-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="bd_authors">

      <?php $users = get_users('blog_id=1&orderby=post_count&order=DESC'); foreach ($users as $user) { ?>
      <div class="box_inner author_box">
        <div class="news_box">
          <div>
            <ul class="authors_wrap">
              <li class="page_authors_avatar">
                <div class="post_thumbnail">
                  <?php echo get_avatar( get_the_author_meta( 'user_email' , $user->ID ), apply_filters( 'MFW_author_bio_avatar_size', 190 ) ); ?>
                </div>
                <div class="author-description">
                  <h3>
                    <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
                    <?php echo $user->display_name ?>
                    </a>
                  </h3>
                  <p>
                    <?php the_author_meta( 'description'  , $user->ID ); ?>
                  </p>
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
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
    <?php endwhile; ?><!--//end author box-->
  </div>
</div><!--//content-->

<?php get_footer(); ?>
