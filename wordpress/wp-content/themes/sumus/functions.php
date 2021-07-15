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

/*
①カスタム投稿「マルシェパートナー」で投稿した記事（店舗情報）を、
カスタム投稿「スムースマルシェ」で選択項目として使用し、デザイン画面に表示したい。*/
function my_acf_load_field( $field ) {
    /*marche_partner*/
    //choices

    $args = array(
        'post_type' => 'marche_partner',
        'posts_per_page' => -1,
        'post_status' => array('publish'),
    );

    $query = new WP_Query($args);

    if($query->have_posts()) :
        while ( $query->have_posts() ) : $query->the_post();
            $field['choices'][get_the_ID()] = get_the_title();
        endwhile;
        wp_reset_postdata();
    endif;


    return $field;
    
}

add_filter('acf/load_field/name=marche-partner', 'my_acf_load_field');

/*upload gallery */

function dd($value) {
    echo '<pre>';
    print_r($value);
    die;
}
/**
 Khai báo meta box
 **/
 function thachpham_meta_box()
 {
   add_meta_box( 'thong-tin', 'Thông tin ứng dụng', 'thachpham_thongtin_output', 'post' );
}
add_action( 'add_meta_boxes', 'thachpham_meta_box' );


/**
 Khai báo callback
 @param $post là đối tượng WP_Post để nhận thông tin của post
 **/
 function thachpham_thongtin_output( $post )
 {
   $link_download = get_post_meta( $post->ID, '_link_download', true );
 // Tạo trường Link Download
   echo ( '<label for="link_download">Link Download: </label>' );
   echo ('<input type="text" id="link_download" name="link_download" value="'.esc_attr( $link_download ).'" />');
}


/**
 Lưu dữ liệu meta box khi nhập vào
 @param post_id là ID của post hiện tại
 **/
function thachpham_thongtin_save( $post_id )
{
   $link_download = sanitize_text_field( $_POST['link_download'] );
   update_post_meta( $post_id, '_link_download', $link_download );
}
add_action( 'save_post', 'thachpham_thongtin_save' );

/*=================================================================================================================*/


// Add Meta Box to post
// Add Meta Box to post
add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );

function multi_media_uploader_meta_box() {
    add_meta_box( 'my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', 'post', 'normal', 'high' );
}

function multi_media_uploader_meta_box_func($post) {
    $banner_img = get_post_meta($post->ID,'post_banner_img',true);
    // print_r($banner_img); die;
    ?>
    <style type="text/css">
        .multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
        .multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
        .multi-upload-medias ul li img { width: 100%; }
    </style>

    <table cellspacing="10" cellpadding="10">
        <tr>
            <td>Banner Image</td>
            <td>
                <?php echo multi_media_uploader_field( 'post_banner_img', $banner_img ); ?>
            </td>
        </tr>
    </table>

    <div class="clearfix" style="width: 770px; margin: 0 auto;">
        <script src="https://gridstackjs.com/node_modules/gridstack/dist/gridstack-h5.js"></script>
        <link href="https://gridstackjs.com/node_modules/gridstack/dist/gridstack.min.css" rel="stylesheet"/>
        <style type="text/css">
            .grid-stack { background: #FAFAD2; }
            .grid-stack-item-content { background-color: #18BC9C; }
            .grid-stack>.grid-stack-item[gs-w='1'] {
                width: 50%;
            }
            .grid-stack>.grid-stack-item[gs-x='1'] {
                left: 50%;
                width: 50%;
            }
            .grid-stack-item > .grid-stack-item-content {
                inset: 5px;
            }
        </style>

        <div class="grid-stack grid-stack-2 grid-stack-instance-<?php echo $post->ID; ?>"></div>
    </div>

    <script type="text/javascript">
        jQuery(function($) {

            $('body').on('click', '.wc_multi_upload_image_button', function(e) {
                e.preventDefault();

                var button = $(this),
                custom_uploader = wp.media({
                    title: 'Insert image',
                    button: { text: 'Use this image' },
                    multiple: true 
                }).on('select', function() {
                    var attech_ids = '';
                    attachments
                    var attachments = custom_uploader.state().get('selection'),
                    attachment_ids = new Array(),
                    items = [],
                    i = 0;
                    attachments.each(function(attachment) {
                        attachment_ids[i] = attachment['id'];
                        attech_ids += ',' + attachment['id'];
                        if (attachment.attributes.type == 'image') {
                            $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            if(attachment.attributes.height == 846) {
                                items.push({h: 2, content: '<img  src="'+attachment.attributes.url+'">'});
                            }
                            if(attachment.attributes.height == 683) {
                                items.push({h: 1, content: '<img src="'+attachment.attributes.url+'">'});
                            }
                        } else {
                            $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                        }

                        i++;
                    });

                    var grid = GridStack.init({column: 2});
                    grid.load(items);

                    var ids = $(button).siblings('.attechments-ids').attr('value');
                    if (ids) {
                        var ids = ids + attech_ids;
                        $(button).siblings('.attechments-ids').attr('value', ids);
                    } else {
                        $(button).siblings('.attechments-ids').attr('value', attachment_ids);
                    }
                    $(button).siblings('.wc_multi_remove_image_button').show();
                })
                .open();
            });

            $('body').on('click', '.wc_multi_remove_image_button', function() {
                $(this).hide().prev().val('').prev().addClass('button').html('Add Media');
                $(this).parent().find('ul').empty();
                return false;
            });

        });

        jQuery(document).ready(function() {
            jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
                var ids = [];
                var this_c = jQuery(this);
                jQuery(this).parent().remove();
                jQuery('.multi-upload-medias ul li').each(function() {
                    ids.push(jQuery(this).attr('data-attechment-id'));
                });
                jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
            });
        })
    </script>

    <?php
}


function multi_media_uploader_field($name, $value = '') {
    $image = '">Add Media';
    $image_str = '';
    $image_size = 'full';
    $display = 'none';
    $value = explode(',', $value);

    if (!empty($value)) {
        foreach ($value as $values) {
            if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
                $image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
            }
        }

    }

    if($image_str){
        $display = 'inline-block';
    }

    return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}

// Save Meta Box values.
add_action( 'save_post', 'wc_meta_box_save' );

function wc_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return; 
    }

    if( !current_user_can( 'edit_post' ) ){
        return; 
    }
    
    if( isset( $_POST['post_banner_img'] ) ){
        update_post_meta( $post_id, 'post_banner_img', $_POST['post_banner_img'] );
    }
}
/*end upload gallery */