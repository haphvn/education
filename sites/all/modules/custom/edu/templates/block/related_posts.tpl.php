<?php
/**
 * Created by haph on 12/19/15
 */
//kpr($nodes);
?>

<div id="related-post">

    <h4><?php print t('Related Posts') ?></h4>

    <div class="row">

        <?php
        foreach ($nodes as $post) :
            $post_image = field_get_items('node', $post, 'field_image');
            $post_title = l($post->title, url('node/'.$post->nid));
            $post_desc = field_get_items('node', $post, 'field_description');
            $post_blog_categories = field_get_items('node', $post, 'field_blog_categories');
            $len = count($post_blog_categories);
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12">

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
                    <span class="entry-categories clearfix">
                        <?php
                        if (is_array($post_blog_categories)) {
                            foreach ($post_blog_categories as $idx => $category) {
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
                        ?></span>
                        <h5 class="entry-title"><?php print $post_title ?></h5>
                        <p><?php print (!empty($post_desc)) ? sub_str_words($post_desc[0]['value'], 100) : '' ?></p>
                    </div>
                </article>

            </div>
            <!-- col-md-4 -->
        <?php endforeach ?>

    </div>
    <!-- row -->

</div>
<!-- related-post -->
 