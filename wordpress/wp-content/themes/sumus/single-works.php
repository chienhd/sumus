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
			    $terms = get_terms('cat_works'); // タクソノミースラッグを指定
			    foreach ( $terms as $term ) {
			      echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
			    }
			  ?>
	    </ul>
	  </div>
	</div>
</nav>

<section class="section section-single-works <?php $posttags = get_the_tags();
if ($posttags) {
foreach($posttags as $tag) {
echo $tag->name.'';
}
}
?>">
	<div class="container">
		<section class="post-single">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
				<?
				$img = get_field('main-photo');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><div class="keyvisual"><img src="<? echo $imgurl[0]; ?>" alt="<?php the_title(); ?>" class=""></div>
				<? } ?>

				<div class="inner">
					<header class="post-single-header">
						<h1 class="post-title t-center"><?php the_title(); ?></h1>
						<?
							$txt = get_field('copy');
							if($txt){ ?><p class="sub-title"><? echo $txt; ?></p>
						<? } ?>
					</header>
					<hr class="style02">
					<div class="post-body">
						<div class="post-content">
						<?
							$txt = get_field('main-text');
							if($txt){ ?><p><? echo $txt; ?></p>
						<? } ?>
					</div><!--/.post-content-->
					</div>
				</div><!--/.inner-->

				<?php
				$youtube1 = get_field('youtube1');
				if($youtube1) : ?>
					<div class="row" style="max-width: 965px; margin: 0 auto 30px;"><div class="col-md-12 col-sm-12">
						<div class="yt yt1">
							<iframe src="<?=esc_url($youtube1)?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0"></iframe>
						</div>
					</div></div>
				<?php endif ?>

				<?php
				$youtube2 = get_field('youtube2');
				if($youtube2) : ?>
					<div class="row" style="max-width: 965px; margin: 0 auto 30px;"><div class="col-md-12 col-sm-12">
						<div class="yt yt2">
							<iframe src="<?=esc_url($youtube1)?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0"></iframe>
						</div>
					</div></div>
				<?php endif ?>

				<div class="clearfix" style="max-width: 770px; margin: 0 auto;">

					<script src="https://gridstackjs.com/node_modules/gridstack/dist/gridstack-h5.js"></script>
					<link href="https://gridstackjs.com/node_modules/gridstack/dist/gridstack.min.css" rel="stylesheet"/>
					<style type="text/css">
					  	.grid-stack { background: #FAFAD2; }
					  	.grid-stack-item-content { background-color: #18BC9C; }
					  	.grid-stack>.grid-stack-item[gs-w="2"]  { width: 100%; }
						.grid-stack>.grid-stack-item[gs-w="1"]  { width: 49.9% }
						.grid-stack>.grid-stack-item[gs-x='1'] { left: 50%; }
					</style>

					<?php echo 
					'<div class="grid-stack grid-stack-12 grid-stack-instance-4843 grid-stack-animate grid-stack-2" gs-current-row="2" style="height: 1024px;"><div class="grid-stack-item ui-draggable ui-resizable ui-resizable-autohide" gs-x="0" gs-y="0" gs-w="2" gs-h="1" style=""><div class="grid-stack-item-content" draggable="true"><img src="http://localhost:8383/wp-content/uploads/2021/07/DSC02612.jpg"></div><div class="ui-resizable-handle ui-resizable-se" style="z-index: 100; user-select: none;"></div></div><div class="grid-stack-item ui-draggable ui-resizable ui-resizable-autohide" gs-x="0" gs-y="1" gs-w="1" gs-h="1" style=""><div class="grid-stack-item-content" draggable="true"><img src="http://localhost:8383/wp-content/uploads/2021/07/profile.jpg"></div><div class="ui-resizable-handle ui-resizable-se" style="z-index: 100; user-select: none;"></div></div><div class="grid-stack-item ui-draggable ui-resizable ui-resizable-autohide" gs-x="1" gs-y="1" gs-w="1" gs-h="1" style=""><div class="grid-stack-item-content" draggable="true"><img src="http://localhost:8383/wp-content/uploads/2021/07/profile.jpg"></div><div class="ui-resizable-handle ui-resizable-se" style="z-index: 100; user-select: none;"></div></div></div>';
					?>

					<script type="text/javascript">
						var items = [
					    {content: '<img	src="http://localhost:8383/wp-content/uploads/2021/07/profile.jpg">'}, // will default to location (0,0) and 1x1
					    {content: '<img	src="http://localhost:8383/wp-content/uploads/2021/07/profile.jpg">'}, // will default to location (0,0) and 1x1
					    {w: 2, content: '<img	src="http://localhost:8383/wp-content/uploads/2021/07/DSC02612.jpg">'} // will be placed next at (1,0) and 2x1
					    ];
					    var grid = GridStack.init({column: 2});
					    grid.load();
					    grid.enableMove(false, false);
					    grid.enableResize(false, false);

					</script>
				</div>

			<div class="row" style="max-width: 965px; margin: 0 auto;">
				<div class="col-md-6 col-sm-6">

				<?  
				$img = get_field('right-photo');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 3em;" >
				<? } ?>
				<div class="favorite-space">
				<?  
				$img = get_field('mathers-photo');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center">
				<? } ?>
				<?
					$txt = get_field('mathers-text');
					if($txt){ ?>
				<div class="inner">
					<div class="post-body">
						<div class="post-content">
							<p><? echo $txt; ?></p>
						</div>
					</div>
				</div>
				<? } ?>

				<?  
				$img = get_field('left_images01');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images02');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images03');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images04');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images05');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images06');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images07');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images08');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images09');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images10');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images11');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images12');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('left_images13');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center">
				<? } ?>


			
				</div>
			</div><!--/.col -->
				<div class="col-md-6 col-sm-6 right">

				<?  
				$img = get_field('right_images01');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images02');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images03');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images04');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images05');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images06');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images07');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images08');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images09');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images10');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images11');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images12');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center" style="margin-bottom: 30px">
				<? } ?>
				<?  
				$img = get_field('right_images13');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center">
				<? } ?>



				<div class="inner">
					<div class="post-body">
				<div class="post-content">
				<?php if( get_field('left-text') ) { ?>
					<?php the_field('left-text'); ?>
				<?php } ?>
				</div>
			</div>
					</div>
			
				<?  
				$img = get_field('left-photo02');
				$imgurl = wp_get_attachment_image_src($img, 'full');
				if($imgurl){ ?><img src="<? echo $imgurl[0]; ?>" alt="" class="center">
				<? } ?>
			
			</div><!--/.col -->
			
			</div>

						<?
							$txt = get_field('credit');
							if($txt){ ?>

						<div class="credit-wrapper clearfix" style="display: block;">
							<p style="color:#999; font-size: 12px;"><? echo $txt; ?></p>
						</div>
						<? } ?>			
			
			
			<div class="pagination" style="max-width: 945px;">
					<ul class="clearfix">
						<li class="prev fl"><?php previous_post_link('%link', '前の建築事例を見る' ); ?></li>
						<li class="navitop"><a href="<?php bloginfo('url'); ?>"><span class="hidden-xs">建築事例</span>一覧</a></li>
						<li class="next fr"><?php next_post_link('%link', '次の建築事例を見る' ); ?></li>
					</ul>
				</div>
		</section>
	</div>
</section>


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>