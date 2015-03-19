jQuery(document).ready(function() {

	// slider 1
	$("ul.slider1").simplecarousel({
		width:144,
		height:120,
		visible: 4,
		next: $('.next'),
		prev: $('.prev')
	});
	
	$(".inlinePreview").colorbox({inline:true, width:"732px"});
	$(".colorbox").colorbox(); 
	
	
});

function checkURL(value) {
	var urlregex = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
	if (urlregex.test(value)) {
		return (true);
	}
		return (false);
}
		
function validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if( !emailReg.test( $email ) ) {
		return false;
	} else {
		return true;
	}
}
		

function affPrev(){
	$("#data-photo2").removeClass("err");
	$("#externalerr").removeClass("err");
	err=0;
	
	
	if($("#photoup").attr("src")=="img/upload2.png"){$("#data-photo2").addClass("err"); err=1;}
	if($("#externallink").val()=="" || !checkURL($("#externallink").val()) ){$("#externalerr").addClass("err"); err=1;}
	
	if(err==0){
	$("#popinbg").css("background-image","url("+$("#photoup").attr("src")+")");
	$("#previewlink").attr("href",$("#externallink").val());
	$(".inlinePreview").trigger("click");
	}
}

function affOldAct(img,url){
	if(img && url){
		$("#popinbg").css("background-image","url("+img+")");
		$("#previewlink").attr("href",url);
		$(".inlinePreview").trigger("click");
	}
}

function validateMiniForm(obj){
	$("#validate"+obj+"_err").removeClass("err");
	$("#refuse"+obj+"_err").removeClass("err");

	if($("#prevalidate"+obj).is(":checked") || $("#validate"+obj).is(":checked") || $("#refuse"+obj).is(":checked")){
	$("#miniform_"+obj).submit();
	}else{
	$("#prevalidate"+obj+"_err").addClass("err");
	$("#validate"+obj+"_err").addClass("err");
	$("#refuse"+obj+"_err").addClass("err");
	}
}

function affectupload(chemin){
	$("#data-photo2").removeClass("err");
	$("#photoup").attr("src",chemin);
	$("#imagetmp").val(chemin);
}

function errupload(){
$("#data-photo2").addClass("err");
}

function validate_form_metc(){
err=0;

$("#data-photo2").removeClass("err");
$("#text_tw_err").removeClass("err");
$("#text_fb_err").removeClass("err");
$("#text_wei_err").removeClass("err");
$("#text_pint_err").removeClass("err");
$("#tag_err").removeClass("err");

if(!$("#imagetmp").val()) 	{$("#data-photo2").addClass("err");err=1;}
if(!$("#text_tw").val()) 	{$("#text_tw_err").addClass("err");err=1;}
if(!$("#text_fb").val()) 	{$("#text_fb_err").addClass("err");err=1;}
if(!$("#text_wei").val()) 	{$("#text_wei_err").addClass("err");err=1;}
if(!$("#text_pint").val()) 	{$("#text_pint_err").addClass("err");err=1;}

var i=1;
var cptcheck=0;
while($('#tag_'+i).length>0){
if($('#tag_'+i).is(':checked'))cptcheck=cptcheck+1
i=i+1;
}

if(cptcheck==0){$("#tag_err").addClass("err");err=1;}

if(err==0) { return true; } else { return false; }

}

function validate_form_activ(){
err=0;

$("#data-photo2").removeClass("err");
$("#externalerr").removeClass("err");
$("#tag_err").removeClass("err");
$("#newtag_err").removeClass("err");

if(!$("#imagetmp").val()) 	{$("#data-photo2").addClass("err");err=1;}
if(!$("#externallink").val()) 	{$("#externalerr").addClass("err");err=1;}

var i=1;
var cptcheck=0;
while($('#tag_'+i).length>0){
if($('#tag_'+i).is(':checked')) {cptcheck=cptcheck+1;var last_coche = 'tag_'+i;}
i=i+1;
}

if(cptcheck==0){$("#tag_err").addClass("err");err=1;}

//ici il y a bien un radio de cocher ... mais lequel
if(cptcheck>0){
	if($("#"+last_coche).val()== "new" && !$("#newtag").val() ){$("#newtag_err").addClass("err");err=1;}
}


if(err==0) { return true; } else { return false; }
}
	