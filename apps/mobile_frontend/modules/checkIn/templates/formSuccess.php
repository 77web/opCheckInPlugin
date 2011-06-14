<?php echo __('Where to %checkin%', array(), 'form_checkin'); ?>:<br />
<?php echo $form->getObject()->getCheckInSpot()->getName(); ?><br /><br />

<?php

$options = array();
$options['title'] = __($form->isNew() ? 'New %checkin%' : 'Edit %checkin%');
$options['url'] = url_for($form->isNew() ? '@checkin_create?id='.$spot->getId() : '@checkin_edit?id='.$checkIn->getId());

op_include_form('checkInForm', $form, $options);