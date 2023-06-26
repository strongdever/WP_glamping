(function($) {
    'use strict';
    var pathname = location.protocol + "//" + location.host + "/wp-content/plugins/ts-webfonts-for-standard-plan/inc/font.json";

    function getJson(editor, text_add_fontfamily) {

        function get() {
            var result = $.ajax({
                type: 'GET',
                url: pathname,
                async: false
            }).responseJSON;
            return result;
        }

        var result = get()

        return {
            type: 'listbox',
            tooltip: 'Font Family',
            fixedWidth: true,
            values: makeFontlist(result, editor, text_add_fontfamily),
            style: "font-family: '" + result[0]["font-family"][0]["font-name"] + "'"
        }
    }

    function makeFontlist(result, editor, text_add_fontfamily) {

        var array = [];
        for (var i = 0; i < result.length; i++) {
            for (var j = 0; j < result[i]["font-family"].length; j++) {
                var fontfamily = "font-family: " + result[i]["font-family"][j]["font-name"];
                array.push({
                    text: result[i]["font-family"][j]["font-name"],
                    value: result[i]["font-family"][j],
                    onClick: text_add_fontfamily,
                    style: fontfamily
                })
            }
        }
        return array;
    }

    tinymce.create('tinymce.plugins.ts_webfonts_plugin', {

        init: function(editor) {

            var text_add_fontfamily = function(fontstyle) {
                var fontstyle = this['settings']['value']['font-name'];
                var selected_text = editor.selection.getContent();
                var return_text = '';
                return_text = '<span id="fontFamilylist" style="font-family:\'' + fontstyle + '\';">' + selected_text + '</span>';
                editor.insertContent(return_text);
                var thisSelectFont = $('.mce-i-fontfamily_button').parent().find(".mce-txt")
                if (thisSelectFont) {
                    thisSelectFont.css({ "font-family": fontstyle, "width": "120px" });
                }
            }
            editor.addButton('fontfamily_button', getJson(editor, text_add_fontfamily));
        }
    });

    tinymce.PluginManager.add('ts_webfonts_plugin', tinymce.plugins.ts_webfonts_plugin);
})(jQuery);