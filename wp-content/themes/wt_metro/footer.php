<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package  WellThemes
 * @file     footer.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
	</div><!-- /main -->

	<footer id="footer" role="contentinfo">
		
		<div class="footer-widgets">
			
			<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>				
				
				<div class="widget widget_text">
					<h3>எங்களை பற்றி</h3>
					<div class="textwidget">பெருங்கனவொன்றின் தொடக்கப் புள்ளியாக உங்கள் முன் விரிந்துள்ளது நடப்பு.காம். நவீன உலகில் செய்திகள் என்பதன் பரிணாமம் வேறு வேறு வகைப்பாடுகளாக விரிந்து நிற்கிறது. அதில் இணையதளத்தின் வீச்சும், வீரியமும் நாளுக்கு நாள் வலுப்பெற்று வருகிறது... <a>மேலும்</a></div>
				</div>
				
				<div class="widget widget_categories">
					<h3><?php _e( 'Popular Categories', 'wellthemes' ); ?></h3>
					<ul><?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'ASC', 'title_li' => '', 'number' => 8 ) ); ?></ul>
				</div>
				
				<?php the_widget('WP_Widget_Recent_Posts', 'number=3', 'before_title=<h3>&after_title=</h3>'); ?>
				<?php the_widget('WP_Widget_Recent_Comments', 'number=3', 'before_title=<h3>&after_title=</h3>'); ?> 
			
			<?php endif; // end footer widget area ?>	
		
		</div><!-- /footer widgets -->
		
		<div class="footer-info">
			<?php if (wt_get_option( 'wt_footer_text_left' )){ ?> 
				<div class="footer-left">
					<?php echo wt_get_option( 'wt_footer_text_left' ); ?>			
				</div>
			<?php } ?>
			
						
        </div> <!--/foote-info -->
		
	</footer><!-- /footer -->

</div><!-- /container -->
<?php
// AdzMedia Publisher Install Code
// Language: PHP (curl)
// Version: 2.0
// Copyright AdzMedia.com, All rights reserved

		$adzone = 7786;
	 
	 	$adzmedia_url  = 'http://rtb.adzmedia.com/api?';
	 	
		 $adzmsite = array('adzone'=>$adzone);
	 
	 	if(isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI']))
	 	{
	 		$adzmsite['rqpage']  = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	 	}
	 	if(isset($_SERVER['HTTP_REFERER']))
	 	{
	 		$adzmsite['ref'] =  $_SERVER['HTTP_REFERER'];
	 	}
	 	
	 	$adzmdevice = array('ip' => $_SERVER['REMOTE_ADDR'],'ua'=>$_SERVER['HTTP_USER_AGENT']);
	 	
	 	$adzmedia_headers = array();
	 	$headerprefix = 'ADZ-';
		foreach ($_SERVER as $adz_name => $adz_value)
		{
    		$adzmedia_headers[$headerprefix.$adz_name] = $adz_value;
   		}	
   		$content_type=array("Content-Type: application/json");
   	    
   	    $adzmsite['headers'] = $adzmedia_headers;

   		$adzmobj = json_encode(array('site' => $adzmsite,'device'=>$adzmdevice)); 	

	 	$adzmrequest = curl_init();
		$request_timeout = 5; 
		curl_setopt($adzmrequest, CURLOPT_URL, $adzmedia_url);
		curl_setopt($adzmrequest, CURLOPT_USERAGENT, $adzmdevice['ua']);
		curl_setopt($adzmrequest, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($adzmrequest, CURLOPT_HTTPHEADER, $content_type);
		curl_setopt($adzmrequest, CURLOPT_POST, 1);
		curl_setopt($adzmrequest, CURLOPT_TIMEOUT, $request_timeout);
		curl_setopt($adzmrequest, CURLOPT_CONNECTTIMEOUT, $request_timeout);
		curl_setopt($adzmrequest, CURLOPT_POSTFIELDS,$adzmobj);

		$adzmcontents = curl_exec($adzmrequest);
		if (curl_getinfo($adzmrequest,CURLINFO_HTTP_CODE) == 200)
		{
			echo $adzmcontents;
		}
		
		curl_close($adzmrequest);
?>

<?php wp_footer(); ?>

</body>
</html>