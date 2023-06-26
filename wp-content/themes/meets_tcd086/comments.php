<?php
     if ( post_password_required() ) {
       return;
     }
     $options = get_design_plus_option();
?>

<div id="comments">

  <h3 class="comment_headline rich_font"><?php _e('Comment', 'tcd-w'); ?></h3>

  <div id="comment_header" class="clearfix">
   <ul id="comment_tab" class="clearfix">
    <?php if ($options['single_blog_show_comment']){ ?><li class="active"><a href="#commentlist_wrap"><?php comments_number( '0','1','%' ); ?> <?php _e( 'Comments', 'tcd-w' ); ?></a></li><?php }; ?>
    <?php if ($options['single_blog_show_trackback']){ ?><li<?php if (!$options['single_blog_show_comment']){ echo ' class="active"'; }; ?>><a href="#pinglist_wrap"><?php echo count($wp_query->comments_by_type['pings']); ?> <?php _e( 'Trackbacks', 'tcd-w' ); ?></a></li><?php }; ?>
   </ul>
  </div>

  <?php global $wp_query; ?>

   <?php
        //if there is comment show comment list
        if ($options['single_blog_show_comment']) {
          if ( !empty ( $comments_by_type['comment'] ) ) {
   ?>
   <div id="commentlist_wrap" class="tab_contents">
    <ol class="commentlist">
     <?php wp_list_comments('type=comment&callback=custom_comments'); ?>
    </ol>
    <?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
    <nav class="comments-nav group">
     <?php $comment_pages = paginate_comments_links('echo=0'); if ($comment_pages) { ?>
     <div id="comment_pager" class="clearfix">
      <?php echo $comment_pages; ?>
     </div>
     <?php }; ?>
    </nav>
    <?php endif; ?>
   </div><!-- END #commentlist_wrap -->
   <?php } else { ?>
   <div id="commentlist_wrap" class="tab_contents">
    <div class="comment_message">
     <p><?php _e('There are no comment yet.','tcd-w'); ?></p>
    </div>
   </div>
   <?php }; }; ?>

   <?php
        //if there is pingback show ping list
        if ($options['single_blog_show_trackback']) {
          if ( !empty ( $comments_by_type['pings'] )) {
   ?>
   <div id="pinglist_wrap" class="tab_contents" <?php if($options['single_blog_show_comment']) { echo 'style="display:none;"'; }; ?>>
    <div id="trackback_url_area">
     <label for="trackback_url"><?php _e('TRACKBACK URL' , 'tcd-w'); ?></label>
     <input type="text" name="trackback_url" id="trackback_url" size="60" value="<?php trackback_url() ?>" readonly="readonly" onfocus="this.select()" />
    </div>
    <ol class="commentlist">
     <?php
          $pings = $comments_by_type['pings'];
          foreach ($pings as $ping) {
     ?>
     <li class="comment">
      <div class="post_content">
       <div class="ping-link"><?php comment_author_link($ping); ?></div>
       <div class="ping-meta"><?php comment_date('Y.m.d', $ping ); ?></div>
       <div class="ping-content"><?php comment_text($ping); ?></div>
      </div>
     </li>
     <?php } ?>
    </ol>
   </div><!-- END #pinglist_wrap -->
   <?php } else { ?>
   <div id="pinglist_wrap" class="tab_contents" <?php if($options['single_blog_show_comment']) { echo 'style="display:none;"'; }; ?>>
    <div id="trackback_url_area">
     <label for="trackback_url"><?php _e('TRACKBACK URL' , 'tcd-w'); ?></label>
     <input type="text" name="trackback_url" id="trackback_url" size="60" value="<?php trackback_url() ?>" readonly="readonly" onfocus="this.select()" />
    </div>
    <div class="comment_message">
     <p><?php _e('There are no trackback yet.','tcd-w'); ?></p>
    </div>
   </div><!-- END #pinglist_wrap -->
   <?php }; }; ?>


  <?php if ( comments_open() && $options['single_blog_show_comment']) { ?>

  <fieldset class="comment_form_wrapper" id="respond">

   <?php if (function_exists('comment_reply_link')) { ?>
   <div id="cancel_comment_reply"><?php cancel_comment_reply_link() ?></div>
   <?php } ?>

   <form action="<?php echo esc_url(site_url('/')); ?>wp-comments-post.php" method="post" id="commentform">

   <?php if ( is_user_logged_in() ) : ?>

    <div id="comment_user_login" class="clearfix">
     <p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'tcd-w'), get_site_url() . '/wp-admin/profile.php', $user_identity); ?><span><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'tcd-w'); ?>"><?php _e('Log out', 'tcd-w'); ?></a></span></p>
    </div><!-- #comment-user-login END -->

   <?php else : ?>

    <div id="guest_info">
     <div id="guest_name"><label for="author"><span><?php _e('NAME','tcd-w'); ?></span><?php if ($req) _e('( required )', 'tcd-w'); ?></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></div>
     <div id="guest_email"><label for="email"><span><?php _e('E-MAIL','tcd-w'); ?></span><?php if ($req) _e('( required )', 'tcd-w'); ?> <?php _e('- will not be published -','tcd-w'); ?></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></div>
     <div id="guest_url"><label for="url"><span><?php _e('URL','tcd-w'); ?></span></label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></div>
    </div>

   <?php endif; ?>

    <div id="comment_textarea">
     <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
    </div>

    <div id="submit_comment_wrapper">
     <?php do_action('comment_form', $post->ID); ?>
     <input name="submit" type="submit" id="submit_comment" tabindex="5" value="<?php _e('Submit Comment', 'tcd-w'); ?>" title="<?php _e('Submit Comment', 'tcd-w'); ?>" />
    </div>
    <div id="input_hidden_field">
     <?php if (function_exists('comment_id_fields')) { ?>
     <?php comment_id_fields(); ?>
     <?php } else { ?>
     <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
     <?php } ?>
    </div>

   </form>

  </fieldset><!-- END .comment_form_wrapper -->

  <?php }; ?>

</div><!-- END #comments -->

