<?php
/**
 * @file
 * config_others_menu.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function config_others_menu_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: menu-others-menu.
  $menus['menu-others-menu'] = array(
    'menu_name' => 'menu-others-menu',
    'title' => 'Others Menu',
    'description' => '',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Others Menu');

  return $menus;
}
