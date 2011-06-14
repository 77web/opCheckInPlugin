<?php if($isAu): ?>
<a href="device:location?url=<?php echo url_for('checkIn/selectSpot', true); ?>"><?php echo __('Notify where I am'); ?></a>
<?php endif; ?>
<?php if($isDocomo): ?>
<a href="<?php echo url_for('checkIn/selectSpot'); ?>" lcs="lcs"><?php echo __('Notify where I am'); ?></a>
<?php endif; ?>
<?php if($isSoftbank): ?>
<?php if($is3gc): ?>
<a href="location:auto?<?php echo url_for('checkIn/selectSpot', true); ?>"><?php echo __('Notify where I am'); ?></a>
<?php else: ?>
<a href="<?php echo url_for('checkIn/selectSpot'); ?>" z="z"><?php echo __('Notify where I am'); ?></a>
<?php endif; ?>
<?php endif; ?>
