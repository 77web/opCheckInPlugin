<dl>
<dt><?php echo nl2br(op_format_date($comment->created_at, 'XDateTimeJaBr')) ?></dt>
<dd>
<div class="title">
<p class="heading"><strong><?php echo $comment->number ?></strong>:
<?php if ($_member = $comment->Member): ?> <?php echo link_to($_member->name, '@obj_member_profile?id='.$_member->id) ?><?php endif; ?>
<?php if ($checkIn->member_id === $sf_user->getMemberId() || $comment->member_id === $sf_user->getMemberId()): ?>
 <?php //echo link_to(__('Delete'), '@checkin_comment_delete?id='.$comment) ?>
<?php endif; ?>
</p>
</div>
<div class="body">
<p class="text">
<?php echo op_url_cmd(nl2br($comment->body)) ?>
</p>
</div>
</dd>
</dl>