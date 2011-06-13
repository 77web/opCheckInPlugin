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
    $this->memberId = $request->getParameter('id', $this->getUser()->getMemberId());
    $this->member = Doctrine::getTable('Member')->find($this->memberId);
    $this->list = Doctrine::getTable('CheckIn')->getMemberRecentList($this->memberId, $max, $this->getUser()->getMemberId());
  }
  
  public function executeFriendRecentList($request)
  {
    $max = ($this->gadget) ? $this->gadget->getConfig('max') : 5;
    $this->list = Doctrine::getTable('CheckIn')->getFriendRecentList($this->getUser()->getMemberId(), $max);
  }
  
  public function executeMyRecentList($request)
  {
    $max = ($this->gadget) ? $this->gadget->getConfig('max') : 5;
    $this->list = Doctrine::getTable('CheckIn')->getMemberRecentList($this->getUser()->getMemberId(), $max, $this->getUser()->getMemberId());
  }
}