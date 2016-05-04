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
$field_image = $row->field_field_image[0]['raw'];
?>

<div class="item">

    <article class="entry-item">
        <div class="entry-thumb">
            <?php
            $image = array(
                'path' => $field_image['uri'],
                'alt' => $field_image['alt'],
                'title' => $field_image['title'],
                'style_name' => 'course_list__255x180_'
            );
            print theme('image_style', $image);
            ?>
            <div class="mask">
                <div class="click-box">
                    <a href="#" class="portfolio-link fa fa-link"></a>
                    <a href="#" class="portfolio-like fa fa-heart"></a>
                    <a href="<?php print file_create_url($field_image['uri']) ?>" class="portfolio-gallery fa fa-search popup-icon"></a>
                </div>
            </div>
        </div>
        <div class="entry-content">
            <header class="text-center">
                <span class="entry-categories">
                    <a href="#">Travel</a>
                    <span>,&nbsp;</span>
                    <a href="#">Photography</a>
                </span>
            </header>
            <h6 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h6>
        </div>
    </article>
    <!-- entry-item -->

</div>
<!-- item -->
