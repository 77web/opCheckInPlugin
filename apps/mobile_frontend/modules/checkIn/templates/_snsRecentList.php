<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php op_include_list('snsRecentCheckInList', $_list, array('title'=>__('recent %checkin% of all'))); ?>
