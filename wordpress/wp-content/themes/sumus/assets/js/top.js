	//sliderPro
	$(window).load(function () {
		var height = window.innerHeight;
		var thumbnailHeight = window.innerwidth * 380 / 480 / 4
		if (window.matchMedia('(max-width: 767px)').matches) {
			height = height - 66;
			thumbnailHeight = 100;
		}
		$('#slider-fullwin').sliderPro({
			arrows: false,
			buttons: false,
			// forceSize: 'fullWindow',
			imageScaleMode: 'cover',
			slideDistance: 0,
			touchSwipe: false,
			autoplayOnHover: 'none',
			slideAnimationDuration: 100,
			fade: true,
			width: '100%',
			height: height,
			fadeDuration: 2300,
			thumbnailWidth: '25%',//サムネイルの横幅
			thumbnailHeight: thumbnailHeight,//サムネイルの縦幅
			//表示方法を変えるサイズ
			breakpoints: { 767: {
				forceSize: 'none',
				width: '100%',
				height: height, //横幅
				arrows: true,//左右の矢印
				thumbnailHeight: 100,//サムネイルの縦幅
			}
		}
		});

		// $( document ).ready(function( $ ) {
		// 	$('#slider2').sliderPro({
		// 		width:600,//横幅
		// 		buttons: false,//ナビゲーションボタン
		// 		shuffle: true,//スライドのシャッフル
		// 		thumbnailWidth: 200,//サムネイルの横幅
		// 		thumbnailHeight: 60,//サムネイルの縦幅
		// 		slideDistance:0,//スライド同士の距離
		// 		breakpoints: {
		// 			480: {//表示方法を変えるサイズ
		// 				thumbnailWidth: 110,
		// 				thumbnailHeight: 40
		// 			}
		// 		}
		// 	});
		// });

		$('#slider-event').sliderPro({
			width: '100%',//横幅
			autoHeight:true,
			autoplayOnHover: 'none',
			arrows: true,//左右の矢印
			buttons: true,//ナビゲーションボタン
			slideDistance:0,//スライド同士の距離
			fade: true,
			fadeDuration: 2300,
		autoplay:true
		});

	});

	/*============================================================
	*	magnificPopup youtube
	============================================================*/
	$(function(){
		$('.popup-youtube').magnificPopup({
	  type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 400,
			preloader: false,
			fixedContentPos: false
		});
	});
	
	//***** 関連動画とタイトルを消去 *****//
	jQuery(window).load(function(){
		jQuery('a[href*="youtube.com/watch"]').magnificPopup({
		type: 'iframe',
		 iframe: {
			 patterns: {
				 youtube: {
					 index: 'youtube.com', 
		    id: 'v=', 
		    src: '//www.youtube.com/embed/%id%?rel=0&autoplay=1&showinfo=0&rel=0'
		    }
		     }
		    }   
		 });      
	});
	
	/*============================================================
	*	magnificPopup modalbox
	============================================================*/
	$(function () {
		$('.popup-modal').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#username',
			removalDelay: 400,
			modal: true
		});
		
		$(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
		});
	});

