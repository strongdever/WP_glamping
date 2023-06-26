<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gramercy-Village
 */

get_header();

$contents = get_post_meta(get_the_ID(), 'contents')[0];
?>
	<main id="page-gallery">

        <section id="section1" class="content-wrapper">
            <div class="content">
                <article class="first-view">
                    <div class="background"><?= img_srcset('image-gallery-header'); ?></div>
                    <div class="foreground"><div class="text">Gallery</div></div>
                </article>
            </div><!-- .content -->
        </section><!-- #section1.content-wrapper -->

        <section id="section2" class="content-wrapper">
            <div class="content">
                <div class="text1"><?= do_shortcode(htmlspecialchars($contents['header']['title'], ENT_HTML5)); ?></div>
                <div class="text2"><?= do_shortcode(htmlspecialchars($contents['header']['description'], ENT_HTML5)); ?></div>
            </div><!-- .content -->
        </section><!-- #section2.content-wrapper -->

        <section id="section3" class="content-wrapper">
            <div class="content">
                <button type="button" class="buttonTile">
                    <div class="gridTile">
                        <div class="grid-item grid11"></div>
                        <div class="grid-item grid12"></div>
                        <div class="grid-item grid13"></div>
                        <div class="grid-item grid21"></div>
                        <div class="grid-item grid22"></div>
                        <div class="grid-item grid23"></div>
                        <div class="grid-item grid31"></div>
                        <div class="grid-item grid32"></div>
                        <div class="grid-item grid33"></div>
                    </div>
                </button>
                <button type="button" class="buttonSingle">
                    <div class="gridSingle">
                        <div class="grid-item grid11"></div>
                    </div>
                </button>
            </div><!-- .content -->
        </section><!-- #section2.content-wrapper -->

        <section class="content-wrapper">
            <div class="content">
                <div class="galleries">
                    <article class="gallery">
<?php   if (is_array($contents['images'])) { ?>
<?php       foreach ($contents['images'] as $image) { ?>
                        <?= img_src_abs4x($image['filename'], $image['ext'], false, 'lightbox'); ?>
<?php       } ?>
<?php   } ?>
                    </article>
                </div><!-- .galleries -->
            </div><!-- .content -->
        </section><!-- #section3.content-wrapper -->

        <section id="sectionGalleryController" class="content-wrapper">
            <div class="content pc">
                <div class="galleryController">
                    <button type="button" id="galleryMovePrev"></button>
                    <button type="button" id="galleryMoveNext"></button>
                </div><!-- .galleryController -->
            </div><!-- .content -->
        </section><!-- #section3.content-wrapper -->
    </main><!-- #page-gallery -->
<?php
get_footer();
