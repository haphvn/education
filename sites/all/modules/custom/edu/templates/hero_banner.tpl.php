<?php
/* @var $hero_banner EntityListWrapper */

$title = $hero_banner->field_title_banner->value();
$image = $hero_banner->field_image_banner->value();
$description = $hero_banner->field_description_banner->value();

?>
<header class="page-header">

    <div class="mask-pattern"></div>

    <div class="mask"></div>

    <?php echo theme('image_style', array('style_name' => 'hero_banner__1960x330_', 'path' => $image['uri'], 'title' => $image['title'], 'alt' => $image['alt'], 'attributes' => array('class' => 'page-header-bg page-header-bg-1'))) ?>

    <div class="page-header-inner">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1 class="page-title clearfix">
                        <span class="pull-left"><?php print $title ?></span>
                        <i class="pull-left"><?php print $description ?></i>
                    </h1>

                </div>
                <!-- col-md-12 -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- page-header-inner -->

</header>
<!-- page-header -->