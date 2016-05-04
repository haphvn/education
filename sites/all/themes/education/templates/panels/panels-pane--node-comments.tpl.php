<?php
/**
 * @file
 * Returns the HTML for a Panels pane.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/2052505
 */

global $user;
$nid = arg(1);

$published = _get_comment_count_by_node($nid, COMMENT_PUBLISHED);
$unpublished = _get_comment_count_by_node($nid, COMMENT_NOT_PUBLISHED);
if (in_array('administrator', array_values($user->roles))) {
    $comment_count = $published + $unpublished;
} else {
    $comment_count = $published;
}
?>
<?php print $admin_links; ?>
<div id="comments">
    <h4><?php print $comment_count ?> <?php print ($comment_count > 1) ? 'Comments' : 'Comment' ?></h4>
    <ol class="comments-list clearfix">
        <?php print render($content); ?>
    </ol><!--comments-list-->
</div>
<!-- comments -->