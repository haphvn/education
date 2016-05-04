<?php
/**
 * Created by haph on 1/16/16
 */

?>

<div class="widget kopa-event-list-1-widget">
    <?php
    foreach (array_chunk($nodes, 2) as $items) :
        ?>
        <div class="row view-content">
            <?php
            foreach ($items as $node) :
                $nid = $node->nid;
                $title = $node->title;
                $field_image = field_get_items('node', $node, 'field_image');
                $field_date = field_get_items('node', $node, 'field_date');
                $date = $field_date[0]['value'];
                $field_desc = field_get_items('node', $node, 'field_description');
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <article class="entry-item cleafix">
                        <div class="entry-thumb">
                            <a href="#">
                                <?php
                                $image = array(
                                    'path' => $field_image[0]['uri'],
                                    'alt' => $field_image[0]['alt'],
                                    'title' => $field_image[0]['title'],
                                    'style_name' => 'event_list_1__398x230'
                                );
                                print theme('image_style', $image);
                                ?>
                            </a>
                            <div class="mask"></div>
                        </div>
                        <div class="entry-content clearfix">
                            <div class="entry-date pull-left">
                                <p>Today</p>
                                <strong>30</strong>
                                <span>Sept</span>
                            </div>
                            <div class="entry-content-detail">
                                <header class="clearfix">
                                    <span class="entry-time pull-left">At <?php print date('g:i a', $date) ?></span>
                                    <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                                    <span class="entry-author pull-left"><a href="#">Steven Granger</a></span>
                                </header>

                                <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>

                                <p><?php print $field_desc[0]['value'] ?></p>
                                <a class="more-link clearfix" href="<?php print url('node/'.$nid) ?>"><span class="pull-left">Read more</span><i class="fa fa-angle-right pull-left"></i></a>
                            </div>
                        </div>
                    </article>

                </div>
                <!-- col-md-6 -->
            <?php endforeach ?>
        </div>
        <!-- row -->
    <?php endforeach ?>

    <a class="load-more pager-load-more" href="#">Load more</a>
    <!-- pagination -->

</div>
<!-- widget -->