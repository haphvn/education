<?php
/**
 * @file   twocol-70-30-stacked.tpl.php
 * @author António P. P. Almeida <appa@perusio.net>
 * @date   Tue Dec 18 09:15:00 2012
 *
 * @brief  Template for the 70/30 panels layout.
 *
 *
 */
?>

<div class="panel-display panel-twocol-30-70 clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

    <?php if ($content['top']): ?>
        <div class="panel-panel panel-col-top">
            <div class="inside"><?php print $content['top']; ?></div>
        </div>
    <?php endif ?>

    <section class="kopa-area kopa-area-31">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12 panel-col-thirty">
                    <?php print $content['left']; ?>
                </div>
                <!-- col-md-3 -->

                <div class="col-md-9 col-sm-9 col-xs-12 panel-col-seventy">
                    <?php print $content['ads']; ?>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12 panel-col-center">
                            <div class="entry-box">
                                <div class="entry-content">
                                    <?php print $content['center']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 panel-col-right">
                            <?php print $content['right']; ?>
                        </div>
                    </div>
                </div>
                <!-- col-md-9 -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </section>
    <!-- kopa-area -->

    <?php if ($content['bottom']): ?>
        <div class="panel-panel panel-col-bottom">
            <div class="inside"><?php print $content['bottom']; ?></div>
        </div>
    <?php endif ?>

</div>
