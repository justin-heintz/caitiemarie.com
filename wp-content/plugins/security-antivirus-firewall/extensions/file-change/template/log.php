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

$id = 'detail-log-' . mt_rand();
?>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $extensionTitle . ': ' . __('Detailed log', 'wptsaf_security'); ?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php if ($limitMessage) : ?>
					<div class="limit-message alert alert-warning">
						<?php echo $limitMessage; ?>
					</div>
				<?php endif; ?>
				
				<div class="wrapper-log">
					<table id="<?php echo $id; ?>" class="log table table-striped table-bordered">
						<thead>
						<tr>
							<?php foreach ($header as $title) : ?>
								<th>
									<?php echo __($title, 'wptsaf_security'); ?>
								</th>
							<?php endforeach; ?>
							<th><?php _e('Actions', 'wptsaf_security'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php $columns = array_keys($header); ?>
						<?php foreach ($rows as $row) : ?>
							<tr>
								<?php foreach ($columns as $column) : ?>
									<td><?php echo $row[$column]; ?></td>
								<?php endforeach; ?>
								<td><?php echo $row['id']; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="clear"></div>
				
				<div class="ln_solid"></div>
				<div class="buttons">
					<button class="btn btn-default pull-right btn-popup-close">
						<?php _e('Close', 'wptsaf_security'); ?>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	(function ($) {
		$('#<?php echo $id; ?>').dataTable( {
			sDom: '<"top"<"dataTables_group_block"B><"dataTables_group_block"lp>>rt<"bottom"fip>',
			"pageLength": 50,
			"lengthMenu": [50, 100, 200],
			ordering: false,
			searching: false,
			responsive: true,
			buttons: [
				{
					text: 'Download log',
					action: function () {
						window.open(wptsafSecurity.ajaxUrl + '?action=wptsaf_security&extension=file-change&method=logExport&nonce=' + wptsafSecurity.ajaxNonce,'_blank');
					}
				},
				{
					text: 'Clear log',
					action: function () {
						wptsafDataAction.processAction(null, 'action=wptsaf_security&extension=file-change&method=logAskClear', null, false);
					}
				}
			],
			columns: [
				{
					data: 'date_gmt'
				},
				{
					data: 'added'
				},
				{
					data: 'removed'
				},
				{
					data: 'changed'
				},
				/*{
					data: 'probably_infected '
				},*/
				{
					data: 'actions',
					render: function (data, type, row ) {
						var id = data;

						return '<button class="btn btn-info btn-xs"'
							+ 'data-action="action=wptsaf_security&extension=file-change&'
							+ 'method=logRow&args[id]=' + id + '"'
							+ '>'
							+ '<?php _e('Detail', 'wptsaf_security'); ?>'
							+ '</button>';
					}
				}
			]
		});
	})(jQuery);
</script>
