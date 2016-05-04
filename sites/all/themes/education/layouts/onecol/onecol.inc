<?php
/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

// Plugin definition
$plugin = array(
  'title' => t('Single column'),
  'category' => t('Kopatheme'),
  'icon' => 'onecol.png',
  'theme' => 'panels_onecol',
  'css' => 'onecol.css',
  'regions' => array(
      'top' => t('Top'),
      'middle' => t('Fluid content'),
      'bottom' => t('Bottom'),
  ),
);
