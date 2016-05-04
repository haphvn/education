<?php

/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

?>
<div class="widget kopa-nothumb-3-widget">

    <h4 class="widget-title widget-title-s10">Upcomming event</h4>

    <div class="widget-content">

        <ul>

            <?php if ($rows): ?>
                <?php print $rows; ?>
            <?php elseif ($empty): ?>
                <?php print $empty; ?>
            <?php endif; ?>

        </ul>

    </div>

</div>
<!-- widget -->
