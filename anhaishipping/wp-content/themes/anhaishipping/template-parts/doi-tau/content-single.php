
<h1 class="title post-name">
	<?php the_title(); ?>
</h1>

<?php if( have_rows('information_fleet') ):
	while( have_rows('information_fleet') ) : the_row(); ?>
		<div class="post-meta">

			<ul>
				<li>
					<label><?php echo __('Imo: '); ?></label>
			    	<?php echo get_sub_field('imo'); ?>
			    </li>
				<li>
					<label><?php echo __('Built: '); ?></label>
			    	<?php echo get_sub_field('built'); ?>
			    </li>
			    <li>
			    	<label><?php echo __('Flag: '); ?></label>
			    	<?php echo get_sub_field('flag'); ?>
				</li>
			    <li>
			    	<label><?php echo __('Class: '); ?></label>
			    	<?php echo get_sub_field('class'); ?>
				</li>
				<li>
					<label><?php echo __('Dwt: '); ?></label>
			    	<?php echo get_sub_field('dwt'); ?>
			    </li>

			    <?php
			    if( have_rows('other') ):
					while( have_rows('other') ) : the_row(); ?>
						<li>
					    	<?php echo get_sub_field('content'); ?>
					    </li>
					<?php endwhile;
				endif; ?>
			</ul>
		</div>
	<?php endwhile;
endif; ?>   

<div class="post-button">
	<a href="<?php the_field('upload_file_detail_fleet'); ?>" title="download" class="btn btn-download" download>
		<img src="<?php echo ASSETS_URI; ?>/images/icon-15.png" alt="Download">
		<?php echo __('Tải xuống chi tiết'); ?>
	</a>
</div>

<div class="post-content">
    <?php the_content(); ?>
</div>

<div class="post-album-image">
	<h2 class="title">
		<?php echo __('Album '); the_title(); ?>
	</h2>

	<?php 
	$images = get_field('album_image_fleet');
	if( $images ): ?>
	    <ul>
	        <?php foreach( $images as $image ): ?>
	            <li>
	            	<a href="#" title="" data_popup="album-image-fleet">
	            		<img src="<?php echo $image; ?>" alt="Image">
	            	</a>
	            </li>
	        <?php endforeach; ?>
	    </ul>
	<?php endif; ?>
</div>

<?php //comments_template(); ?> 