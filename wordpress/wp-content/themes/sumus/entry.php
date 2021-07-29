<?php
/*
Template Name: entry
*/
get_header();

$toplist = array(
    'post_type' => 'openhouse',
    'posts_per_page' => -1,
    'post_status' => array('publish', 'future'),
    'p' => $_COOKIE['prevoius-post-type-openhouse'],
);

$query = new WP_Query($toplist);
$dataOpenhouse = [];
if($query->have_posts()) {
    while($query->have_posts()) {
        $query->the_post();
        $dataOpenhouse[get_the_ID()] = get_the_title(); 
    }
    wp_reset_postdata(); wp_reset_query();
}

$entry_date = get_field('entry-date', $_COOKIE['prevoius-post-type-openhouse']);
$entry_date = preg_split('/\s+/', $entry_date);
$entry_time = get_field('entry-time', $_COOKIE['prevoius-post-type-openhouse']);
$entry_time = preg_split('/\s+/', $entry_time);
?>
<script type="text/javascript">
    const DATA_OPENHOUSE = '<?php echo json_encode($dataOpenhouse); ?>';
    const ENTRY_DATE = '<?php echo json_encode($entry_date); ?>';
    const ENTRY_TIME = '<?php echo json_encode($entry_time); ?>';
</script>
<div id="sb-site">
<div class="ground sub">

<?php get_template_part( 'include/breadcrumb' ); ?>

<section class="l-mainvisual-sub oh-mainvisual">
    <div class="mainvisual-sub-txt">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-openhouse.png" alt="一日展" class="logo">
        <h2>OPEN HOUSE<span>家族のこれまでとこれからをつなぐ住まいづくり。</span></h2>
    </div>
</section>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2 col-ms-10 col-ms-offset-1 col-xs-10 col-xs-offset-1">
<?php the_content(); ?>
<?php endwhile; endif; ?>
</div>
</div>
</div>
<?php get_footer(); ?>
</div><!--/.ground -->
</div><!--/#sb-site -->

<?php get_template_part( 'include/mobile-menu' ); ?>
<?php get_template_part( 'include/footer-script' ); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.css' />  
<script src='https://cdnjs.cloudflare.com/ajax/libs/lity/1.6.6/lity.js'></script> 
</body>
</html>