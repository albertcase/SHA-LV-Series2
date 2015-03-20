/**
 * multiscroll.js 0.1.5 Beta
 * https://github.com/alvarotrigo/multiscroll.js
 * MIT licensed
 *
 * Copyright (C) 2013 alvarotrigo.com - A project by Alvaro Trigo
 */

(function($) {
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
	if(isAndroid) {
	//$(".file-photo").("opacity","1");
	}
	$(document).ready(function(){
		var MAX_HEIGHT = 600;

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
			
	        	var ID_VAR = $(input).attr("id");
				
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#loader-video").show();
					var cssRotate=0;
					EXIF.getData(input.files[0], function() {
							var image_orientation=EXIF.getTag(this, "Orientation");
							
							if(image_orientation==3)cssRotate=180;
							if(image_orientation==6)cssRotate=90;
							if(image_orientation==8)cssRotate=-90;
							
							$('#'+ID_VAR+"-orientation").val(image_orientation);
							
							$('#'+ID_VAR).parents(".photos").removeAttr('style');
							$('#'+ID_VAR).parents(".photos").css('background-image', 'url('+e.target.result+')');
							
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
							 
							 $("#loader-video").hide();
						
						
						});
						
						render(e.target.result,ID_VAR);
						
					
				}

				reader.readAsDataURL(input.files[0]);
         
			}
			return true;
		}
	    
	    $(".file-photo").change(function(){
	        readURL(this);
	    });
		
		function render(src,mtarget){
			var image = new Image();
			image.onload = function(){
				var canvas = document.createElement('canvas');
				if(image.height > MAX_HEIGHT) {
					image.width *= MAX_HEIGHT / image.height;
					image.height = MAX_HEIGHT;
				}
				var ctx = canvas.getContext("2d");
				ctx.clearRect(0, 0, canvas.width, canvas.height);
				canvas.width = image.width;
				canvas.height = image.height;
				ctx.drawImage(image, 0, 0, image.width, image.height);
				var mbase64 = canvas.toDataURL("image/jpeg",0.6);
				ctx=null;
				$("#"+mtarget+"-img").val(mbase64);
			};
			image.src = src;
		}


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
