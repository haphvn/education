<?php
/**
 * Created by haph on 12/18/15
 */

?>

<div class="widget kopa-article-list-8-widget">

<!--    <h4 class="widget-title widget-title-s10">--><?php //print t('Recent Posts') ?><!--</h4>-->

    <ul class="clearfix">
        <?php
        foreach ($nodes as $node) :
            $date = field_get_items('node', $node, 'field_date');
            $field_image = field_get_items('node', $node, 'field_image');
        ?>
        <li>
            <article class="entry-item clearfix">
                <div class="entry-thumb pull-left">
                    <a href="<?php print url('node/'.$node->nid) ?>">
                        <?php
                        $image = array(
                            'path' => $field_image[0]['uri'],
                            'alt' => $field_image[0]['alt'],
                            'title' => $field_image[0]['title'],
                            'style_name' => 'recent_posts__84x70_'
                        );
                        print theme('image_style', $image);
                        ?>
                    </a>
                </div>
                <div class="entry-content">
                    <h6 class="entry-title"><a href="<?php print url('node/'.$node->nid) ?>"><?php print $node->title ?></a></h6>
                    <div class="meta-box clearfix">
                        <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>
                        <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                        <span class="entry-date pull-left"><?php print date('M j, Y', $date[0]['value']) ?></span>
                    </div>
                </div>
            </article>
            <!-- entry-item -->
        </li>
        <?php endforeach ?>
    </ul>

</div>
<!-- widget -->