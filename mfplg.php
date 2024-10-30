<?php
/*
Plugin Name: MFPlugin
Plugin URI: http://www.wcblog.com.ar/blog/
Description: This plugin allows you to insert download links to files hosted on MediaFire.
Author: Walter Cerrudo
Version: 1.3
Author URI: http://www.wcblog.com.ar/blog/
*/
function mfplugin_ver(){
	printAdminPage('MFPluginOpcion');
}

function mfplugin_add_menu(){
	if (function_exists('add_options_page')) {
		add_options_page('MediaFirePlg', 'Plugin MediaFire', 8, basename(__FILE__), 'mfplugin_ver');
	}
}


//*******************************************************************************************

//Returns an array of admin options
function getAdminOptions($adminOptionsName) {
	$mfPluginAdminOptions = array('mfPluginUsuario' => 'mfapiclass@gmail.com',
			'mfPluginPass' => 'probando',
			'mfPluginAPI' => 'lekmwp77f8iger83g903538txy83bbm76u67398r',
			'mfPluginAPP' => '4153');
	$devOptions = get_option($adminOptionsName);
	if (!empty($devOptions)) {
		foreach ($devOptions as $key => $option)
			$mfPluginAdminOptions[$key] = $option;
	}
	update_option($adminOptionsName, $mfPluginAdminOptions);
	return $mfPluginAdminOptions;
}

function printAdminPage($adminOptionsName) {
	$devOptions = getAdminOptions($adminOptionsName);

	if (isset($_POST['actMFPlugin'])) {
		if (isset($_POST['mfPluginUsuario'])) {
			$devOptions['mfPluginUsuario'] = $_POST['mfPluginUsuario'];
		}
		if (isset($_POST['mfPluginPass'])) {
			$devOptions['mfPluginPass'] = $_POST['mfPluginPass'];
		}
		if (isset($_POST['mfPluginAPI'])) {
			$devOptions['mfPluginAPI'] = $_POST['mfPluginAPI'];
		}
		if (isset($_POST['mfPluginAPP'])) {
			$devOptions['mfPluginAPP'] = $_POST['mfPluginAPP'];
		}

		if (isset($_POST['mfPluginLink'])) {
			$devOptions['mfPluginLink'] = $_POST['mfPluginLink'];
		}
		update_option($adminOptionsName, $devOptions);

		?>
<div class="updated">
	<p>
		<strong><?php _e("Settings Updated.", "mfplg");?> </strong>
	</p>
</div>
<?php
					} ?>
<div class=wrap>
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		<div id="icon-themes" class="icon32">
			<br />
		</div>
		<h2>MediaFire Plugins</h2>
		<h3>
			<?php _e('Settings','mfplg') ?>
		</h3>
		<fieldset>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><?php _e('User','mfplg') ?></th>
						<td><input type='text' id='mfPluginUsuario'
							value="<?php echo $devOptions['mfPluginUsuario']; ?>"
							name='mfPluginUsuario' /> <a
							href="https://www.mediafire.com/upgrade/"
							title="Crear cuenta en Mediafire " target="_new"><?php _e('Signed','mfplg') ?>
						</a></td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Password','mfplg') ?></th>
						<td><input type='password' id='mfPluginPass'
							value="<?php echo $devOptions['mfPluginPass'] ?>"
							name='mfPluginPass' /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('MediaFire API','mfplg') ?></th>
						<td><input type='text' id='mfPluginAPI'
							value="<?php echo $devOptions['mfPluginAPI'] ?>"
							name='mfPluginAPI' /> <a
							href="https://www.mediafire.com/#settings/applications"
							title="Obtener API " target="_new"><?php _e('Get API','mfplg') ?>
						</a></td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('MediaFire APP ID','mfplg') ?></th>
						<td><input type='text' id='mfPluginAPP'
							value="<?php echo $devOptions['mfPluginAPP'] ?>"
							name='mfPluginAPP' /> <a
							href="https://www.mediafire.com/#settings/applications"
							title="Obtener APP ID " target="_new"><?php _e('Get APP ID','mfplg') ?>
						</a></td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Link','mfplg') ?></th>
						<td><input type='radio' id='mfPluginLink' value="-1"
							name='mfPluginLink'
							<?php  if ($devOptions['mfPluginLink']==-1){echo "checked";} ?> />
							Sin Imagen (nombre del archivo como link)<br /> <br /> <input
							type='radio' id='mfPluginLink' value="0" name='mfPluginLink'
							<?php  if ($devOptions['mfPluginLink']==0){echo "checked";} ?> />
							<img src="../wp-content/plugins/mfplugin/mfdwn0.png"
							align="middle"><br /> <br /> <input type='radio'
							id='mfPluginLink' value="1" name='mfPluginLink'
							<?php  if ($devOptions['mfPluginLink']==1){echo "checked";} ?> />
							<img src="../wp-content/plugins/mfplugin/mfdwn1.png"
							align="middle"><br /> <br /> <input type='radio'
							id='mfPluginLink' value="2" name='mfPluginLink'
							<?php  if ($devOptions['mfPluginLink']==2){echo "checked";} ?> />
							<img src="../wp-content/plugins/mfplugin/mfdwn2.png"
							align="middle"><br /> <br /> <input type='radio'
							id='mfPluginLink' value="3" name='mfPluginLink'
							<?php  if ($devOptions['mfPluginLink']==3){echo "checked";} ?> />
							<img src="../wp-content/plugins/mfplugin/mfdwn3.png"
							align="middle"><br /> <br /> <input type='radio'
							id='mfPluginLink' value="4" name='mfPluginLink'
							<?php  if ($devOptions['mfPluginLink']==4){echo "checked";} ?> />
							<img src="../wp-content/plugins/mfplugin/mfdwn4.png"
							align="middle"><br /> <br />
					
					</tr>
				</tbody>
			</table>
			<div class="submit">
				<input type="submit" name="actMFPlugin"
					value="<?php _e('Update Settings','mfplg') ?>" />
			</div>
	
	</form>
</div>
<?php
}//End function printAdminPage()

//*******************************************************************************************

if (function_exists('add_action')) {
	add_action('admin_menu', 'mfplugin_add_menu');
}



//-------------- Botones

class ILC_Syntax_Buttons {

	function ILC_Syntax_Buttons(){
		if(is_admin()){
			if ( current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
			{
				add_filter('tiny_mce_version', array(&$this, 'tiny_mce_version') );
				add_filter("mce_external_plugins", array(&$this, "mce_external_plugins"));
				add_filter('mce_buttons_2', array(&$this, 'mce_buttons'));
			}
		}
	}
	function mce_buttons($buttons) {
		array_push($buttons, "separator", "ilcPHP", "ilcCSS", "ilcHTML", "ilcJS" );
		return $buttons;
	}
	function mce_external_plugins($plugin_array) {
		$plugin_array['ilcsyntax']  =  plugins_url('/mfplugin/mfplg.js');
		return $plugin_array;
	}
	function tiny_mce_version($version) {
		return ++$version;
	}
}
add_action('init', 'ILC_Syntax_Buttons');
load_plugin_textdomain('mfplg',null, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

function ILC_Syntax_Buttons(){
	global $ILC_Syntax_Buttons;
	$ILC_Syntax_Buttons = new ILC_Syntax_Buttons();
}