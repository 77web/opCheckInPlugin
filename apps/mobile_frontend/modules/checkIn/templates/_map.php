<?php
$center = $lat.','.$lng;
if(!isset($size)) $size = "240x320";
if(!isset($zoom)) $zoom = 16;

$markers = $center;
?>
<?php echo image_tag('http://maps.google.com/maps/api/staticmap?mobile=true&sensor=false&center='.$center.'&size='.$size.'&markers='.$markers.'&zoom='.$zoom); ?><br />
