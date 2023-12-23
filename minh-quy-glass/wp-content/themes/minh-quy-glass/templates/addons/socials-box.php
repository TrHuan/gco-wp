<ul>
    <?php if( have_rows('socials', 'option') ): ?> 
        <?php while( have_rows('socials', 'option') ): the_row(); ?>
            <?php
                $title = get_sub_field('title', 'option');
                $url = get_sub_field('url', 'option');
                $icon_image = get_sub_field('icon_image', 'option');
                $icon_class = get_sub_field('icon_class', 'option');
            ?>

            <li>
                <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="Icon" target="_blank" rel="noopener">
                    <?php if ($icon_image || $icon_class) { ?>
                        <span class="icon">
                            <?php if ($icon_image) { ?>
                                <img src="<?php echo $icon_image; ?>" alt="Social"  width="60" height="60">
                            <?php } else { ?>
                                <i class="<?php echo $icon_class; ?>"></i>
                            <?php } ?>
                        </span>
                    <?php } ?>

                    <?php if ($title) { ?>
                        <span class="icon-title"><?php echo $title; ?></span>
                    <?php } ?>
                </a>
            </li>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>