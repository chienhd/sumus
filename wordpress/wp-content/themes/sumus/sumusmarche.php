<?php
/*
Template Name: sumusmarche
*/
get_header(); ?>

<div id="sb-site">
<div class="ground sub">

<div class="fullwidth-bg">
	<div class="fullwidth-bg-container">
		<?php
      $toplist = array(
        'post_type' => 'sumusmarche',
        'showposts' => 1,
      );
      ?>
      <?php query_posts($toplist); ?>
      <?php if (have_posts()):while(have_posts()):the_post(); ?>

		<h2 class="t-center serif"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-marche.svg" alt="スムースマルシェ" class="logo-marche"><span class="marche">スムースマルシェ</span></h2>
		<h3 class="serif">日本のふるさとをめざして。</h3>
		<p class="read serif">大切なひとに食べてもらいたいもの。ふれてほしいもの。<br>
		子どもたちに体験してほしいこと。残したいもの。<br>
		そして毎日をがんばるあなたへ届けたいものがある。</p>
		<hr class="style02">
						<h4><?php the_title(); ?></h4>
		<p class="info">開催日：<?php if(get_field("date")): ?><?php echo post_custom('date'); ?><?php endif; ?><span class="small">（日曜日）※雨天決行</span><br>AM 10:00 〜 PM 14:00</span></p>
		<p class="small access">〒525-0036 滋賀県草津市草津町1866-6 <br class="visible-xs"><span class="icon-map-pin"></span><a href="https://goo.gl/maps/FKpxKUA2fBx" target="_blank"> Google マップ</a><br>草津駅より徒歩20分 湖南農業高校すぐ横</p>
		<div class="button-container"><a class="button style02" href="<?php the_permalink(); ?>">出店者情報など詳しくはこちら</a></div>
									 <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>  
					</div><!--/.fullwidth-bg-container-->
</div><!-- fullwidth-bg -->
<section class="section">
	<div class="container">
		<div class="section-title">
			<h3 class="heading-01 none-mb">スムースマルシェからのお知らせ</h3>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-12">
				<div class="news-inner">
					<ul>
						<?php
      $toplist = array(
        'post_type' => 'blog',
        'showposts' => 4,
        'cat_blog' => 'marche-shop',
      );
      ?>
      <?php query_posts($toplist); ?>
      <?php if (have_posts()):while(have_posts()):the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><div><div class="date"><?php the_time('Y年m月d日'); ?></div><p><?php the_title() ?></p></div></a></li>
						 <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?> 
					</ul>
				<div style="text-align: right; font-size: 13px;  font-size: 1.3rem;"><p><a href="/blog/category/marche/">全て見る</a> <span class="icon-arrow_right-circle"></span></p></div>
			</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div><!--/.container-->
</section>

<section class="section section-marche">
	<div class="container">
		<div class="section-title">
			<h3 class="heading-01 none-mb">これまでのスムースマルシェ</h3>
		</div>
		<div class="row">
						<?php
      $toplist = array(
        'post_type' => 'sumusmarche',
        'showposts' => 4,
        'offset' => 1,
      );
      ?>
      <?php query_posts($toplist); ?>
      <?php if (have_posts()):while(have_posts()):the_post(); ?>
						<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="post-sumally marche heightLine">
				<div class="post-sumally-image">
					<a href="<?php the_permalink(); ?>">
				<figure><?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail( 'post-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
					<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?><figcaption class="marche"><div class="inner cntr"><p><?php the_title(); ?><?php if(get_field("date")): ?><span class="serif small"><?php echo post_custom('date'); ?><?php endif; ?></span></p></div></figcaption>
				</figure>
				</a>
				</div>
			</div><!--/post-sumally-->
		</div><!--/col-->
	 <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>  

						</div><!--/.row-->

				<div style="text-align: right; font-size: 13px;  font-size: 1.3rem;"><p><a href="/event/sumusmarche/past/">全て見る</a> <span class="icon-arrow_right-circle"></span></p></div>

	</div><!--/.container-->
</section>


<div class="container">
	<div class="workshop-container workshop-wood">
		<div class="inner">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/workshop/bg_workshop-wood.jpg" class="visible-xs" style="margin-bottom: 0.5em;">
			<h2 class="t-center serif">スムース木工広場<span>WORKSHOP FOR WOOD</span></h2>
			<p class="">スムースマルシェ開催時に行う木工ワークショップ「スムース木工広場」。人気のスツールづくりなど、廃材を利用したD.I.Yを親子で楽しんでいただけます。ぜひ、お気軽にご参加ください。</p>
			<div class="button-container"><a class="button" href="/event/workshop/category/woodworkshop/">詳しく</a></div>
		</div>
	</div>
</div>

<br><br>


<section class="mainvisual forshop">
	<div class="read-container" style="padding: 2em 2em 1em;">
	<h2>スムースマルシェへの出店について</h2>
	<p>スムースマルシェへの出店をご検討いただきありがとうございます。<br class="hidden-xs">
現在、スムースマルシェではホームページからの出店お申し込みは受け付けておりません。<br class="hidden-xs">
是非一度、スムースマルシェの会場へ遊びにいらして下さい。<br class="hidden-xs">ここにしかないモノ・コトを感じて頂きたいです。<br class="hidden-xs">出店概要をご用意してお待ち致しております。</p>
</div>
</section>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>