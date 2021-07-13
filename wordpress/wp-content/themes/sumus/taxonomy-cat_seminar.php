<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub oh-mainvisual" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/seminar/bg-header-pc.jpg); height: 530px;">
	<div class="mainvisual-sub-txt">
		<h2>EVENT<span>家づくりイベント</span></h2>
	</div>
</section>


<section class="section blog">
	<div class="container" style="overflow:inherit;">
		<div class="row" style="padding-top: 1em;">

				<?php
				$toplist = array(
					'post_type' => 'seminar',
					'showposts' => 6,
					'paged' => get_query_var( 'paged', 1 )
				);
				?>
				<?php query_posts($toplist); ?>
				<?php if (have_posts()):while(have_posts()):the_post(); ?>
				<div class="col-md-4 col-sm-6">
					<div class="post-sumally seminar heightLine clearfix">
						<div class="post-sumally-image">
							<a href="<?php the_permalink(); ?>">
								<figure>
									<?php if (has_post_thumbnail()): ?>
						<?php the_post_thumbnail( 'post-thum-l', array( 'class' => 'transform01 thumbnail', 'alt' =>$title, 'title' => $title)); ?>
						<?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/post-noimage.jpg" /><?php endif; ?><figcaption></figcaption>
								</figure>
							</a>
						</div><!-- end.post-sumally-image -->

						<div class="post-sumally-body">
							<ul class="the_tags clearfix">
							<?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
                  $custom_post_tag = 'cat_seminar'; // タクソノミーのスラッグを指定
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
                        echo '<li><a href="'.$tag_term_link.'">#'.$tag_term_name.'</a></li>';
                      }
                    }
                  }
                ?></ul>
                <h2 class="post-sumally-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php if( get_field('seminar-info') ) { ?>
						<?php the_field('seminar-info'); ?>
					<?php } ?>
					
				<?php
					$checked = get_field('entrycheck');
					if($checked){
						echo '<div class="button-container"><a class="button style05" href="',the_permalink(),'">申し込み受付中</a></div>';
						}
					if( !$checked ){
						echo '<div class="button-container"><a class="button style05 end" href="',the_permalink(),'">受付終了</a></div>';
						}
				?>
						</div><!--/post-sumally-->
						<?php
				$area = get_field('kaisai-bi');
				$checked = get_field('entrycheck');
				if($checked){
					echo $area;
					}
				if( !$checked ){
					echo '';
					}
			?>
		</div>
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