<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2 class="re">Sumus BLOG<span>ブログ・読みもの</span></h2>
	</div>
</section>
<nav class="nav-horizontal">
	<div class="container">
	  <div class="mask">
	    <ul class="list">
				<li><a href="/blog/">全て</a></li>
				<?php // get_terms を使ったターム一覧の表示
				  $taxonomy_terms = get_terms('cat_blog', ['parent' => 0], ['orderby' => 'none']); // タクソノミースラッグを指定
				  if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)){
				    foreach($taxonomy_terms as $taxonomy_term): // foreach ループの開始
					?>
					<li class="<?php if($taxonomy_term->slug === $term){ echo 'current-cat'; } ?>"><a href="<?php echo get_term_link($taxonomy_term); ?>"><?php echo $taxonomy_term->name; ?></a></li>
					<?php
					    endforeach; // foreach ループの終了
					  }
				?>
	    </ul>
	  </div>
	</div>
</nav>

<section class="section blog">
<div class="container">
<div class="row-0">
<div class="col-md-8 col-sm-8">
<section class="post-single">
<!-- カテゴリータイトル -->
<?php if ( in_category( 'kurashi-no-chie' ) ): ?>
<div class="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/cat-visual-001.jpg" alt="暮らしの知恵"></div>
<?php endif; ?>
<?php if ( in_category( 'marche' ) ): ?>
<div class="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/cat-visual-002.jpg" alt="スムースマルシェ"></div>
<?php endif; ?>
<?php if ( in_category( 'antennashop' ) ): ?>
<div class="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/cat-visual-003.jpg" alt="スムースアンテナショップ"></div>
<?php endif; ?>
<?php if ( in_category( 'genba' ) ): ?>
<div class="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/cat-visual-004.jpg" alt="家づくりの現場"></div>
<?php endif; ?>

<?php
	$post_cat=get_the_category(); 
	$cat=$post_cat[0];
?>

<header class="post-single-header">
	<div class="post-info"><span class="date"><!-- Published on --><?php the_time('Y.m.d'); ?></span>｜<span class="cat-name information"><ul class="post-categories"><li><a href="" rel="category tag"><?php the_category(); ?></a></li></ul></span></div>
	<h1 class="post-title"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h1>
	<div class="taglist"></div><!--/.taglist-->
	<div class="staff-credit"></div><!--/.staff-credit-->
</header>

<div class="post-body">
<div class="post-content">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<div class="l-autor">
<div class="l-autor-body clearfix">
	<div class="autor-face"><?php echo get_avatar(get_the_author_meta('ID'), 250); ?></div>
	<div class="autor-txt">
		<h4 class="autor-name"><?php the_author_meta('first_name'); ?> <span><?php the_author_meta('last_name') ; ?></span></h4>
		<p class="autor-meta"><?php the_author_meta('user_description'); ?></p>
	</div>
</div>
</div>

</div><!--/.post-content-->

</div><!--/.post-body-->

	<div class="pagination">
		<ul class="clearfix">
			<li class="prev fl"><?php previous_post_link('%link', '<span class="icon-arrow_left"></span> 前の記事へ' ); ?></li>
			<li class="navitop"><a href="<?php bloginfo('url'); ?>/blog/"><span class=""></span>一覧</a></li>
			<li class="next fr"><?php next_post_link('%link', '次の記事へ <span class="icon-arrow_right"></span>' ); ?></li>
		</ul>
	</div>

</section>
</div><!--/.col-->

<div class="col-md-4 col-sm-4">
<div id="side" class="blog">

<div class="l-side-sns">
<div class="fb-page" data-href="https://www.facebook.com/sumus.jp/" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/sumus.jp/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sumus.jp/">株式会社 スムース</a></blockquote></div>
</div>

<div class="sidebord first">
<section class="recent-posts">
<h2><span>最新の記事</span></h2>
      <?php
      $toplist = array(
        'post_type' => 'blog',
        'posts_per_page' => 5,
      );
      ?>
      <?php query_posts($toplist); ?>
      <?php if (have_posts()):while(have_posts()):the_post(); ?>
<div class="post-sumally clearfix">
	<div class="post-thumbnail"><a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail( 'blog-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
								<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?></a></div>
	<div class="post-body">
	<a href="<?php the_permalink(); ?>">
		<h3 class="post-title">
		<?php the_title(); ?></h3>
	</a>
	<p class="post-info" style="display:block;"><?php the_time('Y.m.d'); ?>｜<a href="/blog-giotto/category/information/" rel="category tag"><a href="https://sumus.jp/blog/category/genba/" rel="category tag">家づくりの現場</a></a></p>
	</div>
</div>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>  
	</section>
</div>

<div class="sidebord second">
<?php dynamic_sidebar(); ?>
</div>

</div><!--/#side-->
</div><!--/.col-->
</div><!--./row-0-->

</div><!--/.container-->
</section>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>