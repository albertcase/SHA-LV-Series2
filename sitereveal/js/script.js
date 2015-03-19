/**
 * multiscroll.js 0.1.5 Beta
 * https://github.com/alvarotrigo/multiscroll.js
 * MIT licensed
 *
 * Copyright (C) 2013 alvarotrigo.com - A project by Alvaro Trigo
 */

(function($) {
	$(document).ready(function(){

		/*** -------------------------------- 

				ROOMS

		-------------------------------- ***/

		$('.btn-play.open').click(function() {
			var rightPart = $(this).parents(".ms-section").attr("data-right");
			console.log(rightPart);
			$(".content-slide").animate({opacity: "0"}, 5);
			$(this).parents(".content-slide").animate({opacity: "0"}, 5);
			$('.ms-left ').animate({left: "-50%"}, 500);
			$('.ms-right ').animate({right: "-50%"}, 500);
			var link = $(this).attr("data-link");
			$('#controls').animate({opacity: "0"}, 1000, function(){
				document.location.href=link;
				$('.ms-left ').delay(2000).animate({left: "0%"}, 0);
				$('.ms-right ').delay(2000).animate({right: "0%"}, 0);
				$('#controls').delay(2000).animate({opacity: "1"}, 0);
				$(".content-slide").delay(2000).animate({opacity: "1"}, 100);
			});
		});

		$('.btn-play.video').click(function() {
			var link = $(this).attr("data-link");
			var data_id = $(this).attr("data-id");
			$(this).append("<video width='400' height='222' controls='controls' id='"+data_id+"'><source src='"+link+"' type='video/mp4' /></video>");
			$('#'+data_id+'').get(0).play();
			//document.location.href=link;

		});
		$("#mypanel").height($(window).height());		
		$("#grid-collection #mypanel").height($(window).height());		

		
		$(".ui-panel-inner").height($(window).height());
		$("#grid-collection #mypanel .ui-panel-inner").height($(window).height());


		/*** -------------------------------- 

				LA COLLECTION

		-------------------------------- ***/

		$("#introduction-collection").height($(window).height());
		$("#introduction-collection").width($(window).width());
		$(".grid").height($(window).height());
		$("#look-detail article").height($(window).height());



		/*** -------------------------------- 

				SECTION UGC - VIDEO 

		-------------------------------- ***/


		function readURL(input) {
	        if (input.files && input.files[0]) {
				$("#loader-video").show();
	        	ID_VAR = $(input).attr("id");
				var morientation=0;
				var mtextarea=0;
				if(ID_VAR=="photo-1"){morientation=$("#orientation_image1");mtextarea=$("#base64_img1");}
				if(ID_VAR=="photo-2"){morientation=$("#orientation_image2");mtextarea=$("#base64_img2");}
				if(ID_VAR=="photo-3"){morientation=$("#orientation_image3");mtextarea=$("#base64_img3");}
				var img = document.createElement("img");
	            var reader = new FileReader();
				var cssRotate=0;
				
	            reader.onloadend=function(d) {};
	            
	            reader.onload = function (e) {
					 var img = new Image();
					 img.src = e.target.result;
					 
					 
					   EXIF.getData(input.files[0], function() {
						var image_orientation=EXIF.getTag(this, "Orientation");
						
							
						
							if(image_orientation==3)cssRotate=180;
							if(image_orientation==6)cssRotate=90;
							if(image_orientation==8)cssRotate=-90;
						
											 
							 
							 morientation.val(image_orientation);
							 
							 
							
							 //After save exif infos => compression
							 var canvas = document.createElement('canvas');
							 var ctx = canvas.getContext("2d");
							 ctx.drawImage(img, 0, 0);
							 var MAX_HEIGHT = 750;
							 var MAX_WIDTH = 750;
							 var width = img.width;
							 var height = img.height;
							 
							 if (width > height) {
								  if (width > MAX_WIDTH) {
									height *= MAX_WIDTH / width;
									width = MAX_WIDTH;
								  }
								} else {
								  if (height > MAX_HEIGHT) {
									width *= MAX_HEIGHT / height;
									height = MAX_HEIGHT;
								  }
								}
							canvas.width = width;
							canvas.height = height;
							var ctx = canvas.getContext("2d");
							ctx.drawImage(img, 0, 0, width, height);
							
							var dataurl = canvas.toDataURL("image/jpeg",70);
							
							$('#'+ID_VAR).parents(".photos").removeAttr('style');
							$('#'+ID_VAR).parents(".photos").css('background-image', 'url('+dataurl+')'); 
							
							$('#'+ID_VAR).parents(".photos").css({
								  '-moz-transform':'rotate('+cssRotate+'deg)',
								  '-webkit-transform':'rotate('+cssRotate+'deg)',
								  '-o-transform':'rotate('+cssRotate+'deg)',
								  '-ms-transform':'rotate('+cssRotate+'deg)',
								  'transform': 'rotate('+cssRotate+'deg)'
							 });
							 
							 if(image_orientation==6 || image_orientation==8){
								 var h = $('#'+ID_VAR).parents(".photos").css("height");
								 var w = $('#'+ID_VAR).parents(".photos").css("width");
								 $('#'+ID_VAR).parents(".photos").css("height","90px");
								 $('#'+ID_VAR).parents(".photos").css("width", "90px");
							 }
							
							mtextarea.val(dataurl);
							//console.log(mtextarea.val());
							$("#loader-video").hide();
						
						});
					 
					
					//$('#'+ID_VAR+"-preview").attr('src', e.target.result);
	            }
	            
	            reader.readAsDataURL(input.files[0]);
				
	        }
	    }
	    
	    $(".file-photo").change(function(){
	        readURL(this);
	    });


	    /** Verification des videos **/
   		$("#preview-btn").on( "click", function(e) {

			var photo_1 = $("#photo-1").val();
			var photo_2 = $("#photo-2").val();
			var photo_3 = $("#photo-3").val();
			if (photo_1 == '' || photo_2 == '' || photo_3 == '') {
				
				
	    		e.preventDefault();

	    		if(photo_1 == ''){ $("#photo-1").parents('.photos').addClass("error-photo");}else{ $("#photo-1").parents('.photos').removeClass("error-photo"); }
	    		if(photo_2 == ''){ $("#photo-2").parents('.photos').addClass("error-photo");}else{ $("#photo-2").parents('.photos').removeClass("error-photo"); }
	    		if(photo_3 == ''){ $("#photo-3").parents('.photos').addClass("error-photo");}else{ $("#photo-3").parents('.photos').removeClass("error-photo"); }

			}else{
				$("#photo-1").val("");
				$("#photo-2").val("");
				$("#photo-3").val("");
				$("#loader-video").show();
			}
		});
		


	});


})(jQuery);
