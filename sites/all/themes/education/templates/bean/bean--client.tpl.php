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
$field_partners = $bean['#entity']->field_partner['und'];
?>

<section class="kopa-area-light kopa-area-8">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="widget kopa-ads-1-widget">

                    <ul class="clearfix">
                        <?php
                        foreach ($field_partners as $item) :
                            $field_partner = field_collection_item_load($item['value']);
                            $image_partner = $field_partner->field_image['und'][0];
                            $link = $field_partner->field_link['und'][0];
                            ?>
                            <li>
                                <a href="<?php print $link['url'] ?>">
                                    <?php
                                    $image = array(
                                        'path' => $image_partner['uri'],
                                        'alt' => $image_partner['alt'],
                                        'title' => $image_partner['title'],
                                        'style_name' => 'partner__200x94_'
                                    );
                                    print theme('image_style', $image);
                                    ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>

                </div>
                <!-- widget -->

            </div>

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-light -->