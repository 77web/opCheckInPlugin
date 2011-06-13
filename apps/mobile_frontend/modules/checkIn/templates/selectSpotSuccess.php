<?php if($pager->getNbResults()>0): ?>
  <?php $list = array(); ?>
  <?php foreach($pager->getResults() as $spot): ?>
    <?php $list[] = link_to($spot->getName(), '@checkin_create?id='.$spot->getId()); ?>
  <?php endforeach; ?>
  <?php op_include_list('checkInSpotSelect', $list, array('title'=>__('Where to %checkin% ?'), 'body'=>__('Please select where you are.'))); ?>
<?php else: ?>
  <?php op_include_box('checkInSpotSelect', __('No spot around you.'), array('title'=>__('Where to %checkin% ?'))); ?>
<?php endif; ?>


