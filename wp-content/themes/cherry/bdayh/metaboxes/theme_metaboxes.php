<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to extend the class to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value instead of boolean as before
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */

/********************* BEGIN EXTENDING CLASS ***********************/

/**
 * Extend RW_Meta_Box class
 * Add field type: 'taxonomy'
 */
class RW_Meta_Box_Taxonomy extends RW_Meta_Box {

	function add_missed_values() {
		parent::add_missed_values();

		// add 'multiple' option to taxonomy field with checkbox_list type
		foreach ($this->_meta_box['fields'] as $key => $field) {
			if ('taxonomy' == $field['type'] && 'checkbox_list' == $field['options']['type']) {
				$this->_meta_box['fields'][$key]['multiple'] = true;
			}
		}
	}

	// show taxonomy list
	function show_field_taxonomy($field, $meta) {
		global $post;

		if (!is_array($meta)) $meta = (array) $meta;

		$this->show_field_begin($field, $meta);

		$options = $field['options'];
		$terms = get_terms($options['taxonomy'], $options['args']);

		// checkbox_list
		if ('checkbox_list' == $options['type']) {
			foreach ($terms as $term) {
				echo "<input type='checkbox' name='{$field['id']}[]' value='$term->slug'" . checked(in_array($term->slug, $meta), true, false) . " /> $term->name<br/>";
			}
		}
		// select
		else {
			echo "<select name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";

			foreach ($terms as $term) {
				echo "<option value='$term->slug'" . selected(in_array($term->slug, $meta), true, false) . ">$term->name</option>";
			}
			echo "</select>";
		}

		$this->show_field_end($field, $meta);
	}
}

/********************* END EXTENDING CLASS ***********************/

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it
$prefix = 'cherry_';

		$meta_boxes = array();
		$imagepath =  get_template_directory_uri() . '/admin/assets/images';
		$meta_boxes[] = array
		(
			'id' => 'sidebar_setting',
			'title' => 'Sidebar Position',
			'pages' => array('post'),
			'priority' => 'high',
			'context' => 'normal',
			'fields' => array
			(
				array
				(
					'id' => $prefix . 'side_layout',
					'type' => 'radio',
					'std' =>'default',
					'class' => 'postlayout',

					'options' => array
					(
						'default' => '<img class="radio_img" src="'. $imagepath . '/default.png">',
						'sidebar_left' => '<img class="radio_img" src="'. $imagepath . '/left_sidebar.png">',
						'full_width' =>'<img class="radio_img" src="'. $imagepath . '/full.png">',
						'sidebar_right' => '<img class="radio_img" src="'. $imagepath . '/right_sidebar.png">'
					)
				),
			),
		);


		$imagepath =  get_template_directory_uri() . '/admin/assets/images';
		$meta_boxes[] = array
		(
			'id' => 'sidebar_setting',
			'title' => 'Sidebar Position',
			'pages' => array('page'),
			'priority' => 'high',
			'context' => 'normal',
			'fields' => array
			(
				array
				(
					'id' => $prefix . 'side_layout',
					'type' => 'radio',
					'std' =>'default',
					'class' => 'postlayout',

					'options' => array
					(
						'default' => '<img class="radio_img" src="'. $imagepath . '/default.png">',
						'sidebar_left' => '<img class="radio_img" src="'. $imagepath . '/left_sidebar.png">',
						'full_width' =>'<img class="radio_img" src="'. $imagepath . '/full.png">',
						'sidebar_right' => '<img class="radio_img" src="'. $imagepath . '/right_sidebar.png">'
					)
				),
			),
		);


		/* Create an image metabox -------------------------------------------------------*/

		$meta_boxes[] = array
		(
			'id' => 'bd-metabox-post-image',
			'title' =>  __('Gallery Settings', 'bd'),
			'description' => __('Upload images to this post using the below controls. Please note that the Featured Image will be used as the "cover" image and will be skipped in the gallery.', 'bd'),
			'page' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
	    		array(
	    				'name' =>  __('Upload Images', 'bd'),
	    				'desc' => __('Click to upload images.', 'bd'),
	    				'id' => '_bd_image_upload',
	    				'type' => 'plupload_image',
	    				'std' => __('Upload Images', 'bd')
	    			)
			)
		);


		/* Create a quote metabox -----------------------------------------------------*/

		$meta_boxes[] = array
		(
			'id' => 'bd-metabox-post-quote',
			'title' =>  __('Quote Settings', 'bd'),
			'description' => __('Input your quote.', 'bd'),
			'page' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
						'name' =>  __('The Quote', 'bd'),
						'desc' => __('Input your quote.', 'bd'),
						'id' => '_bd_quote_quote',
						'type' => 'textarea',
						'std' => ''
					)
			)
		);


		/* Create a link metabox ----------------------------------------------------*/
		$meta_boxes[] = array
		(
			'id' => 'bd-metabox-post-link',
			'title' =>  __('Link Settings', 'bd'),
			'description' => __('Input your link', 'bd'),
			'page' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array
			(
				array
				(
						'name' =>  __('The Link', 'bd'),
						'desc' => __('Input your link. Example: http://www.bdayh.com', 'bd'),
						'id' => '_bd_link_url',
						'type' => 'text',
						'std' => ''
				)
			)
		);




        /*
        Featured Image ------------------------------*/

		$meta_boxes[] = array(
			'id' => 'thumb_setting',
			'title' => 'Featured Post',
			'pages' => array('post'),
			'priority' => 'high',
			'context' => 'side',
			'fields' => array
			(
					array
					(
						'name'		=> __('Show Featured Image on post', 'bd'),
						'id' 		=> $prefix . 'thumb_show',
						'type' 		=> 'select',
						'options'	=> array
						(
										'off' => 'OFF',
										'on' => 'On',
						)
					),

					array
					(
						'name'		=> __('Show Slider on post', 'bd'),
						'id' 		=> $prefix . 'ppslider_show',
						'type' 		=> 'select',
						'options'	=> array
						(
										'off' => 'OFF',
										'on' => 'On',
						)
					),

			)
		);


		/* Create a video ----------------------------------------------------*/

		$meta_boxes[] = array(
			'id' => 'video_setting',
			'title' => 'Video Setting',
			'pages' => array('post'),
			'priority' => 'high',
			'context' => 'side',
			'fields' => array
			(
				array
				(
					'name' => __('Video Type', 'theme'),
					'id' => $prefix . 'video_type',
					'type' => 'select',
					'std' => '',
					'options' => array
									(
										'youtube' => __('Youtube', 'theme'),
										'vimeo' => __('Vimeo', 'theme'),
										'daily' => __('Dialymotion', 'theme')
									)
				),

				array
				(
					'name'		=> __('Show Video on post', 'theme'),
					'id' 		=> $prefix . 'video_show',
					'type' 		=> 'select',
					'options'	=> array
									(
										'off' => 'OFF',
										'on' => 'On',
									)
				),

				array
				(
					'name' => __('Video ID', 'theme'),
					'id' => $prefix . 'video_id',
					'type' => 'text',
					'std' => ''

				),

			)
		);



foreach ($meta_boxes as $meta_box) {
	new RW_Meta_Box_Taxonomy($meta_box);
}

/********************* END DEFINITION OF META BOXES ***********************/

/********************* BEGIN VALIDATION ***********************/

/**
 * Validation class
 * Define ALL validation methods inside this class
 * Use the names of these methods in the definition of meta boxes (key 'validate_func' of each field)
 */
class RW_Meta_Box_Validate {
	function check_name($text) {
		if ($text == 'Anh Tran') {
			return 'He is Rilwis';
		}
		return $text;
	}
}

/********************* END VALIDATION ***********************/
?>
