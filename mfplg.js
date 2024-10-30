(function(){

    tinymce.PluginManager.requireLangPack('ilcsyntax');
    
    tinymce.create('tinymce.plugins.ilcSyntax', {
    
        init : function(ed, url){
            ed.addCommand('mceilcPHP', function(){
                ilc_sel_content = tinyMCE.activeEditor.selection.getContent();
                //tinyMCE.activeEditor.selection.setContent('[php]' + ilc_sel_content + '[/php]');
				ed.windowManager.open({
                    file : url + '/window.php',
                    inline : 1,
					title: 'Archivos en MediaFire',
					width: 400,
					height: 500
                }, {
                    plugin_url : url
                });
            });
            ed.addButton('ilcPHP', {
                title: 'mfPlugin',
                image: url + '/mf.png',
                cmd: 'mceilcPHP'
            });
            ed.addShortcut('alt+ctrl+x', ed.getLang('mfPlugin'), 'mceilcPHP');
        },
        createControl : function(n, cm){
            return null;
        },
        getInfo : function(){
            return {
                longname: 'MFPlugin',
                author: '@waltercerrudo',
                authorurl: 'http://www.lawebdewalterio.com.ar/',
                infourl: 'http://twitter.com/waltercerrudo',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('ilcsyntax', tinymce.plugins.ilcSyntax);
})();