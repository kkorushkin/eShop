(function($, undefined){
//
	$(function(){
		var $imgUrl = $("#view-small-pics-1").css("background-image");
		$("#view-big-pics").css({"background-image":"" + $imgUrl + "", "background-repeat":"no-repeat", "background-size":"contain"});
		$(".view-small-pics").on("click",function(){
			var $imgUrl = $(this).css("background-image");
			$("#view-big-pics,#zoomer").css({"background-image":"" + $imgUrl + "", "background-repeat":"no-repeat"});
		});	
	});
//
	$(function(){
		$("#view-big-pics").on("mouseenter",function(){
			$("#zoomer").show(300);// Контейнер у большим изображением становится видимым.
		});
	});
	$(function(){	
		$("#view-big-pics").on("mousemove",function (e){
			// положение элемента
			var offset = $(this).offset(),       // В переменной offset хранятся координаты блока с миниатюрой
			x = (e.pageX - offset.left),      // В переменной хранится координата X курсора мыши относительно блока с миниатюрой
			y = (e.pageY - offset.top);        // Координата Y курсора мыши.
			w = $(this).width(),               // Ширина миниатюры
			h = $(this).height(),              // Высота миниатюры
			// Позиционирование фона большого изображения относительно того, куда указывает курсор на миниатюре.
			$("#zoomer").css({'background-position': (x / w * 100) + '% ' + (y / h * 100) + '%'});
			$("#zoomer-lenz").css({'position': x + 'px ' + y + 'px'});
		});
	});
	$(function(){
		$("#view-big-pics").on("mouseleave",function(){
			$("#zoomer").hide(300);// Контейнер с большим изображением скрывается
		});
	});
//
})(jQuery);