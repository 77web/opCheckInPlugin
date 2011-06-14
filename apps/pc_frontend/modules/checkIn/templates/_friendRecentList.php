<?php slot('list'); ?>
<ul class="articleList">
<?php foreach($list as $checkIn): ?>
  <?php include_partial('checkIn/simpleListItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>
</ul>

<?php if (count($list)): ?>
<div class="moreInfo">
<ul class="moreInfo">
<li><?php echo link_to(__('More'), 'friend_checkin_list') ?></li>
</ul>
</div>
<?php endif; ?>

<?php end_slot(); ?>

<?php op_include_box('friendRecentCheckInList_'.(isset($gadget) ? $gadget->getId() : ''), get_slot('list'), array('title'=>__('Recent %checkin% of %my_friend%'), 'class'=>'homeRecentList')); ?>