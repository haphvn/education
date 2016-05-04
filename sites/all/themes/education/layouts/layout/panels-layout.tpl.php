<?php
/**
 * Created by haph on 1/15/16
 */

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
<div id="kopa-page-header">
    <div id="kopa-header-top">
        <div class="container">
            <div class="row">
                <?php if ($content['left']): ?>
                    <div class="col-md-3 col-sm-3 col-xs-12 panel-col-left">
                        <div class="inside"><?php print $content['left']; ?></div>
                    </div>
                <?php endif ?>

                <?php if ($content['right']): ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                        <nav id="top-nav" class="pull-right clearfix panel-col-right" >
                            <div class="inside">
                                <?php print $content['right']; ?>
                            </div>
                        </nav>
                    </div>
                <?php endif ?>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- kopa-header-top -->

    <div id="kopa-header-bottom">
        <?php if ($content['bottom']): ?>
            <div class="container">
                <div class="panel-panel panel-col-bottom">
                    <div class="inside"><?php print $content['bottom']; ?></div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>

<div id="main-content">
    <?php if ($content['content']): ?>
        <div class="panel-panel panel-col-content">
            <div class="inside"><?php print $content['content']; ?></div>
        </div>
    <?php endif ?>
</div>
