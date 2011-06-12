<?php slot('checkinForm'); ?>
<?php if($pager->getNbResults()>0): ?>
  <p><?php echo __('Please select where you are.'); ?></p>
  <ul>
  <?php foreach($pager->getResults() as $spot): ?>
    <li><?php echo link_to($spot->getName(), '@checkin_create?id='.$spot->getId()); ?></li>
  <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p><?php echo __('No spot around you.'); ?></p>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('checkInSpotSelect', get_slot('checkinForm'), array('title'=>__('Where to %checkin% ?'))); ?>