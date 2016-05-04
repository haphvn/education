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

$theme_image = drupal_get_path('theme', 'education');
?>

<div class="widget kopa-article-list-1-widget">

    <div class="widget-content">
        <article class="entry-item video-post">
            <div class="entry-thumb">
                <div class="mask"></div>
                <img src="<?php print $theme_image ?>/placeholders/post-image/post-3.jpg" alt="" />
                <h6 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h6>
                <a href="<?php print url('node/'.$nid) ?>" class="entry-icon"><span></span></a>
            </div>
            <div class="entry-content">

                <header class="clearfix">
                    <span class="entry-time pull-left">At <?php print date('g:i a', $date) ?></span>
                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                    <span class="entry-author pull-left"><a href="#">Steven Granger</a></span>
                </header>

                <p><?php print sub_str_words($desc, 135) ?></p>

                <a href="<?php print url('node/'.$nid) ?>" class="more-link clearfix"><span class="pull-left">Read more</span><i class="fa fa-angle-right pull-left"></i></a>
            </div>
        </article>
    </div>

</div>
<!-- kopa-article-list-1-widget -->