<?php $title = __('%checkin%'); ?>

<?php if($pager->getNbResults() > 0): ?>
<?php $list = array(); ?>
<?php foreach($pager->getResults() as $checkIn): ?>
  <?php $list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>
  <?php op_include_list('checkInList', $list, array('title'=>$title)); ?>
  <?php op_include_pager_total($pager, 'checkIn/list?page='.$pager->getPage().'&member_id='.$memberId); ?>
<?php else: ?>
  <?php op_include_box('checkInList', __('No %checkin%.'), array('title'=>$title)); ?>
<?php endif; ?>