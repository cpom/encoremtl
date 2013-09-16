<?php get_header();?>





        <div class="title-line">
            <span class="page-title-text">FEATURED</span><div class="title-width-line"></div>
            <div class="clear-both"></div>
        </div>
        <div class="posts-one-row">
            <?php //Options

            $blog_category = get_option(THEME_NAME.'_blog_include_category');
            $categories = get_categories('orderby=name');
            $include_category = null;
            $slug = get_page_link();
            foreach ($categories as $category_list) {
                if(!empty($blog_category[0][$category_list->cat_ID])) {
                    $cat = 	$category_list->cat_ID.",";
                    $include_category = $include_category.$cat;
                }
            }

            $value = 4;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
            $include_category = '6';
            $args=array('cat'=>$include_category, 'post_status' => 'publish','paged' => $paged,'posts_per_page' => 4,'ignore_sticky_posts'=> 1);

            //The Query
            query_posts($args);
            $i=1;

            //The Loop
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $imagedata = simplexml_load_string(get_the_post_thumbnail());
                    $data = get_post_meta( $post->ID, GD_THEME, true );
                    $title = the_title('','',FALSE);
                    $title = strtoupper($title);
                    if ($title<>substr($title,0,18)) {
                        $dots = "...";
                    }else {
                        $dots = "";
                    }

                    if ($i%4==0) {
                        $lastclass="last-front";
                    }

                    else $lastclass="";
                    ?>

            <div class="one-post <?php echo $lastclass?>">
                <div class="page-image-holder">
                    <div class="page-image-center">
                        <span class="page-image">
                                    <?php if (has_post_thumbnail()) {	?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=202&h=130&zc=1&q=100" alt="<?php the_title(); ?>"  class="hoverimg"/></a>
                                        <?php }
                                    else echo '<div class="front-blank-image"></div>';?>
                        </span>
                    </div>
                </div><!--ends page-image-holder -->

                <div class="front-post-title"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,18).$dots; ?></a></div>
                <div class="front-post-text"><?php truncate_post(500);?></div>
                <a class="cell_read_more" href="<?php the_permalink(); ?>">More</a>
                <div class="clear-both"></div>

            </div><!--closes one_cell-->
                    <?php $i++; ?>

                <?php endwhile;
                wp_reset_query();
                ?>
            <?php else: ?>
            <?php endif; ?>
            <div class="clear-both"></div>
        </div><!--close one row-->
        <br/>
        <br/>
 <!--       <?php
        $menubutton = get_option(THEME_NAME."_custom_menu_button");
        $menubuttonurl = get_option(THEME_NAME."_custom_menu_button_url");
        $menubuttontext = get_option(THEME_NAME."_custom_menu_button_text");
        if (!empty($menubutton) && !empty($menubuttonurl)) {
            ?>
        <div class="front-info-box">
            <div class="front-info-box-text"><?php echo $menubuttontext ?></div>
            <a href="<?php echo $menubuttonurl?>">
                <div class="more-info-button">
                    <div class="more-info-button-left"></div>
                    <div class="more-info-button-center"><?php echo $menubutton?></div>
                    <div class="more-info-button-right"></div>
                </div>
            </a>
        </div>
            <?php
        }
        ?>

        <?php
        /* Run the loop to output the page.
					 * If you want to overload this in a child theme then include a file
					 * called loop-page.php and that will be used instead.
        */
        //get_template_part( 'loop', 'page' );

        wp_reset_query();
        if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        else:
        endif;
        wp_reset_query();
        ?>
        <div class="clear-both"></div> -->
        <?php get_footer(); ?>