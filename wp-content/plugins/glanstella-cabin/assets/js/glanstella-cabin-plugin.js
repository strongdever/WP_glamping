$(function() {
    $(".image-picker .thumbnails").sortable();

    function selectImages(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // メディアモーダルの設定
        const modal = wp.media({
            /* メディアモーダルに表示するタイトル */
            title: 'イメージピッカーに追加する画像を選択',
            /* メディアライブラリに画像のみを表示 */
            library: {
                type: "image"
            },
            /* 選択できる画像を複数可にする */
            multiple: true,
        });

        // メディアモーダルを開く
        modal.open();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imagePicker = $(this).parents('.image-picker');
        var $thumbnails = $imagePicker.find('.thumbnails');
        if ($thumbnails.length) { $thumbnails.empty().remove(); } else { $thumbnails = $('<div class="thumbnails">'); }
        $imagePicker.append($thumbnails);

        // メディアモーダルで画像を選択
        modal.on("select", function() {
            modal.state().get('selection').forEach(function(image, index) {
                // 新しい画像配列を用意
                const $images = $('<div class="images">');

                const parser = new URL(image.attributes.sizes.full.url);

                const words = parser.pathname.split('.');
                const imageFilename = words[0];
                const imageExtention = words[1];
                const image1x = parser.origin + imageFilename + '-320x320.' + imageExtention;
                const image2x = parser.origin + imageFilename + '-640x640.' + imageExtention;
                const image3x = parser.origin + imageFilename + '-960x960.' + imageExtention;
                const image4x = parser.origin + imageFilename + '-1280x1280.' + imageExtention;

                $images.append($('<input type="hidden" name="imageFilenames[]" value="' + parser.origin + imageFilename + '">'));
                $images.append($('<input type="hidden" name="imageExtentions[]" value="' + imageExtention + '">'));

                $images.append('<div class="image"><img src="' + image1x + '"><div class="caption">@1x</div></div>');
                $images.append('<div class="image"><img src="' + image2x + '"><div class="caption">@2x</div></div>');
                $images.append('<div class="image"><img src="' + image3x + '"><div class="caption">@3x</div></div>');
                $images.append('<div class="image"><img src="' + image4x + '"><div class="caption">@4x</div></div>');

                // WordPressへの送信データ
                $thumbnails.append($images);
                $thumbnails.sortable();
            });
            $('[type="submit"]').prop('disabled', false);
        });
    }

    function selectImage2d(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // メディアモーダルの設定
        const modal = wp.media({
            /* メディアモーダルに表示するタイトル */
            title: '部屋の平面図を選択',
            /* メディアライブラリに画像のみを表示 */
            library: {
                type: "image"
            },
            /* 選択できる画像を複数可にする */
            multiple: false,
        });

        // メディアモーダルを開く
        modal.open();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imagePicker = $(this).parents('.image-picker');
        var $thumbnails = $imagePicker.find('.thumbnails');
        if ($thumbnails.length) { $thumbnails.empty().remove(); } else { $thumbnails = $('<div class="thumbnails">'); }
        $imagePicker.append($thumbnails);

        // メディアモーダルで画像を選択
        modal.on("select", function() {
            modal.state().get('selection').forEach(function(image, index) {
                // 新しい画像配列を用意
                const $images = $('<div class="images">');

                const parser = new URL(image.attributes.sizes.full.url);

                const words = parser.pathname.split('.');
                const imageFilename = words[0];
                const imageExtention = words[1];
                const image1x = parser.origin + imageFilename + '-320x320.' + imageExtention;
                const image2x = parser.origin + imageFilename + '-640x640.' + imageExtention;
                const image3x = parser.origin + imageFilename + '-960x960.' + imageExtention;
                const image4x = parser.origin + imageFilename + '-1280x1280.' + imageExtention;

                $images.append($('<input type="hidden" name="imageFilenames[]" value="' + parser.origin + imageFilename + '">'));
                $images.append($('<input type="hidden" name="imageExtentions[]" value="' + imageExtention + '">'));

                $images.append('<div class="image"><img src="' + image1x + '"><div class="caption">@1x</div></div>');
                $images.append('<div class="image"><img src="' + image2x + '"><div class="caption">@2x</div></div>');
                $images.append('<div class="image"><img src="' + image3x + '"><div class="caption">@3x</div></div>');
                $images.append('<div class="image"><img src="' + image4x + '"><div class="caption">@4x</div></div>');

                // WordPressへの送信データ
                $thumbnails.append($images);
                $thumbnails.sortable();
            });
            $('[type="submit"]').prop('disabled', false);
        });
    }

    // 「画像を選択」ボタンをクリックした際に実行
    $(".image-picker .select-images").click(selectImages);

    // ルームタイプを追加
    $('#room-add').on('click', function() {
        $pageContent = `
            <hr>
            <div class="page-content">
                <table class="admin-editor">
                    <tr><th>ルームタイプ(英)</th><td><input type="text" name="typeEnglish[]" value=""></td></tr>
                    <tr><th>ルームタイプ(和)</th><td><input type="text" name="typeJapanese[]" value=""></td></tr>
                    <tr><th>説明文</th><td><textarea name="description"></textarea></td></tr>

                    <tr>
                        <th>平面図</th>
                        <td>
                            <button type="button" id="select-2d">画像を選択</button>
                            <input type="hidden" name="image2d[]" value="">
                            <div class="image"><img src=""></div>
                        </td>
                    </tr>
                    <tr>
                        <th>場内マップ</th>
                        <td>
                            <button type="button" id="select-map">画像を選択</button>
                            <input type="hidden" name="imageMap[]" value="">
                            <div class="image"><img src=""></div>
                        </td>
                    </tr>
                    <tr>
                        <th>部屋イメージ</th>
                        <td>
                            <div class="image-picker">
                                <button type="button" class="select-images">画像を選択</button>

                                <div class="thumbnails">
                                </div><!-- .thumbnails -->
                            </div><!-- .image-picker -->
                        </td>
                    </tr>
                </table><!-- .admin-editor -->
            </div><!-- .page-content -->
        `;
        $('.page-contents').append($pageContent);
        $(".image-picker .select-images").click(selectImages);
        $(".image-picker .thumbnails").sortable();
    });
});
