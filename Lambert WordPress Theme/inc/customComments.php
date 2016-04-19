<?php
	function KHT_menu_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );
		if ( isset( $args['avatar_size'] ) ) {
			$args['avatar_size'] = 50;
		}
		?>
	<li <?php comment_class( 'comment ' . ( $depth > 1 ? 'children' : '' ) ) ?> id="comment-<?php comment_ID() ?>">
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<div class="comment-author">
				<?php
					if ( $args['avatar_size'] != 0 ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
				?>
			</div>
			<cite class="fn"><?= get_comment_author_link() ?></cite>

			<div class="comment-meta">
				<h6><?= get_comment_date( 'F j, Y' ) ?> at <?= get_comment_time( 'G:i' ) ?> /
					<?php $reply_link = get_comment_reply_link( array_merge( $args, array(
						'depth' => $depth,
					) ) ); ?>
					<?= $reply_link ?>
				</h6>
			</div>
			<?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<br/>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
				<br/>
			<?php endif; ?>
		</div>
	<?php
	}