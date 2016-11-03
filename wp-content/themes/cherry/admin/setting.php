<?php
/* General settings
--------------------------------------------------------------*/
$options["general_settings"]['newsticker'][] = array
(
		"name" 		=> __('newsticker' , 'bd'),
		"label" 	=> __('Show newsticker' , 'bd'),
		"tip"		=> __('Show newsticker' , 'bd'),
		"id"    	=> "newsticker",
		"type"  	=> "checkbox",
);
$options["general_settings"]['newsticker'][] = array
(
		"name" 		=> __('newsticker title' , 'bd'),
		"label" 	=> __('Show newsticker title' , 'bd'),
		"tip"		=> __('Show newsticker title' , 'bd'),
		"id"    	=> "newsticker_title",
		"type"  	=> "text",
);
$options["general_settings"]['newsticker'][] = array
(
		"name" 		=> __('newsticker display' , 'bd'),
		"label" 	=> __('newsticker display' , 'bd'),
		"id" 		=> "newsticker_display",
		"type"  	=> "radio",
		"list"		=> array("lates","category","tag"),
		"js"		=> '
        		<script type="text/javascript">
        			jQuery(document).ready(function()
        			{
						jQuery(".r_newsticker_display").change(function ()
						{
                            if(jQuery(this).val() == "lates")
                            {
                            	jQuery(".get_newsticker_category").hide();
								jQuery(".lates").fadeIn();
								jQuery(".get_newsticker_tags").hide();
                            }
							else if(jQuery(this).val() == "tag")
							{
                            	jQuery(".get_newsticker_category").hide();
								jQuery(".lates").hide();
								jQuery(".get_newsticker_tags").fadeIn();
							}
                            else
                            {
                            	jQuery(".get_newsticker_category").fadeIn();
								jQuery(".lates").hide();
								jQuery(".get_newsticker_tags").hide();
                            }
	                    });
                    });
        		</script>'
);
$newsticker_display_category = (bdayh_get_option('newsticker_display') != 'category') ? 'hidden' : '';
$options["general_settings"]['newsticker'][] = array
(
		"name" 		=> __('newsticker Category' , 'bd'),
		"label" 	=> __('newsticker Category' , 'bd'),
		"id"		=> "newsticker_category",
		"type"  	=> "select",
		"class" 	=> $newsticker_display_category . " get_newsticker_category",
		"list"		=> "cats"
);

$newsticker_display_tags = (bdayh_get_option('newsticker_display') != 'tag') ? 'hidden' : '';

$options["general_settings"]['newsticker'][] = array
(
		"name" 		=> __('newsticker Tag' , 'bd'),
		"label" 	=> __('newsticker Tag' , 'bd'),
		"id"		=> "newsticker_tag",
		"class" 	=> $newsticker_display_tags . " get_newsticker_tags",
		"type"  	=> "tags"
);
$options["general_settings"][] = array
(
      	"name"  	=> __('Using Timthumb' , 'bd'),
      	"label" 	=> __('Using Timthumb' , 'bd'),
      	"tip"		=> __('if this on this mean you use timthumb script to resize all posts feature images else if it false this mean you use. ' , 'bd'),
      	"id"    	=> "timthumb",
      	"type"  	=> "checkbox",
		"std" 		=> false,
);



$options["general_settings"]['alert_bar'][] = array
(
      	"name"  	=> __('Alert Bar' , 'bd'),
      	"label" 	=> __('Show Alert Bar' , 'bd'),
      	"tip"		=> __('Turn this on to show alert bar on the top of your web site.' , 'bd'),
      	"id"    	=> "show_alert_bar",
      	"type"  	=> "checkbox",
);

$options["general_settings"]['alert_bar'][] = array
(
      	"name"  	=> __('Alert Bar Content' , 'bd'),
      	"label" 	=> __('Alert Bar Content' , 'bd'),
      	"tip"		=> __('You can Add HTMl here.' , 'bd'),
      	"id"    	=> "show_alert_content",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);


$options["general_settings"][] = array
(
		"name"  	=> __('Footer Code' , 'bd'),
		"label" 	=> __('Footer Code' , 'bd'),
		"tip"		=> __('The following code will add to the footer before the closing </body> tag. Useful if you need to Javascript or tracking code.' , 'bd'),
		"id"   		=> "footer_code",
		"type" 		=> "textarea",
		"class"		=> "textarea_full",
);

$options["general_settings"][] = array
(
		"name" 		=> __('Copyrights' , 'bd'),
		"label" 	=> __('Copyrights' , 'bd'),
		"tip"		=> __('Footer Copyrights Text' , 'bd'),
		"id"    	=> "copyrights",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);

/* Blog
--------------------------------------------------------------*/
$options["blog_home"]['blog_home_elements'][] = array
(
		"name" 		=> __('Post Meta Settings' , 'bd'),
		"label" 	=> __('Post Meta :' , 'bd'),
		"tip"		=> __('Post Meta Settings' , 'bd'),
		"id"    	=> "blog_home_post_meta",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_elements'][] = array
(
		"name" 		=> __('Post Meta Settings' , 'bd'),
		"label" 	=> __('Author Meta :' , 'bd'),
		"tip"		=> __('Author Meta' , 'bd'),
		"id"    	=> "blog_home_author_meta",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_elements'][] = array
(
		"name" 		=> __('Post Meta Settings' , 'bd'),
		"label" 	=> __('Date Meta :' , 'bd'),
		"tip"		=> __('Date Meta' , 'bd'),
		"id"    	=> "blog_home_data_meta",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_elements'][] = array
(
		"name" 		=> __('Post Meta Settings' , 'bd'),
		"label" 	=> __('Post Ratings :' , 'bd'),
		"tip"		=> __('Post Ratings' , 'bd'),
		"id"    	=> "blog_home_ratings_meta",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Share Post Buttons :' , 'bd'),
		"tip"		=> __('Share Post Buttons' , 'bd'),
		"id"    	=> "blog_home_share_post_buttons",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Tweet Button :' , 'bd'),
		"tip"		=> __('Tweet Button' , 'bd'),
		"id"    	=> "blog_home_tweet",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Facebook Like Button :' , 'bd'),
		"tip"		=> __('Facebook Like Button' , 'bd'),
		"id"    	=> "blog_home_fb",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Google+ Button :' , 'bd'),
		"tip"		=> __('Google+ Button' , 'bd'),
		"id"    	=> "blog_home_gp",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('StumbleUpon Button :' , 'bd'),
		"tip"		=> __('StumbleUpon Button' , 'bd'),
		"id"    	=> "blog_home_su",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Linkedin Button :' , 'bd'),
		"tip"		=> __('Linkedin Button' , 'bd'),
		"id"    	=> "blog_home_in",
		"type"  	=> "checkbox",
);
$options["blog_home"]['blog_home_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Pinterest Button :' , 'bd'),
		"tip"		=> __('Pinterest Button' , 'bd'),
		"id"    	=> "blog_home_pin",
		"type"  	=> "checkbox",
);

/* Header settings
--------------------------------------------------------------*/
$options["header_settings"]["header_menus_settings"][] = array
(
      	"name"  	=> __('Disable Responsive' , 'bd'),
      	"label" 	=> __('Disable Responsive' , 'bd'),
      	"tip"		=> __('Disable Responsive. ' , 'bd'),
      	"id"    	=> "disable_responsive",
      	"type"  	=> "checkbox"
);
$options["header_settings"]["header_menus_settings"][] = array
(
      	"name"  	=> __('Stick The Navigation menu' , 'bd'),
      	"label" 	=> __('Stick The Navigation menu' , 'bd'),
      	"tip"		=> __('Stick The Navigation menu. ' , 'bd'),
      	"id"    	=> "stick_nav",
      	"type"  	=> "checkbox"
);
$options["header_settings"]["header_menus_settings"][] = array
(
      	"name"  	=> "",
      	"label" 	=> __('Hide Top menu' , 'bd'),
      	"tip"		=> __('Hide Top menu. ' , 'bd'),
      	"id"    	=> "hid_top_menu",
      	"type"  	=> "checkbox"
);

$options["header_settings"]['header_menus_settings'][] = array
(
		"name" 		=> __('Top Menu Right' , 'bd'),
		"label" 	=> __('Top Menu Right' , 'bd'),
		"id" 		=> "topright_display",
		"type"  	=> "radio",
		"list"		=> array("none","social","search"),
		"js"		=> '
        		<script type="text/javascript">
        			jQuery(document).ready(function()
        			{
						jQuery(".r_topright_display").change(function ()
						{
                            if(jQuery(this).val() == "none")
                            {
                            	jQuery(".get_topright_social").hide();
								jQuery(".none").fadeIn();
								jQuery(".get_topright_search").hide();
                            }
							else if(jQuery(this).val() == "social")
							{
                            	jQuery(".get_topright_social").hide();
								jQuery(".none").hide();
								jQuery(".get_topright_search").fadeIn();
							}
                            else
                            {
                            	jQuery(".get_topright_social").fadeIn();
								jQuery(".none").hide();
								jQuery(".get_topright_search").hide();
                            }
	                    });
                    });
        		</script>'
);
$topright_display_social = (bdayh_get_option('topright_display') != 'social') ? 'hidden' : '';
$options["header_settings"]['header_menus_settings'][] = array
(
		"name" 		=> __('Social' , 'bd'),
		"label" 	=> __('Social' , 'bd'),
		"id"		=> "topright_social",
		"class" 	=> $ntopright_display_social . " get_topright_social",
);

$topright_display_search = (bdayh_get_option('topright_display') != 'search') ? 'hidden' : '';

$options["header_settings"]['header_menus_settings'][] = array
(
		"name" 		=> __('Search' , 'bd'),
		"label" 	=> __('Search' , 'bd'),
		"id"		=> "topright_search",
		"class" 	=> $topright_display_search . " get_topright_search",
);

$options["header_settings"]["today_date"][] = array
(
      	"name"  	=> __('Today Date' , 'bd'),
      	"label" 	=> __('Today Date' , 'bd'),
      	"tip"		=> __('Today Date. ' , 'bd'),
      	"id"    	=> "top_date",
      	"type"  	=> "checkbox"
);
$options["header_settings"]["today_date"][] = array
(
      	"name"  	=> __('Today Date Format' , 'bd'),
      	"label" 	=> __('Today Date Format' , 'bd'),
      	"tip"		=> __('Today Date Format. ' , 'bd'),
      	"id"    	=> "todaydate_format",
      	"type"  	=> "text",
      	"bdlink"	=> '<a target="_blank" href="http://codex.wordpress.org/Formatting_Date_and_Time">Documentation on date and time formatting</a>'
);

$options["header_settings"]['header_settings'][] = array
(
      	"name"  	=> __('general settings' , 'bd'),
      	"label" 	=> __('The Logo' , 'bd'),
      	"tip"		=> __('Upload Custom Logo' , 'bd'),
      	"id"    	=> "bd_logo",
      	"type"  	=> "upload",
);

$options["header_settings"]['header_settings'][] = array
(
		"name" 		=> __('margin top logo' , 'bd'),
		"label" 	=> __('margin top logo' , 'bd'),
		"tip"		=> __('margin top logo default (45px)' , 'bd'),
		"id"    	=> "margin_top_logo",
		"type"  	=> "slider_num",
		"unit" 		=> "px",
		"max" 		=> 100,
		"min" 		=> 0
);

$options["header_settings"]['header_settings'][] = array
(
		"name" 		=> __('margin top header ads' , 'bd'),
		"label" 	=> __('margin top header ads' , 'bd'),
		"tip"		=> __('margin top header ads default (50px)ads 468x60 - (35px)ads 728x90 ' , 'bd'),
		"id"    	=> "margin_top_header_ads",
		"type"  	=> "slider_num",
		"unit" 		=> "px",
		"max" 		=> 100,
		"min" 		=> 0
);

$options["header_settings"]['header_settings'][] = array
(
      	"name"  	=> __('general settings' , 'bd'),
      	"label" 	=> __('Favicon' , 'bd'),
      	"tip"		=> __('Upload Custom Favicon' , 'bd'),
      	"id"    	=> "favicon",
      	"type"  	=> "upload",
);

$options["header_settings"]['header_settings'][] = array
(
      	"name"  	=> __('Custom Gravatar' , 'bd'),
      	"label" 	=> __('Custom Gravatar' , 'bd'),
      	"tip"		=> __('Upload Custom Gravatar' , 'bd'),
      	"id"    	=> "gravatar",
      	"type"  	=> "upload",
);

$options["header_settings"]['header_settings'][] = array
(
      	"name"  	=> __('Custom Dashboard Logo' , 'bd'),
      	"label" 	=> __('Custom Dashboard Logo' , 'bd'),
      	"tip"		=> __('Upload Custom Dashboard Logo' , 'bd'),
      	"id"    	=> "dashboard_logo",
      	"type"  	=> "upload",
);





$options["header_settings"][] = array
(
      	"name"  	=> __('Header Code' , 'bd'),
		"label" 	=> __('Header Code' , 'bd'),
		"tip"		=> __('The following code will add to the <head> tag. Useful if you need to add additional scripts such as CSS or JS.' , 'bd'),
		"id"    	=> "header_code",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);

$options["header_settings"][] = array
(
		"name"  	=> __('Google Analytics' , 'bd'),
		"label"		=> __('Google Analytics' , 'bd'),
		"tip"		=> __('google analytics or any Script, it will be add before closing of body tag .' , 'bd'),
		"id"   		=> "google_analytics",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);

/* Archives settings
--------------------------------------------------------------*/
$options["posts_ratings"][] = array
(
      	"name"  	=> __('Posts Ratings Home' , 'bd'),
      	"label" 	=> __('Posts Ratings Home' , 'bd'),
      	"tip"		=> __('Turn this on to show Posts Ratings Home' , 'bd'),
      	"id"    	=> "posts_ratings_home",
      	"type"  	=> "checkbox",
);

$options["posts_ratings"][] = array
(
      	"name"  	=> __('Posts Ratings Article' , 'bd'),
      	"label" 	=> __('Posts Ratings Article' , 'bd'),
      	"tip"		=> __('Turn this on to show Posts Ratings Article' , 'bd'),
      	"id"    	=> "posts_ratings_article",
      	"type"  	=> "checkbox",
);
$options["posts_ratings"][] = array
(
      	"name"  	=> __('Posts Ratings Archives' , 'bd'),
      	"label" 	=> __('Posts Ratings Archives' , 'bd'),
      	"tip"		=> __('Turn this on to show Posts Ratings Archives' , 'bd'),
      	"id"    	=> "posts_ratings_archives",
      	"type"  	=> "checkbox",
);


$options["posts_ratings"][] = array
(
      	"name"  	=> __('Posts Ratings Tabs' , 'bd'),
      	"label" 	=> __('Posts Ratings Tabs' , 'bd'),
      	"tip"		=> __('Turn this on to show Posts Ratings Tabs' , 'bd'),
      	"id"    	=> "posts_ratings_tabs",
      	"type"  	=> "checkbox",
);
/* Posts Ratings
--------------------------------------------------------------*/

$options["archives_settings"]["category_page_settings"][] = array
(
		"name" 		=> __('Category Description' , 'bd'),
		"label" 	=> __('Category Description' , 'bd'),
		"tip"		=> __('Category Description' , 'bd'),
		"id"    	=> "category_desc",
		"type"  	=> "checkbox",
);
$options["archives_settings"]["category_page_settings"][] = array
(
		"name" 		=> __('Category RSS' , 'bd'),
		"label" 	=> __('Category RSS' , 'bd'),
		"tip"		=> __('Category RSS' , 'bd'),
		"id"    	=> "category_rss",
		"type"  	=> "checkbox",
);

$options["archives_settings"]["category_page_settings"][] = array
(
		"name" 		=> __('Show crumbs' , 'bd'),
		"label" 	=> __('Show crumbs' , 'bd'),
		"tip"		=> __('Show crumbs' , 'bd'),
		"id"    	=> "archives_crumbs",
		"type"  	=> "checkbox",
);



$options["archives_settings"]['general_settings'][] = array
(
		"name" 		=> __('archives display' , 'bd'),
		"label" 	=> __('archives display' , 'bd'),
		"id" 		=> "archives_display",
		"type"  	=> "radio",
		"list"		=> array("excerpt","fullthumb","content"),
		"js"		=> '
        		<script type="text/javascript">
        			jQuery(document).ready(function()
        			{
						jQuery(".r_archives_display").change(function ()
						{
                            if(jQuery(this).val() == "excerpt")
                            {
                            	jQuery(".get_fullthumb").hide();
								jQuery(".excerpt").fadeIn();
								jQuery(".get_content").hide();
                            }
							else if(jQuery(this).val() == "fullthumb")
							{
                            	jQuery(".get_fullthumb").hide();
								jQuery(".excerpt").hide();
								jQuery(".get_content").fadeIn();
							}
                            else
                            {
                            	jQuery(".get_fullthumb").fadeIn();
								jQuery(".excerpt").hide();
								jQuery(".get_content").hide();
                            }
	                    });
                    });
        		</script>'
);
$archives_display_fullthumb = (bdayh_get_option('archives_display') != 'fullthumb') ? 'hidden' : '';
$options["archives_settings"]['general_settings'][] = array
(
		"name" 		=> __('archives fullthumb' , 'bd'),
		"label" 	=> __('archives fullthumb' , 'bd'),
		"id"		=> "archives_display_fullthumb",
		"class" 	=> $archives_display_fullthumb . " get_fullthumb",
);

$archives_display_content = (bdayh_get_option('archives_display') != 'content') ? 'hidden' : '';

$options["archives_settings"]['general_settings'][] = array
(
		"name" 		=> __('archives content' , 'bd'),
		"label" 	=> __('archives content' , 'bd'),
		"id"		=> "archives_display_content",
		"class" 	=> $archives_display_content . " get_content",
);


/*
$options["archives_settings"]["category_page_settings"][] = array
(
		"name" 		=> __('Show Socail Buttons' , 'bd'),
		"label" 	=> __('Show Socail Buttons' , 'bd'),
		"tip"		=> __('Show Socail Buttons' , 'bd'),
		"id"    	=> "archives_socail",
		"type"  	=> "checkbox",
);
*/

$options["archives_settings"]["pages_settings"][] = array
(
		"name" 		=> __('Show Meta Pages' , 'bd'),
		"label" 	=> __('Show Meta Pages' , 'bd'),
		"tip"		=> __('Show Meta Pages' , 'bd'),
		"id"    	=> "meta_pages",
		"type"  	=> "checkbox",
);

$options["archives_settings"]["pages_settings"][] = array
(
		"name" 		=> __('Show pages Socail Buttons ' , 'bd'),
		"label" 	=> __('Show pages Socail Buttons ' , 'bd'),
		"tip"		=> __('Show pages  Socail Buttons ' , 'bd'),
		"id"    	=> "pages_socail_buttons",
		"type"  	=> "checkbox",
);

$options["archives_settings"]["category_page_settings"][] = array
(
		"name" 		=> __('Show Author' , 'bd'),
		"label" 	=> __('Show Author' , 'bd'),
		"tip"		=> __('Show Author' , 'bd'),
		"id"    	=> "archives_author",
		"type"  	=> "checkbox",
);


$options["archives_settings"][] = array
(
		"name" 		=> __('Show pagination' , 'bd'),
		"label" 	=> __('Show pagination' , 'bd'),
		"tip"		=> __('Show pagination' , 'bd'),
		"id"    	=> "archives_pagination",
		"type"  	=> "checkbox",
);



/* Article  settings
--------------------------------------------------------------*/
$options["article_settings"][] = array
(
		"name" 		=> __('Show crumbs' , 'bd'),
		"label" 	=> __('Show crumbs' , 'bd'),
		"tip"		=> __('Show crumbs' , 'bd'),
		"id"    	=> "article_crumbs",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show Meta Entry' , 'bd'),
		"label" 	=> __('Show Meta Entry :' , 'bd'),
		"tip"		=> __('Show Meta Entry .' , 'bd'),
		"id"    	=> "article_meta_entry",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_Pagination'][] = array
(
		"name" 		=> __('Show  Pagination' , 'bd'),
		"label" 	=> __('Show  Pagination :' , 'bd'),
		"tip"		=> __('Show  Pagination .' , 'bd'),
		"id"    	=> "article_meta_pagination",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_Pagination'][] = array
(
		"name" 		=> __('Stick The  Pagination' , 'bd'),
		"label" 	=> __('Stick The  Pagination :' , 'bd'),
		"tip"		=> __('Stick The  Pagination Right / Left Article .' , 'bd'),
		"id"    	=> "article_meta_pagination_stick",
		"type"  	=> "checkbox",
);



$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show Author Avatar ' , 'bd'),
		"label" 	=> __('Show Author Avatar ' , 'bd'),
		"tip"		=> __('Show Author Avatar.' , 'bd'),
		"id"    	=> "article_author_avatar",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show Author ' , 'bd'),
		"label" 	=> __('Show Author ' , 'bd'),
		"tip"		=> __('Show Author.' , 'bd'),
		"id"    	=> "article_author",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show date ' , 'bd'),
		"label" 	=> __('Show date ' , 'bd'),
		"tip"		=> __('Show date.' , 'bd'),
		"id"    	=> "article_date",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show category ' , 'bd'),
		"label" 	=> __('Show category ' , 'bd'),
		"tip"		=> __('Show category.' , 'bd'),
		"id"    	=> "article_category",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show comments ' , 'bd'),
		"label" 	=> __('Show comments ' , 'bd'),
		"tip"		=> __('Show comments.' , 'bd'),
		"id"    	=> "article_comments",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_elements'][] = array
(
		"name" 		=> __('Show tags ' , 'bd'),
		"label" 	=> __('Show tags ' , 'bd'),
		"tip"		=> __('Show tags.' , 'bd'),
		"id"    	=> "article_tags",
		"type"  	=> "checkbox",
);



$options["article_settings"][] = array
(
		"name" 		=> __('Show Author Box' , 'bd'),
		"label" 	=> __('Show Author Box' , 'bd'),
		"tip"		=> __('Show Author Box' , 'bd'),
		"id"    	=> "article_author_box",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Show Socail Buttons' , 'bd'),
		"label" 	=> __('Show Socail Buttons' , 'bd'),
		"tip"		=> __('Show Socail Buttons' , 'bd'),
		"id"    	=> "article_socail",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Tweet Button :' , 'bd'),
		"tip"		=> __('Tweet Button' , 'bd'),
		"id"    	=> "article_home_tweet",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Facebook Like Button :' , 'bd'),
		"tip"		=> __('Facebook Like Button' , 'bd'),
		"id"    	=> "article_home_fb",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Google+ Button :' , 'bd'),
		"tip"		=> __('Google+ Button' , 'bd'),
		"id"    	=> "article_home_gp",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('StumbleUpon Button :' , 'bd'),
		"tip"		=> __('StumbleUpon Button' , 'bd'),
		"id"    	=> "article_home_su",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Linkedin Button :' , 'bd'),
		"tip"		=> __('Linkedin Button' , 'bd'),
		"id"    	=> "article_home_in",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_share_post_settings'][] = array
(
		"name" 		=> __('Share Post Buttons' , 'bd'),
		"label" 	=> __('Pinterest Button :' , 'bd'),
		"tip"		=> __('Pinterest Button' , 'bd'),
		"id"    	=> "article_home_pin",
		"type"  	=> "checkbox",
);

$options["article_settings"]['article_related_posts'][] = array
(
		"name" 		=> __('Show related' , 'bd'),
		"label" 	=> __('Show related' , 'bd'),
		"tip"		=> __('Show related' , 'bd'),
		"id"    	=> "article_related",
		"type"  	=> "checkbox",
);
$options["article_settings"]['article_related_posts'][] = array
(
		"name" 		=> __('Number Of related Posts' , 'bd'),
		"label" 	=> __('Number Of related Posts' , 'bd'),
		"tip"		=> __('Number Of related Posts' , 'bd'),
		"id"    	=> "article_related_numb",
		"type"  	=> "slider_num",
		"unit" 		=> "Number",
		"max" 		=> 100,
		"min" 		=> 0
);

$options["article_settings"]['article_related_posts'][] = array
(
		"name" 		=> __('Related posts By' , 'bd'),
		"label" 	=> __('Related posts By' , 'bd'),
		"tip"		=> __('Related posts By' , 'bd'),
		"id"    	=> "related_type",
		"type"  	=> "radio",
		"list"	=> array("categories","tags"),
        	"js"	=> '
        		<script type="text/javascript">
        			jQuery(document).ready(function()
        			{
						jQuery(".r_radio").change(function ()
						{
                            if(jQuery(this).val() == "categories")
                            {
                            	jQuery(".radio_tags").hide();
								jQuery(".radio_categories").fadeIn();
                            }
                            else
                            {
                            	jQuery(".radio_tags").fadeIn();
								jQuery(".radio_categories").hide();
                            }
	                    });
                    });
        		</script>'
);

$options["article_settings"]['article_related_posts'][] = array
(
		"name" 		=> __('Related posts Style' , 'bd'),
		"label" 	=> __('Related posts Style' , 'bd'),
		"tip"		=> __('Related posts Style' , 'bd'),
		"id"    	=> "related_style",
		"type"  	=> "radio",
		"list"	=> array("images","list"),
        	"js"	=> '
        		<script type="text/javascript">
        			jQuery(document).ready(function()
        			{
						jQuery(".r_radio").change(function ()
						{
                            if(jQuery(this).val() == "images")
                            {
                            	jQuery(".radio_list").hide();
								jQuery(".radio_images").fadeIn();
                            }
                            else
                            {
                            	jQuery(".radio_list").fadeIn();
								jQuery(".radio_images").hide();
                            }
	                    });
                    });
        		</script>'
);
/* Article  Ads
--------------------------------------------------------------*/
$options["article_ads"]['article_above_ads'][] = array
(
		"name" 		=> __('Show article above ads' , 'bd'),
		"label" 	=> __('Show article above ads' , 'bd'),
		"tip"		=> __('Show article above ads' , 'bd'),
		"id"    	=> "article_above_ads",
		"type"  	=> "checkbox",
);

$options["article_ads"]['article_above_ads'][] = array
(
		"name"  	=> __('above ads code' , 'bd'),
		"label"		=> __('above ads code' , 'bd'),
		"tip"		=> __('above ads code .' , 'bd'),
		"id"   		=> "above_ads_code",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);
$options["article_ads"]['article_above_ads'][] = array
(
		"name" 		=> __('above ads img' , 'bd'),
		"label" 	=> __('above ads img' , 'bd'),
		"tip"		=> __('above ads img upload' , 'bd'),
		"id"    	=> "above_ads_img",
		"type"  	=> "upload"
);
$options["article_ads"]['article_above_ads'][] = array
(
		"name" 		=> __('above ads url' , 'bd'),
		"label" 	=> __('above ads url' , 'bd'),
		"tip"		=> __('above ads url' , 'bd'),
		"id"    	=> "above_ads_img_url",
		"type"  	=> "text"
);
$options["article_ads"]['article_above_ads'][] = array
(
		"name" 		=> __('above ads Alternate Name' , 'bd'),
		"label" 	=> __('above ads Alternate Name' , 'bd'),
		"tip"		=> __('above ads Alternate Name' , 'bd'),
		"id"    	=> "above_ads_img_altname",
		"type"  	=> "text"
);

// above ads

$options["article_ads"]['article_below_ads'][] = array
(
		"name" 		=> __('Show article below ads' , 'bd'),
		"label" 	=> __('Show article below ads' , 'bd'),
		"tip"		=> __('Show article below ads' , 'bd'),
		"id"    	=> "article_below_ads",
		"type"  	=> "checkbox",
);

$options["article_ads"]['article_below_ads'][] = array
(
		"name"  	=> __('below ads code' , 'bd'),
		"label"		=> __('below ads code' , 'bd'),
		"tip"		=> __('below ads code .' , 'bd'),
		"id"   		=> "below_ads_code",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);
$options["article_ads"]['article_below_ads'][] = array
(
		"name" 		=> __('below ads img' , 'bd'),
		"label" 	=> __('below ads img' , 'bd'),
		"tip"		=> __('below ads img upload' , 'bd'),
		"id"    	=> "below_ads_img",
		"type"  	=> "upload"
);
$options["article_ads"]['article_below_ads'][] = array
(
		"name" 		=> __('below ads url' , 'bd'),
		"label" 	=> __('below ads url' , 'bd'),
		"tip"		=> __('below ads url' , 'bd'),
		"id"    	=> "below_ads_img_url",
		"type"  	=> "text"
);
$options["article_ads"]['article_below_ads'][] = array
(
		"name" 		=> __('below ads Alternate Name' , 'bd'),
		"label" 	=> __('below ads Alternate Name' , 'bd'),
		"tip"		=> __('below ads Alternate Name' , 'bd'),
		"id"    	=> "below_ads_img_altname",
		"type"  	=> "text"
);

/* Social settings
--------------------------------------------------------------*/
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('social networking' , 'bd'),
		"label" 	=> __('Show Social Networking' , 'bd'),
		"tip"		=> __('Show Social icons in Footer.' , 'bd'),
		"id"    	=> "social_networking",
		"type"  	=> "checkbox"
);
$options["social_networking"][] = array
(
		"name" 		=> __('Twitter User name' , 'bd'),
		"label" 	=> __('Twitter User name' , 'bd'),
		"tip"		=> __('Twitter User name' , 'bd'),
		"id"    	=> "article_twitter_sername",
		"type"  	=> "text"
);
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Twitter' , 'bd'),
		"label" 	=> __('Twitter' , 'bd'),
		"tip"		=> __('Twitter' , 'bd'),
		"id"    	=> "twitter_url",
		"type"  	=> "text"
);
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Facebook' , 'bd'),
		"label" 	=> __('Facebook' , 'bd'),
		"tip"		=> __('Facebook' , 'bd'),
		"id"    	=> "facebook_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Google+' , 'bd'),
		"label" 	=> __('Google+' , 'bd'),
		"tip"		=> __('Google+' , 'bd'),
		"id"    	=> "gplus_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('linkedin' , 'bd'),
		"label" 	=> __('linkedin' , 'bd'),
		"tip"		=> __('linkedin' , 'bd'),
		"id"    	=> "linkedin_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('digg' , 'bd'),
		"label" 	=> __('digg' , 'bd'),
		"tip"		=> __('digg' , 'bd'),
		"id"    	=> "digg_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Rss' , 'bd'),
		"label" 	=> __('Rss' , 'bd'),
		"tip"		=> __('Rss' , 'bd'),
		"id"    	=> "rss_url",
		"type"  	=> "text"
);
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Youtube' , 'bd'),
		"label" 	=> __('Youtube' , 'bd'),
		"tip"		=> __('Youtube' , 'bd'),
		"id"    	=> "youtube_url",
		"type"  	=> "text"
);
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Flickr' , 'bd'),
		"label" 	=> __('Flickr' , 'bd'),
		"tip"		=> __('Flickr' , 'bd'),
		"id"    	=> "flickr_url",
		"type"  	=> "text"
);
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('Pinterest' , 'bd'),
		"label" 	=> __('Pinterest' , 'bd'),
		"tip"		=> __('Pinterest' , 'bd'),
		"id"    	=> "pinterest_url",
		"type"  	=> "text"
);
$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('behance' , 'bd'),
		"label" 	=> __('behance' , 'bd'),
		"tip"		=> __('behance' , 'bd'),
		"id"    	=> "behance_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('reddit' , 'bd'),
		"label" 	=> __('reddit' , 'bd'),
		"tip"		=> __('reddit' , 'bd'),
		"id"    	=> "reddit_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('myspace' , 'bd'),
		"label" 	=> __('myspace' , 'bd'),
		"tip"		=> __('myspace' , 'bd'),
		"id"    	=> "myspace_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('skype name' , 'bd'),
		"label" 	=> __('skype name' , 'bd'),
		"tip"		=> __('skype name .' , 'bd'),
		"id"    	=> "skype_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('envato' , 'bd'),
		"label" 	=> __('envato' , 'bd'),
		"tip"		=> __('envato' , 'bd'),
		"id"    	=> "envato_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('deviantart' , 'bd'),
		"label" 	=> __('deviantart' , 'bd'),
		"tip"		=> __('deviantart' , 'bd'),
		"id"    	=> "deviantart_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('blogger' , 'bd'),
		"label" 	=> __('blogger' , 'bd'),
		"tip"		=> __('blogger' , 'bd'),
		"id"    	=> "blogger_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('tumblr' , 'bd'),
		"label" 	=> __('tumblr' , 'bd'),
		"tip"		=> __('tumblr' , 'bd'),
		"id"    	=> "tumblr_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('vimeo' , 'bd'),
		"label" 	=> __('vimeo' , 'bd'),
		"tip"		=> __('vimeo' , 'bd'),
		"id"    	=> "vimeo_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('instagram' , 'bd'),
		"label" 	=> __('instagram' , 'bd'),
		"tip"		=> __('instagram' , 'bd'),
		"id"    	=> "instagram_url",
		"type"  	=> "text"
);

$options["social_networking"]['social_networking'][] = array
(
		"name" 		=> __('foursquare' , 'bd'),
		"label" 	=> __('foursquare' , 'bd'),
		"tip"		=> __('foursquare' , 'bd'),
		"id"    	=> "foursquare_url",
		"type"  	=> "text"
);



$options["social_networking"]['share_button_boxy'][] = array
(
		"name" 		=> __('Twitter' , 'bd'),
		"label" 	=> __('Twitter' , 'bd'),
		"tip"		=> __('Twitter' , 'bd'),
		"id"    	=> "twitter_button_boxy",
		"type"  	=> "checkbox"
);

$options["social_networking"]['share_button_boxy'][] = array
(
		"name" 		=> __('Facebook' , 'bd'),
		"label" 	=> __('Facebook' , 'bd'),
		"tip"		=> __('Facebook' , 'bd'),
		"id"    	=> "facebook_button_boxy",
		"type"  	=> "checkbox"
);

$options["social_networking"]['share_button_boxy'][] = array
(
		"name" 		=> __('Google +' , 'bd'),
		"label" 	=> __('Google +' , 'bd'),
		"tip"		=> __('Google +' , 'bd'),
		"id"    	=> "googlep_button_boxy",
		"type"  	=> "checkbox"
);

$options["social_networking"]['share_button_boxy'][] = array
(
		"name" 		=> __('Linkedin' , 'bd'),
		"label" 	=> __('Linkedin' , 'bd'),
		"tip"		=> __('Linkedin' , 'bd'),
		"id"    	=> "linkedin_button_boxy",
		"type"  	=> "checkbox"
);

$options["social_networking"]['share_button_boxy'][] = array
(
		"name" 		=> __('Stumbleupon' , 'bd'),
		"label" 	=> __('Stumbleupon' , 'bd'),
		"tip"		=> __('Stumbleupon' , 'bd'),
		"id"    	=> "stumbleupon_button_boxy",
		"type"  	=> "checkbox"
);


/* Banners settings
--------------------------------------------------------------*/
$options["banners_settingss"]['header_ads'][] = array
(
		"name" 		=> __('header ads' , 'bd'),
		"label" 	=> __('Show header ads' , 'bd'),
		"tip"		=> __('Show header ads.' , 'bd'),
		"id"    	=> "show_header_ads",
		"type"  	=> "checkbox"
);
$options["banners_settingss"]['header_ads'][] = array
(
		"name"  	=> __('header ads code' , 'bd'),
		"label"		=> __('header ads code' , 'bd'),
		"tip"		=> __('header ads code .' , 'bd'),
		"id"   		=> "header_ads_code",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);
$options["banners_settingss"]['header_ads'][] = array
(
		"name" 		=> __('header ads img' , 'bd'),
		"label" 	=> __('header ads img' , 'bd'),
		"tip"		=> __('header ads img upload' , 'bd'),
		"id"    	=> "header_ads_img",
		"type"  	=> "upload"
);
$options["banners_settingss"]['header_ads'][] = array
(
		"name" 		=> __('header ads url' , 'bd'),
		"label" 	=> __('header ads url' , 'bd'),
		"tip"		=> __('header ads url' , 'bd'),
		"id"    	=> "header_ads_img_url",
		"type"  	=> "text"
);
$options["banners_settingss"]['header_ads'][] = array
(
		"name" 		=> __('header ads Alternate Name' , 'bd'),
		"label" 	=> __('header ads Alternate Name' , 'bd'),
		"tip"		=> __('header ads Alternate Name' , 'bd'),
		"id"    	=> "header_ads_img_altname",
		"type"  	=> "text"
);

// header_ads

$options["banners_settingss"]['top_footer_ads'][] = array
(
		"name" 		=> __('top footer ads' , 'bd'),
		"label" 	=> __('Show top footer ads' , 'bd'),
		"tip"		=> __('Show top footer ads.' , 'bd'),
		"id"    	=> "show_top_footer_ads",
		"type"  	=> "checkbox"
);
$options["banners_settingss"]['top_footer_ads'][] = array
(
		"name"  	=> __('top footer ads code' , 'bd'),
		"label"		=> __('top footer ads code' , 'bd'),
		"tip"		=> __('top footer ads code .' , 'bd'),
		"id"   		=> "top_footer_ads_code",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);
$options["banners_settingss"]['top_footer_ads'][] = array
(
		"name" 		=> __('top footer ads img' , 'bd'),
		"label" 	=> __('top footer ads img' , 'bd'),
		"tip"		=> __('top footer ads img upload' , 'bd'),
		"id"    	=> "top_footer_ads_img",
		"type"  	=> "upload"
);
$options["banners_settingss"]['top_footer_ads'][] = array
(
		"name" 		=> __('top footer ads url' , 'bd'),
		"label" 	=> __('top footer ads url' , 'bd'),
		"tip"		=> __('top footer ads url' , 'bd'),
		"id"    	=> "top_footer_ads_img_url",
		"type"  	=> "text"
);
$options["banners_settingss"]['top_footer_ads'][] = array
(
		"name" 		=> __('top footer ads Alternate Name' , 'bd'),
		"label" 	=> __('top footer ads Alternate Name' , 'bd'),
		"tip"		=> __('top footer ads Alternate Name' , 'bd'),
		"id"    	=> "top_footer_ads_img_altname",
		"type"  	=> "text"
);

/* Skins Colors settings
--------------------------------------------------------------*/

$options["feature_tabs"][] = array
(
		"name" 		=> __('Feature Tabs' , 'bd'),
		"label" 	=> __('Feature Tabs' , 'bd'),
		"tip"		=> __('Feature Tabs' , 'bd'),
		"id"    	=> "feature_tabs",
		"type"  	=> "checkbox",
);
$options["feature_tabs"][] = array
(
		"name" 		=> __('First Tab' , 'bd'),
		"label" 	=> __('Select First Tab Category' , 'bd'),
		"tip"		=> __('Select First Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat1",
		"type"  	=> "select",
		"list"		=> "cats"
);
$options["feature_tabs"][] = array
(
		"name" 		=> __('Second Tab' , 'bd'),
		"label" 	=> __('Select Second Tab Category' , 'bd'),
		"tip"		=> __('Select Second Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat2",
		"type"  	=> "select",
		"list"		=> "cats"
);

$options["feature_tabs"][] = array
(
		"name" 		=> __('Third Tab' , 'bd'),
		"label" 	=> __('Select Third Tab Category' , 'bd'),
		"tip"		=> __('Select Third Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat3",
		"type"  	=> "select",
		"list"		=> "cats"
);

$options["feature_tabs"][] = array
(
		"name" 		=> __('Fourth Tab' , 'bd'),
		"label" 	=> __('Select Fourth Tab Category' , 'bd'),
		"tip"		=> __('Select Fourth Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat4",
		"type"  	=> "select",
		"list"		=> "cats"
);

$options["feature_tabs"][] = array
(
		"name" 		=> __('Fifth  Tab' , 'bd'),
		"label" 	=> __('Select Fifth  Tab Category' , 'bd'),
		"tip"		=> __('Select Fifth  Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat5",
		"type"  	=> "select",
		"list"		=> "cats"
);

$options["feature_tabs"][] = array
(
		"name" 		=> __('Sixth   Tab' , 'bd'),
		"label" 	=> __('Select Sixth   Tab Category' , 'bd'),
		"tip"		=> __('Select Sixth   Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat6",
		"type"  	=> "select",
		"list"		=> "cats"
);
$options["feature_tabs"][] = array
(
		"name" 		=> __('Seventh Tab' , 'bd'),
		"label" 	=> __('Select Seventh Tab Category' , 'bd'),
		"tip"		=> __('Select Seventh  Tab Category' , 'bd'),
		"id"    	=> "feature_tabs_cat7",
		"type"  	=> "select",
		"list"		=> "cats"
);
/* Skins Colors settings
--------------------------------------------------------------*/



/* Feature Slider
--------------------------------------------------------------*/

$options["slider_settings"]['slider_settings'][] = array
(
		"name" 		=> __('Show Feature Slider' , 'bd'),
		"label" 	=> __('Show Feature Slider' , 'bd'),
		"tip"		=> __('Show Feature Slider' , 'bd'),
		"id"    	=> "feature_slider",
		"type"  	=> "checkbox",
);

$options["slider_settings"]['slider_settings'][] = array
(
		"name" 		=> __('Slider Type' , 'bd'),
		"label" 	=> __('Slider Type' , 'bd'),
		"tip"		=> __('Slider Type' , 'bd'),
		"id"    	=> "slider_type",
		"type"  	=> "radio",
		"list"		=> array("flexislider","cycleslider"),
);

$options["slider_settings"][] = array
(
		"name" 		=> __('Show Small Thumbs' , 'bd'),
		"label" 	=> __('Show Small Thumbs' , 'bd'),
		"tip"		=> __('Show Small Thumbs' , 'bd'),
		"id"    	=> "feature_slider_small_thumb",
		"type"  	=> "checkbox",
);

$options["slider_settings"]['slider_edit'][] = array
(
		"name" 		=> __('Number Slides' , 'bd'),
		"label" 	=> __('Number Slides' , 'bd'),
		"tip"		=> __('Number Slides Default 7 - More slides, Must Hide Small Thumbs' , 'bd'),
		"id"    	=> "feature_slider_numb",
		"type"  	=> "slider_num",
		"unit" 		=> "Number",
		"max" 		=> 100,
		"min" 		=> 0
);
$options["slider_settings"]['slider_edit'][] = array
(
		"name" 		=> __('Slideshow Speed' , 'bd'),
		"label" 	=> __('Slideshow Speed' , 'bd'),
		"tip"		=> __('Number Slides Default 4000' , 'bd'),
		"id"    	=> "feature_slider_speed",
		"type"  	=> "slider_num",
		"unit"		=> "ms",
		"min" 		=> 10,
	   	"max" 		=> 10000
);
$options["slider_settings"]['slider_edit'][] = array
(
		"name" 		=> __('Animation Speed' , 'bd'),
		"label" 	=> __('Animation Speed' , 'bd'),
		"tip"		=> __('Number Slides Default 600' , 'bd'),
		"id"    	=> "feature_slider_animation",
		"type"  	=> "slider_num",
		"unit"		=> "ms",
		"min" 		=> 0,
	   	"max" 		=> 5000

);

$options["slider_settings"]['feature_display'][] = array
(
		"name" 		=> __('feature display' , 'bd'),
		"label" 	=> __('feature display' , 'bd'),
		"id" 		=> "feature_display",
		"type"  	=> "radio",
		"list"		=> array("lates","category","tag"),
		"js"		=> '
        		<script type="text/javascript">
        			jQuery(document).ready(function()
        			{
						jQuery(".r_feature_display").change(function ()
						{
                            if(jQuery(this).val() == "lates")
                            {
                            	jQuery("#feature_category").hide();
								jQuery(".lates").fadeIn();
								jQuery(".get_my_tags").hide();
                            }
							else if(jQuery(this).val() == "tag")
							{
                            	jQuery("#feature_category").hide();
								jQuery(".lates").hide();
								jQuery(".get_my_tags").fadeIn();
							}
                            else
                            {
                            	jQuery("#feature_category").fadeIn();
								jQuery(".lates").hide();
								jQuery(".get_my_tags").hide();
                            }
	                    });
                    });
        		</script>'
);

$feature_display_category = (bdayh_get_option('feature_display') != 'category') ? 'hidden' : '';
$options["slider_settings"]['feature_display'][] = array
(
		"name" 		=> __('Feature Category' , 'bd'),
		"label" 	=> __('Feature Category' , 'bd'),
		"id"		=> "feature_category",
		"type"  	=> "select",
		"class" 	=> $feature_display_category,
		"list"		=> "cats"
);
$feature_display_category = (bdayh_get_option('feature_display') != 'tag') ? 'hidden' : '';
$options["slider_settings"]['feature_display'][] = array
(
		"name" 		=> __('Feature Tag' , 'bd'),
		"label" 	=> __('Feature Tag' , 'bd'),
		"id"		=> "feature_tag",
		"class" 	=> $feature_display_category ." get_my_tags",
		"type"  	=> "tags"
);

/* Seo settings
--------------------------------------------------------------*/

$options["seo"][] = array
(
		"name" 		=> __('SEO' , 'bd'),
		"label" 	=> __('Enable SEO' , 'bd'),
		"tip"		=> __('Enable SEO' , 'bd'),
		"id"    	=> "seo_settings",
		"type"  	=> "checkbox"
);

$options["seo"][] = array
(
		"name" 		=> __('SEO' , 'bd'),
		"label" 	=> __('Keywords' , 'bd'),
		"tip"		=> __('Add Your Keywords' , 'bd'),
		"id"    	=> "seo_keywords",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",

);

/* Skins Colors settings
--------------------------------------------------------------*/

$options["custom_css"][] = array
(
		"name" 		=> __('Custom CSS' , 'bd'),
		"label" 	=> __('Custom CSS' , 'bd'),
		"tip"		=> __('Add Your Custom CSS' , 'bd'),
		"id"    	=> "custom_css",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",
);

$options["custom_css"][] = array
(
		"name" 		=> __('Custom CSS For Device With 768px Width Like Ipad' , 'bd'),
		"label" 	=> __('Custom CSS' , 'bd'),
		"tip"		=> __('Custom CSS For Device With 768px Width Like Ipad' , 'bd'),
		"id"    	=> "custom_768",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",

);

$options["custom_css"][] = array
(
		"name" 		=> __('Custom CSS For Device With 480px Width Like Landscape Phones' , 'bd'),
		"label" 	=> __('Custom CSS' , 'bd'),
		"tip"		=> __('Custom CSS For Device With 480px Width Like Landscape Phones' , 'bd'),
		"id"    	=> "custom_480",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",

);

$options["custom_css"][] = array
(
		"name" 		=> __('Custom CSS For Device With 320px Width Like IPhones' , 'bd'),
		"label" 	=> __('Custom CSS' , 'bd'),
		"tip"		=> __('Custom CSS For Device With 320px Width Like IPhones' , 'bd'),
		"id"    	=> "custom_320",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",

);

/* Skins Colors settings
--------------------------------------------------------------*/
$options["advanced_settings"][] = array
(
		"name" 		=> __('Theme Updates' , 'bd'),
		"label" 	=> __('Notify On Theme Updates' , 'bd'),
		"tip"		=> __('Notify On Theme Updates .' , 'bd'),
		"id"    	=> "notify_theme",
		"type"  	=> "checkbox",
);
$options["advanced_settings"]['twitter_API_OAuth_settings'][] = array
(
		"name" 		=> "",
		"label" 	=> __('Twitter API -  You need to create <a href="https://dev.twitter.com/apps" target="_blank">Twitter APP</a> .' , 'bd'),
		"class"		=> "",
		"type"  	=> "ptext",
);

$options["advanced_settings"]['twitter_API_OAuth_settings'][] = array
(
		"name" 		=> "",
		"label" 	=> __('Twitter Username' , 'bd'),
		"tip"		=> __('Twitter Username .' , 'bd'),
		"id"    	=> "twitter_username",
		"type"  	=> "text",
);

$options["advanced_settings"]['twitter_API_OAuth_settings'][] = array
(
		"name" 		=> "",
		"label" 	=> __('Consumer key' , 'bd'),
		"tip"		=> __('Consumer key .' , 'bd'),
		"id"    	=> "twitter_consumer_key",
		"type"  	=> "text",
);

$options["advanced_settings"]['twitter_API_OAuth_settings'][] = array
(
		"name" 		=> "",
		"label" 	=> __('Consumer secret' , 'bd'),
		"tip"		=> __('Consumer secret .' , 'bd'),
		"id"    	=> "twitter_consumer_secret",
		"type"  	=> "text",
);

$options["advanced_settings"]['twitter_API_OAuth_settings'][] = array
(
		"name" 		=> "",
		"label" 	=> __('Access token' , 'bd'),
		"tip"		=> __('Access token .' , 'bd'),
		"id"    	=> "twitter_access_token",
		"type"  	=> "text",
);

$options["advanced_settings"]['twitter_API_OAuth_settings'][] = array
(
		"name" 		=> "",
		"label" 	=> __('Access token secret' , 'bd'),
		"tip"		=> __('Access token secret .' , 'bd'),
		"id"    	=> "twitter_access_token_secret",
		"type"  	=> "text",
);

/* Advanced settings
--------------------------------------------------------------*/

$options["theme_backup"][] = array
(
		"name" 		=> __('Export' , 'bd'),
		"label" 	=> __('Export' , 'bd'),
		"tip"		=> __('save in text file' , 'bd'),
		"id"    	=> "advanced_export",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",

);

$options["theme_backup"][] = array
(
		"name" 		=> __('Import' , 'bd'),
		"label" 	=> __('Import' , 'bd'),
		"tip"		=> __('Import' , 'bd'),
		"id"    	=> "advanced_import",
		"type"  	=> "textarea",
		"class"		=> "textarea_full",

);
?>