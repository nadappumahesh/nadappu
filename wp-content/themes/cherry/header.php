<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bd' ), max( $paged, $page ) );
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="<?php echo bdayh_get_option('layout_type');?>">
<div class="wrapper">
<div class="container">
<div class="header">

	<?php if(bdayh_get_option('hid_top_menu') == 0){ ?>
<div class="inner_toolbar">
	  <div class="wrapper">
	    <div class="content">
	      <div class="toolbar">

			<?php if(bdayh_get_option( 'top_date' )):
					if( bdayh_get_option('todaydate_format') ) $date_format = bdayh_get_option('todaydate_format');
					else $date_format = 'l ,  j  F Y';
			?>
			<span class="top-date"><?php  echo date_i18n( $date_format , current_time( 'timestamp' ) ); ?></span>
			<?php endif; ?>

	        <?php if ( has_nav_menu( 'topnav' ) ) { ?>
	        <?php  wp_nav_menu ( array( 'menu_class' => 'top_menu','container'=> 'ul', 'theme_location' => 'topnav' )); ?>
	        <?php } else { ?>
	        <ul class="top_menu">
	          <?php wp_list_pages(array(
	          'title_li' => false
	        )); ?>
	        </ul>
	        <?php } ?>

	        <!--//top menu-->

		    <?php
				$o_display = bdayh_get_option('topright_display');
				$o_social = bdayh_get_option('topright_social');
				$o_search = bdayh_get_option('topright_search');
			?>

		    <?php if ($o_display == 'none') { ?>

		    <?php } elseif ($o_display == 'social') { ?>

            	<?php echo footer_widget_social(); ?>

		    <?php } elseif ($o_display == 'search') { ?>

		        <div class="search">
		          <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
		            <input type="text" id="s" name="s" value="<?php _e( 'Search...' , 'bd' ) ?>" onfocus="if (this.value == '<?php _e( 'Search...' , 'bd' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search...' , 'bd' ) ?>';}"  />
		            <input class="search-button" type="submit" value="<?php _e( 'Search' , 'bd' ) ?>" />
		          </form>
		        </div>
		        <!--//search-->

		    <?php } else { ?>

		    <?php } ?>

	      </div>
	    </div>
	  </div>
	</div>
	<!--//toolbar-->
	<?php } ?>

  <header>
    <div class="content">
      <div class="logo">
      	<h1>
        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
	        <?php if(bdayh_get_option('bd_logo')){ ?>
	        	<img src="<?php echo bdayh_get_option('bd_logo'); ?>" alt="<?php bloginfo('name'); ?>" />
	        <?php } else { ?>
	        	<img src="<?php echo BD_IMG; ?>/logo.png" alt="<?php bloginfo('name'); ?>" />
	        <?php } ?>
	        </a>
        </h1>
      </div>
      <!--//logo-->
      <div class="headerads">
        <?php  if(bdayh_get_option('show_header_ads') == 1) {	if(bdayh_get_option('header_ads_code') != '') { ?>
        <?php echo stripslashes(bdayh_get_option('header_ads_code')); ?>
        <?php } else { ?>
        <a href="<?php echo bdayh_get_option('header_ads_img_url'); ?>" title="<?php echo bdayh_get_option('header_ads_img_altname'); ?>">
        <img src="<?php echo bdayh_get_option('header_ads_img'); ?>" alt="<?php echo bdayh_get_option('header_ads_img_altname'); ?>" />
        </a>
        <?php }}?>
      </div>
      <!--//header ads 468-->

      <div class="clear"></div>
    </div>
  </header>

<?php $stick = ''; ?>
<?php if( bdayh_get_option( 'stick_nav' ) ) $stick = 'class="fixed-enabled"' ?>
  <nav id="cherry-nav" <?php echo $stick; ?>>
    <div class="content">
      <?php if ( has_nav_menu( 'nav' ) ) { ?>
      <?php  wp_nav_menu ( array( 'menu_class' => 'menu','cherry'=> 'ul', 'theme_location' => 'nav' )); ?>
      <?php } else { ?>
      <ul class="menu">
        <li class="home <?php if (is_home()) {echo "current-page-item";} ?> ">
          <a href="<?php echo home_url(); ?>">
          <?php _e('Home', 'cherry'); ?>
          </a>
        </li>
        <?php wp_list_categories(array(
            'title_li' => false,
            'hierarchical' => 1
          )); ?>
      </ul>
      <?php } ?>
    </div>
  </nav>

</div>
<!--//header-->
<div class="clear"></div>
<div class="content">

	<?php if(bdayh_get_option('newsticker') == 1){ ?>
	<?php require BD_TM .'/breakingnews.php'; ?>
	<!--//newsticker-->
	<?php } ?>

	<?php if(bdayh_get_option('show_alert_bar') == 1){ ?>
	<div class="content">
	<div class="alert_home">
	  <p>
	    <?php echo stripslashes(bdayh_get_option('show_alert_content')); ?>
	  </p>
	  <span class="alert_home_close">
	  <img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/close-exit.png" /></span>
	</div>
	</div><!--//alert_home-->
	<?php } ?>

<div class="content_wrapper <?php $sidepos =  get_post_meta($post->ID, 'cherry_side_layout', true); echo ''.$sidepos;?>">
<div class="wrapper">
<!--//start main-->
<div class="inner_wrapper">
<div class="content">
