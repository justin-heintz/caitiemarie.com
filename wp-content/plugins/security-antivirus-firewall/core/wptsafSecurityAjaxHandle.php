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

class wptsafSecurityAjaxHandle extends wptsafAbstractExtensionAjaxHandle{

	public function settingsSave(){
		$validator = wptsafValidator::getInstance();
		$settings = $this->extension->getSettings();
		$request = array();
		$errors = array();

		$request['log_rotation'] = is_numeric($_POST['log_rotation'])
			? intval($_POST['log_rotation'])
			: strip_tags($_POST['log_rotation']);
		$errors['log_rotation'] = $validator->validate('positive_integer', $request['log_rotation']);

		$request['notification_emails'] = isset($_POST['notification_emails'])
			? strip_tags($_POST['notification_emails'])
			: '';
		$errors['notification_emails'] = $validator->validate('required', $request['notification_emails']);

		$request['notification_emails'] = array_map('trim', explode("\n", $request['notification_emails']));
		$errors['notification_emails'] || $errors['notification_emails'] = $validator->validate('email_list', $request['notification_emails']);

		$errors = array_filter($errors);
		if (empty($errors)) {
			$request['notification_emails'] = array_filter($request['notification_emails']);
			foreach ($request as $field => $value) {
				$settings->set($field, $value);
			}
			$settings->save();
			$request = $settings->get();
		}

		$view = new wptsafView();
		$response = $view->content(
			$this->extension->getExtensionDir() . 'template/settings.php',
			array(
				'extensionTitle' => $this->extension->getTitle(),
				'errors' => $errors,
				'settings' => $request
			)
		);
		$this->response->setResponse($response);

		if (empty($errors)) {
			$this->response->addMessage(__('Settings are updated', 'wptsaf_security'), wptsafAjaxResponse::MESSAGE_TYPE_SUCCESS);
		}
		return $this->response;
	}
}
