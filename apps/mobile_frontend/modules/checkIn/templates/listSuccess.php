<?php $title = __('%checkin%'); ?>

<?php if($pager->getNbResults() > 0): ?>
<?php $list = array(); ?>
<?php foreach($pager->getResults() as $checkIn): ?>
  <?php $list[] = op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa').'<br />'.link_to(__('%checkin% to %spot%', array('%spot%'=>$checkIn->getCheckInSpot()->getName())), '@checkin_show?id='.$checkIn->getId()); ?>
<?php endforeach; ?>
  <?php op_include_list('checkInList', $list, array('title'=>$title)); ?>
  <?php op_include_pager_total($pager, 'checkIn/list?page='.$pager->getPage().'&member_id='.$memberId); ?>
<?php else: ?>
  <?php op_include_box('checkInList', __('No %checkin%.'), array('title'=>$title)); ?>
<?php endif; ?>