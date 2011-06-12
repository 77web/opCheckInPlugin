<?php

abstract class opCheckInPluginCheckInComponents extends sfComponents
{
  public function executeSnsRecentList($request)
  {
    $max = ($this->gadget) ? $this->gadget->getConfig('max') : 5;
    $this->list = Doctrine::getTable('CheckIn')->getSnsRecentList($max, $this->getUser()->getMemberId());
  }
  
  public function executeMemberRecentList($request)
  {
    $max = ($this->gadget) ? $this->gadget->getConfig('max') : 5;
    $this->list = Doctrine::getTable('CheckIn')->getMemberRecentList($this->member->getId(), $max, $this->getUser()->getMemberId());
  }
  
  public function executeFriendRecentList($request)
  {
    $max = ($this->gadget) ? $this->gadget->getConfig('max') : 5;
    $this->list = Doctrine::getTable('CheckIn')->getFriendRecentList($this->getUser()->getMemberId(), $max);
  }
}