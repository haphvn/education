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
$field_life_in_upside = $bean['#entity']->field_life_in_upside['und'];
?>

<section class="kopa-area kopa-area-6">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="widget kopa-masonry-list-1-widget">

                    <div class="widget-title widget-title-s5 text-center">
                        <span></span>
                        <h2><?php print $title ?></h2>
                        <p><?php print $desc ?></p>
                    </div>

                    <div class="masonry-container">

                        <div class="container-masonry clearfix">
                            <?php
                            foreach ($field_life_in_upside as $value) :
                                $item = field_collection_item_load($value['value']);
                                $field_image = $item->field_image['und'][0];
                                $link = $item->field_link['und'][0];
                            ?>
                            <div class="item">
                                <?php
                                $image = array(
                                    'path' => $field_image['uri'],
                                    'alt' => $field_image['alt'],
                                    'title' => $field_image['title'],
                                    'style_name' => 'life_in_upside__278x278_'
                                );
                                print theme('image_style', $image);
                                ?>
                                <div class="mask"><a href="<?php print $link['url'] ?>"></a></div>
                                <h6 class="entry-title"><?php print $link['title'] ?></h6>
                                <div class="item-hover">
                                    <i class="fa fa-pencil"></i>
                                    <p class="text-center"><a href="<?php print $link['url'] ?>"><?php print $link['title'] ?></a></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>

                    </div>
                    <!-- masonry-container -->

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-6 -->