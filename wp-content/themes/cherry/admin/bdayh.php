<?php

		//Disable error reporting
		error_reporting(0);

		//BDAYH Theme Directory and URI
		define('BD_DIR', get_template_directory());
		define('BD_URI', get_template_directory_uri());

		//BDAYH Framework
		define('BD_FW', BD_URI ."/admin/");
		define('BD_BD', BD_DIR ."/bdayh");
		define('BD_FW_IMG', BD_FW .'/assets/images/');
		define('BD_ADMIN', BD_DIR . '/admin/');
		define('BD_FU', BD_DIR . '/admin/functions/');
		define('BD_META', BD_BD . '/metaboxes');

		define('BD_TM', BD_DIR ."/templates/");
		define('BD_IMG', BD_URI . '/assets/images/');
		define('BD_CSS', BD_URI . '/assets/css');
		define('BD_JS', BD_URI . '/assets/js');
		define('BD_SC', BD_DIR . '/bdayh/shortcodes');

		define( 'MTHEME_NOTIFIER_THEME_NAME', 'Cherry' );
		define( 'MTHEME_NOTIFIER_THEME_FOLDER_NAME', BD_DIR );
		define( 'MTHEME_NOTIFIER_XML_FILE', 'http://bdayh.com/notify.xml' );
		define( 'MTHEME_NOTIFIER_CACHE_INTERVAL', 1 );

		//BDAYH Admin Option
		require BD_DIR . '/aq_resizer.php';

        // Custom Functions
		include (TEMPLATEPATH . '/custom-functions.php');

		require BD_ADMIN . '/options.php';
		require BD_FU . '/twitteroauth/twitteroauth.php';
		require BD_FU . '/pagenavi.php';
		require BD_FU . '/breadcrumbs.php';
		require BD_FU . '/admin-thumbnails.php';
		require BD_FU . '/post-ratings/post-ratings.php';

		require BD_DIR . '/bdayh/metaboxes/meta-box.php';
		require BD_DIR . '/bdayh/metaboxes/theme_metaboxes.php';
		require BD_SC . '/shortcode.php';

		//BDAYH Assest
		define('BD_WIDGET', BD_DIR . '/bdayh/widgets');

		// BDAYH Custom widgets
		require BD_WIDGET . '/widget-feedburner.php';
		require BD_WIDGET . '/widget-facebook.php';
		require BD_WIDGET . '/widget-social-counter.php';
		require BD_WIDGET . '/widget-social.php';
		require BD_WIDGET . '/widget-video.php';
		require BD_WIDGET . '/widget-login.php';
		require BD_WIDGET . '/widget-tabs.php';
		require BD_WIDGET . '/widget-popular.php';
		require BD_WIDGET . '/widget-recent.php';
		require BD_WIDGET . '/widget-comments.php';
		require BD_WIDGET . '/widget-search.php';
		//require BD_WIDGET . '/widget-followusontwitter.php';
		require BD_WIDGET . '/widget-twitterfeed.php';
		require BD_WIDGET . '/widget-followusongoogle.php';
		require BD_WIDGET . '/widget-flickr.php';
		require BD_WIDGET . '/widget-category.php';
		require BD_WIDGET . '/widget-newsinpic.php';
		require BD_WIDGET . '/widget-slider.php';
		require BD_WIDGET . '/widget-youtube.php';
		require BD_WIDGET . '/widget-ads125.php';
		require BD_WIDGET . '/widget-ads120_90.php';
		require BD_WIDGET . '/widget-ads280.php';
		require BD_WIDGET . '/widget-ads250.php';
		require BD_WIDGET . '/widget-ads160.php';
		require BD_WIDGET . '/widget-ads300.php';
		include_once('notifier.php');



	   	/* BD Custom CSS
		----------------------------------------------*/
		add_action('wp_enqueue_scripts', 'enqueue_css');
		function enqueue_css() {

			wp_enqueue_style('default', get_stylesheet_uri() .  '', '', null, 'all');

			if( bdayh_get_option( 'disable_responsive' ) == 0){
				wp_enqueue_style('responsive', BD_CSS . '/responsive.css', 'style');
	  		}
			wp_enqueue_style( 'droidsans', "http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css" );
			wp_enqueue_style( 'armata', "http://fonts.googleapis.com/css?family=Armata%3A400&#038;ver=3.5.1' rel='stylesheet' type='text/css" );
			wp_enqueue_style( 'oswald', "http://fonts.googleapis.com/css?family=Oswald%3A400%2C700&#038;ver=3.5.2' rel='stylesheet' type='text/css" );
		}


add_action('wp_head', 'cherry_wp_head');
function cherry_wp_head() {if( bdayh_get_option( 'disable_responsive' )){
?>
<meta name="viewport" content="width=1045" />
<?php }else{ ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php
}
if(bdayh_get_option('seo_settings') == 1){
?>
<?php if( is_home() || is_front_page() ) { ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="keywords" content="<?php echo stripslashes(bdayh_get_option('seo_keywords')); ?>" />
<?php
}
elseif (is_single() || is_page() ){ if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php the_excerpt_rss(); ?>" />
<?php csv_tags(); ?>
<?php endwhile; endif; wp_reset_query();
}
?>
<?php
}

if(bdayh_get_option('skin_color')  == 'red'){
?>
<?php } else { ?>
<?php
}

if(bdayh_get_option('skin_color')  == 'blue'){
?>
<link href="<?php echo BD_CSS; ?>/blue.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}

if(bdayh_get_option('skin_color')  == 'green'){
?>
<link href="<?php echo BD_CSS; ?>/green.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}

if(bdayh_get_option('skin_color')  == 'rose'){
?>
<link href="<?php echo BD_CSS; ?>/rose.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}

if(bdayh_get_option('skin_color')  == 'orange'){
?>
<link href="<?php echo BD_CSS; ?>/orange.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}

if(bdayh_get_option('skin_color')  == 'gray'){
?>
<link href="<?php echo BD_CSS; ?>/gray.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}

echo stripslashes(bdayh_get_option('header_code'));
include BD_FU .'/custom-css.php';
}



		/* BD Custom JS
		----------------------------------------------*/
        add_action('wp_enqueue_scripts', 'bd_register_js');
		function bd_register_js()
		{
			if (!is_admin())
			{
				wp_register_script('slider', BD_JS . '/jquery.cycle.all.min.js', 'jquery',true,true);
				wp_register_script('easing', BD_JS . '/jquery.easing.1.3.js', 'jquery',true,true);
				wp_register_script('custom', BD_JS . '/custom.js', 'jquery',true,true);
				wp_register_script('modernizr', BD_JS . '/modernizr.custom.63321.js', 'jquery',true,true);
                wp_register_script('flexslider', BD_JS . '/jquery.flexslider-min.js', 'jquery',true,true);
                wp_register_script('jquery_prettyPhoto', BD_JS . '/jquery.prettyPhoto.js', 'jquery',true,true);
				wp_register_script('bd_custom', BD_JS . '/cherry-scripts.js', 'jquery',true,true);
				wp_enqueue_script('jquery');
				wp_enqueue_script('slider');
				wp_enqueue_script('easing');
				wp_enqueue_script('custom');
                wp_enqueue_script('modernizr');
                wp_enqueue_script('flexslider');
                wp_enqueue_script('jquery_prettyPhoto');
				wp_enqueue_script('bd_custom');
				if(is_singular())
				wp_enqueue_script( 'comment-reply' );
			}

?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<script type="text/javascript">
var cherry_url = '<?php bloginfo('template_url'); ?>';
</script>
<!--[if lt IE 9]>
<script type='text/javascript' src='<?php echo BD_JS; ?>/selectivizr-min.js'></script>
<script type='text/javascript' src='<?php echo BD_JS; ?>/html5.js'></script>
<![endif]-->
<!--[if IE 8]>
<link href="<?php echo BD_CSS; ?>/ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<!--[if IE 7]>
<link href="<?php echo BD_CSS; ?>/ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<?php
		}


		/* remove default widgets
		----------------------------------------------*/

		function remove_default_widgets() {
			if (function_exists('unregister_widget')) {
				unregister_widget('WP_Widget_Search');
			}
		}
		add_action('widgets_init', 'remove_default_widgets');

		function bd_favicon() {
			$default_favicon = get_template_directory_uri()."/favicon.ico";
			$custom_favicon = bdayh_get_option('favicon');
			$favicon = (empty($custom_favicon)) ? $default_favicon : $custom_favicon;
			echo '<link rel="shortcut icon" href="'.$favicon.'" title="Favicon" />';
		}
		add_action('wp_head', 'bd_favicon');

		/* Bdayh Options
		----------------------------------------------*/

		function bd_get_option( $name )
		{
			$get_options = get_option( 'bd_options' );
			if( !empty( $get_options[$name] ))
				return $get_options[$name];
			return false ;
		}



		if (is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' )
		{
			if( !get_option('bdayh_setting') )
			{
		        $data = base64_decode(file_get_contents(BD_DIR.'/admin/reset.bdayh'));
		  		update_option('bdayh_setting', $data);
			}
		}

		function bdayh_get_option($option)
		{
			$bd_option = unserialize(get_option('bdayh_setting'));

		    if(isset($bd_option['bd_setting'][$option]))
		    {
		       return($bd_option['bd_setting'][$option]);
		    }
		    else
		    {
				return(false);
			}
		}


		/* CVS Tags
		----------------------------------------------*/

		function csv_tags() {
			$posttags = get_the_tags();
			foreach((array)$posttags as $tag) {
				$csv_tags .= $tag->name . ',';
			}
			echo '<meta name="keywords" content="'.$csv_tags.'" />';
		}


		function bdayh_get_time(){
			global $post ;
			the_time(get_option('date_format'));
			human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
		}

		/* Google Fonts
		----------------------------------------------*/

		function bd_enqueue_font ( $got_font) {
			if ($got_font) {
				$font_pieces = explode(":", $got_font);

				$font_name = $font_pieces[0];
				$font_name = str_replace (" ","+", $font_pieces[0] );

				$font_variants = $font_pieces[1];
				$font_variants = str_replace ("|",",", $font_pieces[1] );

				wp_enqueue_style( $font_name , 'http://fonts.googleapis.com/css?family='.$font_name . ':' . $font_variants );
			}
		}

		function bd_get_font ( $got_font ) {
			if ($got_font) {
				$font_pieces = explode(":", $got_font);
				$font_name = $font_pieces[0];
				return $font_name;
			}
		}

		add_action('wp_enqueue_scripts', 'bd_typography');
		function bd_typography(){
			global $custom_typography;

			foreach( $custom_typography as $selector => $input){
				$option = bdayh_get_option( $input );
				bd_enqueue_font( $option['font'] ) ;
			}
		}

		require BD_ADMIN . '/google-fonts.php';
		$google_font_array = json_decode ($google_api_output,true) ;

		$items = $google_font_array['items'];

		$options_fonts=array();
		array_push($options_fonts, "Default Font");
		$fontID = 0;
		foreach ($items as $item) {
			$fontID++;
			$variants='';
			$variantCount=0;
			foreach ($item['variants'] as $variant) {
				$variantCount++;
				if ($variantCount>1) { $variants .= '|'; }
				$variants .= $variant;
			}
			$variantText = ' (' . $variantCount . ' Varaints' . ')';
			if ($variantCount <= 1) $variantText = '';
			$options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
		}

		/* Typography Elements Array
		----------------------------------------------*/

        $custom_typography = array
        (
			"body"=>	"typography_general",
			".toolbar, .toolbar a, .toolbar span, .toolbar li, .toolbar li a, .toolbar ul.top_menu > li > a"=>	"toolbar",
			"nav, nav ul.menu > li, nav ul.menu > li a, nav a, nav ul.menu > li > ul > li a, nav ul.menu > li > ul > li"=> "nav_typo",
			".flexslider-caption h3 a, .flexslider-caption h3, .slider .item_content > h1 > a, .slider .item_content > h3 > a, .slider .item_content > h1 , .slider .item_content > h3"=>	"slider_title",
			".boxestitles, .boxestitles a, .boxestitles > a, .boxestitles span, .cat_box ul li.first_news h2 a, .entry-title, .entry-title a"=>	"boxes_titles",
			".singlepost-titles-pp, .singlepost-titles-pp a"=>	"singlepost_title",
			".page-titles-pp, .page-titles-pp a"=>	"page_title",
			".post-page-entry-pp, .post-page-entry-pp a"=>	"post_page_entry",
			".widget_title, .widget_title a, .sidebar_wrapper .widget h3.widget_title, .sidebar_wrapper .widget h3.widget_title a"=>	"widget_title",
			".news_box_title2, .news_box_title2 a"=>	"news_boxes_titles",
			"footer h2.widgettitle, footer h2.widgettitle a"=>	"footer_titles",
			".post-page-entry-pp h1"		=>	"h1_typography",
			".post-page-entry-pp h2"		=>	"h2_typography",
			".post-page-entry-pp h3"		=>	"h3_typography",
			".post-page-entry-pp h4"		=>	"h4_typography",
			".post-page-entry-pp h5"		=>	"h5_typography",
			".post-page-entry-pp h6"		=>	"h6_typography",
			".alert_home, .alert_home p, .alert_home span"=>	"alert_entry"
		);


/*-----------------------------------------------------------------------------------*/
# Get Social Counter
/*-----------------------------------------------------------------------------------*/
function AGS_curl_subscribers_text_counter( $xml_url ) {
	if( function_exists('curl_version') ){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $xml_url);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}else echo '<p style="display:block; padding: 5px; font-weight:bold; clear:both; background: rgb(255, 157, 157);">CURL function is disabled. Please check your php configuration ... Ask your webhosting support to enable cURL</p>';
}

function AGS_rss_count( $fb_id ) {
	$feedburner['rss_count'] = get_option( 'rss_count');
	return $feedburner;
}

function AGS_followers_count() {
	$twitter_username 		= bdayh_get_option('twitter_username');
	$twitter['page_url'] = 'http://www.twitter.com/'.$twitter_username;
	$twitter['followers_count'] = get_transient('twitter_count');
	if( empty( $twitter['followers_count']) ){
		try {
			$consumer_key 			= bdayh_get_option('twitter_consumer_key');
			$consumer_secret		= bdayh_get_option('twitter_consumer_secret');
			$access_token 			= bdayh_get_option('twitter_access_token');
			$access_token_secret 	= bdayh_get_option('twitter_access_token_secret');
			$twitterConnection = new TwitterOAuth( $consumer_key , $consumer_secret , $access_token , $access_token_secret	);
			$twitterData = $twitterConnection->get('users/show', array('screen_name' => $twitter_username));
			$twitter['followers_count'] = $twitterData->followers_count;

		} catch (Exception $e) {
			$twitter['followers_count'] = 0;
		}
		if( !empty( $twitter['followers_count'] ) ){
			set_transient( 'twitter_count' , $twitter['followers_count'] , 1200);
			if( get_option( 'followers_count') != $twitter['followers_count'] )
				update_option( 'followers_count' , $twitter['followers_count'] );
		}

		if( $twitter['followers_count'] == 0 && get_option( 'followers_count') )
			$twitter['followers_count'] = get_option( 'followers_count');

		elseif( $twitter['followers_count'] == 0 && !get_option( 'followers_count') )
			$twitter['followers_count'] = 0;
	}
	return $twitter;
}

function ags_facebook_fans( $page_link ){
	$face_link = @parse_url($page_link);

	if( $face_link['host'] == 'www.facebook.com' || $face_link['host']  == 'facebook.com' ){
		$fans = get_transient('fans_count');
		if( empty( $fans ) ){
			try {
				$page_name = substr(@parse_url($page_link, PHP_URL_PATH), 1);
				$data = @json_decode(AGS_curl_subscribers_text_counter("http://graph.facebook.com/".$page_name));
				$fans = $data->likes;
			} catch (Exception $e) {
				$fans = 0;
			}

			if( !empty($fans) ){
				set_transient( 'fans_count' , $fans , 1200);
				if ( get_option( 'fans_count') != $fans )
					update_option( 'fans_count' , $fans );
			}

			if( $fans == 0 && get_option( 'fans_count') )
				$fans = get_option( 'fans_count');

			elseif( $fans == 0 && !get_option( 'fans_count') )
				$fans = 0;
		}
		return $fans;
	}
}


function AGS_youtube_subs( $channel_link ){
	$youtube_link = @parse_url($channel_link);

	if( $youtube_link['host'] == 'www.youtube.com' || $youtube_link['host']  == 'youtube.com' ){
		$subs = get_transient('youtube_count');
		if( empty( $subs ) ){
			try {
				$youtube_name = substr(@parse_url($channel_link, PHP_URL_PATH), 6);
				$json = @AGS_curl_subscribers_text_counter("http://gdata.youtube.com/feeds/api/users/".$youtube_name."?alt=json");
				$data = json_decode($json, true);
				$subs = $data['entry']['yt$statistics']['subscriberCount'];
			} catch (Exception $e) {
				$subs = 0;
			}

			if( !empty($subs) ){
				set_transient( 'youtube_count' , $subs , 1200);
				if( get_option( 'youtube_count') != $subs )
					update_option( 'youtube_count' , $subs );
			}

			if( $subs == 0 && get_option( 'youtube_count') )
				$subs = get_option( 'youtube_count');

			elseif( $subs == 0 && !get_option( 'youtube_count') )
				$subs = 0;
		}
		return $subs;
	}
}


function AGS_vimeo_count( $page_link ) {
	$vimeo_link = parse_url($page_link);
	if( $vimeo_link['host'] == 'www.vimeo.com' || $vimeo_link['host']  == 'vimeo.com' )
	{
		$vimeo 		= get_transient('vimeo_count');
		$exp_time 	=  time() + 1200;
		$old_cashe  =  intval(get_option( 'vimeo_count_cashe'));
		if( intval(get_option( 'vimeo_count')) < 1  and time() > $old_cashe)
		{
			try {
				$page_name = substr(parse_url($page_link, PHP_URL_PATH), 10);
				$data = json_decode(AGS_curl_subscribers_text_counter( 'http://vimeo.com/api/v2/channel/' . $page_name  .'/info.json'));
				$vimeo = intval($data->total_subscribers);
			} catch (Exception $e) {
				$vimeo = 0;
			}
			if( !empty($vimeo) )
			{
				if( get_option( 'vimeo_count') != $vimeo )
				{
					update_option( 'vimeo_count' , $vimeo );
					update_option( 'vimeo_count_cashe' , $exp_time );
				}
			}
			if( $vimeo == 0 && get_option( 'vimeo_count') )
			{
				$vimeo = get_option( 'vimeo_count');
			}
			elseif( $vimeo == 0 && !get_option( 'vimeo_count') )
			{
				$vimeo = 0;
			}
		}
		else
		{
			$vimeo = get_option( 'vimeo_count');
		}
		return $vimeo;
	}
}

function AGS_dribbble_count( $page_link ) {
	$dribbble_link = @parse_url($page_link);

	if( $dribbble_link['host'] == 'www.dribbble.com' || $dribbble_link['host']  == 'dribbble.com' ){
		$dribbble = get_transient('dribbble_count');
		if( empty( $dribbble ) ){
			try {
				$page_name = substr(@parse_url($page_link, PHP_URL_PATH), 1);
				@$data = @json_decode(AGS_curl_subscribers_text_counter( 'http://api.dribbble.com/' . $page_name));

				$dribbble = $data->followers_count;
			} catch (Exception $e) {
				$dribbble = 0;
			}

			if( !empty($dribbble) ){
				set_transient( 'dribbble_count' , $dribbble , 1200);
				if( get_option( 'dribbble_count') != $dribbble )
					update_option( 'dribbble_count' , $dribbble );
			}

			if( $dribbble == 0 && get_option( 'dribbble_count') )
				$dribbble = get_option( 'dribbble_count');

			elseif( $dribbble == 0 && !get_option( 'dribbble_count') )
				$dribbble = 0;
		}
		return $dribbble;
	}

}


		/* Output gallery slideshow
		----------------------------------------------*/

		if ( !function_exists( 'bd_gallery' ) )
		{
		    function bd_gallery($postid, $imagesize)
		    { ?>
		        <script type="text/javascript">
		    		jQuery(document).ready(function($){
		                jQuery('#slider-<?php echo $postid; ?>').imagesLoaded( function() {
		        			jQuery("#slider-<?php echo $postid; ?>").flexslider({
		        			    slideshow: true,
								slideshowSpeed: 2000,
								//randomize: true,
		                        controlNav: false,
								keyboard: true,
								multipleKeyboard: true,
								pauseOnAction: false,
								pauseOnHover: false,
		                        prevText: '<?php echo '&larr; ' . __('Prev', 'bd'); ?>',
		                        nextText: '<?php echo __('Next', 'bd') . ' &rarr;'; ?>',
		                        namespace: 'bd-',
		                        smoothHeight: true,
		                        start: function(slider) {
		                            slider.container.click(function(e) {
		                                if( !slider.animating ) {
		                                    slider.flexAnimate( slider.getTarget('next') );
		                                }

		                            });
		                        }
		        			});

		        			jQuery("#slider-<?php echo $postid; ?>").click(function(e){

		        			});
		    			});
		    		});
		    	</script>
		    	<?php
		        $loader = 'ajax-loader.gif';
		        $thumbid = 0;

		        // get the featured image for the post
		        if( has_post_thumbnail($postid) ) {
		            $thumbid = get_post_thumbnail_id($postid);
		        }
		        echo "<!--//START-->\n<div id='slider-$postid' class='flexslider' data-loader='" . get_template_directory_uri() . "/images/$loader'>";

		        // get all of the attachments for the post
		        $args = array(
		            'orderby' => 'menu_order',
		            'order' => 'ASC',
		            'post_type' => 'attachment',
		            'post_parent' => $postid,
		            'post_mime_type' => 'image',
		            'post_status' => null,
		            'numberposts' => -1
		        );
		        $attachments = get_posts($args);
		        if( !empty($attachments) )
		        {
		            echo '<ul class="slides">';
		            $i = 0;
		            foreach( $attachments as $attachment ) {
		                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
		                $caption = $attachment->post_excerpt;
		                $caption = ($caption) ? "<em class='image-caption'>$caption</em>" : '';
		                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
		                echo "<li><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />$caption</li>";
		                $i++;
		            }
		            echo '</ul>';
		        }
		        echo "<!--//END-->\n</div>";
		    }
		}



		/* gallery
		----------------------------------------------*/

		if ( !function_exists( 'pp_gallery' ) )
		{
		    function pp_gallery($postid, $imagesize)
		    { ?>

				<script type="text/javascript">
						jQuery(document).ready(function(jQuery) {
						jQuery('.pp-slider-content').cycle({
							timeout: 5000,
							speed: 400,
							pager:  '.pp-slider-nav',
							//next:'.slide_next',
							//prev:'.slide_prev',
							before: resize_slider
						});
						function resize_slider(curr, next, opts, fwd){
							var $ht = jQuery(this).height();
							jQuery(this).parent().animate({
							height : $ht
							});
						}
							jQuery('.pp-slider-content').click(function() {
							jQuery('.pp-slider-content').cycle('next');
						});
						});
					</script>

		    	<?php

		        	$thumbid = 0;

		        // get the featured image for the post
		        if( has_post_thumbnail($postid) )
		        {
		            $thumbid = get_post_thumbnail_id($postid);
		        }
		        echo "<div class='pp-slider'>";

		        // get all of the attachments for the post
		        $args = array(
		            'orderby' => 'menu_order',
		            'order' => 'ASC',
		            'post_type' => 'attachment',
		            'post_parent' => $postid,
		            'post_mime_type' => 'image',
		            'post_status' => null,
		            'numberposts' => -1
		        );
		        $attachments = get_posts($args);
		        if( !empty($attachments) )
		        {
		            echo '<ul class="pp-slider-content">';
		            $i = 0;
		            foreach( $attachments as $attachment ) {
		                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
		                $caption = $attachment->post_excerpt;
		                $caption = ($caption) ? "<em class='image-caption'>$caption</em>" : '';
		                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
		                echo "<li><a href='$src[0]' rel='prettyPhoto[gallery]'><img src='$src[0]' alt='$alt' /></a>$caption</li>";
		                $i++;
		            }
		            echo '</ul>';
		        }
		        echo "<div class='pp-slider-nav'></div></div><!--//pp slider-->";
		    }
		}




		// Adds RSS feed links to <head> for posts and comments.

		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'bd', get_template_directory() . '/lang' );
		add_theme_support( 'post-thumbnails' );
		add_editor_style();

		// This theme supports a variety of post formats.

		add_theme_support(
	            'post-formats',
	            array(
	                'aside',
	                'gallery',
	                'image',
	                'link',
	                'quote',
	                'video',
	                'audio'
	            )
	        );

	    $args = (isset($args)) ? $args : array();
	    add_theme_support( 'custom-header', $args );

	    add_theme_support( 'custom-background', array(
			'default-color' => 'FFFFFF',
		) );


		function cherry_password_form()
		{

		    global $post;
		    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		    $o = '<form class="cherry_password_form" action="' . get_option( 'siteurl' ) . '/wp-pass.php" method="post">
		    ' . __( "<span> To view this protected post, enter the password below : </span>", 'bd' ) . '
		    <label for="' . $label . '">' . __( "Password:", 'bd' ) . ' </label><input class="password_text" name="post_password" id="' . $label . '" type="password" size="20" /><input class="password_go" type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
		    </form>
		    ';
		    return $o;
		}
		add_filter( 'the_password_form', 'cherry_password_form' );


		function bd_get_feeds( $feed , $number = 10 ){
			include_once(ABSPATH . WPINC . '/feed.php');

			$rss = @fetch_feed( $feed );
			if (!is_wp_error( $rss ) ){
				$maxitems = $rss->get_item_quantity($number);
				$rss_items = $rss->get_items(0, $maxitems);
			}
			if ($maxitems == 0) {
				$out = "<ul><li>". __( 'No items.', 'bd' )."</li></ul>";
			}else{
				$out = "<ul>";

				foreach ( $rss_items as $item ) :
					$out .= '<li><a href="'. esc_url( $item->get_permalink() ) .'" title="'.  __( "Posted ", "bd" ).$item->get_date("j F Y | g:i a").'">'. esc_html( $item->get_title() ) .'</a></li>';
				endforeach;
				$out .='</ul>';
			}

			return $out;
		}

		/* Custom Dashboard login logo
		----------------------------------------------*/

		function bd_login_logo(){
			if( bdayh_get_option('dashboard_logo') )
		    echo '<style type="text/css"> h1 a {  background-image:url('.bdayh_get_option('dashboard_logo').')  !important; background-size: auto !important; } </style>';
		}
		add_action('login_head',  'bd_login_logo');


		/* Custom Gravatar
		----------------------------------------------*/

		function bd_custom_gravatar ($avatar_defaults) {
			$bd_gravatar = bdayh_get_option( 'gravatar' );
			if($bd_gravatar){
				$custom_avatar = bdayh_get_option( 'gravatar' );
				$avatar_defaults[$custom_avatar] = "Custom Gravatar";
			}
			return $avatar_defaults;
		}
		add_filter( 'avatar_defaults', 'bd_custom_gravatar' );



		/* Pagination
		----------------------------------------------*/
		function bd_pagenavi()
		{
		?>
			<div class="pagination">
			  <div class="wp-pagenavi">
			    <?php bd_get_pagenavi() ?>
			  </div>
			</div>
			<!--//pagination-->
		<?php
		}


		/* Excerpt
		----------------------------------------------*/

		function bd_excerpt_global_length( $length ) {
			if( bd_get_option( 'exc_length' ) )
				return bd_get_option( 'exc_length' );
			else return 60;
		}

		function bd_excerpt_home_length( $length ) {
			if( bd_get_option( 'home_exc_length' ) )
				return bd_get_option( 'home_exc_length' );
			else return 15;
		}

		function bd_excerpt(){
			add_filter( 'excerpt_length', 'bd_excerpt_global_length', 999 );
			echo get_the_excerpt();
		}

		function bd_excerpt_home(){
			add_filter( 'excerpt_length', 'bd_excerpt_home_length', 999 );
			echo get_the_excerpt();
		}

		/* Excerpt more
		----------------------------------------------*/

		function bd_remove_excerpt( $more )
		{
			return '...';
		}
		add_filter('excerpt_more', 'bd_remove_excerpt');


		/* Custom Comments
		----------------------------------------------*/
		function custom_comments($comment, $args, $depth)
		{
			$GLOBALS['comment'] = $comment; ?>
			<li id="li-comment-<?php comment_ID() ?>" class="single_comment">
			  <div id="comment-<?php comment_ID(); ?>" class="comment-wrap">
			    <div class="comment-author vcard comment-avatar">
			      <?php
			      echo get_avatar( $comment, 67 );
			      ?>
			    </div>
			    <?php if ($comment->comment_approved == '0') : ?>
			    <em class="wait_mod">
			    <?php _e('Your comment is awaiting moderation.', 'bd'); ?>
			    </em>
			    <?php endif; ?>
			    <div class="author-comment">
			      <?php printf(__('%s ', 'bd'), get_comment_author_link()) ?>
			      <div class="clear"></div>
			      <div class="comment-meta commentmetadata">
			        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			        <?php printf(__('%1$s at %2$s', 'bd'), get_comment_date(),  get_comment_time()) ?>
			        </a>
			        <?php edit_comment_link(__('(Edit)', 'bd'),'  ','') ?>
			      </div>
			    </div>
			    <div class="clear"></div>
			    <div class="comment-content">
			      <?php comment_text() ?>
			    </div>
			    <div class="clear"></div>
			    <div class="reply">
			      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			    </div>
			  </div>
		<?php
		}

		/* widget_social
		----------------------------------------------*/
		function footer_widget_social()
		{
		?>
			<?php if(bdayh_get_option('social_networking') == 1)
			{
			?>
				<ul class="widget_social">
			    <?php if(bdayh_get_option('linkedin_url') != '') { ?>
				    <li class="linkedin">
				      <a href="<?php echo bdayh_get_option('linkedin_url'); ?>" title="linkedin"> linkedin </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('digg_url') != '') { ?>
				    <li class="digg">
				      <a href="<?php echo bdayh_get_option('digg_url'); ?>" title="digg"> digg </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('foursquare_url') != '') { ?>
				    <li class="foursquare">
				      <a href="<?php echo bdayh_get_option('foursquare_url'); ?>" title="foursquare"> foursquare </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('instagram_url') != '') { ?>
				    <li class="instagram">
				      <a href="<?php echo bdayh_get_option('instagram_url'); ?>" title="instagram"> instagram </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('vimeo_url') != '') { ?>
				    <li class="vimeo">
				      <a href="<?php echo bdayh_get_option('vimeo_url'); ?>" title="vimeo"> vimeo </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('tumblr_url') != '') { ?>
				    <li class="tumblr">
				      <a href="<?php echo bdayh_get_option('tumblr_url'); ?>" title="tumblr"> tumblr </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('blogger_url') != '') { ?>
				    <li class="blogger">
				      <a href="<?php echo bdayh_get_option('blogger_url'); ?>" title="blogger"> blogger </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('deviantart_url') != '') { ?>
				    <li class="deviantart">
				      <a href="<?php echo bdayh_get_option('deviantart_url'); ?>" title="deviantart"> deviantart </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('envato_url') != '') { ?>
				    <li class="envato">
				      <a href="<?php echo bdayh_get_option('envato_url'); ?>" title="envato"> envato </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('skype_url') != '') { ?>
				    <li class="skype">
				      <a href="skype:<?php echo bdayh_get_option('skype_url'); ?>?call" title="skype"> skype </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('myspace_url') != '') { ?>
				    <li class="myspace">
				      <a href="<?php echo bdayh_get_option('myspace_url'); ?>" title="myspace"> myspace </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('reddit_url') != '') { ?>
				    <li class="reddit">
				      <a href="<?php echo bdayh_get_option('reddit_url'); ?>" title="reddit"> reddit </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('behance_url') != '') { ?>
				    <li class="behance">
				      <a href="<?php echo bdayh_get_option('behance_url'); ?>" title="behance"> behance </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('youtube_url') != '') { ?>
				    <li class="youtube">
				      <a href="<?php echo bdayh_get_option('youtube_url'); ?>" title="youtube"> youtube </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('twitter_url') != '') { ?>
				    <li class="twitter">
				      <a href="<?php echo bdayh_get_option('twitter_url'); ?>" title="twitter"> twitter </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('rss_url') != '') { ?>
				    <li class="rss">
				      <a href="<?php echo bdayh_get_option('rss_url'); ?>" title="rss"> rss </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('pinterest_url') != '') { ?>
				    <li class="pinterest">
				      <a href="<?php echo bdayh_get_option('pinterest_url'); ?>" title="pinterest"> pinterest </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('gplus_url') != '') { ?>
				    <li class="googleplus">
				      <a href="<?php echo bdayh_get_option('gplus_url'); ?>" title="googleplus"> googleplus </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('flickr_url') != '') { ?>
				    <li class="flickr">
				      <a href="<?php echo bdayh_get_option('flickr_url'); ?>" title="flickr"> flickr </a>
				    </li>
			    <?php } ?>
			    <?php if(bdayh_get_option('facebook_url') != '') { ?>
				    <li class="facebook">
				      <a href="<?php echo bdayh_get_option('facebook_url'); ?>" title="facebook"> facebook </a>
				    </li>
			    <?php } ?>
			  </ul>
			  <!--//end widget-->
			<?php
			}
		?>
		<?php
		}


		function widget_social(){ ?>
		  <ul class="widget_social">

		    <?php if(bdayh_get_option('linkedin_url') != '') { ?>
			    <li class="linkedin">
			      <a href="<?php echo bdayh_get_option('linkedin_url'); ?>" title="linkedin"> linkedin </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('digg_url') != '') { ?>
			    <li class="digg">
			      <a href="<?php echo bdayh_get_option('digg_url'); ?>" title="digg"> digg </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('foursquare_url') != '') { ?>
			    <li class="foursquare">
			      <a href="<?php echo bdayh_get_option('foursquare_url'); ?>" title="foursquare"> foursquare </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('instagram_url') != '') { ?>
			    <li class="instagram">
			      <a href="<?php echo bdayh_get_option('instagram_url'); ?>" title="instagram"> instagram </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('vimeo_url') != '') { ?>
			    <li class="vimeo">
			      <a href="<?php echo bdayh_get_option('vimeo_url'); ?>" title="vimeo"> vimeo </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('tumblr_url') != '') { ?>
			    <li class="tumblr">
			      <a href="<?php echo bdayh_get_option('tumblr_url'); ?>" title="tumblr"> tumblr </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('blogger_url') != '') { ?>
			    <li class="blogger">
			      <a href="<?php echo bdayh_get_option('blogger_url'); ?>" title="blogger"> blogger </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('deviantart_url') != '') { ?>
			    <li class="deviantart">
			      <a href="<?php echo bdayh_get_option('deviantart_url'); ?>" title="deviantart"> deviantart </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('envato_url') != '') { ?>
			    <li class="envato">
			      <a href="<?php echo bdayh_get_option('envato_url'); ?>" title="envato"> envato </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('skype_url') != '') { ?>
			    <li class="skype">
			      <a href="skype:<?php echo bdayh_get_option('skype_url'); ?>?call" title="skype"> skype </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('myspace_url') != '') { ?>
			    <li class="myspace">
			      <a href="<?php echo bdayh_get_option('myspace_url'); ?>" title="myspace"> myspace </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('reddit_url') != '') { ?>
			    <li class="reddit">
			      <a href="<?php echo bdayh_get_option('reddit_url'); ?>" title="reddit"> reddit </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('behance_url') != '') { ?>
			    <li class="behance">
			      <a href="<?php echo bdayh_get_option('behance_url'); ?>" title="behance"> behance </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('youtube_url') != '') { ?>
			    <li class="youtube">
			      <a href="<?php echo bdayh_get_option('youtube_url'); ?>" title="youtube"> youtube </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('twitter_url') != '') { ?>
			    <li class="twitter">
			      <a href="<?php echo bdayh_get_option('twitter_url'); ?>" title="twitter"> twitter </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('rss_url') != '') { ?>
			    <li class="rss">
			      <a href="<?php echo bdayh_get_option('rss_url'); ?>" title="rss"> rss </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('pinterest_url') != '') { ?>
			    <li class="pinterest">
			      <a href="<?php echo bdayh_get_option('pinterest_url'); ?>" title="pinterest"> pinterest </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('gplus_url') != '') { ?>
			    <li class="googleplus">
			      <a href="<?php echo bdayh_get_option('gplus_url'); ?>" title="googleplus"> googleplus </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('flickr_url') != '') { ?>
			    <li class="flickr">
			      <a href="<?php echo bdayh_get_option('flickr_url'); ?>" title="flickr"> flickr </a>
			    </li>
		    <?php } ?>

		    <?php if(bdayh_get_option('facebook_url') != '') { ?>
			    <li class="facebook">
			      <a href="<?php echo bdayh_get_option('facebook_url'); ?>" title="facebook"> facebook </a>
			    </li>
		    <?php } ?>

		  </ul>
		  <!--//end widget-->

		<?php
		}


		/* News In Picture
		----------------------------------------------*/
		function cherry_categortnewinpic($numberOfPosts = 5 , $thumb = true , $cats = 1)
		{
			global $post;
			$orig_post = $post;
			$lastPosts = get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
			foreach($lastPosts as $post): setup_postdata($post);
		?>
		  <div class="news_pic">
		    <div class="post_thumbnail">
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	            	<?php $timthumb = bdayh_get_option('timthumb');
		                if ($timthumb == true) { ?>
		            		<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=67&amp;w=67&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } else { ?>
			            <?php
						  $thumb = bd_post_image('large');
						  $ntImage = aq_resize( $thumb, 67, 67, true );
					  		if($ntImage == '')
								{
									$ntImage = BD_IMG .'/default_thumb.png';
								}
						?>

			            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
			            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
			            	<img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
			            	<img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } else { ?>
			            	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } ?>

		            <?php } ?>
            </a>
		    </div>
		    <!--//post_thumbnail-->
		  </div>
		<?php endforeach;
		$post = $orig_post;

		}


		/* Latest Pots Cat
		----------------------------------------------*/
		function cherry_last_posts_cat($numberOfPosts = 5 , $thumb = true , $cats = 1)
		{
			global $post;
			$orig_post = $post;
			$lastPosts = get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
			foreach($lastPosts as $post): setup_postdata($post);
		?>
			<li>
			  <div class="post_thumbnail">
			    <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

				    <?php $timthumb = bdayh_get_option('timthumb');
				        if ($timthumb == true) { ?>
					    <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=67&amp;w=67&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					    <?php } else { ?>
					    <?php
					      $thumb = bd_post_image('large');
					      $ntImage = aq_resize( $thumb, 67, 67, true );
					  		if($ntImage == '')
								{
									$ntImage = BD_IMG .'/default_thumb.png';
								}
					      ?>

					    <?php if (strpos(bd_post_image(), 'youtube')) { ?>
					    	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					    <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
					    	<img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					    <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
					    	<img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					    <?php } else { ?>
					    	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					    <?php } ?>

				    <?php } ?>

			    </a>
				</div>
			  <!--//post_thumbnail-->
			  <h3>
			    <a href="<?php the_permalink(); ?>">
			    <?php the_title();?>
			    </a>
			  </h3>
			  <span class="date">
			  <?php the_time(get_option('date_format'));  ?>
			  </span>
			</li>
		<?php endforeach;
		$post = $orig_post;

		}

		/* Popular
		----------------------------------------------*/

		function AGS_popular_posts($pop_posts = 5 , $thumb = true)
		{
			global $wpdb , $post;
			$orig_post = $post;
			$popularposts = "SELECT ID,post_title,post_date,post_author,post_content,post_type FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY comment_count DESC LIMIT 0,".$pop_posts;
			$posts = $wpdb->get_results($popularposts);
			if($posts)
			{
				global $post;
				foreach($posts as $post)
				{
					setup_postdata($post);?>
					<li>
					  <div class="post_thumbnail">
					    <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

					    <?php $timthumb = bdayh_get_option('timthumb');

					        if ($timthumb == true) { ?>
					    		<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=67&amp;w=67&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					    	<?php } else { ?>

					    	<?php

					      		$thumb = bd_post_image('large');
					      		$ntImage = aq_resize( $thumb, 67, 67, true );
						  		if($ntImage == '')
									{
										$ntImage = BD_IMG .'/default_thumb.png';
									}
					      	?>

						    <?php if (strpos(bd_post_image(), 'youtube')) { ?>
						    	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
						    <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
						    	<img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
						    <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
						    	<img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
						    <?php } else { ?>
						    	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
						    <?php } ?>

					    <?php } ?>

					    </a>

					  </div>
					  <!--//post_thumbnail-->

					  <h3>
					    <a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					    	<?php echo the_title(); ?>
					    </a>
					  </h3>

					  <span class="date">
					 	 <?php the_time(get_option('date_format'));  ?>
					  </span>

					</li>
				<?php
				}
			}

		$post = $orig_post;

		}


		/* Comments
		----------------------------------------------*/

		function cherry_commented($comment_posts = 5 , $avatar_size = 67)
		{
			$comments = get_comments('status=approve&number='.$comment_posts);

			foreach ($comments as $comment) { if(isset($comment->ID)){ echo $comment->ID; } ?>
				<li>
				  <div class="post_thumbnail">
				    <?php echo get_avatar( $comment, $avatar_size ); ?>
				  </div>
				  <!--//Avatar-->
				  <h3>
				    <a href="<?php echo get_permalink($comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>">
					    <?php echo strip_tags($comment->comment_author); ?>
					    	:
					    <?php echo wp_html_excerpt( $comment->comment_content, 67 ); ?>
					    	...
				    </a>
				  </h3>
				</li>
			<?php
			}
		}


		/* Recent
		----------------------------------------------*/

		function cherry_last_posts($numberOfPosts = 5 , $thumb = true)
		{
			global $post;
			$orig_post = $post;
			$lastPosts = get_posts('numberposts='.$numberOfPosts);
			foreach($lastPosts as $post): setup_postdata($post);
		?>
			<li>
			  <div class="post_thumbnail">
			    <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

			    <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
			    	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=67&amp;w=67&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			    <?php } else { ?>

			    	<?php
			      		$thumb = bd_post_image('large');
			      		$ntImage = aq_resize( $thumb, 67, 67, true );
				  		if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
			      	?>

				    <?php if (strpos(bd_post_image(), 'youtube')) { ?>
				    	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				    <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
				    	<img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				    <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
				    	<img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				    <?php } else { ?>
				    	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				    <?php } ?>

			    <?php } ?>

			    </a>

			  </div>
			  <!--//post_thumbnail-->

			  <h3>
			    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			    <?php the_title();?>
			    </a>
			  </h3>

			  <span class="date">
			 	 <?php the_time(get_option('date_format')); ?>
			  </span>

			</li>
			<?php endforeach;
			$post = $orig_post;

		}


		/* Login form
		----------------------------------------------*/

		function cherry_login_form( $login_only  = 0 )
		{
			global $user_ID, $user_identity, $user_level;
			if ( $user_ID ) : ?>

			<?php if( empty( $login_only ) ): ?>

			<div class="login_user">
			  <div class="post_thumbnail">
			    <?php echo get_avatar( $user_ID, $size = '79'); ?>
			  </div>
			  <p>
			    <?php _e( 'Welcome' , 'bd' ) ?>
			    <strong>
			    <a href="">
			    <?php echo $user_identity ?>
			    </a>
			    </strong>
			  </p>
			  <ol class="login_list">
			    <li class="userWpAdmin">
			      <a href="<?php echo home_url() ?>/wp-admin/">
			      <?php _e( 'Dashboard' , 'bd' ) ?>
			      </a>
			    </li>
			    <li class="userprofile">
			      <a href="<?php echo home_url() ?>/wp-admin/profile.php">
			      <?php _e( 'Your Profile' , 'bd' ) ?>
			      </a>
			    </li>
			    <li class="userlogout">
			      <a href="<?php echo wp_logout_url(); ?>">
			      <?php _e( 'Logout' , 'bd' ) ?>
			      </a>
			    </li>
			  </ol>
			  <div class="author_social">
			    <?php if ( get_the_author_meta( 'url' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'url' , $user->ID); ?>" title="<?php echo $user_identity ?> <?php _e( 'site', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/home.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'facebook' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'facebook' ); ?>" title="<?php echo $user_identity ?><?php _e( '  on Facebook', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/facebook.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'twitter' , $user_ID) ) : ?>
				    <a href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php echo $user_identity ?><?php _e( '  on Twitter', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/twitter.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'google' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'google' ); ?>" title="<?php echo $user_identity ?><?php _e( '  on Google+', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/gplus.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'linkedin' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'linkedin' , $user_ID); ?>" title="<?php echo $user_identity ?><?php _e( '  on Linkedin', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/linkedin.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'pinterest' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'pinterest' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( '  on Pinterest', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/pinterest.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'youtube' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'youtube' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( '  on YouTube', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/youtube.png" alt="" />
				    </a>
			    <?php endif ?>

			    <?php if ( get_the_author_meta( 'flickr' , $user_ID) ) : ?>
				    <a href="<?php the_author_meta( 'flickr' , $user->ID); ?>" title="<?php echo $user_identity ?><?php _e( '  on Flickr', 'bd' ); ?>">
				    	<img src="<?php echo BD_IMG; ?>/small_social_icons/flickr.png" alt="" />
				    </a>
			    <?php endif ?>

			  </div>
			</div>

			<?php endif; ?>
			<?php else: ?>

			<div class="login_form">
			  <form action="<?php echo home_url() ?>/wp-login.php" method="post">
			    <div class="username" >
			      <input type="text" name="log" id="log" size="30" placeholder="User Name"  value="<?php _e( 'Username' , 'bd' ) ?>"  />
			    </div>
			    <div class="password" >
			      <input type="password" name="pwd" size="30" placeholder="Password" value="<?php _e( 'Password' , 'bd' ) ?>" />
			    </div>
			    <div class="remember">
			      <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />
			      <label>
			        <?php _e( 'Remember Me' , 'bd' ) ?>
			      </label>
			    </div>
			    <div class="go">
			      <button value="<?php _e( 'Login' , 'bd' ) ?>" name="Submit" type="submit">
			      	<?php _e( 'Login' , 'bd' ) ?>
			      </button>
			      <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
			    </div>
			    <ol class="login_list">
			      <li>
			        <a href="<?php echo home_url() ?>/wp-login.php?action=lostpassword">
			        	<?php _e( 'Forgot your password?' , 'bd' ) ?>
			        </a>
			      </li>
			    </ol>
			  </form>
			</div>

		<?php endif;
		}


		/* Author
		----------------------------------------------*/

		function bd_author_box($user = 10,$avatar = true , $social = true )
		{
			if( $avatar ) : ?>
			<div class="post_thumbnail">
			  <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 79 ) ); ?>
			</div>
			<?php endif; ?>

			<div>
			  <?php the_author_meta( 'description' ); ?>
			</div>

			<?php  if( $social ) :	?>

			<div class="author_social">
			  <?php if ( get_the_author_meta( 'url' , $user) ) : ?>
				  <a href="<?php the_author_meta( 'url' , $user); ?>" title="<?php _e( 'site', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/home.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'facebook' , $user) ) : ?>
				  <a href="<?php the_author_meta( 'facebook',$user ); ?>" title="<?php _e( '  on Facebook', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/facebook.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'twitter' , $user) ) : ?>
				  <a href="http://twitter.com/<?php the_author_meta( 'twitter',$user ); ?>" title="<?php _e( '  on Twitter', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/twitter.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'google' , $user) ) : ?>
				  <a href="<?php the_author_meta( 'google',$user); ?>" title="<?php _e( '  on Google+', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/gplus.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'linkedin' , $user) ) : ?>
				  <a href="<?php the_author_meta( 'linkedin' , $user); ?>" title="<?php _e( '  on Linkedin', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/linkedin.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'pinterest' , $user) ) : ?>
				  <a href="<?php the_author_meta( 'pinterest' ,$user); ?>" title="<?php _e( '  on Pinterest', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/pinterest.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'youtube' ,$user) ) : ?>
				  <a href="<?php the_author_meta( 'youtube' ,$user); ?>" title="<?php _e( '  on YouTube', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/youtube.png" alt="" />
				  </a>
			  <?php endif ?>

			  <?php if ( get_the_author_meta( 'flickr' , $user) ) : ?>
				  <a href="<?php the_author_meta( 'flickr' ,$user); ?>" title="<?php _e( '  on Flickr', 'bd' ); ?>">
				  	<img src="<?php echo BD_IMG; ?>/small_social_icons/flickr.png" alt="" />
				  </a>
			  <?php endif ?>

			</div>
			<?php endif ?>
			<?php
		}


		/* Add user's social accounts
		----------------------------------------------*/

		add_action( 'show_user_profile', 'cherry_show_extra_profile_fields' );
		add_action( 'edit_user_profile', 'cherry_show_extra_profile_fields' );
		function cherry_show_extra_profile_fields( $user )
		{
		?>
			<h3>
			  <?php _e( 'Social Networking', 'bd' ) ?>
			</h3>
			<table class="form-table">
			  <tr>
			    <th><label for="facebook">FaceBook URL</label></th>
			    <td>
			    	<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
			      </td>
			  </tr>
			  <tr>
			    <th><label for="twitter">Twitter Username</label></th>
			    <td>
			    	<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
			      </td>
			  </tr>
			  <tr>
			    <th><label for="google">Google + URL</label></th>
			    <td>
			    	<input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
			      </td>
			  </tr>
			  <tr>
			    <th><label for="linkedin">linkedIn URL</label></th>
			    <td>
			    	<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
			      </td>
			  </tr>
			  <tr>
			    <th><label for="pinterest">Pinterest URL</label></th>
			    <td>
			    	<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
			      </td>
			  </tr>
			  <tr>
			    <th><label for="youtube">YouTube URL</label></th>
			    <td>
			   		<input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
			     </td>
			  </tr>
			  <tr>
			    <th><label for="flickr">Flickr URL</label></th>
			    <td>
			    	<input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
			     </td>
			  </tr>
			</table>
		<?php
		}


		// Save user's social accounts
		add_action( 'personal_options_update', 'cherry_save_extra_profile_fields' );
		add_action( 'edit_user_profile_update', 'cherry_save_extra_profile_fields' );
		function cherry_save_extra_profile_fields( $user_id )
		{
			if ( !current_user_can( 'edit_user', $user_id ) ) return false;
			update_user_meta( $user_id, 'google', $_POST['google'] );
			update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
			update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
			update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
			update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
			update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
			update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
		}



		/* Add class
		----------------------------------------------*/
		function category_id_class($classes)
		{
			global $post;
			foreach((get_the_category($post->ID)) as $category)
				$classes[] = $category->category_nicename;
			return $classes;
		}
		add_filter('post_class', 'category_id_class');
		add_filter('body_class', 'category_id_class');

		add_filter('body_class','bd_classes');
		function bd_classes($classes)
		{
			$classes[] = 'dark';
			return $classes;
		}


		/* Menus
		----------------------------------------------*/
		if ( function_exists( 'register_nav_menu' ) )
		{

		  register_nav_menus(
			   array
			   (
			   		'topnav'   => __('Top Nav', 'bd'),
			   )
		  );

		  register_nav_menus(
			   array
			   (
			   		'nav'   => __('Nav', 'bd'),
			   )
		  );

		}


		/* Register nav menu
		----------------------------------------------*/

		function bd_widget_title($title)
		{
			if( empty( $title ) )
				return ' ';
			else return $title;
		}
		add_filter('widget_title', 'bd_widget_title');


		if ( function_exists('register_sidebar') )
		{

			register_sidebar(array
				(

					'name' => 'Home Sidebar',
					'description' => 'Home Sidebar.',
					'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
					'after_widget' => '</div></div><!--//end widget-->',
					'before_title' => '<h3 class="widget_title">',
					'after_title' => '</h3>'

				)
			);

			register_sidebar(array
				(

					'name' => 'Article Sidebar',
					'description' => 'Article Sidebar.',
					'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
					'after_widget' => '</div></div><!--//end widget-->',
					'before_title' => '<h3 class="widget_title">',
					'after_title' => '</h3>'

				)
			);

			register_sidebar(array
				(

					'name' => 'Page Sidebar',
					'description' => 'Page Sidebar.',
					'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
					'after_widget' => '</div></div><!--//end widget-->',
					'before_title' => '<h3 class="widget_title">',
					'after_title' => '</h3>'

				)
			);

			register_sidebar(array
				(

					'name' => 'Category Sidebar',
					'description' => 'Category Sidebar.',
					'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
					'after_widget' => '</div></div><!--//end widget-->',
					'before_title' => '<h3 class="widget_title">',
					'after_title' => '</h3>'

				)
			);

			register_sidebar(array
				(

					'name' => 'First Footer Widget Area',
					'description' => 'First Footer Widget Area',
					'before_widget' => '<li id="%1$s" class="popular_posts  pp-popular-posts %2$s">',
					'after_widget' => '</li><!--//popular_posts-->',
					'before_title' => '<h2 class="widgettitle">',
					'after_title' => '</h2>'

				)
			);

			register_sidebar(array
				(

					'name' => 'Second Footer Widget Area',
					'description' => 'Second Footer Widget Area',
					'before_widget' => '<li id="%1$s" class="popular_posts pp-popular-posts  %2$s">',
					'after_widget' => '</li><!--//popular_posts-->',
					'before_title' => '<h2 class="widgettitle">',
					'after_title' => '</h2>'

				)
			);

			register_sidebar(array
				(

					'name' => 'Third Footer Widget Area',
					'description' => 'Third Footer Widget Area',
					'before_widget' => '<li id="%1$s" class="popular_posts pp-popular-posts %2$s">',
					'after_widget' => '</li><!--//popular_posts-->',
					'before_title' => '<h2 class="widgettitle">',
					'after_title' => '</h2>'

				)
			);

			register_sidebar(array
				(

					'name' => 'Fourth Footer Widget Area',
					'description' => 'Fourth Footer Widget Area',
					'before_widget' => '<li id="%1$s" class="popular_posts  pp-popular-posts  %2$s end_row">',
					'after_widget' => '</li><!--//popular_posts-->',
					'before_title' => '<h2 class="widgettitle">',
					'after_title' => '</h2>'

				)
			);

		}


		/* Excerpt
		----------------------------------------------*/

		function the_excerpt_max_charlength($charlength)
		{
		   $excerpt = get_the_excerpt();
		   $charlength++;
		   if(strlen($excerpt)>$charlength)
		   {
		       $subex = substr($excerpt,0,$charlength-5);
		       $exwords = explode(" ",$subex);
		       $excut = -(strlen($exwords[count($exwords)-1]));
		       if($excut<0)
			       {
			            echo substr($subex,0,$excut);
			       }
			       else
				   {
			       	    echo $subex;
			       }
		   }
		   else
		   {
			   echo $excerpt;
		   }
		}

		function short_title($after = '', $length)
		{
			$mytitle = explode(' ', get_the_title(), $length);
			if (count($mytitle)>=$length)
				{
					array_pop($mytitle);
					$mytitle = implode(" ",$mytitle). $after;
				}
				else
				{
					$mytitle = implode(" ",$mytitle);
				}
			return $mytitle;
		}

		function excerpt($limit)
		{
		      $excerpt = explode(' ', get_the_excerpt(), $limit);
		      if (count($excerpt)>=$limit)
			      {
			        array_pop($excerpt);
			        $excerpt = implode(" ",$excerpt).'...';
			      }
		      else
			      {
			        $excerpt = implode(" ",$excerpt);
			      }
		      	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		      	return $excerpt;
		}


		/* Thumbnails
		----------------------------------------------*/

		if ( function_exists( 'add_theme_support' ))
			add_theme_support( 'post-thumbnails' );

		if ( function_exists( 'add_image_size' ) && !bd_get_option( 'timthumb' ))
		{
			add_image_size( 'bd1', 330, 248, true );
			add_image_size( 'bd2', 108, 85, true );
			add_image_size( 'bd3', 138, 111, true );
			add_image_size( 'bd4', 338, 190, true );
			add_image_size( 'bd5', 54, 54, true );
			add_image_size( 'bd6', 261, 160, true );
			add_image_size( 'bd7', 69, 69, true );
			add_image_size( 'bd8', 300, 170, true );
		}

		function bd_pin_image()
		{
			global $post, $posts;
			if (has_post_thumbnail( $post->ID )):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				echo $image[0];
			else:
			 	echo catch_that_image();
			endif;
		}

		function catch_that_image()
		{
		  global $post, $posts;
		  $first_img = '';
		  ob_start();
		  ob_end_clean();

			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			if(isset($matches[1][0]))
			{
				$first_img = $matches[1][0];
			}
			else
			{
				$first_img = BD_IMG .'/default_thumb.png';
			}
			return $first_img;
		}


		function bd_post_image($size = 'thumbnail')
		{
				global $post;
				$image = '';
				$image_id = get_post_thumbnail_id($post->ID);

				$image = wp_get_attachment_image_src($image_id,
				$size);

				$image = $image[0];
				if ($image) return $image;

				$type = get_post_meta($post->ID, 'cherry_article_type', true);
				$vtype = get_post_meta($post->ID, 'cherry_video_type', true);
				$vId = get_post_meta($post->ID, 'cherry_video_id', true);

				if($vId != '')
					{
						if($vtype == 'youtube')
						{
						  $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';

						} elseif ($vtype == 'vimeo')

						{
						$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vId.php"));
						  $image = $hash[0]['thumbnail_large'];
						} elseif ($vtype == 'daily')

						{
						  $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
						}
					}
					if ($image) return $image;
					return bd_get_first_image();
		}

		function bd_get_first_image()
		{
		  global $post, $posts;
		  $first_img = '';
		  ob_start();
		  ob_end_clean();

			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			if(isset($matches[1][0]))

			{
				$first_img = $matches[1][0];
			}
			else
			{
				$first_img = BD_IMG .'/default_thumb.png';
			}
			return $first_img;
		}

?>