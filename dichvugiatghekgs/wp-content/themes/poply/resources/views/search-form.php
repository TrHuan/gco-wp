<div class="search-box">

	<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
	    <input type="text" class="form-control" required="required" placeholder="<?php _e('Tìm kiếm...', 'text_domain'); ?>" name="s" value="<?php echo get_search_query(); ?>">
	    <button type="submit" class="btn search-icon">
	    	<i class="fa fa-search"></i>
	    </button>
	</form>
	
</div>