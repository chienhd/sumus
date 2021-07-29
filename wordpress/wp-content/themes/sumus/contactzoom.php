<?php
/*
Template Name: contactzoom
*/
get_header(); ?>

<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2>CONTACT<span>zoom 打合せ ご予約フォーム</span></h2>
	</div>
</section>

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