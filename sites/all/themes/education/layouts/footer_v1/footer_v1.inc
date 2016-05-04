<?php
/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Footer v1'),
  'category' => t('Kopatheme'),
  'icon' => 'layout.png',
  'theme' => 'panels_footer_v1',
  'css' => 'footer_v1.css',
  'regions' => array(
      'middle' => t('Fluid content'),
  ),
);
