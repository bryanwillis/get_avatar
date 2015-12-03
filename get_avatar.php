 <?php
/*
Plugin Name: Avatar Shortcode aka "get_avatar"
Plugin Script: get_avatar.php
Plugin URI: http://wordpress.org/plugins/avatar-shortcode/
Description: Allows you to use avatars/gravatars or profile pictures as shortcodes the same way you would in templates
Version: 0.1
License: GPL
Author: Bryan Willis
Author URI: http://profiles.wordpress.org/codecandid

=== RELEASE NOTES ===
2014-06-13 - v0.1
*/





if ( function_exists( 'get_avatar' ) ) {
	
function brw_get_avatar_shortcode ( $attributes ) {
	  
	  global $current_user;
          get_currentuserinfo();
          $id = $current_user->ID;
          
	  extract(shortcode_atts(array(
		       'id' => $current_user->ID,
		       'size' => 32,
		       'default' => 'mystery',
		       'alt' => '',
                       'class' => '',
                       'rating' => '',
                       'extra_attr' => '',
                       'width' => '',
                       'height' => '',
                       'force_display' => ''
	  ), $attributes, 'get_avatar' ));

          $args = array( 
                   'class' => $class,
                   'rating' => $rating,
                   'extra_attr' => $extra_attr,
                   'width' => $width,
                   'height' => $height,
                   'force_display' => $force_display  
          );    

	  return get_avatar( $id, $size, $default, $alt, $args );

}
add_shortcode ('get_avatar', 'brw_get_avatar_shortcode');
}

?>
