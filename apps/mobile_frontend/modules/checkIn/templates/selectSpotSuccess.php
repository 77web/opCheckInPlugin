<?php slot('map'); ?>
<?php include_partial('checkIn/map', array('lat'=>$lat, 'lng'=>$lng)); ?>
<?php end_slot(); ?>

<?php op_include_box('checkInMapBox', get_slot('map'), array('title'=>__('You are here.'))); ?>



<?php if($pager->getNbResults()>0): ?>
  <?php $list = array(); ?>
  <?php foreach($pager->getResults() as $spot): ?>
    <?php $list[] = link_to($spot->getName(), '@checkin_create?id='.$spot->getId()); ?>
  <?php endforeach; ?>
  <?php op_include_list('checkInSpotSelect', $list, array('title'=>__('Where to %checkin% ?'), 'body'=>__('Please select a spot to %checkin%.'))); ?>
<?php else: ?>
  <?php op_include_box('checkInSpotSelect', __('No %checkin% spot around you.'), array('title'=>__('Where to %checkin% ?'))); ?>
<?php endif; ?>


