<?php slot('checkInBox'); ?>
<?php echo link_to($checkIn->getCheckInSpot()->getName(), '@checkin_spot?id='.$checkIn->getCheckInSpotId()); ?>

<?php echo op_decoration(nl2br($checkIn->getBody())); ?>
<?php end_slot(); ?>


<?php op_include_box('checkInDetailBox', get_slot('checkInBox'), array('title' => __('Detail of %%'))); ?>