<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php if ( is_front_page() ) : ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/loading.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/sliderpro/jquery.sliderPro.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/top.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ticker.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
<script>
  $(function() {
    $('.mv_slider').slick({
      arrows: false,
      dots: false,
      autoplay: true,
      autoplaySpeed: 1500,
      speed: 1500,
      asNavFor: '.mv_nav',
      fade: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      pauseOnDotsHover: false,
    });
    $('.mv_nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.mv_slider',
      arrows: true,
      // prevArrow: '<img src="images/arrow_prev.png" class="slide-arrow prev-arrow">',
      // nextArrow: '<img src="images/arrow_next.png" class="slide-arrow next-arrow">',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      infinite: false
    }); 
  });
</script>
<script>
// ドロップダウンメニュー
$('.g_menu_in').hover(
  function() {
    //カーソルが重なった時
    $(this).children('.nav_in').addClass('open');
  }, function() {
    //カーソルが離れた時
    $(this).children('.nav_in').removeClass('open');
  }
);
</script>
<?php if(is_single('')): ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/flexslider/jquery.flexslider-min.js"></script>
<?php endif; ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slidebars/slidebars.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.heightLine.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
<?php wp_footer(); ?>
