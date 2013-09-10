jQuery(document).ready(function(){
					




					// Menu
					
					jQuery("ul.menu").superfish(); 
					jQuery(".menu-container").superfish(); 
					jQuery(".menu ul li:first-child").before('<li class="sub-menu-top"></li>');
					jQuery(".menu ul li:last-child").after('<li class="sub-menu-bottom"></li>');
					
					//Message resizing
					
					jQuery('#message').elastic();
					
					
					//Tabs shortcode
					
					jQuery("#tabs_shortcode ul li:first-child").attr('style','-moz-border-radius-topleft: 5px; -webkit-border-top-left-radius: 5px; border-top-left-radius: 5px;');	
					
	
					//Calendar style
					
					
					   var cal = jQuery('#wp-calendar');
					   var text = jQuery('caption',cal).html();
					   if(text !== null){
					       jQuery('caption',cal).html('<span>'+text.substring(0,3)+'</span>');
					   } 

					      
					//Fancy box
					jQuery('.fancybox').fancybox();
					   
					   
                                           
                                         //Portfolio hover  
				/*	jQuery('.pirobox').each(function(){
                                                jQuery('img',this).animate({opacity:1},0);
                                        });

                                        jQuery('img','.pirobox').hover(function(){
                                                jQuery(this).stop().animate({opacity:0.4},500);
                                        },function(){
                                                jQuery(this).stop().animate({opacity:1},300);
                                        });

                                        jQuery('.fancybox').each(function(){
                                                jQuery('img',this).animate({opacity:1},0);
                                        });

                                        jQuery('img','.fancybox').hover(function(){
                                                jQuery(this).stop().animate({opacity:0.4},500);
                                        },function(){
                                                jQuery(this).stop().animate({opacity:1},300);
                                        });
					      */
					//Tag Cloud style
					
					  
			        var tagfix = $('.tagcloud a').html();
                                jQuery('.tagcloud a').each(function(){
						var tagfix = $(this).html();
						jQuery(this).html('').append('<div class="tag-holder"><div class="tag-left"></div><div class="tag-center">'+tagfix+'</div><div class="tag-right"></div>');
					});




                                       //Search style
					
					  
			        var searchfix = $('#searchform').html();$('#searchform').html('').append('<div class="search-button-holder"><div class="search-button-left"></div><div class="search-button-center">'+searchfix+'</div><div class="search-button-right"><input id="searchsubmit" type="submit" value=""></div></div>');
					jQuery(".search-button-center div #searchsubmit").remove();
					jQuery(".search-button-center div .screen-reader-text").remove();

			   		jQuery("input[name='s']").focus(function(){
			            if (jQuery(this).val() === "Search") {
			                jQuery(this).val("");
			            }
			        }).blur(function(){
			            if (jQuery(this).val() === "") {
			                jQuery(this).val("Search");
			            }
			        }).val("Search");
			   			
			   				
					$("#searchform").submit(function() {
						var value1 = jQuery('.footer_widget_holder #s').val();
							if (value1 !== "Search" && value1 !== "") {
								return true;
								}
								return false;
					});

                                        

					//TwitterFix

					jQuery('.twitter_ul li span').each(function(){
						var twittfix = $(this).html();
						jQuery(this).html('').append('<div class="twitter-box-holder"><div class="twitter-box-top"></div><div class="twitter-box-center">'+twittfix+'</div><div class="twitter-box-bottom"></div>');
					});
					
					
					//Pirobox
					
					jQuery().piroBox({
						my_speed: 300, //animation speed
						bg_alpha: 0.5, //background opacity
						slideShow : 'true', // true == slideshow on, false == slideshow off
						slideSpeed : 3, //slideshow
						close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
					});
					
			jQuery('.footer_widget_holder[class*="recent-posts"] li').attr('style', 'line-height:18px; padding:9px 0 9px 0;');
                      
					//Hide-Show text in contact form
					
					jQuery('.contact-input').addClass("idleField");
						jQuery('.contact-input').focus(function() {
						jQuery(this).removeClass("idleField").addClass("focusField");
						if (this.value == this.defaultValue){ 
						this.value = '';
						}
						if(this.value != this.defaultValue){
						this.select();
						}
						});
						jQuery('.contact-input').blur(function() {
						jQuery(this).removeClass("focusField").addClass("idleField");
						if ($.trim(this.value) == ''){
						this.value = (this.defaultValue ? this.defaultValue : '');
						}
					});

                                jQuery('.hoverimg').live({
						        mouseenter:
						           function()
						           {
									jQuery(this).stop().animate({opacity:0.4},500);
						           },
						        mouseleave:
						           function()
						           {
									jQuery(this).stop().animate({opacity:1},300);
						           }
						       }
						    );

});

