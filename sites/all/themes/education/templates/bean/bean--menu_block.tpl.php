<?php
/**
 * @file
 * Created by haph on 1/14/16
 */

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$field_links = $bean['#entity']->field_links['und'];
?>

<div class="widget clearfix widget_nav_menu">

    <h4 class="widget-title widget-title-s10"><?php print $title ?></h4>
    <div class="menu-menu-container">
        <ul class="menu">
            <?php
            foreach ($field_links as $item) :
            ?>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php print $item['url'] ?>"><?php print $item['title'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<!-- widget -->
