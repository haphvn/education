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
$field_our_teams = $bean['#entity']->field_our_team['und'];
?>

<div class="widget kopa-ourteam-widget">

    <h4 class="widget-title widget-title-s9"><?php print $title ?></h4>

    <div class="widget-content">

        <ul class="clearfix">
            <?php
            foreach ($field_our_teams as $item) :
            $field_our_team = field_collection_item_load($item['value']);
            $image_member = $field_our_team->field_image['und'][0];
            $name_member = $field_our_team->field_title['und'][0]['value'];
            $position_member = $field_our_team->field_position['und'][0]['value'];
            $desc_member = $field_our_team->field_description['und'][0]['value'];
            ?>
            <li>
                <article class="entry-item clearfix">
                    <div class="entry-thumb pull-left">
                        <a href="#">
                            <?php
                            $image = array(
                                'path' => $image_member['uri'],
                                'alt' => $image_member['alt'],
                                'title' => $image_member['title'],
                                'style_name' => 'meet_our_team__120x120'
                            );
                            print theme('image_style', $image);
                            ?>
                        </a>
                    </div>
                    <div class="entry-content">
                        <header>
                            <h5 class="entry-title"><a href="#"><?php print $name_member ?></a></h5>

                            <span><?php print $position_member ?></span>
                        </header>
                        <p><?php print $desc_member ?></p>
                    </div>
                </article>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
    <!-- widget-content -->

</div>
<!-- widget -->