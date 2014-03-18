<?php
/*
The comments page for Bones
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Ah ah ah...you didn\'t say the magic word!');

  if ( post_password_required() ) { ?>
  	<div class="alert help">
    	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "nerdy"); ?></p>
  	</div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

    <strong id="comments" class="dull"><?php comments_number('No Comments', 'One Comment', '%</ Comments' );?></strong>
	<br /><br />	

	<!-- the meat and potatoes -->
	<section class="commentlist">
		<?php $args = array(
            'walker'            => null,
            'max_depth'         => '',
            'style'             => 'div',
            'callback'          => null,
            'end-callback'      => null,
            'type'              => 'all',
            'reply_text'        => 'Reply',
            'page'              => '',
            'per_page'          => '',
            'avatar_size'       => 32,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'html5', //or xhtml if no HTML5 theme support
            'short_ping'        => false // @since 3.6
        ); ?>
        
        <?php wp_list_comments( $args, $comments ); ?> 
	</section>
	
	
	<!-- comments navigation -->
	<nav id="comment-nav" class="pull-right">
		<?php previous_comments_link() ?>
	  	<?php next_comments_link() ?>
	</nav>
</div>	

	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
	
	<!-- If comments are closed. -->
	<p class="nocomments"><?php _e("Comments are closed.", "nerdy"); ?></p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <section id="respond" class="respond-form">
        <strong id="comment-form-title" class="dull"><?php comment_form_title( __('Leave a Comment', 'nerdy'), __('Leave a Comment to %s', 'nerdy' )); ?></strong>
    
        <div id="cancel-comment-reply">
            <p class="small"><?php cancel_comment_reply_link(); ?></p>
        </div>
    
        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
        <div class="alert help">
            <p><?php printf( 'You must be %1$slogged in%2$s to post a comment.', '<a href="<?php echo wp_login_url( get_permalink() ); ?>">', '</a>' ); ?></p>
        </div>
        <?php else : ?>
    
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    
        <?php if ( is_user_logged_in() ) : ?>
    
        <p class="comments-logged-in-as"><?php _e("Logged in as", "nerdy"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e("Log out", "nerdy"); ?> &raquo;</a></p>
    
        <?php else : ?>
        
        <section id="comment-form-elements" class="clearfix">
            
            <label for="author"><?php _e("Name", "nerdy"); ?> <?php if ($req) echo "*"; ?></label><br />
              <input type="text" name="author" id="author" class="form-control" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e('Your Name', 'nerdy'); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
            
            <br />
            
            <label for="email"><?php _e("Email", "nerdy"); ?> <?php if ($req) echo "*"; ?></label><br />
              <input type="email" name="email" id="email" class="form-control" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e('Your E-Mail', 'nerdy'); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
            
            <br />
            
            <label for="url"><?php _e("Website", "nerdy"); ?></label><br />
              <input type="url" name="url" id="url" class="form-control" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e('Got a website?', 'nerdy'); ?>" tabindex="3" />
            
        </section>
    
        <?php endif; ?>
        
        <br />
            
        <textarea name="comment" id="comment" class="form-control" placeholder="<?php _e('What, what?!', 'nerdy'); ?>" tabindex="4"></textarea>
        
        <br />
            
        <input name="submit" type="submit" id="submit" class="btn btn-alt" tabindex="5" value="<?php _e('Submit', 'nerdy'); ?>" />
          <?php comment_id_fields(); ?>
        
        
        
        
        <?php do_action('comment_form', $post->ID); ?>
        
        </form>
        
        <?php endif; // If registration required and not logged in ?>
    </section>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
