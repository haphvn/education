<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-display panel-2col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
    <section class="kopa-area kopa-area-19">
        <div class="mask"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 panel-col-first-50-50-v3">
                    <div class="inside"><?php print $content['left']; ?></div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 panel-col-last-50-50-v3">
                    <div class="inside"><?php print $content['right']; ?></div>
                </div>
            </div>
        </div>
    </section>
</div>
