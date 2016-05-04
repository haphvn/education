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

<div class="sf-mega sf-mega-s1">
    <div class="row">
        <?php if ($content['center']): ?>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php print $content['left']; ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php print $content['center']; ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if ($content['right']): ?>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="row">
                    <?php print $content['right']; ?>
                </div>
            </div>
        <?php endif ?>
    </div>
    <!-- row -->
</div>
<!-- sf-mega -->
