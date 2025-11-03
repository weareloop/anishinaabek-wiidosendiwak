<?php

// Defines
define('FL_CHILD_THEME_DIR', get_stylesheet_directory());
define('FL_CHILD_THEME_URL', get_stylesheet_directory_uri());

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action('wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000);

// Global Variables
define("UABB_THEME_PATH", get_stylesheet_directory() . '/bb-ultimate-addon/');

// Scripts declaration
function loop_scripts()
{
    global $post;

    // Marquee Ticker
    // wp_enqueue_script('marquee_js', get_stylesheet_directory_uri() . '/seamless-content-scrolling-marquee/jquery.marquee.min.js', array('jquery'), rand());
    
    // SLICK
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/slick/slick.js', array('jquery'), rand());
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/slick/slick.css', array(), rand());

    // CSS Utility Classes (Shortcode)
    wp_enqueue_style('shortcode',  get_stylesheet_directory_uri() . '/css/style_shortcode.css', array(), rand());

    // Interface
    wp_enqueue_style('interface',   get_stylesheet_directory_uri() . '/css/interface.css', array(), rand());
    //wp_enqueue_style( 'interface-responsive',   get_stylesheet_directory_uri() . '/interface/interface_responsive.css',array(),rand());
    wp_enqueue_script('interface', get_stylesheet_directory_uri() . '/javascript/interface.js', array('jquery'), rand());


    wp_enqueue_style( 'post-styles',   get_stylesheet_directory_uri() . '/components/post-type/post/post.css',array(),rand());

    // CUSTOM JS
    wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/javascript/main.js', array('jquery'), rand());


    // Fonts + Icons
    //wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',array(),rand());
    //wp_enqueue_style( 'ultimate-icons', get_stylesheet_directory_uri() . '/../../uploads/bb-plugin/icons/ultimate-icons/style.css?ver=2.5.5.4',array(),rand());

    // Includes (modules)
    //wp_enqueue_style( 'people-post',   get_stylesheet_directory_uri() . '/includes/post-types/people/people.css',array(),rand());
    //wp_enqueue_style( 'timeline-post',   get_stylesheet_directory_uri() . '/includes/post-types/timeline/timeline.css',array(),rand());
}
add_action('wp_enqueue_scripts', 'loop_scripts', 999999);

// Functions++
//include_once(dirname( __FILE__ )."/functions_modules.php");
//include_once(dirname( __FILE__ )."/functions_structure.php");
include_once(dirname(__FILE__) . "/components/post-type/dev-page/dev-page.php");
function dev_page()
{
    // Only enqueue on Dev Page CPTs
    if (is_singular('dev-page')) {
        wp_enqueue_style('text-basics', get_stylesheet_directory_uri() . '/components/post-type/dev-page/dev-page.css', array(), rand());
    }
}
add_action('wp_enqueue_scripts', 'dev_page', 999999);

/////////////////
// text-basics //
/////////////////
include_once(dirname(__FILE__) . "/components/text-basics/text-basics.php");
function text_basics()
{
    wp_enqueue_script('text-basics',  get_stylesheet_directory_uri() . '/components/text-basics/text-basics.js', array('jquery'), rand());
    wp_enqueue_style('text-basics', get_stylesheet_directory_uri() . '/components/text-basics/text-basics.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'text_basics', 999999);


////////////////
// statistics //
////////////////
function statistics()
{
    wp_enqueue_script('statistics',  get_stylesheet_directory_uri() . '/components/statistics/statistics.js', array('jquery'), rand());
    wp_enqueue_style('statistics', get_stylesheet_directory_uri() . '/components/statistics/statistics.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'statistics', 999999);

/////////////////
// simple post //
/////////////////
include_once(dirname(__FILE__) . "/components/post-type/post/post.php");
function simple_post()
{
    wp_enqueue_script('simple-post',  get_stylesheet_directory_uri() . '/components/post-type/post/post.js', array('jquery'), rand());
    wp_enqueue_style('simple-post', get_stylesheet_directory_uri() . '/components/post-type/post/post.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'simple_post', 999999);

///////////////////
// Featured Card //
///////////////////
function featured_card()
{
    wp_enqueue_script('featured-card',  get_stylesheet_directory_uri() . '/components/featured-card/featured-card.js', array('jquery'), rand());
    wp_enqueue_style('featured-card', get_stylesheet_directory_uri() . '/components/featured-card/featured-card.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'featured_card', 999999);


////////////
// People //
////////////
include_once(dirname(__FILE__) . "/components/people/people.php");
function people()
{
    wp_enqueue_script('people',  get_stylesheet_directory_uri() . '/components/people/people.js', array('jquery'), rand());
    wp_enqueue_style('people', get_stylesheet_directory_uri() . '/components/people/people.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'people', 999999);


///////////////
// Carousels //
///////////////
include_once(dirname(__FILE__) . "/components/carousels/carousels.php");
function carousels()
{
    wp_enqueue_script('carousels',  get_stylesheet_directory_uri() . '/components/carousels/carousels.js', array('jquery'), rand());
    wp_enqueue_style('carousels', get_stylesheet_directory_uri() . '/components/carousels/carousels.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'carousels', 999999);

/////////////////
// Image-Video //
/////////////////
include_once(dirname(__FILE__) . "/components/image-video/image-video.php");
function image_video()
{
    wp_enqueue_script('image-video',  get_stylesheet_directory_uri() . '/components/image-video/image-video.js', array('jquery'), rand());
    wp_enqueue_style('image-video', get_stylesheet_directory_uri() . '/components/image-video/image-video.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'image_video', 999999);

///////////////
// Animation //
///////////////
// include_once(dirname(__FILE__) . "/components/animation/animation.php");
function animation()
{
    wp_enqueue_script('animation',  get_stylesheet_directory_uri() . '/components/animation/animation.js', array('jquery'), rand());
    wp_enqueue_style('animation', get_stylesheet_directory_uri() . '/components/animation/animation.css', array(), rand());
}
add_action('wp_enqueue_scripts', 'animation', 999999);


/////////////////////////////////////////
// Google Analytics tracking code //
////////////////////////////////////////
function google_analytics_tracking() 
{ 
    $analytics_ua  = get_field('site_options_analytics_ua', 'option'); 
    $analytics_ga4 = get_field('site_options_analytics_ga4', 'option'); 
    if ($analytics_ua || $analytics_ga4) {
        if ($analytics_ua && $analytics_ga4) $script_id = $analytics_ga4;
        else if ($analytics_ua && !$analytics_ga4) $script_id = $analytics_ua;
        else $script_id = $analytics_ga4;
	?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?=$script_id;?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            
            <?php if ($analytics_ga4) { ?>gtag('config', '<?=$analytics_ga4;?>');<?php } ?>
            <?php if ($analytics_ua) { ?>gtag('config', '<?=$analytics_ua;?>');<?php } ?>
        </script>

    <?php
    }
}
add_action( 'wp_head', 'google_analytics_tracking', 10 );




///////////////
// Gutenberg //
///////////////

// Disable Gutemberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('gutenberg_can_edit_post_type', '__return_false');

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);




//////////////////////////////////
// Remove items from admin menu // 
//////////////////////////////////
add_action('admin_init', 'my_remove_menu_pages');
function my_remove_menu_pages()
{

    if (is_user_logged_in()) { // check if there is a logged in user 

        // global $user_ID;
        // if ( $user_ID != 1 ) { // use this to restric to user ID


        $user = wp_get_current_user(); // getting & setting the current user 
        $roles = (array) $user->roles; // obtaining the role 

        // Remove admin menu items for EDITORS 
        if (in_array("editor", $roles)) {
            remove_menu_page('wpseo_workouts'); //  Yoast SEO 
            remove_menu_page('tools.php'); // Tools
            remove_menu_page('site-options'); // Tools
        }
    }

    // remove_menu_page('upload.php'); // Media
    // remove_menu_page('link-manager.php'); // Links
    // remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('edit.php?post_type=page'); // Pages
    // remove_menu_page('plugins.php'); // Plugins
    // remove_menu_page('themes.php'); // Appearance
    // remove_menu_page('users.php'); // Users
    // remove_menu_page('options-general.php'); // Settings

}


////////////////////////////////////////////
// Change order of menu items in wp-admin //
////////////////////////////////////////////
add_filter('custom_menu_order', function () {
    return true;
});
add_filter('menu_order', 'my_new_admin_menu_order');
function my_new_admin_menu_order($menu_order)
{
    $new_positions = array(
        // set the URL type and the order of each menu option 
        'site-options' => 2,
        'upload.php' => 3, // Media
        'edit.php?post_type=page' => 4, // Pages
        'edit.php' => 5, // Posts
    );

    // helper functions 
    function move_element(&$array, $a, $b)
    {
        $out = array_splice($array, $a, 1);
        array_splice($array, $b, 0, $out);
    }
    foreach ($new_positions as $value => $new_index) {
        if ($current_index = array_search($value, $menu_order)) {
            move_element($menu_order, $current_index, $new_index);
        }
    }
    return $menu_order;
};



/////////////////////////
// Customizing TOP BAR //
/////////////////////////
function update_adminbar($wp_adminbar)
{
    // remove unnecessary items
    $wp_adminbar->remove_node('wp-logo');
    $wp_adminbar->remove_node('customize');
    $wp_adminbar->remove_node('updates');
    $wp_adminbar->remove_node('comments');
    $wp_adminbar->remove_node('new-content');
    $wp_adminbar->remove_node('wpseo-menu');
    $wp_adminbar->remove_node('wpforms-menu');
}
// admin_bar_menu hook
add_action('admin_bar_menu', 'update_adminbar', 999);



////////////////////////////////
// Disable Comments coss-site //
////////////////////////////////
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});


////////////////////////////////////
// Remove tags support from posts //
////////////////////////////////////
function myprefix_unregister_tags()
{
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');



/////////////////////////////////////////////////////////////
// Enable Admin role to use HTML in Beaver Builder modules //
/////////////////////////////////////////////////////////////
add_filter('fl_builder_ui_js_config', function ($config) {
    $user = wp_get_current_user();
    $role = $user->roles[0];
    if ($role == "administrator") {
        $config['userCaps']['unfiltered_html'] = true;
    }
    return $config;
}, 10);

/////////////////////////////////////////
// Allow SVG uploads in Beaver Builder //
/////////////////////////////////////////
function prfx_bb_add_svg_support($regex)
{
    $regex = array(
        'photo' => '#(jpe?g|png|gif|bmp|tiff?|svg)#i',
    );
    return $regex;
}
add_filter('fl_module_upload_regex', 'prfx_bb_add_svg_support');




/////////////////////////////////
// Allow shortcodes in WP Menu //
/////////////////////////////////
add_filter('wp_nav_menu', 'do_shortcode');



////////////////////////////////////////////
// Add the post thumbnail to admin panel  //
////////////////////////////////////////////
function my_custom_column_content($column)
{
    if ($column == 'featuredimage') {
        global $post;
        echo (has_post_thumbnail($post->ID)) ? the_post_thumbnail(array(100, 100)) : "";
    }
}
add_action('manage_fl-builder-template_posts_custom_column', 'my_custom_column_content'); // Beaver themer post type
add_action('manage_post_posts_custom_column', 'my_custom_column_content'); // WP Post core post type
function my_custom_column_setup($columns)
{
    return array_merge(array('featuredimage' => 'Thumbnail'), $columns);
}
add_filter('manage_edit-fl-builder-template_columns', 'my_custom_column_setup'); // Beaver themer post type
add_filter('manage_edit-post_columns', 'my_custom_column_setup'); // WP Post core post type
function my_admin_head()
{
    echo '<style type="text/css"> body.wp-admin table.wp-list-table .column-featuredimage { width:100px; } img.wp-post-image {border:1px solid #aaa} </style>';
}
add_action('admin_head', 'my_admin_head');



/////////////////////////////////////
// Tiny MCE Editor: Remove buttons //
/////////////////////////////////////
add_filter('mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
function jivedig_remove_tiny_mce_buttons_from_editor($buttons)
{

    $remove_buttons = array(
        //'bold',
        //'italic',
        'strikethrough',
        'formatselect',
        //'bullist',
        //'numlist',
        //'blockquote',
        //'hr', // horizontal line
        'alignleft',
        'aligncenter',
        'alignright',
        //'link',
        //'unlink',
        'wp_more', // read more link
        'spellchecker',
        'dfw', // distraction free writing mode
        'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
    );
    foreach ($buttons as $button_key => $button_value) {
        if (in_array($button_value, $remove_buttons)) {
            unset($buttons[$button_key]);
        }
    }
    return $buttons;
}

///////////////////////////////////////////////////////
// Tiny MCE: Remove all formatting when pasting text //
///////////////////////////////////////////////////////
add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');
function ag_tinymce_paste_as_text($init)
{

    // $init['paste_as_text'] = true;

    //$in['remove_linebreaks'] = true;
    //$in['gecko_spellcheck'] = false;
    $in['keep_styles'] = false;
    $in['accessibility_focus'] = true;
    $in['paste_remove_styles'] = true;
    //$in['paste_remove_spans'] = true;
    $in['paste_strip_class_attributes'] = 'all';
    //$in['paste_text_use_dialog'] = false;
    //$in['wpeditimage_disable_captions'] = true;
    //$in['plugins'] = 'tabfocus,paste';
    //$in['wpautop'] = false;
    $in['apply_source_formatting'] = false;
    $in['paste_preprocess'] = "function(pl,o){ 
        // remove the following tags completely:
          o.content = o.content.replace(/<\/*(applet|area|article|aside|audio|base|basefont|bdi|bdo|body|button|canvas|command|datalist|details|embed|figcaption|figure|font|footer|frame|frameset|head|header|hgroup|hr|html|iframe|img|keygen|link|map|mark|menu|meta|meter|nav|noframes|noscript|object|optgroup|output|param|progress|rp|rt|ruby|script|section|source|span|style|summary|time|title|track|video|wbr)[^>]*>/gi,'');
        // remove all attributes from these tags:
          o.content = o.content.replace(/<(div|table|tbody|tr|td|th|p|b|font|strong|i|em|h1|h2|h3|h4|h5|h6|hr|ul|li|ol|code|blockquote|address|dir|dt|dd|dl|big|cite|del|dfn|ins|kbd|q|samp|small|s|strike|sub|sup|tt|u|var|caption) [^>]*>/gi,'<$1>');
        // keep only href in the a tag (needs to be refined to also keep _target and ID):
        // o.content = o.content.replace(/<a [^>]*href=(\"|')(.*?)(\"|')[^>]*>/gi,'<a href=\"$2\">');
        // replace br tag with p tag:
          if (o.content.match(/<br[\/\s]*>/gi)) {
            o.content = o.content.replace(/<br[\s\/]*>/gi,'</p><p>');
          }
        // replace div tag with p tag:
          o.content = o.content.replace(/<(\/)*div[^>]*>/gi,'<$1p>');
        // remove double paragraphs:
          o.content = o.content.replace(/<\/p>[\s\\r\\n]+<\/p>/gi,'</p></p>');
          o.content = o.content.replace(/<\<p>[\s\\r\\n]+<p>/gi,'<p><p>');
          o.content = o.content.replace(/<\/p>[\s\\r\\n]+<\/p>/gi,'</p></p>');
          o.content = o.content.replace(/<\<p>[\s\\r\\n]+<p>/gi,'<p><p>');
          o.content = o.content.replace(/(<\/p>)+/gi,'</p>');
          o.content = o.content.replace(/(<p>)+/gi,'<p>');
        }";
    return $init;
}



//////////////////////////////////
// Disable Search Functionality //
//////////////////////////////////
/*
function search_disable( $query, $error = true ) {
	if ( is_search() ) {
        wp_redirect(home_url());
        exit();
	}
}
add_action( 'parse_query', 'search_disable' );
*/


/////////////////////////////
// Login Custom  Branding  //
/////////////////////////////
function custom_loginlogo()
{
    $img_filename = get_field('site_options_logo_main', 'option');
    echo '  <style type="text/css">.login h1 a {background-image: url(' . $img_filename . ') !important;width: 100%;background-size: contain; }</style>';
}
add_action('login_head', 'custom_loginlogo');

function wpb_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title()
{
    return get_option('blogdescription');
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');



//////////////////////////////// 
// Media Library: add columns //
////////////////////////////////

function column_id($columns)
{
    $columns['media_alt'] = __('Alt');
    $columns['media_dimensions'] = __('Dimensions');
    return $columns;
}
add_filter('manage_media_columns', 'column_id');

function column_id_row($columnName, $columnID)
{
    if ($columnName == 'media_alt') {
        $image_alt = get_post_meta($columnID, '_wp_attachment_image_alt', true);
        echo $image_alt;
    }
    if ($columnName == 'media_dimensions') {
        $image_size = wp_get_attachment_image_src($columnID, 'full');
        if ($image_size) {
            echo $image_size[1] . ' x ' . $image_size[2];
        }
    }
}
add_filter('manage_media_custom_column', 'column_id_row', 10, 2);





/////////////////////////////////
// WP Admin Bar Enable/Disable //
/////////////////////////////////
/* Code from https://element.how/wordpress-toggle-admin-bar/
 * Copyright 2023 Maxime Desrosiers 
 * V1.0 2023/01/03
 */
add_action('wp_footer', 'elementhow_add_admin_bar_button');

function elementhow_add_admin_bar_button()
{
    if (current_user_can('administrator')) {
?>
        <div id='toggle-admin-bar-wrapper' style="z-index:100;position:fixed; left:20px; bottom:20px;transform:translate(-10px,20px)">
            <button id="toggle-admin-bar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path style="fill:#000" d="M0 0h48v48H0z" />
                    <path style="fill:#ffca38" d="M 22 49 m 4 -44 h -4 v 20 h 4 V 4 z m 7 5 l -3 3 a 12 12 0 1 1 -12 0 l -3 -3 a 16 16 0 1 0 18 0" />
                </svg>
            </button>
            <button id="toggle-admin-bar-position">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                    <path d="M22 9a1 1 0 0 0 0 1.4l4.6 4.6H3.1a1 1 0 1 0 0 2h23.5L22 21.6a1 1 0 0 0 0 1.4 1 1 0 0 0 1.4 0l6.4-6.4a.9.9 0 0 0 0-1.2L23.4 9A1 1 0 0 0 22 9Z" />
                </svg>
            </button>
            <button id="remove-toggle-admin-bar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1024">
                    <path d="M640 320 512 192 320 384 128 192 0 320l192 192L0 704l128 128 192-192 192 192 128-128-192-192 192-192z" />
                </svg>
            </button>
        </div>

        <style>
            #toggle-admin-bar-wrapper {
                opacity: 0.6;
            }

            #remove-toggle-admin-bar {
                padding: 0;
                border: none;
                background-color: transparent;
                cursor: pointer;
                position: absolute;
                left: -5px;
                top: -12px;
                cursor: pointer;
            }

            #remove-toggle-admin-bar svg {
                width: 12px;
                height: 12px;
            }

            .is-lower-left #remove-toggle-admin-bar {
                left: 14px;
            }

            #toggle-admin-bar {
                padding: 0;
                border: none;
                background-color: transparent;
                cursor: pointer;
                border-radius: 100px;
                overflow: hidden;
                width: 25px;
                height: 25px;
            }

            #toggle-admin-bar svg {
                border-radius: 100px;
                width: 25px;
                height: 26px;
            }

            #toggle-admin-bar-position {
                background-color: transparent;
                position: absolute;
                border: none;
                left: -2px;
                bottom: -16px;
                cursor: pointer;
                padding: 1px 6px;
                display: none;
            }

            #toggle-admin-bar-position svg {
                width: 18px;
                height: 18px;
            }

            .is-lower-left #toggle-admin-bar-position svg {
                transform: rotate(180deg);
            }
        </style>

        <script>
            (function() {
                setTimeout(function() {
                    let adminBar = document.getElementById('wpadminbar');
                    let toggleAdminWrapper = document.getElementById('toggle-admin-bar-wrapper');
                    let toggleAdminBar = document.getElementById('toggle-admin-bar');
                    let toggleAdminPosition = document.getElementById('toggle-admin-bar-position');
                    let removeAdminBarToggle = document.getElementById('remove-toggle-admin-bar');

                    if (!adminBar) {
                        toggleAdminWrapper.remove();
                        return;
                    }

                    function updateAdminBarVisibility(show) {
                        if (show) {
                            adminBar.style.display = 'block';
                            document.body.classList.add('admin-bar');
                            document.body.style.removeProperty('margin-top');
                            document.querySelectorAll('.elementor-sticky--active').forEach(e => e.style.transform = 'translateY(0)')
                        } else {
                            adminBar.style.display = 'none';
                            document.body.classList.remove('admin-bar');
                            if (window.innerWidth > 782) {
                                document.body.style.marginTop = '-32px';
                                document.querySelectorAll('.elementor-sticky--active').forEach(e => e.style.transform = 'translateY(-32px)');
                            } else {
                                document.body.style.marginTop = '-46px';
                            }
                        }
                    }

                    toggleAdminBar.addEventListener('click', function() {
                        let isDisplayed = adminBar.style.display !== 'none';
                        updateAdminBarVisibility(!isDisplayed);
                        localStorage.setItem('adminBarVisible', !isDisplayed);
                    });

                    toggleAdminPosition.addEventListener('click', function() {
                        if (toggleAdminWrapper.style.left === '20px') {
                            toggleAdminWrapper.style.left = 'auto';
                            toggleAdminWrapper.style.right = '20px';
                            toggleAdminWrapper.classList.add('is-lower-left');
                        } else {
                            toggleAdminWrapper.style.left = '20px';
                            toggleAdminWrapper.style.right = 'auto';
                            toggleAdminWrapper.classList.remove('is-lower-left');
                        }
                        localStorage.setItem('toggleAdminPosition', toggleAdminWrapper.style.left);
                    });

                    removeAdminBarToggle.addEventListener('click', function() {
                        toggleAdminWrapper.remove();
                    });

                    function restoreOnPageLoad() {
                        let storedVisibility = localStorage.getItem('adminBarVisible');
                        let storedPosition = localStorage.getItem('toggleAdminPosition');

                        if (storedVisibility !== null) {
                            updateAdminBarVisibility(storedVisibility === 'true');
                        }
                        if (storedPosition !== null) {
                            if (storedPosition === '20px') {
                                toggleAdminWrapper.style.left = '20px';
                                toggleAdminWrapper.style.right = 'auto';
                                toggleAdminWrapper.classList.remove('is-lower-left');
                            } else {
                                toggleAdminWrapper.style.left = 'auto';
                                toggleAdminWrapper.style.right = '20px';
                                toggleAdminWrapper.classList.add('is-lower-left');
                            }
                        }
                    }
                    restoreOnPageLoad();

                }, 1000)


            }());
        </script>
<?php
    }
}
