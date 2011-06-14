<?php
$memberName = isset($member) ? $member->getName() : '';
$title = __($sf_data->getRaw('title'), array('%member_name%'=>$memberName));
?>

<?php slot('checkInList'); ?>

<?php if($pager->getNbResults() > 0): ?>
<?php op_include_pager_navigation($pager, 'checkIn/'.$sf_request->getParameter('action').'?page=%s'.(isset($member) ? '&member_id='.$member->getId() : '')); ?>
<?php foreach($pager->getResults() as $checkIn): ?>
  <?php include_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php op_include_pager_navigation($pager, 'checkIn/'.$sf_request->getParameter('action').'?page=%s'.(isset($member) ? '&member_id='.$member->getId() : '')); ?>

<?php else: ?>
  <p><?php echo __('No %checkin%.'); ?></p>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('checkInList', get_slot('checkInList'), array('title'=>$title, 'class'=>'searchResultList')); ?>