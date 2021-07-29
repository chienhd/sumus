
	$(function() {

		$('head').append('<style type="text/css">.l-loading, .js-loading { display: block; }</style>');
		$(".l-header").css({"opacity":"0","filter":"alpha(opacity=0)","-moz-opacity":"0"});

		jQuery.event.add(window,"load",function() {
			var pageH = $(".ground").height();
			$(".l-loading").css("height", pageH).delay(1000).fadeOut(1000);
			$(".js-loading").delay(0).fadeOut(1000);
			$(".l-header").css({"opacity":"1","filter":"alpha(opacity=1)","-moz-opacity":"1"});
			$(".ground.sitetop").css({"opacity":"1","filter":"alpha(opacity=1)","-moz-opacity":"1"});
		});
	//end
	});
