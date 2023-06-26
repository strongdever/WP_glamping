<?php
function seo_meta_box() {
  $post_types = array ( 'post', 'page');
  add_meta_box(
    'show_seo_meta_box',//ID of meta box
    __('SEO setting', 'tcd-w'),//label
    'show_seo_meta_box',//callback function
    $post_types,// post type
    'normal',// context
    'low'// priority
  );
}
add_action('add_meta_boxes', 'seo_meta_box', 998);

function show_seo_meta_box() {
  global $post;
  $options =  get_design_plus_option();

  $seo_title = get_post_meta($post->ID, 'tcd-w_meta_title', true);
  $seo_desc = get_post_meta($post->ID, 'tcd-w_meta_description', true);

  echo '<input type="hidden" name="seo_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  //入力欄 ***************************************************************************************************************************************************************************************
?>
<div class="tcd_custom_fields">

 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php _e( 'Title tag', 'tcd-w' ); ?></h3>
  <input type="text" name="tcd-w_meta_title" value="<?php if(!empty($seo_title)){ echo esc_attr($seo_title); }; ?>" style="width:100%" />
 </div><!-- END .content -->

 <div class="tcd_cf_content">
  <h3 class="tcd_cf_headline"><?php _e( 'Meta description tag', 'tcd-w' ); ?></h3>
  <p><?php printf(__('Recommended number of characters is %s.', 'tcd-w'), '180'); ?></p>
  <textarea class="large-text word_count" cols="50" rows="2" name="tcd-w_meta_description"><?php if(!empty($seo_desc)){ echo esc_textarea($seo_desc); }; ?></textarea>
  <p class="word_count_result"><?php _e( 'Current character is : <span>0</span>', 'tcd-w' ); ?></p>
 </div><!-- END .content -->

</div><!-- END #tcd_custom_fields -->

<?php
}

function save_seo_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['seo_meta_box_nonce']) || !wp_verify_nonce($_POST['seo_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // save or delete
  $cf_keys = array('tcd-w_meta_title','tcd-w_meta_description');
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }

}
add_action('save_post', 'save_seo_meta_box');


// titleタグの出力 --------------------------------------------------------------------------------
function seo_title( $title, $sep ) {

	global $post, $page, $paged;
  $options = get_design_plus_option();

	if ( is_single() && get_post_meta( $post->ID, 'tcd-w_meta_title', true ) or is_page() && get_post_meta( $post->ID, 'tcd-w_meta_title', true ) ) {
		$title = get_post_meta( $post->ID, 'tcd-w_meta_title', true );
 	} elseif ( is_home() ) {
  	$title = esc_html($options['blog_label']) .  ' | ' . get_bloginfo( 'name' );
 	} elseif ( is_category() ) {
  	$title = sprintf( __( 'Post list for %s', 'tcd-w' ), single_cat_title( '', false ) );
 	} elseif ( is_tag() ) {
  	$title = sprintf( __( 'Post list for %s', 'tcd-w' ), single_tag_title( '', false ) );
 	} elseif ( is_search() ) {
    if ( !empty( get_search_query() ) ) {
      $title = sprintf( __( 'Search result for %s', 'tcd-w' ), get_search_query() );
    } else {
      $title = __( 'Search result', 'tcd-w' );
    }
 	} elseif ( is_day() ) {
  	$title = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F jS, Y', 'tcd-w' ) ) );
 	} elseif ( is_month() ) {
  	$title = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F, Y', 'tcd-w') ) );
 	} elseif ( is_year() ) {
  	$title = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'Y', 'tcd-w') ) );
 	} elseif ( is_author() ) {
 		global $wp_query;
  	$curauth = $wp_query->get_queried_object();
  	$title = $curauth->display_name . ' | ' . get_bloginfo( 'name' );
	} else {
  	$title .= get_bloginfo( 'name' );
   	$site_description = get_bloginfo( 'description', 'display' );
   	if ( $paged >= 2 || $page >= 2 ) {
     	$title = "$title $sep " . sprintf( __( 'Page %s', 'tcd-w' ), max( $paged, $page ) );
		}
  }
  return esc_attr($title);

}
add_filter( 'wp_title', 'seo_title', 10, 2 );

// meta descriptionタグの出力 --------------------------------------------------------------------------------
function get_seo_description() {

	global $post;

 	// カスタムフィールドがある場合
 	if ( ( is_single() || is_page() ) && get_post_meta( $post->ID, 'tcd-w_meta_description', true ) ) {
  	$trim_content = post_custom( 'tcd-w_meta_description' );
  	$trim_content = str_replace( array( "\r\n", "\r", "\n" ), '', $trim_content );
  	$trim_content = htmlspecialchars( $trim_content );
  	return esc_html( $trim_content );

 	// 抜粋記事が登録されている場合は出力
 	} elseif ( ( is_single() || is_page() ) && has_excerpt() ) { 
  	$trim_content = get_the_excerpt();
  	$trim_content = str_replace( array( "\r\n", "\r", "\n" ), '', $trim_content );
  	return esc_html( $trim_content );

	// トップページの場合
	} elseif ( is_front_page() ) {
		return esc_html( get_bloginfo( 'description' ) );

 	// 上記が無い場合は本文から120文字を抜粋
 	} elseif ( is_single() || is_page() ) {
   	$base_content = $post->post_content;
   	$base_content = preg_replace( '!<style.*?>.*?</style.*?>!is', '', $base_content );
   	$base_content = preg_replace( '!<script.*?>.*?</script.*?>!is', '', $base_content );
   	$base_content = preg_replace( '/\[.+\]/','', $base_content );
   	$base_content = strip_tags( $base_content );
   	$trim_content = mb_substr( $base_content, 0, 120, 'utf-8' );
   	$trim_content = str_replace( ']]>', ']]&gt;', $trim_content );
   	$trim_content = str_replace( array( "\r\n", "\r", "\n" ), '', $trim_content );
   	$trim_content = htmlspecialchars( $trim_content );

   	if ( preg_match( '/。/', $trim_content ) ) { 
		// 指定した文字数内にある、最後の「。」以降をカットして表示
    	mb_regex_encoding( 'UTF-8' ); 
     	$trim_content = mb_ereg_replace( '。[^。]*$', '。', $trim_content );
  		return esc_html( $trim_content );
   	} else { 
			// 指定した文字数内に「。」が無い場合は、指定した文字数の文章を表示し、末尾に「…」を表示
			if ( $trim_content == '' ) {
				return esc_html( get_bloginfo( 'description' ) );
     	} else {
				return esc_html( $trim_content ) . '...';
			}
   	}
 	} elseif ( is_day() ) {
    return sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F jS, Y', 'tcd-w' ) ) );
 	} elseif ( is_month() ) {
    return sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F, Y', 'tcd-w' ) ) );
 	} elseif ( is_year() ) {
    return sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'Y', 'tcd-w' ) ) );
 	} elseif ( is_author() ) {
    global $wp_query;
    $curauth = $wp_query->get_queried_object();
    return sprintf( __( 'Archive for %s', 'tcd-w' ), esc_html( $curauth->display_name ) );
 	} elseif ( is_search() ) {
    return sprintf( __( 'Post list for %s', 'tcd-w' ), get_search_query() );
 	} elseif ( is_category() ) {
  	$cat_id = get_query_var( 'cat' );
  	$cat_data = get_option( "cat_$cat_id" );
  	if ( category_description() ) {
    	$category_desc = strip_tags( category_description() );
    	$category_desc = str_replace( array( "\r\n", "\r", "\n" ), '', $category_desc );
    	return esc_html( $category_desc );
  	} else {
    	return null;
  	}
 	} else {
    return esc_html( get_bloginfo( 'description' ) );
 	}

}

function seo_description() {
  echo get_seo_description();
}
