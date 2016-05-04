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
$field_image = $bean['#entity']->field_image['und'][0];
$link = $bean['#entity']->field_link['und'][0];
$desc = $bean['#entity']->field_description['und'][0]['value'];
$icon = $bean['#entity']->field_icon['und'][0]['value'];
?>

<section class="kopa-area kopa-area-3 kopa-area-parallax">

    <div class="span-bg"></div>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="widget kopa-rounded-thumb-2-widget">

                    <div class="widget-content">

                        <article class="entry-item clearfix">

                            <div class="entry-thumb pull-right">

                                <a href="#">
                                    <?php
                                    $image = array(
                                        'path' => $field_image['uri'],
                                        'alt' => $field_image['alt'],
                                        'title' => $field_image['title'],
                                        'style_name' => 'plan_ahead_1__654x649_'
                                    );
                                    print theme('image_style', $image);
                                    ?>
                                </a>

                            </div>
                            <!-- entry-thumb -->

                            <div class="entry-content">

                                <h2 class="entry-title"><a href="#"><?php print $title ?></a></h2>

                                <p><?php print $desc ?></p>

                                <a href="<?php print $link['url'] ?>" class="kopa-button <?php print $icon ?> medium-button"><?php print $link['title'] ?></a>

                            </div>
                            <!-- entry-content -->

                        </article>
                        <!-- entry-item -->

                    </div>
                    <!-- widget-content -->

                </div>
                <!-- kopa-rounded-thumb-widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-3 -->