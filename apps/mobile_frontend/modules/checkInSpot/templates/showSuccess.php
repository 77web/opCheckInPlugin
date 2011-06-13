<?php slot('spotDetail'); ?>
<?php echo __('Name'); ?>:<br />
<?php echo $spot->getName(); ?><br /><br />

<?php echo __('Address'); ?>:<br />
<?php echo $spot->getAddress(); ?><br /><br />

<?php if($spot->getUrl()): ?>
<?php echo __('Url'); ?>:<br />
<a href="<?php echo $spot->getUrl(); ?>" target="_blank"><?php echo $spot->getUrl(); ?></a>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('spotDetailBox', get_slot('spotDetail'), array('title'=>'Detail of spot')); ?>


<?php if($pager->getNbResults() > 0): ?>
  <?php $list = array(); ?>
  <?php foreach($pager->getResults() as $checkIn): ?>
    <?php $list[] = link_to(op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa').'<br />'.$checkIn->getMember()->getName(), '@checkin_show?id='.$checkIn->getId()); ?>
  <?php endforeach; ?>
  <?php op_include_list('spotCheckInList', $list, array('title'=>'%checkin% at %spot_name%', array('%spot_name%'=>$spot->getName()))); ?>
  <?php op_include_pager_total($pager, '@checkin_spot?id='.$spot->getId().'&page=%s'); ?>
<?php else: ?>
  <?php op_include_box('spotCheckInList', __('No %checkin% yet.'), array('title'=>'%checkin% at %spot_name%', array('%spot_name%'=>$spot->getName()))); ?>
<?php endif; ?>


