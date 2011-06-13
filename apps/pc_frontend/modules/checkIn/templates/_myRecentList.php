<?php slot('list'); ?>
<ul class="articleList">
<?php foreach($list as $checkIn): ?>
  <?php include_partial('checkIn/simpleListItem', array('checkIn'=>$checkIn)); ?>
<?php endforeach; ?>
</ul>
<div class="moreInfo">
<ul class="moreInfo">
<?php if (count($list)): ?>
<li><?php echo link_to(__('More'), 'my_checkin_list') ?></li>
<?php endif; ?>
<li><?php echo link_to(__('New %checkin%'), 'checkin_now') ?></li>
</ul>
</div>
<?php end_slot(); ?>

<?php op_include_box('myRecentCheckInList_'.(isset($gadget) ? $gadget->getId() : ''), get_slot('list'), array('title'=>__('My recent %checkin%'), 'class'=>'homeRecentList')); ?>