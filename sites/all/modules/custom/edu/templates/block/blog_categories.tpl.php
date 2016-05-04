<?php
/**
 * Created by haph on 12/18/15
 */

?>

<div class="widget widget_categories">

    <h4 class="widget-title widget-title-s10"><?php print t('Blog Categories') ?></h4>

    <ul>
        <?php
        foreach ($tids as $tid) :
            $term = taxonomy_term_load($tid);
            $term_uri = taxonomy_term_uri($term); // get array with path
            $term_title = taxonomy_term_title($term);
            $term_path = $term_uri['path'];
            $link = l($term_title, $term_path);
        ?>
        <li class=""><?php print $link ?></li>
        <?php endforeach ?>
    </ul>

</div>
<!-- widget -->
