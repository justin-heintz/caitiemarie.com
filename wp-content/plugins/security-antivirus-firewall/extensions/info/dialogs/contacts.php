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

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel saf_blue_panel">
			<div class="x_title">
				<h2><?php _e('Get Benefits of Premium Security', 'wptsaf_security'); ?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<p class="h5_small"><?php _e('make your website even more secured and safe with PREMIUM features of the S.A.F. package', 'wptsaf_security'); ?></p>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4> <i class="fa fa-check-circle"></i> <?php _e('Advanced IP’s ban list management tool', 'wptsaf_security'); ?></h4>
						<h4> <i class="fa fa-check-circle"></i> <?php _e('Advanced blocking timers firewall tools', 'wptsaf_security'); ?></h4>
						<h4> <i class="fa fa-check-circle"></i> <?php _e('Custom firewall block mode', 'wptsaf_security'); ?></h4>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4> <i class="fa fa-check-circle"></i> <?php _e('Ban function in 404 attacks detection module', 'wptsaf_security'); ?></h4>
						<h4> <i class="fa fa-check-circle"></i> <?php _e('and much more...', 'wptsaf_security'); ?></h4>
					</div>
				</div>
				<p class="text-center">
						<a href="http://wptools.co/links/saf-pro" target="_blank" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp; 
							<?php _e('Get Premium Version', 'wptsaf_security'); ?> 
						&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<?php if(WPTSAF_ACCESS_OFFER) { ?>
						<a href="http://wptools.co/links/saf-premiumfree" target="_blank" class="btn btn-success ">
							<?php _e('Get Premium version for FREE', 'wptsaf_security'); ?>
						</a>
				<?php } ?>
				</p>
			</div>
		</div>
	</div>
</div>
