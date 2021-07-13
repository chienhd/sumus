		<!-- ここからOGP -->
		<meta property="og:locale" content="ja_JP">
		<?php
		$str = $post->post_content;
		$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
		if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){//投稿にサムネイルがある場合の処理
		     $image_id = get_post_thumbnail_id();
		     $image = wp_get_attachment_image_src( $image_id, 'full');
		     echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n";
		} else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {//投稿にサムネイルは無いが画像がある場合の処理
		     echo '<meta property="og:image" content="'.$imgurl[2].'" />';echo "\n";
		} else {//投稿にサムネイルも画像も無い場合、もしくはアーカイブページの処理
		     echo '<meta property="og:image" content="' . get_bloginfo('url') . '/assets/images/common/ogimage.jpg">';echo "\n";
		}
		?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
		<!-- ここまでOGP -->