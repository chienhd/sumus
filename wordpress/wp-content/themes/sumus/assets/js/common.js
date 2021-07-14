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

/*-----------------------------------------------------------------------
event/openhouse/466/
------------------------------------------------------------------------*/

$(document).ready(function() {
	function setCookie(cname,cvalue,exdays = 2) {
	  const d = new Date();
	  d.setTime(d.getTime() + (exdays*24*60*60*1000));
	  let expires = "expires=" + d.toGMTString();
	  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function getCookie(cname) {
	  let name = cname + "=";
	  let decodedCookie = decodeURIComponent(document.cookie);
	  let ca = decodedCookie.split(';');
	  for(let i = 0; i < ca.length; i++) {
	    let c = ca[i];
	    while (c.charAt(0) == ' ') {
	      c = c.substring(1);
	    }
	    if (c.indexOf(name) == 0) {
	      return c.substring(name.length, c.length);
	    }
	  }
	  return "";
	}

	$('.set-prevoius-post-type-openhouse').click(function(e) {
		let previousId = $(this).attr('data-id');
		setCookie('prevoius-post-type-openhouse', previousId);
		return true;
	});

	if(typeof DATA_OPENHOUSE !== typeof undefined && DATA_OPENHOUSE.length) {
		let jsonOpenhouse = JSON.parse(DATA_OPENHOUSE);
		let openhouseId = getCookie('prevoius-post-type-openhouse') || 0;
		let html = '';
		let selected = '';
		for (let [key, value] of Object.entries(jsonOpenhouse)) {
		  html += `<option value="${key}" ${(openhouseId === key) ? 'selected' : '' }>${value}</option>`;
		}

		$('select[name="registered"]').html(html);
	}
	if(typeof ENTRY_DATE !== typeof undefined && ENTRY_DATE.length) {
		let jsonEntryDate = JSON.parse(ENTRY_DATE);
		let html = '';
		for (let [key, value] of Object.entries(jsonEntryDate)) {
		  html += `<option value="${key}">${value}</option>`;
		}
		$('select[name="day01"]').append(html);
		$('select[name="day02"]').append(html);
		$('select[name="day03"]').append(html);
	}
	if(typeof ENTRY_TIME !== typeof undefined && ENTRY_TIME.length) {
		let jsonEntryTime = JSON.parse(ENTRY_TIME);
		let html = '';
		for (let [key, value] of Object.entries(jsonEntryTime)) {
		  html += `<option value="${key}">${value}</option>`;
		}
		$('select[name="time01"]').append(html);
		$('select[name="time02"]').append(html);
		$('select[name="time03"]').append(html);
	}
})