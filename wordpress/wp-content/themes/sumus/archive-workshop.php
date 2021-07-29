<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2 class="re">WORKSHOP<span>ワークショップ</span></h2>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-10 col-xs-offset-1">
			<div class="read-container">
				<p>スムースではワークショップを開催しています。<br class="hidden-xs">
				毎月平日1回開催している、母・女性を主役としたワークショップの「暮らしをたのしむ会」。<br class="hidden-xs">
				スムースマルシェの際に開催している、親子で楽しめる<br class="hidden-xs">
				木工ワークショップの「スムース木工広場」です。</p>
			</div><!--/.read-container-->
		</div>
	</div><!--/.row -->
</div><!--/.container -->

<section class="section blog">
	<div class="container">
		<div class="section-title">
			<h3 class="heading-01 none-mb">最新のワークショップ</h3>
		</div>
		<section
		<div class="row">
			<?php
if( have_posts() ) :
	while ( have_posts() ) : the_post();
?>
				<div class="col-md-4 col-sm-6">
					<div class="post-sumally heightLine clearfix">
						<div class="post-sumally-image">
							<a href="<?php the_permalink(); ?>">
								<figure><?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail( 'post-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
								<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?>									<figcaption></figcaption>
							</figure>
						</a>
					</div>
					<div class="post-sumally-body">
							<div class="cat-label kurashi"><?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
                  $custom_post_tag = 'cat_workshop'; // タクソノミーのスラッグを指定
                  $custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag,
                  	array(
                  		'parent' => 0,
                  		'orderby' => 'description'
                  	));
                  if(!empty($custom_post_tag_terms)){
                  	if(!is_wp_error( $custom_post_tag_terms )){
                  		foreach($custom_post_tag_terms as $term){
                  			$tag_term_link = get_term_link($term->slug, $custom_post_tag);
                  			$tag_term_name = $term->name;
                  			echo '<a href="'.$tag_term_link.'">'.$tag_term_name.'</a>';
                  		}
                  	}
                  }
              ?></div>
              <h2 class="post-sumally-title"><a href="https://sumus.jp/workshop/kurashi/1044/"><?php the_title(); ?></a></h2>
              <p class="host-info">Hosted by <?php if( get_field('host-name') ): ?>
              <?php echo post_custom('host-name'); ?>
              <?php endif; ?></p>


              <?php
              if (get_field("checkbox-fix")): ?>
              	<?php
              	$checks = get_field("checkbox-fix");
              	foreach ($checks as $check) : ?>
              		<strong class="fix">受付<br>終了</strong>
              	<?php endforeach; ?>
              <?php endif; ?>

              <?php if( get_field('information') ): ?>
              	<?php echo post_custom('information'); ?>
              <?php endif; ?>
          </div>
      </div><!--/post-sumally-->
  </div><!--/.col-->
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
<?php wp_reset_query(); ?>  
</div><!--/.row-->
</div><!--/.container-->
</section>


<section class="section section-workshop">
	<div class="container none-margin">
		<div class="workshop-container workshop">
			<div class="inner">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/workshop/bg_workshop.jpg" class="visible-xs" style="margin-bottom: 0.5em;">
				<h2 class="t-center serif">暮らしを楽しむ会<span>平日ワークショップ</span></h2>
				<p class="small">毎日の暮らしの中でいつも頭の中にあるのは家族のこと。家族のことを一番に想い一生懸命なあなたにとって、少しだけの自分優先の時間がリフレッシュの場になることを願っています。毎日の暮らしを楽しむきっかけがここにあります。</p>
				<p class="t-center"><a href="/event/workshop/category/kurashi/">ワークショップを見る</a> <span class="icon-arrow_right-circle"></span></p>
			</div>
		</div>
	</div><!--/.container -->
	<div class="container none-margin">
		<div class="workshop-container workshop-wood">
		<div class="inner">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/workshop/bg_workshop-wood.jpg" class="visible-xs" style="margin-bottom: 0.5em;">
			<h2 class="t-center serif">スムース木工広場<span class="sans">Workshop For Wood</span></h2>
			<p class="small">スムースマルシェ開催時に行う木工を使ったワークショップ「スムース木工広場」。人気のスツールづくりなどなど、廃材を利用して親子でD.I.Yを楽しめます。ぜひ、お気軽にご参加ください。</p>
				<p class="t-center"><a href="/event/workshop/category/woodworkshop/">ワークショップを見る</a> <span class="icon-arrow_right-circle"></span></p>
		</div>
	</div>
	</div><!--/.container -->
</section><!--/.section-workshop-->


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>