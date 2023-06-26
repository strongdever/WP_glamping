<?php
/**
 * Add custom columns (ID, thumbnails)
 */
function manage_columns( $columns ) {
  // Make new column array with ID column and featured image column
  $new_columns = array();

  foreach ( $columns as $column_name => $column_display_name ) {
    // Add post_id column before title column
    if ( isset( $columns['title'] ) && $column_name == 'title' ) {
      $new_columns['post_id'] = 'ID';
    }
    $new_columns[$column_name] = $column_display_name;
  }

  // Add featured image column
  $new_columns['new_post_thumb'] = __( 'Featured Image', 'tcd-w' );

  return $new_columns;
}
add_filter( 'manage_posts_columns', 'manage_columns', 5 ); // For post, news, event and special


/**
 * おすすめ記事を追加
 */
function manage_post_posts_columns( $columns ) {

  $new_columns = array();
  foreach ( $columns as $column_name => $column_display_name ) {
    if ( isset( $columns['new_post_thumb'] ) && $column_name == 'new_post_thumb' ) {
      $new_columns['recommend_post'] = __( 'Post type', 'tcd-w' );
    }
    $new_columns[$column_name] = $column_display_name;
  }
  return $new_columns;

}
add_filter( 'manage_post_posts_columns', 'manage_post_posts_columns' ); // Only for post


/**
 * 特集にカテゴリーなどを追加
 */
function manage_featured_posts_columns( $columns ) {

  $options = get_design_plus_option();
  $featured_category_label = $options['featured_category_label'] ? esc_html( $options['featured_category_label'] ) : __( 'Featured category', 'tcd-w' );

  $new_columns = array();
  foreach ( $columns as $column_name => $column_display_name ) {
    if ( isset( $columns['new_post_thumb'] ) && $column_name == 'new_post_thumb' ) {
      $new_columns['featured_post_num'] = 'Post number';
      $new_columns['featured_category'] = $featured_category_label;
    }
    $new_columns[$column_name] = $column_display_name;
  }
  return $new_columns;
}
add_filter( 'manage_featured_posts_columns', 'manage_featured_posts_columns' ); // Only for featured


/**
 * ギャラリーにカテゴリーなどを追加
 */
function manage_gallery_posts_columns( $columns ) {

  $options = get_design_plus_option();
  $gallery_category_label = $options['gallery_category_label'] ? esc_html( $options['gallery_category_label'] ) : __( 'Gallery category', 'tcd-w' );

  $new_columns = array();
  foreach ( $columns as $column_name => $column_display_name ) {
    if ( isset( $columns['new_post_thumb'] ) && $column_name == 'new_post_thumb' ) {
      $new_columns['gallery_category'] = $gallery_category_label;
    }
    $new_columns[$column_name] = $column_display_name;
  }
  return $new_columns;
}
add_filter( 'manage_gallery_posts_columns', 'manage_gallery_posts_columns' ); // Only for gallery


/**
 * Output the content of custom columns (ID, featured image, recommend post and event date)
 */
function add_column( $column_name, $post_id ) {

  $options = get_design_plus_option();

  switch ( $column_name ) {

    case 'featured_post_num' : // 特集　記事番号
      if ( get_post_meta( $post_id, 'featured_num', true ) ) { echo esc_html(get_post_meta( $post_id, 'featured_num', true )); }
      break;

    case 'featured_category' : // 特集カテゴリー
      if ( $featured_category = get_the_terms( $post_id, 'featured_category' ) ) {
        foreach ( $featured_category as $cats ) {
          printf( '<a href="%s">%s</a>', esc_url( get_edit_term_link( $cats, 'featured_category' ) ), $cats->name );
        }
      }
      break;

    case 'gallery_category' : // ギャラリーカテゴリー
      if ( $gallery_category = get_the_terms( $post_id, 'gallery_category' ) ) {
        foreach ( $gallery_category as $cats ) {
          printf( '<a href="%s">%s</a>', esc_url( get_edit_term_link( $cats, 'gallery_category' ) ), $cats->name );
        }
      }
      break;

    case 'new_post_thumb' : // アイキャッチ画像
      $post_thumbnail_id = get_post_thumbnail_id( $post_id );
      if ( $post_thumbnail_id ) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        echo '<img width="70" src="' . esc_attr( $post_thumbnail_img[0] ) . '">';
      }
      break;

    case 'recommend_post' : // おすすめ記事
      if ( get_post_meta( $post_id, 'recommend_post', true ) ) { echo '<p>' . __( 'Recommend post', 'tcd-w' ) . '1</p>'; }
      if ( get_post_meta( $post_id, 'recommend_post2', true ) ) { echo '<p>' . __( 'Recommend post', 'tcd-w' ) . '2</p>'; }
      if ( get_post_meta( $post_id, 'featured_post', true ) ) { echo '<p>' . __( 'Featured post', 'tcd-w' ) . '</p>'; }
      break;

  }

}
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 ); // For post
add_action( 'manage_pages_custom_column', 'add_column', 10, 2 ); // For page


/**
 * Enable sorting of the ID column
 */
function custom_quick_edit_sortable_columns( $sortable_columns ) {
  $sortable_columns['post_id'] = 'ID';
  return $sortable_columns;
}
//add_filter( 'manage_edit-post_sortable_columns', 'custom_quick_edit_sortable_columns' ); // For post
//add_filter( 'manage_edit-news_sortable_columns', 'custom_quick_edit_sortable_columns' ); // For news
add_filter( 'manage_edit-page_sortable_columns', 'custom_quick_edit_sortable_columns' ); // For page





?>