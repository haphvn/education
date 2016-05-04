<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php foreach (array_chunk($rows, 2) as $id => $item) : ?>
    <div class="row">
        <?php foreach ($item as $row) : ?>
            <?php print $row; ?>
        <?php endforeach ?>
    </div>
<?php endforeach; ?>