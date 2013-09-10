<?php get_header();?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('body').addClass('hideTextAreas');
        $('#main').attr('style','background-color:transparent');
    });
</script>

        <div class="title-line">
            <div class="clear"></div>

            <span class="page-title-text more-padd">404</span><div class="title-width-line"></div>

            <div class="clear-both"></div>
        </div>
        <div id="container-full">
            <div class="container 404">
                <div class="left_content">

                    <span class="page404span">Looks like the page you were looking for does not exist.
                        Sorry about that.</span>
                    <span class="notice404">Check the web address for typos, visit the <a href="<?php echo get_site_url(); ?>">home page</a> or use our site search below.</span>
                    <span class="search404"><?php get_search_form(); ?></span>
            
                </div>
                <!--close front_left_cell--> <div class="clear-both"></div>
            </div>
        </div>

   <?php $args = array();
        wp_link_pages( $args );
        posts_nav_link();
        paginate_comments_links() ;
        if ( ! isset( $content_width ) ) $content_width = 900; ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php get_footer(); ?>