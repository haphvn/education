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
$link = $bean['#entity']->field_link['und'][0];
$desc = $bean['#entity']->field_description['und'][0]['value'];
?>

<section class="kopa-area-16 kopa-area-parallax">

    <div class="mask"></div>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="widget kopa-tagline-1-widget">

                    <h3><?php print $desc ?></h3>

                    <a href="<?php print $link['url'] ?>" class="kopa-button kopa-line-button medium-button"><?php print $link['title'] ?></a>

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-16 -->