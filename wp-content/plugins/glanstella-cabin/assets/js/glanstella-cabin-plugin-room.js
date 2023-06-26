jQuery(function($) {
    var contentsCounter = $('.page-content').length;

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
            title: 'ルームタイプに追加する画像を選択',
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
                const image1x = parser.origin + imageFilename + '-320x320.' + imageExtention;
                const image2x = parser.origin + imageFilename + '-640x640.' + imageExtention;
                const image3x = parser.origin + imageFilename + '-960x960.' + imageExtention;
                const image4x = parser.origin + imageFilename + '.' + imageExtention;

                $images.append($('<input type="hidden" name="imageFilenames[]" value="' + parser.origin + imageFilename + '">'));
                $images.append($('<input type="hidden" name="imageExtentions[]" value="' + imageExtention + '">'));
                $images.append($('<input type="hidden" name="imageIds[]" value="' + image.id + '">'));

                $images.append('<div class="image"><img src="' + image1x + '"><div class="caption">@1x</div></div>');
                $images.append('<div class="image"><img src="' + image2x + '"><div class="caption">@2x</div></div>');
                $images.append('<div class="image"><img src="' + image3x + '"><div class="caption">@3x</div></div>');
                $images.append('<div class="image"><img src="' + image4x + '"><div class="caption">@4x</div></div>');

                $thumbnails.append($images);
            });
            $thumbnails.sortable();
            console.log($imagePicker.find('img').length);
            $imagePicker.find('[name="imageCount[]"]').val($imagePicker.find('img').length / 4);
        });
    }
    $(".image-picker .select-images").click(selectImages);

    var $thumbnails = $('.image-picker .thumbnails');
    $thumbnails.sortable();

    // 「平面図を選択」ボタンをクリックした際に実行
    function selectImage2d(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // メディアモーダルの設定
        const modal = wp.media({
            /* メディアモーダルに表示するタイトル */
            title: '部屋の平面図を選択',
            /* メディアライブラリに画像のみを表示 */
            library: {
                type: 'image'
            },
            /* 選択できる画像を複数可にする */
            multiple: false,
        });

        // メディアモーダルを開く
        modal.open();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $image2d = $(this).parents('td').find('.image2d img');
        const $image2dHidden = $(this).parents('td').find('input[name="image2d[]"]');

        // メディアモーダルで画像を選択
        modal.on("select", function() {
            const image = modal.state().get('selection').first();

            // 新しい画像配列を用意
            $image2d.prop('src', image.attributes.sizes.full.url);
            $image2dHidden.val(image.attributes.sizes.full.url);
        });
    }
    $(".select-image2d").click(selectImage2d);

    // 「平面図をクリア」ボタンをクリックした際に実行
    function clearImage2d(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $image2d = $(this).parents('td').find('.image2d img');
        const $image2dHidden = $(this).parents('td').find('input[name="image2d[]"]');

        // 新しい画像配列を用意
        $image2d.prop('src', '');
        $image2dHidden.val('');
    }
    $(".clear-image2d").click(clearImage2d);


    // 「チェックイン方法を選択」ボタンをクリックした際に実行
    function selectCheckin(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // メディアモーダルの設定
        const modal = wp.media({
            /* メディアモーダルに表示するタイトル */
            title: '部屋の平面図を選択',
            /* メディアライブラリに画像のみを表示 */
            library: {
                type: 'application/pdf'
            },
            /* 選択できる画像を複数可にする */
            multiple: false,
        });

        // メディアモーダルを開く
        modal.open();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imageCheckin = $(this).parents('td').find('.imageCheckin');
        const $imageCheckinHidden = $(this).parents('td').find('input[name="imageCheckin[]"]');

        // メディアモーダルで画像を選択
        modal.on("select", function() {
            const pdf = modal.state().get('selection').first();
            // 新しい画像配列を用意
            $imageCheckin.text(pdf.attributes.url);
            $imageCheckinHidden.val(pdf.attributes.url);
        });
    }
    $(".select-checkin").click(selectCheckin);

    // 「チェックイン方法をクリア」ボタンをクリックした際に実行
    function clearCheckin(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imageCheckin = $(this).parents('td').find('.imageCheckin');
        const $imageCheckinHidden = $(this).parents('td').find('input[name="imageCheckin[]"]');

        // 新しい画像配列を用意
        $imageCheckin.text('(未選択)');
        $imageCheckinHidden.val('');
    }
    $(".clear-checkin").click(selectCheckin);

    // 「場内マップを選択」ボタンをクリックした際に実行
    function selectMap(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // メディアモーダルの設定
        const modal = wp.media({
            /* メディアモーダルに表示するタイトル */
            title: '部屋の平面図を選択',
            /* メディアライブラリに画像のみを表示 */
            library: {
                type: 'application/pdf'
            },
            /* 選択できる画像を複数可にする */
            multiple: false,
        });

        // メディアモーダルを開く
        modal.open();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imageMap = $(this).parents('td').find('.imageMap');
        const $imageMapHidden = $(this).parents('td').find('input[name="imageMap[]"]');

        // メディアモーダルで画像を選択
        modal.on("select", function() {
            const pdf = modal.state().get('selection').first();
            // 新しい画像配列を用意
            $imageMap.text(pdf.attributes.url);
            $imageMapHidden.val(pdf.attributes.url);
        });
    }
    $(".select-map").click(selectMap);

    // 「場内マップをクリア」ボタンをクリックした際に実行
    function clearMap(event) {
        // jQueryでクリック時の機能を実装するため、通常のクリックイベントをブロック
        event.preventDefault();

        // 項目内に画像選択を2箇所以上、設置する場合に、クリックした要素の先祖要素を利用し現在の箇所を判断
        const $imageMap = $(this).parents('td').find('.imageMap');
        const $imageMapHidden = $(this).parents('td').find('input[name="imageMap[]"]');

        // 新しい画像配列を用意
        $imageMap.text('(未選択)');
        $imageMapHidden.val('');
    }
    $(".clear-map").click(selectMap);


    // ルームタイプを追加
    $('#room-add').on('click', roomAdd);
    function roomAdd() {
        pageContent = `
            <div class="page-content">
                <hr>
                <button type="button" class="room-remove">このルームタイプを削除</button>

                <table class="admin-editor">
                    <tr><th>ルームタイプ(英)</th><td><input type="text" name="english[]" value=""></td></tr>
                    <tr><th>ルームタイプ(和)</th><td><input type="text" name="japanese[]" value=""></td></tr>
                    <tr><th>説明文</th><td><textarea name="description[]"></textarea></td></tr>

                    <tr>
                        <th>平面図</th>
                        <td>
                            <hr>
                            <input type="hidden" name="image2d[]" value="">&nbsp;<span class="image2d"><img></span>
                            <div>
                                <button type="button" class="select-image2d">画像を選択</button>
                                <button type="button" class="clear-image2d">画像をクリア</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>場内マップ(PDF)</th>
                        <td>
                            <hr>
                            <input type="hidden" name="imageMap[]" value="">&nbsp;<span class="imageMap">(未選択)</span>
                            <div>
                                <button type="button" class="select-map">PDFを選択</button>
                                <button type="button" class="clear-map">PDFをクリア</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>チェックイン方法(PDF)</th>
                        <td>
                            <hr>
                            <input type="hidden" name="imageCheckin[]" value="">&nbsp;<span class="imageCheckin">(未選択)</span>
                            <div>
                                <button type="button" class="select-checkin">PDFを選択</button>
                                <button type="button" class="clear-checkin">PDFをクリア</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>部屋イメージ</th>
                        <td>
                        <hr>
                            <div class="image-picker">
                                <input type="hidden" name="imageCount[]" value="0">

                                <div class="thumbnails">
                                </div><!-- .thumbnails -->
                                <button type="button" class="select-images">画像を選択</button>
                            </div><!-- .image-picker -->
                        </td>
                    </tr>
                </table><!-- .admin-editor -->
            </div><!-- .page-content -->
        `;
        contentsCounter++;
        $('.page-contents').append(pageContent);
        $(".image-picker .select-images").click(selectImages);
        $(".image-picker .thumbnails").sortable();
        $('.room-remove').on('click', roomRemove);
        $(".select-image2d").click(selectImage2d);
        $(".clear-image2d").click(clearImage2d);
        $(".select-map").click(selectMap);
        $(".clear-map").click(clearMap);
    }

    $('.room-remove').on('click', roomRemove);
    function roomRemove() {
        $(this).parents('.page-content').remove();
    }
});
