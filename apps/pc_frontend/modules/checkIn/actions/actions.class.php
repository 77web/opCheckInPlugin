<?php
/**
 * checkIn actions.
 *
 * @package    opCheckInPlugin
 * @subpackage checkIn
 * @author     Hiromi Hishida<info@77-web.com>
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class checkInActions extends opCheckInPluginCheckInActions
{
  public function executeSelectSpot(sfWebRequest $request)
  {
    if(!$this->isSmartPhone($request))
    {
      return sfView::ERROR;
    }
  }
  
  protected function isSmartPhone($request)
  {
    $userAgent = $request->getHttpHeader('User-Agent');
    return strpos($userAgent, 'iPhone OS')!==FALSE || strpos($userAgent, 'Linux; U; Android')!==FALSE;
  }
}
