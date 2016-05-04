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

<section class="kopa-area kopa-area-31">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="<?php print $classes; ?> widget kopa-masonry-list-3-widget">

                    <div class="widget-title widget-title-s5 text-center">
                        <span></span>
                        <h2>Recent Courses</h2>
                        <p>See our features courses or see all courses to see all.</p>
                    </div>

                    <?php if ($rows): ?>
                        <div class="masonry-list-wrapper view-content">
                            <ul class="clearfix ha-test">
                                    <?php print $rows; ?>
                            </ul>
                            <!-- clearfix -->
                        </div>
                        <!-- masonry-list-wrapper -->
                    <?php elseif ($empty): ?>
                        <div class="view-empty">
                            <?php print $empty; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($pager): ?>
                        <?php print $pager; ?>
                    <?php endif; ?>

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area -->
