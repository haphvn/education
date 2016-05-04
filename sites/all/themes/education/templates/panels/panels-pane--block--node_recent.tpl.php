<?php
/**
 * @file
 * Returns the HTML for a Panels pane.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/2052505
 */

$theme_image = drupal_get_path('theme', 'education');
$number = variable_get('node_recent_block_count');
$nodes = node_get_recent($number);
?>
<?php print $admin_links; ?>

<div class="widget kopa-article-list-8-widget">

    <h4 class="widget-title widget-title-s10"><?php print $title; ?></h4>

    <ul class="clearfix">
        <?php
        foreach ($nodes as $node) :
        ?>
        <li>
            <article class="entry-item clearfix">
                <div class="entry-thumb pull-left">
                    <a href="<?php print url('node/'.$node->nid) ?>">
                        <?php
                        if (isset($node->field_image)) {
                        ?>
                            <?php
                            $field_image = $node->field_image['und'][0];
                            $image = array(
                                'path' => $field_image['uri'],
                                'alt' => $field_image['alt'],
                                'title' => $field_image['title'],
                                'style_name' => 'recent_posts__84x70_'
                            );
                            print theme('image_style', $image);
                            ?>
                        <?php } else { ?>
                            <img src="<?php print $theme_image ?>/placeholders/post-image/post-41.jpg" alt="">
                        <?php } ?>
                    </a>
                </div>
                <div class="entry-content">
                    <h6 class="entry-title"><a href="<?php print url('node/'.$node->nid) ?>"><?php print $node->title ?></a></h6>
                    <div class="meta-box clearfix">
                        <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>
                        <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                        <span class="entry-date pull-left"><?php print date('j M Y', $node->created) ?></span>
                    </div>
                </div>
            </article>
            <!-- entry-item -->
        </li>
        <?php endforeach ?>
    </ul>

</div>
<!-- widget -->