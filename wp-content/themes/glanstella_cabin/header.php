<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gramercy-Village
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	    <?php if(is_front_page() || is_home()){
	      	echo get_bloginfo('name');
	    } else{
	      	wp_title('|',true,'right'); echo bloginfo('name'); 
	    }?>
  	</title>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?= get_template_directory_uri(); ?>/images/icon-32x32.webp" sizes="32x32" />
	<link rel="icon" href="<?= get_template_directory_uri(); ?>/images/icon-192x192.webp" sizes="192x192" />
	<link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/images/icon-180x180.webp" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&family=M+PLUS+1:wght@300;400;500;600;700&family=Noto+Sans+JP:wght@300;400;500;700;900&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
	<meta name="msapplication-TileImage" content="<?= get_template_directory_uri(); ?>/images/icon-270x270.webp" />
	<link rel="stylesheet" href="https://use.typekit.net/slm0run.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header>
		<div id="site-header-pc" class="pc">
			<div class="background"></div>

			<div class="content-wrapper">
				<div class="content-wide">
					<h1 id="site-title-pc">
						<a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
					</h1>
					<nav id="site-navigation-pc">
						<a href="<?= esc_url(home_url('/')); ?>">Top</a>
						<a href="<?= esc_url(home_url('/activity')); ?>">Activity</a>
						<a href="<?= esc_url(home_url('/room')); ?>">Room</a>
						<a href="<?= esc_url(home_url('/faq')); ?>">FAQ</a>
						<a href="<?= esc_url(home_url('/#access')); ?>">Access</a>
						<a id="button-book-pc" href="https://reserve.489ban.net/client/rinkaisou/0/plan">BOOK NOW</a>
					</nav><!-- .site-navigation -->
				</div><!-- .content-wide -->
			</div><!-- .content-wrapper -->
		</div><!-- #site-header-pc.pc -->

		<div id="site-header-sp" class="sp">
			<div class="background"></div>
			<button id="site-navigation-sp_open" class="button"><img src="<?= get_template_directory_uri() . '/image/sp-open.svg'; ?>"></button>
			<a id="button-book-sp" href="https://reserve.489ban.net/client/rinkaisou/0/plan">BOOK NOW</a>
		</div><!-- #site-header-sp.sp -->

		<nav id="site-navigation-sp" class="sp">
			<button id="site-navigation-sp_close" class="button"><img src="<?= get_template_directory_uri() . '/image/sp-close.svg'; ?>"></button>

			<div id="site-navigation-sp_inner">
				<h1 id="site-title-sp"><a href="<?= esc_url(home_url('/')); ?>"><?= img_srcset('logo-v', 'webp', 'site-logo-sp'); ?></a></h1>
				<a class="menu" href="<?= esc_url(home_url('/')); ?>">Top</a>
				<a class="menu" href="<?= esc_url(home_url('/activity')); ?>">Activity</a>
				<a class="menu" href="<?= esc_url(home_url('/room')); ?>">Room</a>
				<a class="menu" href="<?= esc_url(home_url('/faq')); ?>">FAQ</a>
				<a class="menu" href="<?= esc_url(home_url('/#access')); ?>">Access</a>
				<a id="button-book-sp_inner" href="https://reserve.489ban.net/client/rinkaisou/0/plan">BOOK NOW</a>
				<div class="info">
					<!-- <div class="email"><i class="fa-solid fa-envelope fa-fw"></i><a href="mailto:geihokuoak@khiro.jp" target="_blank">geihokuoak@khiro.jp</a></div> -->
					<div class="address"><i class="fa-solid fa-location-dot fa-fw"></i><a href="https://goo.gl/maps/AB1gaHaaSY6c3xAn8" target="_blank">〒731-2322<br>　　広島県山県郡北広島町細見145−104</a></div>
					<!-- <div class="instagram"><i class="fa-brands fa-instagram fa-fw"></i><a href="https://www.instagram.com/wooods_geihoku/" target="_blank">wooods_geihoku</a></div> -->
				</div><!-- .info -->
			</div><!-- #site-navigation-sp_inner -->
		</nav><!-- .site-navigation -->

	</header>
<script>
    $(".menu").click(function() {
		// 非表示にする
		$("#site-navigation-sp").hide();
	});
  </script>