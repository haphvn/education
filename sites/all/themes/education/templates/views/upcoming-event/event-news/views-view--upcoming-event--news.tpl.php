<?php
/**
 * @file
 */
?>

<div class="widget kopa-nothumb-2-widget">

    <h4 class="widget-title widget-title-s9">Events</h4>

    <div class="widget-content">

            <?php if ($rows): ?>
                <div class="row">
                    <?php print $rows; ?>
                </div>
            <?php elseif ($empty): ?>
                <div class="view-empty">
                    <?php print $empty; ?>
                </div>
            <?php endif; ?>

    </div>
    <!-- widget-content -->

</div>
<!-- widget -->