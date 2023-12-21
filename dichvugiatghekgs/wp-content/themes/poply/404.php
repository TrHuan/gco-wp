<?php get_header(); ?>

<section class="page-content"> 
	<div class="container">
		<style type="text/css">
		    .page-404 {
		        min-width: 50%;
		        padding: 0;
		        margin: auto;
		        text-align: center;
		    }
		    .page-404-text-err {
		        font-size: 80px;
		        text-align: center;
		        font-weight: bold;
		        display:block;
		        line-height: 1.5em;
	            margin-top: 70px;
		    }
		    .page-404-title{
		    	font-size: 2em;
		    }
		    .page-404-title2 {
			    display: block;
			    margin: 20px 0 40px;
			}
		</style>

		<div class="page-404">
	        <span class="page-404-text-err">
	        	404
	        </span>
	        <h1 class="page-404-title">
	        	<?php _e('Không tìm thấy trang', 'text_domain'); ?>
	        </h1>
	        <p>
	        	<a title="back to home" class="page-404-title2" href="<?php echo get_option('home');?>">
	        		<?php _e('Quay lại trang chủ', 'text_domain'); ?>
	        	</a>
	        </p>
		</div>
	</div>
</section>

<?php get_footer(); ?>