<?php
/**
 * The header for our theme.
 *
 * @package QOD_Starter_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#content">
            <?php echo esc_html('Skip to content'); ?></a>

        <header id="masthead" class="site-header" role="banner">
            <div class="site-branding">

                <!-- the site logo -->
                <?php $logo_url = get_template_directory_uri() . '/assets/qod-logo.svg'; ?>
                <a class="logo-link" href="<?php echo get_home_url(); ?>">
                    <img alt="site-logo" class="frontsite-header-logo" src='<?php echo $logo_url ?>'>
                </a>


            </div><!-- .site-branding -->
        </header><!-- #masthead -->
       
        <div id="content" class="site-content"> 
             <!-- left quotation mark -->
        <div class="side-logo-left">
            <i class="fas fa-quote-left quotemark-left"></i>
        </div>
