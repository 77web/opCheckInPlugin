<?php

abstract class opCheckInPluginCheckInCommentActions extends sfActions
{
  public function preExecute()
  {
    if($this->getRoute() instanceOf sfDoctrineRoute)
    {
      $object = $this->getRoute()->getObject();
      if($object instanceOf CheckIn)
      {
        $this->checkIn = $object;
      }
      elseif($object instanceOf CheckInComment)
      {
        $this->comment = $object;
      }
    }
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new CheckInCommentForm();
    $this->form->getObject()->setCheckIn($this->checkIn);
    $this->form->getObject()->setMemberId($this->getUser()->getMemberId());
    
    if($request->isMethod(sfRequest::POST))
    {
      $this->form->bind($this->getRequest()->getParameter($this->form->getName()));
      if($this->form->isValid())
      {
        $this->form->save();
        $this->redirect('@checkin_show?id='.$this->checkIn->getId());
      }
    }
    
    $this->setTemplate('../../checkIn/show');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $this->checkIn = $this->comment->getCheckIn();
    $this->forward404If($this->getUser()->getMemberId() != $this->comment->getMemberId() && $this->getUser()->getMemberId() != $this->checkIn->getMemberId());
    
    if($request->isMethod(sfRequest::POST))
    {
      $request->checkCSRFProtection();
      
      $this->comment->delete();
      $this->getUser()->setFlash('notice', 'Deleted successfully.');
      $this->redirect('@checkin_show?id='.$this->checkIn->getId());
      return;
    }
    
    $this->form = new BaseForm();
    
    return sfView::INPUT;
  }
}