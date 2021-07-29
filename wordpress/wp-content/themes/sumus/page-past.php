<?php
/*
Template Name: past
*/
get_header(); ?>

<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>
<section class="l-mainvisual-sub">
	<div class="mainvisual-sub-txt">
		<h2 class="re">sumus marche<span>スムースマルシェ.</span></h2>
	</div>
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
        'posts_per_page' => 12,
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