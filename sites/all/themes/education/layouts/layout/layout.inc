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
    'title' => t('Layout'),
    'category' => t('Kopatheme'),
    'icon' => 'onecol.png',
    'theme' => 'panels_layout',
    'css' => 'layout.css',
    'regions' => array(
        'left' => t('Left'),
        'right' => t('Right'),
        'bottom' => t('Bottom'),
        'content' => t('Content'),
    ),
);