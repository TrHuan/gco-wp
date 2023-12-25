jQuery(document).ready(function($) {

	$('.shop-system-select .item-1 select').change(function () {
		var id = $(this).val();
		var text = $('option:selected', this).val();
		$('.shop-system-select .item-2 select').removeClass('active');
		$('.shop-system-select .item-2 .' + text).addClass('active');
		$('.shop-systems .woodmart-list').removeClass('active');
		$('.shop-systems .woodmart-list.' + text).addClass('active');
	});

	$('.shop-system-select .item-2 select').change(function () {
		var id = $(this).val();
		var text = $('option:selected', this).val();
		$('.shop-systems .woodmart-list').removeClass('active');
		$('.shop-systems .woodmart-list.' + text).addClass('active');
	});

	var hscldd = $('.recruitment-single .module_content .post-content .dia-diem > ul').hasClass('sub-dia-diem');
	if (hscldd) {
		var lgndd = $('.recruitment-single .module_content .post-content .sub-dia-diem li').length;
		$('.recruitment-single .module_content .post-content .dia-diem > span').append('<span class="number-dia-diem">Xem '+lgndd+' địa điểm làm việc khác <i class="icofont-simple-down"></i></span>');
	}

	$(document).on('click', '.recruitment-single .module_content .post-content .number-dia-diem', function (e) {
		$(this).parent().parent().addClass('active');
		$(this).remove();
    });

    $('.videos-box .elementor-widget-image a').click(function(e){
    	e.preventDefault();
    	var hr = $(this).attr('href');
    	var html = '<div class="popup-video"><div class="content"><i class="icofont-close"></i><iframe width="889" height="500" src="'+hr+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>'
    	$('.videos-box').append(html);
    });

    $(document).on('click', '.videos-box .popup-video .content > i', function (e) {
		$('.videos-box .popup-video').remove();
    });

    $('.frequently_asked_questions label').click(function(e){
    	e.preventDefault();
    	
    	$(this).toggleClass('active');
    	$(this).next().slideToggle('slow');
    });

});