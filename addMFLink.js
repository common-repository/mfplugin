/**
 * addMFLink.js
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

	
function insertLink(url,title,insOpc) {
	pathArray = window.location.pathname.split( '/' );
	with(document) { 
		s='http://' + window.location.hostname ;
		for(i=0;i<pathArray.length-1;i++) s+=pathArray[i]+"/"; 
		}
	//SEGUN LA OPCION EN insOpc inserta uno u otro link
	
	switch (insOpc){
		case -1:
			tinyMCEPopup.execCommand('mceInsertContent', false, '<a href="' + url +'">' + title + '</a>');
			break;
		case 0:
		case 1:
		case 2:
		case 3:
		case 4:
			tinyMCEPopup.execCommand('mceInsertContent', false, '<a href="' + url +'"><img src="' + s + 'mfdwn'+insOpc+'.png" alt="' + title + '"></a>');
			break;
			
	}

	// Refocus in window
	if (tinyMCEPopup.isWindow)
		window.focus();

	tinyMCEPopup.editor.focus();
	tinyMCEPopup.close();
}

