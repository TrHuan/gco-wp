<?php
	$archive_page = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'templates/nop-don-ung-tuyen.php'
        )
    );
    $archive_id = $archive_page[0]->ID;
    $get_permalink = get_permalink( $archive_id );
?>

<h1 class="post-name">
	<?php the_title(); ?>
</h1>

<div class="post-content">
	<ul>
		<?php if( have_rows('noi_dung_tuyen_dung') ): ?>
		    <?php while( have_rows('noi_dung_tuyen_dung') ): the_row(); 
		        // Get sub field values.
		        $so_luong_tuyen = get_sub_field('so_luong_tuyen');
		        $thu_nhap = get_sub_field('thu_nhap');
		        $hinh_thuc_lam_viec = get_sub_field('hinh_thuc_lam_viec');
		        $thoi_gian_lam_viec = get_sub_field('thoi_gian_lam_viec');
		        $han_nop_ho_so = get_sub_field('han_nop_ho_so');
		    ?>
    			<li>
    				<?php echo __('Số lượng tuyển: '); ?>
    				<?php echo $so_luong_tuyen; ?>
    			</li>
    			<li>
    				<?php echo __('Thu nhập: '); ?>
	    			<?php echo $thu_nhap; ?>
    			</li>
    			<li>
    				<?php echo __('Hình thức làm việc: '); ?>
    				<?php echo $hinh_thuc_lam_viec; ?>
    			</li>
    			<li>
    				<?php echo __('Thời gian làm việc: '); ?>
	    			<?php echo $thoi_gian_lam_viec; ?>
    			</li>
    			<li class="dia-diem">
    				<span><?php echo __('Địa điểm làm việc: '); ?></span>
    				
    				<?php if( have_rows('dia_diem_lam_viec') ): ?>
    					<ul class="sub-dia-diem">
						    <?php while( have_rows('dia_diem_lam_viec') ): the_row(); 
						        // Get sub field values.
						        $dia_diem = get_sub_field('dia_diem'); ?>
						        <li>
					    			<?php echo $dia_diem; ?>
				    			</li>
						    <?php endwhile; ?>
					    </ul>
					<?php endif; ?>
    			</li>
    			<li>
    				<?php echo __('Hạn nộp hồ sơ: '); ?>
	    			<?php echo $han_nop_ho_so; ?>
    			</li>
			<?php endwhile; ?>
		<?php endif; ?>
	</ul>

	<div class="post-button">
		<a href="<?php echo $get_permalink; ?>" title="" class="btn"><?php echo __('Nộp đơn ứng tuyển'); ?></a>
	</div>
</div>

<div class="post-mo-ta">
	<h2 class="post-name">
		<?php echo __('Mô tả công việc'); ?>
	</h2>

	<div class="post-content">
		<?php echo get_field('mo_ta_cong_viec_tuyen_dung'); ?>
	</div>
</div>

<div class="post-yeu-cau">
	<h2 class="post-name">
		<?php echo __('Yêu cầu'); ?>
	</h2>
	
	<div class="post-content">
		<?php echo get_field('yeu_cau_tuyen_dung'); ?>
	</div>
</div>

<div class="post-quyen-loi">
	<h2 class="post-name">
		<?php echo __('Quyền lợi'); ?>
	</h2>
	
	<div class="post-content">
		<?php echo get_field('quyen_loi_tuyen_dung'); ?>
	</div>
</div>

<div class="post-button">
	<a href="<?php echo $get_permalink; ?>" title="" class="btn"><?php echo __('Nộp đơn ứng tuyển'); ?></a>
</div>