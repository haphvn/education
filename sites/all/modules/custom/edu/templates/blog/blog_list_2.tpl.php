<?php
/**
 * Created by haph on 12/17/15
 */

?>

<div class="widget kopa-blog-list-2-widget">

    <?php
    $i=1;
    foreach ($nodes as $node) :
        $node_wrapper = entity_metadata_wrapper('node', $node);
        $date = field_get_items('node', $node, 'field_date');
        $field_description = field_get_items('node', $node, 'field_description');
        $field_blog_categories = field_get_items('node', $node, 'field_blog_categories');
        $comment = ($node->comment_count > 1) ? $node->comment_count . t(' comments') : $node->comment_count . t(' comment');
        $len = count($field_blog_categories);
        ?>
        <?php if ($node->type == 'blog_gallery') : ?>
        <article class="entry-item clearfix gallery-post">

            <div class="entry-thumb">

                <div class="owl-carousel owl-carousel-6">
                    <?php
                    foreach ($node->field_gallery['und'] as $field_gallery) :
                        ?>
                        <div class="item">
                            <a href="<?php print url('node/' . $node->nid) ?>">
                                <?php
                                $image = array(
                                    'path' => $field_gallery['uri'],
                                    'alt' => $field_gallery['alt'],
                                    'title' => $field_gallery['title'],
                                    'style_name' => 'blog_large__825x460_'
                                );
                                print theme('image_style', $image);
                                ?>
                            </a>
                        </div>
                    <?php endforeach ?>

                </div>

                <div class="mask"></div>

            </div>
            <!-- entry-thumb -->

            <div class="entry-content">

                <h4 class="entry-title"><a
                        href="<?php print url('node/' . $node->nid) ?>"><?php print $node->title ?></a></h4>

                <div class="meta-box clearfix">

                    <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-date pull-left"><?php print date('M j, Y', $date[0]['value']) ?></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                        <span class="entry-categories pull-left clearfix">
                            <?php
                            if (is_array($field_blog_categories)) {
                                foreach ($field_blog_categories as $idx => $category) {
                                    $term = taxonomy_term_load($category['tid']);
                                    $term_uri = taxonomy_term_uri($term);
                                    $term_title = taxonomy_term_title($term);
                                    $term_path = $term_uri['path'];
                                    $link = l($term_title, $term_path, array('attributes' => array('class' => 'pull-left')));
                                    echo $link;
                                    if ($idx != $len - 1) {
                                        echo '<span class="pull-left">,&nbsp;</span>';
                                    }
                                }
                            }
                            ?>
                        </span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-comment pull-left"><a href="#"><?php print $comment ?></a></span>

                </div>
                <!-- meta-box -->

                <p><?php print (!empty($field_description)) ? $field_description[0]['value'] : '' ?></p>

                <a href="<?php print url('node/' . $node->nid) ?>"
                   class="kopa-button pink-button kopa-button-icon small-button"><?php print t('Read more') ?></a>

            </div>
            <!-- entry-content -->

        </article>
        <!-- entry-item -->
    <?php endif ?>

        <?php if ($node->type == 'blog_standard') : ?>
        <article class="entry-item clearfix standard-post">

            <div class="entry-thumb">
                <?php
                $field_image = field_get_items('node', $node, 'field_image');
                ?>
                <a href="<?php print url('node/' . $node->nid) ?>">
                    <?php
                    $image = array(
                        'path' => $field_image[0]['uri'],
                        'alt' => $field_image[0]['alt'],
                        'title' => $field_image[0]['title'],
                        'style_name' => 'blog_large__825x460_'
                    );
                    print theme('image_style', $image);
                    ?>
                </a>

            </div>
            <!-- entry-thumb -->

            <div class="entry-content">

                <h4 class="entry-title"><a
                        href="<?php print url('node/' . $node->nid) ?>"><?php print $node->title ?></a></h4>

                <div class="meta-box clearfix">

                    <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-date pull-left"><?php print date('M j, Y', $date[0]['value']) ?></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                        <span class="entry-categories pull-left clearfix">
                            <?php
                            if (is_array($field_blog_categories)) {
                                foreach ($field_blog_categories as $idx => $category) {
                                    $term = taxonomy_term_load($category['tid']);
                                    $term_uri = taxonomy_term_uri($term);
                                    $term_title = taxonomy_term_title($term);
                                    $term_path = $term_uri['path'];
                                    $link = l($term_title, $term_path, array('attributes' => array('class' => 'pull-left')));
                                    echo $link;
                                    if ($idx != $len - 1) {
                                        echo '<span class="pull-left">,&nbsp;</span>';
                                    }
                                }
                            }
                            ?>
                        </span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-comment pull-left"><a href="#"><?php print $comment ?></a></span>

                </div>
                <!-- meta-box -->

                <p><?php print (!empty($field_description)) ? $field_description[0]['value'] : '' ?></p>

                <a href="<?php print url('node/' . $node->nid) ?>"
                   class="kopa-button pink-button kopa-button-icon small-button"><?php print t('Read more') ?></a>

            </div>
            <!-- entry-content -->

        </article>
        <!-- entry-item -->
    <?php endif ?>

        <?php if ($node->type == 'blog_video') : ?>
        <article class="entry-item clearfix video-post">

            <div class="entry-thumb">
                <?php
                $field_video = field_get_items('node', $node, 'field_video');
                ?>
                <div class="video-wrapper">
                    <iframe src="<?php print (!empty($field_video)) ? $field_video[0]['value'] : '' ?>"
                            allowfullscreen=""></iframe>
                </div>

            </div>
            <!-- entry-thumb -->

            <div class="entry-content">

                <h4 class="entry-title"><a
                        href="<?php print url('node/' . $node->nid) ?>"><?php print $node->title ?></a></h4>

                <div class="meta-box clearfix">

                    <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-date pull-left"><?php print date('M j, Y', $date[0]['value']) ?></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                        <span class="entry-categories pull-left clearfix">
                            <?php
                            if (is_array($field_blog_categories)) {
                                foreach ($field_blog_categories as $idx => $category) {
                                    $term = taxonomy_term_load($category['tid']);
                                    $term_uri = taxonomy_term_uri($term);
                                    $term_title = taxonomy_term_title($term);
                                    $term_path = $term_uri['path'];
                                    $link = l($term_title, $term_path, array('attributes' => array('class' => 'pull-left')));
                                    echo $link;
                                    if ($idx != $len - 1) {
                                        echo '<span class="pull-left">,&nbsp;</span>';
                                    }
                                }
                            }
                            ?>
                        </span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-comment pull-left"><a href="#"><?php print $comment ?></a></span>

                </div>
                <!-- meta-box -->

                <p><?php print (!empty($field_description)) ? $field_description[0]['value'] : '' ?></p>

                <a href="<?php print url('node/' . $node->nid) ?>"
                   class="kopa-button pink-button kopa-button-icon small-button"><?php print t('Read more') ?></a>

            </div>
            <!-- entry-content -->

        </article>
        <!-- entry-item -->
    <?php endif ?>

        <?php if ($node->type == 'blog_audio') : ?>
        <article class="entry-item clearfix audio-post">

            <?php
            $field_audio = field_get_items('node', $node, 'field_audio');
            ?>
            <div class="entry-thumb">
                <iframe
                    src="https://w.soundcloud.com/player/?url=<?php print (!empty($field_audio)) ? $field_audio[0]['value'] : '' ?>"></iframe>
            </div>
            <!-- entry-thumb -->

            <div class="entry-content">

                <h4 class="entry-title"><a
                        href="<?php print url('node/' . $node->nid) ?>"><?php print $node->title ?></a></h4>

                <div class="meta-box clearfix">

                    <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-date pull-left"><?php print date('M j, Y', $date[0]['value']) ?></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                        <span class="entry-categories pull-left clearfix">
                            <?php
                            if (is_array($field_blog_categories)) {
                                foreach ($field_blog_categories as $idx => $category) {
                                    $term = taxonomy_term_load($category['tid']);
                                    $term_uri = taxonomy_term_uri($term);
                                    $term_title = taxonomy_term_title($term);
                                    $term_path = $term_uri['path'];
                                    $link = l($term_title, $term_path, array('attributes' => array('class' => 'pull-left')));
                                    echo $link;
                                    if ($idx != $len - 1) {
                                        echo '<span class="pull-left">,&nbsp;</span>';
                                    }
                                }
                            }
                            ?>
                        </span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-comment pull-left"><a href="#"><?php print $comment ?></a></span>

                </div>
                <!-- meta-box -->

                <p><?php print (!empty($field_description)) ? $field_description[0]['value'] : '' ?></p>

                <a href="<?php print url('node/' . $node->nid) ?>"
                   class="kopa-button pink-button kopa-button-icon small-button"><?php print t('Read more') ?></a>

            </div>
            <!-- entry-content -->

        </article>
        <!-- entry-item -->
    <?php endif ?>

    <?php
    if ($i==4) :
    $bean = bean_load(BEAN_QUOTE);
    ?>
    <article class="entry-item quote-post">

        <div class="entry-thumb">

            <blockquote class="kopa-blockquote-1">
                <p class="clearfix"><i class="fa fa-quote-left"></i><?php print $bean->field_description['und'][0]['value'] ?></p>
                <h4><?php print $bean->title ?></h4>
                <span><?php print $bean->field_position['und'][0]['value'] ?></span>
            </blockquote>

        </div>
        <!-- entry-thumb -->

    </article>
    <!-- entry-item -->
    <?php endif ?>
    <?php $i++; endforeach ?>
    <?php print theme('pager', array('quantity', count($nodes))); ?>
    <!-- pagination -->

</div>
<!-- widget -->
