<?php
// auto-generated by sfPropelCrud
// date: 2008/04/04 15:24:10
?>
<?php

/**
 * user actions.
 *
 * @package    cothink
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class projectComponents extends sfComponents
{
  public function executeListFilter()
  {
    $this->campuses = CampusPeer::retrieveAlphabetical();
    $this->departments = DepartmentPeer::retrieveAlphabetical();
  }
}