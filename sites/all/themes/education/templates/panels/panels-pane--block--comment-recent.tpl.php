<?php
/**
 * @file
 * Created by haph on 1/3/16
 */
$theme_path = base_path() . path_to_theme();
$number = variable_get('comment_block_count');
$comments = comment_get_recent($number);

?>
<div class="<?php print $classes; ?>" <?php print $id; ?> <?php print $attributes; ?>>
    <?php print $admin_links; ?>

    <div class="widget kopa-recent-comment-widget">

        <h4 class="widget-title widget-title-s10"><?php print $title; ?></h4>

        <ul class="clearfix">
            <?php
            foreach ($comments as $comment) :
                $entity = _get_comment_body($comment->cid);
                $comment_body = !empty($entity[$comment->cid]->comment_body) ? $entity[$comment->cid]->comment_body['und'][0]['value'] : '';
                ?>
            <li>
                <article class="comment-item">
                    <div class="comment-content cleafix">
                        <i class="fa fa-comment-o pull-left"></i>
                        <?php print $comment_body ?>
                    </div>
                    <div class="comment-author clearfix">
                        <div class="comment-avatar pull-left">
                            <a href="#"><img src="<?php print $theme_path ?>/placeholders/avatar/avatar-4.jpg" alt=""></a>
                        </div>
                        <div class="comment-name">
                            <h6><a href="<?php print 'user/' . $comment->uid ?>"><?php print $comment->name ?></a></h6>
                            <em>CEO @ kopasoft</em>
                        </div>
                    </div>
                </article>
            </li>
            <?php endforeach  ?>
        </ul>

    </div>
    <!-- widget -->
</div>
