<?php
/**
 * Created by haph on 1/17/16
 */
//kpr($nodes);

$term_data = array();
$item_data = array();
foreach ($nodes as $node) {
    $tid = $node->field_courses_category['und'][0]['tid'];
    $category = taxonomy_term_load($tid);
    $term_data[$tid] = (array)$category;
    $item_data[$tid][] = $node;
}
?>

<section class="kopa-area kopa-area-31">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="kopa-course-tab-list-3-widget widget">

                    <div class="kopa-tab-container-5 row">

                        <ul class="nav nav-tabs kopa-tabs-5 col-md-3 col-sm-3 col-xs-12">
                            <li><span>Solution area</span></li>
                            <?php
                            $i = 1;
                            ksort($term_data);
                            foreach ($term_data as $term) :
                                ?>
                                <li class="<?php print ($i==1) ? 'active' : '' ?>"><a data-toggle="tab" href="#tab5-<?php print $i ?>"><?php print $term['name'] ?></a></li>
                            <?php $i++; endforeach ?>
                        </ul>
                        <!-- nav-tabs -->

                        <div class="tab-content col-md-9 col-sm-9 col-xs-12">
                            <?php
                            $j = 1;
                            ksort($item_data);
                            foreach ($item_data as $item) :
                                ?>
                                <div id="tab5-<?php print $j ?>" class="tab-pane <?php print ($j==1) ? 'active' : '' ?>">

                                    <div class="kopa-course-list-3-wrapper">

                                        <header class="clearfix">
                                            <h5 class="pull-left">Falcuty of Law</h5>
                                        </header>

                                        <div class="kopa-course-list-3">
                                            <?php
                                            foreach (array_chunk($item, 2) as $rows) :
                                            ?>
                                            <div class="row">
                                                <?php
                                                foreach ($rows as $row) :
                                                    $title = $row->title;
                                                    $field_image = $row->field_image['und'][0];
                                                    $date = $row->field_date[LANGUAGE_NONE][0]['value'];
                                                ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                                        <article class="entry-item clearfix">
                                                            <div class="entry-thumb pull-left">
                                                                <a href="<?php print url('node/'.$row->nid) ?>">
                                                                    <?php
                                                                    $image = array(
                                                                        'path' => $field_image['uri'],
                                                                        'alt' => $field_image['alt'],
                                                                        'title' => $field_image['title'],
                                                                        'style_name' => 'course_list_6__150x150_'
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
                                                                <h6 class="entry-title"><a href="<?php print url('node/'.$row->nid) ?>"><?php print $title ?></a></h6>
                                                                <a class="more-link clearfix" href="<?php print url('node/'.$row->nid) ?>"><span class="pull-left">Read more</span><i class="fa fa-angle-right pull-left"></i></a>
                                                            </div>
                                                        </article>

                                                    </div>
                                                    <!-- col-md-6 -->
                                                <?php endforeach ?>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                        <!-- kopa-course-list-2 -->

                                    </div>
                                    <!-- kopa-course-list-table-wrapper -->

                                </div>
                                <!-- tab-panel -->
                                <?php $j++; endforeach ?>
                        </div>
                        <!-- tab-content -->

                    </div>
                    <!-- kopa-tab-container-2 -->

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