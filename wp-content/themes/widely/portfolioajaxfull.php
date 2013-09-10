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
				 $i++; 
				$base_url = get_template_directory_uri(); 
		$lastpost="-last";
					?>
					<div class="one-post-full<?php if($i%2==0){echo $lastpost;}?>">
							<div class="portfolio-image-holder-full">
						<?php if (has_post_thumbnail()) {											
								      $imagedata = simplexml_load_string(get_the_post_thumbnail()); ?>
						<span class="portfolio-image-full">	
							<a href="<?php print $imagedata->attributes()->src;?>" title="<?php the_title(); ?>" class="pirobox">
								<img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=430&h=206&zc=1&q=100" alt="<?php the_title(); ?>" />
							</a>
							</span><a href="<?php print $imagedata->attributes()->src;?>" title="<?php the_title(); ?>" class="pirobox"><span class="image-eye"></span></a>
						<?php } ?>
						</div>
						<div class="post-title"><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php
											$title = get_the_title();
											if ($title<>substr($title,0,70)){ $dots = "...";}else{$dots = "";}
											echo substr($title,0,70).$dots; ?></a></div>
						<div class="clear-both"></div>
						<div class="full-width-text">
								<?php truncate_post(600);?><a class="cell_read_more" href="<?php the_permalink(); ?>">Read more...</a>
						</div>
						
					</div>
					<?php if($i%2==0){echo '<div class="full-width-line"></div><div class="clear-both"></div>';}?>
								<?php endwhile;?> 
										
								<?php else: ?>
								<?php endif; ?>
	

	<div class="clear-both"></div>
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