<?php
     global $post;
     $options = get_design_plus_option();

     $sidebar = '';

     if ( is_mobile() ) {

       if(is_singular('news')) {
         $sidebar = 'news_single_widget_mobile';
       } elseif ( is_single() ) {
         $sidebar = 'single_widget_mobile';
       }

       if ( is_active_sidebar( $sidebar ) || is_active_sidebar( 'common_widget_mobile' )) {
?>
<div id="side_col">
 <?php if ( is_active_sidebar( $sidebar ) ) { dynamic_sidebar( $sidebar ); } elseif(is_active_sidebar( 'common_widget_mobile' )) { dynamic_sidebar( 'common_widget_mobile' ); }; ?>
</div>
<?php
       };

     } else {

       if(is_singular('news')) {
         $sidebar = 'news_single_widget';
       } elseif ( is_single() ) {
         $sidebar = 'single_widget';
       }

       if ( is_active_sidebar( $sidebar ) || is_active_sidebar( 'common_widget' )) {
?>
<div id="side_col">
 <?php if ( is_active_sidebar( $sidebar ) ) { dynamic_sidebar( $sidebar ); } elseif(is_active_sidebar( 'common_widget' )) { dynamic_sidebar( 'common_widget' ); }; ?>
</div>
<?php
       };

     };
?>