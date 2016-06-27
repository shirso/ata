<?php
/**
 * @package WordPress
 * @subpackage my_framework
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 class="space" id="comments"><?php comments_number('No Comments', '1 Comments', '% Comments' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
		<p class="nocomments">No Comments Yet.</p>
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--p class="nocomments">Comments are closed.</p-->

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond" class="single-block">

<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<form action="" method="get" name="contact-form">
                        <label><span>Your Name</span><input name="name" type="text" value=""></label>
                        <label><span>Your E-mail</span><input name="email" type="email" value=""></label>
                        <label><span>Your Contact No</span><input name="tele" type="tel" value=""></label>
                        <label><span>Your Subject</span><input name="subject" type="text" value=""></label>
                        <label><span>Your Message</span><textarea name="message" cols="" rows=""></textarea></label>
                        <input name="Submit" type="submit" value="Submit">
                    </form>
<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>