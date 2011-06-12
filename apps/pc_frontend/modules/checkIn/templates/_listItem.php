<table>
  <tr>
    <td class="photo" rowspan="3"><?php echo link_to(image_tag_sf_image($checkIn->getMember()->getImageFilename(), array('size'=>'76x76', 'alt'=>$checkIn->getMember()->getName())), '@member_profile?id='.$checkIn->getMemberId()); ?></td>
    <th><?php echo __('%checkin% date'); ?></th>
    <td>
      <?php echo $checkIn->getCreatedAt(); ?>
    </td>
  </tr>
  <tr>
    <th><?php echo __('Member'); ?></th>
    <td><?php echo link_to($checkIn->getMember()->getName(), '@member_profile?id='.$checkIn->getMemberId()); ?></td>
  </tr>
  <tr>
    <th><?php echo __('Body'); ?></th>
    <td>
      <p><?php echo op_truncate($checkIn->getBody(), 30, 3, '...'); ?></p>
      <p class="moreInfo"><?php echo link_to(__('Detail'), '@checkin_show?id='.$checkIn->getId()); ?></p>
    </td>
  </tr>

</table>