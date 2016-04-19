<?php

	if ( ! comments_open() ) {
		return;
	}
?>

<div class="row align-text">
	<div class="col-md-12">
		<div id="comments">

			<!--title-->
			<h6 id="comments-title">Comments <span>( <?= get_comments_number() ?> )</span></h6>

			<ul class="commentlist clearafix">
				<?php wp_list_comments( array( 'callback' => 'KHT_menu_comments' ), get_comments( array(
					'post_id' => get_the_ID(),
					'status'  => 'approve'
				) ) ); ?>
			</ul>

			<div class="clearfix"></div>
			<div class="clearafix">
				<h6 >Leave A Comment</h6>

				<div class="comment-reply-form clearfix">
					<?php
						$commenter = wp_get_current_commenter();
						$req       = get_option( 'require_name_email' );
						$aria_req  = ( $req ? " aria-required='true'" : '' );
						comment_form( array(
								'fields'               => array(
									'author' => '<div class="comment-form-author control-group"><div class="controls"><input id="author" name="author" type="text" value="" size="40" aria-required="true"/></div><label class="control-label" for="author">Name </label></div>',
									'email'  => '<div class="comment-form-email control-group"><div class="controls"><input id="email" name="email" type="text" value="" size="40" aria-required="true"/></div><label class="control-label" for="email">Email </label></div>',
								),
								'id_submit'            => 'submit',
								'class_submit'         => 'transition button',
								'title_reply'          => '',
								'title_reply_to'       => '',
								'cancel_reply_link'    => '',
								'label_submit'         => 'Post Comment',
								'format'               => 'html5',
								'comment_field'        => '<div class="comment-form-comment control-group"><div class="controls"><textarea id="comment" name="comment" cols="50" rows="8" aria-required="true" placeholder="Your comment here.."></textarea></div></div>',
								'must_log_in'          => '<p class="must-log-in">' .
								                          sprintf(
									                          __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
									                          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
								                          ) . '</p>',
								'logged_in_as'         => '<p class="logged-in-as">' .
								                          sprintf(
									                          __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
									                          admin_url( 'profile.php' ),
									                          wp_get_current_user()->display_name,
									                          wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
								                          ) . '</p>',
								'comment_notes_before' => '',
								'comment_notes_after'  => '',
							)
						);
					?>
				</div>
			</div>
			<!--end respond-->
		</div>
	</div>
</div>