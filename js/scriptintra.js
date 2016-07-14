// JavaScript Document
$(function(){
	//menu.width($(window).width());
	/*$('.topo').click(function(){
		alert("pegou");
		});*/
	//var menu = $('.topo');
	$(window).resize(function(){
		//menu.width($(window).width());
		$('.topo').width($(window).width());
			$(window).scroll(function(){
				$('.topo').width($(window).width());
				
				});
		//alert('auoudim');
		
		}); 
	
	$(window).scroll(function(){
		//$('.topo').attr();
		$('.topo').width($(window).width());
		//alert('vai');
		});
		/*
		$(window).resize(function(){
			$('.veri').width($(window).width()).height($(window).height());
			
			});*/
	
	
	
	
});