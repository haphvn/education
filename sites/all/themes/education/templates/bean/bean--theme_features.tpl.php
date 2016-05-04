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
$field_theme_features = $bean['#entity']->field_theme_features['und'];
?>

<div class="widget kopa-accordion-1-widget">

    <h4 class="widget-title widget-title-s9"><?php print $title ?></h4>

    <div class="kopa-accordion">
        <div class="panel-group" id="accordion">
            <?php
                $icons = array('One', 'Two', 'Three', 'Four');
                foreach ($field_theme_features as $idx => $value) :
                    $item = field_collection_item_load($value['value']);
                    $field_title = $item->field_title['und'][0]['value'];
                    $field_desc = $item->field_description['und'][0]['value'];
            ?>
            <div class="panel panel-default">
                <div class="panel-heading <?php print ($idx==0) ? 'active' : '' ?>">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $icons[$idx] ?>1">
                            <span class="btn-title"></span>
                            <span class="tab-title"><?php print $field_title ?></span>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?php print $icons[$idx] ?>1" class="panel-collapse collapse <?php print ($idx==0) ? 'in' : '' ?>">
                    <div class="panel-body">
                        <?php print $field_desc ?>
                    </div>
                </div>
            </div>
            <!--/panel panel-default-->
            <?php endforeach ?>
        </div>
    </div>
    <!-- kopa-accordion -->

</div>
<!-- widget -->