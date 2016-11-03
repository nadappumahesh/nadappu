<style type="text/css">
<?php
	$bg = bdayh_get_option( 'background_pattern' );
?>
<?php if(bdayh_get_option('background_type') == 'pattern') { ?>
<?php if(bdayh_get_option('bg_pattern') == 1){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_1.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 2){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_2.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 3){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_3.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 4){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_4.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 5){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_5.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 6){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_6.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 7){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_7.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 8){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_8.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 9){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_9.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 10){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_10.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 11){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_11.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 12){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_12.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 13){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_13.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 14){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_14.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 15){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_15.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php if(bdayh_get_option('bg_pattern') == 16){ ?>
body {background: <?php echo $bg['color'] ?> url('<?php bloginfo('template_url'); ?>/assets/images/pattern/pattern_16.png')<?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php } else { ?>
<?php if(bdayh_get_option('custom_background')){ ?>
<?php
	$bg = bdayh_get_option( 'background' );
?>
body {background: <?php echo $bg['color'] ?> url('<?php echo stripslashes(bdayh_get_option('custom_background')); ?>') <?php echo $bg['repeat'] ?> <?php echo $bg['attachment'] ?> <?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>;}
<?php } ?>
<?php } ?>
<?php echo stripslashes(bdayh_get_option('custom_css')); ?>
<?php if(bdayh_get_option('custom_768')){ ?>
@media only screen and (min-width: 768px) and (max-width: 989px) {

<?php echo stripslashes(bdayh_get_option('custom_768')); ?>

}
<?php } ?>
<?php if(bdayh_get_option('custom_480')){ ?>
@media only screen and (min-width: 480px) and (max-width: 767px) {

<?php echo stripslashes(bdayh_get_option('custom_480')); ?>

}
<?php } ?>
<?php if(bdayh_get_option('custom_320')){ ?>
@media only screen and (min-width: 320px) and (max-width: 479px) {

<?php echo stripslashes(bdayh_get_option('custom_320')); ?>

}
<?php } ?>
<?php if(bdayh_get_option('margin_top_logo')){ ?>
header .logo
{
	margin-top: <?php echo stripslashes(bdayh_get_option('margin_top_logo')); ?>px !important;
}
<?php } ?>
<?php if(bdayh_get_option('margin_top_header_ads')){ ?>
header .headerads
{
	margin-top: <?php echo stripslashes(bdayh_get_option('margin_top_header_ads')); ?>px !important;
}
<?php } ?>
<?php
global $custom_typography;
foreach( $custom_typography as $selector => $input)
{
$option = bdayh_get_option( $input );
if( $option['font'] || $option['color'] || $option['size'] || $option['weight'] || $option['style'] ):
echo "\n".$selector."{\n"; ?>
<?php if($option['font'] )
echo "	font-family: '". bd_get_font( $option['font']  )."';\n"?>
<?php if($option['color'] )
echo "	color :". $option['color'].";\n"?>
<?php if($option['size'] )
echo "	font-size : ".$option['size']."px;\n"?>
<?php if($option['weight'] )
echo "	font-weight: ".$option['weight'].";\n"?>
<?php if($option['style'] )
echo "	font-style: ". $option['style'].";\n"?>
}
<?php endif;
}
?>
</style>
