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
$field_documents = $bean['#entity']->field_document['und'];
?>

<section class="kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="widget kopa-document-widget">

                    <div class="masonry-list-wrapper">

                        <ul class="clearfix">
                            <?php
                            foreach ($field_documents as $item) :
                                $field_document = field_collection_item_load($item['value']);
                                $document_title = $field_document->field_title['und'][0]['value'];
                                $document_link = $field_document->field_links['und'];
                                ?>

                                <li class="masonry-item">

                                    <article class="document-block">
                                        <header class="clearfix">
                                            <i class="fa fa-folder-open pull-left"></i>
                                            <h5 class="pull-left"><?php print $document_title ?></h5>
                                        </header>
                                        <ul class="clearfix">
                                            <?php foreach ($document_link as $links) : ?>
                                                <li><a href="<?php print $links['url'] ?>"><?php print $links['title'] ?></a></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </article>
                                    <!-- document-block -->

                                </li>

                            <?php endforeach ?>
                        </ul>

                    </div>
                    <!-- masonry-list-wrapper -->

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