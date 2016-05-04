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
$field_testimonial = $bean['#entity']->field_testimonial['und'];
?>

<div class="widget kopa-testimonial-1-widget">

    <h4 class="widget-title widget-title-s10"><?php print $title ?></h4>

    <div class="owl-carousel owl-carousel-7">
        <?php
        foreach ($field_testimonial as $value) :
            $item = field_collection_item_load($value['value']);
            $field_description = $item->field_description['und'][0]['value'];
            $field_title = $item->field_title['und'][0]['value'];
            $field_position = $item->field_position['und'][0]['value'];
        ?>
        <div class="item">
            <article class="testimonial-item">
                <div><?php print $field_description ?></div>
                <p>
                    <strong><?php print $title ?></strong>
                    <span><?php print $field_position ?></span>
                </p>
            </article>
        </div>
        <?php endforeach ?>
    </div>
    <!-- owl-carousel -->

</div>
<!-- widget -->