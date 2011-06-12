<?php

abstact class opCheckInPluginCheckInSpotActions extends sfActions
{
  public function preExecute()
  {
    if($this->getRoute() instanceOf sfDoctrineRoute)
    {
      $this->spot = $this->getRoute()->getObject();
    }
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->pager = Doctrine::getTable('CheckIn')->getSpotPager($this->spot->getId(), $this->size, $this->page);
  }
}