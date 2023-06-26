<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gramercy-Village
 */

get_header();
?>
	<main id="page-activity">

        <section id="section1" class="content-wrapper">
            <div class="content">
                <article class="first-view">
                    <div class="background"><?= img_srcset('image-activity-header'); ?></div>
                    <div class="foreground"><div class="text">Activity</div></div>
                </article>
            </div><!-- .content -->
        </section><!-- #section1.content-wrapper -->

        <section id="section2" class="content-wrapper">
            <div class="content">
                <div class="text1">日本海に隣接した<br class="sp">自然豊かな環境だから<br class="sp">楽しめる<br>アクティビティ</div>	  
            </div><!-- .content -->
        </section><!-- #section2.content-wrapper -->

         <section id="section3" class="content-wrapper">
            <a id="sup"></a>
            <div class="content">
                <div class="activities">
                    <article class="activity">
                        <div class="photos pc">
                            <div class="pickup">
                                <?= img_srcset('image-activity-section3-1', 'webp', false, "target3-1"); ?>
                                <?= img_srcset('image-activity-section3-2', 'webp', false, "target3-2"); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target3-1" data-target2="target3-2">
                                <?= img_srcset('image-activity-section3-1'); ?>
                                <?= img_srcset('image-activity-section3-2'); ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                        <div class="texts">
                            <div class="text1"><div class="text1-1">SUP</div><div class="text1-2"><span class="pc">&nbsp;/ </span>サップ</div></div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?= img_srcset('image-activity-section3-1', 'webp', false, "target3"); ?>
                                </div>
                                <div class="thumbnails image-picker" data-target="target3">
                                    <?= img_srcset('image-activity-section3-1'); ?>
                                    <?= img_srcset('image-activity-section3-2'); ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
                            <div class="text2">
                                <div class="text2-2">決まったルールがない自由なSUP<br>クルージングしながら美しい自然を味わったり、<br>愛犬と一緒にボードでゆっくり過ごしたり、<br>寝そべって空を眺め風を感じたり、自分のペースでのんびり楽しめます。</div>
                            </div><!-- .text2 -->
                        </div><!-- .texts -->
                    </article>
                </div><!-- .activities -->
            </div><!-- .content -->
        </section><!-- #section3.content-wrapper -->

        <section id="section4" class="content-wrapper">
            <a id="kayak"></a>
            <div class="content">
                <div class="activities">
                    <article class="activity">
                        <div class="photos pc">
                            <div class="pickup">
                                <?= img_srcset('image-activity-section4-1', 'webp', false, "target4-1"); ?>
                                <?= img_srcset('image-activity-section4-2', 'webp', false, "target4-2"); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target4-1" data-target2="target4-2">
                                <?= img_srcset('image-activity-section4-1'); ?>
                                <?= img_srcset('image-activity-section4-2'); ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                        <div class="texts">
                            <div class="text1"><div class="text1-1">Kayak</div><div class="text1-2"><span class="pc">&nbsp;/ </span>カヤック</div></div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?= img_srcset('image-activity-section4-1', 'webp', false, "target4"); ?>
                                </div>
                                <div class="thumbnails image-picker" data-target="target4">
                                    <?= img_srcset('image-activity-section4-1'); ?>
                                    <?= img_srcset('image-activity-section4-2'); ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
                            <div class="text2">
                                <div class="text2-2">水面近くから眺めることができる唯一のアクティビティ<br>川や海の上に自分が浮いている感覚で、陸上とは違う景色を楽しめるので<br>季節ごとに違う味わいがあるのも魅力の一つです。<br>愛犬とも一緒に楽しめるアクティビティです。</div>
                            </div><!-- .text2 -->
                        </div><!-- .texts -->
                    </article>
                </div><!-- .activities -->
            </div><!-- .content -->
        </section><!-- #section4.content-wrapper -->
        
		<section id="section5" class="content-wrapper">
            <a id="fishing"></a>
            <div class="content">
                <div class="activities">
                    <article class="activity">
                        <div class="photos pc">
                            <div class="pickup">
                                <?= img_srcset('image-activity-section5-1', 'webp', false, "target5-1"); ?>
                                <?= img_srcset('image-activity-section5-2', 'webp', false, "target5-2"); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target5-1" data-target2="target5-2">
                                <?= img_srcset('image-activity-section5-1'); ?>
                                <?= img_srcset('image-activity-section5-2'); ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                        <div class="texts">
                            <div class="text1"><div class="text1-1">Fishing</div><div class="text1-2"><span class="pc">&nbsp;/ </span>磯釣り</div></div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?= img_srcset('image-activity-section5-1', 'webp', false, "target5"); ?>
                                </div>
                                <div class="thumbnails image-picker" data-target="target5">
                                    <?= img_srcset('image-activity-section5-1'); ?>
                                    <?= img_srcset('image-activity-section5-2'); ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
                            <div class="text2">
                                <div class="text2-2">静かな自然の中でゆっくりと釣りを楽しめるのが磯釣りの楽しさです。<br>〇〇や〇〇といった魚が主に取れるスポット。<br>釣りを楽しむことはもちろん、日本海の大海原を眺めて<br>ゆっくり過ごすのもおすすめです。</div>
                            </div><!-- .text2 -->
                        </div><!-- .texts -->
                    </article>
                </div><!-- .activities -->
            </div><!-- .content -->
        </section><!-- #section5.content-wrapper -->

    </main><!-- #page-activity -->
<?php
get_footer();
