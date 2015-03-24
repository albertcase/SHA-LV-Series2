(function($) {



    $(document).ready(function(){





    	var imageHeight = 670;
    	var imageWidth = 3951;

    	var ratio = imageWidth / imageHeight;


    	var screenHeight  = $(window).innerHeight();
    	var screenWidth  = $(window).innerWidth();

    	$("#dialog").height(screenHeight);
		$("#dialog").width(screenWidth);
		$("#dialog").css("left", "0px");

    	$("#backstage-image").height(screenHeight);
    	$("#backstage-image2").height(screenHeight);
    	$(".backstage").width(screenHeight * ratio+1);
        $(".backstage").height(screenHeight);








 	});



})(jQuery);