<?php
/*
①カスタム投稿「マルシェパートナー」で投稿した記事（店舗情報）を、
カスタム投稿「スムースマルシェ」で選択項目として使用し、デザイン画面に表示したい。*/
function my_acf_load_field( $field ) {
    /*marche_partner*/
    //choices

    $args = array(
        'post_type' => 'marche_partner',
        'posts_per_page' => -1,
        'post_status' => array('publish', 'future'),
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
if(!function_exists('dd')) {
    function dd($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
        die;
    }
}

/*=================================================================================================================*/

// Add Meta Box to post
add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );

function multi_media_uploader_meta_box() {
    add_meta_box( 'my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', array('works'), 'normal', 'high' );
}

function multi_media_uploader_meta_box_func($post) {
    $banner_img = get_post_meta($post->ID,'post_banner_img',true);
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

    <div class="clearfix" style="width: 600px; margin: 0 auto;">
        <script src="/wp-content/themes/sumus/assets/girdstack/gridstack-h5.js"></script>
        <link href="/wp-content/themes/sumus/assets/girdstack/gridstack.min.css" rel="stylesheet"/>
        <?php
            $sumus_gridstack_meta = get_post_meta($post->ID, 'sumus_gridstack_name', true);
            if(!empty($sumus_gridstack_meta)) {
                $imagesGirdStack = json_decode($sumus_gridstack_meta);
            } else {
                $banner_img = get_post_meta($post->ID,'post_banner_img',true);

                $image_size = 'full';
                $values = explode(',', $banner_img);
                $imagesArray = []; 
                if (!empty($values)) {
                    foreach ($values as $key => $value) {
                        if ($image_attributes = wp_get_attachment_image_src($value, $image_size)) {
                            $image_str = '<img style="height: 100%; width: 100%" src="' . $image_attributes[0] . '" />';
                            
                            if($image_attributes[2] >= 846) {
                                $imagesArray[] = [
                                    'h' => 2,
                                    'w' => 1,
                                    'content' => $image_str,
                                    'id' => $value
                                ];
                            }else {
                                $imagesArray[] = [
                                    'h' => 1,
                                    'w' => 1,
                                    'content' => $image_str,
                                    'id' => $value
                                ];
                            }
                            
                        }
                    }
                }

                $imagesGirdStack = json_encode($imagesArray);
            }
        ?>
        <input type="hidden" id="sumus_gridstack_input" name="sumus_gridstack_name" value=""/>
        <div class="grid-stack"></div>
    </div>

    <script type="text/javascript">
        jQuery(function($) {
            /*hanlde grid stack when load page*/
            function updateGridStack() {
                var DataGridStack = [];
                jQuery(".grid-stack-item").each(function(idx, element){
                  var $this = jQuery(this);
                    DataGridStack.push({
                        x: jQuery(element).attr('gs-x'),
                        y: jQuery(element).attr('gs-y'),
                        w: jQuery(element).attr('gs-w'),
                        h: jQuery(element).attr('gs-h'),
                        content: jQuery(element).find('.grid-stack-item-content').html(),
                        id: jQuery(element).attr('gs-id'),
                    });

                  jQuery('#sumus_gridstack_input').val(JSON.stringify(DataGridStack));
                });
            }

            jQuery(document).ready(function() {
                var getItems = <?php echo $imagesGirdStack; ?>;
                var grid = GridStack.init({column: 2, minWidth: 576, auto_height: true,});
                grid.load(getItems);

                /*update GridStack*/
                grid.on('dragstop', function (event, ui) {
                    updateGridStack();
                });

                updateGridStack();
            });

            function addNewGridStack(attachment) {
                
                let url = attachment.attributes.url;
                let id = attachment.attributes.id;
                let item = {};
                let newImage = '<img style="height: 100%; width: 100%" src="' + url + '" />';

                if(attachment.attributes.height >= 846) {
                    item = {'h': 2, 'w': 1, 'content': newImage, 'id': id};
                }else {
                    item = {'h': 1, 'w': 1, 'content': newImage, 'id': id};
                }

                return item;
            }
            /*hanlde open popup images*/

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
                            
                            /*add widget GridStack*/
                            var grid = GridStack.init();
                            let newItem = addNewGridStack(attachment);
                            grid.addWidget(newItem);
                            updateGridStack();

                        } else {
                            $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                        }

                        i++;
                    });

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

                var grid = GridStack.init();
                grid.removeAll();
                jQuery('#sumus_gridstack_input').val(JSON.stringify([]));

                return false;
            });

        });

        jQuery(document).ready(function() {
            jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
                var ids = [];
                var this_c = jQuery(this);

                var parentAttachmentId = this_c.parent('li').attr('data-attechment-id');
                jQuery('.grid-stack-item[gs-id='+parentAttachmentId+']').remove();
                var DataGridStack = [];
                if(jQuery(".grid-stack-item").length) {
                    jQuery(".grid-stack-item").each(function(idx, element){
                        var $this = jQuery(this);
                        DataGridStack.push({
                            x: jQuery(element).attr('gs-x'),
                            y: jQuery(element).attr('gs-y'),
                            w: jQuery(element).attr('gs-w'),
                            h: jQuery(element).attr('gs-h'),
                            content: jQuery(element).find('.grid-stack-item-content').html(),
                            id: jQuery(element).attr('gs-id'),
                        });

                        jQuery('#sumus_gridstack_input').val(JSON.stringify(DataGridStack));
                    });
                } else {
                    var grid = GridStack.init();
                    grid.removeAll();
                    jQuery('#sumus_gridstack_input').val(JSON.stringify([]));
                }

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


function multi_media_uploader_field($name, $values = '') {
    $image = '">Add Media';
    $image_str = '';
    $image_size = 'full';
    $display = 'none';
    $values = explode(',', $values);

    if (!empty($values)) {
        foreach ($values as $value) {
            if ($image_attributes = wp_get_attachment_image_src($value, $image_size)) {
                $image_str .= 
                '<li data-attechment-id=' . $value . '>
                    <a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a>
                    <i class="dashicons dashicons-no delete-img"></i>
                </li>';
            }
        }

    }

    if($image_str){
        $display = 'inline-block';
    }

    $html = '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $values)) . '" />&nbsp;&nbsp;<a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';

    return $html;
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
    
    if( isset($_POST['post_banner_img'] ) ){
        update_post_meta( $post_id, 'post_banner_img', $_POST['post_banner_img'] );
    };

    $sumus_gridstack_meta = json_encode($_POST['sumus_gridstack_name']);
    update_post_meta( $post_id, 'sumus_gridstack_name', $sumus_gridstack_meta );
}
/*end upload gallery */