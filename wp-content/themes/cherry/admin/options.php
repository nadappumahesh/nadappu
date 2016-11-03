<?php

	//Disable error reporting
	error_reporting(0);

	$themename = "Cherry";
	$shortname = "Cherry News";
	$themefolder = "cherry";

	define ('theme_name', $themename );
	define ('theme_ver' , 1 );
	define ('Cherry' , $themename );

		function mytheme_admin_bar_render()
		{
			global $wp_admin_bar;
			$wp_admin_bar->add_menu( array(
				'parent' => 0,
				'id' => 'bdayh',
				'title' => 'Cherry',
				'href' => admin_url( 'admin.php?page=options.php'),
				'meta' => false
			));
		}
		add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

		/* Theme Name
		----------------------------------------------*/

		function cherry_admin_register()
		{
			wp_register_script( 'cherry-checkbox', BD_FW . 'assets/js/checkbox.min.js', array( 'jquery' ) , true , true );
			wp_register_script( 'cherry-colorpicker', BD_FW . 'assets/js/colorpicker.js', array( 'jquery' ) , true , true );
			wp_register_script( 'cherry-custom', BD_FW . 'assets/js/custom.js', array( 'jquery' ) , true , true );
			wp_register_script( 'cherry-scripts', BD_FW . 'assets/js/scripts.js', array( 'jquery' ) , true , true );
			wp_register_style( 'cherry-style', BD_FW .'assets/css/custome.css', '', null , 'all' );
			wp_register_style( 'cherry-colorpicker', BD_FW .'css/colorpicker.css', '', null , 'all' );
			wp_register_style( 'cherry-jqueryui', BD_FW .'assets/css/jquery-ui.css', '', null , 'all' );

			//wp_enqueue_script('jquery');

			wp_enqueue_style( 'cherry-jqueryui' );
			wp_enqueue_style( 'cherry-colorpicker' );
			wp_enqueue_style( 'cherry-style' );

			wp_enqueue_script('cherry-checkbox');
			wp_enqueue_script('cherry-colorpicker');
			wp_enqueue_script('cherry-custom');
			wp_enqueue_script('cherry-scripts');
		}
		add_action( 'admin_enqueue_scripts', 'cherry_admin_register' );

		/* Theme Script
		----------------------------------------------*/

		$categories = get_categories('hide_empty=0&orderby=name');
		$wp_cats = array();

		foreach ($categories as $category_list )
		{
		  $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
		}

		require_once("setting.php");

		function themename_add_admin()
		{

			global $themename, $shortname, $options;

			if ( isset($_GET['page']) and $_GET['page'] == basename(__FILE__) )
				{

					if (isset($_GET['do']) and $_GET['do'] == 'submit' and $_POST)
					{

						if($_POST['bd_setting']['advanced_import'])
						{
				   			$import = base64_decode($_POST['bd_setting']['advanced_import']);
				   			update_option('bdayh_setting', $import);
							echo '#message_success';
							die;
						}

						 $var_post = $_POST;
						 $var_post['bd_setting']['advanced_import'] = '';
						 $var_post['bd_setting']['advanced_export'] = '';
						 foreach($var_post['bd_setting'] as $k => $v)
						 {
							if(is_array($v))
							{
                               foreach($v as $lk => $lv)
                               {
									$var_post[$k][$lk] = esc_sql($lv);
                               }
							}
							else
							{
       							$var_post[$k] = esc_sql($v);
							}
						 }
				         $option_arr = serialize($var_post);

				         update_option('bdayh_setting', $option_arr);

						echo '#message_success';
						die;
					}
					else if(isset($_GET['do']) and  $_GET['do'] == 'download')
					{
				       $bd_option = base64_encode(get_option('bdayh_setting'));
						header("Content-Type: application/xml");
						header("Content-Transfer-Encoding: binary");
						header("Cache-Control: private",false);
						header("Content-Disposition: attachment; filename=\"cherry-" . time()  . ".txt\";" );
				       echo $bd_option;
				       exit();
					}
					else if(isset($_GET['do']) and  $_GET['do'] == 'reset')
					{

				        $data = base64_decode(file_get_contents(BD_DIR.'/admin/reset.bdayh'));
				  		update_option('bdayh_setting', $data);
						header("Location: admin.php?page=options.php");
						die;
					}
				}

				add_menu_page( $themename, $themename, 'edit_themes', 'options.php', 'themename_admin', BD_FW_IMG .'/icon.png' /* ,61 */ );
				//add_submenu_page( 'options.php', 'Post Ratings', 'Post Ratings', 'edit_themes', 'post_ratings', 'post_ratings' );
				//add_submenu_page( 'options.php', 'Live Preview', 'Live Preview', 'edit_themes', 'demo', 'demo_theme' );
		}



		function post_ratings()
		{
				echo "<script type='text/javascript'>window.location='options-general.php?page=post-ratings';</script>";
		}
		function demo_theme()
		{
				echo "<script type='text/javascript'>window.location='http://themes.bdayh.com/';</script>";
		}

		function bd_get_settings($id)
		{
			global $themename, $shortname, $options,$all_setting;
		    if(get_settings($GLOBALS['shortname'].'_'.$id))
		    {
			    return(get_settings($GLOBALS['shortname'].'_'.$id));
		    }
		    else
		    {
			    return($all_setting[$GLOBALS['shortname'].'_'.$id]);
		    }
		}




		function themename_admin()
		{
				global $themename, $shortname, $options,$wp_cats;
				$i=0;

				echo '<div id="message_success" style="display:none;" class="notification fade"><span class="notification_icon"></span> Options Saved Successfully ! </div>';
				echo '<div id="message_error" style="display:none;" class="notification bd_alert fade"><span class="notification_icon"></span> Resetting work ! </div>';

				$bd_option = unserialize(get_option('bdayh_setting'));
				require_once ("layout_functions.php");

				?>

				<!--[if lt IE 9]>
				<script type='text/javascript' src='<?php echo BD_FW; ?>assets/js/selectivizr-min.js'></script>
				<script type='text/javascript' src='<?php echo BD_FW; ?>assets/js/html5.js'></script>
				<![endif]-->
				<link rel='stylesheet' href='<?php echo BD_FW; ?>assets/bd_style.css' type='text/css' media='all' />
				<script type='text/javascript' src="<?php echo BD_FW; ?>assets/js/jquery-ui.js"></script>
				<script type='text/javascript' src="<?php echo BD_FW; ?>assets/js/jquery.tmpl.js"></script>
				<script type="text/javascript">
					<?php if(isset($bd_option['bd_setting']['home']))
						{
						?>
							var total_boxes = <?php if(is_array($bd_option['bd_setting']['home'])){echo max(array_keys($bd_option['bd_setting']['home'])) + 1;}else{echo 1;}?>;
						<?php
						}
						else
						{
						?>
					 		var total_boxes = 1;
						<?php
						}
					?>

					jQuery(document).ready(function() {
					jQuery('#setting_form').submit(function()
					{
						var str = jQuery("form").serialize();
						jQuery.ajax({
						  url: 'admin.php?page=options.php&do=submit',
						  data: str,
						  type: 'POST',
						  success: function(data){
						    if(data == '#message_success')
						    {
					           jQuery('#message_success').show().delay(250).fadeIn(600).fadeOut(600,'easeInOutBack');
						    }
						    else
						    {
								jQuery('#message_error').show().delay(250).fadeIn(600).fadeOut(600,'easeInOutBack');
						    }
						  }
						});

					  return false;
					});
					});

				</script>
				<script type='text/javascript' src="<?php echo BD_FW; ?>assets/js/bd.js"></script>
				<script type="text/javascript">
				jQuery(document).ready(function() {

				    jQuery('.st_upload_button').click(function() {
				         targetfield = jQuery(this).prev('.upload-url');
				         tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				         return false;
				    });

					jQuery(".st_upload_button").live("click", function(){
				         targetfield = jQuery(this).prev('.upload-url');
				         tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				         return false;
					});

				    jQuery(".remove_img").live("click", function()
				    {
				         var img_id = jQuery(this).attr('id').replace("_remove", "");
				         jQuery('#'+img_id).val('');
				         jQuery('#'+img_id+'_img').fadeOut();
				         return false;
				    });

				    window.send_to_editor = function(html) {
				         imgurl = jQuery('img',html).attr('src');
				         jQuery(targetfield).val(imgurl);
				         var up_img = jQuery(targetfield).attr('id')+ '_img';
				         jQuery('#'+up_img).children('img').attr('src',imgurl);
				         jQuery('#'+up_img).show();
				         tb_remove();
				    }

				});

				    function add_tag(input_id,tag)
				    {
						var input_id;
						var tag;

						if(tag != '')
						{
							var input_val = jQuery('#'+input_id).val();
							if(input_val == '')
							{
								jQuery('#'+input_id).val(tag);
							}
							else
							{
								jQuery('#'+input_id).val(input_val+','+tag);
						}
						}
						}
				</script>
				<form name="" id="setting_form" action="admin.php?page=options.php&do=submit" method="post">
				  <div class="bd_panel ">
				  <div class="bd_header">
				    <div class="bd_logo">
				      <div class=" logo"></div>
				    </div>
				    <input name="save" class="bd_save" type="submit" value="Save Changes">
				  </div>
				  <div class="bd_panel_tabs">
				    <ul>
				      <li class="home_page active">
				        <a href="#home_page" >
				        <?php echo ucfirst('home page'); ?>
				        </a>
				      </li>
				      <?php if(is_array($options))
				      {
				      	 	foreach($options as $k => $v)
					      {
					      ?>
						      <li class="<?php echo $k; ?> ">
						        <a href="#<?php echo $k; ?>" >
						        	<?php echo ucfirst(str_replace("_"," ",$k)); ?>
						        </a>
						      </li>
					      <?php
					      }
				      }
				      ?>
				      <li class="styling_settings">
				        <a href="#stylingsettings_static" >
				        <?php echo ucfirst('styling settings'); ?>

				        </a>
				      </li>
				      <li class="typography">
				        <a href="#typography_static" >
				        <?php echo ucfirst('typography'); ?>

				        </a>
				      </li>
				      <li class="skins_colors">
				        <a href="#skins_colors" >
				        <?php echo ucfirst('skins colors'); ?>
				        </a>
				      </li>
				    </ul>
				  </div>
				  <div class="bd_panel_tabs_bg"></div>
				  <div class="bd_panel_content">
				  <div  class="box_tabs_container" id="home_page">
				    <h1><?php _e('Home Page','bd') ?></h1>
				    <div class="tab_content meta-box-sortables">
				      <!-- home page -->
				      <div class="bd_item">
				        <h3><?php _e('Front page','bd') ?></h3>
				        <div class="bd_option_item">
				          <span class="label"><?php _e('Front page layout choose','bd') ?></span>
				          <div class="check_radio_content">
				            <label class="check_radio">
				              <input id="home_type_blog" name="bd_setting[home_type]" class="home_type" type="radio" <?php if($bd_option['bd_setting']['home_type'] == 'blog'){ ?>checked="checked" <?php }?> value="blog" />
				              <?php _e('Blog','bd') ?> </label>
				            <label class="check_radio">
				              <input id="home_type_box" name="bd_setting[home_type]" class="home_type" <?php if($bd_option['bd_setting']['home_type'] == 'box'){ ?>checked="checked" <?php }?> type="radio" value="box" />
				              <?php _e('News Boxes','bd') ?></label>
				          </div>
				        </div>
				        <!--//End item--></div>
				      <!--//End items-->
				      <!--//Start Builder-->
				      <div class="box_type_content" id="box_type_content" <?php if($bd_option['bd_setting']['home_type'] == 'blog'){ ?> style="display:none;" <?php }?> >
				        <h4 class="titlebuilder"><?php _e('Home Builder','bd') ?>
				          <a class="bd_help" title="Home Builder"></a>
				        </h4>
				        <ol class="navbuilder">
				          <li>
				            <a href="#" id="add_news"><?php _e('Add a News Box','bd') ?></a>
				          </li>
				          <li>
				            <a href="#" id="add_recent_box"><?php _e('Add a Recent Posts','bd') ?></a>
				          </li>
				          <li>
				            <a href="#" id="add_scrolling_box"><?php _e('Add a Scrolling Box','bd') ?></a>
				          </li>
				          <li>
				            <a href="#" id="add_ads_box"><?php _e('Ads','bd') ?></a>
				          </li>
				        </ol>
				        <!--//End Builder Nav-->

				        <select id="bd_cats" style="display:none;">
				          <?php foreach($wp_cats as $c_id => $c_name )
				          {
				          ?>
					          <option value="<?php echo $c_id;?>">
					          	<?php echo $c_name;?>
					          </option>
				          <?php
				          }
				          ?>
				        </select>
				        <div class="bdayh_list_boxes" id="bdayh_list_boxes">
				          <?php if(isset($bd_option['bd_setting']['home']) and count($bd_option['bd_setting']['home']) > 0)
				                {
									foreach($bd_option['bd_setting']['home'] as $k => $v)
									{
										switch($v['type'])
										{
											case"news_box":
				                              home_news_box($k,$v);
											break;
											case"scrolling_box":
				                              home_scrolling_box($k,$v);
											break;
											case"ads_box":
				                              home_ads_box($k,$v);
											break;
											case"recent_box":
				                              home_recent_box($k,$v);
											break;
										}
									}
				                }
				                ?>
				        </div>
				      </div>
				      <!-- home page -->
				      <!-- script tmpl -->
				      <script id="bd_news_box" type="text/x-tmpl">
						<div>
						<div class="builder_inner" id="home_box_{{= data}}">
							  <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="news_box" />
					          <h5 class="boxes_title">
					            <a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a>
					            <span><?php _e('News Box','bd') ?> :</span>   <span class="settings"> <?php _e('Settings','bd') ?></span>
					            <a class="del" id="remove_{{= data}}" original-title="Remove Box"><?php _e('Remove Box','bd') ?></a>
					          </h5>

					          <div class="bd_item builder_content">
					            <div class="bd_item_content" style="display:none;">
					              <div class="row">
					                <label><?php _e('Category','bd') ?> </label>
					                <select name="bd_setting[home][{{= data}}][cat]" id="bd_setting_home_{{= data}}_cat">
									  {{= cats}}
					                </select>
					              </div>
					              <div class="row">
					                <label><?php _e('Number of posts','bd') ?> </label>
					                <input class="input_numb" name="bd_setting[home][{{= data}}][number]" type="text" value="4">
					                <a class="bd_help" title="<?php _e('How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.','bd') ?>">
					                </a>
					              </div>
					              <div class="row">
					                <label><?php _e('Box Layout','bd') ?> </label>
					                <ol class="box_layout_list bd_box_layout">
					                  <li class="selectd">
					                    <a href="#" original-title="First Post Left">
					                    <img alt=" " src="<?php echo BD_FW; ?>/assets/images/on_col.png"></a>
										<input name="bd_setting[home][{{= data}}][layout]" type="radio" checked="checked" value="1"  />
					                  </li>
					                  <li>
					                    <a href="#" original-title="First Post Full Width">
					                    <img alt=" " src="<?php echo BD_FW; ?>/assets/images/tow_col.png"></a>
										<input name="bd_setting[home][{{= data}}][layout]" type="radio" value="2"  />
					                  </li>
					                  <li>
					                    <a href="#" original-title="Two Box Small">
					                    <img alt=" " src="<?php echo BD_FW; ?>/assets/images/three_col.png"></a>
										<input name="bd_setting[home][{{= data}}][layout]" type="radio" value="3"  />
					                  </li>
					                  <li>
					                    <a href="#" original-title="News in picrure">
					                    <img alt=" " src="<?php echo BD_FW; ?>/assets/images/news_in_picrure.png"></a>
										<input name="bd_setting[home][{{= data}}][layout]" type="radio" value="4"  />
					                  </li>
					                  <li>
					                    <a href="#" original-title="News in picrure small">
					                    <img alt=" " src="<?php echo BD_FW; ?>/assets/images/news_in_picrure_small.png"></a>
										<input name="bd_setting[home][{{= data}}][layout]" type="radio" value="5"  />
					                  </li>
					                </ol>
					              </div>
					            </div>
					          </div>
					     </div>
						 </div>
					</script>
				      <script id="bd_scrolling_box" type="text/x-tmpl">
					<div>
					<div class="builder_inner" id="home_box_{{= data}}">
							  <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="scrolling_box" />
					          <h5 class="boxes_title">
					            <a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a>
					            <?php _e('Scrolling Box','bd') ?> <span class="settings"><?php _e ('Settings','bd') ?></span>
					            <a class="del" id="remove_{{= data}}" original-title="Remove Box"><?php _e('Remove Box','bd') ?></a>
					          </h5>
					          <div class="bd_item builder_content">
					            <div class="bd_item_content" style="display:none;">
					              <div class="row">
					                <label><?php _e('Category','bd') ?> </label>
					                <select name="bd_setting[home][{{= data}}][cat]" id="bd_setting_home_{{= data}}_cat">
					                {{= cats}}
					                </select>
					              </div>
					              <div class="row">
					                <label><?php _e('Title','bd') ?> </label>
					                <input type="text" name="bd_setting[home][{{= data}}][title]" value="Scrolling Box">
					              </div>
					              <div class="row">
					                <label><?php _e('Number of posts','bd') ?> </label>
					                <input class="input_numb" name="bd_setting[home][{{= data}}][number]" type="text" value="12">
					                <a class="bd_help" title="<?php _e('How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.','bd') ?>">
					                </a>
					              </div>
					            </div>
					          </div>
					        </div>
					</div>
					</script>
				      <script id="bd_recent_box" type="text/x-tmpl">
					<div>
					<div class="builder_inner" id="home_box_{{= data}}">
							  <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="recent_box" />
					          <h5 class="boxes_title">
					            <a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a>
					            <?php _e('Recent Posts','bd') ?> <span class="settings"><?php _e('Settings','bd') ?></span>
					            <a class="del" id="remove_{{= data}}" title="<?php _e('Remove Box','bd') ?>"><?php _e('Remove Box','bd') ?></a>
					          </h5>
					          <div class="bd_item builder_content">
					            <div class="bd_item_content" style="display:none;">
					              <div class="row">
					                <label><?php _e('Category','bd') ?> </label>
					                <select multiple="multiple" style="height: auto;" name="bd_setting[home][{{= data}}][cat][]" id="bd_setting_home_{{= data}}_cat">
					                {{= cats}}
					                </select>
					              </div>
					              <div class="row">
					                <label><?php _e('Title','bd') ?> </label>
					                <input type="text" name="bd_setting[home][{{= data}}][title]" value="Recent Posts">
					              </div>
					              <div class="row">
					                <label><?php _e('Number of posts','bd') ?> </label>
					                <input class="input_numb" name="bd_setting[home][{{= data}}][number]" type="text" value="12">
					                <a class="bd_help" title="<?php _e('How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.','bd') ?>">
					                </a>
					              </div>
					            </div>
					          </div>
					        </div>
					</div>
					</script>
				      <script id="bd_ads_box" type="text/x-tmpl">
					<div>
					<div class="builder_inner" id="home_box_{{= data}}">
								<input type="hidden" name="bd_setting[home][{{= data}}][type]" value="ads_box" />
					          <h5 class="boxes_title">
					            <a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a>
					            <?php _e ('Ads','bd') ?> <span class="settings"><?php _e ('Settings','bd') ?></span>
					            <a class="del" id="remove_{{= data}}" title="<?php _e('Remove Box','bd') ?>"><?php _e('Remove Box','bd') ?></a>
					          </h5>
					          <div class="bd_item builder_content">
					            <div class="bd_item_content" style="display:none;">
					              <div class="row">
					                <label><?php _e('Type','bd') ?> </label>
					                <div class="check_radio_content">
					                  <label class="check_radio">
					                    <input name="bd_setting[home][{{= data}}][ad_type]" class="ad_type" checked="checked"  type="radio" value="code">
					                    <?php _e('Ads Code','bd') ?> </label>
					                  <label class="check_radio">
					                    <input name="bd_setting[home][{{= data}}][ad_type]" class="ad_type"   type="radio" value="img">
					                    <?php _e('Image Upload','bd') ?></label>
					                </div>
					              </div>
					              <div class="row ads_code">
					                <label><?php _e('Ads Code','bd') ?> </label>
					                <textarea class="textarea_full" name="bd_setting[home][{{= data}}][ad_code]" rows="7"></textarea>
					              </div>
					              <div class="row ads_img"  style="display:none;">
					                <label><?php _e('Image Upload','bd') ?></label>
									    <input id="bd_setting_home_{{= data}}" class="img-path upload-url" type="text" name="bd_setting[home][{{= data}}][ad_img]" value="">
									    <input id="bd_setting_home_{{= data}}_img_button" type="button" class="go st_upload_button" value="Upload">
									    <div class="upload_img" id="bd_setting_home_{{= data}}_img" style="display:none;">
									      <img src="" width="120"  alt="" border="0" />
									      <a href="#" class="remove_img" id="bd_setting_home_{{= data}}_remove"><?php _e('Remove','bd') ?></a>
									    </div>


					                <div class="clear">
					                </div>
					                <label><?php _e('Ads Link','bd') ?> </label>
					                <input type="text" name="bd_setting[home][{{= data}}][ad_link]" value="#">
					                <div class="clear">
					                </div>
					                <label><?php _e('Alternate Name','bd') ?> </label>
					                <input type="text" name="bd_setting[home][{{= data}}][ad_alt]" value="">
					              </div>
					            </div>
					          </div>
					        </div>
					</div>
					</script>
				      <!-- script tmpl -->
				    </div>
				  </div>

					<div id="typography_static" class="box_tabs_container">
					  <h1>
					    <?php _e('Typography','bd') ?>
					  </h1>
					  <div class="tab_content">
					    <h4 class="titlebuilder">Main Typography</h4>
					    <div class="pp-typo-box">
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "typography_general",
								"type"  	=> "typography",
								"label"		=> "General Typography  &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "toolbar",
								"type"  	=> "typography",
								"label"		=> "Top Menu &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "nav_typo",
								"type"  	=> "typography",
								"label"		=> "navigation &raquo;"
							);

				          get_admin_tab($typography_static);
						?>

      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "alert_entry",
								"type"  	=> "typography",
								"label"		=> "Alert Entry &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "slider_title",
								"type"  	=> "typography",
								"label"		=> "Slider Title &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "widget_title",
								"type"  	=> "typography",
								"label"		=> "Widget Title &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "news_boxes_titles",
								"type"  	=> "typography",
								"label"		=> "News boxes titles &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "boxes_titles",
								"type"  	=> "typography",
								"label"		=> "Boxes Posts titles &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "singlepost_title",
								"type"  	=> "typography",
								"label"		=> "Single Post title &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "page_title",
								"type"  	=> "typography",
								"label"		=> "Page Post title &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
     					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "post_page_entry",
								"type"  	=> "typography",
								"label"		=> "Post - Page Entry &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "footer_titles",
								"type"  	=> "typography",
								"label"		=> "Footer Titles &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
					    </div>
					    <h4 class="titlebuilder">Post Headings</h4>
					    <div class="pp-typo-box">
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "h1_typography",
								"type"  	=> "typography",
								"label"		=> "H1 Typography &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "h2_typography",
								"type"  	=> "typography",
								"label"		=> "H2 Typography &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "h3_typography",
								"type"  	=> "typography",
								"label"		=> "H3 Typography &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
     					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "h4_typography",
								"type"  	=> "typography",
								"label"		=> "H4 Typography &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "h5_typography",
								"type"  	=> "typography",
								"label"		=> "H5 Typography &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
      					<?php $typography_static =
							array
							(
								"name" 		=> "Typography",
								"id"    	=> "h6_typography",
								"type"  	=> "typography",
								"label"		=> "H6 Typography &raquo;"
							);

				          get_admin_tab($typography_static);
						?>
					    </div>
					  </div>
					</div>
					<!--//End typography-->
				  <div id="stylingsettings_static" class="box_tabs_container">
				    <h1><?php _e('Styling Settings','bd') ?></h1>
				    <div class="tab_content">

                           		<h4 class="titlebuilder">Background Type</h4>
								<?php $custom_background = array
						          (

										"name" 		=> "Background Type",
										"id"    	=> "background_type",
										"type"  	=> "radio_bgtype",
										"options"	=> array( "pattern"=>"Pattern" ,
													"custom"=>"Custom Background" )
										//"list"		=> array( "pattern","custom" ),
						          );
						          get_admin_tab($custom_background);
					          	?>

								<br /><br />

                           <div class="bd_item get_background_type_custom" id="get_background_type_pattern">
								<h3 class="hndle">Custom Background</h3>

					           <?php $custom_background = array
						          (
										"name" 		=> __('Custom Background' , 'bd'),
										"label" 	=> __('Custom Background' , 'bd'),
										"tip"		=> __('Custom Background' , 'bd'),
										"id"    	=> "custom_background",
										"type"  	=> "uploadbg"
						          );
						          get_admin_tab($custom_background);
					          ?>
					           <?php $custom_background = array
						          (

										"name" 		=> "Custom Background",
										"id"    	=> "background",
										"type"  	=> "background_bd"
						          );
						          get_admin_tab($custom_background);
					          ?>
                          </div>

				      <div class="bd_item get_background_type_pattern" id="get_background_type_custom">
				        <h3><?php _e('Choose Pattern Background','bd') ?></h3>
				        <div class="bd_option_item">

						 <span class="label">Background Color :</span>
				        <?php $custom_background = array
					          (

									"name" 		=> "Custom Background",
									"id"    	=> "background_pattern",
									"type"  	=> "background_bd"
					          );
					          get_admin_tab($custom_background);
				          ?>
                           <?php
								$checked = 'checked="checked"';
							?>
				          <ol class="box_layout_list pattern select_plugin">

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 'default'){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/default.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 'default'){ echo 'checked="checked"'; } ?> type="radio" value="default" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 1){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_1.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 1){ echo 'checked="checked"'; } ?> type="radio" value="1" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 2){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_2.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 2){ echo 'checked="checked"'; } ?> type="radio" value="2" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 3){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_3.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 3){ echo 'checked="checked"'; } ?> type="radio" value="3" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 4){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_4.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 4){ echo 'checked="checked"'; } ?> type="radio" value="4" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 5){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_5.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 5){ echo 'checked="checked"'; } ?> type="radio" value="5" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 6){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_6.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 6){ echo 'checked="checked"'; } ?> type="radio" value="6" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 7){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_7.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 7){ echo 'checked="checked"'; } ?> type="radio" value="7" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 8){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_8.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 8){ echo 'checked="checked"'; } ?> type="radio" value="8" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 9){ echo 'class="selectd"'; } ?> >
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_9.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 9){ echo 'checked="checked"'; } ?> type="radio" value="9" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 10){ echo 'class="selectd"'; } ?> >
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_10.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 10){ echo 'checked="checked"'; } ?> type="radio" value="10" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 11){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_11.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 11){ echo 'checked="checked"'; } ?> type="radio" value="11" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 12){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_12.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 12){ echo 'checked="checked"'; } ?> type="radio" value="12" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 13){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_13.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 13){ echo 'checked="checked"'; } ?> type="radio" value="13" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 14){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_14.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 14){ echo 'checked="checked"'; } ?> type="radio" value="14" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 15){ echo 'class="selectd"'; } ?>>
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_15.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 15){ echo 'checked="checked"'; } ?> type="radio" value="15" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['bg_pattern'] == 16){ echo 'class="selectd"'; } ?> >
				              <a href="#">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/pattern_thumb/pattern_16.png" /></a>
				              <input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 16){ echo 'checked="checked"'; } ?> type="radio" value="16" />
				            </li>
				          </ol>
				        </div>
				        <!--//End item-->
				        </div>
				    </div>
				    <!--//End #tab11-->



				    <div id="tab12" class="box_tabs_container">
				      <h1><?php _e('Footer Settings','bd') ?></h1>
				      <div class="tab_content"> tab12</div>
				    </div>
				    <!--//End #tab12-->
				    <div id="tab13" class="box_tabs_container">
				      <h1><?php _e('Advanced Settings','bd') ?></h1>
				      <div class="tab_content"> tab13</div>
				    </div><!--//End #tab13-->
				    </div>


				  <!-- skin colors -->
				  <div id="skins_colors" class="box_tabs_container">
				    <h1><?php _e('Skins Colors','bd') ?></h1>
				    <div class="tab_content">
				      <div class="bd_item">
				        <h3><?php _e('Theme Layout','bd') ?></h3>
				        <div class="bd_option_item">
				          <ol class="box_layout_list select_plugin">

				            <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_default'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Fixed">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/default.png" /></a>
				              <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_default'){ echo 'checked="checked"'; } ?> type="radio" value="layout_default" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_fiexd'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Fixed">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/fixed.png" /></a>
				              <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_fiexd'){ echo 'checked="checked"'; } ?> type="radio" value="layout_fiexd" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_wide'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Full Width">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/full.png" /></a>
				              <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_wide'){ echo 'checked="checked"'; } ?> type="radio" value="layout_wide" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_left'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Sidebar Left">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/left_sidebar.png" /></a>
				              <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_left'){ echo 'checked="checked"'; } ?> type="radio" value="layout_sidebar_left" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_right'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Sidebar Right">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/right_sidebar.png" /></a>
				              <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_right'){ echo 'checked="checked"'; } ?> type="radio" value="layout_sidebar_right" />
				            </li>

				          </ol>
				        </div>
				        <!--//End item--></div>

				      <!--//End items-->

				      <div class="bd_item">
				        <h3><?php _e('Choose Skin Colors','bd') ?></h3>
				        <div class="bd_option_item">
				          <ol class="box_layout_list select_plugin">

				            <li <?php if($bd_option['bd_setting']['skin_color'] == 'red'){ echo 'class="selectd"'; } ?> >
				              <a href="#" title="Red">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_1.png" /></a>
				              <input name="bd_setting[skin_color]" <?php if($bd_option['bd_setting']['skin_color'] == 'red'){ echo 'checked="checked"'; } ?> type="radio" value="red" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['skin_color'] == 'blue'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Blue">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_2.png" /></a>
				              <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'blue'){ echo 'checked="checked"'; } ?> value="blue" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['skin_color'] == 'green'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Green">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_3.png" /></a>
				              <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'green'){ echo 'checked="checked"'; } ?> value="green" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['skin_color'] == 'rose'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Rose">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_4.png" /></a>
				              <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'rose'){ echo 'checked="checked"'; } ?> value="rose" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['skin_color'] == 'orange'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Orange">
				              <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_5.png" /></a>
				              <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'orange'){ echo 'checked="checked"'; } ?> value="orange" />
				            </li>

				            <li <?php if($bd_option['bd_setting']['skin_color'] == 'gray'){ echo 'class="selectd"'; } ?>>
				              <a href="#" title="Gray">
				              <img alt="" src="<?php echo BD_FW; ?>/assets/images/color_6.png" /></a>
				              <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'gray'){ echo 'checked="checked"'; } ?> value="gray" />
				            </li>

				          </ol>
				        </div>
				        <!--//End item--></div>

				      <!--//End items--></div>
				  </div>
				  <!-- skin colors -->

				  <?php if(is_array($options))
				      {
				      	$list_sum = array();
				      	foreach($options as $k => $v)
				      	{
				      		$sub_item = 0;
				        	?>
				  <div  class="box_tabs_container" id="<?php echo $k;?>">
				    <h1>
				      <?php echo ucfirst(str_replace("_"," ",$k)); ?>
				    </h1>
				    <div class="tab_content">
				      <?php if(is_array($v))
						      	{
				                   foreach($v as $key => $input)
				                   {
				                      if(isset($input['name']) and $input['name'] != '')
				                      {
				                      	get_admin_tab($input);
				                      }
									  else
				                      {
				                      		?>
				      <div class="bd_item" id="home_page">
				        <h3 class="hndle">
				          <?php echo ucfirst(str_replace("_"," ",$key)); ?>
				        </h3>
				        <?php foreach($input as $sub)
				                      		{
				                    			get_admin_tab($sub,false);
				                    		}
				                    		?>
				      </div>
				      <?php }
				                   }
						      	}
						      	?>
				    </div>
				    <?php unset($sub_item);
				    	?>
				  </div>
				  <?php }


				      }
				    ?>
				  <div class="bd_footer">
				    <input name="save" class="bd_save" type="submit" value="Save Changes">
				    <script type="text/javascript">
						function is_confirm()
						{
							if(confirm('are you sure ?'))
							{
                                window.location='admin.php?page=options.php&do=reset';
							}
							else
							{
								return false;
							}
						}
				    </script>
				    <input name="reset" class="bd_rest" type="button" onclick="return(is_confirm());" value="Reset Settings">
				  </div>
				</form>
		</div>
		<?php
		}

		function themename_add_init()
		{
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('my-upload');
			wp_enqueue_style('thickbox');
		}

		add_action('admin_init', 'themename_add_init');
		add_action('admin_menu', 'themename_add_admin');
?>