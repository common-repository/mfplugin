<?php
/**
 * MediaFireAPI
 *
 * PHP version 5
 *
 * MEDIAFIREAPI es una implementaci&oacute;n de las API de MediaFire,
 * orientada a objetos que facilita la interacci&oacute;n con MediaFire,
 * pudiendo obtener y actualizar informaci&oacute;n de los archivos almacenados
 * en una cuenta a la cual tengamos acceso, como as&iacute;
 * tambi&eacute;n obtener el link de descarga correspondiente.
 *
 * MEDIAFIREAPI is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option)
 * any later version.
 *
 * MEDIAFIREAPI is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with MEDIAFIREAPI. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   API
 * @package    MEDIAFIRE
 * @subpackage TFILEMF
 * @author     Walter Cerrudo <waltercerrudo@gmail.com>
 * @copyright  2014 Walter Cerrudo
 * @license    http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 * @version    1.3
 * @link       http://www.wcblog.com.ar/
 */
require_once './mediafire.class.php';
require_once '../../../wp-blog-header.php';
$devOptions = get_option('MFPluginOpcion');

$us = new TUsuarioMF($devOptions['mfPluginUsuario'], $devOptions['mfPluginPass']); //Instancia Usuario
$mf = new TMediafire($us,"json","2.3",$devOptions['mfPluginAPP'],$devOptions['mfPluginAPI']); //Instancia MediaFire

$fl = new TFileMF(); //Instancia TFileMF
$mf->getUserInfo();
$fl->setQuickKey($_GET['qk']);
$mf->getFilesInfo($fl);
echo '<br><b>Nombre del archivo:</b> '.$fl->getFileName();
echo '<br><b>Descripci&oacute;n del Archivo:</b> '.$fl->getDescription();
echo '<br><b>Ambito del archvio:</b> '.$fl->getPrivacy();
echo '<br><b>Descargas:</b> '.$fl->getDownloads();
?>














