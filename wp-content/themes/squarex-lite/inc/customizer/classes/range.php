<?php
/**
 * Add range control.
 *
 */
if ( !class_exists('WP_Customize_Range_Control') ) :
	class WP_Customize_Range_Control extends WP_Customize_Control
	{
		public $type = 'custom_range';
    		public function enqueue()
    	{
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-slider' );
    	}
	public function render_content()
    	{ ?>

	<label>
	<?php if ( ! empty( $this->label )) : ?>
                	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	<?php endif; ?>
		<input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	<?php if ( ! empty( $this->description )) : ?>
                	<span class="description customize-control-description"><?php echo $this->description; ?></span>
	<?php endif; ?>
	</label>
<?php
    	}
}
endif;