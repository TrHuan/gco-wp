function actionMoreLess(){
    var boxOuter = ".data_more_less",
    boxInner = ".data_more_less_inner",
    boxBody = ".data_more_less_body",
    showMore = $(".action_more"),
    showLess = $(".action_less");
    $(boxInner).each(function(){
        var $this = $(this),
        bodyDataH = $this.find(boxBody).height();
        $this.css("max-height", $this.data("height"));
        var $thisH = $this.height();
        if(bodyDataH > $thisH){
            $this.closest(boxOuter).removeClass("action_disabled");
        } else {
            $this.closest(boxOuter).addClass("action_disabled");
        }
    })
    showMore.click(function(e){
        e.preventDefault();
        var $this = $(this),
        boxInnerH = $this.closest(boxOuter).find(boxInner).height(),
        boxInnerUpdate = boxInnerH + $this.closest(boxOuter).find(boxInner).data("increase-by"),
        boxBodyH = $this.closest(boxOuter).find(boxBody).height();
        setTimeout(function(){
            if(boxBodyH > boxInnerUpdate){
                $this.closest(boxOuter).removeClass("less_active").find(boxInner).css("max-height", boxInnerUpdate);
            } else {
                $this.closest(boxOuter).addClass("less_active").find(boxInner).css("max-height", "none");
            }
        },10);
    });
    showLess.click(function(e){
//         $(this).closest(boxOuter).removeClass("less_active").find(boxInner).css("max-height", $(this).closest(boxOuter).find(boxInner).data("height"));
        $(this).closest(boxOuter).removeClass("less_active").find(boxInner).css("max-height", $(this).closest(boxOuter).find(boxInner).data("height"));
//         $('html, body').animate({scrollTop:0}, 400);
		$('html, body').animate({
			scrollTop: $('.text-alls__pages').offset().top
		}, 400);
		return false;

    });
} actionMoreLess();