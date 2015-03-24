(function($) {



    $(document).ready(function(){





    	var imageHeight = 1111;
    	var imageWidth = 6963;

    	var ratio = imageWidth / imageHeight;

    	var screenHeight  = $(window).innerHeight();

    	$("#backstage-image").height(screenHeight);
    	$("#backstage-image2").height(screenHeight);
    	$(".backstage").width(screenHeight * ratio);






 	});


 	




























  

})(jQuery);