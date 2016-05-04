<?php
/**
 * Created by haph on 12/25/15
 */

/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

$nid = arg(1);
$node = node_load($nid);
$wrapper = entity_metadata_wrapper('node', $node);
$theme_path = base_path() . path_to_theme();

$body = field_get_items('node', $node, 'body');
?>

<h5 class="entry-title"><?php print $node->title ?></h5>

<div class="event-speaker">

    <h6>Speakers</h6>

    <ul class="clearfix">
        <?php
        foreach ($wrapper->field_speakers as $field_speakers) :
            $field_image = $field_speakers->field_image->value();
            $field_name_speaker = $field_speakers->field_title->value();
            $field_position_speaker = $field_speakers->field_position->value();
            ?>
            <li class="clearfix">
                <div class="speaker-avatar pull-left">
                    <a href="#">
                        <?php
                        $image = array(
                            'path' => $field_image['uri'],
                            'alt' => $field_image['alt'],
                            'title' => $field_image['title'],
                            'style_name' => 'speaker__70x70_'
                        );
                        print theme('image_style', $image);
                        ?>
                    </a>
                </div>
                <div class="speaker-detail">
                    <h6><a href="#"><?php print $field_name_speaker ?></a></h6>
                    <span><?php print $field_position_speaker ?></span>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<div class="event-detail">
    <ul class="clearfix">
        <?php
        $field_start_date = $wrapper->field_event_information->field_start_date->value();
        $field_end_date = $wrapper->field_event_information->field_end_date->value();
        $field_location = $wrapper->field_event_information->field_location->value();
        $field_phone = $wrapper->field_event_information->field_phone->value();
        $field_email = $wrapper->field_event_information->field_email->value();
        ?>
        <li>
            <strong>Start</strong>
            <span><?php print date('g:i A - M j Y', $field_start_date) ?></span>
        </li>
        <li>
            <strong>End</strong>
            <span><?php print date('g:i A - M j Y', $field_end_date) ?></span>
        </li>
        <li>
            <i class="fa fa-map-marker"></i>
            <span><?php print $field_location ?></span>
        </li>
        <li>
            <i class="fa fa-phone"></i>
            <span><?php print $field_phone ?></span>
        </li>
        <li>
            <i class="fa fa-envelope"></i>
            <a href="mailto:<?php print $field_email ?>"><?php print $field_email ?></a>
        </li>
    </ul>

    <?php print (!empty($body)) ? $body[0]['value'] : '' ?>
    <br>

    <div class="tag-box">

        <span>Tags:</span>

        <?php
        $field_tags = field_get_items('node', $node, 'field_tags');
        if (!empty($field_tags)) :
            foreach ($field_tags as $idx => $tid) :
                $term = taxonomy_term_load($tid['tid']);
                ?>
                <a href="#"><?php print $term->name ?></a>
                <?php
            endforeach;
        endif;
        ?>

    </div>
    <!-- tag-box -->

    <div class="social-box clearfix">

        <span class="pull-left">Follows:</span>

        <ul class="social-links pull-right">
            <li><a href="#" class="fa fa-facebook"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-youtube"></a></li>
            <li><a href="#" class="fa fa-instagram"></a></li>
        </ul>

    </div>
    <!-- social-box -->

    <div class="about-author">
        <?php
        $field_image = $wrapper->field_author->field_image->value();
        $field_title = $wrapper->field_author->field_title->value();
        $field_description = $wrapper->field_author->field_description->value();
        $field_links = $wrapper->field_author->field_links->value();
        ?>
        <div class="author-avatar pull-left">
            <a href="#">
                <?php
                $image = array(
                    'path' => $field_image['uri'],
                    'alt' => $field_image['alt'],
                    'title' => $field_image['title'],
                    'style_name' => 'avatar__100x108_'
                );
                print theme('image_style', $image);
                ?>
            </a>
        </div>
        <div class="author-content">
            <h5><a href="#"><?php print $field_title ?></a></h5>
            <p><?php print $field_description ?></p>
            <ul class="social-links clearfix">
                <?php
                foreach ($field_links as $link) :
                    $str_replace = preg_replace('/\s+/', '-', $link['title']);
                    ?>
                    <li><a href="<?php print $link['url'] ?>" class="fa fa-<?php print strtolower($str_replace) ?>"></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!-- about-author -->

    <footer class="entry-event-box-footer clearfix">

        <?php
        list($idx, $anid, $atitle) = _get_article_prev_next($node);
        if ($idx > 0) {
            $href_prev = base_path() . drupal_get_path_alias('node/' . $anid[$idx - 1]);
            $prev = '<a href="' . $href_prev . '" class="fa fa-angle-left"></a><a href="' . $href_prev . '" class="prev-post">Previous post</a><h4 class="entry-title"><a href="' . $href_prev . '">' . $atitle[$idx - 1] . '</a></h4>';
        }
        if ($idx < count($anid) - 1) {
            $href_next = base_path() . drupal_get_path_alias('node/' . $anid[$idx + 1]);
            $next = '<a href="' . $href_next . '" class="fa fa-angle-right"></a><a href="' . $href_next . '" class="next-post">Next post</a><h4 class="entry-title"><a href="' . $href_next . '">' . $atitle[$idx + 1] . '</a></h4>';
        }
        ?>

        <div class="prev-article-item pull-left">
            <article class="entry-item">
                <img src="<?php print $theme_path ?>/placeholders/post-image/post-53.jpg" alt="">

                <div class="mask"></div>
                <div class="entry-content">
                    <?php
                    if (isset($prev)) {
                        echo $prev;
                    }
                    ?>
                </div>
            </article>
        </div>

        <div class="next-article-item pull-right">
            <article class="entry-item">
                <img src="<?php print $theme_path ?>/placeholders/post-image/post-53.jpg" alt="">

                <div class="mask"></div>
                <div class="entry-content">
                    <?php
                    if (isset($next)) {
                        echo $next;
                    }
                    ?>
                </div>
            </article>
        </div>

    </footer>
    <!-- entry-event-box-footer -->

    <div id="related-post">

        <h4>Related Posts</h4>

        <div class="row">
            <?php
            $nodes = _get_related_posts(BUNDLE_EVENTS, 2);
            foreach ($nodes as $post) :
                $post_image = field_get_items('node', $post, 'field_image');
//                $post_title = l($post->title, url('node/'.$post->nid));
                $post_desc = field_get_items('node', $post, 'field_description');
                $post_blog_categories = field_get_items('node', $post, 'field_blog_categories');
                $len = count($post_blog_categories);
                if ($node->nid != $post->nid) :
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <article class="entry-item">
                            <div class="entry-thumb">
                                <a href="<?php print url('node/' . $post->nid) ?>">
                                    <?php
                                    $image = array(
                                        'path' => $post_image[0]['uri'],
                                        'alt' => $post_image[0]['alt'],
                                        'title' => $post_image[0]['title'],
                                        'style_name' => 'related_posts__254x209_'
                                    );
                                    print theme('image_style', $image);
                                    ?>
                                </a>
                            </div>
                            <div class="entry-content">
                                <span class="entry-categories clearfix"><a href="#">Courses</a></span>
                                <h5 class="entry-title"><a href="<?php print url('node/' . $post->nid) ?>"><?php print $post->title ?></a></h5>
                                <p><?php print (!empty($post_desc)) ? sub_str_words($post_desc[0]['value'], 100) : '' ?></p>
                            </div>
                        </article>

                    </div>
                    <!-- col-md-6 -->
                <?php endif; endforeach ?>
        </div>
        <!-- row -->

    </div>
    <!-- related-post -->

</div>