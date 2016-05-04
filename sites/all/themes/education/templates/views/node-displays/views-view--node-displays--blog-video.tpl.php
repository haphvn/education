<?php
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
$date = field_get_items('node', $node, 'field_date');
$field_body_prefix = field_get_items('node', $node, 'field_body_prefix');
$field_body_suffix = field_get_items('node', $node, 'field_body_suffix');
$field_tags = field_get_items('node', $node, 'field_tags');

$field_image_author = $wrapper->field_author->field_image->value();
$field_author_fa = $wrapper->field_author->field_title->value();
$field_description = $wrapper->field_author->field_description->value();
$field_social_links_member = $wrapper->field_author->field_links->value();

$field_video = field_get_items('node', $node, 'field_video');

$comment = ($node->comment_count > 1) ? $node->comment_count . t(' comments') : $node->comment_count . t(' comment');
?>

<div class="entry-box">

    <div class="entry-thumb">

        <?php
        $image = array(
            'path' => $field_image[0]['uri'],
            'alt' => $field_image[0]['alt'],
            'title' => $field_image[0]['title'],
            'style_name' => 'blog_large__825x460_'
        );
        print theme('image_style', $image);
        ?>

    </div>
    <!-- entry-thumb -->

    <div class="entry-content">

        <header class="entry-content-header clearfix">

            <div class="entry-date pull-left">
                <p><?php print date('D', $date[0]['value']) ?></p>
                <strong><?php print date('j', $date[0]['value']) ?></strong>
                <span><?php print date('M', $date[0]['value']) ?></span>
            </div>

            <div class="entry-title">

                <h3><?php print $node->title ?></h3>

                <div class="meta-box clearfix">

                    <span class="entry-author pull-left"><a href="#"><?php print ucfirst($node->name) ?></a></span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

											<span class="entry-categories pull-left clearfix">
												<a class="pull-left" href="#">Child</a>
												<span class="pull-left">,&nbsp;</span>
												<a class="pull-left" href="#">Education</a>
											</span>

                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>

                    <span class="entry-comment pull-left"><a href="#"><?php print $comment; ?></a></span>

                </div>
                <!-- meta-box -->

            </div>
            <!-- entry-title -->

        </header>
        <!-- entry-content-header -->

        <?php print (!empty($field_body_prefix)) ? $field_body_prefix[0]['safe_value'] : '' ?>
        <br>

        <div class="video-wrapper">
            <iframe src="<?php print (!empty($field_video)) ? $field_video[0]['value'] : '' ?>" height="470" allowfullscreen=""></iframe>
        </div>
        <br>
        <br>
        <br>

        <?php print (!empty($field_body_suffix)) ? $field_body_suffix[0]['safe_value'] : '' ?>
        <br>

    </div>
    <!-- entry-content -->

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

    <div class="about-author">
        <div class="author-avatar pull-left">
            <a href="#">
                <?php
                $image = array(
                    'path' => $field_image_author['uri'],
                    'alt' => $field_image_author['alt'],
                    'title' => $field_image_author['title'],
                    'style_name' => 'blog_avatar__100x108_'
                );
                print theme('image_style', $image);
                ?>
            </a>
        </div>
        <div class="author-content">
            <h5><a href="#"><?php print $field_author_fa ?></a></h5>
            <p><?php print $field_description ?></p>
            <ul class="social-links clearfix">
                <?php
                foreach ($field_social_links_member as $item) :
                    $str_replace = preg_replace('/\s+/', '-', $item['title']);
                    ?>
                    <li><a class="fa fa-<?php print strtolower($str_replace) ?>" href="<?php print $item['url'] ?>"></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!-- about-author -->

    <footer class="entry-box-footer clearfix">

        <?php
        list($idx, $anid, $atitle) = _get_article_prev_next($node);
        if ($idx > 0) {
            $href_prev = base_path() . drupal_get_path_alias('node/' . $anid[$idx - 1]);
            $prev = '<a href="'.$href_prev.'" class="fa fa-angle-left"></a><a href="'.$href_prev.'" class="prev-post">Previous post</a><h4 class="entry-title"><a href="'.$href_prev.'">'.$atitle[$idx - 1].'</a></h4>';
        }
        if ($idx < count($anid) - 1) {
            $href_next = base_path() . drupal_get_path_alias('node/' . $anid[$idx + 1]);
            $next = '<a href="'.$href_next.'" class="fa fa-angle-right"></a><a href="'.$href_next.'" class="next-post">Next post</a><h4 class="entry-title"><a href="'.$href_next.'">' . $atitle[$idx + 1] . '</a></h4>';
        }
        ?>
        <div class="prev-article-item pull-left">
            <article class="entry-item">
                <img src="<?php print $theme_path ?>/placeholders/post-image/post-47.jpg" alt="">
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
                <img src="<?php print $theme_path ?>/placeholders/post-image/post-47.jpg" alt="">
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
    <!-- entry-box-footer -->

</div>
<!-- entry-box -->
