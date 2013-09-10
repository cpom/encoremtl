<?php get_header();
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

        <div class="posts-one-row">

             <?php
                $slug = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
                if ($_SERVER["SERVER_PORT"] != "80")
                {
                    $slug .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                }
                else
                {
                    $slug .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                }

                if(!strpos($slug,'page')){
                        $_SESSION['slug'] = $slug;
                }

               wp_reset_query();
                                        $slug = get_page_url();
                                        $pageslug = explode('page/',$slug);
                                        $pageslug = $pageslug[0];
							//The Loop
                                        $cellnum = 0;
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                        $data = get_post_meta( $post->ID, GD_THEME, true );
                                                                         $post_img = "";
                                                if (has_post_thumbnail()){
                                                              $imagedata = simplexml_load_string(get_the_post_thumbnail());
                                                              if(!empty($imagedata)){
                                                                $post_img = $imagedata->attributes()->src;
                                                              }
                                                                }
                                                                $title = the_title('','',FALSE);
                                                                if ($title<>substr($title,0,40)){ $dots = "...";}else{$dots = "";}
                                                                $cellnum++;
                                                ?>

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

            <div class="blog-one-post">

                <div class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,165).$dots; ?></a></div>
                        <?php if (has_post_thumbnail()) { ?>
                <div class="blog-page-image-holder">
                    <div class="blog-page-image-center">
                        <span class="blog-page-image">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=804&h=242&zc=1&q=100" alt="<?php the_title(); ?>" class="hoverimg"/></a>
                        </span>
                    </div>
                </div><!--Ends blog-image-holder -->

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
                tk_pagination(1,5,5,$_SESSION['slug']); ?>
            <?php else: ?>
            <?php endif; ?>
        </div><!--close one row-->

        <?php get_footer(); ?>