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
  public function preExecute()
  {
    parent::preExecute();
    
    $this->size = 10;
  }
  
  public function executeSelectSpot(sfWebRequest $request)
  {
    $this->lat = $request->getParameter('lat');
    $this->lng = $request->getParameter('lng');
    
    $this->isAu = $request->getMobile()->isEzWeb();
    $this->isDocomo = $request->getMobile()->isDoCoMo();
    $this->isSoftbank = $request->getMobile()->isSoftBank();
    $this->is3gc = $this->isSoftbank?$request->getMobile()->isType3GC():false;
    
    if($this->isDocomo || $this->isAu)
    {
      $this->lng = $request->getParameter('lon', $this->lng);
    }
    
    if($this->isSoftbank)
    {
      if($this->is3gc)
      {
        $pos = $request->getParameter("pos");
        if($pos!="" && preg_match("/N([0-9,\.]+)E([0-9,\.]+)/i", $pos, $matches))
        {
          $this->lat = $matches[1];
          $this->lng = $matches[2];
        }
      }
      else
      {
        $geocode = isset($_SERVER['HTTP_X_JPHONE_GEOCODE'])?$_SERVER['HTTP_X_JPHONE_GEOCODE']:'';
        if($geocode!="")
        {
          $cds = explode("%1A", $geocode);
          if(count($cds)==3 && $cds[0]!='0000000' && $cds[1]!='0000000')
          {
            $this->lat = $cds[0];
            $this->lng = $cds[1];
          }
        }
      }
    }
    
    
    if($this->lat!='' && $this->lng!='')
    {
      //「+」がついてたら取る
      $this->lat = ltrim($this->lat, '+');
      $this->lng = ltrim($this->lng, '+');
      //度分秒表記なら変換
      $latchars = count_chars($this->lat, 1);
      if($latchars[ord('.')]>1)
      {
        $this->lat = self::degMinSecToDouble($this->lat);
      }
      $lngchars = count_chars($this->lng, 1);
      if($lngchars[ord('.')]>1)
      {
        $this->lng = self::degMinSecToDouble($this->lng);
      }
      
      return parent::executeSelectSpot($request);
    }
    
    return sfView::INPUT;
  }

  protected static function degMinSecToDouble($degMinSec = '0.0.0.0')
  {
    $degs = explode('.', $degMinSec);
    $value = 0;
    for($i=0;$i<3;$i++)
    {
      $value += $degs[$i] / pow(60, $i);
    }
    return round($value, 10);
  }
}
