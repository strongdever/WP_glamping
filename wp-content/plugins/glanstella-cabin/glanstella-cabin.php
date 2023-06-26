<?php
/**
 * Glanstella-cabin plugins
 *
 * Plugin Name: Glanstella Cabin Editor
 * Description: Edit the WordPress Glanstella-cabin add-ons.
 * Version:     1.0.0
 * Author:      Cryptomeria
 * License:     MIT Lisence
 */

if (!defined('ABSPATH')) {
	die;
}

if (!class_exists('Glanstella_Cabin')) {
    class Glanstella_Cabin {

        public function __construct() {
        }

        public function init_actions() {
            // Ratina対応サイズ
            add_image_size('@1x', 320, 320);
            add_image_size('@2x', 640, 640);
            add_image_size('@3x', 960, 960);
            add_image_size('@4x', 1280, 1280);

            //add_action('init', [ $this, 'gc_create_post_type' ]); // アクションに上記関数をフックします
            // ページ保存時のフック追加
            add_action('save_post', [$this, 'save_fields' ]);

            // FAQカスタム投稿関係
            add_action('init', [$this, 'create_faq_type']);
            add_action('admin_enqueue_scripts', [ $this, 'plugin_faq_scripts' ]);

            // ページが指定されたものであれば、特殊な入力画面に変更
            if (isset($_REQUEST['post'])) {
                $pageType = strtolower(get_post_type((int)$_REQUEST['post']));
                $pageSlug = strtolower(get_post_field('post_name', (int)$_REQUEST['post']));

                if (($pageType == 'page') && in_array($pageSlug, [ 'gallery', 'room', 'food', 'stay' ])) {
                    add_action('admin_enqueue_scripts', [ $this, 'plugin_' . $pageSlug . '_scripts' ]);
                    add_action('init', [$this, 'create_' . $pageSlug . '_type']);
                }
            }
        }

        function save_fields($post_id) {
            $pageType = strtolower(get_post_type($post_id));
            $pageSlug = strtolower(get_post_field('post_name', $post_id));

            if (($pageType == 'page') && in_array($pageSlug, [ 'gallery', 'room', 'food', 'stay' ])) {
                call_user_func([$this, 'save_' . $pageSlug . '_fields'], $post_id);
            }
        }

        /**
         * Roomカスタム固定ページ
         */
        function plugin_room_scripts() {
            // メディアモーダルを利用するために必要なスクリプトを追加
            wp_enqueue_media();

            // バンドル版のjQueryをロードしない
            //wp_deregister_script('jquery');

            // CSSロード
            wp_enqueue_style('glanstella-cabin-admin', plugins_url('/assets/css/style-admin.css', __FILE__), [], '1.0.0');

            // JSロード
            //wp_enqueue_script('jquery', plugins_url('/assets/jquery/js/jquery-3.6.0.min.js', __FILE__), [], '3.6.0', true);
            wp_enqueue_script('jquery-ui', plugins_url('/assets/jquery/js/jquery-ui.min.js', __FILE__), [ 'jquery' ], '1.13.1', true);
            wp_enqueue_script('glanstella-cabin-plugin', plugins_url('/assets/js/glanstella-cabin-plugin-room.js', __FILE__), [ 'jquery' ], '1.0.0');
        }

        // 編集機能カスタマイズ
        function create_room_type() {
            remove_post_type_support('page', 'title');
            remove_post_type_support('page', 'editor');
            add_action('add_meta_boxes', [ $this, 'add_room_meta_boxes' ]);
        }

        // 固定ページ編集画面カスタマイズ
        function add_room_meta_boxes() {
            add_meta_box(
                'rooms', // 項目を識別するID
                'ルームページ', // 項目のタイトル
                [$this, 'room_meta_boxes_callback'], // 項目の内容を出力する関数を指定
                'page', // 項目を追加するページを指定
                'normal',
                'high'
            );
        }

        // 項目の内容を出力する関数を作成
        function room_meta_boxes_callback($post) {
            $contents = get_post_meta($post->ID, 'contents')[0];
?>
                <table class="page-header">
                    <tr><th>大見出し</th><td><input type="text" name="header-title" value="<?= htmlspecialchars($contents['header']['title'], ENT_HTML5 | ENT_QUOTES); ?>"></td></tr>
                    <tr><th>説明文</th><td><textarea name="header-description"><?= $contents['header']['description']; ?></textarea></td></tr>
                </table><!-- .rooms-header -->
                <div class="page-contents">
<?php
            if (is_array($contents['rooms'])) {
                foreach ($contents['rooms'] as $index => $room) {
?>
                    <div class="page-content">
                        <hr>
                        <button type="button" class="room-remove">このルームタイプを削除</button>
                        <input type="hidden" name="index[]" value="<?= $index; ?>">

                        <table class="admin-editor">
                            <tr><th>ルームタイプ(英)</th><td><input type="text" name="english[]" value="<?= $room['english']; ?>"></td></tr>
                            <tr><th>ルームタイプ(和)</th><td><input type="text" name="japanese[]" value="<?= $room['japanese']; ?>"></td></tr>
                            <tr><th>説明文</th><td><textarea name="description[]"><?= $room['description']; ?></textarea></td></tr>

                            <tr>
                                <th>平面図</th>
                                <td>
                                    <hr>
                                    <input type="hidden" name="image2d[]" value="<?= $room['image2d']; ?>">&nbsp;<span class="image2d"><img src="<?= $room['image2d']; ?>"></span>
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
                                    <input type="hidden" name="imageMap[]" value="<?= $room['imageMap']; ?>">&nbsp;<span class="imageMap"><?= $room['imageMap']; ?></span>
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
                                    <input type="hidden" name="imageCheckin[]" value="<?= $room['imageCheckin']; ?>">&nbsp;<span class="imageCheckin"><?= $room['imageCheckin']; ?></span>
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
                                    <?php
                    if (is_array($room['images'])) {
?>
                                        <input type="hidden" name="imageCount[]" value="<?= count($room['images']); ?>">

                                        <div class="thumbnails">
<?php
                        foreach ($room['images'] as $image) {
?>
                                            <div class="images">
                                                <input type="hidden" name="imageFilenames[]" value="<?= $image['filename'] ?>">
                                                <input type="hidden" name="imageExtentions[]" value="<?= $image['ext']; ?>">
                                                <input type="hidden" name="imageIds[]" value="<?= $image['id']; ?>">

                                                <div class="image"><img src="<?= $image['filename'] ?>-320x320.<?= $image['ext']; ?>"><div class="caption">@1x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-640x640.<?= $image['ext']; ?>"><div class="caption">@2x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-960x960.<?= $image['ext']; ?>"><div class="caption">@3x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>.<?= $image['ext']; ?>"><div class="caption">@4x</div></div>
                                            </div><!-- .images -->
<?php
                        }
?>
                                        </div><!-- .thumbnails -->
<?php
                    }
?>
                                        <button type="button" class="select-images">画像を選択</button>

                                    </div><!-- .image-picker -->
                                </td>
                            </tr>
                        </table><!-- .admin-editor -->
                    </div><!-- .page-content -->
                    <?php
                }
            }
?>
                </div><!-- .page-contents -->
                <hr>
                <button type="button" id="room-add">ルームタイプを追加</button>
<?php
        }

        function save_room_fields($post_id) {
            // ヘッダー情報保存
            $contents = [
                'header' => [ 'title' => $_REQUEST['header-title'], 'description' => $_REQUEST['header-description'] ],
                'rooms' => [],
            ];
            // ルームタイプ保存
            $currentImageIndex = 0;
            for ($index = 0; $index < count($_REQUEST['english']); $index++) {
                $contents['rooms'][] = [
                    'english' => $_REQUEST['english'][$index],
                    'japanese' => $_REQUEST['japanese'][$index],
                    'description' => $_REQUEST['description'][$index],
                    'image2d' => $_REQUEST['image2d'][$index],
                    'imageMap' => $_REQUEST['imageMap'][$index],
                    'imageCheckin' => $_REQUEST['imageCheckin'][$index],
                    'images' => [],
                ];
                for ($imageIndex = 0; $imageIndex < (int)$_REQUEST['imageCount'][$index]; $imageIndex++) {
                    $contents['rooms'][$index]['images'][] = [
                        'filename' => $_REQUEST['imageFilenames'][$currentImageIndex + $imageIndex],
                        'ext' => $_REQUEST['imageExtentions'][$currentImageIndex + $imageIndex],
                        'id' => $_REQUEST['imageIds'][$currentImageIndex + $imageIndex],
                    ];
                }
                $currentImageIndex += (int)$_REQUEST['imageCount'][$index];
            }

            update_post_meta($post_id, 'contents', $contents);
        }

        /**
         * Foodカスタム固定ページ
         */
        function plugin_food_scripts() {
            // メディアモーダルを利用するために必要なスクリプトを追加
            wp_enqueue_media();

            // バンドル版のjQueryをロードしない
            //wp_deregister_script('jquery');

            // CSSロード
            wp_enqueue_style('glanstella-cabin-admin', plugins_url('/assets/css/style-admin.css', __FILE__), [], '1.0.0');

            // JSロード
            //wp_enqueue_script('jquery', plugins_url('/assets/jquery/js/jquery-3.6.0.min.js', __FILE__), [], '3.6.0', true);
            wp_enqueue_script('jquery-ui', plugins_url('/assets/jquery/js/jquery-ui.min.js', __FILE__), [ 'jquery' ], '1.13.1', true);
            wp_enqueue_script('glanstella-cabin-plugin', plugins_url('/assets/js/glanstella-cabin-plugin-food.js', __FILE__), [ 'jquery' ], '1.0.0');
        }

        // 編集機能カスタマイズ
        function create_food_type() {
            remove_post_type_support('page', 'title');
            remove_post_type_support('page', 'editor');
            add_action('add_meta_boxes', [ $this, 'add_food_meta_boxes' ]);
        }

        // 固定ページ編集画面カスタマイズ
        function add_food_meta_boxes() {
            add_meta_box(
                'foods', // 項目を識別するID
                'フードページ', // 項目のタイトル
                [$this, 'food_meta_boxes_callback'], // 項目の内容を出力する関数を指定
                'page', // 項目を追加するページを指定
                'normal',
                'high'
            );
        }

        // 項目の内容を出力する関数を作成
        function food_meta_boxes_callback($post) {
            $contents = get_post_meta($post->ID, 'contents')[0];
?>
                <table class="page-header">
                    <tr><th>大見出し</th><td><input type="text" name="header-title" value="<?= htmlspecialchars($contents['header']['title'], ENT_HTML5 | ENT_QUOTES); ?>"></td></tr>
                    <tr><th>説明文</th><td><textarea name="header-description"><?= $contents['header']['description']; ?></textarea></td></tr>
                </table><!-- .foods-header -->
                <div class="page-contents">
<?php
            if (is_array($contents['foods'])) {
                foreach ($contents['foods'] as $index => $food) {
?>
                    <div class="page-content">
                        <hr>
                        <button type="button" class="food-remove">このフードタイプを削除</button>
                        <input type="hidden" name="index[]" value="<?= $index; ?>">

                        <table class="admin-editor">
                            <tr><th>フードタイプ(英)</th><td><input type="text" name="english[]" value="<?= $food['english']; ?>"></td></tr>
                            <tr><th>フードタイプ(和)</th><td><input type="text" name="japanese[]" value="<?= $food['japanese']; ?>"></td></tr>
                            <tr><th>説明文</th><td><textarea name="description[]"><?= $food['description']; ?></textarea></td></tr>

                            <tr>
                                <th>イメージ</th>
                                <td>
                                    <hr>
                                    <div class="image-picker">
                                    <?php
                    if (is_array($food['images'])) {
?>
                                        <input type="hidden" name="imageCount[]" value="<?= count($food['images']); ?>">

                                        <div class="thumbnails">
<?php
                        foreach ($food['images'] as $image) {
?>
                                            <div class="images">
                                                <input type="hidden" name="imageFilenames[]" value="<?= $image['filename'] ?>">
                                                <input type="hidden" name="imageExtentions[]" value="<?= $image['ext']; ?>">
                                                <input type="hidden" name="imageIds[]" value="<?= $image['id']; ?>">

                                                <div class="image"><img src="<?= $image['filename'] ?>-320x320.<?= $image['ext']; ?>"><div class="caption">@1x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-640x640.<?= $image['ext']; ?>"><div class="caption">@2x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-960x960.<?= $image['ext']; ?>"><div class="caption">@3x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>.<?= $image['ext']; ?>"><div class="caption">@4x</div></div>
                                            </div><!-- .images -->
<?php
                        }
?>
                                        </div><!-- .thumbnails -->
<?php
                    }
?>
                                        <button type="button" class="select-images">画像を選択</button>

                                    </div><!-- .image-picker -->
                                </td>
                            </tr>
                        </table><!-- .admin-editor -->
                    </div><!-- .page-content -->
                    <?php
                }
            }
?>
                </div><!-- .page-contents -->
                <hr>
                <button type="button" id="food-add">フードタイプを追加</button>
<?php
        }

        function save_food_fields($post_id) {
            // ヘッダー情報保存
            $contents = [
                'header' => [ 'title' => $_REQUEST['header-title'], 'description' => $_REQUEST['header-description'] ],
                'foods' => [],
            ];
            // フードタイプ保存
            $currentImageIndex = 0;
            for ($index = 0; $index < count($_REQUEST['english']); $index++) {
                $contents['foods'][] = [
                    'english' => $_REQUEST['english'][$index],
                    'japanese' => $_REQUEST['japanese'][$index],
                    'description' => $_REQUEST['description'][$index],
                    'images' => [],
                ];
                for ($imageIndex = 0; $imageIndex < (int)$_REQUEST['imageCount'][$index]; $imageIndex++) {
                    $contents['foods'][$index]['images'][] = [
                         'filename' => $_REQUEST['imageFilenames'][$currentImageIndex + $imageIndex],
                         'ext' => $_REQUEST['imageExtentions'][$currentImageIndex + $imageIndex],
                         'id' => $_REQUEST['imageIds'][$currentImageIndex + $imageIndex],
                        ];
                }
                $currentImageIndex += (int)$_REQUEST['imageCount'][$index];
            }

            update_post_meta($post_id, 'contents', $contents);
        }

        /**
         * Galleryカスタム固定ページ
         */
        function plugin_gallery_scripts() {
            // メディアモーダルを利用するために必要なスクリプトを追加
            wp_enqueue_media();

            // バンドル版のjQueryをロードしない
            //wp_deregister_script('jquery');

            // CSSロード
            wp_enqueue_style('glanstella-cabin-admin', plugins_url('/assets/css/style-admin.css', __FILE__), [], '1.0.0');

            // JSロード
            //wp_enqueue_script('jquery', plugins_url('/assets/jquery/js/jquery-3.6.0.min.js', __FILE__), [], '3.6.0', true);
            wp_enqueue_script('jquery-ui', plugins_url('/assets/jquery/js/jquery-ui.min.js', __FILE__), [ 'jquery' ], '1.13.1', true);
            wp_enqueue_script('glanstella-cabin-plugin', plugins_url('/assets/js/glanstella-cabin-plugin-gallery.js', __FILE__), [ 'jquery' ], '1.0.0');
        }

        // 編集機能カスタマイズ
        function create_gallery_type() {
            remove_post_type_support('page', 'title');
            remove_post_type_support('page', 'editor');
            add_action('add_meta_boxes', [ $this, 'add_gallery_meta_boxes' ]);
        }

        // 固定ページ編集画面カスタマイズ
        function add_gallery_meta_boxes() {
            add_meta_box(
                'gallerys', // 項目を識別するID
                'ギャラリーページ', // 項目のタイトル
                [$this, 'gallery_meta_boxes_callback'], // 項目の内容を出力する関数を指定
                'page', // 項目を追加するページを指定
                'normal',
                'high'
            );
        }

        // 項目の内容を出力する関数を作成
        function gallery_meta_boxes_callback($post) {
            $contents = get_post_meta($post->ID, 'contents')[0];
?>
            <table class="page-header">
                <tr><th>大見出し</th><td><input type="text" name="header-title" value="<?= htmlspecialchars($contents['header']['title'], ENT_HTML5 | ENT_QUOTES); ?>"></td></tr>
                <tr><th>説明文</th><td><textarea name="header-description"><?= $contents['header']['description']; ?></textarea></td></tr>
            </table><!-- .foods-header -->
            <div class="page-contents">
                <div class="page-content">
                        <table class="admin-editor">
                            <tr>
                                <th>イメージ</th>
                                <td>
                                    <div class="image-picker">
                                        <div class="thumbnails">
<?php       if (is_array($contents['images'])) { ?>
<?php           foreach ($contents['images'] as $image) { ?>
                                            <div class="images">
                                                <input type="hidden" name="imageFilenames[]" value="<?= $image['filename'] ?>">
                                                <input type="hidden" name="imageExtentions[]" value="<?= $image['ext']; ?>">
                                                <input type="hidden" name="imageIds[]" value="<?= $image['id']; ?>">

<?php /*
                                                <div class="image"><img src="<?= $image['filename'] ?>-320x320.<?= $image['ext']; ?>"><div class="caption">@1x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-640x640.<?= $image['ext']; ?>"><div class="caption">@2x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-960x960.<?= $image['ext']; ?>"><div class="caption">@3x</div></div>
*/ ?>
                                                <div class="image"><img src="<?= $image['filename'] ?>.<?= $image['ext']; ?>"><div class="caption">@4x</div></div>
                                            </div><!-- .images -->
<?php           } ?>
<?php       } ?>
                                        </div><!-- .thumbnails -->

                                        <button type="button" class="select-images">画像を選択</button>
                                    </div><!-- .image-picker -->
                                </td>
                            </tr>
                        </table><!-- .admin-editor -->
                    </div><!-- .page-content -->
                </div><!-- .page-contents -->
<?php
        }

        function save_gallery_fields($post_id) {
            // ヘッダー情報保存
            $contents = [
                'header' => [ 'title' => $_REQUEST['header-title'], 'description' => $_REQUEST['header-description'] ],
                'images' => [],
            ];
            // 画像保存
            for ($index = 0; $index < count($_REQUEST['imageFilenames']); $index++) {
                $contents['images'][] = [
                    'filename' => $_REQUEST['imageFilenames'][$index],
                    'ext' => $_REQUEST['imageExtentions'][$index],
                    'id' => $_REQUEST['imageIds'][$index],
                ];
            }

            update_post_meta($post_id, 'contents', $contents);
        }

        /**
         * Stayカスタム固定ページ
         */
        function plugin_stay_scripts() {
            // メディアモーダルを利用するために必要なスクリプトを追加
            wp_enqueue_media();

            // バンドル版のjQueryをロードしない
            //wp_deregister_script('jquery');

            // CSSロード
            wp_enqueue_style('glanstella-cabin-admin', plugins_url('/assets/css/style-admin.css', __FILE__), [], '1.0.0');

            // JSロード
            //wp_enqueue_script('jquery', plugins_url('/assets/jquery/js/jquery-3.6.0.min.js', __FILE__), [], '3.6.0', true);
            wp_enqueue_script('jquery-ui', plugins_url('/assets/jquery/js/jquery-ui.min.js', __FILE__), [ 'jquery' ], '1.13.1', true);
            wp_enqueue_script('glanstella-cabin-plugin', plugins_url('/assets/js/glanstella-cabin-plugin-stay.js', __FILE__), [ 'jquery' ], '1.0.0');
        }

        // 編集機能カスタマイズ
        function create_stay_type() {
            remove_post_type_support('page', 'title');
            remove_post_type_support('page', 'editor');
            add_action('add_meta_boxes', [ $this, 'add_stay_meta_boxes' ]);
        }

        // 固定ページ編集画面カスタマイズ
        function add_stay_meta_boxes() {
            add_meta_box(
                'stays', // 項目を識別するID
                'おすすめの過ごし方ページ', // 項目のタイトル
                [$this, 'stay_meta_boxes_callback'], // 項目の内容を出力する関数を指定
                'page', // 項目を追加するページを指定
                'normal',
                'high'
            );
        }

        // 項目の内容を出力する関数を作成
        function stay_meta_boxes_callback($post) {
            $contents = get_post_meta($post->ID, 'contents')[0];
?>
                <table class="page-header">
                    <tr><th>大見出し</th><td><input type="text" name="header-title" value="<?= htmlspecialchars($contents['header']['title'], ENT_HTML5 | ENT_QUOTES); ?>"></td></tr>
                    <tr><th>説明文</th><td><textarea name="header-description"><?= $contents['header']['description']; ?></textarea></td></tr>
                </table><!-- .stays-header -->
                <div class="page-contents">
<?php
            if (is_array($contents['stays'])) {
                foreach ($contents['stays'] as $index => $stay) {
?>
                    <div class="page-content">
                        <hr>
                        <button type="button" class="stay-remove">この過ごし方を削除</button>
                        <input type="hidden" name="index[]" value="<?= $index; ?>">

                        <table class="admin-editor">
                            <tr><th>アンカー</th><td><input type="text" name="anchor[]" value="<?= $stay['anchor']; ?>"></td></tr>
                            <tr><th>過ごし方(英)</th><td><input type="text" name="english[]" value="<?= $stay['english']; ?>"></td></tr>
                            <tr><th>過ごし方(和)</th><td><input type="text" name="japanese[]" value="<?= $stay['japanese']; ?>"></td></tr>
                            <tr><th>説明文</th><td><textarea name="description[]"><?= $stay['description']; ?></textarea></td></tr>

                            <tr>
                                <th>イメージ</th>
                                <td>
                                    <hr>
                                    <div class="image-picker">
                                    <?php
                    if (is_array($stay['images'])) {
?>
                                        <input type="hidden" name="imageCount[]" value="<?= count($stay['images']); ?>">

                                        <div class="thumbnails">
<?php
                        foreach ($stay['images'] as $image) {
?>
                                            <div class="images">
                                                <input type="hidden" name="imageFilenames[]" value="<?= $image['filename'] ?>">
                                                <input type="hidden" name="imageExtentions[]" value="<?= $image['ext']; ?>">
                                                <input type="hidden" name="imageIds[]" value="<?= $image['id']; ?>">

                                                <div class="image"><img src="<?= $image['filename'] ?>-320x320.<?= $image['ext']; ?>"><div class="caption">@1x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-640x640.<?= $image['ext']; ?>"><div class="caption">@2x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>-960x960.<?= $image['ext']; ?>"><div class="caption">@3x</div></div>
                                                <div class="image"><img src="<?= $image['filename'] ?>.<?= $image['ext']; ?>"><div class="caption">@4x</div></div>
                                            </div><!-- .images -->
<?php
                        }
?>
                                        </div><!-- .thumbnails -->
<?php
                    }
?>
                                        <button type="button" class="select-images">画像を選択</button>

                                    </div><!-- .image-picker -->
                                </td>
                            </tr>
                        </table><!-- .admin-editor -->
                    </div><!-- .page-content -->
                    <?php
                }
            }
?>
                </div><!-- .page-contents -->
                <hr>
                <button type="button" id="stay-add">過ごし方を追加</button>
<?php
        }

        function save_stay_fields($post_id) {
            // ヘッダー情報保存
            $contents = [
                'header' => [ 'title' => $_REQUEST['header-title'], 'description' => $_REQUEST['header-description'] ],
                'stays' => [],
            ];
            // 過ごし方保存
            $currentImageIndex = 0;
            for ($index = 0; $index < count($_REQUEST['english']); $index++) {
                $contents['stays'][] = [
                    'anchor' => $_REQUEST['anchor'][$index],
                    'english' => $_REQUEST['english'][$index],
                    'japanese' => $_REQUEST['japanese'][$index],
                    'description' => $_REQUEST['description'][$index],
                    'images' => [],
                ];
                for ($imageIndex = 0; $imageIndex < (int)$_REQUEST['imageCount'][$index]; $imageIndex++) {
                    $contents['stays'][$index]['images'][] = [
                         'filename' => $_REQUEST['imageFilenames'][$currentImageIndex + $imageIndex],
                         'ext' => $_REQUEST['imageExtentions'][$currentImageIndex + $imageIndex],
                         'id' => $_REQUEST['imageIds'][$currentImageIndex + $imageIndex],
                        ];
                }
                $currentImageIndex += (int)$_REQUEST['imageCount'][$index];
            }

            update_post_meta($post_id, 'contents', $contents);
        }



        /**
         * FAQ系関数群
         */
        function plugin_faq_scripts() {
        }

        function create_faq_type() {
            // FAQ投稿タイプ生成
            register_post_type('faq', [
                'label' => 'FAQ',
                'labels' => [ 'name' => 'FAQ' ],
                'public' => true,
                'menu_position' => 5,
                'has_archive' => true,
                'taxonomies' => [ 'faq_category' ],
                'supports' => [ 'title', 'editor', 'slug' ],
                'rewrite' => [ 'slug' => 'faq', 'with_front' => false ],
                'show_in_rest' => true,
            ]);
            register_taxonomy('faq_category', 'faq', [
                'hierarchical' => false,
                'labels' => [ 'name' => 'カテゴリ' ],
                'show_ui' => true,
                'rewrite' => [
                    'slug' => 'faq', 'with_front' => true,
                ],
            ]);
        }
    }

    $gc = new Glanstella_Cabin();
    add_action('plugins_loaded', [ $gc, 'init_actions' ]);
}


add_filter( 'wp_calculate_image_srcset_meta', 'my_srcset_customize', 10, 3 );

function my_srcset_customize( $image_meta, $size_array, $image_src ) {
    var_dump($image_meta, $size_array, $image_src); die;
	$needle = '/apng-';
	if ( strpos( $image_src, $needle ) === false ) {
		return $image_meta;
	} else {
		return false;
	}
}
