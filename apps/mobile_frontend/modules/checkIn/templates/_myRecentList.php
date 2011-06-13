<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php $moreInfo = array(); ?>
<?php if (count($_list)): ?>
<?php $moreInfo[] = link_to(__('More'), 'my_checkin_list'); ?>
<?php endif; ?>
<?php $moreInfo[] = link_to(__('New %checkin%'), 'checkin_now'); ?>

<?php op_include_list('myRecentCheckInList', $_list, array('title'=>__('My recent %checkin%'), 'moreInfo'=>$moreInfo)); ?>
