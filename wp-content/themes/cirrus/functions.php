<?php

/* * *************************************************************************************************** */
// Define Constants
/* * *************************************************************************************************** */

$get_wp_version = get_bloginfo('version');
$theme_data = wp_get_theme();
define('OPTIONS_PATH', get_stylesheet_directory_uri() . '/nimbus/');
define('THEME_NAME', $theme_data['Name']);
define('THEME_OPTIONS', str_replace(" ", "_", strtolower(THEME_NAME)) . "_options");
define('SALESPAGEURL', 'http://www.nimbusthemes.com/wordpress-themes/cirrus/');
define('SUPPORTINFOURL', 'http://www.nimbusthemes.com/support/');


/* * *************************************************************************************************** */
// Load Admin Panel
/* * *************************************************************************************************** */

require_once(get_template_directory() . '/nimbus/options.php');
require_once(get_template_directory() . '/nimbus/options_arr.php');


/* * *************************************************************************************************** */
// Flush Rewrite on Activation
/* * *************************************************************************************************** */

function nimbus_rewrite_flush() {
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'nimbus_rewrite_flush');


/* * *************************************************************************************************** */
// Setup Theme
/* * *************************************************************************************************** */

add_action('after_setup_theme', 'nimbus_setup');

if (!function_exists('nimbus_setup')):

    function nimbus_setup() {

       // Localization
        
        $lang_local = get_template_directory() . '/lang';
        load_theme_textdomain('nimbus', $lang_local);

        // Register Thumbnail Sizes

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1160, 9999, true);
        add_image_size('nimbus_140_137', 140, 137, true);
        add_image_size('nimbus_1170_315', 1170, 315, true);
        add_image_size('nimbus_800_315', 800, 315, true);
        add_image_size('nimbus_1102_315', 1102, 315, true);

        // Load feed links	

        add_theme_support('automatic-feed-links');
        
        // Support Custom Background
        
        $nimbus_custom_background_defaults = array(
            'default-color' => 'ffffff'
        );
        add_theme_support( 'custom-background', $nimbus_custom_background_defaults );

        // Register Menus

        if (function_exists('register_nav_menu')) {
            register_nav_menu('mobile', __('Mobile Menu', 'nimbus'));
            register_nav_menu('top-bar', __('Primary Menu', 'nimbus'));
        }
    }

endif;


/* * *************************************************************************************************** */
// Override gallery style
/* * *************************************************************************************************** */

add_filter( 'use_default_gallery_style', '__return_false' );


/* * *************************************************************************************************** */
// Set Content Width
/* * *************************************************************************************************** */

if (!isset($content_width))
    $content_width = 770;


/* * *************************************************************************************************** */
// Register Sidebars
/* * *************************************************************************************************** */

add_action('widgets_init', 'nimbus_register_sidebars');

function nimbus_register_sidebars() {


    register_sidebar(array(
        'name' => __('Frontpage Sidebar', 'nimbus'),
        'id' => 'sidebar_frontpage',
        'description' => __('Widgets in this area will be displayed in the sidebar on the frontpage.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget sidebar sidebar_editable widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Default Page Sidebar', 'nimbus'),
        'id' => 'sidebar_pages',
        'description' => __('Widgets in this area will be displayed in the sidebar on the pages.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget sidebar sidebar_editable widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Blog Sidebar', 'nimbus'),
        'id' => 'sidebar_blog',
        'description' => __('Widgets in this area will be displayed in the sidebar on all blog related post and archives.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget sidebar sidebar_editable widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => __('Footer Left', 'nimbus'),
        'id' => 'footer-left',
        'description' => __('Widgets in this area will be shown in the left footer column.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="footer_widget sidebar sidebar_editable widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Center', 'nimbus'),
        'id' => 'footer-center',
        'description' => __('Widgets in this area will be shown in the center footer column.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="footer_widget sidebar sidebar_editable widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'nimbus'),
        'id' => 'footer-right',
        'description' => __('Widgets in this area will be shown in the right footer column.', 'nimbus'),
        'before_widget' => '<div id="%1$s" class="footer_widget sidebar sidebar_editable widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));


    $i = 1;
    while ($i <= 20) {
        register_sidebar(array(
            'name' => __('Alternative Sidebar', 'nimbus') . $i,
            'id' => 'sidebar_' . $i,
            'description' => __('Widgets in this area will be displayed in the sidebar for any posts, or pages items that are taged with sidebar', 'nimbus') . $i . '.',
            'before_widget' => '<div class="sidebar_widget sidebar widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
        $i++;
    }
}


/* * *************************************************************************************************** */
// Modify Search Form
/* * *************************************************************************************************** */

function nimbus_modify_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . home_url()  . '/" >
            <div class="row-fluid">
            <div class="span8">';
    if (is_search()) {
        $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="Search this site" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
    }
    $form .= '</div><div class="span4"><input type="submit" id="searchsubmit" value="'.esc_attr(__('Go', 'nimbus')).'" />
            </div>
            </div>
            </form>';
    return $form;
}
add_filter('get_search_form', 'nimbus_modify_search_form');



/* * *************************************************************************************************** */
// Excerpt Modifications
/* * *************************************************************************************************** */

// Excerpt Length

add_filter('excerpt_length', 'nimbus_excerpt_length');

function nimbus_excerpt_length($length) {
    return 80;
}

// Excerpt More

add_filter('excerpt_more', 'nimbus_excerpt_more');

function nimbus_excerpt_more($more) {
    return '...';
}

// Add to pages

add_action('init', 'nimbus_add_excerpts_to_pages');

function nimbus_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}

/* * *************************************************************************************************** */
// Enable Threaded Comments
/* * *************************************************************************************************** */

add_action('wp_enqueue_scripts', 'nimbus_threaded_comments');

function nimbus_threaded_comments() {
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}

/* * *************************************************************************************************** */
// Modify Comments Output
/* * *************************************************************************************************** */

function nimbus_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li_comment_<?php comment_ID() ?>">
        <div id="comment_<?php comment_ID(); ?>" class="comment_wrap clearfix">
    <?php echo get_avatar($comment, $size = '75'); ?>
            <div class="comment_content">
                <p class="left"><strong><?php comment_author_link(); ?></strong><br />
                <?php echo(get_comment_date()) ?> <?php edit_comment_link(__('(Edit)', 'nimbus'), '  ', '') ?></p>
                <p class="right"><?php comment_reply_link(array_merge($args, array('reply_text' => __('Leave a Reply', 'nimbus'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                <div class="clear"></div>
    <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.', 'nimbus') ?></em>
    <?php endif; ?>
        <?php comment_text() ?>
            </div>
            <div class="clear"></div>
        </div> 

        <?php
    }

/* * *************************************************************************************************** */
// Modify Ping Output
/* * *************************************************************************************************** */

function nimbus_ping($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li id="comment_<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
<?php
}

/* * *************************************************************************************************** */
// Modify Comment Text Fields
/* * *************************************************************************************************** */

add_filter('comment_form_default_fields', 'nimbus_comment_fields');

function nimbus_comment_fields($fields) {

    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields['author'] = '<div class="row-fluid"><div class="span4 comment_fields"><p class="comment-form-author">' . '<label for="author">' . __('Name', 'nimbus') . '</label> ' . ( $req ? '<span class="required">*</span><br />' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>';
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . __('Email', 'nimbus') . '</label> ' . ( $req ? '<span class="required">*</span><br />' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>';
    $fields['url'] = '<p class="comment-form-url"><label for="url">' . __('Website', 'nimbus') . '</label><br />' . '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p></div> ';

    return $fields;
}


/* * *************************************************************************************************** */
// Register Featured Image Options Box
/* * *************************************************************************************************** */

add_action("admin_init", "nimbus_featured_image_options_meta_box");

function nimbus_featured_image_options_meta_box() {

    add_meta_box("featured_image_options_meta_box", THEME_NAME . __(' Featured Image Options', 'nimbus'), "nimbus_call_featured_image_options_meta_box", "page", "side", "high");
    add_meta_box("featured_image_options_meta_box", THEME_NAME . __(' Featured Image Options', 'nimbus'), "nimbus_call_featured_image_options_meta_box", "post", "side", "high");

}

function nimbus_call_featured_image_options_meta_box() {

    global $post, $wp_query;


    $custom = get_post_custom($post->ID);
    if (isset($custom["on_page_checked"])) {
        $on_page_checked = $custom["on_page_checked"][0];
    }

    echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';


    if (( get_option('page_on_front') ==  $post->ID )) { 
    ?>
        <p><?php _e('There are no image options because this page is set as the Front Page', 'nimbus') ?></p>
    <?php 
    } else {
    ?>        


        <p><?php _e('Remember you need to attach a Featured Image for these setting to take effect.', 'nimbus') ?></p>
        <table>
                <tr><td><label><input type="checkbox" name="on_page_checked" value="true" <?php if (( get_post_meta($post->ID, 'include_image_on_page', true) == "true" ) || ( get_post_status ( $post->ID ) == 'auto-draft' )) { ?> checked <?php } ?> /></label></td><td>Include Image at the Top of the Page</td></tr>                   
        </table>

    <?php } 

}

/* * *************************************************************************************************** */
// Save Featured Image Options Box
/* * *************************************************************************************************** */


add_action('save_post', 'nimbus_save_featured_image_options_meta_box');

function nimbus_save_featured_image_options_meta_box($post_id) {

    global $post;

    // verify nonce

    if (isset($_POST['meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    }

    // check autosave

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if (isset($_POST['post_type'])) {

        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    if (isset($_POST['on_page_checked'])) {
        update_post_meta($post_id, 'include_image_on_page', $_POST['on_page_checked']);
    } else {
        delete_post_meta($post_id, 'include_image_on_page');
    }
}



/* * *************************************************************************************************** */
// Register Sidebar Select Box
/* * *************************************************************************************************** */

add_action("admin_init", "nimbus_sidebar_meta_box");

function nimbus_sidebar_meta_box() {
    add_meta_box("sidebar_meta_box", THEME_NAME . __(' Sidebar Options', 'nimbus'), "nimbus_call_sidebar_meta_box", "page", "side", "high");
    add_meta_box("sidebar_meta_box", THEME_NAME . __(' Sidebar Options', 'nimbus'), "nimbus_call_sidebar_meta_box", "post", "side", "high");
}

function nimbus_call_sidebar_meta_box() {

    global $post;

    $custom = get_post_custom($post->ID);
    if (isset($custom["alt_sidebar_select"])) {
        $alt_sidebar_select = $custom["alt_sidebar_select"][0];
    } else {
        $alt_sidebar_select = "";
    }
    echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    ?>  

    <p><?php __('Enter the number of the alternate sidebar you would like to apply. Leave blank to use default.', 'nimbus') ?></p>
    <table>
        <tr><td><label><?php _e('Sidebar #', 'nimbus') ?></label></td><td><input type="text" name="alt_sidebar_select" style="width:35px;" value="<?php echo $alt_sidebar_select; ?>" size="20" maxlength="2" /></td></tr> 
    </table>
    <?php
}

/* * *************************************************************************************************** */
// Save Sidebar Select Box
/* * *************************************************************************************************** */

add_action('save_post', 'nimbus_save_sidebar_meta_box');

function nimbus_save_sidebar_meta_box($post_id) {

    global $post;

    // verify nonce

    if (isset($_POST['meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    }

    // check autosave

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if (isset($_POST['post_type'])) {
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    if (isset($_POST['alt_sidebar_select'])) {
        update_post_meta($post_id, 'alt_sidebar_select', $_POST['alt_sidebar_select']);
    }
}


/* **************************************************************************************************** */
// Load Admin CSS
/* **************************************************************************************************** */

add_action('admin_print_styles', 'nimbus_admin_styles');

function nimbus_admin_styles() {
    if (is_admin()) {
        wp_register_style("admin_css", get_template_directory_uri() . "/css/admin.css", array(), "1.0", "all");
        wp_enqueue_style('admin_css');
    }
}

/* * *************************************************************************************************** */
// Load Public Scripts
/* * *************************************************************************************************** */

add_action('wp_enqueue_scripts', 'nimbus_public_scripts');

function nimbus_public_scripts() {

    if (!is_admin()) {

        wp_enqueue_script('jquery');
        // not in use by theme
        // wp_enqueue_script('jquery-ui-core'); 

        wp_register_script('nibus_public', get_template_directory_uri() . '/js/nimbus_public.js', array('jquery'), '1.0' );
        wp_enqueue_script('nibus_public'); 

        wp_register_script('bootstrap', get_template_directory_uri() . '/js/jquery.bootstrap.min.js', array('jquery'), '2.2.2');
        wp_enqueue_script('bootstrap');

    }
}


/* **************************************************************************************************** */
// Load Public Scripts in Conditional
/* **************************************************************************************************** */

add_action('wp_head', 'nimbus_public_scripts_conditional');

function nimbus_public_scripts_conditional() {
?>
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
<?php
}

/* * *************************************************************************************************** */
// Load Public CSS
/* * *************************************************************************************************** */

add_action('wp_print_styles', 'nimbus_public_styles');

function nimbus_public_styles() {

    if (!is_admin()) {

        wp_register_style("bootstrap", get_template_directory_uri() . "/css/bootstrap.min.css", array(), "1.0", "all");
        wp_enqueue_style('bootstrap');

        wp_register_style("bootstrap_responsive", get_template_directory_uri() . "/css/bootstrap-responsive.min.css", array(), "1.0", "all");
        wp_enqueue_style('bootstrap_responsive');
        
        wp_register_style( 'nimbus-style', get_bloginfo( 'stylesheet_url' ), false, get_bloginfo('version') );
        wp_enqueue_style( 'nimbus-style' );
    }
}

/* * *************************************************************************************************** */
// Register Post Types
/* * *************************************************************************************************** */

// None

/* * *************************************************************************************************** */
// Register Post Type Taxonomies
/* * *************************************************************************************************** */

// None

/* * *************************************************************************************************** */
// Register Gravatar
/* * *************************************************************************************************** */

add_filter('avatar_defaults', 'nimbus_gravatar');

function nimbus_gravatar($avatar_defaults) {
    $myavatar = nimbus_get_option('gravatar');
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

/* * *************************************************************************************************** */
// Bootstrap Menu compatibility
/* * *************************************************************************************************** */

/**
 * Extended Walker class for use with the
 * Twitter Bootstrap toolkit Dropdown menus in Wordpress.
 * Edited to support n-levels submenu.
 * @author johnmegahan https://gist.github.com/1597994, Emanuele 'Tex' Tessore https://gist.github.com/3765640
 */
class BootstrapNavMenuWalker extends Walker_Nav_Menu {
 
 
	function start_lvl( &$output, $depth = 0, $args = array() ) {
 
		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
 
	}
 
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
 
 
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		$li_attributes = '';
		$class_names = $value = '';
 
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if($depth && $args->has_children){
			$classes[] = 'dropdown-submenu';
		}
 
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
 
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;
 
 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
 
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		//v($element);
		if ( !$element )
			return;
 
		$id_field = $this->db_fields['id'];
 
		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
 
		$id = $element->$id_field;
 
		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
 
			foreach( $children_elements[ $id ] as $child ){
 
				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}
 
		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}
 
		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
 
	}
    
    public static function fallback( $args ) {
        $args = array(
            'depth'       => 2,
            'sort_column' => 'menu_order, post_title',
            'menu_class'  => 'fallback_cb',
            'include'     => '',
            'exclude'     => '',
            'echo'        => true,
            'show_home'   => 'Home',
            'link_before' => '',
            'link_after'  => '' 
        );
        wp_page_menu($args);
    }
    
 
}
