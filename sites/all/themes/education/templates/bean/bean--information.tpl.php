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
$field_start_date = $bean['field_start_date']['#items'][0]['value'];
$field_end_date = $bean['field_end_date']['#items'][0]['value'];
$field_location = $bean['field_location']['#items'][0]['value'];
$field_phone = $bean['field_phone']['#items'][0]['value'];
$field_email = $bean['field_email']['#items'][0]['email'];
?>
<div class="event-detail">
    <ul class="clearfix">
        <li>
            <strong>Start</strong>
            <span><?php print date('g:i A - M j Y', $field_start_date) ?></span>
        </li>
        <li>
            <strong>End</strong>
            <span><?php print date('g:i A - M j Y', $field_end_date) ?></span>
        </li>
        <li>
            <i class="fa fa-map-marker"></i>
            <span><?php print $field_location ?></span>
        </li>
        <li>
            <i class="fa fa-phone"></i>
            <span><?php print $field_phone ?></span>
        </li>
        <li>
            <i class="fa fa-envelope"></i>
            <a href="mailto:<?php print $field_email ?>"><?php print $field_email ?></a>
        </li>
    </ul>

</div>
<!-- event-detail -->
