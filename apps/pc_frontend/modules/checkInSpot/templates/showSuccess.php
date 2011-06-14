<?php slot('spotDetail'); ?>
<table>
  <tr>
    <th><?php echo __('Name', array(), 'form_checkInSpot'); ?></th>
    <td>
      <?php echo $spot->getName(); ?>
    </td>
  </tr>
  <tr>
    <th><?php echo __('Address', array(), 'form_checkInSpot'); ?></th>
    <td>
      <?php echo $spot->getAddress(); ?>
    </td>
  </tr>
  <?php if($spot->getUrl()): ?>
    <tr>
      <th><?php echo __('Url', array(), 'form_checkInSpot'); ?></th>
      <td>
        <a href="<?php echo $spot->getUrl(); ?>" target="_blank"><?php echo $spot->getUrl(); ?></a>
      </td>
    </tr>
  <?php endif; ?>
</table>
<?php end_slot(); ?>

<?php op_include_box('spotDetailBox', get_slot('spotDetail'), array('title'=>__('Detail of spot'))); ?>

<?php slot('checkInList'); ?>
<?php if($pager->getNbResults() > 0): ?>
  <?php op_include_pager_navigation($pager, '@checkin_spot?id='.$spot->getId().'&page=%s'); ?>
  <div class="searchResultList">
  <?php foreach($pager->getResults() as $checkIn): ?>
    <?php include_partial('checkIn/listItem', array('checkIn'=>$checkIn)); ?>
  <?php endforeach; ?>
  </div>
  <?php op_include_pager_navigation($pager, '@checkin_spot?id='.$spot->getId().'&page=%s'); ?>
<?php else: ?>
  <p><?php echo __('No %checkin% yet.'); ?></p>
<?php endif; ?>
<?php end_slot(); ?>

<?php op_include_box('spotCheckInList', get_slot('checkInList'), array('title'=>__('list of %checkin% to %spot_name%', array('%spot_name%'=>$spot->getName())))); ?>