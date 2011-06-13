<?php

abstract class opCheckInPluginCheckInActions extends sfActions
{
  public function preExecute()
  {
    if($this->getRoute() instanceOf sfDoctrineRoute)
    {
      $object =  $this->getRoute()->getObject();
      if($object instanceOf CheckInSpot)
      {
        $this->spot = $object;
      }
      else
      {
        $this->checkIn = $object;
      }
    }
    $this->size = !isset($this->size) ? sfConfig::get('op_checkin_plugin_pager_limit', 20) : $this->size;
    $this->page = $this->getRequest()->getParameter('page', 1);
    if($this->page < 1) $this->page = 1;
  }
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('checkIn', 'list');
  }
  
  public function executeList(sfWebRequest $request)
  {
    $this->memberId = $request->getParameter('member_id', $this->getUser()->getMemberId());
    
    $this->member = $this->memberId ? Doctrine::getTable('Member')->find($this->memberId) : null;
    $this->forward404Unless($this->member);
    
    
    $this->pager = Doctrine::getTable('CheckIn')->getMemberPager($this->memberId, $this->size, $this->page, $this->getUser()->getMemberId());
  }
  
  public function executeShow(sfWebRequest $request)
  {
    if(!$this->checkIn->isOpen() && !$this->getUser()->isSNSMember())
    {
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));
    }
    $this->forward404Unless($this->checkIn->isVisible($this->getUser()->getMemberId()));
    
    $this->form = new CheckInCommentForm();
    $this->commentPager = Doctrine::getTable('CheckInComment')->getCheckInPager($this->checkIn->getId(), $this->size, $this->page);
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404If($this->getUser()->getMemberId() != $this->checkIn->getMemberId());
    
    if($request->isMethod(sfRequest::POST))
    {
      $request->checkCSRFProtection();
      
      $this->checkIn->delete();
      $this->getUser()->setFlash('notice', 'Deleted successfully.');
      $this->redirect('@my_checkin_list');
      return;
    }
    
    $this->form = new BaseForm();
    
    return sfView::INPUT;
  }
  
  public function executeSelectSpot(sfWebRequest $request)
  {
    if(!isset($this->lat)) $this->lat = $request->getParameter('lat');
    if(!isset($this->lng)) $this->lng = $request->getParameter('lng');
    if(!$this->lat || !$this->lng)
    {
      return sfView::INPUT;
    }
    
    $this->getUser()->setAttribute('my_position', array('latitude'=>$this->lat, 'longitude'=>$this->lng));
    $this->pager = Doctrine::getTable('CheckInSpot')->getNearBySpotPager($this->lat, $this->lng, $this->size, $this->page);
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $position = $this->getUser()->getAttribute('my_position', array());
    $this->forward404If(empty($position));
  
    $this->form = new CheckInForm();
    $this->form->getObject()->setCheckInSpot($this->spot);
    $this->form->getObject()->setMember($this->getUser()->getMember());
    $this->form->getObject()->setLatitude($position['latitude']);
    $this->form->getObject()->setLongitude($position['longitude']);

    
    if($request->isMethod(sfRequest::POST))
    {
      $this->processForm();
    }
    
    $this->setTemplate('form');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->checkIn->getMemberId() == $this->getUser()->getMemberId());
    $this->form = new CheckInForm($this->checkIn);
    
    if($request->isMethod(sfRequest::POST))
    {
      $this->processForm();
    }
    
    $this->setTemplate('form');
  }
  
  protected function processForm()
  {
    $this->form->bind($this->getRequest()->getParameter($this->form->getName()));
    if($this->form->isValid())
    {
      $this->form->save();
      
      $this->getUser()->setAttribute('my_position', null);
      $this->redirect('@my_checkin_list');
    }
  }
}