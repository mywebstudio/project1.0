$(document).ready(function(){
	//alert("ready ok")
	//$(".main_page").css("height", $(document).height())
	
	$(".logo_phone").mouseover(function(){
		$(this).animate({opacity: '1'}, 300 );
	});
	$(".logo_phone").mouseout(function(){
		$(this).animate({opacity: '0'}, 100 );
	});
	
	$("#phone_tooltip_hover").mouseover(function(){
		$("#phone_tooltip").animate({ 
		    bottom: "85",
		    opacity: 1,
		  }, 300 );
	});
	$("#phone_tooltip_hover").mouseout(function(){
		$("#phone_tooltip").animate({ 
		    bottom: "60",
		    opacity: 0,
		  }, 300 );
	});
	$("#phone_tooltip_hover").click(function(){
		return false;
	});
})