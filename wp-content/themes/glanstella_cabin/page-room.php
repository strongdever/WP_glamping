<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gramercy-Village
 */

get_header();

$contents = get_post_meta(get_the_ID(), 'contents')[0];
?>
	<main id="page-room">

        <section id="section1" class="content-wrapper">
            <div class="content">
                <article class="first-view">
                    <div class="background"><?= img_srcset('image-room-header'); ?></div>
                    <div class="foreground"><div class="text">Room</div></div>
                </article>
            </div><!-- .content -->
        </section><!-- #section1.content-wrapper -->

    <?php if (is_array($contents['rooms'])) { ?>
    <?php foreach ($contents['rooms'] as $index => $room) { ?>
        <section class="content-wrapper section-room">
            <div class="content">
                <div class="rooms">
                    <article class="room">
                        <div class="photos pc">
                            <div class="pickup">
                                <?php $image = $room['images'][0]; echo img_srcset_abs($image['filename'], $image['ext'], false, 'target' . $index . '-1'); ?>
                                <?php $image = $room['images'][1]; echo img_srcset_abs($image['filename'], $image['ext'], false, 'target' . $index . '-2'); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target<?= $index; ?>-1" data-target2="target<?= $index; ?>-2">
                                <?php foreach ($room['images'] as $image) { ?>
                                    <?= img_srcset_abs($image['filename'], $image['ext']); ?>
                                <?php } ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                        <div class="texts">
                            <div class="text1"><div class="text1-1"><?= $room['english']; ?></div><div class="text1-2"><?= do_shortcode(htmlspecialchars($room['japanese'], ENT_HTML5)); ?></div></div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?php $image = $room['images'][0]; echo img_srcset_abs($image['filename'], $image['ext'], false, 'target' . $index); ?>
                                </div>
                                <div class="thumbnails image-picker <?= (count($room['images']) > 4) ? 'spsliderFF' : ''; ?>" data-target="target<?= $index; ?>" data-speed="2000" data-duration="5000">
                                    <?php foreach ($room['images'] as $image) { ?>
                                        <?= img_srcset_abs($image['filename'], $image['ext']); ?>
                                    <?php } ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
                            <div class="text2"><?= do_shortcode(htmlspecialchars($room['description'], ENT_HTML5)); ?></div>
                            <?php if (!empty($room['image2d'])) { ?>
                                <div class="text3"><a href="<?= $room['image2d'] ?>" target="_blank">平面図はこちら</a></div>
                            <?php } ?>
                            <?php if (!empty($room['imageMap'])) { ?>
                                <div class="text4"><a href="<?= $room['imageMap']; ?>" target="_blank">場内MAPはこちら</a></div>
                            <?php } ?>
                            <?php if (!empty($room['imageCheckin'])) { ?>
                                <div class="text5"><a href="<?= $room['imageCheckin']; ?>" target="_blank">チェックイン方法はこちら</a></div>
                            <?php } ?>
                            <a class="button button-book" href="https://reserve.489ban.net/client/rinkaisou/0/plan">BOOK NOW</a>
                        </div><!-- .texts -->
                    </article>
                </div><!-- .rooms -->
            </div><!-- .content -->
        </section><!-- #section3.content-wrapper -->
    <?php } ?>
    <?php } ?>

    </main><!-- #page-room -->
<?php
get_footer();
