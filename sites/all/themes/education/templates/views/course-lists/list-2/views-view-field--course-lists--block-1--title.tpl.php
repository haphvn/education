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
$field_teacher = $row->field_field_teacher[0]['raw']['value'];
$date = isset($row->field_field_date) ? $row->field_field_date[0]['raw']['value'] : '';
$hot_item = (count($row->field_field_hot_item) > 0) ? $row->field_field_hot_item[0]['raw']['value'] : 0;
?>

<li class="masonry-item">
    <article class="entry-item <?php print ($hot_item == 1) ? 'hot-item' : '' ?>">
        <div class="entry-thumb">
            <div class="mask"></div>
            <a href="#">
                <?php
                $image = array(
                    'path' => $field_image['uri'],
                    'alt' => $field_image['alt'],
                    'title' => $field_image['title'],
                    'style_name' => 'course_list_2__350x260_'
                );
                print theme('image_style', $image);
                ?>
            </a>
            <?php print ($hot_item == 1) ? '<span class="entry-hot">Hot</span>' : '' ?>
        </div>
        <div class="entry-content">
            <header class="clearfix">
                <span class="entry-time pull-left">At <?php print !empty($date) ? date('g:i a', $date) : '' ?></span>
                <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                <span class="entry-author pull-left"><a href="#"><?php print $field_teacher ?></a></span>
            </header>
            <h6 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h6>
            <footer class="clearfix">
                <div class="price-box pull-left">
                    <span>From</span>
                    <ins>$980</ins>
                </div>
                <ul class="kopa-rating pull-right clearfix">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star-o"></i></li>
                </ul>
            </footer>
        </div>
    </article>
</li>
<!-- masonry-item -->