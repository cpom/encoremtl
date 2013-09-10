<?php get_header();?>

        <div class="posts-one-row">
            <?php $posts = query_posts($query_string . "&page_id=$post->ID");
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $data = get_post_meta( $post->ID, GD_THEME, true );
                    $imagedata = simplexml_load_string(get_the_post_thumbnail());
                    $title = the_title('','',FALSE);
                    $lenght = strlen($title);
                    if ($title<>substr($title,0,200)) {
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

                <div class="single-all-wrap">
                    <div class="blog-info-holder">
                        <div class="info-text"><a href="<?php echo get_site_url().'/author/'.$written;?>"><img src="<?php echo get_template_directory_uri(); ?>/style/img/by.png" /><br /> <?php echo $written; ?></a></div>
                        <div class="info-text"> <img src="<?php echo get_template_directory_uri(); ?>/style/img/calendar-post.png" /><br /><?php the_time('F');?> <?php the_time('d');?>, <?php the_time('Y');?></div>
                        <div class="info-text"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/style/img/comments.png" /><br /><?php echo $num_of_comments; ?></a></div>
                    </div>

                    <div class="single-post-wrap">
                        <div class="blog-post-title"><?php echo substr($title,0,200).$dots; ?></div>

                                <?php if (has_post_thumbnail()) {?>
                        <div class="blog-page-image-holder">

                            <div class="blog-page-image-center">
                                <span class="blog-page-image">
                                    <a href="<?php print $imagedata->attributes()->src;?>" title="<?php the_title(); ?>" class="pirobox hoverimg"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=804&h=248&zc=1&q=100" alt="<?php the_title(); ?>" /></a>
                                </span>
                            </div>

                        </div><!--ends blog-page-image-holder -->
                                    <?php }?>

                        <div class="blog-content-holder">
                            <div class="blog-post-text"><?php the_content();?></div>
                        </div>

                        <div class="clear-both"></div>
                        
                    </div><!--closes single-post-wrap-->
                </div><!--closes one_cell-->
                <div class="clear-both"></div>			 </div>
                <?php endwhile;?>
            <?php else: ?>
            <?php endif; ?>

            <?php if ( comments_open() ) : ?>

            <span class="comment-start"><?php comments_popup( 'No comments yet', '1 COMMENT', '% COMMENTS', 'comments-link', 'Comments are off for this post'); ?></div>
        <div class="clear-both"></div>

        <?php endif; ?>
        <?php comments_template(); // Get wp-comments.php template ?>
        <?php get_footer(); ?>