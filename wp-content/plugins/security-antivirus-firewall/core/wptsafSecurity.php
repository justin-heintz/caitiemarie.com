<?php
/*  
 * Security Antivirus Firewall (wpTools S.A.F.)
 * http://wptools.co/wordpress-security-antivirus-firewall
 * Version:           	2.1.3
 * Build:             	11943
 * Author:            	WpTools
 * Author URI:        	http://wptools.co
 * License:           	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * Date:              	Tue, 01 Nov 2016 09:53:04 GMT
 */

if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ) exit;

class wptsafSecurity extends wptsafAbstractExtension{

	protected $settings;
	protected $extensions = array();
	protected static $instance;

	public function __construct(){
		$this->name = 'wptsaf-security';
		$this->title = __('Security SAF', 'wptsaf_security');
		$this->description = __('Security SAF Description', 'wptsaf_security');

		parent::__construct();

		register_activation_hook(WPTSAF_PLUGINNAME, array($this, 'activatePlugin'));
		register_deactivation_hook(WPTSAF_PLUGINNAME, array($this, 'deactivatePlugin'));
		register_uninstall_hook(WPTSAF_PLUGINNAME, array(get_called_class(), 'uninstallPlugin'));

		$runUpdate = true;
		$installVersion = get_option( 'wpsaf_install_version' );
		if(!$installVersion) $installVersion = 0;
		if( $installVersion && $installVersion == WPTSAF_VERSION )  $runUpdate = false;
		if( $runUpdate ){
			delete_option("wpsaf_install_version");
			add_option( "wpsaf_install_version", WPTSAF_VERSION );
			add_action('init', array($this, 'activatePlugin'));
		}

		$locale = apply_filters('plugin_locale', get_locale(), 'wptsaf-security');
		load_textdomain('wptsaf-security', WP_LANG_DIR . "/plugins/wptsaf-security/wptsaf-security-$locale.mo" );
		load_plugin_textdomain('wptsaf-security');
	}


	public static function getInstance(){
		if (!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function isEnabled(){
		return true;
	}

	public function getExtensionDir(){
		return 'core/';
	}

	public function addExtension(wptsafAbstractExtension $extension){
		$this->extensions[$extension->getName()] = $extension;
	}

	public function getExtensions(){
		return $this->extensions;
	}

	public function getExtension($name){
		return isset($this->extensions[$name]) ? $this->extensions[$name] : null;
	}

	public function getExtensionByTitle($title){
		foreach ($this->extensions as $extension) {
			if ($title == $extension->getTitle() ) {
				return $extension;
			}
		}
		return null;
	}

	public static function currentUserCanManage(){
		return current_user_can(WPTSAF_ACCESS_LEVEL);
	}

	public function activatePlugin(){
		$this->activate();
		foreach ($this->getExtensions() as $extension) {
			$extension->activate();
		}
	}

	public function deactivatePlugin(){
		foreach ($this->getExtensions() as $extension) {
			$extension->deactivate();
		}
		$this->deactivate();
	}

	public static function uninstallPlugin(){
		foreach (self::getInstance()->getExtensions() as $extension) {
			$extension->uninstall();
		}
		self::getInstance()->uninstall();
	}
}
