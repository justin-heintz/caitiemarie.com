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

require_once 'wptsafExtensionEasyPassword.php';
require_once 'wptsafExtensionEasyPasswordAjaxHandle.php';
require_once 'wptsafExtensionEasyPasswordSettings.php';
require_once 'wptsafExtensionEasyPasswordWidget.php';

wptsafSecurity::getInstance()->addExtension(wptsafExtensionEasyPassword::getInstance());
