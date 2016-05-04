<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a very simple "one column" panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['middle']: The only panel in the layout.
 */
?>
<?php if ($content['top']): ?>
    <div class="panel-panel panel-col-top">
        <div class="inside"><?php print $content['top']; ?></div>
    </div>
<?php endif ?>

<?php if ($content['middle']): ?>
    <div class="panel-panel panel-col-middle">
        <div class="inside"><?php print $content['middle']; ?></div>
    </div>
<?php endif ?>

<?php if ($content['bottom']): ?>
    <div class="panel-panel panel-col-bottom">
        <div class="inside"><?php print $content['bottom']; ?></div>
    </div>
<?php endif ?>
