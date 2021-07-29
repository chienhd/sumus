<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub mini">
	<div class="mainvisual-sub-txt">
		<h2>EVENT<span>家づくりイベント</span></h2>
	</div>
</section>

<section>
<div class="seminar-info-wrapper" style="background: #F6F3EF">

<div class="seminar-history shadow-outside">
		
		<div class="cover">
		<h3><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h3>
		<?  
			$img = get_field('main-photo');
			$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl) { ?>
				<img src="<? echo $imgurl[0]; ?>" alt="<?php the_title(); ?>" style="margin: 0 auto 3em; display: block;">
				<? }
		?>
		</div>
		<?php the_content(); ?>
	</div>

	<div class="pagination">
		<ul class="clearfix">
			<li class="prev fl"><?php previous_post_link('%link', '<span class="icon-arrow_left"></span> 前の記事へ' ); ?></li>
			<li class="navitop"><a href="<?php bloginfo('url'); ?>"><span class=""></span>一覧</a></li>
			<li class="next fr"><?php next_post_link('%link', '次の記事へ <span class="icon-arrow_right"></span>' ); ?></li>
		</ul>
	</div>

</div><!-- /.seminar -->
</section><!-- /.openhouse -->


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>