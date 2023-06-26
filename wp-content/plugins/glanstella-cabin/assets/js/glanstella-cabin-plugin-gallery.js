jQuery(function($) {
    // 「画像を選択」ボタンをクリックした際に実行
    function selectImages(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imagePicker = $(this).parents('.image-picker');
        const $thumbnails = $imagePicker.find('.thumbnails');

        // メディアモーダルの設定
        const modal = wp.media({
            /* メディアモーダルに表示するタイトル */
            title: 'ギャラリーに追加する画像を選択',
            /* メディアライブラリに画像のみを表示 */
            library: {
                type: "image"
            },
            /* 選択できる画像を複数可にする */
            multiple: true,
        });

        // 選択済み画像
        modal.on('open',function() {
            var selection = modal.state().get('selection');
            const $imageIds = $imagePicker.find('[name="imageIds[]"]');

            if($imageIds.length > 0) {
                $imageIds.each(function(index, element) {
                    const id = $(element).val();

                    attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add(attachment ? [attachment] : []);
                });
            }
        });

        // メディアモーダルを開く
        modal.open();

        // メディアモーダルで画像を選択
        modal.on("select", function() {
            $thumbnails.empty();

            modal.state().get('selection').forEach(function(image, index) {
                // 新しい画像配列を用意
                const $images = $('<div class="images">');

                const parser = new URL(image.attributes.sizes.full.url);

                const words = parser.pathname.split('.');
                const imageFilename = words[0];
                const imageExtention = words[1];
                // const image1x = parser.origin + imageFilename + '-320x320.' + imageExtention;
                // const image2x = parser.origin + imageFilename + '-640x640.' + imageExtention;
                // const image3x = parser.origin + imageFilename + '-960x960.' + imageExtention;
                const image4x = parser.origin + imageFilename + '.' + imageExtention;

                $images.append($('<input type="hidden" name="imageFilenames[]" value="' + parser.origin + imageFilename + '">'));
                $images.append($('<input type="hidden" name="imageExtentions[]" value="' + imageExtention + '">'));
                $images.append($('<input type="hidden" name="imageIds[]" value="' + image.id + '">'));

                // $images.append('<div class="image"><img src="' + image1x + '"><div class="caption">@1x</div></div>');
                // $images.append('<div class="image"><img src="' + image2x + '"><div class="caption">@2x</div></div>');
                // $images.append('<div class="image"><img src="' + image3x + '"><div class="caption">@3x</div></div>');
                $images.append('<div class="image"><img src="' + image4x + '"><div class="caption">@4x</div></div>');

                $thumbnails.append($images);
            });

            $thumbnails.sortable();
        });
    }
    $(".image-picker .select-images").click(selectImages);

    var $thumbnails = $('.image-picker .thumbnails');
    $thumbnails.sortable();
});
