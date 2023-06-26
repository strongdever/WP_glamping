<?php
/**
 * 縮小画像生成時に画像サイズ名に「blur」が付いているものをぼかす
 */
function tcd_image_blur_filter_wp_generate_attachment_metadata( $metadata ) {
	if ( empty( $metadata['file'] ) || empty( $metadata['sizes'] ) ) {
		return $metadata;
	}

	$upload_dir = wp_upload_dir();

	if ( empty( $upload_dir['basedir'] ) ) {
		return $metadata;
	}

	$image_dir = $upload_dir['basedir'] . '/' . dirname( $metadata['file'] ) . '/';

	if ( function_exists( 'imagefilter' ) ) {
		// ブラーの強さを50から150に変更
		$imagefilter_repeat = absint( apply_filters( 'tcd_image_blur_imagefilter_repeat', 150 ) );
		$imagefilter_jpeg_quality = apply_filters( 'jpeg_quality', 90, 'tcd_image_blur' );
	} elseif ( class_exists( 'Imagick' ) ) {
		$Imagick_blurImage_radius = absint( apply_filters( 'tcd_image_blur_Imagick_blurImage_radius', 0 ) );
		$Imagick_blurImage_sigma = absint( apply_filters( 'tcd_image_blur_Imagick_blurImage_sigma', 20 ) );
	} else {
		return $metadata;
	}

	foreach ( $metadata['sizes'] as $size => $size_data ) {
		if ( false === strpos( $size, 'blur' ) || empty( $size_data['file'] ) || ! empty( $size_data['blurred'] ) ) {
			continue;
		}

		$image = $result = null;
		$src_file = $image_dir . $size_data['file'];
		$dst_file = str_replace( wp_basename( $src_file ), 'blur-' . wp_basename( $src_file ), $src_file );
		if ( ! file_exists( $src_file ) ) {
			continue;
		}

		// タイムアウト対策
		set_time_limit( 30 );

		if ( function_exists( 'imagefilter' ) ) {
			if ( empty( $size_data['mime-type'] ) ) {
				continue;
			} elseif ( 'image/jpeg' === $size_data['mime-type'] ) {
				$image = imagecreatefromjpeg( $src_file );
			} elseif ( 'image/png' === $size_data['mime-type'] ) {
				$image = imagecreatefrompng( $src_file );
			} elseif ( 'image/gif' === $size_data['mime-type'] ) {
				$image = imagecreatefromgif( $src_file );
			} else {
				continue;
			}

			for ( $i = 1; $i <= $imagefilter_repeat; $i++ ) {
				imagefilter( $image, IMG_FILTER_GAUSSIAN_BLUR );
			}

			imagefilter( $image, IMG_FILTER_SMOOTH, 99 );

			if ( 'image/jpeg' === $size_data['mime-type'] ) {
				$result = imagejpeg( $image, $dst_file, $imagefilter_jpeg_quality );
			} elseif ( 'image/png' === $size_data['mime-type'] ) {
				$result = imagepng( $image, $dst_file );
			} elseif ( 'image/gif' === $size_data['mime-type'] ) {
				$result = imagegif( $image, $dst_file );
			}

			imagedestroy( $image );

			if ( $result ) {
				$metadata['sizes'][ $size ]['file'] = wp_basename( $dst_file );
				$metadata['sizes'][ $size ]['blurred'] = true;
			}
		} elseif ( class_exists( 'Imagick' ) ) {
			$image = new Imagick( $src_file );
			$image->blurImage( $Imagick_blurImage_radius, $Imagick_blurImage_sigma );
			$result = $image->writeImage( $dst_file );
			$image->clear();
			$image->destroy();

			if ( $result ) {
				$metadata['sizes'][ $size ]['file'] = wp_basename( $dst_file );
				$metadata['sizes'][ $size ]['blurred'] = true;
			}
		}
	}

	return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'tcd_image_blur_filter_wp_generate_attachment_metadata', 20 );

/**
 * srcsetに使用する縮小画像をぼかしの場合はぼかし画像のみ、ぼかしなし画像の場合はぼかしなし画像のみに制限する
 */
function tcd_image_blur_filter_wp_calculate_image_srcset_meta( $image_meta, $size_array, $image_src, $attachment_id ) {
	if ( empty( $image_meta['sizes'] ) ) {
		return $image_meta;
	}

	if ( false === strpos( $image_src, '/blur-' ) ) {
		foreach ( $image_meta['sizes'] as $size => $size_data ) {
			if ( false !== strpos( $size, 'blur' ) ) {
				unset( $image_meta['sizes'][ $size ] );
			}
		}
	} else {
		foreach ( $image_meta['sizes'] as $size => $size_data ) {
			if ( false === strpos( $size, 'blur' ) ) {
				unset( $image_meta['sizes'][ $size ] );
			}
		}
	}

	return $image_meta;
}
add_filter( 'wp_calculate_image_srcset_meta', 'tcd_image_blur_filter_wp_calculate_image_srcset_meta', 20, 4 );

?>
