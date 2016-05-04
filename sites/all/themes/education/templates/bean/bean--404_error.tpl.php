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
$desc = $bean['#entity']->field_description['und'][0]['value'];

$theme_image = drupal_get_path('theme', 'education');
?>

<section class="kopa-area kopa-area-parallax kopa-area-404">

    <div class="mask"></div>

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="kopa-404-error text-center">

                    <div>
                        <i class="fa fa-mortar-board"></i>
                        <h2><img src="<?php print $base_url .'/'. $theme_image ?>/images/icons/404.png" alt=""></h2>
                        <h3><?php print $title ?></h3>
                        <span><?php print $desc ?></span>
                    </div>

                    <div class="search-box clearfix">
                        <form action="#" class="search-form clearfix" id="search-form" method="get">
                            <input type="text" onBlur="if (this.value == '')
                                        this.value = this.defaultValue;" onFocus="if (this.value == this.defaultValue)
                                        this.value = '';" value="Insert keyword & hit enter" name="s" class="search-text">
                        </form><!-- search-form -->
                    </div><!--end:search-box-->

                    <a href="<?php print $base_url ?>" class="kopa-button pink-button kopa-button-icon small-button">Go to home page</a>

                </div>
                <!-- kopa-404-error -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area -->