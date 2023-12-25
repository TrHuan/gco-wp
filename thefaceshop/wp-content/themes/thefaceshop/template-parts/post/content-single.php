 <div class="blog-hero-img mb-40">
    <img class="full-img" src="<?php echo lth_custom_img('full', 850, 398);?>" alt="blog-details">
    <div class="entry-meta">
        <div class="date">
            <p><span><?php the_time('d'); ?></span> <?php the_time('m, Y'); ?></p>
        </div>
    </div>
</div>

<div class="text-upper-portion">
    <h1 class="blog-dtl-header portfolio-header"><?php the_title(); ?></h1>
    <ul class="meta-box">
        <li class="meta-date"><span><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('d/m/Y'); ?></span></li>
        <li><i class="fa fa-user" aria-hidden="true"></i>Bởi <a href="#"> <?php the_author( ); ?></a></li>
    </ul>
    <div class="post-content">
	    <?php the_content(); ?>
	</div>
</div> 

<div class="tags-social d-md-flex justify-content-sm-between ">
    <div class="tags">
        <ul class="d-flex">
        	<li class="t-list">Tags:</li>

        	<?php
				$posttags = get_the_tags();
				if ($posttags) {
					foreach($posttags as $tag) { ?>
						<li><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a></li>
					<?php }
				}
			?>
        </ul>
    </div>
    <div class="blog-social">
        <ul class="d-flex">
            <li class="t-list">Chia sẻ:</li>
            <li>
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="119" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

            	<a href="#">Facebook</a>
            </li>
            <li>
            	<a class="twitter-share-button" href="https://twitter.com/intent/tweet?<?php the_permalink(); ?>">Twetter</a>
            </li>
            <li>
            	<a href="https://plus.google.com/share?url=<%= url %>">Google+</a>
            	<meta content="<%= title %>" property="og:title"/>
				<meta content="article" property="og:type"/>
				<meta content="<%= url %>" property="og:url"/>
				<meta content="<%= img  %>" property="og:image"/>
				<meta content="<%= desc %>" property="og:description"/>
            </li>
        </ul>
    </div>
</div>
<div class="blog-pagination">
    <ul class="pagination">
        <li><?php previous_post_link( '%link',  __( 'Trước' ), true ); ?></li>
        <li class="ml-auto"><?php next_post_link( '%link',  __( 'Sau' ), true ); ?></li>
    </ul>
</div>

<!-- Comment Area Start -->
<div class="comments-area pt-80">
   <h3 class="sidebar-header">Bình luận</h3>
    <!-- Single Comment Start -->
    <div class="single-comment">
        <div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=897190940472200&autoLogAppEvents=1" nonce="IF8UVuqi"></script>

		<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#<?php the_permalink(); ?>" data-width="870" data-numposts="5"></div>
    </div>
    <!-- Single Comment End -->
</div>
<!-- Comment Area End -->