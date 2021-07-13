<div class="post-wrapper">
<div class="grid">
<?php
	global $post;
	$args = array(	'posts_per_page' => -1,	'category' => 4,);
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) {
		setup_postdata($post);
?>
<article class="grid-col">
<div class="post-thumbnail">
<?php if ( has_post_thumbnail() ): // on thumbnail ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<figure><?php
$title= get_the_title();
the_post_thumbnail( 'post-thum', array( 'class' => 'thumbnail', 'alt' =>$title, 'title' => $title)); ?>
</figure></a>
<?php else: // none thumbnail ?>
<?php endif; ?>
</div><!-- /.post-thumbnail -->
<a href="<?php the_permalink(); ?>">
<div class="post-sumally">
<h1 class="post-title"><?php if(mb_strlen($post->post_title)>75) { $title= mb_substr($post->post_title,0,75) ; echo $title. ･･･ ;} else {echo $post->post_title;}?></h1>
</div><!-- /.post-sumally -->
</a>
</article>
<?php } wp_reset_postdata(); ?>
</div><!-- /.grid -->
</div><!-- /.post-wrapper -->