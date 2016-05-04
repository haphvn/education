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
$field_featured_courses = $bean['#entity']->field_featured_courses['und'];

$arr_data_term = array();
$arr_data_item = array();
foreach ($field_featured_courses as $key => $value) {
    $item = field_collection_item_load($value['value']);
    $tid = $item->field_courses_category['und'][0]['tid'];
    $term = taxonomy_term_load($tid);
    $arr_data_term[$tid] = (array)$term;
    $arr_data_item[$tid][] = $item;
}
?>

<div class="widget kopa-tab-1-widget">

    <div class="widget-title widget-title-s8 clearfix">

        <i class="fa fa-newspaper-o pull-left"></i>

        <h4 class="pull-left"><?php print $title ?></h4>

    </div>
    <!-- widget-title -->

    <div class="kopa-tab-container-1">

        <ul class="nav nav-tabs kopa-tabs-1">
            <?php
            $i = 0;
            foreach ($arr_data_term as $term_data) :
                ?>
                <li class="<?php print ($i==0) ? 'active' : '' ?>"><a href="#tab1-<?php print $i ?>" data-toggle="tab"><?php print $term_data['name'] ?></a></li>
            <?php
            $i++;
            endforeach;
            ?>
        </ul>
        <!-- nav-tabs -->

        <div class="tab-content">
            <?php
            $j = 0;
            foreach ($arr_data_item as $item_data) :
                $term_desc = $item_data[$j]->field_courses_category['und'][0]['taxonomy_term']->description;
                ?>
                <div class="tab-pane <?php print ($j==0) ? 'active' : '' ?>" id="tab1-<?php print $j ?>">
                    <?php print $term_desc ?>
                    <h5>Featured Courses:</h5>
                    <ul class="toggle-view">
                        <?php
                        foreach ($item_data as $data) :
                            $field_title = $data->field_title['und'][0]['value'];
                            $field_description = $data->field_description['und'][0]['value'];
                        ?>
                            <li class="clearfix">
                                <h6><?php print $field_title ?></h6>
                                <span class="fa fa-plus"></span>
                                <div class="clear"></div>
                                <div class="kopa-panel clearfix">
                                    <?php print $field_description ?>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul><!--end:toggle-view-->
                </div>
                <!-- tab-panel -->
            <?php
            $j++;
            endforeach;
            ?>
        </div>
        <!-- tab-content -->

    </div>
    <!-- kopa-tab-container-1 -->

</div>
<!-- widget -->