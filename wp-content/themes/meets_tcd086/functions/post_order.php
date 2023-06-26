<?php
/**
 * Enqueue scripts
 */
function po_admin_print_scripts() {

	global $post_type, $paged;

	if ('page' === $post_type || 'featured' === $post_type || 'gallery' === $post_type) {
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'birth-post-order', get_template_directory_uri() . '/admin/js/post-order.min.js', array( 'jquery', 'jquery-ui-sortable' ), version_num(), true );
		wp_localize_script( 'birth-post-order', 'post_order', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'post-order-nonce' ), 'paged' => $paged ) );
	}
}
add_action( 'admin_print_scripts-edit.php', 'po_admin_print_scripts' );

/**
 * Change post order of custom post type 'featured' and 'gallery'
 */
function change_post_order() {

	global $wpdb;
	$paged = (int) $_POST['paged'];
	if ( $paged < 1 ) { $paged = 1; }
	$post_type = $_POST['post_type'];

	if ( 'page' !== $post_type && 'featured' !== $post_type && 'gallery' !== $post_type) return;

	// Check nonce
	check_ajax_referer( 'post-order-nonce', 'security' );

	// Parse $_POST['order'] into array $data
	parse_str( $_POST['order'], $data );
	if ( ! is_array( $data ) || count( $data ) < 1 ) return;

	// Get all items of the post type other than those in trash
	$sql = "SELECT ID FROM {$wpdb->posts} WHERE post_type = %s AND post_status IN ('publish', 'pending', 'draft', 'private', 'future') ORDER BY menu_order, post_date DESC";
	$results = $wpdb->get_results( $wpdb->prepare( $sql, $post_type ) );

	if ( ! is_array( $results ) || count( $results ) < 1 ) return;

	// Create post IDs array
	$post_ids = array_column( $results, 'ID' );
	$post_ids = array_map( 'intval', $post_ids );

	// Get number of items per page
	$per_page = "edit_{$post_type}_per_page";
	$posts_per_page = (int) get_user_option( $per_page );
  if ( empty( $posts_per_page ) || $posts_per_page < 1 ) { 
		$posts_per_page = 20;
	}

	// Sort the order of posts
	$start = $paged * $posts_per_page - $posts_per_page;
	$end = $start + $posts_per_page;
	$index = 0;
	// $i is menu order
	// (int) $data['post'][$index] is post ID to be assigned to $post_ids[$i]
	for ( $i = $start; $i < ( $end ); $i++ ) {
		// if the number of posts in that page is less than $posts_per_page, break the loop
		if ( ! isset( $post_ids[$i] ) ) break;
		$post_ids[$i] = (int) $data['post'][$index];
		$index++;
	}
	// Update $wpdb->posts
	foreach ( $post_ids as $menu_order => $id ) {
		$data = array( 'menu_order' => $menu_order );
   	$wpdb->update( $wpdb->posts, $data, array( 'ID' => $id ) );
	}

	die();
}
add_action( 'wp_ajax_change_post_order', 'change_post_order' ); // Only for login users

function po_pre_get_posts( $query ) {
  $options = get_design_plus_option();
  // Modify post order of featured and gallery
  //if ( is_admin() || ! $query->is_main_query() ) return;
  if ( is_admin() ) return;
  if ( is_post_type_archive('featured') && $query->is_main_query()) { 
    $query->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'DESC' ) );
    $query->set( 'posts_per_page', -1 );
  }
  if ( is_post_type_archive('gallery') && $query->is_main_query()) { 
    $query->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'DESC' ) );
    $query->set( 'posts_per_page', -1 );
  }
}

function po_admin_pre_get_posts( $query ) { 
  global $pagenow, $post_type, $paged;
  if ( ! is_admin() ) return;
  if ( 'page' === $post_type || 'featured' === $post_type || 'gallery' === $post_type) {
    // Change post order by menu_order and date
    if ( 'edit.php' === $pagenow && ! isset( $_GET['orderby'] ) ) { 
      $query->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'DESC' ) );
      //$query->set( 'order', 'ASC' );
    }
  };
}
add_action( 'pre_get_posts', 'po_pre_get_posts' );
add_action( 'pre_get_posts', 'po_admin_pre_get_posts' );

/**
 * Previous post link filter
 */
function po_get_previous_post_where( $where, $in_same_term, $excluded_terms, $taxonomy, $post ) {
	if ( in_array( $post->post_type, ['featured', 'gallery'] ) ) {
		$where = preg_replace( "/ p.post_date < '.*?'/", " p.menu_order < {$post->menu_order}", $where );
	}
	return $where;
}
function po_get_previous_post_sort( $sort, $post, $order ) {
	if ( in_array( $post->post_type, ['featured', 'gallery'] ) ) {
		$sort = "ORDER BY p.menu_order DESC, p.post_date DESC LIMIT 1";
	}
	return $sort;
}
add_filter( 'get_previous_post_where', 'po_get_previous_post_where', 10, 5 );
add_filter( 'get_previous_post_sort', 'po_get_previous_post_sort', 10, 3 );

/**
 * Next post link filter
 */
function po_get_next_post_where( $where, $in_same_term, $excluded_terms, $taxonomy, $post ) {
	if ( in_array( $post->post_type, ['featured', 'gallery'] ) ) {
		$where = preg_replace( "/ p.post_date > '.*?'/", " p.menu_order > {$post->menu_order}", $where );
	}
	return $where;
}
function po_get_next_post_sort( $sort, $post, $order ) {
	if ( in_array( $post->post_type, ['featured', 'gallery'] ) ) {
		$sort = "ORDER BY p.menu_order ASC, p.post_date ASC LIMIT 1";
	}
	return $sort;
}
add_filter( 'get_next_post_where', 'po_get_next_post_where', 10, 5 );
add_filter( 'get_next_post_sort', 'po_get_next_post_sort', 10, 3 );
