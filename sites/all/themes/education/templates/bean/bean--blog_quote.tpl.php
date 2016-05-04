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

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$desc = $bean['#entity']->field_description['und'][0]['value'];
$position = $bean['#entity']->field_position['und'][0]['value'];

?>

<article class="entry-item quote-post">

    <div class="entry-thumb">

        <blockquote class="kopa-blockquote-1">
            <p class="clearfix"><i class="fa fa-quote-left"></i><?php print $desc ?></p>
            <h4><?php print $title ?></h4>
            <span><?php print $position ?></span>
        </blockquote>

    </div>
    <!-- entry-thumb -->

</article>
<!-- entry-item -->