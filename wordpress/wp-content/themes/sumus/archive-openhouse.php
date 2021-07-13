<?php
/*
Template Name: openhouse
*/
get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/blog.css">

<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/bg-header-pc.jpg);">
	<div class="mainvisual-sub-txt">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-openhouse.png" alt="完成見学会" class="logo" style="margin: 0 auto 0.5em; width: 245px; display:block;">
		<h2>OPEN HOUSE<span>家族のこれまでとこれからをつなぐ住まいづくり。</span></h2>
	</div>
</section>

<section class="openhouse">
	<div class="container" style="margin-bottom: 3em;">
		<!-- 1日展とは？ -->
		<div class="row part1">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/photo_001.jpg" alt="完成お引渡し前の住まいをお借りして行う完成見学会。">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12" style="position: relative">
				<h2>完成お引渡し前の住まいを<br>お借りして行う完成見学会。</h2>
				<p style="margin-bottom: 1em;">ご家族の暮らし方や想いに、私たちがどのように寄り添い、<br class="hidden-xs">共に家づくりをしてきたかが見えてきます。</p>
				<p>実際の家を見たり肌で感じることで、家づくりのイメージを膨らませたり、<br class="hidden-xs">
					家づくりの疑問や不安をスタッフに気軽に相談してもらえる場所として、<br class="hidden-xs">
					これから家づくりを始めるご家族にとってのよい機会としてお役立てください。</p>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/illust_01.gif" alt="1日展"  class="pos01 hidden-xs">
			</div>
		</div>
	</div><!-- /.container -->
	
	
	<div class="container">
	<div class="section-title">
		<h3 class="heading-01 none-mb">最新の完成見学会</h3>
	</div><!-- /.section-title -->
	<div class="row">
				<?php
      $toplist = array(
        'post_type' => 'openhouse',
        'showposts' => 1,
        'orderby' => 'date',
      );
      ?>
      <?php query_posts($toplist); ?>
      <?php if (have_posts()):while(have_posts()):the_post(); ?>

						<div class="openhouse-banner clearfix" style="margin-bottom: 2em;">
			<div class="image">
				<a href="<?php the_permalink(); ?>">
										<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail( 'oh-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
					<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?>
								</a>
			</div><!-- /.image -->
			<div class="info">
				<div class="openhouse-info" style="padding: 3em 0 0;">
					<div class="l-section-title-inner serif">
						<?php if(get_field("name")): ?>
						<h3 class="heading"><?php echo post_custom('name'); ?></h3>
						<?php endif; ?>
						<?php if(get_field("number")): ?>
						<p style="text-align: center; letter-spacing: 0.3em;">OPEN HOUSE <?php echo post_custom('number'); ?></p>
						<?php endif; ?>
					</div>
					<?php if(get_field("date")): ?>
					<p class="day"><span>開催日</span><?php echo post_custom('date'); ?></p>
					<?php endif; ?>
					<?php if(get_field("time")): ?>
					<p class="">とき：<?php echo post_custom('time'); ?><?php endif; ?>
					<?php if(get_field("location")): ?><br class="visible-xs">ところ：<?php echo post_custom('location'); ?></p><?php endif; ?>
          <!-- 					<p class="small">*詳細な場所はお申し込み後のご連絡となります</p> -->
					<div class="button-container"><a class="button style01" style="margin-top: 1.5em;"  href="<?php the_permalink(); ?>">詳しくはこちら</a></div>
				</div>
			</div><!-- /.info -->
				
					</div><!-- /.openhouse-banner -->
		<?php endwhile; endif; ?>
          <?php wp_reset_postdata(); wp_reset_query(); ?>

					</div><!--/.row-->
</div><!--/.container-->
	<div class="point-wapper">
		<div class="container">
			<div class="l-section-title">
			<div class="l-section-title-inner">
				<h3 class="heading-03">完成見学会をご活用いただくための<br class="visible-xs">大切なポイント</h3>
			</div>
		</div><!--/ .l-section-title -->
			<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="openhouse-point">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-6">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/point01.jpg" class="circle" alt="暮らしを豊かにする「道」とは？" title="">
					</div>
					<div class="col-md-12 col-sm-12 col-xs-6">
						<div class="text-wrapper">
						<h2>暮らしを豊かにする「道」とは？</h2>
						<p>寄り道、抜け道、視線や風や光が通る道。
日々の暮らしを少し豊かにしてくれる「道」。
あなたならどんな「道」を大切にしたいですか？
ヒントを探しながら歩いてみてください。</p>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.openhouse-point -->
		</div><!--/col-->
			<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="openhouse-point">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-6">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/point02.jpg" class="circle" alt="自然素材の心地よさを体感してください。" title="">
					</div>
					<div class="col-md-12 col-sm-12 col-xs-6">
						<div class="text-wrapper">
						<h2>自然素材の風合や心地よさを体感しよう！</h2>
						<p>素肌で気持ちいい無垢の床。やわらかな土の風合の珪藻土。調湿など快適な暮らしを助ける機能もあります。自然素材のよさを活かし、省エネな暮らしを実現するための構造や断熱・気密性能へのこだわりもご紹介します。</p>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.openhouse-point -->
		</div><!--/col-->
			<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="openhouse-point">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-6">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/point03.jpg" class="circle" alt="家族の手でつくり、手をかけて住まう。家族と家の物語を楽しむ。" title="">
					</div>
					<div class="col-md-12 col-sm-12 col-xs-6">
						<div class="text-wrapper">
						<h2>家族の手でつくり、手をかけて住まう。家族と家の物語を楽しむ。</h2>
						<p>床に自然ワックスをかけたり、壁を塗ったり。
家族で家づくりに参加してもらうことが多いスムースの家づくり。
手入れをしながら住まうことで愛着がわき、時間とともに素材も素敵に変化していきます。</p>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.openhouse-point -->
		</div><!--/col-->
			<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="openhouse-point">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-6">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/point04.jpg" class="circle" alt="家族の手でつくり、手をかけて住まう。家族と家の物語を楽しむ。" title="">
					</div>
					<div class="col-md-12 col-sm-12 col-xs-6">
						<div class="text-wrapper">
						<h2>家族の幸せを感じる家をたくさん見よう！</h2>
						<p>実際の家を自分の目で見ることは、想像だけでは分からない部分を感じることのできる良いチャンス。たくさんの家を見て、良い家を選ぶ基準を得ることが大切です。次回の完成見学会やセミナーの開催予定など、情報収集もしましょう。</p>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.openhouse-point -->
		</div><!--/col-->
		</div><!--/.row-->
		</div><!-- /.container -->
	</div><!-- /.point-wapper -->
	<div class="image-container">
		<div class="image-inner"></div>
	</div>
</section>

<div class="container">
	<div class="section-title">
			<h3 class="heading-01 none-mb">これまでの完成見学会</h3>
	</div>
	<div class="row">
				<?php
      $toplist = array(
        'post_type' => 'openhouse',
        'showposts' => 6,
        'orderby' => 'date',
      );
      ?>
      <?php query_posts($toplist); ?>
      <?php if (have_posts()):while(have_posts()):the_post(); ?>
			<div class="col-md-4 col-sm-6">
		<div class="post-sumally heightLine clearfix">
			<div class="post-sumally-image">
				<a href="<?php the_permalink(); ?>">
					<figure><?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail( 'post-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
					<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?><figcaption></figcaption>
					</figure>
				</a>
			</div>
			<div class="post-sumally-body">
				<?php if(get_field("number")): ?>
					<p>OPEN HOUSE <?php echo post_custom('number'); ?></p>
					<?php endif; ?>
					
					<h2 class="post-sumally-title"><a href="<?php the_permalink(); ?>"><?php if(get_field("name")): ?><?php echo post_custom('name'); ?><?php endif; ?></a><span style="font-weight: normal; display: block; color: #ccc;"><?php the_title(); ?></span></h2>
								</div>
		</div><!--/post-sumally-->
	</div><!--/.col-->
		<?php endwhile; endif; ?>
          <?php wp_reset_postdata(); wp_reset_query(); ?>
			</div><!--/.row-->
</div><!--/.container-->

	<div class="footer-banner">
<div class="container">

	

		<div class="left clearfix">
		<h2>スムースの家づくりの「こだわり」 <span>HOUSE BUILD</span></h2>
		<a href="/quality/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/banner-001.jpg" alt="家族の手でつくり、手をかけて住まう。家族と家の物語を楽しむ。"></a>
		<p style="margin-bottom: 1em;">ご家族がいつまでも安心で心地よく暮らしていくためにスムースの家が、どんな素材や仕様を選んでいるのかお伝えします。</p>
		<p><span class="icon-arrow_right"></span> <a href="/quality/">詳しくはこちら</a></p>
		</div>

		<div class="right clearfix">
		<h2>建築事例<span>WORKS</span></h2>
		<a href="/works/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/openhouse/banner-002.jpg" alt="建築事例"></a>
		<p style="margin-bottom: 1em;">スムースがご家族と共に創ってきた家。ご家族ごとに違って、同じかたちはひとつもありません。それぞれのご家族らしさや、スムースらしさ、そして、ご自身らしさを探してみてください。</p>
		<p><span class="icon-arrow_right"></span> <a href="/works/">詳しくはこちら</a></p>
		</div>


	</div>

</div>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>