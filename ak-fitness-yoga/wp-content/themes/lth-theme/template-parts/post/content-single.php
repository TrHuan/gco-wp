<div class="blog-hero-img mb-40">
    <img src="<?php echo lth_custom_img('full', 850, 398);?>" width="850" height="398" alt="<?php the_title(); ?>">
    <div class="entry-meta">
        <div class="date">
            <p><span><?php the_time('d'); ?></span> <?php echo __('tháng'); ?> <?php the_time('m'); ?>, <?php the_time('Y'); ?></p>
        </div>
    </div>
</div>

<div class="text-upper-portion">
	<h1 class="blog-dtl-header portfolio-header">
		<?php the_title(); ?>
	</h1>
    <ul class="meta-box meta-blog d-flex">
        <li class="meta-date"><span><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('d m Y'); ?></span></li>
        <li><i class="fa fa-user" aria-hidden="true"></i><?php echo __('Bởi'); ?> <a href="#"> <?php the_author(	); ?></a></li>
    </ul>

    <?php the_content(); ?>

    <div class="tags-social d-md-flex justify-content-sm-between ">
        <div class="tags">
            <ul class="d-flex">
                <li class="t-list"><?php echo __('Tags:'); ?></li>                
                <?php
				$posttags = get_the_tags();
				if ($posttags) {
					foreach($posttags as $tag) { ?>					    
					    <li><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name . ', ';  ?></a></li>
					<?php }
				}
				?>
            </ul>
        </div>
        <div class="blog-social social-box">
            <ul class="d-flex">
                <li class="t-list"><?php echo __('Chia sẻ:'); ?></li>
                <li>
                	<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>%2Fdocs%2Fplugins%2F&layout=button&size=small&width=76&height=20&appId" width="76" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                	<a href="#"><?php echo __('Facebook,'); ?></a>
                </li>
                <li>
                	<a class="twitter-share-button"
					  href="http://twitter.com/share?text=Im Sharing on Twitter&url=<?php the_permalink(); ?>">
					<?php echo __('Tweet,'); ?></a>
                </li>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><?php echo __('Google+'); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="blog-pagination">
        <ul class="pagination next-post">
            <li><?php next_post_link( '%link', __( '<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Trước', 'textdomain' ), true ); ?></li>
            <li class="ml-auto"><?php previous_post_link( '%link', __( 'Sau <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'textdomain' ), true ); ?></li>
            <div class="previous-post"></div>
        </ul>
    </div>
</div>

<?php comments_template(); ?> 