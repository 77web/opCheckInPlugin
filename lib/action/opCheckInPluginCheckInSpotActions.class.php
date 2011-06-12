<?php
abstract class opCheckInPluginCheckInSpotActions extends sfActions
{
  public function preExecute()
  {
    if($this->getRoute() instanceOf sfDoctrineRoute)
    {
      $this->spot = $this->getRoute()->getObject();
    }
    $this->size = !isset($this->size) ? sfConfig::get('op_checkin_plugin_pager_limit', 20) : $this->size;
    $this->page = $this->getRequest()->getParameter('page', 1);
    if($this->page < 1) $this->page = 1;
  }
  public function executeShow(sfWebRequest $request)
  {
    $flag = $this->getUser()->isSNSMember() ? CheckInTable::PUBLIC_FLAG_SNS : CheckInTable::PUBLIC_FLAG_OPEN;
    $this->pager = Doctrine::getTable('CheckIn')->getSpotPager($this->spot->getId(), $this->size, $this->page);
  }
}