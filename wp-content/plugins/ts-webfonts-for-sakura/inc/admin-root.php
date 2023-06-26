<?php
class TypeSquare_Admin_Root extends TypeSquare_Admin_Base
{
    private static $instance;
    private static $text_domain;
    private function __construct()
    {
    }


    public static function get_instance()
    {
        if (! isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c();
        }
        return self::$instance;
    }

    public function typesquare_post_metabox()
    {
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        if ('false' == $param['typesquare_themes']['show_post_form'] || ! $param['typesquare_themes']['show_post_form']) {
            return;
        }
        $post_type = array( 'post', 'page' );
        foreach ($post_type as $type) {
            add_meta_box('typesquare_post_metabox', __('TS Webfonts for SAKURA RS', self::$text_domain), array( $this, 'typesquare_post_metabox_inside' ), $type, 'advanced', 'low');
        }
    }

    public function typesquare_post_metabox_inside()
    {
        $html  = '';
        $html .= '<p>'. __('この記事に適用するフォントを選択してください', self::$text_domain) . '</p>';

        $html .= $this->_get_post_font_theme_selector();
        $html .= '<input type="hidden" name="typesquare_nonce_postmeta" id="typesquare_nonce_postmeta" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
        echo $html;
    }

    private function _get_post_font_theme_selector()
    {
        $html  = '';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $all_font_theme = $fonts->load_all_font_data();
        $selected_theme = $fonts->get_selected_post_fonttheme(get_the_ID());
        $option  = '';
        $option .= "<option value='false'>テーマを設定しない</option>";
        foreach ($all_font_theme as $key => $fonttheme) {
            $fonttheme_name = $this->get_fonts_text($fonttheme['name']);
            $font_text = $this->_get_fonttheme_text($fonttheme);
            $selected = '';
            if ($key === $selected_theme) {
                $selected = 'selected';
            }
            $option .= "<option value='{$key}' {$selected}>";
            $option .= "{$fonttheme_name} ( {$font_text} )";
            $option .= '</option>';
        }
        $html .= '<h3>'. __('フォントテーマから選ぶ', self::$text_domain) . '</h3>';
        $preview = <<<EOM
jQuery( document ).ready(function() {
	window.onload = function () {
		theme_preview_new();
	};

	jQuery('#choiceThemeNew').change(function() {
		theme_preview_new();
	});

	function theme_preview_new() {
		var select_val = jQuery('.font_theme_select_pre_new option:selected').val();
		if( select_val === "false") {
			jQuery('.pre_title').text("");
			jQuery('.pre_lead').text("");
			jQuery('.pre_body').text("");
			jQuery('.pre_bold').text("");
		} else {
			var val = document.getElementById("selected-get-" + select_val);
			var theme_data = JSON.parse(val.value);

			jQuery('#theme_preview').val(val);

			jQuery('.pre_title').text(theme_data.fonts.title);
			jQuery('.pre_title').css("font-family", `'\${theme_data.fonts.title}'`);

			jQuery('.pre_lead').text(theme_data.fonts.lead);
			jQuery('.pre_lead').css("font-family", `'\${theme_data.fonts.lead}'`);

			if (theme_data.fonts.content) {
				jQuery('.pre_body').text(theme_data.fonts.content);
				jQuery('.pre_body').css("font-family", `'\${theme_data.fonts.content}'`);
			} else {
				jQuery('.pre_body').text(theme_data.fonts.text);
				jQuery('.pre_body').css("font-family", `'\${theme_data.fonts.text}'`);
			}

			jQuery('.pre_bold').text(theme_data.fonts.bold);
			jQuery('.pre_bold').css("font-family", `'\${theme_data.fonts.bold}'`);
		}
	}
		});
EOM;
        $html = '<script>';
        $html .= $preview;
        $html .= '</script>';
        $html .= '<div id="choiceThemeNew">';
        $html .= "<select name='typesquare_fonttheme[theme]' class='font_theme_select_pre_new'>{$option}</select>";
        $html .= '<h3>プレビュー</h3>';
        $html .= '<div><p class="title">見出し：<p class="pre_title"></p></p></div>';
        $html .= '<div><p class="title">リード：<p class="pre_lead"></p></p></div>';
        $html .= '<div><p class="title">本文：<p class="pre_body"></p></p></div>';
        $html .= '<div><p class="title">太字：<p class="pre_bold"></p></p></div>';
        $html .= '<input type="hidden" id="theme_preview" />';
        foreach ($all_font_theme as $fonttheme_key => $fonttheme) {
            $html .= "<input type='hidden' id='selected-get-{$fonttheme_key}' value='" . json_encode($fonttheme) . "'>";
        }
        $html .= '</div>';
        return $html;
    }

    public function typesquare_save_post($post_id)
    {
        if (! isset($_POST['typesquare_nonce_postmeta'])) {
            return;
        }
        //Verify
        if (! wp_verify_nonce($_POST['typesquare_nonce_postmeta'], plugin_basename(__FILE__))) {
            return $post_id;
        }
        // if auto save
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // permission check
        if ('page' == $_POST['post_type']) {
            if (! current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (! current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }

        // save action
        $fonttheme = $_POST['typesquare_fonttheme'];
        $current_option = get_post_meta($post_id, 'typesquare_fonttheme');
        $fonts = TypeSquare_ST_Fonts::get_instance();
        if (isset($current_option[0])) {
            $current = $current_option[0];
        } else {
            $current = $fonttheme;
        }
        $font['theme'] = esc_attr($fonttheme['theme']);
        update_post_meta($post_id, 'typesquare_fonttheme', $font);
        return $post_id;
    }

    private function get_fonts_text($fonts)
    {
        if (is_array($fonts)) {
            $text_font = '';
            foreach ($fonts as $key => $font) {
                $text_font .= esc_attr($font);
                if (count($fonts) - 1 > $key) {
                    $text_font .= ' + ';
                }
            }
        } else {
            $text_font    = esc_attr($fonts);
        }
        return $text_font;
    }

    public function typesquare_admin_menu()
    {
        $param = $this->get_auth_params();
        $option_name = 'typesquare_auth';
        $nonce_key = TypeSquare_ST::OPTION_NAME;
        $auth_param = $this->get_auth_params();
        echo "<style type='text/css' rel='stylesheet'>";
        echo "</style>";
        echo "<div class='wrap'>";
        echo '<h2>'. __('TS Webfonts for SAKURA RS', self::$text_domain). '</h2>';
        do_action('typesquare_add_setting_before');
        echo '<hr />';
        echo '<span><h3 class="toggleText toggleAdvanced_font mTop20">'. __('投稿記事フォント設定', self::$text_domain). '<span class="advancedTriangle advancedTriangle_font">▼</span></h3></span>';
        echo "<div class='ts-custome_form_font hidden'>";
        echo $this->_get_post_font_form($auth_param);
        echo '</div>';
        echo '</div>';

        echo '<hr/>';
        echo '<span><h3 class="toggleText toggleAdvanced_site mTop20">'. __('サイトフォント設定', self::$text_domain). '<span class="advancedTriangle advancedTriangle_site">▼</span></h3></span>';
        echo "<div class='ts-custome_form_site hidden'>";
        echo $this->_get_site_font_form();
        echo '</div>';
        echo '<hr/>';
        echo '<span><h3 class="toggleText toggleAdvanced_article mTop20">'. __('カスタムテーマ編集', self::$text_domain). '<span class="advancedTriangle advancedTriangle_article">▼</span></h3></span>';
        echo "<div class='ts-custome_form_article hidden'>";
        echo '<div class="ts-custum_block">';
        echo $this->_get_font_theme_custom_form();
        echo '</div>';
        echo '</div>';
        do_action('typesquare_add_setting_after');
    }

    private function _get_post_font_form($auth_param)
    {
        $html = "<form method='post' action=''>";
        $html .= '<p>投稿記事に対するWebフォント適用方法を設定します。</p>';
        $html .=  '<div class="block_wrap">';
        $html .=  '<p class="block_title">'. __('投稿記事に適用するフォント設定', self::$text_domain). '</p>';
        $html .=  '<div class="label_wrapper">';
        $html .= '<label class="custum_form_ladio"><input name="fontThemeUseType" type="radio" value="1">指定しない';
        $html .= '<p class="setting_read">フォントテーマを適用しません。</p>';
        $html .= '</label>';
        $html .= '<label class="custum_form_ladio"><input name="fontThemeUseType" type="radio" value="2" class="radio_custum_font_theme">共通テーマ指定';
        $html .= '<p class="setting_read">全ての投稿に設定したフォントテーマが適用されます。</p>';
        $html .= '</label>';
        $html .= $this->_get_font_theme_form();
        $html .= '<label class="custum_form_ladio"><input name="fontThemeUseType" type="radio" value="3">個別テーマ指定';
        $html .= '<p class="setting_read">投稿ごとに設定したフォントテーマが適用されます。</p>';
        $html .= '</label>';
        $html .= '<label class="custum_form_ladio"><input name="fontThemeUseType" type="radio" value="4">直接指定（上級者向け）';
        $html .= '<p class="setting_read">CSSセレクターを指定して適用するウェブフォントを選べます。</p>';
        $html .= '</label>';
        $html .= $this->_get_font_target_form();

        $fonts = TypeSquare_ST_Fonts::get_instance();
        $fonttheme_params = $fonts->get_fonttheme_params();

        if (empty($auth_param['typesquare_auth']['fontThemeUseType'])) {
            if (empty($fonttheme_params['typesquare_themes']['font_theme']) || $fonttheme_params['typesquare_themes']['font_theme'] === "false") {
                $html .= '<input type="hidden" id="activeAdvanced_theme" value="1">';
            } else {
                $html .= '<input type="hidden" id="activeAdvanced_theme" value="2">';
            }
        } else {
            if (!empty($fonttheme_params['typesquare_themes']['font_theme']) && $auth_param['typesquare_auth']['fontThemeUseType'] === "1") {
                $html .= '<input type="hidden" id="activeAdvanced_theme" value="2">';
            } else {
                $html .= '<input type="hidden" id="activeAdvanced_theme" value="' . $auth_param['typesquare_auth']['fontThemeUseType'] . '">';
            }
        }

        $html .=  '</div>';
        $html .=  '</div>';
        $html .=  get_submit_button(__('投稿フォント設定を保存する', self::$text_domain));
        $html .= '</form>';
        return $html;
    }

    private function _get_auth_form($auth_param)
    {
        $html  = '';
        $nonce_key = TypeSquare_ST::OPTION_NAME;
        $html .= "<form method='post' action='' id='authForm'>";
        $html .= wp_nonce_field($nonce_key, self::MENU_ID, true, false);
        $html .= "<table class='widefat form-table'>";
        $html .= '<tbody>';
        $param = $this->get_auth_params();
        $option_name = 'typesquare_auth';
        foreach ($param['typesquare_auth_keys'] as $key => $title) {
            $html .= "<tr><td>";
            $name = "{$option_name}[{$key}]";
            $type = 'hidden';
            $name	= esc_attr($name);
            $id		= esc_attr($key);
            $value = "SAKURA";
            $html .= "<input
				name='{$name}'
				id='{$id}'
				value='{$value}'
				required
				type='{$type}'
				data-parsley-trigger='change'
				class='regular-text code'
			/>";
            $html .= '</td></tr>';
        }
        $html .= '</tbody>';
        $html .= '</div>';
        $html .= '</table>';
        if ('' !== $auth_param['typesquare_auth']['typesquare_id']) {
            $html .= '<div class="block_wrap">';
            $html .= "<table class='widefat form-table'>";
            $html .= '<tbody>';
            $html .= $this->_get_font_fade_form();
            $html .= $this->_get_auto_load_font_form();
            $html .= $this->_get_apply_to_hidden_form();
            $html .= $this->_get_apply_to_pseudo_form();
            $html .= '</tbody>';
            $html .= "</table>";
            $html .= '</div>';
        }

        $html .= $this->_update_font_list_form();
        $html .= get_submit_button(__('TypeSquare設定を保存する', self::$text_domain));

        $html .= '</form>';
        return $html;
    }

    private function _get_ad_area()
    {
        $html = '<script>';
        $endpoint = path_join(TS_PLUGIN_URL, 'inc/font.json');
        $html .= "var json_endpoint = '{$endpoint}';";
        $html .= "var current_font = false;";
        $html .= $script;
        $html .= '</script>';
        $html .= "<div class='ts-ad-area'>";
        $messages[] = __('・ご利用にはTypeSquareの会員登録が必要です (<a href="https://typesquare.com">https://typesquare.com</a>)', self::$text_domain);
        $messages[] = __('・利用プランによっては利用可能な書体数に上限がありますので、上限を超えて設定したフォントは配信されません。', self::$text_domain);
        $messages[] = '　'. __('・無料プラン：1書体', self::$text_domain);
        $messages[] = '　'. __('', self::$text_domain);
        $messages[] = '　'. __('・スタンダードIプラン：3書体', self::$text_domain);
        $html .= '<ul>';
        $html .= '<li style="padding-bottom: 5px;"><span href="#" class="toggleLimit toggleText">' . __('ご利用上の注意', self::$text_domain). '</span><span class="textMute elimitTriangl" style="float: right;">▼</span></li>';
        $html .= '<div id="ts-ad-area-messages" class="ts-hidden">';
        foreach ($messages as $message) {
            $html .= "<li>{$message}</li>";
        }
        $html .= "<p><a href='https://typesquare.com/ja/service/plan' target='_blank' class='button button-hero'>". __('→プランを見てみる', self::$text_domain) . '</a></p>';
        $html .= '</div>';
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '<div class="mTop30">';
        $html .= '<h3 class="mBottom10">'. __('ご利用方法', self::$text_domain). '</h3>';
        $html .= '<div>'. __('TypeSquare Webfontsについての内容を説明しています', self::$text_domain). '</div>';
        $html .= '<div>'. __('詳しくは', self::$text_domain). "<a href='https://blog.typesquare.com/archives/55354' target='_blank'>". __('こちら', self::$text_domain). '</a></div>';
        $html .= '</div>';

        return $html;
    }

    private function _get_font_fade_form()
    {
        $option_name = 'typesquare_fonttheme';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        $keys = $param['typesquare_themes_keys'];
        $html = "<tr><th>{$keys['fade_in']}</th><td>";
        $value = esc_attr($param['typesquare_themes']['fade_in']);
        if ($value) {
            $optional = 'checked';
        }

        $html .="<label class='switch__label' ><input name='{$option_name}[fade_in]'type='checkbox' class='switch__input' id='fade_in' value='1' ". checked($value, true, false). "/><span class='switch__content'></span><span class='switch__circle'></span></label><span>有効化する</span>";
        $html .= '</td></tr>';
        if ($value) {
            $state = 'ts-table-low';
        } else {
            $state = 'hidden';
        }
        $html .= "<tr id='hidden_time' class='{$state}'><th>{$keys['fade_time']}</th><td>";
        $value = esc_attr($param['typesquare_themes']['fade_time']);
        $optional = "size='5' maxlength='5'";
        $html .= "<input name='{$option_name}[fade_time]' type='text' id='fade_time' value='{$value}' class='code' {$optional}/>";
        $html .= __('ミリ秒(0〜10000の整数)', self::$text_domain);
        $html .= '</td></tr>';

        return $html;
    }

    private function _get_font_theme_form()
    {
        $option_name = 'typesquare_fonttheme';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        $html  = '';
        $html .= wp_nonce_field('ts_update_font_settings', 'ts_update_font_settings', true, false);
        $html .= '<div id="choiceTheme" class="font_custum_select">';
        $html .= "<select name='{$option_name}[font_theme]' class='font_theme_select_pre'>";
        $all_font_theme = $fonts->load_all_font_data();
        foreach ($all_font_theme as $fonttheme_key => $fonttheme) {
            $fonttheme_name = esc_attr($fonttheme['name']);
            $font_text = $this->_get_fonttheme_text($fonttheme);
            $selected	= '';
            if ($fonttheme_key == $param['typesquare_themes']['font_theme']) {
                $selected = 'selected';
            }
            $html .= "<option value='{$fonttheme_key}' {$selected}>";
            $html .= "{$fonttheme_name} ( {$font_text} )";
            $html .= '</option>';
        }
        $html .= '</select>';
        $html .= '<h3>プレビュー</h3>';
        $html .= '<div><p class="title">見出し：<p class="pre_title"></p></p></div>';
        $html .= '<div><p class="title">リード：<p class="pre_lead"></p></p></div>';
        $html .= '<div><p class="title">本文：<p class="pre_body"></p></p></div>';
        $html .= '<div><p class="title">太字：<p class="pre_bold"></p></p></div>';
        $html .= '<input type="hidden" id="theme_preview" />';
        foreach ($all_font_theme as $fonttheme_key => $fonttheme) {
            $html .= "<input type='hidden' id='selected-get-{$fonttheme_key}' value='" . json_encode($fonttheme) . "'>";
        }
        $html .= wp_nonce_field('ts_update_font_settings', 'ts_update_font_settings', true, false);

        $value = esc_attr($param['typesquare_themes']['show_post_form']) == "true" ? true : false;
        $html .= '</div>';
        $html .= '<input type="hidden" name="typesquare_nonce_postmeta" id="typesquare_nonce_postmeta" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
        return $html;
    }

    private function _get_font_theme_custom_form()
    {
        $option_name = 'typesquare_fonttheme';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        if (isset($_POST['typesquare_fonttheme']['font_theme']) &&  $_POST['typesquare_fonttheme']['font_theme'] !== 'new') {
            $param['typesquare_themes']['font_theme'] = $_POST['typesquare_fonttheme']['font_theme'];
        }
        $html  = '';
        $html .= "<form method='post' action='' id='custmeFontForm' class='b__font_theme_form'>";
        $html .= '<p>お好きなフォントを組み合わせてテーマを作成できます。また、作成したテーマの編集ができます。</p>';
        $html .= wp_nonce_field('ts_update_font_settings', 'ts_update_font_settings', true, false);
        $html .= '<div class="font_custum_select">';
        $html .= "<select id='fontThemeSelect' name='{$option_name}[font_theme]'>";
        $html .= "<option value='new' selected>新しくテーマを作成する</option>";
        $coustam_font_theme = $fonts->load_coustam_font_data();
        if (!empty($coustam_font_theme)) {
            foreach ($coustam_font_theme as $fonttheme_key => $fonttheme) {
                $fonttheme_name = esc_attr($fonttheme['name']);
                $font_text = $this->_get_fonttheme_text($fonttheme);
                $selected	= '';
                $html .= "<option value='{$fonttheme_key}' {$selected}>";
                $html .= "{$fonttheme_name} ( {$font_text} )";
                $html .= '</option>';
            }
        }
        $html .= '</select>';
        if (!empty($coustam_font_theme)) {
            foreach ($coustam_font_theme as $fonttheme_key => $fonttheme) {
                $html .= "<input type='hidden' id='{$fonttheme_key}' value='" . json_encode($fonttheme) . "'>";
            }
        }
        $html .= '</div>';

        $html .= $this->_get_custome_font_theme_list_form();
        $html .= "<table>";
        $html .= "<th>";
        $html .= get_submit_button(__('テーマを保存する', self::$text_domain), 'primary', 'fontThemeUpdateButton');
        $html .= "</th>";
        $html .= "<th>";
        $style = array("style"=>"margin-top:15px; display:none;");
        $html .= get_submit_button(__('テーマを削除する', self::$text_domain), 'delete', 'fontThemeDeleteButton', null, $style);
        $html .= "</th>";
        $html .= "</table>";
        $html .= '<input type="hidden" name="typesquare_nonce_postmeta" id="typesquare_nonce_postmeta" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
        $html .= '</form>';
        return $html;
    }

    private function _get_custome_font_theme_list_form()
    {
        $html  = '';
        $html .= "<input type='hidden' name='ts_edit_mode' value='new' />";
        $html .= '<input type="hidden" id="ts_custome_theme_id" name="typesquare_custom_theme[id]" value="' . uniqid() . '" />';
        $html .= "<div id='customeFontThemeForm'>";
        $html .= wp_nonce_field('ts_update_font_name_setting', 'ts_update_font_name_setting', true, false);
        $html .= "<table class='widefat' style='border: 0px'>";
        $html .= '<tbody>';
        $html .= "<tr><th width='240px' style='padding-left:0;'>テーマタイトル</th><td>";
        $html .= "<input type='hidden' id='current_custome_font_name' name='typesquare_custom_theme[name]' value=''/>";
        $html .= "<input type='text' id='custome_font_name' name='typesquare_custom_theme[name]' value='' maxlength='16' style='width:50%;' required/>";
        $html .= '</td></tr>';
        $html .= $this->_get_site_font_form_tr("見出し", "", "typesquare_custom_theme[fonts][title][type]");
        $html .= $this->_get_site_font_form_tr("リード", "", "typesquare_custom_theme[fonts][lead][type]");
        $html .= $this->_get_site_font_form_tr("本文", "", "typesquare_custom_theme[fonts][text][type]");
        $html .= $this->_get_site_font_form_tr("太字", "", "typesquare_custom_theme[fonts][bold][type]");
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= "<div id='ts-react-search-font'></div>";
        $html .= "</div>";
        $font_list = array();
        $html .= $this->_get_script($font_list);
        return $html;
    }

    private function _get_site_font_form()
    {
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $value = $fonts->get_site_font_setting();
        $html = "<form method='post' action='' id='siteFontForm'>";
        $html .= '<p>タイトルなど、ウェブサイト共通部分のフォント設定です</p>';
        $html .= '<table class="widefat form-table">';
        $html .= '<tbody>';
        if (is_array($value)) {
            $html .= $this->_get_site_font_form_tr("サイトタイトル", $value['title_fontname'], "title_fontname");
            $html .= $this->_get_site_font_form_tr("サイトキャッチコピー", $value['catchcopy_fontname'], "catchcopy_fontname");
            $html .= $this->_get_site_font_form_tr("ウィジェットタイトル", $value['widget_title_fontname'], "widget_title_fontname");
            $html .= $this->_get_site_font_form_tr("ウィジェット", $value['widget_fontname'], "widget_fontname");
        } else {
            $html .= $this->_get_site_font_form_tr("サイトタイトル", "", "title_fontname");
            $html .= $this->_get_site_font_form_tr("サイトキャッチコピー", "", "catchcopy_fontname");
            $html .= $this->_get_site_font_form_tr("ウィジェットタイトル", "", "widget_title_fontname");
            $html .= $this->_get_site_font_form_tr("ウィジェット", "", "widget_fontname");
        }
        $html .= '</tbody>';
        $html .= "</table>";
        $html .= get_submit_button(__('サイトフォント設定を保存する', self::$text_domain));
        $html .= wp_nonce_field('ts_update_site_font_settings', 'ts_update_site_font_settings', true, false);
        $html .= '</form>';
        return $html;
    }

    private function _get_site_font_form_tr($title, $value, $input_name)
    {
        $html = "<tr><th style='padding-left:0;'><span>{$title}</span></th>";
        $html .= '<td class="font_table_td">';
        $html .= '<div class="w_font_select">';
        $html .= "<input class='fontlist_input' autocomplete='off' value='{$value}' style='font-family: {$value}' placeholder='未設定'/>";
        $html .= "<div class='w_fontlist b_def_fontlist'></div>";
        $html .= "</div>";
        $html .= "</td><input value='{$value}' type='hidden' name='{$input_name}' id='fontlist_select' class='fontlist_select'/></tr>";
        return $html;
    }

    private function _get_script($font_list)
    {
        $vars  = "var form_id = '#". self::MENU_FONTTHEME. "';";
        $vars .= "var notify_text = '". __('フォントを１種類以上選択してください。', self::$text_domain). "';";
        $vars .= "var unique_id ='". uniqid() ."';";
        $options = get_option('typesquare_custom_theme');
        $vars .= "var option_font_list = ". json_encode($options) .";";
        $vars .= "var plugin_base = '".wp_create_nonce(plugin_basename(__FILE__))."';";
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $all_font_theme = $fonts->load_all_font_data();
        $vars .= 'var all_font_list = '. json_encode($all_font_theme) .';';
        $script = <<<EOM
{$vars}
jQuery( document ).ready(function() {
	jQuery( form_id ).submit(function() {
		var title = jQuery( 'select[name="typesquare_custom_theme[fonts][title][font]"]' ).val();
		var lead = jQuery( 'select[name="typesquare_custom_theme[fonts][lead][font]"]' ).val();
		var text = jQuery( 'select[name="typesquare_custom_theme[fonts][text][font]"]' ).val();
		var bold = jQuery( 'select[name="typesquare_custom_theme[fonts][bold][font]"]' ).val();
		if (
			title === 'false' &&
			lead === 'false' &&
			text === 'false' &&
			bold === 'false'
		) {
			alert( notify_text );
			return false;
		}
	});
});
EOM;
        $html = '<script>';
        $endpoint = path_join(TS_PLUGIN_URL, 'inc/font.json');
        $html .= "var json_endpoint = '{$endpoint}';";
        if ($font_list) {
            $html .= "var current_font = ". json_encode($font_list) .';';
        } else {
            $html .= "var current_font = false;";
        }
        $html .= $script;
        $html .= '</script>';
        return $html;
    }

    private function _get_fonttheme_text($fonttheme)
    {
        $font_text = '';
        if (isset($fonttheme['fonts']['title'])) {
            $font_text .= __('見出し：', self::$text_domain);
            $font_text .= $this->get_fonts_text($fonttheme['fonts']['title']);
            $font_text .= ',';
        }
        if (isset($fonttheme['fonts']['lead'])) {
            $font_text .= __('リード：', self::$text_domain);
            $font_text .= $this->get_fonts_text($fonttheme['fonts']['lead']);
            $font_text .= ',';
        }
        if (isset($fonttheme['fonts']['content'])) {
            $font_text .= __('本文：', self::$text_domain);
            $font_text .= $this->get_fonts_text($fonttheme['fonts']['content']);
            $font_text .= ',';
        }
        if (isset($fonttheme['fonts']['text'])) {
            $font_text .= __('本文：', self::$text_domain);
            $font_text .= $this->get_fonts_text($fonttheme['fonts']['text']);
            $font_text .= ',';
        }
        if (isset($fonttheme['fonts']['bold'])) {
            $font_text .= __('太字：', self::$text_domain);
            $font_text .= $this->get_fonts_text($fonttheme['fonts']['bold']);
        }
        $font_text = rtrim($font_text, ',');
        $font_text = str_replace(",", " / ", $font_text);
        return $font_text;
    }

    private function _get_font_target_form()
    {
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $array_input = $fonts->get_font_pro_setting();
        $html = "<div class='b__font_target_form'>";
        $html .= "<table class='widefat form-table'>";
        $html .= '<thead>';
        $html .= "<tr><th style='width: 25%; padding-left: 45px;'>フォント選択</th><th style='width: 75%; padding-left: 14px;'>適用箇所(CSSセレクターで指定)</th></tr>";
        $html .= '</thead>';
        $html .= "<tbody class='cls_tb'>";

        if (!empty($array_input)) {
            $i = 0;
            foreach ($array_input as $key => $value) {
                $i++;
                $html .= "<tr id='font_setting'><td>";
                $html .= "<div class='cls_delete_btn cls_delete_btn_selected'>×</div>";
                $html .= "<input id='fontlist_input' class='fontlist_input' autocomplete='off' value='{$value['fontlist_fontname']}' style='font-family: {$value['fontlist_fontname']}'/>";
                $html .= "<div class='w_fontlist b_def_fontlist'></div>";
                $html .= "</td>";
                $html .= "<td class='add_class_td'><input type='text' class='class_input' value=''/><button type='button' id='add_box' class='add_box'>追加</button>";

                $cls_name = $value['fontlist_cls'];
                foreach ($cls_name as $cls_value) {
                    $html .= "<p class='add_class_label'>{$cls_value}　×";
                    $html .= "<input name='fontlist_cls{$i}[]' type='hidden' value='{$cls_value}' />";
                    $html .= "</p>";
                };

                $html .= "</td>";
                $html .= "<input value='{$value['fontlist_fontname']}' type='hidden' name='fontlist_fontname{$i}' id='fontlist_select' class='fontlist_select'/>";
                $html .= "</tr>";
            };
        } else {
            $html .= "<tr id='font_setting'><td>";
            $html .= "<div class='cls_delete_btn cls_delete_btn_selected'>×</div>";
            $html .= "<input id='fontlist_input' class='fontlist_input' autocomplete='off' placeholder='未設定'>";
            $html .= "<div class='w_fontlist'><ul class='font_select_menu'></ul></div>";
            $html .= "</td>";
            $html .= "<td class='add_class_td'><input type='text' class='class_input' value=''/><button type='button' id='add_box' class='add_box'>追加</button></td>";
            $html .= "<input value='' type='hidden' name='fontlist_fontname1' id='fontlist_select' class='fontlist_select'/>";
            $html .= "</tr>";
        };

        $html .= "<tr id='addbtn_tr'><td>";
        $html .= "<button type='button' id='input_add_btn'>+</button>";
        $html .= "</td></tr>";
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= wp_nonce_field('ts_update_font_pro_settings', 'ts_update_font_pro_settings', true, false);
        return $html;
    }

    //フォント自動読み込み設定
    private function _get_auto_load_font_form()
    {
        $option_name = 'typesquare_fonttheme';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        $keys = $param['typesquare_themes_keys'];
        $html = "<tr><th>{$keys['auto_load_font']}</th><td>";
        $value = esc_attr($param['typesquare_themes']['auto_load_font']);
        if ($value) {
            $optional = 'checked';
        }
        $html .="<label class='switch__label'><input  name='{$option_name}[auto_load_font]'type='checkbox' class='switch__input' id='auto_load_font' value='1' ". checked($value, true, false). "/><span class='switch__content'></span><span class='switch__circle'></span></label><span>有効化する</span>";
        $html .= '</td></tr>';

        return $html;
    }

    // 疑似要素フォント読込
    private function _get_apply_to_pseudo_form()
    {
        $option_name = 'typesquare_fonttheme';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        $keys = $param['typesquare_themes_keys'];
        $html = "<tr><th>{$keys['apply_to_pseudo']}</th><td>";
        $value = esc_attr($param['typesquare_themes']['apply_to_pseudo']);
        if ($value) {
            $optional = 'checked';
        }
        $html .="<label class='switch__label'><input  name='{$option_name}[apply_to_pseudo]'type='checkbox' class='switch__input' id='apply_to_pseudo' value='1' ". checked($value, true, false). "/><span class='switch__content'></span><span class='switch__circle'></span></label><span>有効化する</span>";
        $html .= '</td></tr>';

        return $html;
    }

    // 非表示要素フォント読込
    private function _get_apply_to_hidden_form()
    {
        $option_name = 'typesquare_fonttheme';
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $param = $fonts->get_fonttheme_params();
        $keys = $param['typesquare_themes_keys'];
        $html = "<tr><th>{$keys['apply_to_hidden']}</th><td>";
        $value = esc_attr($param['typesquare_themes']['apply_to_hidden']);
        if ($value) {
            $optional = 'checked';
        }
        $html .="<label class='switch__label'><input  name='{$option_name}[apply_to_hidden]'type='checkbox' class='switch__input' id='apply_to_hidden' value='1' ". checked($value, true, false). "/><span class='switch__content'></span><span class='switch__circle'></span></label><span>有効化する</span>";
        $html .= '</td></tr>';

        return $html;
    }

    private function _update_font_list_form()
    {
        $fonts = TypeSquare_ST_Fonts::get_instance();
        $font_file_path = path_join(TS_PLUGIN_PATH, 'inc/font.json');
        $settings_timezone = get_option('timezone_string');
        date_default_timezone_set($settings_timezone);
        $param = date("y/m/d H:i:s", filemtime($font_file_path));
        $html  = '';
        $html .= '<div class="block_wrap">';
        $html .= '<div>';
        $html .= '<h3 class="block_title">'. __('フォントリストの更新', self::$text_domain). '</h3>';
        $html .= '</div>';
        $html .= "<table class='widefat form-table'>";
        $html .= '<thead>';
        $html .= "<tr></tr>";
        $html .= '</thead>';
        $html .= "<tbody>";
        $html .= "<tr><td style='width: 1%;' class='fontlist_update'>".get_submit_button(__('フォントリスト更新', self::$text_domain), null, 'updateFontListButton', null)."</td>";
        $html .= "<td class='update_msg'>最終更新日: ".$param."</td></tr>";
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '<input type="hidden" name="update_font_list" id="update_font_list" value="off" />';
        $html .= wp_nonce_field('ts_update_font_list', 'ts_update_font_list', true, false);
        $html .= '</div>';
        return $html;
    }
}