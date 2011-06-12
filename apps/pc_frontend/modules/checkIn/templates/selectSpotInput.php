<form action="<?php echo url_for('checkIn/selectSpot'); ?>" method="get" id="latLngForm">
  <input type="hidden" name="lat" id="lat" value="" />
  <input type="hidden" name="lng" id="lng" value="" />
</form>

<input type="button" onclick="postLocation();" value="<?php echo __('Notify where I am'); ?>" />