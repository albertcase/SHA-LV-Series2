(function($) {



    $(document).ready(function(){

	  	var screenHeight  = $(window).innerHeight();
    	var screenWidth  = $(window).innerWidth();

    	$("#gif-image").height(screenHeight);
    	$("#gif-image").width("100%");
    	$("#jpg-image").width("100%");
    	$("#jpg-image").height(screenHeight);


		$('#gif-image').delay(1500).queue( function(next){ 
		    $(this).css("background-image", "url(./images/animation.gif?"+new Date().getTime()+")");
		     next(); 
		});
    	$( "#gif-image" ).delay(4900).fadeOut(600);

 	});

 	$(document).ready(function(){

 	});


 	


})(jQuery);