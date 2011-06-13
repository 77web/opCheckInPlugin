<?php slot('checkInBox'); ?>
<?php echo __('%checkin% date'); ?>:<br />
<?php echo op_format_date($checkIn->getCreatedAt(), 'XDateTimeJa'); ?><br />
<?php echo __('%checkin% spot'); ?>:<br />
<?php echo link_to($checkIn->getCheckInSpot()->getName(), '@checkin_spot?id='.$checkIn->getCheckInSpotId()); ?><br /><br />
<?php echo op_decoration(nl2br($checkIn->getBody())); ?><br />

<?php if($checkIn->getMemberId()==$sf_user->getMemberId()): ?>
[<?php echo link_to(__('Edit'), '@checkin_edit?id='.$checkIn->getId()); ?>]&nbsp;[<?php echo link_to(__('Delete'), '@checkin_delete?id='.$checkIn->getId()); ?>]
<?php endif; ?>

<?php end_slot(); ?>


<?php op_include_box('checkInDetailBox', get_slot('checkInBox'), array('title' => __('%member%\'s %checkin%', array('%member%'=>$checkIn->getMember()->getName())))); ?>

<?php slot('commentList'); ?>
<?php if($commentPager->getNbResults() > 0): ?>
  <?php op_include_pager_total($commentPager, '@checkin_show?id='.$checkIn->getId().'&page=%s'); ?>
  <?php foreach($commentPager->getResults() as $comment): ?>
    <?php include_partial('checkInComment/listItem', array('comment'=>$comment, 'checkIn'=>$checkIn)); ?>
  <?php endforeach; ?>
  <?php op_include_pager_total($commentPager, '@checkin_show?id='.$checkIn->getId().'&page=%s'); ?>
<?php else: ?>
  <?php echo __('No comment.'); ?>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('checkInCommentList', get_slot('commentList'), array('title'=>__('Comments on %checkin%'))); ?>


<?php
if($sf_user->isSNSMember())
{
  $options = array();
  $options['title']= __('Write a comment');
  $options['url'] = url_for('@checkin_comment?id='.$checkIn->getId());
  op_include_form('checkInCommentForm', $form, $options);
}