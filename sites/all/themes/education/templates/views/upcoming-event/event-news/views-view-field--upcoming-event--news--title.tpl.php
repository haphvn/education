<?php

/**
 * @file
 */

$nid = $row->nid;
$title = $row->node_title;
$desc = $row->field_field_description[0]['raw']['value'];
$date = $row->field_field_date[0]['raw']['value'];

?>

<div class="col-md-6 col-sm-6 col-xs-12">

    <article class="entry-item clearfix">

        <div class="entry-date pull-left">
            <p><?php print date('D', $date) ?></p>
            <strong><?php print date('d', $date) ?></strong>
            <span><?php print date('M', $date) ?></span>
        </div>

        <div class="entry-content">

            <header class="clearfix">
                <span class="entry-time pull-left">At <?php print date('g:i a', $date) ?></span>
                <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                <span class="entry-author pull-left"><a href="#">Steven Granger</a></span>
            </header>

            <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>

            <p><?php print $desc ?></p>
        </div>

    </article>

</div>
<!-- col-md-6 -->