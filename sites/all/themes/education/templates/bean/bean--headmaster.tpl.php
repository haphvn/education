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
$desc = $bean['#entity']->field_description['und'][0]['value'];
$field_image = $bean['#entity']->field_image['und'][0];
$link = $bean['#entity']->field_link['und'][0];
$position = $bean['#entity']->field_position['und'][0]['value'];
?>

<div class="widget kopa-featured-teacher-widget">

    <div class="widget-title widget-title-s7 clearfix">
        <i class="fa fa-quote-left pull-left"></i>
        <h4 class="pull-left"><?php print $title ?></h4>
    </div>

    <div class="widget-content">
        <article class="entry-item">
            <div class="entry-thumb">
                <a href="#">
                    <?php
                    $image = array(
                        'path' => $field_image['uri'],
                        'alt' => $field_image['alt'],
                        'title' => $field_image['title'],
                        'style_name' => 'headmaster__195x140_'
                    );
                    print theme('image_style', $image);
                    ?>
                </a>
            </div>
            <div class="entry-content">
                <p><?php print $desc ?></p>
                <footer>
                    <h6><a href="<?php print $link['url'] ?>"><?php print $link['title'] ?></a></h6>
                    <span><?php print $position ?></span>
                </footer>
            </div>
        </article>
    </div>
    <!-- widget-content -->

</div>
<!-- widget -->