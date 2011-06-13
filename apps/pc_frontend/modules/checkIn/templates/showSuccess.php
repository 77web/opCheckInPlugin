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
<div class="body">
<p class="text">
<?php echo op_decoration(nl2br($checkIn->getBody())); ?>
</p>
</div>

<?php if($checkIn->getMemberId()==$sf_user->getMemberId()): ?>
  <div class="operation">
    <ul class="moreInfo button">
      <li><?php echo button_to(__('Edit'), '@checkin_edit?id='.$checkIn->getId(), 'class=input_submit'); ?></li>
      <li><?php echo button_to(__('Delete'), '@checkin_delete?id='.$checkIn->getId(), 'class=input_submit'); ?></li>
    </ul>
  </div>
<?php endif; ?>

<?php end_slot(); ?>


<?php op_include_box('checkInDetailBox', get_slot('checkInBox'), array('title' => __('%member%\'s %checkin%', array('%member%'=>$checkIn->getMember()->getName())))); ?>

<?php slot('commentList'); ?>
<?php if($commentPager->getNbResults() > 0): ?>
  <?php op_include_pager_navigation($commentPager, '@checkin_show?id='.$checkIn->getId().'&page=%s'); ?>
  <?php foreach($commentPager->getResults() as $comment): ?>
    <?php include_partial('checkInComment/listItem', array('comment'=>$comment, 'checkIn'=>$checkIn)); ?>
  <?php endforeach; ?>
  <?php op_include_pager_navigation($commentPager, '@checkin_show?id='.$checkIn->getId().'&page=%s'); ?>
<?php else: ?>
  <p><?php echo __('No comment.'); ?></p>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('checkInCommentList', get_slot('commentList'), array('title'=>__('Comments on %checkin%'))); ?>


<?php
if($sf_user->isSNSMember())
{
  $options = array();
  $options['title']= __('Write a comment');
  $ptions['url'] = url_for('@checkin_comment?id='.$checkIn->getId());
  op_include_form('checkInCommentForm', $form, $options);
}