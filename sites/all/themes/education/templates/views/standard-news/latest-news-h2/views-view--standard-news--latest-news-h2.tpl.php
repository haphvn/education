<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">

    <div class="widget kopa-article-list-5-widget">

        <div class="widget-title widget-title-s8 clearfix">

            <i class="fa fa-newspaper-o pull-left"></i>

            <h4 class="pull-left">Lastest news</h4>

        </div>
        <!-- widget-title -->

        <?php if ($rows): ?>
            <div class="widget-content">
                <ul>
                    <?php print $rows; ?>
                </ul>
            </div>
            <!-- widget-content -->
        <?php elseif ($empty): ?>
            <div class="view-empty">
                <?php print $empty; ?>
            </div>
        <?php endif; ?>

        <?php if ($pager): ?>
            <?php print $pager; ?>
        <?php endif; ?>

    </div>
    <!-- kopa-rounded-thumb-widget -->

</div><?php /* class view */ ?>