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
$field_building_courses = $bean['#entity']->field_building_courses['und'];
?>

<section class="kopa-area kopa-area-15">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="widget kopa-service-1-widget">

                    <div class="widget-title widget-title-s5 text-center">
                        <span></span>
                        <h2><?php print $title ?></h2>
                        <p><?php print $desc ?></p>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content">

                        <div class="row">
                            <?php
                            $array = array('mobile-phone', 'mortar-board', 'lightbulb-o');
                            foreach ($field_building_courses as $idx => $value) :
                                $item = field_collection_item_load($value['value']);
                                $link = $item->field_link['und'][0];
                                $desc_field = $item->field_description['und'][0]['value'];
                                $title_field = $item->field_title['und'][0]['value'];
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <article class="entry-item clearfix">
                                    <i class="fa fa-<?php print $array[$idx] ?> pull-left"></i>
                                    <div class="entry-content">
                                        <h5 class="entry-title"><a href="<?php print $link['url'] ?>"><?php print $title_field ?></a></h5>
                                        <p><?php print $desc_field ?></p>
                                        <a class="more-link clearfix" href="<?php print $link['url'] ?>"><span class="pull-left"><?php print $link['title'] ?></span><i class="fa fa-angle-right pull-left"></i></a>
                                    </div>
                                </article>
                            </div>
                            <!-- col-md-4 -->
                            <?php endforeach ?>
                        </div>
                        <!-- row -->

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
<!-- kopa-area-15 -->