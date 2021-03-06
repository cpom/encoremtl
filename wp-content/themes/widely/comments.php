<ul id="commentlist">
    <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>
<br />

<div class="comment_popup_wrap"><span class="comment_popup">COMMENT</span></div><span class='comment_popup_border'></span>
<div id="respond" class="respond-style">

    <!--COMMNET FORM-->

    <div class="cancel-comment-reply">
        <small><?php cancel_comment_reply_link(); ?></small>
    </div> <!-- end cancel-comment-reply div -->

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p class="comment-p-style"><?php _e('You must be',THEME_NAME)?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in',THEME_NAME) ?></a> <?php _e('to post a comment.',THEME_NAME) ?></p>
    <?php else : ?>
    <div class="form-holder-comments">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform contact-form" class="commnet">
                <?php if ( $user_ID ) : ?>

            <div class="comment-form-left margintop15" >
                <p><?php  _e('Logged in as',THEME_NAME) ?> <a  href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out &raquo;',THEME_NAME) ?></a></p>
            </div>
                <?php else : ?>

            <div class="comment-form-left margintop15" >
                <input class="form-field" type="text" spellcheck="false" name="author" id="contactname" value="Name" class="contact_input_text" tabindex="1" />
                <input class="form-field" type="text" spellcheck="false" name="email" id="email" value="E-mail" class="contact_input_text" tabindex="2" />
                <input class="form-field" type="text" spellcheck="false" name="url" id="url" value="Website" class="contact_input_text" tabindex="3" />
            </div> <!-- close comment-form-left -->

                <?php endif; ?>
                                <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

            <textarea name="comment" spellcheck="false" id="message" class="input comment-textarea" tabindex="4">Message</textarea>

            <div class="form-send-button"><div class="form-send-button-left"></div><div class="form-send-button-center">
                    <input type="submit" class="blog-send-button" name="submit-comment"  value="Send" />
                </div>
                <div class="form-send-button-right"></div>
            </div>

            <div class="clear-both"></div>
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID);
                ?>
        </form>

        <div class="clear-both"></div>

    </div><!--form holder -->
    <?php endif; // If registration required and not logged in ?>
    <!-- This is jQuery for form fields -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('input[type="text"]').last().css('margin','0');
            jQuery('input[type="text"]').addClass("idleField");
            jQuery('input[type="text"]').focus(function() {
                jQuery(this).removeClass("idleField").addClass("focusField");
                if (this.value == this.defaultValue){
                    this.value = '';
                }
                if(this.value != this.defaultValue){
                    this.select();
                }
            });

            jQuery('input[type="text"]').blur(function() {
                jQuery(this).removeClass("focusField").addClass("idleField");
                if (jQuery.trim(this.value) == ''){
                    this.value = (this.defaultValue ? this.defaultValue : '');
                }
            });

            jQuery('textarea').addClass("idleField");
            jQuery('textarea').focus(function() {
                jQuery(this).removeClass("idleField").addClass("focusField");
                if (this.value == this.defaultValue){
                    this.value = '';
                }
                if(this.value != this.defaultValue){
                    this.select();
                }
            });

            jQuery('textarea').blur(function() {
                jQuery(this).removeClass("focusField").addClass("idleField");
                if (jQuery.trim(this.value) == ''){
                    this.value = (this.defaultValue ? this.defaultValue : '');
                }
            });
        });
    </script>
    <!-- end of script -->

</div> <!-- end respond div -->
<br/><br/><br/>