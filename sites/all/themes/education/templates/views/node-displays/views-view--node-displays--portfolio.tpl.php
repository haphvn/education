<?php
/**
 * @file
 * @reviewed by Ha
 * @date Feb 04, 2016
 */

$nid = arg(1);
$node = node_load($nid);

$theme_path = base_path() . path_to_theme();

$field_image = field_get_items('node', $node, 'field_image');
$field_photos = field_get_items('node', $node, 'field_photos');
$field_description = field_get_items('node', $node, 'field_description');
$field_links = field_get_items('node', $node, 'field_links');
$field_gallery = field_get_items('node', $node, 'field_gallery');
?>
<section class="kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="entry-portfolio-box">

                    <div class="portfolio-content row">

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <h4 class="portfolio-title"><?php print $node->title ?></h4>

                            <ul class="social-links clearfix">

                                <li><span><?php print t('Share') ?></span></li>
                                <?php
                                foreach ($field_links as $item) :
                                    $str_replace = preg_replace('/\s+/', '-', $item['title']);
                                    ?>
                                    <li><a class="fa fa-<?php print strtolower($str_replace) ?>"
                                           href="<?php print $item['url'] ?>"></a></li>
                                <?php endforeach ?>

                            </ul>
                            <!-- social-links -->

                            <p><?php print (!empty($field_description)) ? $field_description[0]['value'] : '' ?></p>

                        </div>
                        <!-- col-md-9 -->

                        <div class="col-md-3 col-sm-3 col-xs-12">

                            <h6 class="small-portfolio-title"><?php print t('Project details') ?></h6>

                            <?php
                            $id = $node->field_project_details['und'][0]['value'];
                            $project_detail = field_collection_item_load($id);
                            $field_date = $project_detail->field_date['und'][0]['value'];
                            $field_address = $project_detail->field_location['und'][0]['value'];
                            $field_categories = $project_detail->field_categories['und'];
                            $field_link = $project_detail->field_link['und'][0];
                            ?>

                            <div class="project-date clearfix">
                                <i class="fa fa-calendar"></i>
                                <span><?php print date('M d, Y', $field_date) ?></span>
                            </div>

                            <div class="project-address clearfix">
                                <i class="fa fa-user"></i>
                                <span><?php print $field_address ?></span>
                            </div>

                            <div class="project-categories clearfix">
                                <i class="fa fa-tags"></i>
                                <?php
                                $len = count($field_categories);
                                foreach ($field_categories as $idx => $value) :
                                    $term = taxonomy_term_load($value['tid']);
                                    ?>
                                    <a href="#"><?php print $term->name ?></a>
                                    <?php if ($idx != $len - 1) : ?>
                                    <span>,&nbsp;</span>
                                <?php endif ?>
                                <?php endforeach ?>
                            </div>

                            <br>

                            <a href="<?php print $field_link['url'] ?>"
                               class="kopa-button pink-button kopa-button-icon small-button"><?php print $field_link['title'] ?></a>

                        </div>
                        <!-- col-md-3 -->

                    </div>
                    <!-- row -->

                    <div class="portfolio-thumb row">

                        <div class="col-md-12">

                            <div class="owl-carousel owl-carousel-6">
                                <?php
                                foreach ($field_gallery as $images) :
                                    ?>
                                    <div class="item">
                                        <a href="#">
                                            <?php
                                            $image = array(
                                                'path' => $images['uri'],
                                                'alt' => $images['alt'],
                                                'title' => $images['title'],
                                                'style_name' => 'portfolio_detail__1109x530_'
                                            );
                                            print theme('image_style', $image);
                                            ?>
                                        </a>

                                        <div class="mask"></div>
                                    </div>
                                <?php endforeach ?>
                            </div>

                        </div>
                        <!-- col-md-12 -->

                    </div>
                    <!-- row -->

                </div>
                <!-- entry-portfolio-box -->
            </div>
            <!-- col-md-12 -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- kopa-area -->
