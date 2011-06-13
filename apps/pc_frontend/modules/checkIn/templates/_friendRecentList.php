<?php slot('list'); ?>
<ul>
<?php foreach($list as $checkIn): ?>
  <?php include_partial('checkIn/simpleListItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>
</ul>
<?php end_slot(); ?>

<?php op_include_box('friendRecentCheckInList_'.(isset($gadget) ? $gadget->getId() : ''), get_slot('list'), array('title'=>__('Recent %checkin% of %friend%'))); ?>