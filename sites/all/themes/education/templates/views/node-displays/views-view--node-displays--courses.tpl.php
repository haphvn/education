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

$field_image = field_get_items('node', $node, 'field_image');
$field_tags = field_get_items('node', $node, 'field_tags');

$body = field_get_items('node', $node, 'body');

$field_image_author = $wrapper->field_author->field_image->value();
$field_author_fa = $wrapper->field_author->field_title->value();
$field_description = $wrapper->field_author->field_description->value();
$field_social_links_member = $wrapper->field_author->field_links->value();
?>

<h5 class="entry-title"><?php print $node->title ?></h5>

<div class="entry-thumb pull-left" style="margin-right: 30px;">
    <a href="#">
        <?php
        $image = array(
            'path' => $field_image[0]['uri'],
            'alt' => $field_image[0]['alt'],
            'title' => $field_image[0]['title'],
            'style_name' => 'course_detail__270x180_'
        );
        print theme('image_style', $image);
        ?>
    </a>
</div>

<div class="entry-content">
    <?php print (!empty($body)) ? $body[0]['value'] : '' ?>
    <br>

    <div class="tag-box">

        <span>Tags:</span>

        <?php
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
        <div class="author-avatar pull-left">
            <a href="#">
                <?php
                $image_author = array(
                    'path' => $field_image_author['uri'],
                    'alt' => $field_image_author['alt'],
                    'title' => $field_image_author['title'],
                    'style_name' => 'blog_avatar__100x108_'
                );
                print theme('image_style', $image_author);
                ?>
            </a>
        </div>
        <div class="author-content">
            <h5><a href="#"><?php print $field_author_fa ?></a></h5>
            <p><?php print $field_description ?></p>
            <ul class="social-links clearfix">
                <?php
                if (!empty($field_social_links_member)) :
                    foreach ($field_social_links_member as $item) :
                        $str_replace = preg_replace('/\s+/', '-', $item['title']);
                        ?>
                        <li><a class="fa fa-<?php print strtolower($str_replace) ?>" href="<?php print $item['url'] ?>"></a></li>
                    <?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <!-- about-author -->

    <footer class="entry-course-box-footer clearfix">

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
    <!-- entry-course-box-footer -->

    <div id="related-post">

        <h4>Related Posts</h4>

        <div class="row">
            <?php
            $nodes = _get_related_posts(BUNDLE_COURSES, 2);
            foreach ($nodes as $post) :
            $post_image = field_get_items('node', $post, 'field_image');
//            $post_title = l($post->title, url('node/'.$post->nid));
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