<?php
/*
Template Name: seminarentry
*/
get_header(); ?>

<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub seminar">
	<div class="mainvisual-sub-txt">
		<h2 class="">seminar<span>家づくりセミナー</span></h2>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-12">
			<div class="read-container">
			<h2>スムースの「家づくりセミナー」</h2>
<p>土地探しや資金計画、家の構造など、家づくりをいざ始めると次々と出てくる疑問や不安。<br class="hidden-xs">
そんな悩みを解消し、安心で楽しい家づくりにするためのセミナーです。<br class="hidden-xs">
「家づくりって何？」「どこから始めたらいいんだろう？」という素朴な疑問や専門的なことまで、<br class="hidden-xs">
家づくりのプロの目線でお伝えするとともに、ご家族の想いを大切にしていきます。</p>
</div>
		</div>
	</div>
</div>

<hr>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-10 col-xs-offset-1">
<?php the_content(); ?>
<?php endwhile; endif; ?>
</div>
</div>
</div>
<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />  
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script> 
</body>
</html>