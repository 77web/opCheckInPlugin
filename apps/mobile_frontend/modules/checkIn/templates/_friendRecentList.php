<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php $moreInfo = array(); ?>
<?php if (count($_list)): ?>
<?php $moreInfo[] = link_to(__('More'), 'friend_checkin_list'); ?>
<?php endif; ?>

<?php op_include_list('friendRecentCheckInList', $_list, array('title'=>__('Recent %checkin% of %my_friend%'), 'moreInfo'=>$moreInfo)); ?>