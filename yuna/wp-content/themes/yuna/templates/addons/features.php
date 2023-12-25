<?php while( have_rows('features','option') ): the_row(); ?>
	<div class="col-md-4 col-sm-6">
        <div class="d-flex align-items-center intro-bitem">
            <img src="<?php the_sub_field('image') ?>" title="" alt="Feature">

            <div class=" intro-item">
                <h2 class="bold text-uppercase"><?php the_sub_field('text_1') ?></h2>
                <h3 class="op7 s15"><?php the_sub_field('text_2') ?></h3>
            </div>
        </div>
    </div>
<?php endwhile; ?>