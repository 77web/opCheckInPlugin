function postLocation()
{
  if(typeof(navigator.geolocation)!='undefined')
  {
    navigator.geolocation.getCurrentPosition(postForm);
  }
  else
  {
    alert('Geolocation is not available');
  }
}

function postForm(position)
{
window.position = position;
  jQuery('#lat').val(position.coords.latitude);
  jQuery('#lng').val(position.coords.longitude);
  
  jQuery('#latLngForm').submit();
}