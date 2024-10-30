<?php
require_once './mediafire.class.php';
$GLOBALS['paso'] = 0;
$GLOBALS['folder'] = 0;

$us = new TUsuarioMF('mfapiclass@gmail.com', 'naranja'); //Instancia Usuario
$mf = new TMediafire($us); //Instancia MediaFire
$mf->getUserInfo();
$mf->myFiles();
print_r($mf->myFiles);
getFoldersTree(-1, $mf->myFiles->_rootFolder, 0);
?>