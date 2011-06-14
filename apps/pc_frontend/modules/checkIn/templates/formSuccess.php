<?php slot('firstRow'); ?>
  <tr>
    <th><?php echo __('Where to %checkin%', array(), 'form_checkin'); ?></th>
    <td><?php echo $form->getObject()->getCheckInSpot()->getName(); ?></td>
  </tr>
<?php end_slot(); ?>

<?php

$options = array();
$options['title'] = __($form->isNew() ? 'New %checkin%' : 'Edit %checkin%');
$options['firstRow'] = get_slot('firstRow');
$options['url'] = url_for($form->isNew() ? '@checkin_create?id='.$spot->getId() : '@checkin_edit?id='.$checkIn->getId());

op_include_form('checkInForm', $form, $options);