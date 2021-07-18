<?php
/**
 * Template part for post comments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Meyti
 */



if ( post_password_required() ) {
	return;
}

$meyti_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		;
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $meyti_comment_count ) : ?>
				<?php esc_html_e( '1 comment', 'meyti' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $meyti_comment_count, 'Comments title', 'meyti' ) ),
					esc_html( number_format_i18n( $meyti_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'meyti' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

    <?php paginate_comments_links( array('prev_text' => '&laquo; PREV', 'next_text' => 'NEXT &raquo;') ); ?>


<?php

    $commenter=  wp_get_current_commenter();

    $req=  get_option('require_name_email');

    $aria_req=($req?"aria-required='true'":'');

    $fields =  array(



        'author' =>       '<div class="col-md-6 form-group">' . '<input class="form-control" id="author" name="author"
                            type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Your Name*"' . $aria_req . ' /></div><br>',

        'email'  => '<div class="col-md-6 form-group">
                        <input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="Your Email*"' . $aria_req . '/></div><br>',

        'url'    => '<div class="row">' . '<div class="col col-md-6 form-group">' . '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Your Website"/></div><div class="clearfix"></div></div><br>',
        
        'comment_field' => '<div class="row">
        <div class="col col-md-6 form-group">
          <textarea name="comment" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Your comment"></textarea></div></div><br>',
    
    );

    $comments_args=array(

        'fields'=>$fields,

        'title_reply'=>'Leave a Reply',

        //'comment_notes_before'=>'<p class="comment-notes">Some Texts</p>',

       // 'comment_notes_after'=>'<p class="comment-notes-after">Some Text</p>'

    );

    comment_form($comments_args); ?>
</div><!-- #comments -->

