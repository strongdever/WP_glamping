<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gramercy-Village
 */

?>

	<footer id="site-footer">
		<div class="content-wrapper">
			<div class="content-wide">
				<a class="logo" href="<?= esc_url(home_url('/')); ?>"><?= img_srcset('logo-v', 'webp', false, 'logo-img'); ?></a>
				<div class="info">
					<!-- <div class="email"><i class="fa-solid fa-envelope fa-fw"></i><a href="mailto:geihokuoak@khiro.jp" target="_blank">geihokuoak@khiro.jp</a></div> -->
					<div class="address"><i class="fa-solid fa-location-dot fa-fw"></i><a href="https://goo.gl/maps/AB1gaHaaSY6c3xAn8" target="_blank">〒669-6541<br>　　兵庫県美方郡香美町香住区堺661-1</a></div>
					<!-- <div class="instagram"><i class="fa-brands fa-instagram fa-fw"></i><a href="https://www.instagram.com/wooods_geihoku/" target="_blank">wooods_geihoku</a></div> -->

				</div><!-- .info -->
				<div class="menu">
					<a href="<?= esc_url(home_url('/')); ?>">Top</a>
					<a href="<?= esc_url(home_url('/activity')); ?>">Activity</a>
					<a href="<?= esc_url(home_url('/room')); ?>">Room</a>
					<a href="<?= esc_url(home_url('/faq')); ?>">FAQ</a>
					<a href="<?= esc_url(home_url('/#access')); ?>">Access</a>
				</div><!-- .menu -->
				<div class="copyright">&copy;slow glamping 風と海と</div>
			</div><!-- .content-wide -->
		</div><!-- .content-wrapper -->
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>

	<div id="lightbox"><img></div>
</body>
</html>
