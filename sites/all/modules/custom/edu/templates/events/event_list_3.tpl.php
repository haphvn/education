<?php
/**
 * Created by haph on 1/16/16
 */

?>

<section class="kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="widget kopa-event-list-3-widget">
                    <?php
                    foreach (array_chunk($nodes, 2) as $items) :
                        ?>
                        <div class="row">
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
                                                    'style_name' => 'event_list_3__255x255_'
                                                );
                                                print theme('image_style', $image);
                                                ?>
                                            </a>
                                            <div class="mask"></div>
                                        </div>
                                        <div class="entry-content">
                                            <header class="clearfix">
                                                <span class="entry-time pull-left">At <?php print date('g:i a', $date) ?></span>
                                                <span class="entry-meta pull-left">&nbsp;/&nbsp;</span>
                                                <span class="entry-author pull-left"><a href="#">Steven Granger</a></span>
                                            </header>

                                            <h5 class="entry-title"><a href="<?php print url('node/'.$nid) ?>"><?php print $title ?></a></h5>

                                            <p><?php print $field_desc[0]['value'] ?></p>
                                            <a class="more-link clearfix" href="<?php print url('node/'.$nid) ?>"><span class="pull-left">Read more</span><i class="fa fa-angle-right pull-left"></i></a>
                                        </div>
                                    </article>

                                </div>
                                <!-- col-md-6 -->
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
