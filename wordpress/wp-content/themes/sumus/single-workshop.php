<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2 class="re">WORKSHOP<span>ワークショップ</span></h2>
	</div>
</section><!--/.l-mainvisual-sub-->

<nav class="nav-horizontal">
	<div class="container">
	<div class="mask">
		<ul class="list">
				<li><a href="/event/workshop/">全て</a></li>
				<?php // get_terms を使ったターム一覧の表示
  $taxonomy_terms = get_terms('cat_workshop'); // タクソノミースラッグを指定
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
<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-12">
<section class="post-single">
<!-- カテゴリータイトル -->
<?php if ( in_category( 'kurashi-no-chie' ) ): ?>
<div class="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/cat-visual-001.jpg" alt="暮らしの知恵"></div>
<?php endif; ?>

<header class="post-single-header">
	<div class="post-info"><span class="date"><!-- Published on --><?php the_time('Y.m.d'); ?></span>｜<span class="cat-name information"><ul class="post-categories"><li><a href="" rel="category tag"><?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
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
                  			echo $tag_term_name;
                  		}
                  	}
                  }
              ?></a></li></ul></span></div>

	<h1 class="post-title"><?php
							if (get_field("checkbox")): ?>
							<?php
								$checks = get_field("checkbox");
								foreach ($checks as $check) : ?>
							<strong>NEW</strong>
							<?php endforeach; ?>
							<?php endif; ?>

							<?php
							if (get_field("checkbox-fix")): ?>
							<?php
								$checks = get_field("checkbox-fix");
								foreach ($checks as $check) : ?>
							<strong class="fix">受付終了</strong>
							<?php endforeach; ?>
							<?php endif; ?><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h1>
	<div class="taglist"></div><!--/.taglist-->
	<div class="staff-credit"></div><!--/.staff-credit-->



							
</header>

<div class="post-body">
	<div class="post-content">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>

<!--
		<div class="l-autor">
			<div class="l-autor-body clearfix">
				<div class="autor-face"><?php echo get_avatar(get_the_author_id(), 250); ?></div>
				<div class="autor-txt">
					<h4 class="autor-name"><?php the_author_firstname(); ?> <span><?php the_author_lastname(); ?></span></h4>
					<p class="autor-meta"><?php the_author_meta('user_description'); ?></p>
				</div>
			</div>
		</div>
-->
		
<!--/.l-autor-->

	</div><!--/.post-content-->
</div><!--/.post-body-->
<div class="pagination">
		<ul class="clearfix">
			<li class="prev fl"><?php previous_post_link('%link', '前の記事へ' ); ?></li>
			<li class="navitop"><a href="<?php bloginfo('url'); ?>/event/workshop/"><span class=""></span>一覧</a></li>
			<li class="next fr"><?php next_post_link('%link', '次の記事へ' ); ?></li>
		</ul>
	</div>
</section>
</div><!--/.col-->
</div><!--./row-0-->

</div>
</section>

<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>