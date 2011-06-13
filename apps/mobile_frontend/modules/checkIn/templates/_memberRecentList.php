<?php $_list = array(); ?>
<?php foreach($list as $checkIn): ?>
  <?php $_list[] = get_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>

<?php op_include_list('memberRecentCheckInList', $_list, array('title'=>__('%name%\'s recent %checkin%', array('%name%'=>$member->getName())); ?>

