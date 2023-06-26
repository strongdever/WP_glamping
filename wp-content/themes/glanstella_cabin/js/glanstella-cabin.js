/*
 * Theme Name: GLANSTELLA-CABIN
 * Author: Cryptomeria
 * Version: 1.0.0
 * License: BSD License
*/
$(function() {
    const $window = $(window);
    const $html = $('html');
    const $body = $('body');
    const breakPoint = 1280;

    // RWD対応
    function onChangeWidth() {
        const windowWidth = $window.width();

        if (windowWidth >= breakPoint) {
            // PCモード
            $html.css({ 'font-size': '16px' });
        } else {
            // SPモード
            $html.css({ 'font-size': (16 * windowWidth / 375) + 'px' });
        }
    }
    onChangeWidth();
    $window.on('resize', onChangeWidth);

    // LazyLoad
    function lazyLoad() {
        const scrollTop = $window.scrollTop();
        const scrollHeight = $window.height();
        const lazyLoadStart = scrollTop + scrollHeight + 100;

        $('.lazyload').each(function(index, element) {
            const $this = $(element);

            if ($this.offset().top < lazyLoadStart) {
                $this.prop('srcset', $this.data('srcset')).prop('src', $this.data('src')).removeClass('lazyload');
            }
        });
    }
    lazyLoad();
    $window.on('scroll', lazyLoad);

    // // ヘッダー背景色
    // function changeHeaderBackground() {
    //     const scrollTop = $window.scrollTop();

    //     if (scrollTop > 50) {
    //         $('#site-header-pc .background').css({ opacity: 1.0 });
    //     } else {
    //         $('#site-header-pc .background').css({ opacity: 0.0 });
    //     }
    // }
    // changeHeaderBackground();
    // $window.on('scroll', changeHeaderBackground);

    // イメージピッカー
    function pickupImage() {
        const $this = $(this);
        const currentIndex = $this.data('index');
        const $imagePicker = $this.parent();
        const $images = $imagePicker.find('img');
        const maxIndex = $imagePicker.data('max-index');
        const $target = $('.' + $imagePicker.data('target'));
        const $target1 = $('.' + $imagePicker.data('target1'));
        const $target2 = $('.' + $imagePicker.data('target2'));
        const $target3 = $('.' + $imagePicker.data('target3'));
        var newIndex = currentIndex;

        if ($target.length > 0) {
            $target.prop('src', $this.prop('src')).prop('srcset', $this.prop('srcset'));
        }
        if ($target1.length > 0) {
            $target1.prop('src', $($images.get(newIndex)).prop('src')).prop('srcset', $($images.get(newIndex)).prop('srcset'));
        }
        if ($target2.length > 0) {
            newIndex = currentIndex + 1;
            if (newIndex > maxIndex) { newIndex = 0 }
            $target2.prop('src', $($images.get(newIndex)).prop('src')).prop('srcset', $($images.get(newIndex)).prop('srcset'));
        }
        if ($target3.length > 0) {
            newIndex = currentIndex + 1;
            if (newIndex > maxIndex) { newIndex = 0 }
            newIndex = newIndex + 1;
            if (newIndex > maxIndex) { newIndex = 0 }
            $target3.prop('src', $($images.get(newIndex)).prop('src')).prop('srcset', $($images.get(newIndex)).prop('srcset'));
        }
    }
    $('.image-picker').each(function(index, element) {
        const $imagePicker = $(element);
        var lastIndex = 0;

        $imagePicker.find('img').each(function(index, img) {
            $(img).data('index', index);
            lastIndex = index;
        });
        $imagePicker.data('maxIndex', lastIndex);
    });
    $('.image-picker img').on('click', pickupImage);

    // lightbox
    const $lightbox = $('#lightbox');
    const $lightboxImage = $('#lightbox img');
    const $lightboxSource = $('.photos .pickup img, img.lightbox');

    $lightboxSource.on('click', function() {
        const $this = $(this);

        $body.css({ 'overflow-y': 'hidden'});
        $lightboxImage.css({ opacity: 0.0 }).prop('src', $this.prop('src')).prop('srcset', $this.prop('srcset'));
        $lightbox.css({ display: 'flex' });
        $lightboxImage.css({ opacity: 1.0 });
    });
    $lightbox.on('click', function() {
        $body.css({ 'overflow-y': 'scroll'});
        $lightbox.css({ display: 'none' });
        $lightboxImage.css({ opacity: 0.0 });
    });

    // スライダー
    $('.slider').each(function(index, slider) {
        const $slider = $(slider);
        const slideSpeed = $slider.data('speed');
        const slideDuration = $slider.data('duration');

        function doScrollNext($slider) {
            $slider.children().each(function(index, obj) {
                const $obj = $(obj);

                $obj.css({ transition: 'unset', transform: 'translateX(' + (0) + 'px)' });
            });

            $obj = $slider.children().first();
            $obj.remove();
            $slider.append($obj);

            setTimeout(doScroll, slideDuration, $slider);
        }
        function doScroll($slider) {
            $slider.children().each(function(index, obj) {
                const $obj = $(obj);
                const margin = parseInt($obj.css('margin-left')) + parseInt($obj.css('margin-right'));

                $obj.css({ transition: 'transform ' + slideSpeed + 'ms',  transform: 'translateX(' + (0 - $obj.width() - margin) + 'px)' });
            });

            setTimeout(doScrollNext, slideSpeed, $slider);
        }

        setTimeout(doScroll, slideDuration, $slider);
    });

    // SPスライダー
    function spSliderOnChangeWidth() {
        var spsliding = false;

        if ($window.width() >= breakPoint) {
            // PCモード
            spsliding = false;

            $('.spslider').each(function(index, slider) {
                const $slider = $(slider);

                if ($slider.data('timer-handle')) {
                    clearTimeout($slider.data('timer-handle'));
                    $slider.data('timer-handle', false);
                }
            });
        } else {
            if (spsliding === false) {
                // SPモード
                spsliding = true;

                $('.spslider').each(function(index, slider) {
                    const $slider = $(slider);
                    const slideSpeed = $slider.data('speed');
                    const slideDuration = $slider.data('duration');
                    const innerHTML = $slider.innerHTML;
                    var sliding = false;

                    if ($slider.data('innerHTML')) {
                        $slider.innerHTML = $slider.data('innerHTML');
                    } else {
                        $slider.data('innerHTML', innerHTML);
                    }

                    if ($slider.data('timer-handle')) {
                        clearTimeout($slider.data('timer-handle'));
                        $slider.data('timer-handle', false);
                    }

                    function doScrollPrev($slider) {
                        $slider.children().last().remove();
                        $slider.children().last().remove();

                        $slider.css({ transition: 'unset', transform: 'translateX(' + (0) + 'px)' });

                        sliding = false;
                        $slider.data('timer-handle', setTimeout(doScroll, slideSpeed + slideDuration, $slider));
                    }
                    function doScrollNext($slider) {
                        $slider.children().first().remove();
                        $slider.children().first().remove();

                        $slider.css({ transition: 'unset', transform: 'translateX(' + (0) + 'px)' });

                        sliding = false;
                        $slider.data('timer-handle', setTimeout(doScroll, slideSpeed + slideDuration, $slider));
                    }
                    function doScroll($slider) {
                        if (swiping) {
                            $slider.data('timer-handle', setTimeout(doScroll, slideDuration, $slider));
                            return;
                        }
                        const $objLast = $slider.children().last().clone();
                        const $objFirst = $slider.children().first().clone();

                        sliding = true;
                        $slider.prepend($objLast);
                        $slider.append($objFirst);

                        const $obj = $slider.children().first();
                        const margin = parseInt($obj.css('margin-left')) + parseInt($obj.css('margin-right'));
                        $slider.css({ transition: 'transform ' + slideSpeed + 'ms',  transform: 'translateX(' + (0 - $obj.width() - margin) + 'px)' });

                        $slider.data('timer-handle', setTimeout(doScrollNext, slideSpeed, $slider));
                    }
                    function doScrollReverse($slider) {
                        if (swiping) {
                            $slider.data('timer-handle', setTimeout(doScroll, slideDuration, $slider));
                            return;
                        }
                        const $objLast = $slider.children().last().clone();
                        const $objFirst = $slider.children().first().clone();

                        sliding = true;
                        $slider.prepend($objLast);
                        $slider.append($objFirst);

                        const $obj = $slider.children().first();
                        const margin = parseInt($obj.css('margin-left')) + parseInt($obj.css('margin-right'));
                        $slider.css({ transition: 'transform ' + slideSpeed + 'ms',  transform: 'translateX(' + -(0 - $obj.width() - margin) + 'px)' });

                        $slider.data('timer-handle', setTimeout(doScrollPrev, slideSpeed, $slider));
                    }

                    // スワイプ関係
                    var swiping = false;
                    var startX = false;
                    var currentX = false;

                    function spSliderOnTouchStart(touchEvent) {
                        if ($(touchEvent.target).hasClass('button') || sliding) return;

                        swiping = true;
                        touchEvent.preventDefault();
                        currentX = startX = touchEvent.touches[0].pageX;
                    }
                    $slider.on('touchstart', spSliderOnTouchStart);
                    function spSliderOnTouchMove(touchEvent) {
                        if ($(touchEvent.target).hasClass('button') || sliding) return;

                        touchEvent.preventDefault();
                        currentX = touchEvent.touches[0].pageX;
                    }
                    $slider.on('touchmove', spSliderOnTouchMove);
                    function spSliderOnTouchEnd(touchEvent) {
                        if ($(touchEvent.target).hasClass('button') || sliding) return;

                        swiping = false;
                        touchEvent.preventDefault();

                        const diffX = currentX - startX;
                        const $slider = $(this);

                        if (diffX < -20) {
                            if ($slider.data('timer-handle')) {
                                clearTimeout($slider.data('timer-handle'));
                                $slider.data('timer-handle', false);
                            }
                            doScroll($slider);
                        } else if (diffX > 20) {
                            if ($slider.data('timer-handle')) {
                                clearTimeout($slider.data('timer-handle'));
                                $slider.data('timer-handle', false);
                            }
                            doScrollReverse($slider);
                        }
                    }
                    $slider.on('touchend', spSliderOnTouchEnd);

                    $slider.data('timer-handle', setTimeout(doScroll, slideDuration, $slider));
                });
            }
        }
    }
    spSliderOnChangeWidth();
    $window.on('resize', spSliderOnChangeWidth);

    // SPメニューオープン
    $('#site-navigation-sp_open').on('click', function() {
        $body.css({ 'overflow-y': 'hidden' });
        $('#site-navigation-sp').css({ display: 'block' });
    });
    // SPメニュークローズ
    $('#site-navigation-sp_close').on('click', function() {
        $body.css({ 'overflow-y': 'scroll' });
        $('#site-navigation-sp').css({ display: 'none' });
    });


    /**
     * FAQオープナー/クローザー
     */
    if ($('#archive-faq').length) {
        /**
         * 初期化
         */
        function faqInitialize() {
            const $sectionFaq = $('.section-faq');
            const $answers = $sectionFaq.find('.answer');
            const $cloneFaq = $sectionFaq.clone();

            $cloneFaq.css({ position: 'absolute', left: 0, top: 0, width: $sectionFaq.css('width'), opacity: 0 });
            $('#section2 .content').append($cloneFaq);
            $cloneFaq.find('.answer').each(function (index, element) {
                const $answer = $(element);
                $answer.css({ height: 'auto' });
                $answers.eq(index).data('height', $answer.height() + 'px');
            });
            $cloneFaq.remove();
        }
        faqInitialize();
        $window.on('resize', faqInitialize);

        /**
         * FAQオープナー/クローザー本体
         */
        function faqToggle() {
            const $this = $(this);

            if ($this.hasClass('opened')) {
                $this.removeClass('opened');
                $this.find('.answer').css('height', '0px');
            } else {
                $this.addClass('opened');
                $this.find('.answer').css('height', $this.find('.answer').data('height'));
            }
        }
        $('.faq').on('click', faqToggle);
    }

    /**
     * Gallery切り替え
     */
    if ($('#page-gallery').length) {
        const $buttonTile = $('.buttonTile');
        const $buttonSingle = $('.buttonSingle');
        const $gallery = $('.gallery');
        const $galleryController = $('#sectionGalleryController .content');
        const $galleryImages = $('.gallery img');
        var imageIndex = 1;

        function onGalleryChange() {
            $galleryImages.css({ position: 'unset', 'object-fit': 'cover' });

            // タイル表示
            $buttonTile.on('click', function() {
                $buttonTile.css({ 'border-color': 'var(--color-button-dark_bg)' });
                $buttonSingle.css({ 'border-color': 'transparent' });

                $galleryController.css({ display: 'none' });
                $galleryImages.css({ position: 'unset', 'object-fit': 'cover', width: '100%', height: '100%', 'min-width': 'unset', 'min-height': 'unset', opacity: 'unset' });
                if ($window.width() > breakPoint) {
                    // pc
                    $gallery.css({ 'display': 'grid', height: '1500px', gap: '20px' });
                } else {
                    // sp
                    $gallery.css({ 'display': 'grid', height: '60rem', gap: '0.625rem' });
                }
            });

            // シングル表示
            $buttonSingle.on('click', function() {
                $buttonTile.css({ 'border-color': 'transparent' });
                $buttonSingle.css({ 'border-color': 'var(--color-button-dark_bg)' });
                imageIndex = 1;

                if ($window.width() > breakPoint) {
                    // PC
                    $galleryController.css({ display: 'block' });
                    $gallery.css({ 'display': 'flex', 'height': '712px', 'flex-wrap': 'nowrap', overflow: 'hidden', gap: '0px' });
                    $galleryImages.css({ position: 'absolute', 'width': '1140px', 'height': '712px', 'min-width': '1140px', 'min-height': '712px' });
                    $galleryImages.css({ 'z-index': 0, opacity: 0, 'object-fit': 'scale-down' });
                    $('.gallery img:nth-child(1)').css({ opacity: 1 });
                } else {
                    // SP
                    $galleryController.css({ display: 'none' });
                    $gallery.css({ 'display': 'flex', 'flex-wrap': 'wrap', gap: '10px', height: 'auto' });
                    $galleryImages.css({ 'width': '100%', 'height': '100%', opacity: 1 });
                }
            });
        }
        onGalleryChange();

        $('#galleryMovePrev').on('click', function() {
            const currentIndex = imageIndex--;
            if (imageIndex == 0) { imageIndex = 10; }

            $galleryImages.css({ 'z-index': 0 });
            $('.gallery img:nth-child(' + currentIndex + ')').css({ transition: 'opacity 1.0s', opacity: 0 });
            $('.gallery img:nth-child(' + imageIndex + ')').css({ transition: 'opacity 1.0s', opacity: 1, 'z-index': 1 });
        });
        $('#galleryMoveNext').on('click', function() {
            const currentIndex = imageIndex++;
            if (imageIndex == 11) { imageIndex = 1; }

            $galleryImages.css({ 'z-index': 0 });
            $('.gallery img:nth-child(' + currentIndex + ')').css({ transition: 'opacity 1.0s', opacity: 0 });
            $('.gallery img:nth-child(' + imageIndex + ')').css({ transition: 'opacity 1.0s', opacity: 1, 'z-index': 1 });
        });
    }
});
