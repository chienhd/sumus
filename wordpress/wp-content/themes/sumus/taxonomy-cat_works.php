<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2>WORKS<span>建築事例</span></h2>
		</div>
</section>

<nav class="nav-horizontal">
	<div class="container">
	  <div class="mask">
	  	<ul class="list">
	  		<li><a href="/works/">全て</a></li>
	  		<?php
			  $taxonomy_terms = get_terms('cat_works', ['parent' => 0], ['orderby' => 'none']); // タクソノミースラッグを指定
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

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-12">
			<div class="read-container works-read">
			<h2>「暮らしの道」からうまれる家づくり</h2>
			<p>家族にとっての暮らしが、快適でそして楽しくなる生活動線。<br class="hidden-xs">
				それをスムースの家づくりでは「暮らしの道」と呼びます。</p>
				<p>家事を効率的にすることができる道も大切。<br class="hidden-xs">
					でもそれだけで暮らしが豊かになるわけではありません。<br class="hidden-xs">
					風の道、光の道、そして自分の目線がとおる道。<br class="hidden-xs">
					自分の家族にとってどんな「道」を大切にしたいか探してみて下さい。</p>
		</div>
		</div>
	</div>
</div>

<section class="section works">
	<div class="container">
		<div class="row">
<?php
if( have_posts() ) :
	while ( have_posts() ) : the_post();
?>

		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="post-sumally heightLine clearfix">
				<div class="post-sumally-image">
							<a href="<?php the_permalink(); ?>">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail( 'works-thum', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
									<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" />
								<?php endif; ?>
							</a>
						</div>
				<div class="post-sumally-body">
					
							<h2 class="post-sumally-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<? 
							$txt = get_field('copy');
							if($txt){ ?><p class="small" style="color:#999;"><? echo $txt; ?></p>
							<? } ?>
						</div>
			</div><!--/post-sumally-->
		</div><!--/col-->
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>  

		</div><!--/.row-->
		
		<!-- wp_pagenavi -->
		<?php if(function_exists('wp_pagenavi')) wp_pagenavi(); ?>
		
	</div>
</section>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>