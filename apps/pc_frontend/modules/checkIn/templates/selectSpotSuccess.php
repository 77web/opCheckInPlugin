<?php slot('map'); ?>
<?php echo op_url_cmd('http://maps.google.co.jp/maps?oe=UTF-8&amp;hl=ja&amp;z=16&amp;ll='.$lat.','.$lng); ?>
<?php end_slot(); ?>

<?php op_include_box('checkInMapBox', get_slot('map'), array('title'=>__('You are here.'))); ?>


<?php slot('checkinForm'); ?>
<?php if($pager->getNbResults()>0): ?>
  <p><?php echo __('Please select a spot to %checkin%.'); ?></p>
  <ul>
  <?php foreach($pager->getResults() as $spot): ?>
    <li><?php echo link_to($spot->getName(), '@checkin_create?id='.$spot->getId()); ?></li>
  <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p><?php echo __('No %checkin% spot around you.'); ?></p>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('checkInSpotSelect', get_slot('checkinForm'), array('title'=>__('Where to %checkin% ?'))); ?>