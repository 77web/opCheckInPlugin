<?php echo op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa').'<br />'.link_to(__('%checkin% to %spot%', array('%spot%'=>$checkIn->getCheckInSpot()->getName())), '@checkin_show?id='.$checkIn->getId()); ?>