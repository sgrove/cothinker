<?php 

class userFullNameValidator extends sfValidator
{
  public function execute (&$value, &$error)
  {
    if (sfGuardUserProfilePeer::retrieveByFullName($value) == null)
    {
      $error = $this->getParameter('user_error');
      $error = "*Sorry, we can't seem to find this user. Maybe you meant someone else?";
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
 