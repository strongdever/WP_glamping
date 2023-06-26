<?php
function add_tcd_profile_fields( $user ) {
	$options = get_design_plus_option();
?>
<div class="custom_category_meta" style="margin:20px 0;">
 <h3 class="ccm_headline"><?php _e( 'Additional user data', 'tcd-w' ); ?></h3>

 <div class="ccm_content clearfix">
<?php
	// 寄稿者以上
	if ( user_can( $user, 'edit_posts' ) ) :
		$user_image = get_the_author_meta( 'user_image', $user->ID );
?>

  <h4 class="headline"><?php _e( 'Show author profile at single page', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input name="show_author" type="checkbox" value="1" <?php checked( $user->show_author, 1 ); ?>> <?php _e( 'Show', 'tcd-w'); ?>
  </div><!-- END input_field -->

  <h4 class="headline"><?php _e( 'Facebook URL', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input type="text" name="facebook_url" value="<?php echo esc_attr( get_the_author_meta( 'facebook_url', $user->ID ) ); ?>" class="regular-text" />
  </div><!-- END input_field -->

  <h4 class="headline"><?php _e( 'Twitter URL', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input type="text" name="twitter_url" value="<?php echo esc_attr( get_the_author_meta( 'twitter_url', $user->ID ) ); ?>" class="regular-text" />
  </div><!-- END input_field -->

  <h4 class="headline"><?php _e( 'Instagram URL', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input type="text" name="instagram_url" value="<?php echo esc_attr( get_the_author_meta( 'instagram_url', $user->ID ) ); ?>" class="regular-text" />
  </div><!-- END input_field -->

  <h4 class="headline"><?php _e( 'Pinterest URL', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input type="text" name="pinterest_url" value="<?php echo esc_attr( get_the_author_meta( 'pinterest_url', $user->ID ) ); ?>" class="regular-text" />
  </div><!-- END input_field -->

  <h4 class="headline"><?php _e( 'Youtube URL', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input type="text" name="youtube_url" value="<?php echo esc_attr( get_the_author_meta( 'youtube_url', $user->ID ) ); ?>" class="regular-text" />
  </div><!-- END input_field -->

  <h4 class="headline"><?php _e( 'Contact page URL<br>(You can use mailto:)', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <input type="text" name="contact_url" value="<?php echo esc_attr( get_the_author_meta( 'contact_url', $user->ID ) ); ?>" class="regular-text" />
  </div><!-- END input_field -->
<?php
	endif;

	// 以下全ユーザー
?>
  <h4 class="headline"><?php _e( 'Profile image', 'tcd-w' ); ?></h4>
  <div class="input_field">
   <p><?php printf(__('Recommend image size. Width:%1$spx, Height:%2$spx.', 'tcd-w'), '200', '200'); ?></p>
   <?php echo tcd_user_cf_media_form( 'profile_image', $user, 200 ); ?>
  </div><!-- END input_field -->

 </div><!-- END ccm_content -->

</div><!-- END .custom_category_meta -->
<?php
}
add_action( 'show_user_profile', 'add_tcd_profile_fields' );
add_action( 'edit_user_profile', 'add_tcd_profile_fields' );

function update_tcdw_profile_fields( $user_id ) {
	$options = get_design_plus_option();

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	$old_profile_image = get_user_meta( $user_id, 'profile_image', true );

	// 寄稿者以上
	if ( user_can( $user_id, 'edit_posts' ) ) {
		$meta_keys = array(
			'facebook_url' => $_POST['facebook_url'],
			'twitter_url' => $_POST['twitter_url'],
			'instagram_url' => $_POST['instagram_url'],
			'pinterest_url' => $_POST['pinterest_url'],
			'youtube_url' => $_POST['youtube_url'],
			'contact_url' => $_POST['contact_url'],
			'show_author' => $_POST['show_author']
		);
	} else {
		$meta_keys = array();
	}

	$meta_keys['profile_image'] = $_POST['profile_image'];

	foreach( $meta_keys as $key => $value ) {
		update_user_meta( $user_id, $key, $value );
	}

	$new_profile_image = get_user_meta( $user_id, 'profile_image', true );
	if ($new_profile_image != $old_profile_image) {
		update_user_meta( $user_id, '_profile_image', '' );
	}

	return true;
}
add_action( 'personal_options_update', 'update_tcdw_profile_fields' );
add_action( 'edit_user_profile_update', 'update_tcdw_profile_fields' );


/**
 * ユーザーメタ用 画像メディアフィールド出力
 */
function tcd_user_cf_media_form( $cf_key, $user, $image_size = 96 ) {
	if ( empty( $cf_key ) ) return false;
	$media_id = get_user_meta( $user->ID, $cf_key, true );
?>
<div class="cf cf_media_field hide-if-no-js <?php echo esc_attr( $cf_key ); ?>">
		<input type="hidden" class="cf_media_id" name="<?php echo esc_attr( $cf_key ); ?>" id="<?php echo esc_attr( $cf_key ); ?>" value="<?php echo esc_attr( $media_id ); ?>">
	<div class="preview_field">
<?php
	if ( $media_id ) :
		if ( is_int( $image_size ) ) :
			echo get_avatar( $user->ID, $image_size );
		else :
			echo wp_get_attachment_image( $media_id, 'medium' );
		endif;
	endif;
?>
	</div>
	<div class="button_area">
		<input type="button" class="cfmf-select-img button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>">
		<input type="button" class="cfmf-delete-img button<?php if ( ! $media_id ) echo ' hidden'; ?>" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>">
	</div>
</div>
<style>
.user-profile-picture {
	display: none;
}
.cf_media_field.profile_image .preview_field img {
	height: auto;
	max-width: 300px;
}
</style>
<?php
}

/**
 * get_avatar()でプロフィール画像を使用するフィルター
 * Gravatarは使用しないようにpre_get_avatarにフック
 */
function tcd_pre_get_avatar( $avatar = '', $id_or_email, $args ) {
	// ディスカッション設定のデフォルトアバターの場合は終了
	if ( ! empty( $args['force_default'] ) ) {
		return $avatar;
	}

	if ( is_numeric( $id_or_email ) ) {
		$user_id = (int) $id_or_email;
	} elseif ( is_string( $id_or_email ) && ( $user = get_user_by( 'email', $id_or_email ) ) ) {
		$user_id = $user->ID;
	} elseif ( is_object( $id_or_email ) && ! empty( $id_or_email->user_id ) ) {
		$user_id = (int) $id_or_email->user_id;
	}

	if ( empty( $user_id ) ) {
		return $avatar;
	}

	extract( $args );

	$size = (int) $size;

	$avater_url = _tcd_get_avatar_url( $user_id, $size );

	if ( ! $avater_url ) {
		return $avatar;
	}

	if ( empty( $alt ) ) {
		$alt = get_the_author_meta( 'display_name', $user_id );
	}

	$author_class = ! is_admin() && is_author( $user_id ) ? ' current-author' : '' ;

	$avatar = "<img alt='" . esc_attr( $alt ) . "' src='" . esc_url( $avater_url ) . "' class='avatar avatar-{$size}{$author_class} photo' height='{$size}' width='{$size}' />";

	return apply_filters( 'tcd_pre_get_avatar', $avatar );
}
add_filter( 'pre_get_avatar', 'tcd_pre_get_avatar', 10, 3 );

/**
 * get_avatar_url()でプロフィール画像を使用するフィルター
 * Gravatarは使用しないようにpre_get_avatar_dataにフック
 */
function tcd_pre_get_avatar_data( $args, $id_or_email ) {
	// ディスカッション設定のデフォルトアバターの場合は終了
	if ( ! empty( $args['force_default'] ) ) {
		return $args;
	}

	if ( is_numeric( $id_or_email ) ) {
		$user_id = (int) $id_or_email;
	} elseif ( is_string( $id_or_email ) && ( $user = get_user_by( 'email', $id_or_email ) ) ) {
		$user_id = $user->ID;
	} elseif ( is_object( $id_or_email ) && ! empty( $id_or_email->user_id ) ) {
		$user_id = (int) $id_or_email->user_id;
	}

	if ( empty( $user_id ) ) {
		return $args;
	}

	$avater_url = _tcd_get_avatar_url( $user_id, $args['size'] );

	if ( $avater_url ) {
		$args['url'] = $avater_url;
	}

	return apply_filters( 'tcd_pre_get_avatar_data', $args );
}
add_filter( 'pre_get_avatar_data', 'tcd_pre_get_avatar_data', 10, 2 );

/**
 * アバター用にユーザーメタprofile_imageのurlを返す
 */
function _tcd_get_avatar_url( $user_id, $width, $height = null ) {
	// get user meta
	$profile_image_id = get_user_meta( $user_id, 'profile_image', true );
	$_profile_image = get_user_meta( $user_id, '_profile_image', true );

	if ( ! $profile_image_id || ! is_numeric( $profile_image_id ) || ! wp_attachment_is_image( $profile_image_id ) ) {
		return false;
	}

	$profile_image_full_path = get_attached_file( $profile_image_id );
	$profile_image_src = wp_get_attachment_image_src( $profile_image_id, 'full' );

	if ( ! $profile_image_src ) {
		return false;
	}

	$profile_image_url = $profile_image_src[0];
	$profile_image_width = $profile_image_src[1];
	$profile_image_height = $profile_image_src[2];

	if ( ! $_profile_image || ! is_array( $_profile_image ) ) {
		$_profile_image = array();
	}
	if ( ! isset( $_profile_image[$profile_image_id] ) || ! is_array( $_profile_image[$profile_image_id] ) ) {
		$_profile_image[$profile_image_id] = array();
	}

	// サイズキー
	$width = intval( $width );
	$height = intval( $height );

	if ( 0 >= $width) {
		return false;
	} elseif ( 0 < $height && $height !== $width ) {
		$size_key = $width . 'x' . $height;
	} else {
		$width = min( $profile_image_width, $profile_image_height, $width );
		$size_key = $width;
		$height = $width;
	}

	// $size_keyのリサイズ画像urlがある場合ファイル存在確認
	if ( isset( $_profile_image[$profile_image_id][$size_key] ) ) {
		$resize_profile_image_full_path = dirname( $profile_image_full_path ) . '/' . basename( $_profile_image[$profile_image_id][$size_key] );

		if ( ! file_exists( $resize_profile_image_full_path ) ) {
			unset( $_profile_image[$profile_image_id][$size_key] );
		}
	}

	// $size_keyのリサイズ画像が無ければ生成
	if ( empty( $_profile_image[$profile_image_id][$size_key] ) ) {
		$_profile_image[$profile_image_id][$size_key] = $profile_image_url;

		if ( $profile_image_full_path && ( $profile_image_width > $width || $profile_image_height > $height ) ) {
			$resize = image_make_intermediate_size( $profile_image_full_path, $width, $height, true );
			// リサイズ成功時はurlをセットしてメタ更新
			if ( ! empty( $resize['file'] ) ) {
				$_profile_image[$profile_image_id][$size_key] = dirname( $profile_image_url ) . '/' . $resize['file'];
				update_user_meta( $user_id, '_profile_image', $_profile_image );
			}
		}
	}

	// avater url
	if ( ! empty( $_profile_image[$profile_image_id][$size_key] ) ) {
		return $_profile_image[$profile_image_id][$size_key];
	} else {
		return $profile_image_url;
	}
}
