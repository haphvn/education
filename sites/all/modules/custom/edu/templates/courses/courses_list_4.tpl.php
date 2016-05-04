<?php
/**
 * Created by haph on 1/17/16
 */
//dpm($nodes);

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

                <div class="kopa-course-tab-list-1-widget widget">

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

                                <?php
                                foreach ($item as $data) :
                                    $field_title = $data->field_title['und'][0]['value'];
                                    $field_courses = $data->field_courses['und'];
                                ?>
                                    <div class="kopa-course-list-table-wrapper">

                                        <h5><?php print $field_title ?></h5>

                                        <div class="kopa-course-list-table">

                                            <div class="table-header clearfix">

                                                <div class="stt-col">ID</div>

                                                <div class="name-col">Course Name</div>

                                                <div class="duration-col">Duration</div>

                                                <div class="date-col">Start Date</div>

                                            </div>
                                            <!-- table-header -->

                                            <ul class="table-list">

                                                <?php
                                                foreach ($field_courses as $value) :
                                                    $item = field_collection_item_load($value['value']);
                                                    $start_date = $item->field_start_date['und'][0]['value'];
                                                    $title = $item->field_title['und'][0]['value'];
                                                    $id = $item->field_id['und'][0]['value'];
                                                    $duration = $item->field_duration['und'][0]['value'];
                                                    ?>
                                                    <li class="clearfix">
                                                        <div class="stt-col"><?php print $id ?></div>

                                                        <div class="name-col"><a href="#"><?php print $title ?></a></div>

                                                        <div class="duration-col"><?php print $duration ?></div>

                                                        <div class="date-col"><?php print date('D, M d - Y', $start_date) ?></div>
                                                    </li>
                                                <?php endforeach ?>

                                            </ul>
                                            <!-- table-list -->

                                        </div>
                                        <!-- kopa-course-list-table -->

                                    </div>
                                    <!-- kopa-course-list-table-wrapper -->
                                <?php endforeach ?>

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