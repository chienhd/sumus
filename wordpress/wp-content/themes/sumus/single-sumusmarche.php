<?php get_header(); ?>

<div id="sb-site">
<div class="ground sub">
<?php get_template_part( 'include/breadcrumb' ); ?>

<div class="marche-visual-single clearfix">
    <?
    $img = get_field('main-photo');
    $imgurl = wp_get_attachment_image_src($img, 'full');
        if ($imgurl){
        ?>
        <div class="left" style="background: url(<? echo $imgurl[0]; ?>) center center no-repeat; background-size: cover;"></div>
        <? }?>
    <div class="right">
        <div class="fullwidth-bg-container">
        <h2 class="t-center serif"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-marche.svg" alt="スムースマルシェ" class="logo-marche"><span class="marche">スムースマルシェ</span></h2>
        <hr class="style02">
        <h4 class="serif"><?php the_title(); ?></h4>
        <p class="info">開催日：<? $txt = get_field('date'); if($txt){ ?><? echo $txt; ?><? } ?><span class="small">（日曜日）※雨天決行</span><br>AM 10:00 〜 PM 14:00</span></p>
        <p class="small access">〒525-0036 滋賀県草津市草津町1866-6 <br class="visible-xs"><span class="icon-map-pin"></span><a href="https://goo.gl/maps/FKpxKUA2fBx" target="_blank"> Google マップ</a><br>草津駅より徒歩20分 湖南農業高校すぐ横</p>
    </div>
    </div>
</div>


<section class="section section-marche-single" style="background-color: #fbf9f4">
            <?
            $img = get_field('more-info-photo');
            $imgurl = wp_get_attachment_image_src($img, 'full');
                if($imgurl){ ?>
    <div class="container">
            
            <div class="marche-moreinfo clearfix">
                <div class="marche-moreinfo-photo"><img src="<? echo $imgurl[0]; ?>" alt="<?php the_title(); ?>" class=""></div>
                <div class="marche-moreinfo-txt">
                <?php if( get_field('more-info') ) { ?>
                    <?php the_field('more-info'); ?>
                <?php }?>
                </div>
            </div>
            
    </div>
            <? } ?>
            

    <div class="container">
        <div class="marche-single-maintext clearfix">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <?php the_content(); ?>
            <?php
            $marchePartner = get_field('marche-partner');
            if(!empty($marchePartner)) {
                $marchePartnerValue = array_column($marchePartner, 'value');
                $args = array(
                    'post_type' => 'marche_partner',
                    'posts_per_page' => -1,
                    'post_status' => array('publish', 'future'),
                    'post__in' => $marchePartnerValue,
                );

                $query = new WP_Query($args);

                if($query->have_posts()) :
                ?>
                <!-------------------------  マルシェパートナー July/13/2021 ---------------------------------------->
                <div class="section-title section-title--mod">
                    <h3 class="heading-01 none-mb">スムースマルシェパートナー</h3>
                </div>
                <div class="row">
                    <?php        
                    while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="post-sumally marche heightLine">
                        <div class="post-sumally-image post-sumally-image--mod">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="">          
                            <?php
                            $checked = get_field('new-icon');
                            if($checked) { ?>
                            <div class="new-label"><span>NEW</span></div>
                            <?php } ?>
                        </div>

                        <div class="post-sumally-body marche">
                            <h2 class="post-sumally-title"><?php echo get_the_title(); ?></h2>
                            
                            <div class="post-sumally-read">
                                <?php echo the_field('store-text'); ?>
                            </div>

                            <div class="sns">
                                <?php 
                                    foreach(get_field('sns', get_the_ID()) as $key => $item) {
                                ?>
                                    <a href="<?php echo $item['sns']; ?>" target="_blank">
                                        <span class="<?php echo $item['icon']; ?>"></span>
                                    </a>                           
                                <?php        
                                    }
                                ?>
                            </div>                                       
                        </div>
                        </div><!--/post-sumally-->
                    </div><!--/col-->
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <!-------------------------  マルシェパートナー July/13/2021 ---------------------------------------->
                <?php
                endif;
            }
            ?>
        <?php endwhile; endif; ?>
        </div>
        <div class="section-title">
            <h3 class="heading-01 none-mb">スムースマルシェパートナー</h3>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-01'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-01');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-01') ) { ?>
                <?php the_field('store-text-01'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->

<?php if(post_custom('store-photo-02')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-02'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-02');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-02') ) { ?>
                <?php the_field('store-text-02'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
                <?php endif; ?>
<?php if(post_custom('store-photo-03')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-03'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-03');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-03') ) { ?>
                <?php the_field('store-text-03'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>
<?php if(post_custom('store-photo-04')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-04'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-04');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-04') ) { ?>
                <?php the_field('store-text-04'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>
<?php if(post_custom('store-photo-05')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-05'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-05');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-05') ) { ?>
                <?php the_field('store-text-05'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>
<?php if(post_custom('store-photo-06')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-06'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-06');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-06') ) { ?>
                <?php the_field('store-text-06'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-07')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-07'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-07');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-07') ) { ?>
                <?php the_field('store-text-07'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-08')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-08'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-08');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-08') ) { ?>
                <?php the_field('store-text-08'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-09')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-09'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-09');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-09') ) { ?>
                <?php the_field('store-text-09'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-10')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-10'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-10');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-10') ) { ?>
                <?php the_field('store-text-10'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-11')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-11'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-11');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-11') ) { ?>
                <?php the_field('store-text-11'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-12')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-12'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-12');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-12') ) { ?>
                <?php the_field('store-text-12'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-13')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-13'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-13');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-13') ) { ?>
                <?php the_field('store-text-13'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-14')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-14'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-14');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-14') ) { ?>
                <?php the_field('store-text-14'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-15')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-15'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-15');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-15') ) { ?>
                <?php the_field('store-text-15'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-16')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-16'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-16');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-16') ) { ?>
                <?php the_field('store-text-16'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-17')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-17'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-17');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-17') ) { ?>
                <?php the_field('store-text-17'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-18')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-18'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-18');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-18') ) { ?>
                <?php the_field('store-text-18'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-19')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-19'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-19');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-19') ) { ?>
                <?php the_field('store-text-19'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-20')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-20'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-20');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-20') ) { ?>
                <?php the_field('store-text-20'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-21')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-21'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-21');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-21') ) { ?>
                <?php the_field('store-text-21'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-22')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-22'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-22');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-22') ) { ?>
                <?php the_field('store-text-22'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-23')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-23'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-23');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-23') ) { ?>
                <?php the_field('store-text-23'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-24')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-24'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-24');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-24') ) { ?>
                <?php the_field('store-text-24'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-25')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-25'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-25');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-25') ) { ?>
                <?php the_field('store-text-25'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-26')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-26'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-26');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-26') ) { ?>
                <?php the_field('store-text-26'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-27')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-27'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-27');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-27') ) { ?>
                <?php the_field('store-text-27'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-28')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-28'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-28');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-28') ) { ?>
                <?php the_field('store-text-28'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-29')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-29'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-29');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-29') ) { ?>
                <?php the_field('store-text-29'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

<?php if(post_custom('store-photo-30')): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="post-sumally marche heightLine">
                    <div class="post-sumally-image">
                        <img src="<?php the_field('store-photo-30'); ?>" alt="<?php the_title(); ?>" class="">          
                        <?php
                $checked = get_field('new-icon-30');
                if($checked) { ?>
                <div class="new-label"><span>NEW</span></div>
                <?php } ?>
                    </div>

                    <div class="post-sumally-body marche">
                        <?php if( get_field('store-text-30') ) { ?>
                <?php the_field('store-text-30'); ?>
                <?php }?>                       
                    </div>
                    </div><!--/post-sumally-->
                </div><!--/col-->
<?php endif; ?>

            </div><!--/.row-->
        
        
            <div class="post-single" style="padding:0; margin-bottom: 3em;">
        <div class="pagination">
        <ul class="clearfix" style="padding:0;">
            <li class="prev fl"><?php previous_post_link('%link', '前回のマルシェへ' ); ?></li>
            <li class="navitop"><a href="<?php bloginfo('url'); ?>/blog/"><span class=""></span>一覧</a></li>
            <li class="next fr"><?php next_post_link('%link', '次のマルシェへ' ); ?></li>
        </ul>
    </div>
    </div>
        </div>
        
            
</section><!-- /これまでのスムースマルシェ -->


<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
</body>
</html>