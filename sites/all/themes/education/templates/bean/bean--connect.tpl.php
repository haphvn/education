<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */

$bean = $variables['elements'];
$title = $bean['#entity']->title;
$field_links = $bean['#entity']->field_links['und'];
?>

<div class="widget kopa-social-widget">

    <h4 class="widget-title widget-title-s10"><?php print $title ?></h4>

    <ul class="clearfix">
        <?php
        $len = count($field_links);
        foreach ($field_links as $idx => $link) :
            $str_replace = preg_replace('/\s+/', '-', $link['title']);
            ?>
            <?php
            if ($idx == $len-1) {
            ?>
                <li class="gplus-icon">
                    <div>
                        <a href="<?php print $link['url'] ?>" class="fa fa-<?php print strtolower($str_replace) ?>"></a>
                        <p>5169</p>
                    </div>
                </li>
            <?php } else { ?>
                <li class="<?php print strtolower($str_replace) ?>-icon">
                    <div>
                        <a href="<?php print $link['url'] ?>" class="fa fa-<?php print strtolower($str_replace) ?>"></a>
                        <p>5169</p>
                    </div>
                </li>
            <?php } ?>
        <?php endforeach ?>
    </ul>

</div>
<!-- widget -->