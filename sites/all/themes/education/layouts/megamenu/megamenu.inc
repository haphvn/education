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
  'title' => t('Mega menu'),
  'category' => t('Kopatheme'),
  'icon' => 'onecol.png',
  'theme' => 'panels_megamenu',
  'css' => 'megamenu.css',
  'regions' => array(
      'left' => t('Left'),
      'center' => t('Center'),
      'right' => t('Right'),
  ),
);
