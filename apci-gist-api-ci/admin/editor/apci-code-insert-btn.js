(function() {
    tinymce.create('tinymce.plugins.ApciGistAPICodeInsert', {
        init: function(ed, url) {
            ed.addCommand('apciCodeInsertBtnCommand', function() {
                ed.windowManager.open({
                    title: 'Insert Gist API shortcode',
                    file: ajaxurl + '?action=apci_code_insert_btn_modal',
                    inline: 1
                }, {
                    plugin_url: url
                });
            });
            ed.addButton('apciCodeInsertBtn', {
                title: 'Insert Gist code',
                image: url + '/github.png',
                cmd: 'apciCodeInsertBtnCommand'
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

    tinymce.PluginManager.add('apciCodeInsertBtn', tinymce.plugins.ApciGistAPICodeInsert);
})();
