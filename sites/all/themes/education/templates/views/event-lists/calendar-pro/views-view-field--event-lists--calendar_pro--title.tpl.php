<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */

$nid = $row->nid;
$title = $row->node_title;
$date = $row->field_field_date[0]['raw']['value'];
?>

<li>
    <div class="meta-box clearfix">
        <span class="entry-date pull-left"><?php print date('M d, Y', $date) ?></span>
        <span class="entry-meta pull-left">&nbsp;-&nbsp;</span>
        <span class="entry-categories pull-left"><a href="#">Courses</a></span>
    </div>
    <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>
</li>