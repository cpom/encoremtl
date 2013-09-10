<?php
/*---------------------------------------------------------------------------------*/
/* Blog Author Info */
/*---------------------------------------------------------------------------------*/
class App_BlogAuthorInfo extends WP_Widget {

   function App_BlogAuthorInfo() {
	   $widget_ops = array('description' => 'Blog Author Info Widget shows the blog author info text and http://en.gravatar.com (A Globally Recognized Avatar) image. Add it to a sidebar and write all options you need.' );
	   parent::WP_Widget(false, __(THEME_NAME.' - Blog Author Info', THEME_NAME),$widget_ops);      
   }

   function widget($args, $instance) {
       
		extract( $args );
		$title = $instance['title'];
		$bio = $instance['bio'];
		$custom_email = $instance['custom_email'];
		 $avatar_size  = isset ( $instance['avatar_size']);
                if  ( !$avatar_size ) $avatar_size = 75;
		$avatar_align = isset ($instance['avatar_align']);
                if ( !$avatar_align ) $avatar_align = 'left';
		$read_more_text = $instance['read_more_text'];
		$read_more_url = $instance['read_more_url']; ?>
		
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; } ?>
		<div class="gravatar_holder"><?php if ( $custom_email ) echo get_avatar( $custom_email, $size = 70 ); echo '<p class="separator"> </p><p class="authorp">'.$bio.'</p>';?></div>
		
		<?php if ( $read_more_url ) echo '<p class="authorp"><a href="' . $read_more_url . '">' . $read_more_text . '</a></p>'; ?>
		<?php echo $after_widget; ?>   
    <?php
	
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {        
   
		$title = esc_attr($instance['title']);
		$bio = esc_attr($instance['bio']);
		$custom_email = esc_attr($instance['custom_email']);
		$avatar_size = 75;
		$avatar_align = 75;
		$read_more_text = esc_attr($instance['read_more_text']);
		$read_more_url = esc_attr($instance['read_more_url']);
		$page = esc_attr($instance['page']);
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('bio'); ?>"><?php _e('Bio:',THEME_NAME); ?></label>
			<textarea name="<?php echo $this->get_field_name('bio'); ?>" class="widefat" id="<?php echo $this->get_field_id('bio'); ?>"><?php echo $bio; ?></textarea>
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('custom_email'); ?>"><?php _e('<a href="http://www.gravatar.com/">Gravatar</a> E-mail:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('custom_email'); ?>"  value="<?php echo $custom_email; ?>" class="widefat" id="<?php echo $this->get_field_id('custom_email'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('read_more_text'); ?>"><?php _e('Read More Text (optional):',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('read_more_text'); ?>"  value="<?php echo $read_more_text; ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_text'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('read_more_url'); ?>"><?php _e('Read More URL (optional):',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('read_more_url'); ?>"  value="<?php echo $read_more_url; ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_url'); ?>" />
		</p>
		<?php
	}
} 

register_widget('App_BlogAuthorInfo');
?>