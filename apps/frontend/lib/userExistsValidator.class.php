<?php 

class userExistsValidator extends sfValidator
{
  public function execute (&$value, &$error)
  {
    sfPropelApprovableBehavior::disable();
    if (sfGuardUserPeer::retrieveByUsername($value) == false)
    {
      $error = $this->getParameter('user_error');
      $error = "Sorry, couldn't find $value in our records - probably means no one signed up using this name.";
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
 