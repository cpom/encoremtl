<?php
// Hook for adding admin menus
	add_action('admin_menu', 'tk_add_pages');
	
	// action function for above hook
	function tk_add_pages() {
		add_theme_page(__(THEME_NAME.' Panel',THEME_NAME),THEME_NAME.' Panel','edit_theme_options','tk-'.THEME_NAME,'tk_ChiliLight');
		
	}

	//Adding Icon to wordpress menu	
	function insert_jquery(){ ?>
		<div id="panel-widget">
			<script type="text/javascript">
				jQuery(document).ready(function(){
				jQuery('#menu-appearance .wp-submenu ul li a').each(function(){
					var href = (jQuery(this).attr('href'));
					if(href == 'themes.php?page=tk-<?php echo THEME_NAME;?>'){
						var old = jQuery(this).html();
						jQuery(this).html('<img src="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" style="position:relative;top:4px;left:0px">'+old);
					}
				if(href == 'themes.php?page=tk-<?php echo THEME_NAME;?>-style'){
						var old = jQuery(this).html();
						jQuery(this).html('<img src="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" style="position:relative;top:4px;left:0px">'+old);
					}
				});
				});
			</script>
		</div>
	   <script type="text/javascript">
	  var tk_toolbar = document.getElementById("wphead");
	  var shortcode = document.getElementById("panel-widget");
	  tk_toolbar.appendChild(shortcode);
	</script>
		<?php
	}
	add_action('admin_footer','insert_jquery');
	
	
function tk_theme_style(){
	
	if(isset($_POST['reset_style'])){
		update_option(THEME_NAME.'-head-pattern',"p1");
	}
	
	if(isset($_POST['save_style'])){
			
		if (isset($_POST[THEME_NAME.'-head-pattern'])) {
			update_option(THEME_NAME.'-head-pattern',$_POST[THEME_NAME.'-head-pattern']);
		}

	}
	

	$headimg=get_option(THEME_NAME.'-head-pattern');
	if (empty($headimg)) {
		$headimg = 'p1';
	}	
	

	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.pattern-div').css('background-color','#<?php echo $headbg; ?>');
		jQuery('.pattern-div3').css('background-color','#<?php echo $textbg; ?>');
		jQuery('.pattern-div4').css('background-color','#<?php echo $bg; ?>');

	});
	</script>
	
	
	<form method="POST" action="">
	
		<div id="header">
			<div id="header-top">
			 	
			</div>		
			<div class="theme"><?php echo THEME_NAME; ?> theme</div>
			<div class="theme-adminitration">Theme Administration</div>
			<div class="theme-version">Theme Version 1.00.1</div>
		<ul id="mainmenu" class="mainmenu">
		 <li style="cursor:default;"><?php echo THEME_NAME.' - Styling'; ?></li>
		</ul>
		
		</div> <!--close header-->
		<div id="container">
		 <span class="stylespan">
       
	    <div id="app_title_save"><input type="submit" name="save_style" id="save" value="Save" class="button" ></div>
	    <div id="app_title_save"><input type="submit" name="reset_style" id="save" value="Reset" class="button" style="float:right"></div>
	    		<div id="app_title">Site Background</div>
	    		
	    		<div id="content">
					<div class="left_content">
						Pattern overlay: 
						<div class="one-pattern">
						<?php $i = 8; $p = 1;
							while($p <= $i){?>
							<input type="radio" name="<?php echo THEME_NAME; ?>-head-pattern" value="p<?php echo $p; ?>" <?php if($headimg == 'p'.$p){ echo 'checked';} ?> class="pattern-radio">
							<div class="pattern-div" style="margin:8px;background-image:url(<?php echo PATTERNS; ?>p<?php echo $p; ?>.png);background-color:#FFF;"></div>
							<?php
							$p++;					
							}
						
							?>
						</div>
						
					</div>
					
					<div class="right_content">
					Select Pattern.
					</div>
				</div> <!--close content-->
	
				<div id="adminfooter">
				<div id="content">
					<div class="left_content">
					<span class="brought">Brought to you by</span>
					<span class="themeskingdom"></span>
					<span class="themeskingdomabout">Kingdom of <b>Awesomeness</b></span>
					<input type="submit" name="save_style" id="save" value="Save" class="button">
					</div>
					<div id="right_content">
					</div>
		</div></div>
    </span>
						
	</form>
	<?php
	
	
}

register_activation_hook(__FILE__,THEME_NAME.'_install');


function tk_ChiliLight() { 
	?>
	
	<?php
	$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		//delete_option(THEME_NAME."_sidebar");
			
		
		

			
		
		if(isset($_POST['save'])) {	
			$search  = array('\"', "\'" );
			$replace = array('"', "'"); 
			$copyright = str_replace($search ,$replace ,$_POST['footer_copyright']);
			
			$footer_facebook = $_POST['footer_facebook'];
			$footer_twitter = $_POST['footer_twitter'];
			update_option('footer_copyright', $copyright);
			update_option('footer_twitter', $footer_twitter);
			update_option('footer_facebook', $footer_facebook);
			update_option('email_subject',$_POST['email_subject']);
			
			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
				
			 jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.main').show();
				jQuery('.mainmenu').show();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			
			 
			});
			</script>
			<?php
		} 

		if(isset($_POST['save_blog'])) {
	
			update_option(THEME_NAME.'_blog_include_category',  array($_POST['categories_id_blog']));
			
			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
			 jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.blog').show();
				jQuery('.mainmenu').show();
				jQuery('.blogshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			});
			</script>
			<?php
		
		}
		if(isset($_POST['save_portfolio'])) {
			if(isset($_POST['categories_id_portfolio'])){
				update_option(THEME_NAME.'_portfolio_include_category',  array($_POST['categories_id_portfolio']));
			}
			
			if(isset($_POST[THEME_NAME.'_number_of_images_portfolio'])){
				update_option(THEME_NAME.'_number_of_images_portfolio', $_POST[THEME_NAME.'_number_of_images_portfolio']);
			}
			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
			 jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.portfolio').show();
				jQuery('.mainmenu').show();
				jQuery('.portfolioshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			});
			</script>
			<?php
		}
		
		

	if(isset($_POST['save_front'])) {
		
//		update_option(THEME_NAME.'_horizontal_slider_category',$_POST[THEME_NAME.'_horizontal_slider_category']);
//		update_option(THEME_NAME.'_use_slider_category',$_POST[THEME_NAME.'_use_slider_category']);
		update_option(THEME_NAME.'_slider_category',$_POST[THEME_NAME.'_slider_category']);
		update_option(THEME_NAME.'_custom_menu_button', $_POST[THEME_NAME.'_custom_menu_button']);
		update_option(THEME_NAME.'_custom_menu_button_url', $_POST[THEME_NAME.'_custom_menu_button_url']);
		update_option(THEME_NAME.'_custom_menu_button_text', $_POST[THEME_NAME.'_custom_menu_button_text']);
		
		?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
				jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.front').show();
				jQuery('.mainmenu').show();
				jQuery('.frontshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
		});
		</script>
		<?php
	}
	
		if(!$_POST){?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
				jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.main').show();
				jQuery('.mainmenu').show();
				jQuery('.menu').hide();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
		});
		</script>
		<?php } ?>
		
		
	

<script type="text/javascript">
	jQuery.fn.start = function() {
		  jQuery('.gd_super_check').checkbox({empty:'<?php echo GD_THEME_DIR; ?>/themeskingdom/style/empty.png'});
				
			//Check if element exists
				jQuery.fn.exists = function(){return jQuery(this).length;}
		  
		  
		  //AJAX upload
			jQuery('.gd_upload').each(function(){
				
				var the_button=jQuery(this);
				var image_input=jQuery(this).prev();
				var image_id=jQuery(this).attr('id');
				
				new AjaxUpload(image_id, {
					  action: ajaxurl,
					  name: image_id,
					  
					  // Additional data
					  data: {
						action: 'gd_ajax_upload',
						data: image_id
					  },
					  autoSubmit: true,
					  responseType: false,
					  onChange: function(file, extension){},
					  onSubmit: function(file, extension) {
							the_button.html("Uploading...");				  
						},
					  onComplete: function(file, response) {	
							the_button.html("Upload Image");
							
							if(response.search("Error") > -1){
								alert("There was an error uploading:\n"+response);
							}
							
							else{							
								image_input.val(response);
								var image_preview='<img src="' + response + '" class="gd_image_preview" />';							
								the_button.next().html(image_preview);
								
								var remove_button_id='remove_'+image_id;
									var rem_id="#"+remove_button_id;
								if(!(jQuery(rem_id).exists())){
									the_button.after('<span class="button gd_remove" id="'+remove_button_id+'">Remove Image</span>');
								}
								
									
									
								}
							
						}
				});
			});
			
			
			//AJAX image remove
			jQuery('.gd_remove').live('click', function(){
				var remove_button=jQuery(this);
				var image_remove_id=jQuery(this).prev().attr('id');
				remove_button.html('Removing...');
				
				var data = {
					action: 'gd_ajax_remove',
					data: image_remove_id
				};
				
				jQuery.post(ajaxurl, data, function(response) {
					remove_button.prev().prev().val('');
					remove_button.next().html('');
					remove_button.remove();
				});
				
			});
};	
</script>
<form method="POST" action="">
	
		<div id="header">
			<div id="header-top">
			 	
			</div>		
			<div class="theme"><?php echo THEME_NAME; ?> theme</div>
			<div class="theme-adminitration">Theme Administration</div>
			<div class="theme-version">Theme Version 1.00.1</div>
		<ul id="mainmenu" class="mainmenu">
		 <li class="mainshow normal"><?php echo THEME_NAME; ?></li>
		 <li class="frontshow normal">Frontpage</li>
		 <li class="blogshow normal">Blog</li>
		 <li class="portfolioshow normal">Portfolio</li>

		
		</ul>
		
		</div> <!--close header-->
		<div id="container">
		
		
		<script type="text/javascript">
		jQuery('.normal').click(
			function(){
				jQuery('.normal').css('border','none');
			}
		);
		
		
		
		
		
		jQuery('.frontshow').click(
			function(){
				jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.front').show();
				jQuery('.frontshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			}
		)
		

		jQuery('.mainshow').click(
			function(){
				jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery('.main').show();
				jQuery(document).start();
			}
		)
		jQuery('.blogshow').click(
			function(){
				jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.blogshow').css('border-bottom','1px solid #888888');
				jQuery('.blog').show();
				jQuery(document).start();
			}
		)
		jQuery('.portfolioshow').click(
			function(){
				jQuery('span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.portfolioshow').css('border-bottom','1px solid #888888');
				jQuery('.portfolio').show();
				jQuery(document).start();
			}
		)
		
		
		jQuery(document).ready(function() {
		jQuery('#site-title').show();
		jQuery('.button').show();
		jQuery('.show').show();
		
		});
		</script>
		
		
<span class="main">
		<div id="app_title_save"><input type="submit" name="save" id="save" value="Save" class="button" ></div><!--close app_title_save-->
				
		<div id="app_title">Logo</div> <!--close app_title-->
		<div id="content">
			<div class="left_content">
			
					<?php

					$logo = get_option(THEME_NAME.'_logo'); if(empty($logo)) {$logo = get_template_directory_uri()."/images/logo.png";}else{
						?>
							<script type="text/javascript">
								jQuery(document).ready(function() {
										jQuery('.logoupload').hide();
								});
							</script>
						<?php
					}?>		
					
					<input type="text" value="<?php echo $logo;?>" name="<?php echo THEME_NAME.'_logo'?>"  style="width:100px;height: 30px;"  class="postbox small"/>
	
					<span id="<?php echo THEME_NAME.'_logo'?>" class="button upload gd_upload logoupload show">Upload Image</span>
					<span class="button gd_remove" id="remove_<?php echo THEME_NAME.'_logo'?>">Remove Image</span>							
					<div class="gd_image_preview">
						<img src="<?php echo $logo;?>"/>
					</div>
			</div> <!--close content-->
			<div class="right_content"> Upload Your logo or paste logo url</div><!-- close right_content-->
		</div> <!--close content-->
   
       
       <div id="app_title">Favicon</div><!--close app_title-->
       <div id="content">
           <div class="left_content">
               <?php $favicon = get_option(THEME_NAME.'_favicon'); if(empty($favicon)) {$favicon = GD_THEME_DIR."/images/favicon.ico";}?>    
               <input type="text" value="<?php echo $favicon;?>" name="<?php echo THEME_NAME ?>_favicon" style="width:100px;height: 30px;" class="postbox small"/>
               <span id="<?php echo THEME_NAME ?>_favicon" class="button upload gd_upload faviconupload show ">Upload Image</span>
               <?php 
               $check = get_option(THEME_NAME.'_favicon');
               ?>
               <span class="button gd_remove" id="remove_<?php echo THEME_NAME ?>_favicon">Remove Image</span>                                    
               
           
           <div class="gd_image_preview_holder">
                   <img src="<?php echo $favicon;?>"/>
               </div>        
           </div>
           <div class="right_content"> Upload Your favicon or paste favicon url (16x16px)</div>
       </div>
		<div id="app_subtitle">Email Subject</div>
		<div id="content">
			<div class="left_content">
				<div>Name of email you will get trought your contact form:</div>
				<?php $email_subject = get_option('email_subject');
				if(empty($email_subject)){
					$email_subject = 'Contact from '.THEME_NAME.' theme';
					update_option('email_subject',$email_subject);
				}
				?>
				<input type="text" id="" name="email_subject" class="postbox" style="width:100px;height: 30px;" value="<?php echo $email_subject;?>" />
				
			</div>
			<div class="right_content">This is Email Subject for sending email trought your Contact form to your admin email</div>
		</div>
			
		<div id="app_title">Footer</div>				
		<div id="app_subtitle">Footer Copyright text</div>
		<div id="content">
			<div class="left_content">
			
				<?php 
				$copyright = get_option('footer_copyright');
				
				
				$search  = array('\"', "\'" ,'<','>','"');
			$replace = array('"', "'",'&lt;','&gt;',"'"); 
			$copyright = str_replace($search ,$replace ,$copyright);
		
				if(empty($copyright)) { $copyright = "Copyright Information Goes Here 2010.  All Rights Reserved.";}?>
				<input type="text" id="" name="footer_copyright" class="postbox" style="width:100px;height: 30px;" value="<?php echo $copyright;?>" />
				
			</div>
			<div class="right_content">Insert Your Copyright text</div>
		</div>
		<div id="app_subtitle">Twitter</div>
		<div id="content">
			<div class="left_content">
				<div>Your Twitter account name:</div>
				<?php $twitter = get_option('footer_twitter');?>
				<input type="text" id="" name="footer_twitter" class="postbox" style="width:100px;height: 30px;" value="<?php echo $twitter;?>" />
				
			</div>
			<div class="right_content">Insert account name. <b>Example: "themeskingdom"</b> (If you leave field empty the twitter icon will be removed from footer)</div>
		</div>
		<div id="app_subtitle">Facebook</div>
		<div id="content">
			<div class="left_content">
				<div>Link to your Facebook page:</div>
				<?php $facebook = get_option('footer_facebook');?>
				<input type="text" id="" name="footer_facebook" class="postbox" style="width:100px;height: 30px;" value="<?php echo $facebook;?>" />
				
			</div>
			<div class="right_content">Insert link to your Facebook page. <b>Example: "http://www.facebook.com/themeskingdom"</b> (If you leave field empty the facebook icon will be removed from footer)</div>
		</div>
		<div id="adminfooter">
			<div id="content">
				<div class="left_content">
				<span class="brought">Brought to you by</span>
				<span class="themeskingdom"></span>
				<span class="themeskingdomabout">Kingdom of <b>Awesomeness</b></span>
						<input type="submit" name="save" id="save" value="Save" class="button">
				</div>
				<div id="right_content">
				</div>
			</div>
		</div>
		</form>
</span>
<span class="loader" style="display:none;"></span>
<span class="front">
			
	   		<div id="app_title_save"><input type="submit" name="save_front" id="save" value="Save" class="button" ></div><!--close app_title_save-->
	   		
	   		<div id="app_title">Slideshow options</div>
			<div id="content">
			<div class="left_content">
				
				<div>Category</div>
				<?php 

				
				$cat = get_option(THEME_NAME.'_slider_category');
 				$selected_category = $cat;

				$args = array(
				    'show_option_all'    => '',
				    'show_option_none'   => '',
				    'orderby'            => 'ID', 
				    'order'              => 'ASC',
				    'show_last_update'   => 0,
				    'show_count'         => 0,
				    'hide_empty'         => 1, 
				    'child_of'           => 0,
				    'exclude'            => '',
				    'echo'               => 1,
				    'selected'           => $selected_category,
				    'hierarchical'       => 0, 
				    'name'               => THEME_NAME.'_slider_category',
				    'id'                 => '',
				    'class'              => 'postform',
				    'depth'              => 0,
				    'tab_index'          => 0,
				    'taxonomy'           => 'category',
				    'hide_if_empty'      => false );  
				    
				     wp_dropdown_categories( $args );  
				     
				?>
				
			<?php $effect = get_option(THEME_NAME.'_slider_effect'); if(empty($effect)) {$effect = "random";}
					$slices = get_option(THEME_NAME.'_slider_slices'); if(empty($slices)) {$slices = "15";}
					$pauseTime = get_option(THEME_NAME.'_slider_pauseTime'); if(empty($pauseTime)) {$pauseTime = "3000";}
					$directionNav = get_option(THEME_NAME.'_slider_directionNav'); if(empty($directionNav)) {$directionNav = "true";} ?>
		

		<script type="text/javascript">
			jQuery('.nivoeffects').hide();
			var slidertype = jQuery('.slidertype').val();
			if(slidertype == "NivoSlider"){
					jQuery('.nivoeffects').show();
				}
			jQuery('.slidertype').change(function(){
				var type = jQuery(this).val();
				if(type == "NivoSlider"){
					jQuery('.nivoeffects').show();
				}else{
					jQuery('.nivoeffects').hide();	
				}
			});
		</script>
		
				</div>
		<div class="right_content">Edit Your homepage slideshow options</div>		
		</div>
		
		<div id="app_title">More info area</div>
			<div class="left_content">
				<?php
				$menubutton = get_option(THEME_NAME."_custom_menu_button");
				$menubuttonurl = get_option(THEME_NAME."_custom_menu_button_url");
				$menubuttontext= get_option(THEME_NAME."_custom_menu_button_text");
				?>

				<label style="width:70px;text-align:right;float:left;clear:both;margin: 20px 5px 0 0;cursor: auto;">Text:</label>
				<textarea style="float:left;margin: 20px 0;width: 400px;height: 120px;" name="<?php echo THEME_NAME; ?>_custom_menu_button_text"><?php echo $menubuttontext;?></textarea>

				<label style="width:70px;text-align:right;float:left;clear:both;margin: 20px 5px 0 0;cursor: auto;">Name for button:</label>
				<textarea style="float:left;margin: 20px 0;width: 400px;height: 30px;" name="<?php echo THEME_NAME; ?>_custom_menu_button"><?php echo $menubutton;?></textarea>

				<label style="width:70px;text-align:right;float:left;clear:both;margin: 20px 5px 0 0;cursor: auto;">Url for button:</label>
				<textarea style="float:left;margin: 20px 0;width: 400px;height: 30px;" name="<?php echo THEME_NAME; ?>_custom_menu_button_url"><?php echo $menubuttonurl;?></textarea>
	

			</div>
		
		<div class="right_content">Edit text and button for more info area.</div>		


		<div id="adminfooter">
			<div id="content">
				<div class="left_content">
				<span class="brought">Brought to you by</span>
				<span class="themeskingdom"></span>
				<span class="themeskingdomabout">Kingdom of <b>Awesomeness</b></span>
					<input type="submit" name="save_front" id="save" value="Save" class="button">
				</div>
				<div id="right_content">
				</div>
			</div>
		</div>						
		</form>
</span>
<div class="spanloader">
</div>


<span class="blog">
	   		<div id="app_title_save"><input type="submit" name="save_blog" id="save" value="Save" class="button" ></div><!--close app_title_save-->
				<div id="app_title">Blog Categories</div>
					<div id="content">
						<div class="left_content">	
							<?php $categories = get_categories('orderby=name');
									$cheked_category = get_option(THEME_NAME.'_blog_include_category');
										foreach ($categories as $category_list ) { ?>																
											<p><input class="gd_super_check" type="checkbox" value="<?php echo $category_list->cat_ID;?>" name="categories_id_blog[<?php echo $category_list->cat_ID;?>]" <?php if(!empty($cheked_category[0][$category_list->cat_ID])) { echo "checked";}?> > <?php echo $category_list->cat_name;?></p>
							<?php } ?>
						</div>
					<div class="right_content">You can select which categories to display on blog page</div>
					</div>
		<div id="adminfooter">
			<div id="content">
				<div class="left_content">
				<span class="brought">Brought to you by</span>
				<span class="themeskingdom"></span>
				<span class="themeskingdomabout">Kingdom of <b>Awesomeness</b></span>
					<input type="submit" name="save_blog" id="save" value="Save" class="button">
				</div>
				<div id="right_content">
				</div>
			</div>
		</div>						
		</form>
</span>

<span class="portfolio">
	   		<div id="app_title_save"><input type="submit" name="save_portfolio" id="save" value="Save" class="button" ></div><!--close app_title_save-->
				<div id="app_title">Portfolio Categories</div>
					<div id="content">
						<div class="left_content">	
							<?php $categories = get_categories('orderby=name');
									$cheked_category = get_option(THEME_NAME.'_portfolio_include_category');
										foreach ($categories as $category_list ) { ?>																
											<p><input class="gd_super_check" type="checkbox" value="<?php echo $category_list->cat_ID;?>" name="categories_id_portfolio[<?php echo $category_list->cat_ID;?>]" <?php if(!empty($cheked_category[0][$category_list->cat_ID])) { echo "checked";}?> > <?php echo $category_list->cat_name;?></p>
							<?php } ?>
						</div>
					<div class="right_content">You can select which categories to display on Portfolio page</div>
				</div>
				

		<div id="adminfooter">
			<div id="content">
				<div class="left_content">
				<span class="brought">Brought to you by</span>
				<span class="themeskingdom"></span>
				<span class="themeskingdomabout">Kingdom of <b>Awesomeness</b></span>
					<input type="submit" name="save_portfolio" id="save" value="Save" class="button">
				</div>
				<div id="right_content">
				</div>
			</div>
		</div>						
		</form>
</span>


						
	</form>

   
  
   
 
    
   
<?php }

 
 ?>