<?php session_start();
/**
 * @package WordPress
 * @subpackage ChiliLight
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11"><META CHARSET="UTF-8">
            <?php //SEO
            if(!empty($_GET['page_id'])) {
                $post_id = $_GET['page_id'];
            }else {
                $post_id = $post->ID;
            }
            if(!empty($_GET['p'])) {
                $post_id = $_GET['p'];
            }else {
                $post_id = $post->ID;
            }

            $data = get_post_meta( $post_id, GD_THEME, true );
            ?>

            <title><?php if(!empty($data['seo_title'])) {
                    echo $data['seo_title'];
                } else {
                    wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name');
                }?></title>

            <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri()."/style.css" ;?>"/>
            <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
                    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri()."/script/jquery.ui.tabs/jquery-ui-1.8.13.ui-tabs.css" ;?>"/>
                    <link href="<?php echo get_template_directory_uri()."/script/pirobox/css/demo5/style.css";?>" media="screen" title="shadow" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri()."/script/menu/superfish.css";?>" type="text/css"/>
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/script/fancybox/jquery.fancybox-1.3.4.css';?>" type="text/css" media="screen" />
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/script/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/script/nivo-slider/demo/style.css" type="text/css" media="screen" />
                    <?php
                    // Enqueue Scripts
                    wp_deregister_script('jquery');
                    wp_register_script('jquery', get_template_directory_uri().'/script/jquery/jquery-1.5.1.min.js');
                    wp_enqueue_script('jquery');
                    wp_enqueue_script( 'tabs', get_template_directory_uri().'/script/jquery.ui.tabs/jquery-ui-1.8.13.ui-tabs.js');
                    wp_enqueue_script( 'contact', get_template_directory_uri().'/script/contact/contact.js');
                    wp_enqueue_script('elastic', get_template_directory_uri().'/script/elastic/jquery.elastic.source.js' );
                    wp_enqueue_script('quickpager', get_template_directory_uri().'/script/quickpager/quickpager.jquery.js' );
                    wp_enqueue_script('easing', get_template_directory_uri().'/script/quicksand/jquery.easing.js' );
                    wp_enqueue_script('quicksand', get_template_directory_uri().'/script/quicksand/jquery.quicksand.js' );
                    wp_enqueue_script('superfish', get_template_directory_uri().'/script/menu/superfish.js' );
                    wp_enqueue_script('pirobox', get_template_directory_uri().'/script/pirobox/js/pirobox.js' );
                    wp_enqueue_script('fancybox', get_template_directory_uri().'/script/fancybox/jquery.fancybox-1.3.4.js' );
                    wp_enqueue_script('nivoslider', get_template_directory_uri().'/script/nivo-slider/jquery.nivo.slider.js' );
                    wp_enqueue_script('my-commons', get_template_directory_uri().'/script/common.js' );

                    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

                    ?>


                    <!-- Favicon -->
                    <?php $favicon = get_option(THEME_NAME.'_favicon');
                    if(empty($favicon)) {
                        $favicon = get_template_directory_uri()."/images/favicon.ico";
                    }?>
                    <link rel="shortcut icon" href="<?php echo $favicon;?>" />
                    <?php  wp_head(); ?>
                    <script type="text/javascript">

                        var _gaq = _gaq || [];
                        _gaq.push(['_setAccount', 'UA-3284393-26']);
                        _gaq.push(['_trackPageview']);

                        (function() {
                            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                        })();
                    </script>

                    </head>

                    <body <?php body_class(); ?>>

                        <div id="upper-shadow"></div>
                        <div id="background">     
                            <div id="wrapper" class="hfeed">
                                <div class="header-wrapper">
                                    <div id="header">
                                        <?php 	$menubutton = get_option(THEME_NAME.'_custom_menu_button');
                                        $menubuttonurl = get_option(THEME_NAME.'_custom_menu_button_url');?>
                                        <div class="header-logo"><?php $logo = get_option(THEME_NAME.'_logo');
                                            if(empty($logo)) {
                                                $logo = get_template_directory_uri()."/images/logo.png";
                                            }?>
                                            <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name');?>" /></a>
                                        </div><!--close logo-->
                                        <div class="menu-container">
                                            <?php
                                            $pageargs = array(
                                                    'depth'        => 3,
                                                    'title_li'     => __(''),
                                                    'echo'         => 1,
                                                    'authors'      => '',
                                                    'sort_column'  => 'menu_order',
                                                    'link_before'  => '',
                                                    'link_after'   => '',
                                                    'walker' => '' );
                                            if ( function_exists('has_nav_menu') && has_nav_menu('primary-menu') ) {
                                                $nav_menu = array('title_li'=> __(''), 'theme_location' => 'primary-menu');
                                                wp_nav_menu($nav_menu);
                                            }
                                            else { ?>
                                            <ul class="menu">
                                                    <?php
                                                    wp_list_pages($pageargs);?>
                                            </ul>
                                                <?php }?>
                                        </div>
                                    </div><!-- #header -->
                                </div><!-- #header-wrapper -->
                                <?php
                                if (is_front_page()) {
                                    /*SlideShow options*/
                                    ?>
                                <div id="slider">
                                        <?php
                                        $cat = get_option(THEME_NAME.'_slider_category');
                                        $args=array('cat'=>$cat,'post_status' => 'publish','posts_per_page' => 1000);
                                        query_posts($args);
                                        $pageURL = get_page_url();
                                        $i = 1;

                                        while (have_posts()) : the_post();
                                            $img = "";
                                            if (has_post_thumbnail()) {
                                                $imagedata = simplexml_load_string(get_the_post_thumbnail());
                                                $img = $imagedata->attributes()->src;

                                                $title = $post->post_title;
                                                if ($title<>substr($title,0,25)) {
                                                    $dots = "...";
                                                }else {
                                                    $dots = "";
                                                }
                                                if ($post->post_content<>substr($title,0,90)) {
                                                    $dots2 = "...";
                                                }else {
                                                    $dots2 = "";
                                                }
                                                $cont = substr($post->post_content,0,90);
                                                $postslug = get_post_slug($post->ID);
                                                echo "<img src='".get_template_directory_uri()."/script/timthumb.php?src=".$img."&w=960&h=490&zc=1&q=100' title='".substr($title,0,25).$dots."' alt='".$post->post_title."' link='".get_permalink()."' cont='".$cont.$dots2."' class='nodisplay' id='".$pageURL."$postslug' rev='$cont$dots2' rel='";
                                                echo get_template_directory_uri()."/script/timthumb.php?src=".$img."&w=960&h=406&zc=1&q=100'>" ;

                                        }		endwhile
                                        ;
    ?>
                                </div>

                                <script type="text/javascript">
                                    $(window).load(function() {
                                        $('#slider').nivoSlider();
                                    });
                                </script>

                                    <?php }else {
                                    if (isset($data['page_headline'])) {
                                        $headline = $data['page_headline'];
                                    }
                                    if (isset($data['page_headline_link'])) {
                                        $headline_link = $data['page_headline_link'];
                                    }
                                    if(!empty($headline)) {
        ?>
                                <div id="headline-wrap">
                                            <?php
                                            // Get headline and link for page
                                            $data = get_post_meta( $post->ID, GD_THEME, true );
                                            if(!empty($data['page_headline'])) {
                                                $headline = $data['page_headline'];
                                            }
                                            if(!empty($data['page_headline_link'])) {
                                                $headline_link = $data['page_headline_link'];
                                            }
        if(!empty($headline)) { ?>
                                    <div id="headline">
                                        <div id="high_light">
            <?php if(isset($headline_link)) { ?>
                                            <a href="<?php echo $headline_link;?>" class="learn_more">
                <?php } ?>
                                                <h2 class="high_light_h2"><?php echo substr($headline,0, 140)?></h2>
            <?php if(isset($headline_link)) {?>
                                            </a>
                <?php } ?>
                                        </div><!--close high_light-->
                                    </div><!--close headline-->
            <?php }?>
                                </div><!--close slidershow_wrap-->
                                        <?php }
                                }
?>

                                <div id="main">
    <div class="content-wrapper">