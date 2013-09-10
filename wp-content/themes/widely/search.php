<?php get_header();
/**
 * @package WordPress
 * @subpackage Default_Theme
 */



?>
        <div class="posts-one-row">

            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();

                    $data = get_post_meta( $post->ID, GD_THEME, true );
                    ?>

                    <?php $title = the_title('','',FALSE);
                    $title = the_title('','',FALSE);
                    $title = strtoupper($title);
                    if ($title<>substr($title,0,165)) {
                        $dots = "...";
                    }else {
                        $dots = "";
        }

        if (has_post_thumbnail()) {
                            ?>

            <div class="blog-one-post">
                            <?php $imagedata = simplexml_load_string(get_the_post_thumbnail()); ?>
                            <?php
                            $comments = get_comments("post_id=$post->ID");
                            $num_of_comments = 0;
                            foreach((get_the_category()) as $category) {
                                $post_category = $category->cat_name;
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
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=804&h=248&zc=1&q=100" alt="<?php the_title(); ?>"  class="hoverimg"/></a>
                        </span>
                    </div>
                </div>
                <?php }?>

                <div class="blog-info-holder">
                    <div class="info-text"><br /> <a href="<?php echo get_site_url().'/author/'.$written;?>"><img src="<?php echo get_template_directory_uri(); ?>/style/img/by.png" /><br /><?php echo $written; ?></a></div>
                    <div class="info-text"> <img src="<?php echo get_template_directory_uri(); ?>/style/img/calendar-post.png" /><br /><?php the_time('F');?> <?php the_time('d');?>, <?php the_time('Y');?></div>
                    <div class="info-text"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/style/img/comments.png" /><br /><?php echo $num_of_comments; ?></a></div>
                </div>

                <div class="blog-content-holder">
                    <div class="blog-post-text"><?php truncate_post(600);?></div>
                    <a class="blog-cell_read_more" href="<?php the_permalink(); ?>">More</a>
                </div>

                <div class="clear-both"></div>
                <div class="post-separator"></div>

            <?php }else { ?>
                <!--If there's no picture-->

                <div class="blog-box_holder_noimage">
                </div><!--closes box_holder-->
            </div>

            <?php } ?>
                <div class="clear-both"></div>
                    <?php endwhile;?>
    <?php
                    //activate pagination
    ?>
          

<?php else : ?>
                <h2 class="center">No posts found. Try a different search?</h2>
                <div class="clear-both"></div>
<?php endif; ?></div>
<?php get_footer(); ?>