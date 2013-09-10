<?php
/*---------------------------------------------------------------------------------*/
/* WooTabs widget */
/*---------------------------------------------------------------------------------*/

class App_Video extends WP_Widget {

   function App_Video() {
  	   $widget_ops = array('description' => 'Video Widget allowes you to publish video from vimeo and youtube on your site. Add widget to your sidebar and just enter url of video you want to publish' );
       parent::WP_Widget(false, $name = __(THEME_NAME.' - Video', THEME_NAME), $widget_ops);    
   }


    function widget($args, $instance) {  
		extract( $args );
		$title = $instance['title'];
		$url = $instance['url']; ?>
		
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; } ?>
		
		<?php 
		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
			if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);

		?>
			<div class="holder">
				<object width="216" height="210">
					<param name="movie" value="http://www.youtube.com/v/<?php echo $url;?>?version=3&autohide=1&showinfo=0"></param>
					<param name="allowScriptAccess" value="always"></param>
					<embed src="http://www.youtube.com/v/<?php echo $url;?>?version=3&autohide=1&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" width="216" height="210"></embed>
				</object>
			</div>
		<?php  }
		if (!empty($pos_vimeo)) {
/*			$url = str_replace('watch?v=','embed/',$url);*/
			$url = explode('.com/',$url);
/*			$url = $url[0];*/
		
		?>
		<div class="holder">
			<object width="216" height="210">
				<param name="allowfullscreen" value="true" />
				<param name="allowscriptaccess" value="always" />
				<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $url[1];?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" />
				<embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $url[1];?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="216" height="210"></embed>
			</object>
		</div>
		<?php  }
		if (empty($pos_vimeo) && empty($pos_youtube)) {
		 
		  echo "Video only allowes vimeo and youtube!";
		}
		?>
		
		<?php echo $after_widget; ?>   
    <?php
	
   }}

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {        
   
		$title = esc_attr($instance['title']);
		$url = esc_attr($instance['url']);
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		
		<p>
		   <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL of video:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('url'); ?>"  value="<?php echo $url; ?>" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" />
		</p>
       
       <?php 
   }
   }

register_widget('App_Video');
?>