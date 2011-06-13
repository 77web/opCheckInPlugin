<?php

$options = array();
$options['title'] = __('Are you sure to delete the comment to %checkin% ?');
$options['yes_url'] = url_for('@checkin_comment_delete?id='.$comment->getId());
$options['no_url'] = url_for('@checkin_show?id='.$comment->getCheckInId());


op_include_yesno('checkInCommentDeleteConfirm', $form, $form, $options);