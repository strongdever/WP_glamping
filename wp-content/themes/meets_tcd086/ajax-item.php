<?php
     $options = get_design_plus_option();

     $offset = isset( $_POST['offset_post_num'] ) ? $_POST['offset_post_num'] : 4;
     $post_cat_id = isset( $_POST['post_cat_id'] ) ? $_POST['post_cat_id'] : '';
     $posts_per_page = 4;

     if($post_cat_id){
       $all_query = new WP_Query( array('post_type' => 'gallery', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'gallery_category', 'field' => 'term_id', 'terms' => $post_cat_id ) )) );
       $all_post_count = $all_query->found_posts;
       $args = array( 'post_type' => 'gallery', 'posts_per_page' => $posts_per_page, 'offset' => $offset, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'), 'tax_query' => array( array( 'taxonomy' => 'gallery_category', 'field' => 'term_id', 'terms' => $post_cat_id ) ) );
     } else {
       $all_query = new WP_Query( array('post_type' => 'gallery', 'posts_per_page' => -1) );
       $all_post_count = $all_query->found_posts;
       $args = array( 'post_type' => 'gallery', 'posts_per_page' => $posts_per_page, 'offset' => $offset, 'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC') );
     }

     $post_list_query = new wp_query($args);
     if($post_list_query->have_posts()):
       $entry_item = '';
       ob_start();
       while ( $post_list_query->have_posts() ) : $post_list_query->the_post();
         if(has_post_thumbnail()) {
           $image = get_post_meta($post->ID, 'gallery_list_image', true);
           if(empty($image)){
             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size4' );
           } else {
             $image = wp_get_attachment_image_src( $image, 'full' );
           }
         } elseif($options['no_image1']) {
           $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
         } else {
           $image = array();
           $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
         }
         $cat_id = '';
         $category = wp_get_post_terms( $post->ID, 'gallery_category' , array( 'orderby' => 'term_order' ));
         if ( $category && ! is_wp_error($category) ) {
           foreach ( $category as $cat ) :
             $cat_name = $cat->name;
             $cat_id = $cat->term_id;
             $cat_url = get_term_link($cat_id,'gallery_category');
             break;
           endforeach;
         };
?>
    <article class="item ajax_item offset_<?php echo $offset; ?>" style="opacity:0; display:none;">
     <?php if ( $options['archive_gallery_list_show_category'] && $category && ! is_wp_error($category) ) { ?>
     <div class="category rich_font_<?php echo esc_attr($options['archive_gallery_list_category_font_type']); ?> <?php if($options['archive_gallery_list_category_direction']) { echo 'type2'; }; ?>">
      <a href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></a>
     </div>
     <?php }; ?>
     <a class="link animate_background" href="<?php the_permalink(); ?>">
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area">
       <h3 class="title"><span><?php the_title(); ?></span></h3>
      </div>
     </a>
    </article>
<?php
       endwhile;
       $entry_item .= ob_get_contents();
       ob_end_clean();
     endif;

     wp_send_json( array(
       'html' => $entry_item,
       'remain' => $all_post_count - ( $offset + $post_list_query->post_count )
     ) );
?>