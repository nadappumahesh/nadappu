var $ =jQuery.noConflict();
jQuery(document).ready(function($){

jQuery('.pp-img a img, .post_thumbnail img, .flickr_badge_image img, header .ads_468, footer img, .ads_bottom img, ul.small_thumbs li img, .post_thumbnail a, .widget_ads_125 a, .slider .top_slider .thumb img, .first-post-thumbnail img, .first-post-thumbnail-tabs img, .first-post-thumbnail-box img').hover( function() {
    jQuery(this).stop().animate({opacity:0.8},{queue:false,duration:200});  
   	}, function() {
    jQuery(this).stop().animate({opacity:1},{queue:false,duration:200});  
});

jQuery(".bdayh_theme_colors li").click(function()
{
    var link_color =  jQuery(this).find('a').attr('href').replace('#','');
    jQuery('#style_blue,#style_green,#style_rose,#style_orange,#style_gray').attr('disabled','disabled');
	jQuery('#style_'+link_color).removeAttr('disabled');
});

jQuery(".theme_p li").click(function()
{
    var pattren_num =  jQuery(this).find('a').attr('href').replace('#','');
	if(pattren_num < 17 && pattren_num >= 1)
	{
    	jQuery('body').css('background-image',"url('"+cherry_url+"/assets/images/pattern/pattern_"+ pattren_num +".png')");
 		jQuery('#stylebg_bg1,#stylebg_bg2').attr('disabled','disabled');
	}
});


jQuery(".bgfull li").click(function()
{
    var backfull =  jQuery(this).find('a').attr('href').replace('#','');
    jQuery('#stylebg_bg1,#stylebg_bg2').attr('disabled','disabled');
	jQuery('#stylebg_'+backfull).removeAttr('disabled');
});


jQuery(".bdayh_theme_wide").click(function()
{
	jQuery('#style_wide').attr('disabled','disabled');
	jQuery('#style_wide').removeAttr('disabled');
});

jQuery(".bdayh_theme_blocks").click(function()
{
	jQuery('#style_wide').attr('disabled','disabled');
});

jQuery(".bdayh_theme_leftsidebar").click(function()
{
	jQuery('#style_sidebarleft').attr('disabled','disabled');
	jQuery('#style_sidebarleft').removeAttr('disabled');
});

jQuery(".bdayh_theme_rightsidebar").click(function()
{
	jQuery('#style_sidebarleft').attr('disabled','disabled');
});


jQuery(".widget_tabs ol.tabs_nav li a, .box_tabs ol.box_tabs_nav li a, div.gotop a, ul.small_thumbs li a, .scrolling_box .nav a,.theme_switcher a").click(function(event)
{
	event.preventDefault(event);
});
// preventDefault

jQuery('.toolbar ul li ul, nav ul li ul').parent('li').addClass('lists');
jQuery('.lists').find("a:first").append(' <span class="sub">&raquo;</span>')
jQuery(".toolbar ul li, nav ul li").each(function () {	
var jQuerysubmeun = jQuery(this).find('ul:first');
	jQuery(this).hover(function () {
	jQuerysubmeun.stop().css({overflow: "hidden",height: "auto",display: "none",paddingTop: 0}).slideDown(180,
	function () {
	jQuery(this).css({overflow: "visible",height: "auto"});
});
}, function () {
	jQuerysubmeun.stop().slideUp(180, function () {
	jQuery(this).css({overflow: "hidden",display: "none"});
});
});
});
jQuery

// Toolbar

// Toggle Shortcode
	jQuery(".toggle-head-open").click(function () {
		jQuery(this).parent().find(".toggle-content").stop().slideToggle(400);
		jQuery(this).hide();
		jQuery(this).parent().find(".toggle-head-close").stop().show();
    });
	jQuery(".toggle-head-close").click(function () {
		jQuery(this).parent().find(".toggle-content").stop().slideToggle(400);
		jQuery(this).hide();
		jQuery(this).parent().find(".toggle-head-open").stop().show();
    });


jQuery("<select />").appendTo(".inner_toolbar .toolbar, nav .content");
	jQuery("<option />", {
		"selected": "selected",
		"value": "",
		"text": "Go to .."
		}).appendTo(".inner_toolbar .toolbar select, nav .content select");
		jQuery(".inner_toolbar .toolbar li, nav .content li").each(function () {
		var depth = jQuery(this).parents('ul').length - 1;
		var indent = '';
		if (depth > 0) {
		indent = ' - ';
		}
		if (depth > 1) {
		indent = ' - - ';
		}
		if (depth > 2) {
		indent = ' - - -';
		}
		if (depth > 3) {
		indent = ' - - - -';
		}
		var el = jQuery(this).children('a');
		jQuery("<option />", {
		"value": el.attr("href"),
		"text": (indent + el.text())
	})
		.appendTo(".inner_toolbar .toolbar select, nav .content select");
	});
	jQuery(".inner_toolbar .toolbar select, nav .content select").change(function () {
	window.location = jQuery(this).find("option:selected").val();
});
// Responsive nav

jQuery('.theme_switcher_button').on('click', function(e){
        e.preventDefault();
        if(jQuery('.theme_switcher').hasClass('opened')){
            jQuery('.theme_switcher').animate({
                left: -192
            }, 700, function(){
                jQuery(this).removeClass('opened');
            });
        }else{
            jQuery('.theme_switcher').animate({
                left: 0
            }, 700, function(){
                jQuery(this).addClass('opened');
       });
}});
// Theme switcher


	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.gotop').css({bottom:"15px"});
		} else {
			jQuery('.gotop').css({bottom:"-100px"});
		}
	});
	jQuery('.gotop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	//scroll
	
	jQuery(document).ready(function(){
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal' });
		event.preventDefault(event);
		return false;
  	});
	
	
	jQuery(".widgetslider").hover(function(event) {{
		jQuery(this).find('a.flex-next').stop(true, true).animate({opacity: 1, right: "20px"}, {duration: 400});
		jQuery(this).find('a.flex-prev').stop(true, true).animate({opacity: 1, left: "20px"}, {duration: 400});
	}},
	function(){
		jQuery(this).find('a.flex-next').stop(true, true).animate({opacity: 0, right: "-50px"}, {duration: 400});
		jQuery(this).find('a.flex-prev').stop(true, true).animate({opacity: 0, left: "-50px"}, {duration: 400});
	}); 




jQuery(".footer_bottom ul.widget_social li, .toolbar ul.widget_social li").each(function () {

	jQuery("a strong", this).css("opacity", "0");});
	jQuery(".footer_bottom ul.widget_social li, .toolbar ul.widget_social li").hover(function () {
	jQuery(this).stop().fadeTo(500, 1).siblings().stop().fadeTo(500, 0.1);
	jQuery("a strong", this).stop().animate({opacity: 0.4,}, 300);},
function () {
	jQuery(this).stop().fadeTo(500, 0.4).siblings().stop().fadeTo(500, 0.4);
	jQuery("a strong", this).stop().animate({opacity: 0,}, 300);
});
jQuery
// social




jQuery('.toolbar ul.top_menu > li > ul > li a, nav ul.menu > li > ul > li a, .widget .cat-item, ul.sitemap_content > li ul >li , .timeline_list li a').hover(function (event) {
jQuery(this).stop().animate({textIndent: "7px"}, {duration: 400});},
function () {
jQuery(this).stop().animate({textIndent: "0px"}, {duration: 400});
});
// links
jQuery(".m").addClass('end_row');
// footer



jQuery(".first-post-thumbnail ").hover(function(event) {
{
	jQuery(this).find('span.article-icon').stop(true, true).animate({opacity: 1, left: "50%"}, {duration: 500 /*,easing: 'easeOutElastic'*/});
}},
function(){
	jQuery(this).find('span.article-icon').stop(true, true).animate({opacity: 0, left: "-50px"},{duration: 200 /*,easing: 'easeOutElastic'*/});
});



jQuery(".widget .widget_container ul li").hover(function(event) {
{
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 1, left: 17}, {duration: 'slow'/*,easing: 'easeOutElastic'*/});
}},
function(){
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 0, left: 0},400);
});


jQuery(".scrolling_box .items .item").hover(function(event) {
{
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 1, left: 55}, {duration: 'slow'/*,easing: 'easeOutElastic'*/});
}},
function(){
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 0, left: 0},400);
});

jQuery(".news_pic_home .post_thumbnail, .cat_box ul li .post_thumbnail, .pp-post-thumbnail-blog").hover(function(event) {

{
	jQuery(this).find('span.bd_over_post').stop(true, true).animate({opacity: 1, right: '0'}, {duration: 'slow'});


jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 1, left: '45%'}, {duration: 300,easing: 'easeOutBounce'});
}},
function(){
jQuery(this).find('span.bd_over_post').stop(true, true).animate({opacity: 0, right: '-350px'},{duration: 'slow'});

jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 0, left: 0},400);


});
// post_thumbnail



jQuery('.news_pic a, .recent_news a, .widget_ads_125 a, .widget .tagcloud a, .widget_social a, .footer_social a, .author_social a, .news_pic_home li a, .ads_bottom a, .ads_468 a, .scrolling_box_content .items .item div.post_thumbnail a, .flickr_badge_image img , #calendar_wrap a, .home_ads a , .article_above_ads a, .recent_bd ul li a, .inner_post .bdayh_tip,.ads_250x250 img, .tip').tipsy({
fade: true,
gravity: 's'
});
//tooltip

jQuery(".tab_container").hide();
jQuery("ol.tabs_nav li:first").addClass("active").show();
jQuery(".tab_container:first").show();
jQuery("ol.tabs_nav li").click(function() {
	jQuery("ol.tabs_nav li").removeClass("active");
	jQuery(this).addClass("active");
	jQuery(".tab_container").hide();
	var activeTab = jQuery(this).find("a").attr("href");
	jQuery(activeTab).fadeIn();
	return false;
});

jQuery('.alert_home_close img').click(function() {
jQuery('.alert_home').fadeOut(500).fadeIn(500).fadeOut(500);
});
// End alert home


});

jQuery(window).load(function(){
		var hedaerHeight = jQuery('#cherry-nav').offset().top ;
		var main = jQuery('.fixed-enabled');
		jQuery(window).scroll(function(){
			HeaderScroll();
		});
		jQuery(window).load(function(){
			HeaderScroll();
		});
		function HeaderScroll(){
			var scrollY=jQuery(window).scrollTop();
			if(main.length>0){
				if(scrollY > hedaerHeight){
					main.stop().addClass('fixed-nav');
				}else if(scrollY < hedaerHeight){
					main.removeClass('fixed-nav');
				}
			}
		}
});


jQuery(document).ready(function($){
  jQuery(document).delegate('.ratings:not(.rated) a', 'click', function(event){

    event.preventDefault(event);

    var control = jQuery(this).parents('.ratings');

    jQuery.ajax({
      url: (typeof atom_config !== 'undefined') ? atom_config.blog_url :  post_ratings.blog_url,
      type: 'GET',
      dataType: 'json',
      context: this,
	  
	  

      data: ({
        post_id: control.data('post'),
        rate: jQuery(this).parents('li').index(),
      }),

      beforeSend: function(){
        control.removeClass('error').addClass('loading');
      },

      error: function(){
        control.addClass('error');
      },

      success: function(response){

        // we have an error, display it
        if(response.error){
          control.addClass('error').find('.meta').html(response.error);
          jQuery('a', control).remove();
          return;
        }

        // no error, replace the control html with the new one
        control.replaceWith(jQuery(response.html));

        // other plugins can hook into this event.
        // (the response object contains more info than we used here)
        control.trigger('rated_post', response);
      }
    });

    return true;

  });

});
