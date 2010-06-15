<?php
// auto-generated by sfPropelCrud
// date: 2008/04/04 15:48:34
?>
<?php

/**
 * campus actions.
 *
 * @package    cothink
 * @subpackage campus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class campusActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('campus', 'list');
  }

  public function executeList()
  {
    $this->campuss = CampusPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->campus = CampusPeer::retrieveBySlug($this->getRequestParameter('slug'));
    $this->forward404Unless($this->campus);
  }

  public function executeCreate()
  {
    $this->campus = new Campus();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->campus = CampusPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->campus);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $campus = new Campus();
    }
    else
    {
      $campus = CampusPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($campus);
    }

    $campus->setId($this->getRequestParameter('id'));
    $campus->setUuid($this->getRequestParameter('uuid'));
    $campus->setName($this->getRequestParameter('name'));
    $campus->setAddress($this->getRequestParameter('address'));
    $campus->setCity($this->getRequestParameter('city'));
    $campus->setState($this->getRequestParameter('state'));
    $campus->setZip($this->getRequestParameter('zip'));
    $campus->setUrl($this->getRequestParameter('url'));
    $campus->setPhone($this->getRequestParameter('phone'));
    $campus->setEmail($this->getRequestParameter('email'));
    $campus->setSlug($this->getRequestParameter('slug'));
    $campus->setVersion($this->getRequestParameter('version'));
    if ($this->getRequestParameter('deleted_at'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('deleted_at'), $this->getUser()->getCulture());
      $campus->setDeletedAt("$y-$m-$d");
    }

    $campus->save();

    return $this->redirect('campus/show?id='.$campus->getId());
  }

  public function executeDelete()
  {
    $campus = CampusPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($campus);

    $campus->delete();

    return $this->redirect('campus/list');
  }
}
