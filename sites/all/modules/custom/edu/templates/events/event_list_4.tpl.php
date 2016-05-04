<?php
/**
 * Created by haph on 1/16/16
 */

?>

<section class="kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="widget kopa-event-list-4-widget">
                    <?php
                    foreach (array_chunk($nodes, 4) as $items) :
                        ?>
                        <div class="row">
                            <?php
                            foreach ($items as $node) :
                                $nid = $node->nid;
                                $title = $node->title;
                                $field_date = field_get_items('node', $node, 'field_date');
                                $date = $field_date[0]['value'];
                                $field_desc = field_get_items('node', $node, 'field_description');
                                ?>
                                <div class="col-md-3 col-sm-3 col-xs-12">

                                    <article class="entry-item cleafix">
                                        <header class="clearfix">
                                            <span class="entry-time pull-left">At <?php print date('g:i a', $date) ?></span>
                                            <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                                            <span class="entry-author pull-left"><a href="#">Steven Granger</a></span>
                                        </header>

                                        <span class="entry-date"><?php print date('m/d', $date) ?></span>

                                        <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>

                                        <a class="more-link clearfix" href="<?php print url('node/'.$nid) ?>"><span class="pull-left">Read more</span><i class="fa fa-angle-right pull-left"></i></a>
                                    </article>

                                </div>
                                <!-- col-md-3 -->
                            <?php endforeach ?>
                        </div>
                        <!-- row -->
                    <?php endforeach ?>

                    <?php print theme('pager', array('quantity', count($nodes))); ?>
                    <!-- pagination -->

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
