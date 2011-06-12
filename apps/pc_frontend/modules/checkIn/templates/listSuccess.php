<?php if($pager->getNbResults() > 0): ?>
<ul>
<?php foreach($pager->getResults() as $checkIn): ?>
  <li><?php echo op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa').link_to(__('%checkin% to %spot%', array('%spot%'=>$checkIn->getCheckInSpot()->getName())), '@checkin_show?id='.$checkIn->getId()); ?></li>
<?php endforeach; ?>
</ul>
<?php else: ?>
  <p><?php echo __('No %checkin%.'); ?></p>
<?php endif; ?>