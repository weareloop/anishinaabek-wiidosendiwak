<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php do_action( 'fl_head_open' ); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php //echo apply_filters( 'fl_theme_viewport', "<meta name='viewport' content='width=device-width, initial-scale=1.0' />\n" ); ?>
<?php echo apply_filters( 'fl_theme_viewport', '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">'."\n"); ?>
<?php echo apply_filters( 'fl_theme_xua_compatible', "<meta http-equiv='X-UA-Compatible' content='IE=edge' />\n" ); ?>
<link rel="profile" href="https://gmpg.org/xfn/11" />
   
<?php

wp_head(); 

FLTheme::head();

?>
</head>
<body <?php body_class(); ?><?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/WebPage"' ); ?>>

<?php

    ////////////////
    // NEW HEADER //
    ////////////////
    do_action( 'fl_page_open' );
	do_action( 'fl_before_header' );

    class Push_Menu_Walker extends Walker_Nav_Menu {
        function start_lvl( &$output, $depth = 0, $args = array() ) {
            $display_depth = ( $depth + 1); // because it counts the first submenu as 0
            $classes = "";
            if (isset($item->classes)) $classes = implode(" ",$item->classes);
            $output .= '<ul data-depth="'.$depth.'" class="sub-menu '.$classes.'">';
        }

        function start_el( &$output, $item, $depth = 5, $args = array(), $id = 0 ) {

            $attributes  = '';
            $attributes .= ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
            $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
            $title = $item->title;
            $attr_title = $item->attr_title;
            $desc = $item->description;
                if($desc) $desc = "<span>".$desc."</span>";
            $classes = $item->classes;
                if ($classes) $classes = implode(" ",$item->classes);

            $output .= '<li class="mainmenu_item '.$classes.'" data-id="menu-'.$item->ID.'-title">';

            // Main menu HOME
            // Loads the main logo image from ACF "Site Options"
            if (strpos($classes,"mainmenu_home") !== false) {
                $item_output = '<a id="menu-'.$item->ID.'-title" href="/"><img src="'.get_field('site_options_logo_main', 'option').'" alt="Home"></a>';
            }
            
            // Mega Menu image
           else if (strpos($classes,"mega_image") !== false) {
                $item_output = '<img class="mega_image" src="'.$title.'" alt="">';
            }
            // Button with submenu
           else if (strpos($classes,"has_submenu") !== false) {
                $item_output = '<button id="menu-'.$item->ID.'-title" aria-expanded="false">'.$title.'</button>';
            }
            // Just title
            else if (strpos($classes,"mainmenu_sub") !== false) {
                $item_output = '<h3 id="menu-'.$item->ID.'-title">'.$title.'</h3>';
            }
            // Container
            else if (strpos($classes,"mainmenu_cont") !== false) {
                $item_output = '<div id="menu-'.$item->ID.'-title">'.$title.'</div>';
            }
            // Image
            else if (strpos($classes,"mainmenu_image") !== false) {
                $item_output = '<div aria-hidden="true"></div>';
            }
            // Button CTA
            else if (strpos($classes,"button_cta") !== false) {
                $item_output = '<button id="menu-'.$item->ID.'-title" onclick="location.href=\''.esc_attr( $item->url).'\'">'.$title.'</button>';
            }
            // Shortcode
            else if (strpos($classes,"shortcode") !== false) {
                $item_output = do_shortcode($title);
            } else {
                $item_output = '<a id="menu-' . $item->ID . '-title" href="' . esc_attr($item->url) . '" ' . $attributes . '>' . $title . $desc . '</a>';
            }

            // Since $output is called by reference we don't need to return anything.
            $output .= apply_filters(
                'walker_nav_menu_start_el',
                $item_output,
                $item,
                $depth,
                $args
            );
            //$count++;
            
        }
    }
            

?>

    <!-- HEADER -->
    <header class="fl-page-header fl-page-header-primary fl-page-nav-centered-inline-logo fl-page-nav-toggle-button fl-page-nav-toggle-visible-mobile header_height_fix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        
        <!-- Skip to content -->
        <a href="#fl-main-content" id="skip-to-content" class="fl-screen-reader-text">Skip to content</a>

        <div class="header_inner">

            <?php if ( is_nav_menu( "top-bar" ) ) { ?>
            <!-- Quick Access Top Bar Menu -->
            <nav id="top-bar" class="top-bar-nav" aria-labelledby="quick-access" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                <div>
                    <h2 id="quick-access" class="sr-only">Quick Access</h2>
                    <?php 
                        wp_nav_menu( array( 
                            'theme_location'    => 'bar', 
                            'container'         =>'', 
                            'walker' => new Push_Menu_Walker(),
                            'items_wrap'        => '<ul id="%1$s" class="menu-quickaccess" aria-labelledby="nav-title">%3$s</ul>',
                        )); 
                    ?>
                </div>

            </nav>
            <!-- Quick Access Top Bar Menu -->  
            <?php } ?>



            <!-- Search -->
            <div class="searchbox" id="searchbox">
                <div class="search_wrap" role="dialog" aria-modal="true" aria-labelledby="search-modal-title">
                    <div class="search_inner">
                        <span class="modal-focus-trap" aria-hidden="true" id="search-top" tabindex="0" data-target="search-close"></span>
                        <h2 id="search-modal-title" class="sr-only">Search</h2>
                        <div class="search_form_wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M9.81739 5.46045C9.81739 6.30513 9.56693 7.13085 9.09767 7.83319C8.62841 8.53553 7.96143 9.08296 7.18106 9.40625C6.4007 9.72954 5.54199 9.81418 4.71353 9.64946C3.88506 9.48474 3.12404 9.07807 2.52669 8.48086C1.92934 7.88365 1.52249 7.12272 1.35758 6.2943C1.19267 5.46587 1.27711 4.60715 1.60022 3.8267C1.92332 3.04626 2.47059 2.37916 3.17282 1.90973C3.87506 1.44031 4.70071 1.18965 5.54539 1.18945C6.10627 1.18945 6.66165 1.29993 7.17983 1.51456C7.69802 1.7292 8.16885 2.0438 8.56545 2.4404C8.96204 2.837 9.27664 3.30783 9.49128 3.82601C9.70592 4.34419 9.81639 4.89958 9.81639 5.46045H9.81739Z" stroke="#C8EFE8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.8875 10.8015L8.56445 8.47852" stroke="#C8EFE8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <form method="get" id="searchform" action="/">
                                <label for="search_input" class="sr-only">Search Query</label>
                                <input id="search_input" type="text" name="s" class="search_input" placeholder="Type your search here">
                            </form>
                            <button class="search_button" form="searchform">Search</button>
                            <button id="search-close" class="search_close" aria-label="Close"><i class="fas fa-times" aria-hidden="true"></i></button>
                        </div>
                        <span class="modal-focus-trap" aria-hidden="true" id="search-bottom" tabindex="0" data-target="search"></span>
                    </div>
                </div>
            </div>            
            <!-- Search -->



            <!-- Main Menu -->
            <nav id="menu-main" aria-label="Site">
                <h2 id="nav-title" class="sr-only">Site Navigation</h2>

                <!-- Mobile Menu -->
                <ul id="menu-mobile-primary">
                    <li class="menu-mobile-home"><a href="/"><img src="<?=get_field('site_options_logo_main', 'option');?>" alt="Home"></a></li>
                    <li class="menu-mobile-button"><button>Call To Action</button></li>
                    <li class="menu-mobile-hamb"><button class="mobile_menu_toggle" aria-pressed="false" aria-label="Open navigation menu">Menu</button></li>
                </ul>
                <!-- Mobile Menu -->
               


                <!-- Destop Menu -->
                <?php 
                    wp_nav_menu( array( 
                        'theme_location'    => 'header', 
                        'container'         =>'', 
                        'walker' => new Push_Menu_Walker(),
                        'items_wrap'        => '<ul id="%1$s" class="menu-desktop" aria-labelledby="nav-title">%3$s</ul>',
                    )); 
                ?>
                <!-- Destop Menu -->

                <?php 
                /*
                    // Render a different Mobile Menu when needed
                    wp_nav_menu( array( 
                        'menu'    => 57, 
                        'container'         =>'', 
                        'walker' => new Push_Menu_Walker(),
                        'items_wrap'        => '<ul id="%1$s" class="menu-mobile" aria-labelledby="nav-title">%3$s</ul>',
                    ));
                */ 
                ?>

            </nav>


            <!-- Main Menu -->

        </div>

    </header>
    <!-- HEADER -->
    
    
    
    
    
    
    <?php
	do_action( 'fl_before_content' );

	?>
	<main id="fl-main-content" class="fl-page-content" itemprop="mainContentOfPage">

		<?php do_action( 'fl_content_open' ); ?>





