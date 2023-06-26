(function() {
	if (!tcdQuicktagsL10n) return;

	// ビジュアルエディタにプルダウンメニューの追加
	tinymce.PluginManager.add('tcd_mce_button', function( editor, url ) {
		var menus = [];

		for(let k in tcdQuicktagsL10n) {
			if (k !== 'pulldown_title' && typeof tcdQuicktagsL10n[k] === 'object') {
				menus.push({
					text: tcdQuicktagsL10n[k].display,
					onclick: function() {
						editor.insertContent(tcdQuicktagsL10n[k].tag);
					}
				});
			}
		}

		editor.addButton( 'tcd_mce_button', {
			text: tcdQuicktagsL10n.pulldown_title.display,
			icon: false,
			type: 'menubutton',
			menu: menus
		});
	});
})();