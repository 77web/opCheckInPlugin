<?php

/**
 * PluginCheckIn form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginCheckInForm extends BaseCheckInForm
{
  public function setup()
  {
    parent::setup();
    
    $this->useFields(array('body', 'public_flag'));
    
    $flags = $this->getObject()->getTable()->getPublicFlags();
    $this->setWidget('public_flag', new sfWidgetFormChoice(array('choices'=>$flags)));
    $this->setValidator('public_flag', new sfValidatorChoice(array('choices'=>array_keys($flags))));
    
    $this->getWidgetSchema()->getFormFormatter()->setTranslationCatalogue('form_checkin');
  }
}
