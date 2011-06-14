<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php $moreInfo = array(); ?>
<?php if (count($_list)): ?>
<?php $moreInfo[] = link_to(__('More'), 'all_checkin_list'); ?>
<?php endif; ?>

<?php op_include_list('snsRecentCheckInList', $_list, array('title'=>__('Recent %checkin% of all'), 'moreInfo'=>$moreInfo)); ?>
