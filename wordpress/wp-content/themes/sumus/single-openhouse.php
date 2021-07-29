<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub oh-mainvisual" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/bg-header-pc.jpg); height: 340px;">
	<div class="mainvisual-sub-txt">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-openhouse.png" alt="完成見学会" class="logo" style="margin: 0 auto 0.5em; width: 245px; display:block;">
		<h2>OPEN HOUSE<span>家族のこれまでとこれからをつなぐ住まいづくり。</span></h2>
	</div>
</section>


<section>
<div class="openhouse-info-wrapper" style="background: #F6F3EF">
<div class="openhouse-history shadow-outside">
		<?  
			$img = get_field('main-photo');
			$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl) { ?>
				<img src="<? echo $imgurl[0]; ?>" alt="<?php the_title(); ?>" style="margin: 0 auto 3em; display: block;">
				<? }
		?>

	<?php if( get_field('visual-message') ) { ?>
		<p style="position: relative; top: -35px; text-align: right; 	font-size: 11px; 	font-size: 1.1rem;"><?php the_field('visual-message'); ?></p>
	<?php }?>

	<div class="l-section-title" style="padding-top: 0px;">
		<div class="l-section-title-inner serif">
			<h3 class="heading"><? $txt = get_field('name'); if($txt){ ?><? echo $txt; ?><? } ?></h3>
			<p style="text-align: center; letter-spacing: 0.3em;">OPEN HOUSE <? $txt = get_field('number'); if($txt){ ?><? echo $txt; ?><? } ?></p>
			<hr class="style03">
		</div>
	</div>
	<div class="openhouse-info">
		<p class="day"><span>開催日</span><? $txt = get_field('date'); if($txt){ ?><? echo $txt; ?><? } ?></p>
		<p class="">とき：<? $txt = get_field('time'); if($txt){ ?><? echo $txt; ?><? } ?><br class="visible-xs">ところ：<? $txt = get_field('location'); if($txt){ ?><? echo $txt; ?><? } ?></p>
		<!-- <p class="small">*詳細な場所はお申し込み後のご連絡となります</p> -->
	</div>
	<div class="button-container"><a class="button style04 set-prevoius-post-type-openhouse" data-id="<?php echo get_the_ID(); ?>" style="margin-bottom: 1em;"  href="/openhouse/entry/">完成見学会のお申し込みはこちら</a></div>
<hr style="margin-bottom: 3em;">
		<h3 class="serif"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h3>
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
		<?  
			$img = get_field('madori-img');
			$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl) { ?>
				<img src="<? echo $imgurl[0]; ?>" alt="<?php the_title(); ?>" class="madori">
				<? }
		?>

<?php if( get_field('more-info') ) { ?><?php the_field('more-info'); ?><?php }?>

<?php if( get_field('gmap') ) { ?>
<div class="google-maps" style="margin: 2em 0 1em;">
<?php the_field('gmap'); ?>
</div><?php }?><!-- 地図掲載 -->

	</div>
	<div class="button-container"><a class="button style04 set-prevoius-post-type-openhouse" data-id="<?php echo get_the_ID(); ?>" style="margin-top: 3em;"  href="/event/openhouse/entry/">完成見学会のお申し込みはこちら</a></div>
</div><!-- /.openhouse-info-wrapper -->


<?php if( get_field('message') ) { ?>
<div class="container-openhouse" style="">
<div class="l-autor">
			<div class="l-autor-body clearfix">
				<div class="autor-face"><?php echo get_avatar(get_the_author_id(), 250); ?></div>
				<div class="autor-txt">
					<h4 class="autor-name">担当者からのメッセージ</h4>
					<p class="autor-meta" style="font-size: 14px; font-size: 1.4rem;"><?php the_field('message'); ?></p>
				</div>
			</div>
		</div><!--/.l-autor-->
</div><!-- /.container -->
</section><!-- /.openhouse -->
<?php }?>


<!--
	<div class="pagination">
		<ul class="clearfix">
			<li class="prev fl"><?php previous_post_link('%link', '<span class="icon-arrow_left"></span> 前の記事へ' ); ?></li>
			<li class="navitop"><a href="<?php bloginfo('url'); ?>/blog/"><span class=""></span>一覧</a></li>
			<li class="next fr"><?php next_post_link('%link', '次の記事へ <span class="icon-arrow_right"></span>' ); ?></li>
		</ul>
	</div>
-->

<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>