<?php
/**
 * @file
 * Created by haph on 1/25/16
 */

?>

<div class="<?php print $classes; ?>">

    <div class="widget kopa-article-list-10-widget">

        <div class="widget-title widget-title-s8 clearfix">

            <i class="fa fa-newspaper-o pull-left"></i>

            <h4 class="pull-left">Our research</h4>

        </div>

        <?php if ($rows): ?>
            <div class="widget-content">
                <ul class="clearfix">
                    <?php print $rows; ?>
                </ul>
            </div>
        <?php elseif ($empty): ?>
            <div class="view-empty">
                <?php print $empty; ?>
            </div>
        <?php endif; ?>

        <?php if ($pager): ?>
            <?php print $pager; ?>
        <?php endif; ?>

    </div>

</div><?php /* class view */ ?>
