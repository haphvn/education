<?php

/**
 * @file
 * Created by haph on 1/25/16
 */

?>

<div class="widget kopa-owl-3-widget">

    <h4 class="widget-title widget-title-s9">Spotlight</h4>

    <div class="owl-carousel owl-carousel-3">

        <?php if ($rows): ?>
            <?php print $rows; ?>
        <?php elseif ($empty): ?>
            <div class="view-empty">
                <?php print $empty; ?>
            </div>
        <?php endif; ?>

    </div>
    <!-- owl-carousel -->
</div>