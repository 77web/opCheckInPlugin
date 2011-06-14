<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php $moreInfo = array(); ?>
<?php if (count($_list)): ?>
<?php $moreInfo[] = link_to(__('More'), 'checkin_list?member_id='.$member->getId()); ?>
<?php endif; ?>

<?php op_include_list('memberRecentCheckInList', $_list, array('title'=>__('%name%\'s recent %checkin%', array('%name%'=>$member->getName(), 'moreInfo'=>$moreInfo)); ?>

