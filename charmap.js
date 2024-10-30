/**
 * charmap.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

tinyMCEPopup.requireLangPack();


tinyMCEPopup.onInit.add(function() {
	tinyMCEPopup.dom.setHTML('charmapView', renderCharMapHTML());
	//addKeyboardNavigation();
});

function renderCharMapHTML() {
	html = "hola";
	return html;
	}

	
function insertChar(url,title) {
	pathArray = window.location.pathname.split( '/' );
	with(document) { 
		s='http://' + window.location.hostname ;
		for(i=0;i<pathArray.length-1;i++) s+=pathArray[i]+"/"; 
		}

	    
	tinyMCEPopup.execCommand('mceInsertContent', false, '<a href="' + url +'"><img src="' + s + 'mfdwn.png" alt="' + title + '"></a>');

	// Refocus in window
	if (tinyMCEPopup.isWindow)
		window.focus();

	tinyMCEPopup.editor.focus();
	tinyMCEPopup.close();
}

