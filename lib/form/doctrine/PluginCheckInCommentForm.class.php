<?php

/**
 * PluginCheckInComment form.
 *
 * @package    opCheckInPlugin
 * @subpackage form
 * @author     Hiromi Hishida<info@77-web.com>
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginCheckInCommentForm extends BaseCheckInCommentForm
{
  public function setup()
  {
    parent::setup();
    $this->useFields(array('body'));
  }

}
