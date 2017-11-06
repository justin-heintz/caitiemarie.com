<?php
$social_type = array("facebook_url", "linkedin_url", "twitter_url", "youtube_url", "google_plus_url");
foreach ($social_type as $key => $id) {
    $$id = trim(nimbus_get_option($id));
    if (empty($$id)) {
        if (nimbus_get_option('nimbus_example_content') == "on") {
            $$id = '#';
        }
    } else {
        $id = $$id;
    }
}
if (nimbus_get_option('display_social_buttons') == 1) { 
?>
    <ul id="social">
        <?php 
        if (!empty($facebook_url)) { 
            echo"<li id='facebook_button'><a target='_blank' href='" . $facebook_url . "'></a></li>";
        } 
        if (!empty($linkedin_url)) { 
            echo"<li id='linkedin_button'><a target='_blank' href='" . $linkedin_url . "'></a></li>";
        }
        if (!empty($twitter_url)) { 
            echo"<li id='twitter_button'><a target='_blank' href='" . $twitter_url . "'></a></li>";
        }
        if (!empty($youtube_url)) { 
            echo"<li id='youtube_button'><a target='_blank' href='" . $youtube_url . "'></a></li>";
        }
        if (!empty($google_plus_url)) { 
            echo"<li id='google_plus_button'><a target='_blank' href='" . $google_plus_url . "'></a></li>";
        }
        ?>        
        <li id="rss_button"><a href="<?php bloginfo('rss2_url'); ?>"></a></li>
    </ul>
<?php 
} else { 
 
} 
?>
<div class="clear"></div>