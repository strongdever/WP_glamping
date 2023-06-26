/*
パララックス化する要素に下記属性を追加してください。
data-parallax-image="PC用画像URL" ※必須 これをjsセレクタとして要素検索 空ならモバイル用画像を使用
data-parallax-mobile-image="モバイル用画像URL" ※オプション 空ならPC用画像を使用
data-parallax-speed="0～2" ※オプション パララックススクロール係数 0でパララックス効果なし。未指定時はデフォルト設定defaultSpeedを使用します。
data-parallax-blur="0～" ※オプション 背景画像全体のぼかしサイズ 0でぼかしなし、未設定時はデフォルト設定defaultBlurを使用します。全体ぼかしを使用する場合はcssでposition: absoluteが指定されている必要があります。

パララックス要素上のオーバーレイ要素にぼかし背景を入れる場合はぼかし要素に下記属性を追加してください。
data-parallax-overlay-blur="1～" ※必須 パララックス要素の子要素もしくはパララックス要素のposition:relative要素の子要素にオーバーレイ要素が存在し、その子要素に指定する必要があります。この要素のposition系cssは基本的に不要です。

オーバーレイぼかしのサンプル：
<div class="parallax" style="position: relative; height: 600px;" data-parallax-image="01.jpg">
	<div class="parallax-overlay" style="position: absolute; bottom: 50px; left: 50px; right: 50px; top: 50px; z-index: 2;">
		<div class="parallax-overlay-contents">text...</div>
		<div class="parallax-overlay-bg" data-parallax-overlay-blur="5"></div>
	</div>
</div>
<div class="parallax" style="position: relative; height: 600px;">
	<div class="parallax-overlay" style="position: absolute; bottom: 50px; left: 50px; right: 50px; top: 50px; z-index: 2;">
		<div class="parallax-overlay-contents">text...</div>
		<div class="parallax-overlay-bg" data-parallax-overlay-blur="5"></div>
	</div>
	<div class="parallax-image" data-parallax-image="01.jpg" style="position: absolute; bottom: 0; left: 0; right: 0; top: 0; z-index: 1;"></div>
</div>
*/
jQuery(function($){

	var $elems = $('[data-parallax-image]');
	if (!$elems.length) return;

	// モバイル画像に切り替えるブレイクポイント
	var mobileBreakpoint = 750;

	// デフォルトのパララックススクロール係数
	// data-parallax-speedで上書きされます
	// ここの乗数を0～2の間で変えることで視差調整が可能。0=通常表示、1=background-attachment: fixed;と同等表示、1以上で通常とは逆方向へ移動する感じになります。2以上も設定可能ですが拡大されすぎるので注意してください。
	var defaultSpeed = 0.3;

	// デフォルトの全体ぼかし
	// data-parallax-blurで上書きされます
	var defaultBlur = 0;

	// 変数
	var $window = $(window);
	var $body = $('body');
	var ua = window.navigator.userAgent.toLowerCase();
	var elemSettings = [];
	var images = [];
	var mobileImages = [];
	var resizeTimer = null;
	var winWidth = window.innerWidth || $body.width();
	var winHeight = window.innerHeight || $window.innerHeight();

	// IE判別
	var isIE = (ua.indexOf('msie') > -1 || ua.indexOf('trident') > -1);

	// IE・Edgeの場合はsvgでぼかし
	// Edgeはfilter: blur(Npx)だとフチ透過対策が効かないため。
	// 2019/08時点 Chromium版EdgeはUAがEdgeではなくEdgのため対象外で問題なし。
	var useSvgBlur = (isIE || ua.indexOf('edge') > -1);

	// スマホ判別
	var isSmartPhone = (ua.indexOf('iphone') > -1 || ua.indexOf('ipod') > -1 || ua.indexOf('android') > -1 && ua.indexOf('mobile') > -1);

	// モバイル判別
	var isMobile = (isSmartPhone || ua.indexOf('ipad') > -1 || ua.indexOf('android') > -1);

	// ブレイクポイントによるモバイル判別
	var checkParallaxMobile = function() {
		var mql = window.matchMedia('(max-width: ' + mobileBreakpoint + 'px)');
		return mql.matches;
	};
	var isParallaxMobile = checkParallaxMobile();

	// SVGぼかし用SVG生成
	var parallaxCreateSvg = function(src, blur) {
		var svgid = Math.random().toString(36).substr(2, 9);
		var $svg = $('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="svg-' + svgid + '" class="parallax-blur" width="100%" height="100%" viewBox="0 0 100% 100%" preserveAspectRatio="none"><filter id="blur-' + svgid + '"><feGaussianBlur in="SourceGraphic" stdDeviation="' + blur + '"></feGaussianBlur></filter><image x="0" y="0" width="100%" height="100%" externalResourcesRequired="true" xlink:href="' + src + '" style="filter:url(#blur-' + svgid + ')" preserveAspectRatio="none"></image></svg>');
		return $svg;
	};

	// パララックススクロール処理
	var parallaxBgScroll = function() {
		var winScrollTop = $window.scrollTop();

		$elems.each(function(i){
			// パララックスなしもしくはサイズ計算が終わっていない場合は終了
			if (elemSettings[i].speed === 0 || elemSettings[i].imageOffsetY === undefined) return;

			// 全体ぼかしあり
			if (elemSettings[i].blur) {
				var $elem = $(this);
				var $box = $elem.offsetParent();
				var boxOffsetTop = Math.ceil($box.offset().top);
				var boxHeight = $box.innerHeight();

				// この領域が画面内に表示されている場合
				if ((winScrollTop + winHeight > boxOffsetTop - 10) && (boxOffsetTop + boxHeight > winScrollTop + 10)) {
					var offsetY = Math.round(((winScrollTop - boxOffsetTop - boxHeight / 2 + winHeight / 2) * elemSettings[i].speed - elemSettings[i].imageOffsetY) * 2) / 2;
					// translate3dだとchromeで表示領域にぼかしがかかる
					$elem.css('transform', 'translateY(' + offsetY + 'px)');

					// オーバーレイぼかしありの場合
					if (elemSettings[i].$overlayBlurInner) {
						elemSettings[i].$overlayBlurInner.css('transform', 'translateY(' + offsetY + 'px)');
					}
				}

			// 全体ぼかしなし
			} else {
				var $elem = $(this);
				var boxOffsetTop = Math.ceil($elem.offset().top);
				var boxHeight = $elem.innerHeight();

				// この領域が画面内に表示されている場合
				if ((winScrollTop + winHeight > boxOffsetTop - 10) && (boxOffsetTop + boxHeight > winScrollTop + 10)) {
					var offsetY = Math.round(((winScrollTop - boxOffsetTop - boxHeight / 2) * elemSettings[i].speed - elemSettings[i].imageOffsetY) * 2) / 2;
					$elem.css('backgroundPositionY', offsetY);

					// オーバーレイぼかしありの場合
					if (elemSettings[i].$overlayBlurInner) {
						var overlayOffsetY = Math.round(((winScrollTop - boxOffsetTop - boxHeight / 2 + winHeight / 2) * elemSettings[i].speed - elemSettings[i].imageOffsetY) * 2) / 2;
						// translate3dだとchromeで表示領域にぼかしがかかる
						elemSettings[i].$overlayBlurInner.css('transform', 'translateY(' + overlayOffsetY + 'px)');
					}
				}
			}
		});
	};
	$window.on('load scroll', parallaxBgScroll);

	// 背景画像サイズ計算
	var parallaxCalcBgImageSize = function(i){
		var $elem = $elems.eq(i);
		var img, $box, boxHeight, boxWidth, backgroundImageHeight, backgroundImageWidth;

		if (isParallaxMobile && mobileImages[i].img.src) {
			if (!mobileImages[i].img.complete) return;
			img = mobileImages[i].img;
		} else {
			if (!images[i].img.complete) return;
			img = images[i].img;
		}

		// 画像変更
		if (elemSettings[i].currentImageSrc !== img.src) {
			$elem.css('backgroundImage', 'url(' + img.src + ')');
			elemSettings[i].currentImageSrc = img.src;

			// SVGぼかしあり（全体ぼかし・オーバーレイぼかし兼用）
			if (useSvgBlur) {
				for (var j = 0; j < elemSettings[i].svgs.length; j++) {
					elemSettings[i].svgs[j].find('image').attr('xlink:href', img.src);
				}

			// filter:blurのオーバーレイぼかしあり
			} else if (elemSettings[i].$overlayBlurInner) {
				elemSettings[i].$overlayBlurInner.css('backgroundImage', 'url(' + img.src + ')');
			}
		}

		// 全体ぼかしあり
		if (elemSettings[i].blur) {
			$box = $elem.offsetParent();
			boxHeight = $box.innerHeight();
			boxWidth = $box.innerWidth();

			// パララックス効果分込みで必要な画像の高さ
			var parallaxHeight = Math.ceil(winHeight * elemSettings[i].speed + boxHeight);

			// ぼかしのフチの透過領域込みのサイズ
			var parallaxBlurHeight = parallaxHeight + elemSettings[i].blur * 2 * 2;
			var parallaxBlurWidth = boxWidth + elemSettings[i].blur * 2 * 2;

			var parallaxRatio, imgRatio;
			parallaxRatio = parallaxBlurWidth / parallaxBlurWidth;
			imgRatio = img.width / img.height;

			// 画像の方が横長
			if (parallaxRatio < imgRatio) {
				backgroundImageWidth = Math.ceil(parallaxBlurHeight / img.height * img.width);
				backgroundImageHeight = parallaxBlurHeight;
				elemSettings[i].imageOffsetX = (backgroundImageWidth - parallaxBlurWidth) / 2 + elemSettings[i].blur * 2;
				elemSettings[i].imageOffsetY = 0;
			// 画像の方が縦長
			} else {
				backgroundImageHeight = Math.ceil(parallaxBlurWidth / img.width * img.height);
				backgroundImageWidth = parallaxBlurWidth;
				elemSettings[i].imageOffsetX = elemSettings[i].blur * 2;
				elemSettings[i].imageOffsetY = 0;
			}

			$elem.css({
				height: backgroundImageHeight,
				width: backgroundImageWidth,
				bottom: 'auto',
				left: elemSettings[i].imageOffsetX * -1,
				right: 'auto',
				top: (backgroundImageHeight - boxHeight) / -2
			});

			// スクロール0時に画面内にある場合は天地位置調整
			var boxOffsetTop = Math.ceil($box.offset().top);
			if (boxOffsetTop + boxHeight < winHeight) {
				elemSettings[i].imageOffsetY += Math.ceil((winHeight / 2 - boxOffsetTop - boxHeight / 2) * elemSettings[i].speed);
			}

		// ぼかしなし
		} else {
			$box = $elem;
			boxHeight = $box.innerHeight();
			boxWidth = $box.innerWidth();

			// パララックス効果分込みで必要な画像の高さ
			var parallaxHeight = Math.ceil(winHeight * elemSettings[i].speed + boxHeight);

			var parallaxRatio, imgRatio;
			parallaxRatio = boxWidth / parallaxHeight;
			imgRatio = img.width / img.height;

			// 画像の方が横長
			if (parallaxRatio < imgRatio) {
				backgroundImageHeight = parallaxHeight;
				backgroundImageWidth = Math.ceil(parallaxHeight / img.height * img.width);
				$elem.css('backgroundSize', backgroundImageWidth + 'px ' + parallaxHeight + 'px');
				elemSettings[i].imageOffsetY = 0;
			// 画像の方が縦長
			} else {
				$elem.css('backgroundSize', 'cover');
				backgroundImageHeight = Math.ceil(boxWidth / img.width * img.height);
				backgroundImageWidth = boxWidth;
				elemSettings[i].imageOffsetY = (backgroundImageHeight - parallaxHeight) / 2;
			}

			// スクロール0時に画面内にある場合は天地位置調整
			var boxOffsetTop = Math.ceil($elem.offset().top);
			if (boxOffsetTop + boxHeight < winHeight) {
				elemSettings[i].imageOffsetY += Math.ceil((winHeight / 2 - boxOffsetTop - boxHeight / 2) * elemSettings[i].speed);
			}
		}

		// オーバーレイぼかしありの場合
		if (elemSettings[i].$overlayBlur) {
			var boxOffset = $box.offset();
			elemSettings[i].$overlayBlur.each(function(){
				var $this = $(this);
				var offset = $this.offset();
				var $inner = $this.find('.parallax-overlay-blur-inner');

				$inner.css({
					height: backgroundImageHeight,
					width: backgroundImageWidth,
					position: 'absolute',
					bottom: 'auto',
					right: 'auto',
					left: (backgroundImageWidth - boxWidth) / -2 + boxOffset.left - offset.left,
					top: (backgroundImageHeight - boxHeight) / -2 + boxOffset.top - offset.top,
				});
			});
		}
	};

	// 初期化
	$elems.each(function(i){
		var $elem = $(this);
		var src = $elem.attr('data-parallax-image');
		var srcMobile = $elem.attr('data-parallax-mobile-image');

		if (!src && srcMobile) {
			src = srcMobile;
			srcMobile = null;
		}

		var initialSrc = src;

		// パララックススクロール係数
		var speed = parseFloat($elem.attr('data-parallax-speed'));
		if (isNaN(speed) || speed < 0 || speed > 1) {
			speed = parseFloat(defaultSpeed) || 0;
		}

		// 全体ぼかし
		var blur = parseFloat($elem.attr('data-parallax-blur'));
		if (isNaN(blur) || blur < 0) {
			blur = parseFloat(defaultBlur) || 0;
		}
		if (blur > 0) {
			var pos = $elem.css('position');
			if (pos !== 'absolute' && pos !== 'fixed') {
				blur = 0;
			}
		}

		elemSettings[i] = {
			speed: speed,
			blur: blur
		};

		// 画像オブジェクト初期化
		images[i] = {};
		images[i].img = new Image();
		mobileImages[i] = {};
		mobileImages[i].img = new Image();

		// スマホの場合は1画像のみ
		if (isSmartPhone && srcMobile) {
			src = srcMobile;
			initialSrc = srcMobile;
			srcMobile = null;
		}

		// オーバーレイぼかし
		var $closest, $overlayBlur;
		var elemPosition = $elem.css('position');
		if (elemPosition === 'relative') {
			$closest = $elem;
		} else if (elemPosition === 'absolute' || elemPosition === 'fixed') {
			$closest = $elem.offsetParent();
		}
		if ($closest) {
			$overlayBlur = $closest.find('[data-parallax-overlay-blur]').not('[data-parallax-overlay-blur=""], [data-parallax-overlay-blur="0"]');
		}

		// モバイルの場合でモバイル画像ありなら初期画像変更
		if (isParallaxMobile && srcMobile) {
			initialSrc = srcMobile;
		}

		// オーバーレイぼかしありの場合、子要素生成
		if ($overlayBlur.length) {
			$overlayBlur.each(function(){
				var parallaxOverlayBlur= parseFloat(this.dataset.parallaxOverlayBlur);
				if (isNaN(parallaxOverlayBlur) || parallaxOverlayBlur < 0) {
					return;
				}

				var $inner = $('<div class="parallax-overlay-blur-inner"></div>');

				// SVGでのぼかし
				if (useSvgBlur) {
					var $svg = parallaxCreateSvg(initialSrc, parallaxOverlayBlur);
					$inner.html($svg);
					if (!elemSettings[i].svgs) {
						elemSettings[i].svgs = [];
					}
					elemSettings[i].svgs.push = $svg;

				// filter:blurでのぼかし
				} else {
					$inner.css({
						backgroundImage: 'url(' + initialSrc + ')',
						backgroundPositionX: 'center',
						backgroundPositionY: 'center',
						backgroundRepeat: 'no-repeat',
						backgroundSize: 'cover',
						filter: 'blur(' + parallaxOverlayBlur + 'px)'
					});
				}

				$(this).css({
					overflow: 'hidden',
					position: 'absolute',
					bottom: 0,
					right: 0,
					left: 0,
					top: 0,
					zIndex: -1
				}).html($inner);
			});

			elemSettings[i].$overlayBlur = $overlayBlur;
			elemSettings[i].$overlayBlurInner = $closest.find('.parallax-overlay-blur-inner');
		}

		// 全体ぼかしあり
		if (elemSettings[i].blur) {
			// SVGでのぼかし
			if (useSvgBlur) {
				var $svg = parallaxCreateSvg(initialSrc, elemSettings[i].blur);
				$elem.html($svg);
				if (!elemSettings[i].svgs) {
					elemSettings[i].svgs = [];
				}
				elemSettings[i].svgs.push = $svg;

			// filter:blurでのぼかし
			} else {
				$elem.css({
					backgroundImage: 'url(' + initialSrc + ')',
					backgroundPositionX: 'center',
					backgroundPositionY: 'center',
					backgroundRepeat: 'no-repeat',
					backgroundSize: 'cover',
					filter: 'blur(' + elemSettings[i].blur + 'px)'
				});
			}

		// 全体ぼかしなし
		} else {
			$elem.css({
				backgroundImage: 'url(' + initialSrc + ')',
				backgroundPositionX: 'center',
				backgroundPositionY: 'center',
				backgroundRepeat: 'no-repeat',
				backgroundSize: 'cover'
			});
		}

		// モバイルの場合でモバイル画像あり
		if (isParallaxMobile && srcMobile) {
			// 画像を読み込んでからサイズ計算
			var img = mobileImages[i].img;
			img.onload = function() {
				parallaxCalcBgImageSize(i);
			};
			img.src = srcMobile;
			if (img.complete) {
				parallaxCalcBgImageSize(i);
			}

			elemSettings[i].currentImageSrc = srcMobile;
			images[i].img.src = src;

		// PCの場合
		} else if (src) {
			// 画像を読み込んでからサイズ計算
			var img = images[i].img;
			img.onload = function() {
				parallaxCalcBgImageSize(i);
			};
			img.src = src;
			if (img.complete) {
				parallaxCalcBgImageSize(i);
			}

			elemSettings[i].currentImageSrc = src;

			if (srcMobile) {
				mobileImages[i].img.src = srcMobile;
			}
		}
	});

	parallaxBgScroll();

	// リサイズ
	$window.on('resize', function(){
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function(){
			var w = window.innerWidth || $body.width();
			var h = window.innerHeight || $window.innerHeight();

			// モバイルでスクロール時のアドレスバー表示トグルでresizeイベントが実行されるため横幅のみで判定
			if (isMobile && winWidth !== w || (!isMobile && (winWidth !== w || winHeight !== h))) {
				winWidth = w;
				winHeight = h;
				isParallaxMobile = checkParallaxMobile();

				$elems.each(function(i){
					parallaxCalcBgImageSize(i);
				});
				parallaxBgScroll();
			}
		}, isIE ? 100 : 16.6666);
	});

	// iOS系 ブラウザ戻る対策
	var isIOS = (ua.indexOf('iphone') > -1 || ua.indexOf('ipad') > -1 || ua.indexOf('ipod') > -1 );
	if (isIOS) {
		window.addEventListener('pageshow', function(event) {
			if (event.persisted) {
				parallaxBgScroll();
			}
		});
	}

});
