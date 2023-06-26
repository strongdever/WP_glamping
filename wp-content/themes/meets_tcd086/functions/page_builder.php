<?php

// ページビルダーフィールド情報取得
function get_page_builder_fields() {
/*
	// layout
	array(
		'name'          => __('1カラムレイアウト', 'tcd-w'),
		'id'            => 'one_column',
		'before_fields' => '',      // フィールド前説明
		'after_fields'  => '',      // フィールド後説明

		// フィールド
		'fields'    => array(
			array(
				'name'          => '',  // for label/headline
				'id'            => '',  // for id and name
				'desc'          => '',  // 説明
				'type'          => 'text',
				'class'         => '',
				'std'           => '',
				'options'       => array(),
				'attribute'     => '',
				'placeholder'   => '',
				'before_save_function'  => null,	// 入力値保存前に入力値に対して実行する関数
				'before_save_filter'    => null		// 入力値保存前に入力値に対して実行するフィルター
			),
			array(
			),
		),

		// リピーターフィールド
		'repeater_fields'    => array(
			array(
			),
		)

	),


対応type

画像選択: 'image','media'
text; 'text'
リッチエディタ―: 'editor','richeditor','tinymce'
テキストエリア: 'textarea'
セレクト: 'select'
ラジオ: 'radio'
チェックボックス: 'checkbox','checkboxes'
hidden: 'hidden'
その他: 'email','url','numeric','tel'等のhtml5対応のinput type属性

ボックス表示開始: 'box_inner'
HTML表示: 'html' descをそのまま出力します。

*/

	// 1～4カラムフィールドを生成
	$column_fields = array();

	for ($i = 1; $i <= 4; $i++) {
		$column_fields[$i] = array();
		for ($j = 1; $j <= $i; $j++) {
			// 1カラムの場合はbox_innerなし
			if ($i == 1) {
				$box_inner = array();
			} else {
				$box_inner = array(
					array(
						'name'      => __('Colmun', 'tcd-w').$j,
						'type'      => 'box_inner'
					)
				);
			}

			$column_fields[$i] = array_merge($column_fields[$i], $box_inner, array(
				array(
					'name'      => __('Image', 'tcd-w'),
					'id'        => 'image'.$j,
					'type'      => 'image'
				),
				array(
					'name'      => __('Image position', 'tcd-w'),
					'id'        => 'image_type'.$j,
					'type'      => 'radio',
					'std'       => 'type1',
					'options'   => array(
						array('name' => __('Show at top', 'tcd-w'), 'value' => 'type1'),
						array('name' => __('Show at bottom', 'tcd-w'), 'value' => 'type2')
					)
				),
				array(
					'name'      => __('Link URL for image', 'tcd-w'),
					'id'        => 'link'.$j,
					'type'      => 'text'
				),
				array(
					'name'      => __('Link target', 'tcd-w'),
					'id'        => 'target_blank'.$j,
					'type'      => 'checkbox',
					'options'   => array(
						array('name' => __('Use target blank for this link', 'tcd-w'), 'value' => 'on')
					)
				),
				array(
					'name'      => __('Headline', 'tcd-w'),
					'id'        => 'headline'.$j,
					'type'      => 'text'
				),
				array(
					'name'      => __('Headline alignment', 'tcd-w'),
					'id'        => 'headline_align'.$j,
					'type'      => 'checkbox',
					'options'   => array(
						array('name' => __('Center align headline', 'tcd-w'), 'value' => 'on')
					)
				),
				array(
					'name'      => __('Description', 'tcd-w'),
					'id'        => 'content'.$j,
					'type'      => 'editor'
				)
			));
		}
	}

	// フィールド配列
	$page_builder_fields = array(
		// 1カラムレイアウト
		array(
			'name'      =>  __('1 column layout', 'tcd-w'),
			'id'        => 'one_column',
			'fields'    => $column_fields[1]
		),

		// 2カラムレイアウト
		array(
			'name'      =>  __('2 column layout', 'tcd-w'),
			'id'        => 'two_column',
			'fields'    => $column_fields[2]
		),

		// 3カラムレイアウト
		array(
			'name'      =>  __('3 column layout', 'tcd-w'),
			'id'        => 'three_column',
			'fields'    => $column_fields[3]
		),

		// 4カラムレイアウト
		array(
			'name'      =>  __('4 column layout', 'tcd-w'),
			'id'        => 'four_column',
			'fields'    => $column_fields[4]
		),

		// 画像リスト
		array(
			'name'      =>  __('Image list', 'tcd-w'),
			'id'        => 'image_list',
			'fields'    => array(
				array(
					'name'      => __('Image1', 'tcd-w'),
					'id'        => 'list_image1',
					'type'      => 'image'
				),
				array(
					'name'      => __('Image2', 'tcd-w'),
					'id'        => 'list_image2',
					'type'      => 'image'
				),
				array(
					'name'      => __('Image3', 'tcd-w'),
					'id'        => 'list_image3',
					'type'      => 'image'
				),
				array(
					'name'      => __('Image4', 'tcd-w'),
					'id'        => 'list_image4',
					'type'      => 'image'
				),
				array(
					'name'      => __('Image5', 'tcd-w'),
					'id'        => 'list_image5',
					'type'      => 'image'
				),
				array(
					'name'      => __('Image6', 'tcd-w'),
					'id'        => 'list_image6',
					'type'      => 'image'
				)
			)
		),

		// キャッチフレーズ
		array(
			'name'      =>  __('Catchphrase', 'tcd-w'),
			'id'        => 'catchphrase_set',
			'fields'    => array(
				array(
					'name'      => __('Catchphrase', 'tcd-w'),
					'id'        => 'catchphrase_title',
					'type'      => 'textarea'
				),
				array(
					'name'      => __('Font size of catchphrase', 'tcd-w'),
					'id'        => 'catchphrase_title_font_size',
					'std'       => '30',
					'type'      => 'text'
				),
				array(
					'name'      => __('Description under catchphrase', 'tcd-w'),
					'id'        => 'catchphrase_desc',
					'type'      => 'textarea'
				),
				array(
					'name'      => __('Font size of description', 'tcd-w'),
					'id'        => 'catchphrase_desc_font_size',
					'std'       => '14',
					'type'      => 'text'
				)
			)
		),

		// Google Map
		array(
			'name'      =>  __('Google Map', 'tcd-w'),
			'id'        => 'google_map',
			'fields'    => array(
				array(
					'name'      => __('Google map type', 'tcd-w'),
					'id'        => 'map_type',
					'type'      => 'radio',
					'std'       => 'type1',
					'options'   => array(
						array('name' => __('Use Google map iframe code', 'tcd-w'), 'value' => 'type1'),
						array('name' => __('Use TCD Google Maps plugin', 'tcd-w'), 'value' => 'type2')
					)
				),
				array(
					'name'      => __('Google map iframe code', 'tcd-w'),
					'id'        => 'map_code1',
					'type'      => 'textarea'
				),
				array(
					'name'      => __('TCD Google Maps plugin short code', 'tcd-w'),
					'id'        => 'map_code2',
					'type'      => 'textarea'
				)
			)
		),

		// スライダー
		array(
			'name'      =>  __('Slider', 'tcd-w'),
			'id'        => 'slider',
			'repeater_fields'    => array(
				array(
					'name'      => __('Image', 'tcd-w'),
					'id'        => 'image',
					'type'      => 'image'
				),
				array(
					'name'      => __('Link URL for image', 'tcd-w'),
					'id'        => 'link',
					'type'      => 'text'
				),
				array(
					'name'      => __('Link target', 'tcd-w'),
					'id'        => 'target_blank',
					'type'      => 'checkbox',
					'options'   => array(
						array('name' => __('Use target blank for this link', 'tcd-w'), 'value' => 'on')
					)
				)
			)
		),

		// タブ
		array(
			'name'      =>  __('Tab', 'tcd-w'),
			'id'        => 'tab',
			'repeater_fields'    => array(
				array(
					'name'      => __('Name of this tab', 'tcd-w'),
					'id'        => 'tab_name',
					'type'      => 'text',
					'class'     => 'index_label'
				),
				array(
					'name'      => __('Headline', 'tcd-w'),
					'id'        => 'headline',
					'type'      => 'text'
				),
				array(
					'name'      => __('Description', 'tcd-w'),
					'id'        => 'content',
					'type'      => 'editor'
				)
			)
		)

	);

	return apply_filters('get_page_builder_fields', $page_builder_fields);
}

// フィールドをループしてフォーム出力
function render_page_builder_fields($fields, $field_input_id, $field_input_name, $post_id = -1) {
	// box_innerフラグ
	$box_inner = -1;

	// フォームフィールドをループして出力
	foreach ($fields as $field) {
		if (empty($field['type'])) continue;

		// box_innerオープン
		if ($field['type'] == 'box_inner') {
			// box_innerオープンしていれば閉じる
			if ($box_inner == 1) {
				echo '</div>'."\n"; // .pb_layout_box_inner
				$box_inner = 0;
			}

			// 最初のbox_innerオープン
			if ($box_inner == -1) {
				echo '<div class="pb_layout_box_wrap clearfix">'."\n";
			}

			if (empty($field['class'])) {
				$field['class'] = '';
			} elseif (is_array($field['class'])) {
				$field['class'] = implode(' ', $field['class']);
			}

			echo '<div class="pb_layout_box_inner '.$field['class'].'">'."\n";
			echo '<h4 class="pb_layout_box_headline">'.esc_html($field['name']).'</h4>'."\n";

			$box_inner = 1;
			continue;
		}

		// 値読み込み
		$value = null;
		if ($post_id && $post_id > 0 && !empty($field['id'])) {
			$value = get_post_meta($post_id, $field_input_id.'_'.$field['id'], true);
		}

		// input出力
		render_page_builder_field($field, $field_input_id.'_'.$field['id'], $field_input_name.'_'.$field['id'], $value);
	}

	// box_innerオープンしていれば閉じる
	if ($box_inner == 1) {
		echo '</div>'."\n"; // .pb_layout_box_inner
		echo '</div>'."\n"; // .pb_layout_box_wrap
	}

}

// 単体フィールド input出力
function render_page_builder_field($field, $field_input_id, $field_input_name, $field_value = null) {
	if (empty($field['type'])) {
		$field['type'] = 'text';
	}

	if (empty($field['id'])) {
		if ($field['type'] != 'html') {
			$field['id'] = '';
		} else {
			return false;
		}
	}

	$add_attr = '';

	if (is_null($field_value) && !empty($field['std'])) {
		$field_value = $field['std'];
	}

	if (!empty($field['rows']) && is_numeric($field['rows'])) {
		$rows = $field['rows'];
	} else {
		$rows = 0;
	}

	if (!isset($field['class'])) {
		$field['class'] = '';
	} elseif (is_array($field['class'])) {
		$field['class'] = implode(' ', $field['class']);
	}

	if (in_array($field['type'], array('textarea', 'text', 'password', 'number', 'email', 'url', 'tel', 'date', 'select'))) {
		if (empty($field['class'])) {
			$field['class'] = 'widefat';
		} elseif (strpos($field['class'], 'widefat') === false) {
			$field['class'] .= ' widefat';
		}
	}

	if (!empty($field['attribute'])) {
		if (is_array($field['attribute'])) {
			$attr = array();
			foreach ($field['attribute'] as $key => $value) {
				if (is_int($key)) {
					$add_attr .= ' '.$value;
				} elseif (is_string($value)) {
					$add_attr .= ' '.$key.'="'.esc_attr($value).'"';
				}
			}
		} elseif (is_string($field['attribute'])) {
			$add_attr .= ' '.trim($field['attribute']);
		}
	}

	if (!empty($field['placeholder'])) {
		$add_attr .= ' placeholder="'.esc_attr($field['placeholder']).'"';
	}

	echo '<div class="pb_input_area pb_input_area-'.$field['id'].'">';

	if ($field['type'] != 'hidden' && !empty($field['name'])) {
		echo '<h4 class="headline">'.esc_html($field['name']).'</h4>';
	}

	echo '<div class="input input-'.$field['type'].' input-'.$field['id'].'">';

	if (!empty($field['desc']) && $field['type'] != 'html') {
		echo '<p class="desc" style="color:#999;">'.$field['desc'].'</p>';
	}

	switch ($field['type']) {
		case 'html':
			if (!empty($field['desc'])) {
				echo $field['desc'];
			}
			break;

		case 'image':
		case 'media':
			echo '<p>';
			// 第1引数にはカスタムフィールドキーを渡す必要がある
			mlcf_media_form($field_input_id, $field['name']);
			echo '</p>';
			break;

		case 'editor':
		case 'richeditor':
		case 'tinymce':
			if ($rows <= 0) {
				$rows = 10;
			}
			wp_editor($field_value, $field_input_id, array(
				'textarea_name' => $field_input_name,
				'textarea_rows' => $rows
			));
			break;

		case 'textarea':
			if ($rows <= 0) {
				$rows = 8;
			}
			echo '<textarea id="'.esc_attr($field_input_id).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" cols="40" rows="'.$rows.'" '.$add_attr.'>'.$field_value.'</textarea>';

			break;

		case 'select':
			if (!empty($field['options']) && is_array($field['options'])) {
				echo '<select id="'.esc_attr($field_input_id).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'"'.$add_attr.'>';
				echo '<option value=""></option>';
				foreach ($field['options'] as $field_option) {
					$selected = '';
					if (isset($field_option['name']) && isset($field_option['value'])) {
						if ($field_option['value'] == $field_value) {
							$selected .= ' selected="selected"';
						}
						echo '<option value="'.esc_attr($field_option['value']).'"'.$selected.'>'.esc_html($field_option['name']).'</option>';
					} elseif (isset($field_option['name'])) {
						if ($field_option['name'] == $field_value) {
							$selected = ' selected="selected"';
						}
						echo '<option value="'.esc_attr($field_option['name']).'"'.$selected.'>'.esc_html($field_option['name']).'</option>';
					} elseif (isset($field_option['value'])) {
						if ($field_option['value'] == $field_value) {
							$selected = ' selected="selected"';
						}
						echo '<option value="'.esc_attr($field_option['value']).'"'.$selected.'>'.esc_html($field_option['value']).'</option>';
					} elseif (is_string($field_option)) {
						if ($field_option == $field_value) {
							$selected = ' selected="selected"';
						}
						echo '<option value="'.esc_attr($field_option).'"'.$selected.'>'.esc_html($field_option).'</option>';
					}
				}
				echo '</select>';
			}
			break;

		case 'radio':
			if (!empty($field['options']) && is_array($field['options'])) {
				echo '<ul>';
				foreach ($field['options'] as $field_option_key => $field_option) {
					$label_class = '';
					$checked = '';
					if (isset($field_option['name']) && isset($field_option['value'])) {
						if ($field_option['value'] == $field_value) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="radio" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option['value']).'"'.$add_attr.$checked.' />'.esc_html($field_option['name']).'</label></li>';
					} elseif (isset($field_option['name'])) {
						if ($field_option['name'] == $field_value) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="radio" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option['name']).'"'.$add_attr.$checked.' />'.esc_html($field_option['name']).'</label></li>';
					} elseif (isset($field_option['value'])) {
						if ($field_option['value'] == $field_value) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="radio" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option['value']).'"'.$add_attr.$checked.' />'.esc_html($field_option['value']).'</label></li>';
					} elseif (is_string($field_option)) {
						if ($field_option == $field_value) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="radio" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option).'"'.$add_attr.$checked.' />'.esc_html($field_option).'</label></li>';
					}
				}
				echo '</ul>';
			}
			break;

		case 'checkbox':
		case 'checkboxes':
			if (!empty($field['options']) && is_array($field['options'])) {
				if ($field['type'] == 'checkboxes' || count($field['options']) > 1) {
					$field_input_name .= '[]';
				}

				echo '<ul>';
				foreach ($field['options'] as $field_option_key => $field_option) {
					$label_class = '';
					$checked = '';
					if (isset($field_option['name']) && isset($field_option['value'])) {
						if ($field_value && in_array($field_option['value'], (array) $field_value)) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="checkbox" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option['value']).'"'.$add_attr.$checked.' />'.esc_html($field_option['name']).'</label></li>';
					} elseif (isset($field_option['name'])) {
						if ($field_value && in_array($field_option['name'], (array) $field_value)) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="checkbox" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option['name']).'"'.$add_attr.$checked.' />'.esc_html($field_option['name']).'</label></li>';
					} elseif (isset($field_option['value'])) {
						if ($field_value && in_array($field_option['value'], (array) $field_value)) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="checkbox" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option['value']).'"'.$add_attr.$checked.' />'.esc_html($field_option['value']).'</label></li>';
					} elseif (is_string($field_option)) {
						if ($field_value && in_array($field_option, (array) $field_value)) {
							$label_class = ' class="active"';
							$checked = ' checked="checked"';
						}
						echo '<li><label'.$label_class.'><input type="checkbox" id="'.esc_attr($field_input_id.'_'.$field_option_key).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_option).'"'.$add_attr.$checked.' />'.esc_html($field_option).'</label></li>';
					}
				}
				echo '</ul>';
			}
			break;

		case 'hidden':
			echo '<input type="hidden" id="'.esc_attr($field_input_id).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_value).'"'.$add_attr.' />';
			break;

		default :
			echo '<input type="'.$field['type'].'" id="'.esc_attr($field_input_id).'" name="'.esc_attr($field_input_name).'" class="'.$field['class'].'" value="'.esc_attr($field_value).'"'.$add_attr.' />';
			break;
	}

	echo '</div>'; // .input
	echo '</div>'."\n"; // .pb_input_area
}

// リピーター フィールドをループしてフォーム出力
function render_page_builder_repeater_fields($fields, $field_input_id, $field_input_name, $post_id = -1) {
	// リピーター行数
	if ($post_id) {
		$row_count = (int) get_post_meta($post_id, $field_input_id, true);
	} else {
		$row_count = 0;
	}

	// index_classが設定されている項目ラベルフィールド取得
	$index_label_field = get_page_builder_repeater_index_label_field($fields);

	echo '<div class="pb_repeater_wrap" data-rows="'.$row_count.'" data-index_label="'.($index_label_field ? '1' : '').'">'."\n";
	echo '<div class="pb_repeater_sortable">'."\n";

	if ($row_count > 0) {
		// 行ループ
		for($i = 1; $i <= $row_count; $i++) {
			if ($index_label_field) {
				$index_label = get_page_builder_repeater_index_label($i, $fields, $field_input_id.'_'.$i, $post_id);
			} else {
				$index_label = $i;
			}

			echo '<div class="pb_repeater" id="'.$field_input_id.'-'.$i.'">'."\n";
			echo '<ul class="pb_repeater_button cf">'."\n";
			echo '<li><span class="pb_repeater_move">'.__('Move', 'tcd-w').'</span></li>'."\n";
			echo '<li><span class="pb_repeater_delete" data-confirm="'.__('Are you sure you want to delete this item?', 'tcd-w').'">'.__('Delete', 'tcd-w').'</span></li>'."\n";
			echo '</ul>'."\n";

			echo '<div class="pb_repeater_content">'."\n";
			echo '<h3 class="pb_repeater_headline"><span class="index_label">'.esc_html($index_label).'</span><a href="#">'.__('Open', 'tcd-w').'</a></h3>'."\n";
			echo '<div class="pb_repeater_field">'."\n";

			// フォームフィールドループ
			render_page_builder_fields($fields, $field_input_id.'_'.$i, $field_input_name.'_'.$i, $post_id);

			// 行 順番用
			echo '<input type="hidden" name="'.$field_input_id.'_repeater_index[]" value="'.$i.'" />'."\n";

			echo '</div>'."\n"; // .pb_repeater_field
			echo '</div>'."\n"; // .pb_repeater_content
			echo '</div>'."\n"; // .pb_repeater
		}
	}

	echo '</div>'."\n"; // .pb_repeater_sortable

	// 項目の追加ボタン
	echo '<div class="pb_input_area pb_input_area-add_repeater">';
	echo '<a href="#" class="pb_add_repeater button-ml">'.__('Add item', 'tcd-w').'</a>';
	echo '</div>'."\n";

	// 追加ボタン時に差し込むHTML
	$i = 'pb_repeater_add_index';
	if ($index_label_field) {
		$index_label = __('New item', 'tcd-w');
	} else {
		$index_label = $i;
	}

	echo '<div class="add_pb_repeater_clone hidden hide">'."\n";
	echo '<div class="pb_repeater" id="'.$field_input_id.'-'.$i.'">'."\n";
	echo '<ul class="pb_repeater_button cf">'."\n";
	echo '<li><span class="pb_repeater_move">'.__('Move', 'tcd-w').'</span></li>'."\n";
	echo '<li><span class="pb_repeater_delete" data-confirm="'.__('Are you sure you want to delete this item?', 'tcd-w').'">'.__('Delete', 'tcd-w').'</span></li>'."\n";
	echo '</ul>'."\n";

	echo '<div class="pb_repeater_content">'."\n";
	echo '<h3 class="pb_repeater_headline"><span class="index_label">'.esc_html($index_label).'</span><a href="#">'.__('Open', 'tcd-w').'</a></h3>'."\n";
	echo '<div class="pb_repeater_field">'."\n";

	// 行 順番用
	echo '<input type="hidden" name="'.$field_input_id.'_repeater_index[]" value="'.$i.'" />'."\n";

	// フォームフィールドループ
	render_page_builder_fields($fields, $field_input_id.'_'.$i, $field_input_name.'_'.$i);

	echo '</div>'."\n"; // .pb_repeater_field
	echo '</div>'."\n"; // .pb_repeater_content
	echo '</div>'."\n"; // .pb_repeater
	echo '</div>'."\n"; // #add_pb_repeater_clone

	echo '</div>'."\n"; // .pb_repeater_wrap
}

// リピーター index_classが設定されている項目ラベルフィールド取得
function get_page_builder_repeater_index_label_field($fields) {
	if (!empty($fields)) {
		foreach ($fields as $field) {
			if (!empty($field['class'])) {
				$field_class = $field['class'];
				if (is_string($field['class'])) {
					$field_class = explode(' ', $field['class']);
				}
				$field_class = array_map('trim', $field_class);
				if (in_array('index_label', $field_class)) {
					return $field;
				}
			}
		}
	}
	return false;
}

// リピーター 項目ラベル取得
function get_page_builder_repeater_index_label($row_index, $fields = null, $field_input_id = null, $post_id = -1) {
	// index_classが設定されている項目ラベルフィールド取得
	$index_label_field = get_page_builder_repeater_index_label_field($fields);
	if ($index_label_field) {
		$value = null;
		if (!empty($index_label_field['id'])) {
			$value = get_post_meta($post_id, $field_input_id.'_'.$index_label_field['id'], true);
		}
		if ($value) {
			return $value;
		} elseif (!empty($index_label_field['std'])) {
			return $index_label_field['std'];
		}
		return null;
	} else {
		return $row_index;
	}
	return null;
}

// クローン用のリッチエディター化処理をしないようにする
// クローン後のリッチエディター化はpage_builder.jsで行う
function page_builder_tiny_mce_before_init($mceInit, $editor_id) {
	if (strpos($editor_id, 'pb_add_index_') !== false || strpos($editor_id, 'pb_repeater_add_index_') !== false ) {
		$mceInit['wp_skip_init'] = true;
	}
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'page_builder_tiny_mce_before_init', 10, 2);


// $idのページビルダー保存値配列を返す
function page_builder_get_values($id, $post_id = null, $layout = null) {
	if (empty($id)) return false;

	$post = get_post($post_id);
	if (empty($post->ID)) return false;

	// レイアウト指定が無ければidからレイアウト取得
	if (!$layout) {
		// pb_layouts に ページビルダーid => レイアウトidとして保存されている
		$pb_layouts = get_post_meta($post->ID, 'pb_layouts', true);

		// idのレイアウトが無ければ終了
		if (empty($pb_layouts[$id])) return null;

		$layout = $pb_layouts[$id];
	}

	// 値配列
	$values = array();

	// ページビルダーフィールド情報取得
	$field_layouts = get_page_builder_fields();
	if (!$field_layouts || !is_array($field_layouts)) return null;

	// フィールドレイアウトループして該当レイアウト検索、値を取得
	foreach ($field_layouts as $field_layout) {
		if (empty($field_layout['name']) || empty($field_layout['id'])) continue;
		if ($field_layout['id'] != $layout) continue;

		// リピーターフィールド
		if (!empty($field_layout['repeater_fields'])) {
			$values['repeater'] = array();

			// リピーター行数
			$row_count = (int) get_post_meta($post->ID, 'pb_'.$field_layout['id'].'_'.$id, true);
			if ($row_count > 0) {
				// 行ループ
				for($i = 1; $i <= $row_count; $i++) {
					$values['repeater'][$i] = array();

					// フィールドループ
					foreach ($field_layout['repeater_fields'] as $field) {
						if (empty($field['id'])) continue;
						// カスタムフィールドキー
						$meta_key = 'pb_'.$field_layout['id'].'_'.$id.'_'.$i.'_'.$field['id'];

						// カスタムフィールド値を取得し値配列に代入
						$values['repeater'][$i][$field['id']] = get_post_meta($post->ID, $meta_key, true);
					}
				}
			}
		}

		// フィールド
		if (!empty($field_layout['fields'])) {
			// フィールドループ
			foreach ($field_layout['fields'] as $field) {
				if (empty($field['id'])) continue;
				// カスタムフィールドキー
				$meta_key = 'pb_'.$field_layout['id'].'_'.$id.'_'.$field['id'];

				// カスタムフィールド値を取得し値配列に代入
				$values[$field['id']] = get_post_meta($post->ID, $meta_key, true);
			}
		}

		break;
	}

	return $values;
}

// 記事に任意のレイアウト及びショートコードが設定されているか
function pb_has_layout($layout = null, $post_id = null) {
	$post_layout = pb_get_post_layout($layout, $post_id, false);
	if ($post_layout && is_array($post_layout)) {
		return count($post_layout);
	}
	return false;
}

// 記事に任意のレイアウト及びショートコードが設定されているレイアウト配列を返す
function pb_get_post_layout($layout = null, $post_id = null, $load_value = false) {
	$post = get_post($post_id);
	if (empty($post->ID)) return false;

	// ページビルダーフィールド情報取得
	$field_layouts = get_page_builder_fields();
	if (!$field_layouts || !is_array($field_layouts)) return false;

	// pb_layouts に ページビルダーid => レイアウトidとして保存されている
	$pb_layouts = get_post_meta($post->ID, 'pb_layouts', true);
	if (!$pb_layouts || !is_array($pb_layouts)) return false;

	// 値読み込みあり
	if ($load_value) {
		// ページビルダーフィールド情報取得
		$field_layouts = get_page_builder_fields();
		if (!$field_layouts || !is_array($field_layouts)) return false;
	}

	// pb_layoutsループ
	foreach ($pb_layouts as $pb_id => $pb_layout) {
		// レイアウト指定ありでレイアウトが異なる場合は削除
		if ($layout && $layout != $pb_layout) {
			unset($pb_layouts[$pb_id]);
			continue;

		// 本文内にショートコードが無ければ削除
		} elseif (strpos($post->post_content, '[page_builder id="'.$pb_id.'"]') === false) {
			unset($pb_layouts[$pb_id]);
			continue;
		}

		// 値読み込みあり
		if ($load_value) {
			// フィールドレイアウトループして該当レイアウト検索、値を取得
			foreach ($field_layouts as $field_layout) {
				if (empty($field_layout['name']) || empty($field_layout['id'])) continue;
				if ($field_layout['id'] != $pb_layout) continue;

				$pb_layouts[$pb_id] = $field_layout;
				$pb_layouts[$pb_id]['values'] = page_builder_get_values($pb_id, $post->ID, $pb_layout);

				break;
			}
		}
	}

	return $pb_layouts;
}




// add meta box
function page_builder_meta_box() {
	add_meta_box(
		'page_builder_meta_box',//ID of meta box
		__('Page builder setting', 'tcd-w'),//label
		'show_page_builder_meta_box',//callback function
		array('page','post','work','news'),// post type
		'normal',// context
		'high'// priority
	);
}
add_action('add_meta_boxes', 'page_builder_meta_box');

// show meta box
function show_page_builder_meta_box() {
	global $post;

	// ページビルダーフィールド情報取得
	$field_layouts = get_page_builder_fields();
	if (!$field_layouts || !is_array($field_layouts)) return;

	// pb_layouts に ページビルダーid => レイアウトidとして保存されている
	$pb_layouts = get_post_meta($post->ID, 'pb_layouts', true);

	// 最大index取得
	$pb_max_index = 0;
	if ($pb_layouts && is_array($pb_layouts)) {
		foreach(array_keys($pb_layouts) as $pb_index) {
			$pb_index = (int) $pb_index;
			if ($pb_max_index < $pb_index) {
				$pb_max_index = $pb_index;
			}
		}
	}

	echo '<input type="hidden" name="page_builder_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
?>

  <div class="pb_desc">
    <?php _e('<p>You can use designed HTML content by using this Page Builder function.<br />STEP:1  Click the blue button below.<br />STEP2:  Enter data in input field.<br />STEP3:  Copy and paste the short code to the post content area.</p>', 'tcd-w'); ?>
  </div>

<?php
	// ひな形ボタン表示
	echo '<ul id="pb_button_list" class="clearfix">';
	foreach ($field_layouts as $field_layout) {
		if (empty($field_layout['name']) || empty($field_layout['id'])) continue;
		echo '<li><a href="#" data-layout="'.esc_attr($field_layout['id']).'">'.esc_attr($field_layout['name']).'</a></li>';
	}
	echo '</ul>';

	echo '<div id="pb_contents" data-max-index="'.$pb_max_index.'">'."\n";

	// 保存値に応じてフォーム出力
	if ($pb_layouts && is_array($pb_layouts)) {
		foreach($pb_layouts as $pb_index => $pb_layout) {
			// フィールドレイアウトループして該当レイアウト検索
			foreach ($field_layouts as $field_layout) {
				if (empty($field_layout['name']) || empty($field_layout['id'])) continue;
				if ($field_layout['id'] == $pb_layout) {
					echo '<div class="pb_wrap pb_index-'.$pb_index.' pb_layout-'.$field_layout['id'].'" data-index="'.$pb_index.'" data-layout="'.$field_layout['id'].'">'."\n";

					echo '<div class="pb_header clearfix">';
					echo '<h3 class="title">'.esc_html($field_layout['name']).'</h3><p class="short_code">[page_builder id=&quot;'.$pb_index.'&quot;]</p><a href="#" class="open">'. __('Open', 'tcd-w') .'</a>';
					echo '</div>'."\n";

					echo '<div class="pb_content">'."\n";

					echo '<div class="short_code"><span class="label">' . __('Copy and paste the short code below to the post content area.', 'tcd-w') . '</span><input type="text" value="[page_builder id=&quot;'.$pb_index.'&quot;]" readonly="readonly" /></div>'."\n";

					if (!empty($field_layout['before_fields'])) {
						echo $field_layout['before_fields']."\n";
					}

					// input用id・name設定
					$field_input_id = 'pb_'.$field_layout['id'].'_'.$pb_index;
					$field_input_name = 'pb_'.$field_layout['id'].'_'.$pb_index;

					// リピーターフィールドをループして出力
					if (!empty($field_layout['repeater_fields'])) {
						render_page_builder_repeater_fields($field_layout['repeater_fields'], $field_input_id, $field_input_name, $post->ID);
					}

					// フィールドをループして出力
					if (!empty($field_layout['fields'])) {
						render_page_builder_fields($field_layout['fields'], $field_input_id, $field_input_name, $post->ID);
					}

					if (!empty($field_layout['after_fields'])) {
						echo $field_layout['after_fields']."\n";
					}

					// 削除ボタン
					echo '<div class="pb_input_area">';
					echo '<a href="#" class="delete_button" data-confirm="'.__('Are you sure you want to delete this content?', 'tcd-w').'">'.__('Delete', 'tcd-w').'</a>';
					echo '</div>'."\n";

					// レイアウト
					echo '<input type="hidden" name="pb_layouts['.$pb_index.']" value="'.$field_layout['id'].'" />'."\n";

					echo '</div>'."\n"; // .pb_content
					echo '</div>'."\n"; // .pb_wrap
					break;
				}
			}
		}
	}

	echo '</div>'."\n"; // #pb_contents

	// 追加用フォーム出力
	$pb_index = 'pb_add_index';
	echo '<div class="add_page_builder_clone hidden hide">'."\n";
	foreach ($field_layouts as $field_layout) {
		if (empty($field_layout['name']) || empty($field_layout['id'])) continue;
		echo '<div class="pb_wrap pb_index-'.$pb_index.' pb_layout-'.$field_layout['id'].'" data-index="'.$pb_index.'" data-layout="'.$field_layout['id'].'">'."\n";

		echo '<div class="pb_header clearfix">';
		echo '<h3 class="title">'.esc_html($field_layout['name']).'</h3><p class="short_code">[page_builder id=&quot;'.$pb_index.'&quot;]</p><a href="#" class="open">開く</a>';
		echo '</div>'."\n";

		echo '<div class="pb_content">'."\n";

		echo '<div class="short_code"><span class="label">'. __('Copy and paste the short code below to the post content area.', 'tcd-w') .'</span><input type="text" value="[page_builder id=&quot;'.$pb_index.'&quot;]" readonly="readonly" /></div>'."\n";

		if (!empty($field_layout['before_fields'])) {
			echo $field_layout['before_fields']."\n";
		}

		// input用id・name設定
		$field_input_id = 'pb_'.$field_layout['id'].'_'.$pb_index;
		$field_input_name = 'pb_'.$field_layout['id'].'_'.$pb_index;

		// リピーターフィールドをループして出力
		if (!empty($field_layout['repeater_fields'])) {
			render_page_builder_repeater_fields($field_layout['repeater_fields'], $field_input_id, $field_input_name);
		}

		// フィールドをループして出力
		if (!empty($field_layout['fields'])) {
			render_page_builder_fields($field_layout['fields'], $field_input_id, $field_input_name);
		}

		if (!empty($field_layout['after_fields'])) {
			echo $field_layout['after_fields']."\n";
		}

		// 削除ボタン
		echo '<div class="pb_input_area">';
		echo '<a href="#" class="delete_button" data-confirm="'.__('Are you sure you want to delete this content?', 'tcd-w').'">'.__('Delete', 'tcd-w').'</a>';
		echo '</div>'."\n";

		// レイアウト
		echo '<input type="hidden" name="pb_layouts['.$pb_index.']" value="'.$field_layout['id'].'" />'."\n";

		echo '</div>'."\n"; // .pb_content
		echo '</div>'."\n"; // .pb_wrap
	}
	echo '</div>'."\n"; // .add_page_builder_clone
}

// save meta box
function save_page_builder_meta_box( $post_id ) {

	// verify nonce
	if (!isset($_POST['page_builder_meta_box_nonce']) || !wp_verify_nonce($_POST['page_builder_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// メタ更新配列
	$update_metas = array('pb_layouts' => array());

	// pb_layouts に ページビルダーid => レイアウトidとしてポストされる
	if (!empty($_POST['pb_layouts']) && is_array($_POST['pb_layouts'])) {
		// ページビルダーフィールド情報取得
		$field_layouts = get_page_builder_fields();

		foreach ($_POST['pb_layouts'] as $post_index => $post_layout) {
			// クローン用は除外
			if ($post_index == 'pb_add_index') continue;

			// フィールドレイアウトループして該当レイアウト検索
			foreach ($field_layouts as $field_layout) {
				if (empty($field_layout['name']) || empty($field_layout['id'])) continue;

				if ($field_layout['id'] == $post_layout) {
					$update_metas['pb_layouts'][$post_index] = $post_layout;

					// ベースとなるメタキー・ポストキー
					$field_input_name = 'pb_'.$post_layout.'_'.$post_index;

					// リピーターフィールド
					if (!empty($field_layout['repeater_fields'])) {
						$current_index = 0;

						// 行ループ
						if (!empty($_POST[$field_input_name.'_repeater_index']) && is_array($_POST[$field_input_name.'_repeater_index'])) {
							// 行ループ ソータブルのため$post_repeater_indexは順不同
							foreach($_POST[$field_input_name.'_repeater_index'] as $post_repeater_index) {
								// クローン用は除外
								if ($post_repeater_index == 'pb_repeater_add_index') continue;

								$current_index++;

								// フィールドループ
								foreach ($field_layout['repeater_fields'] as $field) {
									if (empty($field['id'])) continue;

									// ポストされるキー
									$post_input_name = $field_input_name.'_'.$post_repeater_index.'_'.$field['id'];

									// 保存メタキー
									$meta_key = $field_input_name.'_'.$current_index.'_'.$field['id'];

									// 入力値
									if (isset($_POST[$post_input_name])) {
										$meta_value = $_POST[$post_input_name];
									} else {
										$meta_value = '';
									}

									// フィールド指定の入力値に対して実行する関数
									if (!empty($field['before_save_function']) && function_exists($field['before_save_function'])) {
										$meta_value = call_user_func($field['before_save_function'], $meta_value);
									}

									// フィールド指定の入力値に対して実行するフィルター
									if (!empty($field['before_save_filter'])) {
										$meta_value = apply_filters($field['before_save_filter'], $meta_value, $field, $field_layout, $meta_key);
									}

									// 入力値に対して実行するフィルター
									$meta_value = apply_filters('page_builder_before_save-'.$field['id'], $meta_value, $field, $field_layout, $meta_key);

									// メタ更新配列にセット
									if (!empty($meta_value)) {
										$update_metas[$meta_key] = $meta_value;
									}
								}
							}

							// 行数を保存
							$update_metas[$field_input_name] = $current_index;
						}
					}

					// フィールド
					if (!empty($field_layout['fields'])) {
						// フィールドループ
						foreach ($field_layout['fields'] as $field) {
							if (empty($field['id'])) continue;

							// 保存メタキー = ポストされるキー
							$meta_key = $field_input_name.'_'.$field['id'];

							// 入力値
							if (isset($_POST[$meta_key])) {
								$meta_value = $_POST[$meta_key];
							} else {
								$meta_value = '';
							}

							// フィールド指定の入力値に対して実行する関数
							if (!empty($field['before_save_function']) && function_exists($field['before_save_function'])) {
								$meta_value = call_user_func($field['before_save_function'], $meta_value);
							}

							// フィールド指定の入力値に対して実行するフィルター
							if (!empty($field['before_save_filter'])) {
								$meta_value = apply_filters($field['before_save_filter'], $meta_value, $field, $field_layout, $meta_key);
							}

							// 入力値に対して実行するフィルター
							$meta_value = apply_filters('page_builder_before_save-'.$field['id'], $meta_value, $field, $field_layout, $meta_key);

							// メタ更新配列にセット
							if (!empty($meta_value)) {
								$update_metas[$meta_key] = $meta_value;
							}
						}
					}

					break;
				}
			}
		}
	}

	// メタ更新配列を保存
	if ($update_metas) {
		foreach($update_metas as $meta_key => $meta_value) {
			update_post_meta($post_id, $meta_key, $meta_value);
		}
	}

	// 不要なページビルダーメタを削除
	foreach(get_post_meta($post_id) as $meta_key => $meta_value) {
		if (substr($meta_key, 0, 3) === 'pb_') {
			if (!isset($update_metas[$meta_key])) {
				delete_post_meta($post_id, $meta_key);
			}
		}
	}

	return $post_id;
}
add_action('save_post', 'save_page_builder_meta_box');

// ショートコード
function page_builder_shortcode($attr) {
	global $post;

	// 入力idが無ければ終了
	if (empty($attr['id'])) return null;

	// pb_layouts に ページビルダーid => レイアウトidとして保存されている
	$pb_layouts = get_post_meta($post->ID, 'pb_layouts', true);

	// 入力idのレイアウトが無ければ終了
	if (empty($pb_layouts[$attr['id']])) return null;

	// id・レイアウト
	$shortcode_id = $attr['id'];
	$shortcode_layout = $pb_layouts[$attr['id']];

	// 値取得
	$values = page_builder_get_values($shortcode_id, $post->ID, $shortcode_layout);

	// 値配列が空
	if (!$values) return null;

	// バッファリング開始
	ob_start();

	// 1～4カラム -------------------------------------------------------------------------
	if (in_array($shortcode_layout, array('one_column', 'two_column', 'three_column', 'four_column'))) {
		if ($shortcode_layout == 'two_column') {
			$colmuns = 2;
		} elseif ($shortcode_layout == 'three_column') {
			$colmuns = 3;
		} elseif ($shortcode_layout == 'four_column') {
			$colmuns = 4;
		} else {
			$colmuns = 1;
		}
?>
<div class="pb_layout clearfix pb_layout<?php echo $colmuns; ?>">
<?php
		for ($i = 1; $i <= $colmuns; $i++) {
			$image = null;
			if (!empty($values['image'.$i])) {
				$image = wp_get_attachment_image($values['image'.$i], 'full');
			}
			if (!empty($values['link'.$i]) && !empty($values['target_blank'.$i])) {
				$image = '<a href="'.esc_attr($values['link'.$i]).'" target="_blank">'.$image.'</a>';
			} elseif (!empty($values['link'.$i])) {
				$image = '<a href="'.esc_attr($values['link'.$i]).'">'.$image.'</a>';
			}
?>

  <div class="pb_layout_content clearfix <?php if ($values['image_type'.$i] == 'type2') { echo 'image_bottom'; } else { echo 'image_top'; } ?>">

   <?php if ($values['image_type'.$i] == 'type1') { if ($image) { ?>
   <div class="pb_layout_image"><?php echo $image; ?></div>
   <?php }; }; ?>

   <?php if ( (!empty($values['headline'.$i])) || (!empty($values['content'.$i])) ) { ?>
   <div class="pb_layout_info">
   <?php }; ?>

   <?php if (!empty($values['headline'.$i])) { ?>
   <h3 class="pb_layout_headline rich_font color_headline"<?php if ($values['headline_align'.$i] == 'on' ) { echo ' style="text-align:center;"'; }; ?>><?php echo esc_html($values['headline'.$i]); ?></h3>
   <?php } ?>

   <?php if (!empty($values['content'.$i])) { ?>
   <div class="pb_layout_desc clearfix">
    <?php echo wpautop($values['content'.$i]); ?>
   </div>
   <?php } ?>

   <?php if ( (!empty($values['headline'.$i])) || (!empty($values['content'.$i])) ) { ?>
   </div>
   <?php }; ?>

   <?php if ($values['image_type'.$i] == 'type2') { if ($image) { ?>
   <div class="pb_layout_image"><?php echo $image; ?></div>
   <?php }; }; ?>

  </div>
<?php	} ?>

</div>

<?php
	// 画像リスト
	} elseif ($shortcode_layout == 'image_list') {

    if (!empty($values['list_image6'])) { $image_num = 'image_num6'; }
    elseif (!empty($values['list_image5'])) { $image_num = 'image_num5'; }
    elseif (!empty($values['list_image4'])) { $image_num = 'image_num4'; }
    elseif (!empty($values['list_image3'])) { $image_num = 'image_num3'; }
    elseif (!empty($values['list_image2'])) { $image_num = 'image_num2'; }
    else { $image_num = 'image_num1'; }
?>

<ul class="pb_image_list clearfix <?php echo $image_num; ?>">
 <?php
      for ($i = 1; $i <= 6; $i++) {
        $image = null;
        if (!empty($values['list_image'.$i])) {
          $image = wp_get_attachment_image($values['list_image'.$i], 'full');
        }
        if(!empty($image)) {
          echo '<li>' . $image . "</li>\n";
        };
      };
      $list_num = 'num' + $i;
 ?>
</ul>

<?php
	// キャッチフレーズ
	} elseif ($shortcode_layout == 'catchphrase_set') {
?>

<div class="pb_catchphrase">
 <?php if (!empty($values['catchphrase_title'])) { ?>
 <h4 class="rich_font color_headline" style="font-size:<?php echo $values['catchphrase_title_font_size']; ?>px;"><?php echo $values['catchphrase_title']; ?></h4>
 <?php }; ?>
 <?php if (!empty($values['catchphrase_title'])) { ?>
 <div class="desc" style="font-size:<?php echo $values['catchphrase_desc_font_size']; ?>px;">
  <?php echo wpautop($values['catchphrase_desc']); ?>
 </div>
 <?php }; ?>
</div>

<?php
	// Google Map --------------------------------
	} elseif ($shortcode_layout == 'google_map') {
?>

<div class="pb_google_map">
<?php
		if ($values['map_type'] == 'type1') {
			echo $values['map_code1'];
		} elseif ($values['map_type'] == 'type2') {
			echo do_shortcode($values['map_code2']);
		}
?>
</div>

<?php
	// slider -------------------------------------
	} elseif($shortcode_layout == 'slider') {
?>

<div class="pb_slider_wrap">

  <div class="pb_slider">

<?php
		foreach($values['repeater'] as $repeater_index => $repeater_values) {
			$image = null;
			if (!empty($repeater_values['image'])) {
				$image = wp_get_attachment_image($repeater_values['image'], 'slider_size');
			}
			if (empty($image)) continue;

			echo '<div class="item">';
			if (!empty($repeater_values['link'])) {
				echo '<a href="'.esc_attr($repeater_values['link']).'"';
				if (!empty($repeater_values['target_blank'])) {
					echo ' target="_blank"';
				}
				echo '>';
			}

			echo $image;

			if (!empty($repeater_values['link'])) {
				echo '</a>';
			}
			echo '</div>';
		}
?>

  </div><!-- END .pb_slider -->

  <div class="pb_slider_nav">

<?php
		foreach($values['repeater'] as $repeater_index => $repeater_values) {
			$image = null;
			if (!empty($repeater_values['image'])) {
				$image = wp_get_attachment_image($repeater_values['image'], 'size1');
			}
			if (empty($image)) continue;

			echo '<div class="item">';
			echo $image;
			echo '</div>';
		}
?>

  </div><!-- END .pb_slider_nav -->

</div><!-- END .pb_slider_wrap -->

<?php
	// tab
	} elseif($shortcode_layout == 'tab') {
?>

<div class="pb_tab_wrap">

  <ol class="pb_tab clearfix">
<?php
		foreach ($values['repeater'] as $repeater_index => $repeater_values) {
			echo '<li><a href="#pb_tab_content'.$shortcode_id.'_'.$repeater_index.'">'.esc_html($repeater_values['tab_name']).'</a></li>';
		}
?>
  </ol>

  <div class="pb_tab_contents">

<?php foreach ($values['repeater'] as $repeater_index => $repeater_values) { ?>
   <div id="pb_tab_content<?php echo $shortcode_id.'_'.$repeater_index; ?>" class="pb_tab_content">
<?php	if (!empty($repeater_values['headline'])) {  ?>
    <h3 class="headline rich_font color_headline"><?php echo esc_html($repeater_values['headline']); ?></h3>
<?php	} ?>
<?php	if (!empty($repeater_values['content'])) {  ?>
    <div class="pb_tab_desc clearfix"><?php echo wpautop($repeater_values['content']); ?></div>
<?php	} ?>
    </div><!-- END .pb_tab_content -->
<?php	} // end foreach ?>

  </div><!-- END .pb_tab_contents -->

</div><!-- END .pb_tab_wrap -->

<?php
	}

	// バッファリング内容を返す
	return ob_get_clean();
}
add_shortcode('page_builder', 'page_builder_shortcode');

