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

<div class="panel-display panel-twocol-70-30-stacked clearfix" <?php if (!empty($css_id)) {
    print "id=\"$css_id\"";
} ?>>

    <div class="panel-panel line">
        <div class="panel-panel unit panel-top lastUnit">
            <?php print $content['top']; ?>
        </div>
    </div>

    <section class="kopa-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 panel-col-seventy">
                    <?php print $content['center']; ?>
                </div>
                <!-- col-md-9 -->

                <div class="col-md-3 col-sm-3 col-xs-12 panel-col-thirty">
                    <?php print $content['right']; ?>
                </div>
                <!-- col-md-3 -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- kopa-area -->

    <div class="panel-panel panel-line">
        <div class="panel-panel unit panel-bottom lastUnit">
            <?php print $content['bottom']; ?>
        </div>
    </div>

</div>
