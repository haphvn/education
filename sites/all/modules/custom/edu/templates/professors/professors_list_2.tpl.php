<?php
/**
 * Created by haph on 12/15/15
 */
?>
<div class="widget kopa-professor-list-2-widget">
    <ul class="clearfix">

        <?php
        foreach ($nodes as $node) :
            $field_image = field_get_items('node', $node, 'field_image');
            $field_position = field_get_items('node', $node, 'field_position');
            $field_desc = field_get_items('node', $node, 'field_description');
            $field_links = field_get_items('node', $node, 'field_links');
        ?>
        <li>
            <article class="entry-item row clearfix">

                <div class="entry-thumb col-md-4 col-sm-4 col-xs-12">
                    <a href="<?php print url('node/'.$node->nid) ?>">
                        <?php
                        $image = array(
                            'path' => $field_image[0]['uri'],
                            'alt' => $field_image[0]['alt'],
                            'title' => $field_image[0]['title'],
                            'style_name' => 'our_team__255x255_'
                        );
                        print theme('image_style', $image);
                        ?>
                    </a>
                </div>

                <div class="entry-content col-md-8 col-sm-8 col-xs-12">
                    <header>
                        <h2 class="entry-title"><a href="<?php print url('node/'.$node->nid) ?>"><?php print $node->title ?></a></h2>
                        <span><?php print $field_position[0]['value'] ?></span>
                    </header>
                    <p><?php print $field_desc[0]['value'] ?></p>
                    <ul class="social-links clearfix">
                        <?php
                        foreach ($field_links as $item) :
                            $str_replace = preg_replace('/\s+/', '-', $item['title']);
                            ?>
                            <li><a class="fa fa-<?php print strtolower($str_replace) ?>" href="<?php print $item['url'] ?>"></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>

            </article>
            <!-- entry-item -->
        </li>
        <?php endforeach ?>

    </ul>
    <?php print theme('pager', array('quantity', count($nodes))); ?>
</div>
