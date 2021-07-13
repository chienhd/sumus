<?php
/*
Template Name: contact
*/
get_header(); ?>

<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2>CONTACT<span>資料請求フォーム</span></h2>
	</div>
</section>

<section class="contact-read">
	<div class="container">
		<div class="row">
				<div class="col-md-10 col-md-offset-1 col-ms-10 col-ms-offset-1 col-xs-12 nonepadding">
					<h3 class="heading-03" style="margin-bottom: 2em;">家づくりのカタログをご用意しております。</h3>
				  <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/catalog.png" alt="家づくりのカタログ" class="center" style="margin-bottom: 2em;"> -->

					<!-- <div class="img-wrapper">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/cover_01.jpg" alt="これまでの建築事例や仕様などをご紹介しているカタログ。" class="center">
						<p>これまでの建築事例や仕様などをご紹介しているカタログ。</p>
					</div> -->

					<!--<div class="img-wrapper">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/cover_02.jpg" alt="実際のご家族の暮らし方をご紹介しているカタログ。" class="center">
						<p>実際のご家族の暮らし方をご紹介しているカタログ。</p>
					</div>-->

					<!-- <div class="img-wrapper">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/cover_03.jpg" alt="スムースの新仕様　人と地球にやさしい家 「つなぐ」カタログ。" class="center">
						<p>スムースの新仕様。人と地球にやさしい家 「つなぐ」カタログ。</p>
					</div> -->

					<!-- <div class="img-wrapper">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/cover_04.jpg" alt="小冊子「暮らしと家族の本」" class="center">
						<p>小冊子「暮らしと家族の本」<br>気になる地域のお店や人、家族、暮らし方にフォーカスをあて、様々な情報も織り交ぜて定期的に発行しているスムースの冊子。</p>
					</div> -->

					<div class="img-wrapper">
						<p>事例写真やスムースの家づくりについて掲載したカタログのほか、定期的に発行している小冊子や最新情報をお届けいたします。</p>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/cover_05.jpg" alt="小冊子「暮らしと家族の本」" class="center">
					</div>
<hr>
					<div class="img-wrapper">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/photo_set.jpg" alt="" class="center">
						<h3 class="heading-03" style="padding-top:2rem; margin-bottom:0 !important; text-align:left;">スムースの施工可能エリア</h3>
						<p style="padding-top:2rem;" >主に、滋賀・京都を中心とした、<span style="color:#fff; padding:0.5rem; background-color:#9FAF38;">自動車移動にて1時間圏内</span>を施工可能エリアとさせていただいております。ご検討の場所が該当するか等、お気軽にお問合せくださいませ。</p>
					</div>
					

<!--
					<div class="col-md-12 col-ms-12 col-xs-12">
						<h3 class="fukidashi">暮らしの小物をプレゼント</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/present01.jpg" alt="プレゼント" class="present">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/present02.jpg" alt="プレゼント" class="present">
						<p style="margin-bottom: 1em;">資料請求いただいたお客様へ、スムースがセレクトしたり、オリジナル作成したグッズなど、暮らしの小物をもれなくプレゼント。ささやかですが、日々の暮らしにお使いください。何が届くかはお楽しみに！</p>
					</div>
-->

				</div>
		</div>
	</div>
<div id="form-start"></div>
</section><!-- /.contact-read -->

<hr>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-10 col-xs-offset-1 nonepadding">
<?php the_content(); ?>
<?php endwhile; endif; ?>
</div>
</div>
</div>

<section class="free-dial shadow-inside">
	<p class="bold">お電話でのお問い合わせ（受付時間10:00〜19:00）</p>
	<p class="phonenum"><span class="serif">Free Dial.</span><a href="tel:0120992315">0120-992-315</a></p>
	<div class="button-container"><a class="button style03" href="#form-start">お問い合わせ・資料請求</a></div>
</section>

<section class="company-info gimon">
	<div class="container">
		<div class="section-title">
			<h3 class="heading-01">家づくりの疑問やお悩みを<br class="visible-xs">スムースが解決します</h3>
		</div><!--/.section-title -->
	
<div class="row">
	<div class="col-md-10 col-md-offset-1 col-ms-10 col-ms-offset-1 col-xs-12">
	<div class="row" style="margin-bottom: 2em;">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/photo01.jpg" alt="家づくり、まず何から始めたらいいの？" class="center" style="margin-bottom: 1em;">
				</div><!--/.col-->
				<div class="col-md-8">
					<p style="font-weight: bold; margin-bottom: 0.5em;	font-size: 19px; 	font-size: 1.9rem;">家づくり、まず何から始めたらいいの？</p>
					<p style="font-size: 13px; 	font-size: 1.3rem;">家のかたちからではなく、その前に資金計画を立てることが重要です。資金計画が明確でなければ、どんな土地を探せばいいかも分かりませんし、将来の家計にも不安が残ります。今の家賃と同じくらいでやっていけるの？ローンの仕組みは？など、疑問や不安をどんどんぶつけてください。土地探しでは、実際に一緒に敷地を見に行かせていただいています。どんな暮らしがしたいか、その為にはどんな敷地を選ぶべきかをしっかりと見極めることが大切です。</p>
				</div><!--/.col-->
			</div>

	<div class="row" style="margin-bottom: 2em;">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/photo02.jpg" alt="日本の家はどうして寒いの？" class="center" style="margin-bottom: 1em;">
				</div><!--/.col-->
				<div class="col-md-8 col-xs-10 col-ms-offset-1">
					<p style="font-weight: bold; margin-bottom: 0.5em;	font-size: 19px; 	font-size: 1.9rem;">日本の家はどうして寒いの？</p>
					<p style="font-size: 13px; 	font-size: 1.3rem;">冬は廊下やトイレに行くのが寒くておっくう、なんてこと多いですが、日本より北にあるドイツ等と比べ世界的に見ても日本の家は寒いと言われます。それは、せっかく暖めた空気をどんどんと逃してしまっているせい。大事なのは断熱と気密です。断熱性の高いセルロースファイバーを断熱材に使用し、テープやパッキンで建物の隙間をふさいで気密の施工に注意しています。C値基準0.9クリアを実証しています。熱効率を上げて光熱費は下げる。冬暖かく、夏涼しい、これからのスタンダードです。</p>
				</div><!--/.col-->
			</div>

	<div class="row" style="margin-bottom: 2em;">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/photo03.jpg" alt="家事も子育てももっと楽しめる家がいい。" class="center" style="margin-bottom: 1em;">
				</div><!--/.col-->
				<div class="col-md-8">
					<p style="font-weight: bold; margin-bottom: 0.5em;	font-size: 19px; 	font-size: 1.9rem;">家事も子育てももっと楽しめる家がいい。</p>
					<p style="font-size: 13px; 	font-size: 1.3rem;">家事や子育てにストレスや悩みはつきもの。だから、家の間取りや動線、収納の工夫などによって少しでも負担を軽くすることは重要で、それだけでも気持ちにゆとりが生まれます。でも、もっと楽しめることや、心地よい暮らしって何だろう？たとえば、陽だまりのある窓辺に家族が集まったり、キッチンでお手伝いする子どもの横顔がいきいきして見えたり、爽やかな風が家の中を通り抜けたり …　そんな、ふとした瞬間を感じられることも家事や子育てをもっと楽しむために大切にしたいこと。</p>
				</div><!--/.col-->
			</div>


	<div class="row" style="margin-bottom: 0;">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/photo04.jpg" alt="家族を守る、丈夫な家をつくるには。" class="center" style="margin-bottom: 1em;">
				</div><!--/.col-->
				<div class="col-md-8">
					<p style="font-weight: bold; margin-bottom: 0.5em;	font-size: 19px; 	font-size: 1.9rem;">家族を守る、丈夫な家をつくるには。</p>
					<p style="font-size: 13px; 	font-size: 1.3rem;">地震の多い日本。丈夫で安心な家づくりは必須です。阪神大震災で倒壊した木造住宅を調査すると、シロアリ被害・腐朽があった家屋の9割が全壊していたのに対し、シロアリ被害・腐朽なしの家屋は2割程度の被害で済んでいるという事実があります。このことから、薬液を加圧注入して半永久的に防腐・防蟻効果の高い「くさらない木」を使用しています。現場をよく知っているスタッフだからこそ選んだ仕様のひとつです。もちろん全物件、構造計算を行っています。</p>
				</div><!--/.col-->
			</div>

</div>
	</div>
	</div><!--/.container -->
</section>
<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />  
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script> 
</body>
</html>