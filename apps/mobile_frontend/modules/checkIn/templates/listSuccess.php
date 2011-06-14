<?php
$memberName = isset($member) ? $member->getName() : '';
$title = __($sf_data->getRaw('title'), array('%member_name%'=>$memberName));
?>

<?php if($pager->getNbResults() > 0): ?>
<?php $list = array(); ?>
<?php foreach($pager->getResults() as $checkIn): ?>
  <?php $list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>
  <?php op_include_list('checkInList', $list, array('title'=>$title)); ?>
  <?php op_include_pager_total($pager, 'checkIn/'.$sf_request->getParameter('action').'?page=%s'.(isset($member) ? '&member_id='.$member->getId() : '')); ?>
<?php else: ?>
  <?php op_include_box('checkInList', __('No %checkin%.'), array('title'=>$title)); ?>
<?php endif; ?>