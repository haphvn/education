<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
global $base_url;
$theme_image = drupal_get_path('theme', 'education');

$bean = $variables['elements'];
$field_image = $bean['#entity']->field_image['und'][0];
$desc = $bean['#entity']->field_description['und'][0]['value'];
?>

<div id="footer-logo-image">
    <a href="<?php print $base_url ?>"><img src="<?php print $base_url .'/'. $theme_image ?>/logo.png" alt="" />
    </a></div>

<div class="widget widget_text">
    <p><?php print $desc ?></p>
</div>

<div class="widget kopa-ads-widget-1">
    <a href="#">
        <img src="<?php print file_create_url($field_image['uri']) ?>" alt="" />
    </a>
</div>
<!-- widget -->
