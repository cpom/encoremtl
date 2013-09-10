<?php get_header();

?>

        <div class="title-line">
            <div class="clear"></div>
            <span class="page-title-text more-padd"><?php echo the_title();?></span><div class="title-width-line"></div>
            <div class="clear-both"></div>
        </div>
        <?php $posts = query_posts($query_string . "&page_id=$post->ID");
        if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();
                /* get post meta*/
                $data = get_post_meta( $post->ID, GD_THEME, true );?>
                <?php if(!empty($post_img)) { ?><img src="<?php echo get_template_directory_uri();?>/scripts/timthumb.php?src=<?php print $post_img;?>&w=259&h=171&zc=1&q=100" alt="<?php the_title(); ?>" class="image post_img left " /> <?php }?>
                <?php the_content(); ?>

            <?php endwhile; ?>
        <?php endif; ?>
        <div class="clear-both"></div>

        <?php get_footer(); ?>