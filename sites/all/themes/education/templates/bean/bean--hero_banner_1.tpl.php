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
$image = $bean['#entity']->field_image['und'][0];
$title = $bean['#entity']->title;
$desc = ($bean['#entity']->field_description) ? $bean['#entity']->field_description['und'][0]['value'] : '';
?>

<header class="page-header">

    <div class="mask-pattern"></div>

    <div class="mask"></div>

    <?php echo theme('image_style', array('style_name' => 'hero_banner__1960x330_', 'path' => $image['uri'], 'title' => $image['title'], 'alt' => $image['alt'], 'attributes' => array('class' => 'page-header-bg page-header-bg-1'))) ?>

    <div class="page-header-inner">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1 class="page-title clearfix">
                        <span class="pull-left"><?php print $title ?></span>
                        <i class="pull-left"><?php print $desc ?></i>
                    </h1>

                </div>
                <!-- col-md-12 -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- page-header-inner -->

</header>
<!-- page-header -->
