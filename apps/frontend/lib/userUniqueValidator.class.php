<?php 

class userUniqueValidator extends sfValidator
{
  public function execute (&$value, &$error)
  {
    sfPropelApprovableBehavior::disable();

    if (sfGuardUserPeer::retrieveByUsername($value) != null)
    {
      $error = $this->getParameter('user_unique_error', "*This email is already registered with us. Did you need to <strong>reset your password</strong>?");
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
 