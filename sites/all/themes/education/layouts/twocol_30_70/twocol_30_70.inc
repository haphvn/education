<?php
/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

// Plugin definition.
$plugin = array(
  'title' => t('Two column 30/70'),
  'category' => t('Kopatheme'),
  'icon' => 'twocol_30_70.png',
  'theme' => 'panels_twocol_30_70',
  'css' => 'twocol_30_70.css',
  'regions' => array(
    'top' => t('Top'),
    'ads' => t('Ads'),
    'left' => t('Left'),
    'center' => t('Center'),
    'right' => t('Right'),
    'bottom' => t('Bottom'),
  ),
);
