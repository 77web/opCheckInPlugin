<?php

$options = array();
$options['title'] = __('Are you sure to delete %checkin% ?');
$options['body'] = __('%checkin% to %spot% at %date%', array('%spot%'=>$checkIn->getCheckInSpot()->getName()));


op_include_yesno('checkInDeleteConfirm', $form, $form, );