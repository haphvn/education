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
$field_image = $bean['#entity']->field_image['und'][0];
$link = $bean['#entity']->field_link['und'][0];
?>

<div class="widget kopa-article-list-7-widget">

    <article class="entry-item video-post">
        <div class="entry-thumb">
            <?php
            $image = array(
                'path' => $field_image['uri'],
                'alt' => $field_image['alt'],
                'title' => $field_image['title'],
                'style_name' => 'advertising__825x155_'
            );
            print theme('image_style', $image);
            ?>
            <div class="mask"></div>
        </div>

        <h4 class="entry-title"><a href="<?php print $link['url'] ?>"><?php print $link['title'] ?></a></h4>
        <a class="entry-icon" href="#"><span></span></a>
    </article>

</div>
<!-- widget -->