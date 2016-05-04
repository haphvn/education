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
$field_our_teams = $bean['#entity']->field_our_team['und'];
?>

<section class="kopa-area kopa-area-light">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="widget kopa-owl-5-widget">

                    <h4 class="widget-title widget-title-s9"><?php print $title ?></h4>

                    <div class="widget-content">

                        <div class="owl-carousel owl-carousel-5">
                            <?php
                            foreach ($field_our_teams as $item) :
                                $field_our_team = field_collection_item_load($item['value']);
                                $image_member = $field_our_team->field_image['und'][0];
                                $name_member = $field_our_team->field_title['und'][0]['value'];
                                $position_member = $field_our_team->field_position['und'][0]['value'];
                                $desc_member = $field_our_team->field_description['und'][0]['value'];
                                $field_links = $field_our_team->field_links['und'];
                                ?>
                                <div class="item">

                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <?php
                                            $image = array(
                                                'path' => $image_member['uri'],
                                                'alt' => $image_member['alt'],
                                                'title' => $image_member['title'],
                                                'style_name' => 'our_team__255x255_'
                                            );
                                            print theme('image_style', $image);
                                            ?>
                                        </div>
                                        <div class="entry-content">
                                            <header>
                                                <h4 class="entry-title"><a href="#"><?php print $name_member ?></a></h4>
                                                <span><?php print $position_member ?></span>
                                            </header>
                                            <p><?php print $desc_member ?></p>
                                            <ul class="social-links clearfix">
                                                <?php
                                                foreach ($field_links as $link) :
                                                    $str_replace = preg_replace('/\s+/', '-', $link['title']);
                                                ?>
                                                <li><a href="<?php print $link['url'] ?>" class="fa fa-<?php print strtolower($str_replace) ?>"></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </article>

                                </div>
                                <!-- item -->
                            <?php endforeach ?>
                        </div>
                        <!-- owl-carousel -->

                    </div>

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area -->