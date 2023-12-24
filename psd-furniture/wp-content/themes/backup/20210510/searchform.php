<?php
/**
 * Box search
 * 
 * @author le-trong-huan (trhuan177@gmail.com)
 * @since 2020
 */
?>

<div class="search-box">
	<div class="content-box">
		<div class="search-container">
			<div class="search-close" >
				<a href="javascript:0" title=""><i class="icofont-close icon icon"></i></a>
			</div>
				
			<form role="search" method="get" class="forms search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="form-content">
					<div class="form-group">
						<input type="text"  name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control">
					</div>
					<div class="form-group">
						<!-- <button class="btn btn-search" aria-label="Search"><i class="icofont-search icon"></i></button> -->
						<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
						<!-- <input type="hidden" name="post_type" value="project||post"> -->
					</div>
				</div>    
			</form>
		</div>
	</div>
</div>