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

            <!-- Main Menu -->
            <nav id="menu-main" aria-label="Site">
                <h2 id="nav-title" class="sr-only">Site Navigation</h2>

                <!-- Mobile Menu -->
                <ul id="menu-mobile-primary">
                    <li class="menu-mobile-home"><a href="/"><img src="<?=get_field('site_options_logo_main', 'option');?>" alt="Home"></a></li>
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





