<?php
/**
 * @file
 * Returns the HTML for a Panels pane.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/2052505
 */
?>

<?php
if (in_array('administrator', array_values($user->roles))) {
    ?>
    <div class="<?php print $classes; ?>" <?php print $id; ?> <?php print $attributes; ?>>
        <?php print $admin_links; ?>
<!--        <h4 class="widget-title">--><?php //print $title; ?><!--</h4>-->
        <?php print render($content); ?>
    </div>
    <?php
} else {
    print render($content);
}
?>
