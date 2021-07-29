<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2 class="re">WORKSHOP<span>ワークショップ</span></h2>
	</div>
</section>

<nav class="nav-horizontal">
	<div class="container">
	  <div class="mask">
	    <ul class="list">
        <li><a href="/works/">全て</a></li>
        <?php
        $taxonomy_terms = get_terms('cat_workshop', ['parent' => 0], ['orderby' => 'none']); // タクソノミースラッグを指定
        if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)){
          foreach($taxonomy_terms as $taxonomy_term): // foreach ループの開始
      ?>
      <li class="<?php if($taxonomy_term->slug === $term){ echo 'current-cat'; } ?>"><a href="<?php echo get_term_link($taxonomy_term); ?>"><?php echo $taxonomy_term->name; ?></a></li>
      <?php
          endforeach;
        }
      ?>
	    </ul>
	  </div>
	</div>
</nav>

<section class="section blog">
	<div class="container" style="overflow: initial;">
		<section
		<div class="row">
			<?php
if( have_posts() ) :
	while ( have_posts() ) : the_post();
?>
				<div class="col-md-3 col-sm-6">
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

<!-- wp_pagenavi -->
		<?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>
</div><!--/.container-->
</section>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>