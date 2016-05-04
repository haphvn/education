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
$field_speakers = $bean['#entity']->field_speakers['und'];
?>

<div class="event-speaker">

    <h6><?php print $title ?></h6>

    <ul class="clearfix">
        <?php
        foreach ($field_speakers as $item) :
            $field_speaker = field_collection_item_load($item['value']);
            $image_speaker = $field_speaker->field_image['und'][0];
            $field_title = $field_speaker->field_title['und'][0]['value'];
            $field_position = $field_speaker->field_position['und'][0]['value'];
            ?>
        <li class="clearfix">
            <div class="speaker-avatar pull-left">
                <a href="#">
                    <?php
                    $image = array(
                        'path' => $image_speaker['uri'],
                        'alt' => $image_speaker['alt'],
                        'title' => $image_speaker['title'],
                        'style_name' => 'speaker__70x70_'
                    );
                    print theme('image_style', $image);
                    ?>
                </a>
            </div>
            <div class="speaker-detail">
                <h6><a href="#"><?php print $field_title ?></a></h6>
                <span><?php print $field_position ?></span>
            </div>
        </li>
        <?php endforeach ?>
    </ul>
</div>
<!-- event-speaker -->