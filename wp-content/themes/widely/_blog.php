<?php get_header();
/*

Template Name: Blog 

*/
?>



        <div class="title-line">
            <span class="page-title-text more-padd"><?php echo the_title();?></span><div class="title-width-line"></div>
            <div class="clear-both"></div>
        </div>
        <div class="posts-one-row">
            <?php
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

            $value = get_option(THEME_NAME.'_blog_number_of_posts');
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
            $args=array('cat'=>$include_category, 'post_status' => 'publish','paged' => $paged,'posts_per_page' => get_option('posts_per_page'),'ignore_sticky_posts'=> 1);

            //The Query
            query_posts($args);
            $i=1;

            //The Loop
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $data = get_post_meta( $post->ID, GD_THEME, true );
                    $title = the_title('','',FALSE);
                    $title = strtoupper($title);
                    if ($title<>substr($title,0,165)) {
                        $dots = "...";
                    }else {
                        $dots = "";
                    }
                    ?>

            <div class="blog-one-post">
                        <?php $imagedata = simplexml_load_string(get_the_post_thumbnail()); ?>
                        <?php
                        $comments = get_comments("post_id=$post->ID");
                        $num_of_comments = 0;
                        foreach((get_the_category()) as $category) {
                            $post_category = $category->cat_name;
                            $post_category_id = $category->cat_ID;
                            $cat_slug=get_cat_slug($post_category_id);
                        }

                        foreach($comments as $comm) :
                            $num_of_comments++;
                        endforeach;
                        $written = $post->post_author;
                        $user = get_user_by('id',$written);
                        $written = $user->nickname;
                        ?>

                <div class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,165).$dots; ?></a></div>

                        <?php if (has_post_thumbnail()) { ?>
                <div class="blog-page-image-holder">
                    <div class="blog-page-image-center">
                        <span class="blog-page-image">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=804&h=242&zc=1&q=100" alt="<?php the_title(); ?>" class="hoverimg" /></a>
                        </span>
                    </div>
                </div><!--Closes blog-page-image-holder-->
                            <?php }?>

                <div class="blog-info-holder">
                    <div class="info-text"> <a href="<?php echo get_site_url().'/author/'.$written;?>"><img src="<?php echo get_template_directory_uri(); ?>/style/img/by.png" /><br /><?php echo $written; ?></a></div>
                    <div class="info-text"><img src="<?php echo get_template_directory_uri(); ?>/style/img/calendar-post.png" /><br /><?php the_time('F');?> <?php the_time('d');?>, <?php the_time('Y');?></div>
                    <div class="info-text"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/style/img/comments.png" /><br /><?php echo $num_of_comments; ?></a></div>
                </div>

                <div class="blog-content-holder">
                    <div class="blog-post-text"><?php truncate_post(600);?></div>
                    <a class="blog-cell_read_more" href="<?php the_permalink(); ?>">More</a>
                </div>
                
                <div class="clear-both"></div>
                <div class="post-separator"></div>
                <div class="clear-both"></div>
            </div><!--closes one_cell-->

                <?php endwhile;	?>
                <?php
                //activate pagination
                tk_pagination(1,5,5,$slug); ?>

            <?php else: ?>
            <?php endif; ?>
            
        </div><!--close one row-->
        <?php get_footer(); ?>