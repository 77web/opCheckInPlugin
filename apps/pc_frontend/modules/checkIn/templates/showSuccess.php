<?php slot('checkInBox'); ?>
<table>
  <tr>
    <th><?php echo __('%checkin% date'); ?></th>
    <td><?php echo op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa'); ?></td>
  </tr>
  <tr>
    <th><?php echo __('%checkin% spot'); ?></th>
    <td>
      <?php echo link_to($checkIn->getCheckInSpot()->getName(), '@checkin_spot?id='.$checkIn->getCheckInSpotId()); ?>
    </td>
  </tr>
</table>

<?php echo op_decoration(nl2br($checkIn->getBody())); ?>

<?php end_slot(); ?>


<?php op_include_box('checkInDetailBox', get_slot('checkInBox'), array('title' => __('%member%\'s %checkin%', array('%member%'=>$checkIn->getMember()->getName())))); ?>