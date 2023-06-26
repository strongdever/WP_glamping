<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gramercy-Village
 */

get_header();

$contents = get_post_meta(get_the_ID(), 'contents')[0];
?>
	<main id="page-food">

        <section id="section1" class="content-wrapper">
            <div class="content">
                <article class="first-view">
                    <div class="background"><?= img_srcset('image-food-header'); ?></div>
                    <div class="foreground"><div class="text">Food</div></div>
                </article>
            </div><!-- .content -->
        </section><!-- #section1.content-wrapper -->

        <section id="section2" class="content-wrapper">
            <div class="content">
                <div class="text1"><?= do_shortcode(htmlspecialchars($contents['header']['title'], ENT_HTML5)); ?></div>
                <div class="text2"><?= do_shortcode(htmlspecialchars($contents['header']['description'], ENT_HTML5)); ?></div>
            </div><!-- .content -->
        </section><!-- #section2.content-wrapper -->

<?php if (is_array($contents['foods'])) { ?>
<?php   foreach ($contents['foods'] as $index => $food) { ?>
        <section class="content-wrapper section-food">
            <div class="content">
                <div class="foods">
                    <article class="food">
                        <div class="photos pc">
                            <div class="pickup">
                                <?php $image = $food['images'][0]; echo img_srcset_abs($image['filename'], $image['ext'], false, 'target' . $index . '-1'); ?>
                                <?php $image = $food['images'][1]; echo img_srcset_abs($image['filename'], $image['ext'], false, 'target' . $index . '-2'); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target<?= $index; ?>-1" data-target2="target<?= $index; ?>-2">
<?php       foreach ($food['images'] as $image) { ?>
                                <?= img_srcset_abs($image['filename'], $image['ext']); ?>
<?php       } ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                        <div class="texts">
                            <div class="text1"><div class="text1-1"><?= $food['english']; ?></div><div class="text1-2"><?= $food['japanese']; ?></div></div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?php $image = $food['images'][0]; echo img_srcset_abs($image['filename'], $image['ext'], false, 'target' . $index); ?>
                                </div>
                                <div class="thumbnails image-picker <?= (count($food['images']) > 4) ? 'spsliderFF' : ''; ?>" data-target="target<?= $index; ?>" data-speed="2000" data-duration="5000">
<?php       foreach ($food['images'] as $image) { ?>
                                    <?= img_srcset_abs($image['filename'], $image['ext']); ?>
<?php       } ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
                            <div class="text2"><?= do_shortcode(htmlspecialchars($food['description'], ENT_HTML5)); ?></div>
                        </div><!-- .texts -->
                    </article>
                </div><!-- .foods -->
            </div><!-- .content -->
        </section><!-- #section3.content-wrapper -->
<?php   } ?>
<?php } ?>

    </main><!-- #page-food -->
<?php
get_footer();
