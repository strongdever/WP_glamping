<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gramercy-Village
 */

get_header();
?>
	<main id="front-page">
        <section id="section1" class="content-wrapper">
            <div class="content">
                <article class="first-view">
                    <div class="background">
                        <?= img_srcset('image-top-firstview', 'webp', false, "pc"); ?>
                        <?= img_srcset('video', 'webp', false, "sp"); ?>
                    </div>
                    
                    <div class="foreground">
                        <div class="text1">せっかくのグランピングだからと、<br class="sp">気を張らなくていい。<br>海と風が心地よい非日常の<br class="sp">くつろぎを与えてくれるから。</div>
                        <div class="text2">scroll</div>
                        <div class="scroll_bar1"></div>
                    </div><!-- .foreground -->
                    <div class="scroll_bar2"></div>
                    <div class="text3"><?= img_srcset('image-top-logo'); ?></div>
                    <div class="text4">ここに来たからと言って、<br>絶対に特別なコトを盛り沢山しなくてはいけない、<br class="sp">なんて事はない。<br><br>絶対に海を眺めてまったりしなくちゃ<br class="sp">いけないわけでもない。<br><br>いつものペースでいい。<br>いつもの関係でいい。<br><br>そこに、少しだけの「日常との違い」があれば十分。<br><br>せっかくのグランピングだからと、<br>気を張らなくていい事が、この場所の魅力。<br>好きに過ごしてほしいです。<br>なんなら、全員がバラバラで過ごしてもいい。<br><br>大人な家族みんなが、<br class="sp">それぞれのリズムで過ごせる施設。</div>
                    <div class="photos">
                        <?= img_srcset('image-top-section1-1'); ?>
                        <?= img_srcset('image-top-section1-2'); ?>
                        <?= img_srcset('image-top-section1-3'); ?>
                        <?= img_srcset('image-top-section1-4'); ?>
                    </div><!-- .photos -->
                </article>
            </div><!-- .content -->
        </section><!-- #section1.content-wrapper -->

        <section id="section3" class="content-wrapper">
            <div class="content">
                <div class="text1">日本海に隣接した<br class="sp">自然豊かな<br class="sp">環境だから楽しめる<br>アクティビティ</div>
                <div class="activities spslider" data-speed="1000" data-duration="3000">
                    <article class="activity">
						<div class="back"><?= img_srcset('image-top-section3-1'); ?></div>
						<div class="card">
							<div class="text2 text-color"><div class="text2-1 text-color">SUP</div><div class="text2-2 text-color">&nbsp;/ サップ</div></div>
							<div class="text3 text-color">決まったルールがない自由なSUP<br>クルージングしながら美しい自然を味わったり、<br>愛犬と一緒にボードでゆっくり過ごしたり、<br>寝そべって空を眺め風を感じたり、自分のペースでのんびり楽しめます。</div>
						</div>
						<a class="button button-bright button-arrow" href="<?= esc_url(home_url('/activity#sup')); ?>">view more</a>
                    </article>
                    <article class="activity">
						<div class="back"><?= img_srcset('image-top-section3-2'); ?></div>
						<div class="card">
							<div class="text2 text-color"><div class="text2-1 text-color">Kayak</div><div class="text2-2 text-color">&nbsp;/ カヤック</div></div>
						    <div class="text3 text-color">水面近くから眺めることができる唯一のアクティビティ<br class="pc">川や海の上に自分が浮いている感覚で、陸上とは違う景色を楽しめるので<br class="pc">季節ごとに違う味わいがあるのも魅力の一つです。<br>もちろん、愛犬と一緒に楽しむこともできます。</div>
						</div>
						 <a class="button button-bright button-arrow" href="<?= esc_url(home_url('/activity#kayak')); ?>">view more</a>
                    </article>
                    <article class="activity">
						<div class="back"><?= img_srcset('image-top-section3-3'); ?></div>
						<div class="card">
							<div class="text2 text-color"><div class="text2-1 text-color">Fishing</div><div class="text2-2 text-color">&nbsp;/ 磯釣り</div></div>
							<div class="text3 text-color">静かな自然の中でゆっくりと釣りを楽しめるのが磯釣りの楽しさです。<br>〇〇や〇〇といった魚が主に取れるスポット。<br>釣りを楽しむことはもちろん、<br class="sp">日本海の大海原を眺めて<br class="pc">ゆっくり過ごすのもおすすめです。</div>
						</div>
						 <a class="button button-bright button-arrow" href="<?= esc_url(home_url('/activity#fish')); ?>">view more</a>
                    </article>
                </div><!-- .activities -->
            </div><!-- .content -->
        </section><!-- #section3.content-wrapper -->

        <section id="section4" class="content-wrapper">
            <div class="content">
                <div class="properties">
                    <article class="property">
                        <div class="texts">
                            <div class="text1">ツールームの<br class="sp">プライベートキャビンで<br>寛ぎのグランピング</div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?= img_srcset('image-top-section4-1-1', 'webp', false, "target4-1"); ?>
                                </div>
                                <div class="thumbnails image-picker" data-target="target4-1">
                                    <?= img_srcset('image-top-section4-1-1'); ?>
                                    <?= img_srcset('image-top-section4-1-2'); ?>
                                    <?= img_srcset('image-top-section4-1-3'); ?>
                                    <?= img_srcset('image-top-section4-1-4'); ?>
                                    <?= img_srcset('image-top-section4-1-5'); ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
                            <div class="text2">クールな外観とシンプルなインテリアでこだわりの空間をご用意致しました。<br>リビング＆寝室スペースとダイニングスペースを分けることで<br>広々とした室内でお寛ぎ頂けます。<br>もちろん愛犬も室内で一緒にお過ごし頂けます。<br>家族やグループでゆったりと使える大きなウッドテラスもおすすめです。</div>
                            <a class="button button-dark button-arrow" href="<?= esc_url(home_url('/room')); ?>">view more</a>
                        </div><!-- .texts -->
                        <div class="photos pc">
                            <div class="pickup">
                                <?= img_srcset('image-top-section4-1-1', 'webp', false, "target4-1-1"); ?>
                                <?= img_srcset('image-top-section4-1-2', 'webp', false, "target4-1-2"); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target4-1-1" data-target2="target4-1-2">
                                <?= img_srcset('image-top-section4-1-1'); ?>
                                <?= img_srcset('image-top-section4-1-2'); ?>
                                <?= img_srcset('image-top-section4-1-3'); ?>
                                <?= img_srcset('image-top-section4-1-4'); ?>
                                <?= img_srcset('image-top-section4-1-5'); ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                    </article>
                    <article class="property">
                        <div class="texts">
                            <div class="text1">家族みんなで食べる<br>食事の時間は<br>温かい思い出の時間に</div>
                            <div class="photos sp">
                                <div class="pickup">
                                    <?= img_srcset('image-top-section4-2-1', 'webp', false, "target4-2"); ?>
                                </div>
                                <div class="thumbnails image-picker" data-target="target4-2">
                                    <?= img_srcset('image-top-section4-2-1'); ?>
                                    <?= img_srcset('image-top-section4-2-2'); ?>
                                    <?= img_srcset('image-top-section4-2-3'); ?>
                                    <?= img_srcset('image-top-section4-2-4'); ?>
                                    <?= img_srcset('image-top-section4-2-5'); ?>
                                </div><!-- .thumbnails -->
                            </div><!-- .photos.sp -->
							<div class="text2">日本海の海の幸を味わえるBBQ<br>松葉蟹はこの土地ならではの絶品素材<br>ワイルドにBBQで楽しんで頂くのがおすすめです。<br><br>屋根付きのダイニングスペースなので<br>天気に左右されずにゆっくりと食事の時間をお過ごし頂けます。</div>
                        </div><!-- .texts -->
                        <div class="photos pc">
                            <div class="pickup">
                                <?= img_srcset('image-top-section4-2-1', 'webp', false, "target4-2-1"); ?>
                                <?= img_srcset('image-top-section4-2-2', 'webp', false, "target4-2-2"); ?>
                            </div>
                            <div class="thumbnails image-picker" data-target1="target4-2-1" data-target2="target4-2-2">
                                <?= img_srcset('image-top-section4-2-1'); ?>
                                <?= img_srcset('image-top-section4-2-2'); ?>
                                <?= img_srcset('image-top-section4-2-3'); ?>
                                <?= img_srcset('image-top-section4-2-4'); ?>
                                <?= img_srcset('image-top-section4-2-5'); ?>
                            </div><!-- .thumbnails -->
                        </div><!-- .photos.pc -->
                    </article>
                </div><!-- .properties -->
            </div><!-- .content -->
        </section><!-- #section4.content-wrapper -->

        <section id="section5" class="content-wrapper">
            <a id="access"></a>
            <div class="content">
                <article class="place">
                    <div class="photos">
                        <?= img_srcset('image-top-section5'); ?>
                    </div><!-- .photos -->
                    <div class="texts">
                        <div class="text1">slow glamping 風と海と</div>
                        <div class="text2">〒669-6541<br>兵庫県美方郡香美町香住区堺661-1</div>
                        <a class="button button-gmap button-arrow" href="https://goo.gl/maps/AB1gaHaaSY6c3xAn8" target="_blank">Google Map</a>
                    </div><!-- .texts -->
                </article>
            </div><!-- .content -->
        </section><!-- #section5.content-wrapper -->

    </main><!-- #front-page -->
<?php
get_footer();
