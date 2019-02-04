(function() {
    tinymce.create('tinymce.plugins.ApGistAPICodeInsert', {
        init: function(ed, url) {
            ed.addCommand('apCodeInsertBtnCommand', function() {
                ed.windowManager.open({
                    title: 'Insert Gist API shortcode',
                    file: ajaxurl + '?action=ap_code_insert_btn_modal',
                    inline: 1
                }, {
                    plugin_url: url
                });
            });
            ed.addButton('apCodeInsertBtn', {
                title: 'Insert Gist code',
                image: url + '/github.png',
                cmd: 'apCodeInsertBtnCommand'
            });
        },
        getInfo: function() {
            return {
                longname: 'Gist API Code insert btn',
                author: 'Alex Pinkevych',
                authorurl: '',
                infourl: '',
                version: '1.0'
            };
        }
    });

    tinymce.PluginManager.add('apCodeInsertBtn', tinymce.plugins.ApGistAPICodeInsert);
})();
