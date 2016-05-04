<?php
/**
 * @file
 * Created by haph on 12/4/15
 */

$theme_path = base_path() . path_to_theme();
$path = current_path();
?>

<div id="kopa-page-header">

    <div id="kopa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <?php print render($page['header_logo']); ?>
                    <!-- kopa-header-logo -->
                </div>
                <!-- col-md-3 -->
                <?php print render($page['header_top']); ?>
                <!-- kopa-header-top -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- kopa-header-top -->

    <?php print render($page['header_bottom']); ?>
    <!-- kopa-header-bottom -->

</div>
<!-- kopa-page-header -->

<div id="main-content">

    <?php print render($page['sidebar_first']) ?>
    <!-- kopa sidebar first -->
    <?php print render($page['content']) ?>
    <!-- kopa sidebar second -->
    <?php print render($page['sidebar_second']) ?>
    <!-- kopa sidebar second -->

</div>
