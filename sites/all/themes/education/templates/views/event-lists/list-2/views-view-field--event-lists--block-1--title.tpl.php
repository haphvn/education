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
$desc = $row->field_field_description[0]['raw']['value'];
$date = $row->field_field_date[0]['raw']['value'];
$field_image = $row->field_field_image[0]['raw'];
?>

<article class="entry-item clearfix">
    <div class="entry-thumb">
        <a href="#">
            <?php
            $image = array(
                'path' => $field_image['uri'],
                'alt' => $field_image['alt'],
                'title' => $field_image['title'],
                'style_name' => 'event_list_1__398x230'
            );
            print theme('image_style', $image);
            ?>
        </a>
        <div class="mask"></div>
        <div class="entry-date pull-left">
            <p><?php print date('D', $date) ?></p>
            <strong><?php print date('d', $date) ?></strong>
            <span><?php print date('M', $date) ?></span>
        </div>
    </div>
    <div class="entry-content clearfix">

        <header class="clearfix">
            <span class="entry-author pull-left"><a href="#">Admin</a></span>
            <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
            <span class="entry-categories clearfix pull-left"><a href="#" class="pull-left">Photographic</a><span class="pull-left">,&nbsp;</span><a href="#" class="pull-left">Design</a></span>
        </header>

        <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>

        <span class="free-item">Free</span>

        <p><?php print $desc ?></p>

        <span class="entry-date clearfix">
            <i class="fa fa-calendar pull-left"></i>
            <span class="pull-left">8:00 AM - Dec 25 2014</span>
        </span>
        <span class="entry-location clearfix">
            <i class="fa fa-map-marker pull-left"></i>
            <span class="pull-left">Bentley Campus, Perth, WA</span>
        </span>

    </div>
</article>