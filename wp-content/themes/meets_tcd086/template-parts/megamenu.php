<?php
     $options = get_design_plus_option();

$menu_locations = get_nav_menu_locations();
$nav_menus = wp_get_nav_menus();
$megamenus = array();

if ( isset( $menu_locations['global-menu'] ) ) {

  foreach ( $nav_menus as $menu ) {

    if ( $menu_locations['global-menu'] !== $menu->term_id ) continue;

    $nav_menu_items = wp_get_nav_menu_items( $menu );

    foreach ( (array) $nav_menu_items as $item ) {

      if ( ! isset( $options['megamenu'][$item->menu_item_parent] ) ) continue;

      if ( 'type1' !== $options['megamenu'][$item->menu_item_parent] ) {
        $megamenus[$item->menu_item_parent][] = $item;
      }
    }

    break;
  }
}

foreach ( $options['megamenu'] as $index => $value ) {

  switch ( $value ) {
    case 'type2' :
      render_megamenu_a( $index, $megamenus );
      break;
    case 'type3' :
      render_megamenu_b( $index, $megamenus );
      break;
    case 'type4' :
      render_megamenu_c( $index, $megamenus );
      break;
  }

}
