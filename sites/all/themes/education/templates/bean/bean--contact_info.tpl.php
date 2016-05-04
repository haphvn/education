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
$email = $bean['#entity']->field_email['und'][0]['email'];
$phone = $bean['#entity']->field_phone['und'][0]['value'];
$addr = $bean['#entity']->field_location['und'][0]['value'];

$location = _get_location_from_google_maps($addr);
?>

<section class="kopa-area kopa-area-parallax kopa-area-24">

    <div class="mask"></div>

    <div class="container">

        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">

                <div class="widget kopa-contact-2-widget">

                    <h2 class="widget-title widget-title-s12"><?php print $title ?></h2>

                    <div class="widget-content">

                        <p class="contact-address">
                            <i class="fa fa-map-marker"></i>
                            <span><?php print $addr ?></span>
                        </p>

                        <p class="contact-mail">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:<?php print $email ?>"><?php print $email ?></a>
                        </p>
                        <p class="contact-phone">
                            <i class="fa fa-phone"></i>
                            <?php $string = str_replace(' ', '', $phone); ?>
                            <a href="callto:<?php print $string ?>"><?php print $phone ?></a>
                        </p>

                    </div>
                    <!-- widget-content -->

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-4 -->

            <div class="col-md-8 col-sm-8 col-xs-12">

                <div class="widget kopa-map-2-widget">

                    <div class="kopa-map-wrapper">
                        <div id="kopa-map" class="kopa-map" data-place="<?php print $location['place'] ?>" data-latitude="<?php print $location['lat'] ?>" data-longitude="<?php print $location['lng'] ?>"></div>
                    </div>
                    <!-- kopa-map-wrapper -->

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-8 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-24 -->