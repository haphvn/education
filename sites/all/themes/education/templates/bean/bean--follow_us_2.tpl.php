<?php
/**
 * @file
 * Created by haph on 1/14/16
 */

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$field_links = $bean['#entity']->field_links['und'];
?>

<div class="widget kopa-social-link-2-widget">

    <h4 class="widget-title"><?php print $title ?></h4>

    <ul class="social-links clearfix">
        <?php
        foreach ($field_links as $item) :
            $str_replace = preg_replace('/\s+/', '-', $item['title']);
        ?>
            <li><a class="fa fa-<?php print strtolower($str_replace) ?>" href="<?php print $item['url'] ?>"></a></li>
        <?php endforeach ?>
    </ul>

</div>
<!-- kopa-social-link-widget -->
