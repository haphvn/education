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

<footer id="kopa-page-footer">
    <div class="container">
        <div class="row">
            <div class="panel-display panel-1col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
                <div class="panel-panel panel-col">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php print $content['middle']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p id="back-top">
        <a href="#top"><i class="fa fa-arrow-up"></i></a>
    </p>
</footer>
