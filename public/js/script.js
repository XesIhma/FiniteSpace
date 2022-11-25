$(document).ready(function(){
	setTimeout(function() {
        $(".alert_box").fadeOut("slow") 
    }, 3000);

    $('.scroll_left').click(function() {
		event.preventDefault();
		$(this).siblings('.category_wraper').animate({
			scrollLeft: "-=400px"
		}, "slow");	
		});

		$('.scroll_right').click(function() {
			event.preventDefault();
			$(this).siblings('.category_wraper').animate({
				scrollLeft: "+=400px"
			}, "slow");
		});





	
	$('.category_wraper').scroll(function() {// Fires each time the container is scrolled
		var roller_width = $(this).children(".category_roller").outerWidth() -1;
    if($(this).scrollLeft() == 0) {
			$(this).siblings('.scroll_left').hide();// Fires when the container is at its left 
                                   // most scroll position
    }
    else if($('.scroll_left').css('display') != 'block') {
			$(this).siblings('.scroll_left').show(); // Fires when the container is at any other
                                   // scroll position and the element is hidden
    }
		if($(this).scrollLeft() >= roller_width - $(this).width()) {
			$(this).siblings('.scroll_right').hide();// Fires when the container is at its left 
																 // most scroll position
	}
	else if($('.scroll_right').css('display') != 'block') {
		$(this).siblings('.scroll_right').show(); // Fires when the container is at any other
																 // scroll position and the element is hidden
	}
}).scroll();

$(document).on("click",".td_item", function(){
	$(".position").hide();
	$("div#"+$(this).attr("data-showid")).show();
});

});