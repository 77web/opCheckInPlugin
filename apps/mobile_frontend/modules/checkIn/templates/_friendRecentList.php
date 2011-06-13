<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php op_include_list('friendRecentCheckInList', $_list, array('title'=>__('Recent %checkin% of %friend%'))); ?>