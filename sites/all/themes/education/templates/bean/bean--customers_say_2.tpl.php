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
$field_customers_say = $bean['#entity']->field_customers_say['und'];
?>

<section class="kopa-area kopa-area-21 kopa-area-parallax">

    <div class="mask"></div>

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="widget kopa-testimonial-2-widget">

                    <div class="widget-title widget-title-s5 text-center">
                        <span></span>
                        <h2><?php print $title ?></h2>
                        <p><?php print $desc ?></p>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content">

                        <div class="text-center"><i class="fa fa-quote-left"></i></div>

                        <div class="owl-carousel owl-carousel-9">
                            <?php
                            foreach ($field_customers_say as $value) :
                            $item = field_collection_item_load($value['value']);
                            $title = $item->field_title['und'][0]['value'];
                            $desc_field = $item->field_description['und'][0]['value'];
                            $field_image = $item->field_image['und'][0];
                            $position = $item->field_position['und'][0]['value'];
                            ?>
                            <div class="item">
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb pull-left">
                                        <a href="#">
                                            <?php
                                            $image = array(
                                                'path' => $field_image['uri'],
                                                'alt' => $field_image['alt'],
                                                'title' => $field_image['title'],
                                                'style_name' => 'customers_avatar__210x210_'
                                            );
                                            print theme('image_style', $image);
                                            ?>
                                        </a>
                                    </div>
                                    <div class="entry-content">
                                        <header>
                                            <h3 class="entry-title"><a href="#"><?php print $title ?></a></h3>
                                            <span><?php print $position ?></span>
                                        </header>
                                        <p><?php print $desc_field ?></p>
                                    </div>
                                </article>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <!-- owl-carousel -->

                    </div>
                    <!-- widget-content -->

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-7 -->