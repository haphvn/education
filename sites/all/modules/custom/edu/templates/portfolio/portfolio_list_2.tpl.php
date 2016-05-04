<?php
/**
 * Created by haph on 12/17/15
 */

$themeImage = drupal_get_path('theme', 'education');
$theme_path = base_path() . path_to_theme();
?>

<section class="kopa-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="widget kopa-portfolio-list-1-widget">

                    <div class="widget-title widget-title-s5 text-center">
                        <span></span>

                        <h2>portfolio 2 column</h2>

                        <p>See our features courses or see all courses to see all.</p>
                    </div>

                    <div class="widget-content">

                        <ol class="filters-options clearfix">
                            <li class="active" data-filter="kopa-all">All</li>
                            <?php
                            $name = 'portfolio';
                            $vocal = taxonomy_vocabulary_machine_name_load($name);
                            $tree = taxonomy_get_tree($vocal->vid);
                            foreach ($tree as $term) :
                                ?>
                                <li data-filter="kopa-<?php print strtolower($term->name) ?>"><?php print $term->name ?></li>
                            <?php endforeach ?>
                        </ol>
                        <!-- filter-options -->

                        <div class="portfolio-container">

                            <ul class="portfolio-list-item clearfix">
                                <?php
                                foreach ($nodes as $node) :
                                    $title = $node->title;
                                    $id = $node->field_project_details['und'][0]['value'];
                                    $project_detail = field_collection_item_load($id);
                                    $field_categories = $project_detail->field_categories['und'];

                                    $field_image = field_get_items('node', $node, 'field_image');
                                    $len = count($field_categories);
                                    ?>
                                    <li class="por-item1 col-md-4 col-sm-4 col-xs-4"
                                        data-filter-class='["kopa-all", <?php
                                        foreach ($field_categories as $idx1 => $category1) {
                                            $term = taxonomy_term_load($category1['tid']);
                                            $test = '"kopa-' . strtolower($term->name) . '"';
                                            if ($idx1 != $len - 1) {
                                                $test .= ', ';
                                            }
                                            print $test;
                                        }
                                        ?>]'>
                                        <article class="entry-item">
                                            <div class="entry-thumb">
                                                <?php
                                                foreach ($field_image as $item) {
                                                    $image = array(
                                                        'path' => $item['uri'],
                                                        'alt' => $item['alt'],
                                                        'title' => $item['title'],
                                                        'style_name' => 'portfolio_medium__350x215_'
                                                    );
                                                    print theme('image_style', $image);
                                                }
                                                ?>

                                                <div class="mask">
                                                    <div class="click-box">
                                                        <a class="portfolio-link fa fa-link" href="#"></a>
                                                        <a class="portfolio-like fa fa-heart" href="#"></a>
                                                        <a class="portfolio-gallery fa fa-search popup-icon"
                                                           href="<?php print file_create_url($image['path']) ?>"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <header class="text-center">
                                    <span class="entry-categories">
                                        <?php
                                        foreach ($field_categories as $idx2 => $category2) :
                                            $term = taxonomy_term_load($category2['tid']);
                                            ?>
                                            <a href="#"><?php print $term->name ?></a>
                                                <?php if ($idx2 != $len - 1) : ?>
                                            <span>,&nbsp;</span>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                    </span>
                                                </header>
                                                <h6 class="entry-title"><a
                                                        href="<?php print url('node/' . $node->nid) ?>"><?php print $title ?></a>
                                                </h6>
                                            </div>
                                        </article>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                            <!-- portfolio-list-item -->

                        </div>
                        <!-- portfolio-container -->

                        <div class="text-center">
                            <div class="load-more s1 kopa-button blue-button meidum-button">Load more</div>
                        </div>

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
<!-- kopa-area -->