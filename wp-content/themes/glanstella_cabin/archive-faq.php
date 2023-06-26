<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gramercy-Village
 */

get_header();
$categories = get_categories([ 'taxonomy' => 'faq_category', 'orderby' => 'id', 'order' => 'asc', 'hide_empty' => true ]);
$totalQuestionsCount = 0;
$group_name = '';
$category_name = get_query_var('faq_category') ? get_query_var('faq_category') : "";

foreach ($categories as $category) {
	$totalQuestionsCount += $category->category_count;
	if ($category_name == $category->category_nicename) {
		$group_name = $category->cat_name . '&nbsp;(' . $category->category_count . ')';
		$category_name = $category->category_nicename;
	}
}
if ($group_name == '') {
	$group_name = '全ての質問&nbsp;(' . $totalQuestionsCount . ')';
	$category_name = '';
}

?>

	<main id="archive-faq">

		<section id="section1" class="content-wrapper">
			<div class="content">
				<article class="first-view">
					<div class="background"><?= img_srcset('image-faq-header'); ?></div>
					<div class="foreground"><div class="text">FAQ</div></div>
				</article>
			</div><!-- .content -->
		</section><!-- #section1.content-wrapper -->

		<section id="section2" class="content-wrapper">
			<div class="content">
				<div class="section-categories pc">
					<a class="category <?= ($category_name == '') ? 'selected': ''; ?>" href="<?= esc_url(home_url('/faq')); ?>">全て&nbsp;(<?= $totalQuestionsCount; ?>)</a>
					<?php foreach ($categories as $category) { ?>
						<br>
						<a class="category <?= ($category_name == $category->category_nicename) ? 'selected': ''; ?>" href="<?= esc_url(home_url('/faq/' . $category->category_nicename)); ?>"><?= $category->cat_name; ?>&nbsp;(<?= $category->category_count; ?>)</a>
					<?php } ?>
				</div>
				<div class="section-categories sp">
					<div class="dummy-dropdown"><?= $group_name; ?></div>
					<select class="dropdown" name="event-dropdown" onchange="document.location.href = this.options[this.selectedIndex].value;">
						<option value="<?= esc_url(home_url('/faq')); ?>" <?= ($category_name == '') ? 'selected': ''; ?>>全ての質問&nbsp;(<?= $totalQuestionsCount; ?>)</option>
						<?php foreach ($categories as $category) { ?>
							<option value="<?= esc_url(home_url('/faq/' . $category->category_nicename)); ?>" <?= ($category_name == $category->category_nicename) ? 'selected': ''; ?>><?= $category->cat_name; ?>&nbsp;(<?= $category->category_count; ?>)</a>
						<?php } ?>
					</select>
				</div>
				<div class="section-faq">
					<?php
						if (have_posts()) {
							while(have_posts()) {
								the_post();
					?>
						<div class="faq">
							<div class="question"><?= do_shortcode(get_the_title()); ?></div>
							<div class="answer"><?= do_shortcode(get_the_content()); ?></div>
						</div><!-- .faq -->
					<?php
						 	}
						}
					?>
				</div><!-- .section-faq -->
			</div><!-- .content -->
		</section><!-- #section2.content-wrapper -->

	</main><!-- #main -->

<?php
get_footer();
