
<?php if (has_post_thumbnail()) { ?>
    <img src="<?php echo lth_custom_img('full', 870, 485);?>" alt="Awesome Image">
<?php } ?>
<h1 class="blog-title"><?php the_title(); ?></h1>
<ul class="meta-info">
    <li><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(	); ?></a></li>
    <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#"><?php the_time('F j, Y'); ?></a></li>
    <li>
    	<i class="fa fa-folder-open-o" aria-hidden="true"></i>

    	<?php
	        $terms = get_the_terms( $post->ID, 'category' );
 
			if ( $terms && ! is_wp_error( $terms ) ) :
			 
			    foreach ( $terms as $term ) { ?>

			        <a href="<?php echo get_term_link($term, 'category'); ?>" title="<?php echo $cat = $term->name;; ?>"><?php echo $cat = $term->name;; ?></a>

			    <?php }

			endif; 
		?>		
    </li>
    <li><i class="fa fa-comments" aria-hidden="true"></i><a href="#">14</a></li>
</ul>

<div class="post-content">
    <?php the_content(); ?>
</div>

<!--Start tag and social share box-->
<div class="tag-social-share-box">
    <div class="row">
        <div class="col-md-12">
            <div class="tag pull-left">
                <p><span>Tags:</span> 
                	<?php
						$posttags = get_the_tags();
						if ($posttags) {
						  foreach($posttags as $tag) { ?>
						    <a href="<?php echo get_tag_link($tag->term_id); ?>">
						    	<?php echo $tag->name . ', '; ?>				    		
						    </a>
						  <?php }
						}
					?>
                </p>
            </div>
            <div class="social-share pull-right">
                <h5>Share<i class="fa fa-share-alt" aria-hidden="true"></i></h5>
                <ul class="social-share-links">
                    <li>
                    	<a href="#">
                    		<i class="fa fa-facebook" aria-hidden="true"></i>
                    		<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>" width="76" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" class="share-hidden"></iframe>
                    	</a>
                    </li>
                    <li>
                    	<a href="#">
                    		<i class="fa fa-twitter" aria-hidden="true"></i>
                    		<a class="twitter-share-button share-hidden"
							  href="<?php the_permalink(); ?>" target="_blank">
							Tweet</a>
                    	</a>
                    </li>
                    <li>
                    	<a href="#">
                    		<i class="fa fa-google-plus" aria-hidden="true"></i>
                    		<a href="https://plus.google.com/share?url={<?php the_permalink(); ?>}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="share-hidden"><img src="https://www.gstatic.com/images/icons/gplus-64.png" alt="Share on Google+"/></a>
	                    </a>
	                </li>
                    <li>
                    	<a href="#">
	                    	<i class="fa fa-linkedin" aria-hidden="true"></i>
	                    </a>
	                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End tag and social share box-->

<?php global $userdata; ?>

<?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url  = get_edit_profile_url($user_id); ?>
	<!--Start author box-->
	<div class="author-box">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="img-holder">
	                <a href="<?php if (class_exists( 'WooCommerce' )) {echo get_permalink( wc_get_page_id( 'myaccount' ) );} else {echo $profile_url;} ?>">
		                <?php echo get_avatar($userdata->ID); ?>
		            </a>
	            </div>
	            <div class="text-holder">
	                <h3><?php if ($userdata->nickname && !class_exists( 'WooCommerce' )) {echo $userdata->nickname;} else {echo $userdata->display_name;}  ?></h3>
	                <p><?php echo $userdata->description; ?></p>
	                <ul class="social-link">
	                    <li><a href="<?php echo $userdata->facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	                    <li><a href="<?php echo $userdata->twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                    <li><a href="<?php echo $userdata->googleplus; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
	                    <li><a href="<?php echo $userdata->youtube; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
	<!--End author box-->
<?php } ?>

<?php require_once(THEME_DIR . '/comments.php'); ?>