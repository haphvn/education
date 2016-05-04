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
$field_slideshow = $bean['#entity']->field_slideshow['und'];
?>

<section class="container-fluid">

    <div class="home-slider home-slider-1">

        <div class="owl-carousel owl-carousel-1">
            <?php
            foreach ($field_slideshow as $value) :
                $item = field_collection_item_load($value['value']);
                $title = $item->field_title['und'][0]['value'];
                $desc = $item->field_description['und'][0]['value'];
                $field_image = $item->field_image['und'][0];
                $link = $item->field_link['und'][0];
            ?>
            <div class="item">

                <article class="entry-item">
                    <div class="entry-thumb">
                        <?php
                        $image = array(
                            'path' => $field_image['uri'],
                            'alt' => $field_image['alt'],
                            'title' => $field_image['title'],
                            'style_name' => 'slideshow__1366x602_'
                        );
                        print theme('image_style', $image);
                        ?>
                        <div class="mask"></div>
                    </div>
                    <div class="entry-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 left-col">
                                    <h2><a href="#"><?php print $title ?></a></h2>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 right-col">
                                    <p><?php print $desc ?></p>
                                    <a href="<?php print $link['url'] ?>" class="kopa-button pink-button medium-button"><?php print $link['title'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- entry-item -->

            </div>
            <!-- item -->
            <?php endforeach ?>
        </div>
        <!-- owl-carousel-1 -->

        <div class="loading">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- loading -->

    </div>
    <!-- home-slider -->

</section>
<!-- container-fluid -->

