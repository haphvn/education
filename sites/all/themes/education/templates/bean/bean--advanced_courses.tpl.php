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
$link = $bean['#entity']->field_link['und'][0];
$duration = $bean['#entity']->field_duration['und'][0]['value'];
$level = $bean['#entity']->field_level['und'][0]['value'];
$field_image = $bean['#entity']->field_image['und'][0];
?>

<section class="kopa-area-18 kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="widget kopa-article-list-6-widget">

                    <article class="entry-item row">
                        <div class="col-md-4 col-sm-4 col-xs-12 entry-thumb">
                            <a href="#">
                                <?php
                                $image = array(
                                    'path' => $field_image['uri'],
                                    'alt' => $field_image['alt'],
                                    'title' => $field_image['title'],
                                    'style_name' => 'advanced_courses__350x426_'
                                );
                                print theme('image_style', $image);
                                ?>
                            </a>
                        </div>
                        <!-- entry-thumb -->
                        <div class="col-md-7 col-sm-7 col-xs-12 entry-content">
                            <h4 class="entry-title"><a href="#"><?php print $title ?></a></h4>
                            <p><?php print $desc ?></p>
                            <ul>
                                <li class="clearfix">
                                    <i class="fa fa-book pull-left"></i>
                                    <h6 class="pull-left">Course duration:</h6>
                                    <span class="pull-left"><?php print $duration ?></span>
                                </li>
                                <li class="clearfix">
                                    <i class="fa fa-lightbulb-o pull-left"></i>
                                    <h6 class="pull-left">Study level:</h6>
                                    <span class="pull-left"><?php print $level ?></span>
                                </li>
                            </ul>
                            <a class="kopa-button pink-button kopa-button-icon small-button" href="<?php print $link['url'] ?>"><?php print $link['title'] ?></a>
                        </div>
                        <!-- entry-content -->
                    </article>

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-18 -->