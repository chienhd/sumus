<?php get_header(); ?>

<div id="sb-site">
	<div class="ground sub">
		<?php get_template_part( 'include/breadcrumb' ); ?>

		<section class="l-mainvisual-sub">
			<div class="mainvisual-sub-txt">
				<h2>sumus staff<span class="">スタッフ紹介</span></h2>
			</div>
		</section>
		<section class="section section-staff">
			<div class="container">
				<div class="section-title">
<!--<h3 class="heading-01">スムーススタッフ</h3>
<p>それぞれのスタッフがどんな想いで家づくりと向き合っているのか、どんなことに興味があり、何を得意としているのかなどをご紹介します。</p>
</div>-->
<!--/.section-title -->

<div class="row">
  <?php 
      $toplist = array(
        'post_type' => 'staff',
        'showposts' => -1,
        'cat_staff' => 'ceo'
      );
      ?>
  <?php query_posts($toplist); ?>
  <?php if (have_posts()):while(have_posts()):the_post(); ?>
  <div class="col-md-3 col-sm-4 col-xs-6">
    <div class="post-sumally heightLine clearfix">
      <div class="profile-image"><a href="<?php the_permalink() ?>">
        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail( 'staff-thum', array( 'class' => 'profileimg-on', 'alt' =>$title, 'title' => $title)); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" />
        <?php endif; ?>

        <?php
$image_id = get_field( 'profileimg-off' );
if( $image_id ) {
	echo wp_get_attachment_image( $image_id, 'staff-thum', "", ["class" => "profileimg-off","alt"=>$title] );
}
?>
        </a></div>
      <div class="post-sumally-body">
        <h2 class="post-sumally-title profile">
          <?php the_title(); ?>
          <span class="">
          <?php if( get_field('staff-name') ): ?>
          <?php echo post_custom('staff-name'); ?>
          <?php endif; ?>
          </span></h2>
        <p class="small">
          <?php 
                  $custom_post_tag = 'cat_staff';
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
                ?>
          <br />
          <?php if( get_field('staff-position') ): ?>
          <?php echo post_custom('staff-position'); ?>
          <?php endif; ?>
        </p>
      </div>
      <!--/post-sumally--></div>
  </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_postdata(); wp_reset_query(); ?>
</div>
	<div class="section-title">
		<h3 class="heading-01">マーケティングチーム</h3>
	</div>

	<div class="row">
  <?php 
      $toplist = array(
        'post_type' => 'staff',
        'showposts' => -1,
        'cat_staff' => 'marketing'
      );
      ?>
  <?php query_posts($toplist); ?>
  <?php if (have_posts()):while(have_posts()):the_post(); ?>
  <div class="col-md-3 col-sm-4 col-xs-6">
    <div class="post-sumally heightLine clearfix">
      <div class="profile-image"><a href="<?php the_permalink() ?>">
        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail( 'staff-thum', array( 'class' => 'profileimg-on', 'alt' =>$title, 'title' => $title)); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" />
        <?php endif; ?>

        <?php
$image_id = get_field( 'profileimg-off' );
if( $image_id ) {
  echo wp_get_attachment_image( $image_id, 'staff-thum', "", ["class" => "profileimg-off","alt"=>$title] );
}
?>
        </a></div>
      <div class="post-sumally-body">
        <h2 class="post-sumally-title profile">
          <?php the_title(); ?>
          <span class="">
          <?php if( get_field('staff-name') ): ?>
          <?php echo post_custom('staff-name'); ?>
          <?php endif; ?>
          </span></h2>
        <p class="small">
          <?php 
                  $custom_post_tag = 'cat_staff';
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
                ?>
          <br />
          <?php if( get_field('staff-position') ): ?>
          <?php echo post_custom('staff-position'); ?>
          <?php endif; ?>
        </p>
      </div>
      <!--/post-sumally--></div>
  </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_postdata(); wp_reset_query(); ?>
</div>

<div class="section-title">
	<h3 class="heading-01">クリエイティブチーム</h3>
</div>

<div class="row">
  <?php 
      $toplist = array(
        'post_type' => 'staff',
        'showposts' => -1,
        'cat_staff' => 'creative'
      );
      ?>
  <?php query_posts($toplist); ?>
  <?php if (have_posts()):while(have_posts()):the_post(); ?>
  <div class="col-md-3 col-sm-4 col-xs-6">
    <div class="post-sumally heightLine clearfix">
      <div class="profile-image"><a href="<?php the_permalink() ?>">
        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail( 'staff-thum', array( 'class' => 'profileimg-on', 'alt' =>$title, 'title' => $title)); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" />
        <?php endif; ?>

        <?php
$image_id = get_field( 'profileimg-off' );
if( $image_id ) {
  echo wp_get_attachment_image( $image_id, 'staff-thum', "", ["class" => "profileimg-off","alt"=>$title] );
}
?>
        </a></div>
      <div class="post-sumally-body">
        <h2 class="post-sumally-title profile">
          <?php the_title(); ?>
          <span class="">
          <?php if( get_field('staff-name') ): ?>
          <?php echo post_custom('staff-name'); ?>
          <?php endif; ?>
          </span></h2>
        <p class="small">
          <?php 
                  $custom_post_tag = 'cat_staff';
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
                ?>
          <br />
          <?php if( get_field('staff-position') ): ?>
          <?php echo post_custom('staff-position'); ?>
          <?php endif; ?>
        </p>
      </div>
      <!--/post-sumally--></div>
  </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_postdata(); wp_reset_query(); ?>
</div>

													</div>
													<!--/.container --></section>


													<?php get_footer(); ?>
												</div><!--/.ground -->
											</div><!--/#sb-site -->

											<?php get_template_part( 'include/mobile-menu' ); ?>
											<?php get_template_part( 'include/footer-script' ); ?>
										</body>
										</html>