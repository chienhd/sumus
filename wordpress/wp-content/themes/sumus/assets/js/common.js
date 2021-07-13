(function($) {
	$(function() {

/* location.pathname
---------------------------------------------------------------------*/
	var $dir = location.pathname.split("/")[1];
		// bodyに自動でidとclassを付与
		var $br = "";
		var $curt = "curt-";
		var $dir = location.pathname.split("/")[1];
		// $('body').attr('id',$br+$dir);
			var $dir = location.pathname.split("/")[2];
		$('body').attr('class',$curt+$dir);

/* heightLine
---------------------------------------------------------------------*/
	$(window).load(function() {
		$(".section.blog .heightLine").heightLine({
			minWidth:768
		});

		$(".section-top-blog .heightLine").heightLine({
			minWidth:768
		});
		
		$(".section-top-works .heightLine").heightLine({
		});
		
		$(".section.works .heightLine").heightLine({
		});
		
		$("body#openhouse .heightLine").heightLine({
		});

		$(".section.section-staff .heightLine").heightLine({
		});
		$(".section-marche-single .heightLine").heightLine({
		});
	});

	/* .toggle-menu .heading
	---------------------------------------------------------------------*/
	$(function(){
		$(".toggle-menu .heading").on("click", function() {
			$(this).next().slideToggle(300);

			if ($(this).children(".state_icon").hasClass('active')) {			
				$(this).children(".state_icon").removeClass('active');				
			}
			else {
				$(this).children(".state_icon").addClass('active');			
			}			
		});
	});

	/* .slidebars
	---------------------------------------------------------------------*/
    $(document).ready(function() {
      $.slidebars();
    });
    $(document).on('click', '#btns a', function(event) {
        event.preventDefault();
        $('html').toggleClass('activate');
    });

if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){

// $(function(){
// 	$('a img').hover(function(){
// 		$(this).attr('src', $(this).attr('src').replace('_off', '_on'));
// 			}, function(){
// 			   if (!$(this).hasClass('current')) {
// 			   $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
// 		}
// 	});
// });

}


	/*---------------------------------------------------------------------
	pagetop
	---------------------------------------------------------------------*/
	$(document).ready(function() {
		var pagetop = $('.pagetop');
		$(window).scroll(function () {
			if ($(this).scrollTop() > 600) {
				pagetop.fadeIn();
			} else {
				pagetop.fadeOut();
			}
		});
		pagetop.click(function () {
			$('body, html').animate({ scrollTop: 0 }, 500);
			return false;
		});
	});

	//end
	});
})(jQuery);