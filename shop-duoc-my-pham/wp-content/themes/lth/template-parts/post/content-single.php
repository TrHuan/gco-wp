

<div class="post-content">
	<?php if (has_post_thumbnail()) { ?>
	    <div class="post-image">
	        <img src="<?php echo lth_custom_img('full', 928, 529);?>" width="928" height="529" alt="<?php the_title(); ?>">
	    </div>
	<?php } ?>

	<ul class="post-meta">
	    <li>
	        <i class="fal fa-calendar-alt icon"></i> <span><?php the_time('d'); ?> <?php echo __('Thg '); the_time('m,'); ?> <?php the_time('Y'); ?></span>
	    </li>

	    <li class="poster">
	        <span><?php the_author(	); ?></span>
	    </li>
	</ul>	

	<h1 class="post-name">
		<?php the_title(); ?>
	</h1>    	

	<div class="post-excerpt">
    	<?php the_excerpt(); ?>		    	
    </div>

    <div class="content">
    	<?php the_content(); ?>
    </div>
</div>

<div class="share-box">
	<label><?php echo __('Chia sẻ '); ?></label>
	<ul>
		<li>
			<p class="icon">
				<img src="<?php echo ASSETS_URI; ?>/images/icon-06.png" alt="Icon">

				<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="76" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
			</p>
		</li>
		<li>
			<a href="https://www.instagram.com/" class="icon">
				<img src="<?php echo ASSETS_URI; ?>/images/icon-07.png" alt="Icon">
			</a>
		</li>
	</ul>
</div>

<div class="paginations paginations-2">
    <div class="pagination">
        <?php echo previous_post_link('%link','Bài viết trước'); ?>
        <?php echo  next_post_link('%link','Bài viết sau'); ?>
    </div>
</div>