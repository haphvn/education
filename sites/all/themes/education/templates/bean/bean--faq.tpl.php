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

drupal_add_js(
    'jQuery(document).ready(function () {
        $(\'.faq-filter li a\').click(function() {
            // fetch the class of the clicked item
            var ourClass = $(this).attr(\'class\');

            // reset the active class on all the buttons
            $(\'.faq-filter li\').removeClass(\'current\');
            // update the active state on our clicked button
            $(this).parent().addClass(\'current\');

            if(ourClass == \'all\') {
                // show all our items
                $(\'.panel-group\').children(\'div.panel\').show();
            }
            else {
                // hide all elements that don\'t share ourClass
                $(\'.panel-group\').children(\'div:not(.\' + ourClass + \')\').hide();
                // show all elements that do share ourClass
                $(\'.panel-group\').children(\'div.\' + ourClass).show();
            }
            return false;
        });
    });',
    array(
        'type' => 'inline',
        'group' => JS_THEME,
        'weight' => 5,
    )
);

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$field_faq = $bean['#entity']->field_faq['und'];
?>

<section class="kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="kopa-faq-section">

                    <div class="faq-filter clearfix">

                        <span class="filter-label pull-left"><?php print t("Sort by:") ?></span>

                        <ul class="pull-left clearfix">
                            <li class="current"><a href="#" class="all">All</a></li>
                            <?php
                            $name = 'faq';
                            $vocal = taxonomy_vocabulary_machine_name_load($name);
                            $tree = taxonomy_get_tree($vocal->vid);
                            foreach ($tree as $term) :
                                ?>
                                <li><a href="#" class="<?php print $term->tid ?>"><?php print $term->name ?></a></li>
                            <?php endforeach ?>
                        </ul>

                    </div>
                    <!-- faq-filter -->

                    <div class="kopa-accordion">
                        <div class="panel-group" id="accordion">
                            <?php
                            $icons = array('One', 'Two', 'Three', 'Four', 'Five');
                            foreach ($field_faq as $idx => $value) :
                                $item = field_collection_item_load($value['value']);
                                $question = $item->field_question['und'][0]['value'];
                                $answer = $item->field_answer['und'][0]['value'];
                                $tid2 = $item->field_category['und'][0]['tid'];
                                ?>
                                <div class="panel panel-default <?php print $tid2 ?>">
                                    <div class="panel-heading active">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $icons[$idx] ?>1">
                                                <span class="btn-title"></span>
                                                <span class="tab-title"><?php print $question ?></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php print $icons[$idx] ?>1" class="panel-collapse collapse <?php print ($idx==0) ? 'in' : '' ?>">
                                        <div class="panel-body">
                                            <?php print $answer ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/panel panel-default-->
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- kopa-accordion -->

                </div>
                <!-- kopa-faq-section -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area -->