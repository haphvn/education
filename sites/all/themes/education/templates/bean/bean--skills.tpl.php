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

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$field_skills = $bean['#entity']->field_skills['und'];
?>

<div class="widget kopa-skill-widget">

    <h4 class="widget-title widget-title-s9"><?php print $title ?></h4>

    <div class="widget-content">
        <?php
        foreach ($field_skills as $value) :
            $item = field_collection_item_load($value['value']);
            $field_title = $item->field_title['und'][0]['value'];
            $field_percent = $item->field_percent['und'][0]['value'];
            $field_icon = $item->field_icon['und'][0]['value'];
        ?>
        <div class="pro-bar-wrapper">
            <div class="pro-bar-container color-gray">
                <?php print $field_icon ?>
                <div class="pro-bar bar-<?php print $field_percent ?> color-midnight-blue" data-pro-bar-percent="<?php print $field_percent ?>" data-pro-bar-delay="400">
                    <div class=""><?php print $field_title ?></div>
                </div>
            </div>
        </div>
        <!-- pro-bar-wrapper -->
        <?php endforeach ?>
    </div>
    <!-- widget-content -->

</div>
<!-- widget -->