<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MJNRZMP');</script>
<!-- End Google Tag Manager -->
	<meta name="facebook-domain-verification" content="0wrti0j546fatzqatyxgpej6ip235z" />

	<?php wp_head(); ?>
	<link href="<?php echo get_template_directory_uri() . '/assets/css/' ?>jquery-ui.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/slick/slick-theme.css" />
	<link href="<?php echo get_template_directory_uri() ?>/assets/css/viewbox.css" type="text/css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri() ?>/assets/css/style.css?ver=0.0.1" type="text/css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri() ?>/assets/css/responsive.css" type="text/css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Old+Mincho&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.typekit.net/tya7tvn.css">

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJNRZMP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php
	global $post;
	$post_slug = $post->post_name;
	?>
	<div id="wrapper" style="opacity: 1;">
		<!--header-->
		<header>
			<div id="header" class="<?php echo ($args['page'] != 'top') ? 'nontop' : 'top_header top_bg' ?>">
				<div class="header_top">
					<h1 class="pc"><a href="<?php echo home_url() ?>"><img class="pc" src="<?php echo get_template_directory_uri() . '/assets/images/' ?>logo.svg" alt="" /><img class="sp" src="<?php echo get_template_directory_uri() . '/assets/images/' ?>logo.svg" alt="" /></a></h1>
					<ul class="menu_part pc ">
						<li class="sculpin">
							<a href="<?php echo home_url() ?>" class="<?php is_front_page() == 1 ? 'active sculpin' : 'sculpin' ?>">
								Top
							</a>
						</li>
						<li class="sculpin">
							<a href="<?php echo home_url() ?>/activity" class="eigo <?php $post_slug == 'activity' ? 'active sculpin' : 'sculpin' ?>">
								Activity
							</a>
						</li>
						<li class="sculpin">
							<a href="<?php echo home_url() ?>/galleryview" class="eigo <?php $post_slug == 'gallery' ? 'active sculpin' : 'sculpin' ?>">
								Gallery
							</a>
						</li>
						<li class="sculpin">
							<a href="<?php echo home_url() ?>/room" class="eigo <?php $post_slug == 'room' ? 'active sculpin' : 'sculpin' ?>">
								Room
							</a>
						</li>

						<li class="sculpin">
							<a href="<?php echo home_url() ?>/food" class="eigo <?php $post_slug == 'food' ? 'active sculpin' : 'sculpin' ?>">
								Food
							</a>
						</li>
						<!--<li class="sculpin">
							<a href="<?php echo home_url() ?>/sauna" class="eigo <?php $post_slug == 'sauna' ? 'active sculpin' : 'sculpin' ?>">
								Sauna
							</a>
						</li>-->
						<li class="sculpin">
							<a href="<?php echo home_url() ?>/faq" class="eigo <?php $post_slug == 'faq' ? 'active sculpin' : 'sculpin' ?>">
								FAQ
							</a>
						</li>
						<li class="sculpin">
							<a href="<?php echo home_url() ?>/top2/#sec5" class="eigo <?php $post_slug == 'access' ? 'active sculpin' : 'sculpin' ?>">
								Access
							</a>
						</li>
						<li class="sculpin">
							<a href="https://www.instagram.com/dotglamping__ako/" target="_blank" class="eigo ">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/insta.svg" alt="">
							</a>
						</li>
						<li class="sculpin">
							<a href="https://reserve.489ban.net/client/dot-glamping-ako/0/plan" target="_blank" class="eigo reserve sculpin">
								BOOK NOW
							</a>
						</li>
					</ul>

					<a class="menu-trigger sp">
						<span></span><span></span><span></span>
					</a>
					<a href="https://reserve.489ban.net/client/dot-glamping-ako/0/plan" target="_blank" class="eigo sp reserve sculpin">
						BOOK NOW
					</a>

					<div class="g_nav">
						<ul class="clearfix">
							<li class="sculpin">
								<a href="<?php echo home_url() ?>" class="sculpin">
									<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_black.png" alt="">
								</a>
							</li>
							<li class="sculpin">
								<a href="<?php echo home_url() ?>" class="<?php is_front_page() == 1 ? 'active sculpin' : 'sculpin' ?>">
									Top
								</a>
							</li>
							<li class="sculpin">
								<a href="<?php echo home_url() ?>/activity" class="eigo <?php $post_slug == 'activity' ? 'active sculpin' : 'sculpin' ?>">
									Activity
								</a>
							</li>
							<li class="sculpin">
								<a href="<?php echo home_url() ?>/galleryview" class="eigo <?php $post_slug == 'gallery' ? 'active sculpin' : 'sculpin' ?>">
									Gallery
								</a>
							</li>
							<li class="sculpin">
								<a href="<?php echo home_url() ?>/room" class="eigo <?php $post_slug == 'room' ? 'active sculpin' : 'sculpin' ?>">
									Room
								</a>
							</li>

							<li class="sculpin">
								<a href="<?php echo home_url() ?>/food" class="eigo <?php $post_slug == 'food' ? 'active sculpin' : 'sculpin' ?>">
									Food
								</a>
							</li>
							<!--<li class="sculpin">
								<a href="<?php echo home_url() ?>/sauna" class="eigo <?php $post_slug == 'sauna' ? 'active sculpin' : 'sculpin' ?>">
									Sauna
								</a>
							</li>-->
							<li class="sculpin">
								<a href="<?php echo home_url() ?>/faq" class="eigo <?php $post_slug == 'faq' ? 'active sculpin' : 'sculpin' ?>">
									FAQ
								</a>
							</li>
							<li class="sculpin">
								<a href="<?php echo home_url() ?>/top2/#access" class="eigo <?php $post_slug == 'access' ? 'active sculpin' : 'sculpin' ?>">
									Access
								</a>
							</li>
							<li class="sculpin">
								<a href="https://reserve.489ban.net/client/dot-glamping-ako/0/plan" target="_blank" class="eigo reserve sculpin">
									BOOK NOW
								</a>
							</li>
							<li class="sculpin">
								<ul>
									<li class="sculpin">
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_email_black_icon.svg" alt="">
										<span class="sculpin">
											<a href="mailto:booking@glamping-ako.com">booking@glamping-ako.com</a>
										</span>
									</li>
									<li class="sculpin">
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_pin_black.svg" alt="">
										<span class="sculpin">
											<a href="https://goo.gl/maps/tjRvRhmZyUH9VucM7" target="_blank">
												〒678-0215<br>
												兵庫県赤穂市御崎143-1
											</a>
										</span>
									</li>
									<li class="sculpin">
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_insta_black_icon.svg" alt="">
										<a href="https://www.instagram.com/dotglamping__ako/" target="_blank" class="sculpin">
											dotglamping__ako
										</a>
									</li>
									<li class="sculpin">
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_phone_black_icon.svg" alt="">
										<a href="tel:0791559991" class="sculpin">
											0791-55-9991
										</a>
									</li>
									<li class="sculpin">
										<img src="<?php echo get_template_directory_uri() ?>/assets/images/footer_fax_black_icon.svg" alt="">
										<a  target="_blank" class="sculpin">
											0791-55-9992
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main">
				<div class="header3">

				</div>
			</div>

		</header>