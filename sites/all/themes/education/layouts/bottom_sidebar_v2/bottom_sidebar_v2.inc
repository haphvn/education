<?php
/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

// Plugin definition
$plugin = array(
    'title' => t('Bottom sidebar v2'),
    'category' => t('Kopatheme'),
    'icon' => 'threecol_33_34_33.png',
    'theme' => 'panels_bottom_sidebar_v2',
    'css' => 'bottom_sidebar_v2.css',
    'regions' => array(
        'left' => t('Left side'),
        'middle-col-1' => t('Middle column 1'),
        'middle-col-2' => t('Middle column 2'),
        'right-col-1' => t('Right column 1'),
        'right-col-2' => t('Right column 2'),
    ),
);
