<?php 
//loading wordpress functions
get_template_part( '../../../wp-load.php' );
?>

	<?php
	
		$value = get_option(THEME_NAME.'_portfolio_number_of_posts');
		
		$id = $_GET['id'];
		$args=array('cat'=>$id, 'post_status' => 'publish','ignore_sticky_posts'=> 1,'posts_per_page'=>1000);
//The Query
		query_posts($args);
//The Loop
		echo "<ul class='pagingx'>";
			$i=0;	
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				echo "<li>";
$data = get_post_meta( $post->ID, GD_THEME, true );
						$imagedata = simplexml_load_string(get_the_post_thumbnail());
						$title = the_title('','',FALSE);
						$title = strtoupper($title);
						if ($title<>substr($title,0,22)){ $dots = "...";}else{$dots = "";}
						$i++; 
						$base_url = get_template_directory_uri(); 
					if ($i%3==0) {
								$lastclass="last-front";
							}
							else $lastclass="";
							if (has_post_thumbnail()) {	
					?>				
					<div class="portfolio-one-post <?php echo $lastclass?>">				
									<?php $imagedata = simplexml_load_string(get_the_post_thumbnail()); ?>
								<div class="page-image-holder">
									<div class="page-image-left"></div>
									<div class="page-image-center">
										<span class="page-image">									
											<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=231&h=130&zc=1&q=100" alt="<?php the_title(); ?>" /></a>
										</span>
									</div>
									<div class="page-image-right"></div>
								</div>
								<div class="portfolio-post-title"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,22).$dots; ?></a></div>								
								<div class="portfolio-post-text"><?php truncate_post(140);?></div>							
								<a class="cell_read_more" href="<?php the_permalink(); ?>">More</a>							
									<?php }else{ ?>
				<!--If there's no picture-->
											<div class="box_holder_noimage">
											</div><!--closes box_holder-->
																						
										<?php } ?>

						<div class="clear-both"></div>
						</div><!--closes one_cell-->
						<?php if ($i%3==0) {?>
						<div class="post-separator"></div>	
						<?php } ?>

	<?php
		echo "</li>";
		endwhile;
		echo "</ul>";
	?>

	<?php 
	//activate pagination
	?>

	<?php else: ?>
	<?php endif; ?>
	
	<?php comments_template(); // Get wp-comments.php template ?>
		<script type="text/javascript">
//Ajax Pagination	
			$("ul.pagingx").quickPager(pageSize	= "<?php echo get_option(THEME_NAME.'_number_of_images_portfolio'); ?>");
			$(".simplePagerNav").css('margin','40px 0');	
		</script>

                        <script type="text/javascript">
			$(document).ready(function(){
			$('.piro_overlay,.pirobox_content').remove();
			$().piroBox({
			my_speed: 300, 
			bg_alpha:0.5, 
			radius: 4, 
			scrollImage : false, 
			slideShow : 'true', 
			slideSpeed : 3, 
			pirobox_next : 'piro_next',
			pirobox_prev : 'piro_prev', 
			close_all : '.piro_close' 
			});			
			});
		</script>