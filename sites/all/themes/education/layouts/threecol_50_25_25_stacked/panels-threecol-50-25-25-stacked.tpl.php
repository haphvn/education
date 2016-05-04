<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a three column 25%-50%-25% panel display layout, with
 * additional areas for the top and the bottom.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['top']: Content in the top row.
 *   - $content['left']: Content in the left column.
 *   - $content['middle']: Content in the middle column.
 *   - $content['right']: Content in the right column.
 *   - $content['bottom']: Content in the bottom row.
 */
?>
<div class="panel-display panel-3col-stacked clearfix" <?php if (!empty($css_id)) {
    print "id=\"$css_id\"";
} ?>>
    <?php if ($content['top']): ?>
        <div class="panel-panel panel-col-top">
            <div class="inside"><?php print $content['top']; ?></div>
        </div>
    <?php endif ?>

    <section class="kopa-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 panel-col-left">
                    <div class="entry-course-box">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12 left-col">
                                <div class="inside"><?php print $content['left']; ?></div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 right-col">
                                <div class="inside"><?php print $content['middle']; ?></div>
                            </div>
                        </div>

                        <?php if ($content['bottom']): ?>
                            <div class="panel-panel panel-col-center-bottom">
                                <div class="inside"><?php print $content['center_bottom']; ?></div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 panel-col-right">
                    <div class="inside"><?php print $content['right']; ?></div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($content['bottom']): ?>
        <div class="panel-panel panel-col-bottom">
            <div class="inside"><?php print $content['bottom']; ?></div>
        </div>
    <?php endif ?>
</div>
