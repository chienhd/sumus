<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
<div class="mainvisual-sub-txt">
<h2>sumus staff<span class="">スタッフ紹介</span></h2>
</div>
</section>
<section class="section section-staff-single">
<div class="section-title">
<h2 class="heading-01 none-mb"><?php if( get_field('staff-title') ): ?>
              <?php echo post_custom('staff-title'); ?>
            <?php endif; ?></h2>
</div>
<!--/.section-title -->
<div class="container none-margin">
<div class="row">
<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-10 col-xs-offset-1">
<div class="row" style="margin-bottom: 1em;">
<div class="col-md-4 col-sm-4">
<div class="post-sumally heightLine clearfix">
<div class="profile-image"><?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail( 'staff-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
								<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?></div>
<div class="post-sumally-body">
<h2 class="post-sumally-title profile"><?php the_title(); ?><span class=""><?php if( get_field('staff-name') ): ?>
              <?php echo post_custom('staff-name'); ?>
            <?php endif; ?></span></h2>
<p class="small"><?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
                  $custom_post_tag = 'cat_staff'; // タクソノミーのスラッグを指定
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
                        echo $tag_term_name;
                      }
                    }
                  }
                ?><br />
<?php if( get_field('staff-position') ): ?>
              <?php echo post_custom('staff-position'); ?>
            <?php endif; ?></p>
</div>
</div>
<!--/post-sumally--></div>
<!--/.col-->
<div class="col-md-8 col-sm-8">
<h3>―プロフィール</h3>
<p><?php if( get_field('staff-txt01') ): ?>
              <?php echo post_custom('staff-txt01'); ?>
            <?php endif; ?></p>
<h3 style="margin-top: 1.5em;">―人生の転機</h3>
<p><?php if( get_field('staff-txt02') ): ?>
              <?php echo post_custom('staff-txt02'); ?>
            <?php endif; ?></p>
<h3 style="margin-top: 1.5em;">―スムースって？</h3>
<p><?php if( get_field('staff-txt03') ): ?>
              <?php echo post_custom('staff-txt03'); ?>
            <?php endif; ?></p>
<!-- 

<h3 style="margin-top: 1.5em;">―メンバーから見た私</h3>
<p>芸術的感性が素晴らしい。自分に正直で曲がったことが大嫌い。（市川）<br />
スムースの水彩は全て彼女の作品。絵に映る心から彼女のヒトを感じてもらいたいです。全体を見渡して目的を見失わないヒト。繊細な心と満面の笑顔がステキ。（牧野）<br />
 豊かな感性でスムースの色を表現する。思いが伝わる提案をしてくれる。（竹森）</p>

 --></div>
<!--/.col--></div>
<div class="youtube">
<iframe width="560" height="315" src="<?php if( get_field('youtube') ): ?>
              <?php echo post_custom('youtube'); ?>
            <?php endif; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>	
<!--/.row-->
<div class="row" style="border-top: 2px solid #ccc; padding: 2em 0 0; margin-bottom: 0;">
<h3 class="t-center">MY FAVORITE</h3>
<div class="col-md-3 col-sm-3 col-xs-3 t-center small circle">
	<?php
$image_id = get_field( 'my_favorite01' );
if( $image_id ) {
	echo wp_get_attachment_image( $image_id, 'full' );
}
?><?php if( get_field('my_fav01_txt') ): ?>
              <?php echo post_custom('my_fav01_txt'); ?>
            <?php endif; ?></div>
<div class="col-md-3 col-sm-3 col-xs-3 t-center small circle">
	<?php
$image_id = get_field( 'my_favorite02' );
if( $image_id ) {
	echo wp_get_attachment_image( $image_id, 'full' );
}
?><?php if( get_field('my_fav02_txt') ): ?>
              <?php echo post_custom('my_fav02_txt'); ?>
            <?php endif; ?></div>
<div class="col-md-3 col-sm-3 col-xs-3 t-center small circle">
	<?php
$image_id = get_field( 'my_favorite03' );
if( $image_id ) {
	echo wp_get_attachment_image( $image_id, 'full' );
}
?><?php if( get_field('my_fav03_txt') ): ?>
              <?php echo post_custom('my_fav03_txt'); ?>
            <?php endif; ?></div>
<div class="col-md-3 col-sm-3 col-xs-3 t-center small circle">
	<?php
$image_id = get_field( 'my_favorite04' );
if( $image_id ) {
	echo wp_get_attachment_image( $image_id, 'full' );
}
?><?php if( get_field('my_fav04_txt') ): ?>
              <?php echo post_custom('my_fav04_txt'); ?>
            <?php endif; ?></div>
</div>
<div style="text-align: right; font-size: 1.3rem; margin-top: 2em;">
<p><a href="../">一覧へ戻る</a><span class="icon-arrow_right-circle"></span></p>
</div>
</div>
<!--/.col--></div>
</div>
<!--/ .container --></section>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>