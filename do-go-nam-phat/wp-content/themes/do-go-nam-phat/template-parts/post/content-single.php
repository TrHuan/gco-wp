
<h1 class="post-name">
	<?php the_title(); ?>
</h1>

<div class="post-meta">
	<p class="date"><?php the_time('d/m/Y'); ?></p>

	<div class="post-share">
		<label><?php echo __('Chia sẻ: '); ?></label>
        <ul class="d-flex">
            <li>
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="119" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

            	<a href="#"><i class="icofont-facebook"></i></a>
            </li>
            <li>
            	<a class="twitter-share-button" href="https://twitter.com/intent/tweet?<?php the_permalink(); ?>"><i class="icofont-twitter"></i></a>
            </li>
            <li>
            	<a href="#"><i class="icofont-linkedin"></i></a>

            	<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
				<script type="IN/Share" data-url="https://www.linkedin.com"></script>
            </li>
        </ul>
    </div>
</div>		    

<div class="post-content">
    <?php the_content(); ?>
</div>

<?php //comments_template(); ?> 