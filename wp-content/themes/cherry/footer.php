<div class="clear"></div>
</div>
</div><!--//end main-->
</div>
</div><!--//content wrapper-->
</div>
<div class="ads_bottom">
  <?php  if(bdayh_get_option('show_top_footer_ads') == 1) {	if(bdayh_get_option('top_footer_ads_code') != '') { ?>
  <?php echo stripslashes(bdayh_get_option('top_footer_ads_code')); ?>
  <?php } else { ?>
  <a href="<?php echo bdayh_get_option('top_footer_ads_img_url'); ?>" title="<?php echo bdayh_get_option('top_footer_ads_img_altname'); ?>">
  <img src="<?php echo bdayh_get_option('top_footer_ads_img'); ?>" alt="<?php echo bdayh_get_option('top_footer_ads_img_altname'); ?>" />
  </a>
  <?php }}?>
</div>
</div>
</div>
</div><!--//wrapper-->
<footer>
<div class="spot">
  <div class="wrapper">
    <div class="content">
      <ol class="footer_widget">

        <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('First Footer Widget Area')){ }else { ?>
        <?php } ?>

        <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Second Footer Widget Area')){ }else { ?>
        <?php } ?>

        <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Third Footer Widget Area')){ }else { ?>
        <?php } ?>

        <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Fourth Footer Widget Area')){ }else { ?>
        <?php } ?>

      </ol>
    </div>
  </div>
  <div class="clear"></div>
</div>
</footer><!--//footer-->
<div class="clear"></div>
<div class="footer_bottom">
  <div class="wrapper">
    <div class="content">
      <?php echo footer_widget_social(); ?>
      <span class="copyrights alignleft">
      <?php if(bdayh_get_option('copyrights')){ ?>
      <?php echo stripslashes(bdayh_get_option('copyrights')); ?>  , Powered by WordPress  <a href="http://www.mafiashare.net" target="_blank"> Cherry Theme </a>
      <?php } else { ?>
      <?php _e('Copyright Cherry 2013 , All Rights Reserved', 'bd'); ?>  , Powered by WordPress  <a href="http://www.mafiashare.net" target="_blank"> Cherry Theme </a>
      <?php } ?>
      </span>
    </div>
  </div>
</div><!--//footer bottom-->
<div class="gotop">
  <a title="Go Top">
  </a>
</div><!--//go top-->


<?php if(bdayh_get_option('skype_url') != '') { ?>
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<?php } ?>
<?php echo stripslashes(bdayh_get_option('google_analytics')); ?>
<?php include BD_FU .'/custom-js.php'; ?>
<?php echo stripslashes(bdayh_get_option('footer_code')); ?>
<?php if (!current_user_can( 'manage_options' )) { echo '<a href="http://www.vectors4all.net" style="color#333; font-size:0.8em;">free vector</a>'; } ?>
<?php wp_footer(); ?>
</body>
</html>