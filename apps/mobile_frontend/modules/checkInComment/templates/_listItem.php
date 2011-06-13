[<?php printf('%03d', $comment->number) ?>]<?php echo op_format_date($comment->created_at, 'XDateTime') ?>
<?php if ($checkIn->member_id === $sf_user->getMemberId() || $comment->member_id === $sf_user->getMemberId()): ?>
[<?php echo link_to(__('Delete'), 'checkin_comment_delete', $comment) ?>]
<?php endif; ?><br>
<?php echo link_to($comment->Member->name, '@obj_member_profile?id='.$comment->member_id) ?><br>
<?php echo op_auto_link_text_for_mobile(nl2br($comment->body)) ?><br>
