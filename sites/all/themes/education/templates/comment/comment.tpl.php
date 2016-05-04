<?php

/**
 * @file
 * Bartik's theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $created: Formatted date and time for when the comment was created.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->created variable.
 * - $changed: Formatted date and time for when the comment was last changed.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->changed variable.
 * - $new: New comment marker.
 * - $permalink: Comment permalink.
 * - $submitted: Submission information created from $author and $created during
 *   template_preprocess_comment().
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $title: Linked title.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - comment: The current template type, i.e., "theming hook".
 *   - comment-by-anonymous: Comment by an unregistered user.
 *   - comment-by-node-author: Comment by the author of the parent node.
 *   - comment-preview: When previewing a new or edited comment.
 *   The following applies only to viewers who are registered users:
 *   - comment-unpublished: An unpublished comment visible only to administrators.
 *   - comment-by-viewer: Comment by the user currently viewing the page.
 *   - comment-new: New comment since last the visit.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * These two variables are provided for context:
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_comment()
 * @see template_process()
 * @see theme_comment()
 */

global $base_url;
$theme_path = base_path() . path_to_theme();

$links = $content['links']['comment']['#links'];
$comment_body = !empty($comment->comment_body) ? $comment->comment_body['und'][0]['value'] : '';
?>

<?php echo str_repeat("<ul class=\"children\">", !empty($comment->depth)); ?>
<li class="comment clearfix">
    <article class="comment-wrap clearfix">
        <div class="comment-avatar pull-left">
            <img alt="" src="<?php print $theme_path ?>/placeholders/avatar/avatar-10.jpg">
        </div>
        <div class="comment-body">
            <div class="comment-content">
                <?php print $comment_body ?>
            </div>

            <footer class="clearfix">
                <div class="pull-left">
                    <h6><?php print $comment->name ?></h6>
                </div>
                <div class="pull-right clearfix">
                    <span class="entry-date pull-left"><?php print $created; ?></span>

                    <div class="comment-button pull-left clearfix">
                        <?php foreach ($links as $idx => $link) : ?>
                            <a class="pull-left" href="<?php print $base_url .'/'. $link['href'] ?>"><?php print $link['title'] ?></a>
                            <?php if ($link != end($links)) : ?>
                                <span class="pull-left">&nbsp;/&nbsp;</span>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </footer>
        </div><!--comment-body -->
    </article>
</li>
<?php echo str_repeat("</ul>", !empty($comment->depth)); ?>