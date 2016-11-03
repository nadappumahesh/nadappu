<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package  WellThemes
 * @file     header.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="google-site-verification" content="QVhtli312FugUyJEELxrdIOgubKFO5zRM_j0ioj7rFs" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'wellthemes' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript">
	var themeDir = "<?php echo get_template_directory_uri(); ?>";
</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>
<body <?php body_class(); ?>>

<div id="container" class="hfeed">	
	<?php
		if (is_home() && $paged < 2 ){
			if ( wt_get_option( 'wt_show_top_posts' ) == 1 ) {
				get_template_part( 'includes/top-stories' );
			}
		}
	?>
	<header id="header" role="banner">			
		<div class="wrap">						
			<div class="logo">
			<?php if (wt_get_option( 'wt_logo_url' )) { ?>
				<h1>
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo wt_get_option( 'wt_logo_url' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</h1>	
			<?php } else {?>
				<h1 class="site-title">
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</h1> 
				<h3>
					<?php bloginfo('description'); ?>
				</h3>
			<?php } ?>
<div class="date">				
				<?php 
					//get the time zone from the WordPress settings
					$wp_timezone =  get_option('timezone_string');
					if(!empty($wp_timezone)){
						date_default_timezone_set(get_option('timezone_string'));
					}
										
					//display date in WordPress local language
					echo date_i18n('l, jS F Y', time()); 
					
					//if there is problem with date, you can use following function
					//echo date('l, jS F Y');
					
				?>
			</div>	
			</div>	<!-- /logo -->	
		
			
			

			<div class="top-banner-ad" ><p><a href="http://turningpointstudycircle.com/">
<img src="http://nadappu.com/wp-content/uploads/2014/05/tp-t1.jpg" ></a></p></div>			
			
			
		
		
		</div> <!-- /wrap -->		
		
		<div id="main-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '0', 'fallback_cb' => 'wellthemes_main_menu_fallback',) ); ?>	
		</div>
			
<div class="scrol-news">
<?php 
$args = array('suppress_filters' => 0, 'post_type' => array('post', 'page'), 'post_status' => 'publish', 'numberposts' => 10, 'orderby' => 'post_date', 'order' => 'desc', 'category' => 14544);
		
	$wp_news_myposts = get_posts($args);
        
        if($wp_news_myposts) {
                
                ?>
                <div class="news_wrapper">
                        <p style="background-color: #1779D4; color: #FFFFFF;float: left; padding: 10px;" class="label">தற்போது : </p>
                        
                               <marquee style="color: #0000FF;float: left;padding: 10px;width: 90.3%;" scrollamount="3" scrolldelay="10" onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" direction="left" >
                
                <?php foreach( $wp_news_myposts as $post ) :	setup_postdata($post); ?>
        <!--  <strong><?php the_time(get_option("date_format")) ?></strong> - --><a style="color: blue;" href="<?php the_permalink(); ?>"><strong><?php the_title();?></strong></a> || <?php // echo wp_news_cut_content_feat(get_the_excerpt(), 35, "...");?> 
                           
                
        
        <?php

                endforeach;
                
        ?>
                            
                                  </marquee>
                
                        </div>
               
                        
                       
                
        
        <?php

        }
        
        wp_reset_query();
		?>
	</div>
<div class="clearfix"></div>
			
	</header>

	<div id="main">