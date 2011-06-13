function postLocation()
{
  if(is_smartphone() && typeof(navigator.geolocation)!='undefined')
  {
    navigator.geolocation.getCurrentPosition(postForm);
  }
}

function postForm(position)
{
  jQuery('#lat').val(position.coords.latitude);
  jQuery('#lng').val(position.coords.longitude);
  
  jQuery('#latLngForm').submit();
}

function is_smartphone()
{
  var agent = navigator.userAgent;
  return agent.indexOf('Android') != -1 || agent.indexOf('iPhone; U') != -1 || agent.indexOf('iPad; U') != -1;
}