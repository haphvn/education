<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */

global $base_url;

$bean = $variables['elements'];
$label = $bean['#entity']->label;
$title = $bean['#entity']->title;
$desc = $bean['#entity']->field_description['und'][0]['value'];
$link = $bean['#entity']->field_link['und'][0];
$date = $bean['#entity']->field_date['und'][0]['value'];
$var_date = date('Y/m/d H:i:s', $date);
?>

<section class="kopa-area kopa-area-0 kopa-area-light">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="widget kopa-event-widget">

                    <div class="widget-title widget-title-s1 clearfix">
                        <h4><?php print $label ?></h4>
                        <div class="meta-box clearfix">
									<span class="entry-time pull-left clearfix">
										<i class="fa fa-clock-o pull-left"></i>
										<span class="pull-left"><?php print date('g:i A', $date) ?></span>
									</span>
									<span class="entry-date pull-left clearfix">
										<i class="fa fa-calendar-o pull-left"></i>
										<span class="pull-left"><?php print date('d F, Y', $date) ?></span>
									</span>
                        </div>
                        <i class="widget-title-icon fa fa-calendar"></i>
                    </div>
                    <!-- widget-title-s1 -->

                    <div class="widget-content">

                        <div class="row">

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="entry-content">

                                    <h2 class="entry-title"><a href="#"><?php print $title ?></a></h2>

                                    <p><?php print $desc ?></p>

                                </div>

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <ul class="kopa-countdown-2">
                                </ul>

                                <div class="text-right">
                                    <a href="<?php print $link['url'] ?>" class="kopa-button pink-button medium-button"><?php print $link['title'] ?></a>
                                </div>

                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- widget-content -->

                </div>
                <!-- widget -->

            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area-light -->

<script type="text/javascript">
    (function ($) {
        var path_to_theme = Drupal.settings.basePath + Drupal.settings.pathToTheme;

        if ($('.kopa-countdown-2').length > 0) {
            Modernizr.load([{
                load: [path_to_theme + '/js/countdown.js'],
                complete: function () {

                    var jsDate = <?php echo json_encode($var_date) ?>;
                    var currentYear = new Date().getFullYear();
                    $('.kopa-countdown-2').countdown(jsDate, function(event) {
                        var $this = $(this).html(event.strftime(''
                            +'<li><div><span>days</span><h3>%D</h3><span>'+ currentYear +'</span></div></li>'
                            +'<li><div><span>hours</span><h3>%H</h3><span>'+ currentYear +'</span></div></li>'
                            +'<li><div><span>mins</span><h3>%M</h3><span>'+ currentYear +'</span></div></li>'
                            +'<li><div><span>secs</span><h3>%S</h3><span>'+ currentYear +'</span></div></li>'));
                    });

                }
            }]);
        };
    }(jQuery));
</script>

