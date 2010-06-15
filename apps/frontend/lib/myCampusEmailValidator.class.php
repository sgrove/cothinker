<?php 

class myCampusEmailValidator extends sfValidator
{
  public function execute (&$value, &$error)
  {
    if (false) //Campus check disabled: CampusPeer::retrieveByEmail($value) == false)
    {
      $error = $this->getParameter('campus_error');
      $error = "*Sorry, your campus is not currently registered on our site.";
      return false;
    }
    
    return true;
  }
 
  public function initialize ($context, $parameters = null)
  {
    parent::initialize($context);
    
    return true;
  }
}
 