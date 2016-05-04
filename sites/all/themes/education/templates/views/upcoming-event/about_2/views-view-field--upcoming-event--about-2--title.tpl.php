<?php
global $base_url;

$nid = $row->nid;
$title = $row->node_title;
$desc = $row->field_field_description[0]['raw']['value'];
$date = $row->field_field_date[0]['raw']['value'];
$link = $row->field_field_link[0]['raw'];
?>

<li>
    <article class="entry-item">

        <header class="clearfix">
            <span class="entry-time pull-left">At <?php print date('g:i a', $date) ?></span>
            <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
            <span class="entry-author pull-left"><a href="<?php print $link['url'] ?>"><?php print $link['title'] ?></a></span>
        </header>

        <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>

    </article>
</li>