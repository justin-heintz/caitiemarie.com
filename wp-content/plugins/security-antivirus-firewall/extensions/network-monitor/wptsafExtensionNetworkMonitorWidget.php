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

class wptsafExtensionNetworkMonitorWidget extends wptsafAbstractExtensionWidget{

	public function content(){
		$view = new wptsafView();
		$rows = $this->extension->getManagerIp()->getRows(10);

		return $view->content(
			$this->extension->getExtensionDir() . 'template/widget.php',
			array(
				'title' => $this->extension->getTitle(),
				'description' => $this->extension->getDescription(),
				'isEnabled' => $this->extension->isEnabled(),
				'logHeader' => array(
					'ip' 				=> __('IP address', 'wptsaf_security'),
					'date_gmt' 			=> __('Ban from', 'wptsaf_security'),
					'lock_date_to_gmt' 	=> __('Ban to', 'wptsaf_security'),
				),
				'rows' => $rows
			)
		);
	}
}