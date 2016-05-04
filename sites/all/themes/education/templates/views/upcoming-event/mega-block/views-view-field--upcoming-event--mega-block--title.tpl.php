<?php

/**
 * @file
 */

global $base_url;

$nid = $row->nid;
$title = $row->node_title;
$desc = $row->field_field_description[0]['raw']['value'];
$date = $row->field_field_date[0]['raw']['value'];
$field_image = $row->field_field_avatar[0]['raw'];

?>

<div class="col-md-6 col-sm-6 col-xs-12">
    <article class="entry-item">
        <div class="entry-thumb">
            <div class="mask"></div>
            <a href="#">
                <?php
                $image = array(
                    'path' => $field_image['uri'],
                    'alt' => $field_image['alt'],
                    'title' => $field_image['title'],
                    'style_name' => 'mega_event_news__335x210_'
                );
                print theme('image_style', $image);
                ?>
            </a>
            <div class="entry-date">
                <p><?php print date('D', $date) ?></p>
                <strong><?php print date('d', $date) ?></strong>
                <span><?php print date('M', $date) ?></span>
            </div>
        </div>
        <div class="entry-content">
            <span class="entry-author"><a href="#">Steven Granger</a></span>
            <h6 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h6>
        </div>
    </article>
</div>