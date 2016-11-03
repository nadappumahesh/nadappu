<?php
require( get_template_directory() . '/framework/functions.php' );
/** * Set the format for the more in excerpt, return ... instead of [...] */ 
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
function wellthemes_excerpt_more( $more ) {
	return '...';
}
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'facebook', 600, 315 );
}
add_filter('wpseo_opengraph_image_size', 'mysite_opengraph_image_size');
function mysite_opengraph_image_size($val) {
return 'facebook';
}
add_filter('wpseo_pre_analysis_post_content', 'mysite_opengraph_content');
function mysite_opengraph_content($val) {
return '';
}
add_filter('wpseo_opengraph_image', 'mysite_opengraph_single_image_filter');
function mysite_opengraph_single_image_filter($val) {
if ( preg_match('/-600x/', $val) ) return $val;
}
add_filter('excerpt_more', 'wellthemes_excerpt_more');

function wt_time_ago() {
 
	global $post;
 
	$date = get_post_time('G', true, $post);
  
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year', 'wellthemes' ), __( 'years', 'wellthemes' ) ),
		array( 60 * 60 * 24 * 30 , __( 'month', 'wellthemes' ), __( 'months', 'wellthemes' ) ),
		array( 60 * 60 * 24 * 7, __( 'week', 'wellthemes' ), __( 'weeks', 'wellthemes' ) ),
		array( 60 * 60 * 24 , __( 'day', 'wellthemes' ), __( 'days', 'wellthemes' ) ),
		array( 60 * 60 , __( 'hour', 'wellthemes' ), __( 'hours', 'wellthemes' ) ),
		array( 60 , __( 'minute', 'wellthemes' ), __( 'minutes', 'wellthemes' ) ),
		array( 1, __( 'second', 'wellthemes' ), __( 'seconds', 'wellthemes' ) )
	);
 
	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
 
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );
 
	// Difference in seconds
	$since = $newer_date - $date;
 	$since = $since-19800;
	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'wellthemes' );
 
	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */
 
	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
 
		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}
 
	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
  
	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'wellthemes' );
	}
 
	$output .= __(' ago', 'wellthemes');
 
	return $output;
}
function wt_seo_options(){
	global $post;
	if (is_single()) {
		setup_postdata($post);
		$full_excerpt = get_the_excerpt();
		$excerpt = mb_substr($full_excerpt,0, 150);
			if (strlen($full_excerpt) > 150){
				$excerpt = $excerpt.'...';
			}
		
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		
		?>  
		<meta property="og:url" content="<?php the_permalink() ?>" />
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:description" content="<?php echo $excerpt; ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo $thumbnail_src[0] ?>" />
	<?php } else { ?>  
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<?php }
}
add_action('wp_head', 'wt_seo_options');
?>
