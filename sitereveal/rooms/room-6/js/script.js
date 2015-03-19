(function($) {



    $(document).ready(function(){


    	var widthImage= 360;
    	var heightImage= 720;
    	var ratio =  heightImage / widthImage;

		var totalImages = 100;
		var images = new Array();		

		var time = 10;
		var timeI =0;

		for(var i = 1; i < 101; i++) {
			var filename = i + '.jpg';
			var img = new Image;
			img.src = 'images/' + filename;
			images.push(img);
		}

		var currentLocation = 0;
		$("#background").css("background-image", "url("+images[1].src+")");

		function setImage(newLocation) {

			$("#background").css("background-image", "url("+images[newLocation].src+")");
			//context.drawImage(images[newLocation], 0, 0);
		}
		
		/*
		var currentMousePos = false;
		window.addEventListener('mousemove', function(e) {
		currentMousePos = e.x;
		currentLocation = Math.floor(
		(images.length / $(window).width()) *
		currentMousePos
		);
		setImage(currentLocation);
		});
		*/








		    //var startingY = e.originalEvent.touches[0].pageY;
		    timeout = setTimeout(function() {    longtouch = true;  }, 300);
		    var time = 0;
		    $("body").swipe( {


			   swipeStatus:function(event, phase, direction, distance, duration, fingers) {
            
	            //console.log(" Your have swiped " + distance + " px so far");
	           
	            if(distance % 4 ===0 ){	 

	            	 if(direction=="up"){
	            	 	console.log("up");
	            		currentLocation -= 1;
						if(currentLocation < 1) currentLocation = 100;
						setImage(currentLocation);


	            	 }else{
	            	 	console.log("down");
				        currentLocation += 1;
						if(currentLocation > 100) currentLocation = 1;
						setImage(currentLocation);
	            	 }
	            }
	           
	          },

			  	threshold:10,
          		cancelThreshold:1
			});






 	});
  

})(jQuery);