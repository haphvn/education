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
$field_falcuty_carousel = $bean['#entity']->field_falcuty_carousel['und'];

?>

<div class="widget kopa-owl-6-widget">

    <div class="owl-carousel owl-carousel-8">

        <?php
        foreach ($field_falcuty_carousel as $item) :
            $field_carousel = field_collection_item_load($item['value']);
            $image_carousel = $field_carousel->field_image['und'][0];
            $link = $field_carousel->field_link['und'][0];
            ?>
            <div class="item">
                <article class="entry-item">
                    <div class="entry-thumb">
                        <a href="<?php print $link['url'] ?>">
                            <?php
                            $image = array(
                                'path' => $image_carousel['uri'],
                                'alt' => $image_carousel['alt'],
                                'title' => $image_carousel['title'],
                                'style_name' => 'faculty_carousel__825x410_'
                            );
                            print theme('image_style', $image);
                            ?>
                        </a>
                        <div class="mask"></div>
                    </div>
                    <h4 class="entry-title"><a href="<?php print $link['url'] ?>"><?php print $link['title'] ?></a></h4>
                </article>
            </div>
        <?php endforeach ?>

    </div>
    <!-- owl-carousel -->

</div>
<!-- widget -->