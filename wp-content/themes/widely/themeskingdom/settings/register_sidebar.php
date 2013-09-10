<?php 
	if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 1',
						'before_widget' => '<div class="footer_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="footer_widgettitle">',
						'after_title'   => '</div>' )
						);
	} 
	
	if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 2',
						'before_widget' => '<div class="footer_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="footer_widgettitle">',
						'after_title'   => '</div>' )
						);
	} 
	
	if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 3',	
						'before_widget' => '<div class="footer_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="footer_widgettitle">',
						'after_title'   => '</div>' )
						);
	} 
	
	if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 4',	
						'before_widget' => '<div class="footer_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="footer_widgettitle">',
						'after_title'   => '</div>' )
						);
	} 
?>