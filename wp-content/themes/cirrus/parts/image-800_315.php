<?php
if (has_post_thumbnail() && (get_post_meta($post->ID, 'include_image_on_page', true) == "true" )) {
    the_post_thumbnail('nimbus_800_315', array('class' => 'nimbus_800_315'));
} else {
    if (nimbus_get_option('reminder_images') == "on"  || (in_the_loop() == false) ) {
    ?>
        <img class="nimbus_800_315" src="<?php echo get_template_directory_uri(); ?>/images/preview/nimbus_800_315_<?php echo rand(1,3); ?>.jpg" alt="<?php the_title(); ?>" />
    <?php
    }
}
?>