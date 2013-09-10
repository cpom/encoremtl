<?php get_header();
/*

Template Name: Portfolio

*/
?>



        <div class="title-line">
            <span class="page-title-text more-padd"><?php echo the_title();?></span><div class="title-width-line"></div>
            <div class="clear-both"></div>
        </div>
        <div id="wraper-inside">
            <div id="wraper-holder-wide">
                <?php
                if(isset($_SESSION['showlineforportfolio'])) {
                    $_SESSION['showlineforportfolio']
                            ?>
                <div id="horizontal-line" class="horizontal-line-wide"></div>
                    <?php
                }
                ?>

                <div class="portfolio-cat-holder">
                    <img alt="category image" class="cat-img" src="<?php echo get_template_directory_uri(); ?>/style/img/categories.png" />
                    <ul id="filter">
                        <li class="cat_cell" data-filter="all" >CATEGORIES :</li>
                        <?php

                        wp_reset_query();
                        $portfolio_category = get_option(THEME_NAME.'_portfolio_include_category');
                        $categories = get_categories('orderby=name');
                        $include_category = null;
                        $slug = get_page_link();
                        foreach ($categories as $category_list) {
                            $showall = 0;
                            if($showall == 1) {
                                if(!empty($portfolio_category[0][$category_list->cat_ID])) {
                                    $cat = 	$category_list->cat_ID.",";
                                    $include_category = $include_category.$cat;
                                    echo '<li class="cat_cell" data-filter="'.$category_list->cat_ID.'">'.$category_list->cat_name.'</li>';
                                }

                            }else {
                                $add = 0;
                                if(!empty($portfolio_category[0][$category_list->cat_ID])) {
                                    $args=array('cat'=>$category_list->cat_ID, 'post_status' => 'publish','meta_key' => '_thumbnail_id');
                                    query_posts($args);
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                            if (has_post_thumbnail()) {
                                                $imagedata = simplexml_load_string(get_the_post_thumbnail());
                                                $post_img = $imagedata->attributes()->src;
                                                if(!empty($post_img)) {
                                                    $add = 1;
                                                }
                                        }
                                        endwhile;?>
                                    <?php else: ?>
                                    <?php endif;

                                    if($add == 1) {
                                        $include_category = $include_category.$cat;
                                        echo $include_category;
                                        echo '<li class="cat_cell" data-filter="'.$category_list->cat_ID.'">-'.$category_list->cat_name.'</li>';
                                    }
                                }
                            }
                        }?>
                    </ul>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        var $data = $("#portfolio-holder").clone();
                        $('#filter li').click(function(e) {
                            $('#portfolio-holder').css('height','800px');
                            var filterClass=$(this).attr('data-filter');

                            if (filterClass == 'all') {
                                var $filteredData = $data.find('.portfolio_box');
                            } else {
                                var $filteredData = $data.find('.portfolio_box[data-type=' + filterClass + ']');
                            }

                            $("#portfolio-holder").quicksand($filteredData, {
                                duration: 800,
                                easing: 'swing',
                                adjustHeight: 'false'
                            },function(){
                                $('#portfolio-holder').css('height','auto');
                                $('.fancybox-overlay,.fancybox-wrap,.fancybox-loading,.fancybox-tmp').remove();
                                jQuery('.fancybox').fancybox();
                            });

                            jQuery('img','.pirobox').live({
                                mouseenter:
                                    function()
                                {
                                    jQuery(this).stop().animate({opacity:0.4},500);
                                },
                                mouseleave:
                                    function()
                                {
                                    jQuery(this).stop().animate({opacity:1},300);
                                }
                            }
                        );
                            return false;
                        });
                    });
                </script>
                
                <div id="portfolio-holder-relative" >
                    <div id="portfolio-holder" >
                        <?php
                        wp_reset_query();
                        if(!empty($portfolio_category[0])) {
                        }

                        foreach ($portfolio_category[0] as $x => $y) {
                            if(!isset($categories_for_queue)) {
                                $categories_for_queue = $x;
                            }else {
                                $categories_for_queue .= ','.$x;
                            }
                        }

                        $numportfolio = get_option(THEME_NAME.'_number_of_images_portfolio');
                        $url = get_page_url();
                        $showall = get_option(THEME_NAME.'_show_without_images_portfolio');
                        echo $showall;
                        if(!isset($showall) || $showall !== 1) {
                            $args=array('cat'=>$categories_for_queue, 'post_status' => 'publish','posts_per_page' => 20000 ,'meta_key' => '_thumbnail_id');
                            query_posts($args);
                        }

                        $i=0;
                        $z=1;
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                if (has_post_thumbnail()) {
                                    $imagedata = simplexml_load_string(get_the_post_thumbnail());
                                    $post_img = $imagedata->attributes()->src;
                                }else {
                                    $post_img = "";
                                }
                                $i++;
                                foreach(get_the_category() as $category) {
                                    $cat = $category->cat_ID." ";
                                }
                                $trimmed = trim($cat);
                                ?>
                        
                        <div class="portfolio_box <?php echo $cat;?> portfolio_box-3col portfolio_box-3colSimple"  data-type="<?php echo $trimmed; ?>" data-id="box-<?php echo $i; ?>" >
                                    <?php if((!empty($post_img) || $post_img !== "")) { ?>
                            <div class="portfolio_image_bg_3 portfolio_box_categories">
                                <div class="page-image-center">
                                    <span class="page-image">
                                        <a href="<?php print $post_img;?>" class="fancybox hoverimg" title="<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $post_img;?>&w=212&h=140&zc=1&q=100" alt="_" title="<?php the_title();?>" /></a>
                                    </span>
                                </div>
                                <div class="page-image-right"></div>
                                <div class="portfolio-loader3"></div>
                            </div><!-- close image_bg -->

                                        <?php }else {
                                        echo "<br/><br/>";
                                    } ?>


                            <h2 class="portfolio-h2">  <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <?php
                                            $thetitle = get_the_title(); /* or you can use get_the_title() */
                                            $getlength = strlen($thetitle);
                                            $thelength = 35;
                                            echo substr($thetitle, 0, $thelength);
                                            if ($getlength > $thelength) echo "...";
                                            ?>
                                </a></h2>
                        </div>
                                <?php
                                $z++;
                            endwhile; ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear-both"></div>
        <?php get_footer(); ?>



