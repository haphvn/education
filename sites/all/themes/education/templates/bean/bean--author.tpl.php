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
global $base_url;
$bean = $variables['elements'];
$title = $bean['#entity']->title;
$desc = $bean['#entity']->field_description['und'][0]['value'];
$field_image = $bean['#entity']->field_image['und'][0];
$field_links = $bean['#entity']->field_links['und'];
?>

<div class="about-author">
    <div class="author-avatar pull-left">
        <a href="#">
            <?php
            $image = array(
                'path' => $field_image['uri'],
                'alt' => $field_image['alt'],
                'title' => $field_image['title'],
                'style_name' => 'avatar__100x108_'
            );
            print theme('image_style', $image);
            ?>
        </a>
    </div>
    <div class="author-content">
        <h5><a href="#"><?php print $title ?></a></h5>
        <p><?php print $desc ?></p>
        <ul class="social-links clearfix">
            <?php
            foreach ($field_links as $link) :
                $str_replace = preg_replace('/\s+/', '-', $link['title']);
                ?>
                <li><a href="<?php print $link['url'] ?>" class="fa fa-<?php print strtolower($str_replace) ?>"></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<!-- about-author -->
