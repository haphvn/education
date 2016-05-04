<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a three column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['middle']: Content in the middle column.
 *   - $content['right']: Content in the right column.
 */
?>

<div class="panel-display panel-3col-33 clearfix" <?php if (!empty($css_id)) {
    print "id=\"$css_id\"";
} ?>>
    <div id="bottom-sidebar-s2" class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 panel-panel panel-col-first">
                <div class="inside"><?php print $content['left']; ?></div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 panel-panel panel-col">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="inside"><?php print $content['middle-col-1']; ?></div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="inside"><?php print $content['middle-col-2']; ?></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 panel-panel panel-col-last">
                <div class="inside"><?php print $content['right-col-1']; ?></div>
                <div class="inside"><?php print $content['right-col-2']; ?></div>
            </div>
        </div>
    </div>
</div>
