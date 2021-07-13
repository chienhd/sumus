<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('', true); ?><?php if (wp_title('', false)) { ?> | <?php } ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<meta name="format-detection" content="telephone=no">
<?php get_template_part( 'include/ogp' ); ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/import.css?20191219">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/sliderpro/slider-pro.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/slidebars/slidebars.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/magnific-popup/magnific-popup.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css">
<?php if (is_page('3816')): ?>
	<!-- SDGs -->
	<script>
		document.createElement("picture");
	</script>
	<script src="/assets/js/picturefill.min.js" async></script>
	<link rel="stylesheet" href="/assets/css/sdgs.min.css">
<?php endif; ?>

<?php if (is_page('225')): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/tsunagu.css">
<?php endif; ?>

<?php if (is_single('')): ?>

	<script>
		! function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
			p = /^http:/.test(d.location) ? 'http' : 'https';
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = p + '://platform.twitter.com/widgets.js';
				js.async = true;
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, 'script', 'twitter-wjs');
	</script>

	<script src="https://apis.google.com/js/platform.js" async defer>
		{
			lang: 'ja'
		}
	</script>
<?php endif; ?>

<?php get_template_part( 'include/ga' ); ?>
<!-- Facebook Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '311433462743481'); 
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" 
		src="https://www.facebook.com/tr?id=311433462743481&ev=PageView
		&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->

</head>
<body id="<?php if ( is_archive() || is_single() || is_category() || is_tax() ) : ?><?php echo $cp_slug = get_query_var('post_type'); ?><?php else: ?><?php echo esc_attr($post->post_name ); ?><?php endif; ?><?php 
echo $taxonomy;
?>">
<!-- header -->
<style>
	.sp-slide img {
		width: 100% !important;
		height: 100% !important;
		object-fit: cover;
	}
	.sp-bottom-thumbnails {
		margin-top: 0;
	}
	.sp-bottom-thumbnails .sp-thumbnail-container {
		margin: 0;
	}
</style>
<!-- <div id="fb-root"></div>
<div class="l-loading">
	<div class="js-loading"><div class="js-loading-circle"></div></div>
</div> -->
<!--/.l-loading-->

<header id="header">
	<div class="header_in">
		<h1 class="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" width="150px" class="other"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/logo_top.png" width="150px" class="top"></a></h1>
		<nav class="g_menu">
			<ul>
				<li class="g_menu_in"><a href="javascript:void(0)">スムースについて</a>
					<ul class="nav_in">
						<li><a href="/about/">会社案内</a></li>
						<li><a href="/about/staff/">スタッフ紹介</a></li>
						<li><a href="/about/flow/">家づくりの流れ</a></li>
						<li><a href="/about/support/">住むサポ「20年保証」</a></li>
					</ul>
				</li>
				<li class="g_menu_in">
					<a href="">スムースの優しい家</a>
					<ul class="nav_in">
						<li><a href="/concept/">コンセプト</a></li>
						<li><a href="/concept/tsunagu/">設計のこだわり</a></li>
						<li><a href="/concept/sdg/">環境へのこだわり</a></li>
						<li><a href="/concept/quality/">こだわり</a></li>
					</ul>
				</li>
				<li><a href="/works/">事例紹介</a></li>
				<li><a href="/blog/">ブログ</a></li>
				<li class="g_menu_in"><a href="javascript:void(0)">イベント</a>
					<ul class="nav_in">
						<li><a href="/event/openhouse/">完成見学会</a></li>
						<li><a href="/event/seminar/">セミナー・体験会</a></li>
						<li><a href="/event/sumusmarche/">スムースマルシェ</a></li>
						<li><a href="/event/workshop/">ワークショップ</a></li>
					</ul>
				</li>
				<li class="g_menu_in"><a href="javascript:void(0)">お問い合わせ</a>
					<ul class="nav_in">
						<li><a href="/contact/">資料請求</a></li>
						<li><a href="/contact02/">お問い合わせ</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>
<ul class="contact_list">
	<li><a href="/event/seminar/">見学会・セミナー</a></li>
	<li><a href="/contact/">資料請求</a></li>
</ul>

<div id="fixed-top" class="sitetop">
	<header class="l-header shadow-outside sb-slide">
		<h1><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" alt="株式会社スムース" class="l-header-logo"></a></h1>
		<div class="visible-sm visible-xs" id="btns">
			<div class="menu-sp">
				<div class="sb-toggle-right">
					<a class="toggle_menu" href=""><span class="first"></span><span class="second"></span><span class="third"></span> <span class="type">MENU</span></a>
				</div>
			</div>
		</div>
		<div class="request visible-sm visible-xs"><a href="/contact/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/icon-request.svg" alt="資料請求" class="request_icon"><span>資料請求</span></a></div>
	</header>
</div>