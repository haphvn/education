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
$field_courses = $bean['#entity']->field_courses['und'];
?>

<div class="widget kopa-course-list-3-widget">

    <h4 class="widget-title widget-title-s10"><?php print $title ?></h4>

    <div class="kopa-course-list-table">

        <div class="table-header clearfix">

            <div class="stt-col"><?php print t('ID') ?></div>

            <div class="name-col"><?php print t('Course Name') ?></div>

            <div class="duration-col"><?php print t('Duration') ?></div>

            <div class="date-col"><?php print t('Start Date') ?></div>

        </div>
        <!-- table-header -->

        <ul class="table-list">
            <?php
            foreach ($field_courses as $item) :
                $courses = field_collection_item_load($item['value']);
                $field_id = $courses->field_id['und'][0]['value'];
                $field_course_name = $courses->field_title['und'][0]['value'];
                $field_duration = $courses->field_duration['und'][0]['value'];
                $field_start_date = $courses->field_start_date['und'][0]['value'];
                ?>
                <li class="clearfix">
                    <div class="stt-col"><?php print $field_id ?></div>

                    <div class="name-col"><a href="#"><?php print $field_course_name ?></a></div>

                    <div class="duration-col"><?php print $field_duration ?></div>

                    <div class="date-col"><?php print date('D, M j - Y', $field_start_date) ?></div>
                </li>
            <?php endforeach ?>
        </ul>
        <!-- table-list -->

    </div>
    <!-- kopa-course-list-table -->

</div>
<!-- kopa-course-list-3-widget -->