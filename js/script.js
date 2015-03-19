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
			$(this).parents(".content-slide").animate({opacity: "0"}, 5);
			$('.ms-left ').animate({left: "-50%"}, 500);
			$('.ms-right ').animate({right: "-50%"}, 500);
			var link = $(this).attr("data-link");
			$('#controls').animate({opacity: "0"}, 1000, function(){
				document.location.href=link;
				$('.ms-left ').animate({left: "0%"}, 0);
				$('.ms-right ').animate({right: "0%"}, 0);
				$('#controls').animate({opacity: "1"}, 0);
				$(".content-slide").animate({opacity: "1"}, 100);
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
	        	ID_VAR = $(input).attr("id");
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	            	console.log(e.target.result);
	            	 $('#'+ID_VAR).parents(".photos").css('background-image', 'url('+e.target.result+')');
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
				$("#loader-video").show();
			}
		});

	});


})(jQuery);
