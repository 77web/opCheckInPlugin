<?php

$options = array();
$options['title'] = __('Are you sure to delete %checkin% ?');
$options['body'] = __('%checkin% to %spot% at %date%', array('%spot%'=>$checkIn->getCheckInSpot()->getName(), '%date%'=>op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa')));
$options['yes_url'] = url_for('@checkin_delete?id='.$checkIn->getId());
$options['no_url'] = url_for('@checkin_show?id='.$checkIn->getId());


op_include_yesno('checkInDeleteConfirm', $form, $form, $options);