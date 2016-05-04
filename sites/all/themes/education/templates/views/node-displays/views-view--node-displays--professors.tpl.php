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
$body = field_get_items('node', $node, 'body');
$field_position = field_get_items('node', $node, 'field_position');
$field_description = field_get_items('node', $node, 'field_description');
$field_links = field_get_items('node', $node, 'field_links');

?>

<div class="entry-professor-box">

    <div class="row clearfix">

        <div class="entry-professor-thumb col-md-4 col-sm-4 col-xs-12">
            <?php
            $image = array(
                'path' => $field_image[0]['uri'],
                'alt' => $field_image[0]['alt'],
                'title' => $field_image[0]['title'],
                'style_name' => 'our_team__255x255_'
            );
            print theme('image_style', $image);
            ?>
        </div>

        <div class="entry-professor-content col-md-8 col-sm-8 col-xs-12">
            <header>
                <h2 class="entry-title"><?php print $node->title ?></h2>
                <span><?php print $field_position[0]['value'] ?></span>
            </header>
            <p><?php print $field_description[0]['value'] ?></p>
            <ul class="social-links clearfix">
                <?php
                foreach ($field_links as $item) :
                    $str_replace = preg_replace('/\s+/', '-', $item['title']);
                    ?>
                    <li><a class="fa fa-<?php print strtolower($str_replace) ?>" href="<?php print $item['url'] ?>"></a></li>
                <?php endforeach ?>
            </ul>
        </div>

    </div>
    <!-- row -->

    <?php print (!empty($body)) ? $body[0]['value'] : '' ?>

</div>
<!-- entry-professor-box -->
