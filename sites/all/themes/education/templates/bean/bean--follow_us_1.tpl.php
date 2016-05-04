<?php
/**
 * @file
 * Created by haph on 1/14/16
 */

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$field_links = $bean['#entity']->field_links['und'];
?>

<div class="widget kopa-social-link-widget">

    <h4 class="widget-title"><?php print $title ?></h4>

    <ul class="social-nav model-2 clearfix">
        <?php
        foreach ($field_links as $item) :
            $str_replace = preg_replace('/\s+/', '-', $item['title']);
        ?>
            <li><a href="<?php print $item['url'] ?>" class="<?php print strtolower($str_replace) ?>"><i class="fa fa-<?php print strtolower($str_replace) ?>"></i></a></li>
        <?php endforeach ?>
    </ul>

</div>
<!-- kopa-social-link-widget -->
