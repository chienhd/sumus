<?php

add_filter('mwform_scroll_offset_mw-wp-form-49', function( $offset ) {
	//return 700; // 100pxずらす、という意味になります。
} );

// プロフィール情報欄でhtmlを許可
remove_filter('pre_user_description', 'wp_filter_kses');

// head内をクリーンナップ
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');

// 管理バー非表示
add_filter( 'show_admin_bar', '__return_false' );

// srcsetを無効に
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

// ウィジェットを有効に
register_sidebar(array(
    'name' => 'sidebar',
    'id' => 'sidebar-1',
    'before_widget' => "<div class='box'>",
    'after_widget' => "</div>",
    'before_title' => "<h2 class='box-header main-color-font'>",
    'after_title' => '</h2>'
));
// シングルページでカレントカテゴリーに暮らすを追加。
//----------------------------------------------------------------------------------------------------------------------------------------
function sgr_show_current_cat_on_single($output) {
     global $post;
     if( is_single() ) {
          $categories = wp_get_post_categories($post->ID);
          foreach( $categories as $catid ) {
	  $cat = get_category($catid);

	       // Find cat-item-ID in the string
	       if(preg_match('#cat-item-' . $cat->cat_ID . '#', $output)) {
	            $output = str_replace('cat-item-'.$cat->cat_ID, 'cat-item-'.$cat->cat_ID . ' current-cat', $output);
	       }
          }

     }
     return $output;
}

add_filter('wp_list_categories', 'sgr_show_current_cat_on_single');


function pre_get_posts_custom($query) {
  if( is_admin() || ! $query->is_main_query() ){
      return;
  }
  /* ブログトップの表示件数 *注意サイトトップとは違う*/
  if ( $query->is_home() ) {
      $query->set( 'posts_per_page', '12' );
      //$query->set( 'category__not_in',array(4) ); //カテゴリーID4 除外
      return;
  }
  /* カテゴリーページの表示件数、カテゴリ除外 */
  if ( $query->is_category() ) {
      $query->set( 'posts_per_page', '12' );
      //$query->set( 'category__not_in',array() );
      return;
  }
  /* 検索結果ページで固定ページやカスタム投稿を除外する */
  if( $query->is_search() ){
     $query->set( 'post_type','post' );
     return;
  }
}
add_action( 'pre_get_posts', 'pre_get_posts_custom' );

//親カテゴリと子カテゴリのアーカイブテンプレートを共通にする
add_filter( 'category_template', 'my_category_template' );

function my_category_template( $template ) {
	$category = get_queried_object();
	if ( $category->parent != 0 &&
		( $template == "" || strpos( $template, "category.php" ) !== false ) ) {
		$templates = array();
		while ( $category->parent ) {
			$category = get_category( $category->parent );
			if ( !isset( $category->slug ) ) break;
			$templates[] = "category-{$category->slug}.php";
			$templates[] = "category-{$category->term_id}.php";
		}
		$templates[] = "category.php";
		$template = locate_template( $templates );
	}
	return $template;
}


// 抜粋の[…] を消す
//----------------------------------------------------------------------------------------------------------------------------------------
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
/** この設定は the_excerpt() とその関連の抜粋系関数に適用されます。プラグインの WP Multibyte Patch の有効化を忘れずに */
function new_excerpt_mblength($length) {
	return 500;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');


//画像のみpタグで囲わない
//----------------------------------------------------------------------------------------------------------------------------------------
function remove_p_on_images($content){
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'remove_p_on_images');


//wp_titleの$sepが空文字または半角スペースの場合は余分な空白削除
//----------------------------------------------------------------------------------------------------------------------------------------
function my_title_fix($title, $sep, $seplocation){
    if(!$sep || $sep == " "){
        $title = str_replace(' '.$sep.' ', $sep, $title);
    }
    return $title;
}
add_filter('wp_title', 'my_title_fix', 10, 3);


//アイキャッチの設定
//----------------------------------------------------------------------------------------------------------------------------------------
add_theme_support('post-thumbnails'); 
//アイキャッチを有効に
set_post_thumbnail_size( 400, 9999, false);
//アイキャッチ基本サイズ
add_image_size( 'post-thum', 360, 225, true );
add_image_size( 'post-thum-side', 100, 100, true );

add_image_size( 'recipe-thum', 500, 500, false );
add_image_size( 'shop-thum', 800, 500, false );
add_image_size( 'works-thum', 500, 500, true );
add_image_size( 'blog-thum', 500, 500, true );
add_image_size( 'staff-thum', 500, 500, true );
add_image_size( 'oh-thum', 585, 390, true );


//画像のサイズ指定削除
//----------------------------------------------------------------------------------------------------------------------------------------
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


//htmlからheightを削除する
//----------------------------------------------------------------------------------------------------------------------------------------
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// 検索時に固定ページを除外する
//----------------------------------------------------------------------------------------------------------------------------------------
function SearchFilter($query) {
 if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
  $query->set( 'post_type', 'post' );
 }
}
add_action( 'pre_get_posts','SearchFilter' ); 


// サムネイル用に１枚目の画像を取得する方法
//----------------------------------------------------------------------------------------------------------------------------------------
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
 
    if(empty($first_img)){ //Defines a default image
        $first_img = "'.get_template_directory_uri().'/assets/images/common/post-logo.jpg";
    }
return $first_img;
}


// for ogp setting 記事内の１枚目の画像を取得する方法
//----------------------------------------------------------------------------------------------------------------------------------------
function getPostImage($mypost){
if(empty($mypost)){ return(null); }
if(ereg('<img([ ]+)([^>]*)src\=["|\']([^"|^\']+)["|\']([^>]*)>',$mypost->post_content,$img_array)){
  
// imgタグで直接画像にアクセスしているものがある
$dummy=ereg('<img([ ]+)([^>]*)alt\=["|\']([^"|^\']+)["|\']([^>]*)>',$mypost->post_content,$alt_array);
$resultArray["url"] = $img_array[3];
$resultArray["alt"] = $alt_array[3];
}else{
  
// 直接imgタグにてアクセスされていない場合は紐づけられた画像を取得
$files = get_children(array('post_parent' => $mypost->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image'));
if(is_array($files) && count($files) != 0){
$files=array_reverse($files);
$file=array_shift($files);
$resultArray["url"] = wp_get_attachment_url($file->ID);
$resultArray["alt"] = $file->post_title;
}else{
return(null);
}
}
return($resultArray);
}
// ヘッダー整理
//----------------------------------------------------------------------------------------------------------------------------------------
function new_deregister_script() {
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
        }
    }
    add_action('init', 'new_deregister_script');

// 管理画面の並び順
function admin_custom_posttype_order($wp_query) {
  if( is_admin() ) {
    $post_type = $wp_query->query['post_type'];
    if($post_type == 'openhouse' ) {
      $wp_query->set('orderby','date'); //並べ替えの基準(日付)
      $wp_query->set('order','DESC'); //新しい順。古い順にしたい場合はASCを指定
    }
    elseif($post_type == 'sumusmarche' ) {
      $wp_query->set('orderby','date'); //並べ替えの基準(日付)
      $wp_query->set('order','DESC'); //新しい順。古い順にしたい場合はASCを指定
    }
  }
}
add_filter('pre_get_posts', 'admin_custom_posttype_order');

function set_post_order_in_admin($wp_query)
{
    global $pagenow;
    if (is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby'])) {
        $wp_query->set('orderby', 'ID');//並び順を設定します。
        $wp_query->set('order', 'DESC');//昇順降順を設定します。
    }
}
add_filter('pre_get_posts', 'set_post_order_in_admin');

// タクソノミーの並び替え
function taxonomy_orderby_description( $orderby, $args ) {

    if ( $args['orderby'] == 'description' ) {
        $orderby = 'tt.description';
    }
    return $orderby;
}
add_filter( 'get_terms_orderby', 'taxonomy_orderby_description', 10, 2 );



// ループの表示件数制御
//----------------------------------------------------------------------------------------------------------------------------------------

function cs_custom_posts_per_page( $query ) {
// 事例紹介＞カテゴリー
  if ( is_tax( 'cat_works' ) ) {
        $query->query_vars['posts_per_page'] = 16;
        return;
    }
// blog
  elseif ( is_archive( 'cat_blog' ) ) {
        $query->query_vars['posts_per_page'] = 12;
        return;
    }
// blog＞カテゴリー
  elseif ( is_tax( 'cat_blog' ) ) {
        $query->query_vars['posts_per_page'] = 12;
        return;
    }
// workshop
    elseif ( is_archive( 'cat_workshop' ) ) {
        $query->query_vars['posts_per_page'] = 6;
        return;
    }
// workshop＞カテゴリー
    elseif ( is_tax( 'cat_workshop' ) ) {
        $query->query_vars['posts_per_page'] = 12;
        return;
    }
}
add_filter( 'pre_get_posts', 'cs_custom_posts_per_page');
