<?php
/**
 * @file
 */
?>
<li <?php print ($item['link']['link_title'] == 'Mega menu') ? 'class="mega-menu"' : "" ?>>
    <a href="<?php print in_array($item['link']['href'], array('<nolink>')) ? "#" : url($item['link']['href'], $item['link']['options']); ?>">
        <?php print t($item['link']['title']); ?>
        <?php if (!empty($item['link']['options']['attributes']['title'])) : ?>
            <span class="menu-description"><?php print t($item['link']['options']['attributes']['title']); ?></span>
        <?php endif; ?>
    </a>
    <?php print $submenu ? $submenu : ""; ?>
</li>
