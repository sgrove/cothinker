<?php 

class twitterAccountValidator extends sfValidator
{  
    public function initialize($context, $parameters = null)
    {
      // initialize parent
      parent::initialize($context);

      // set defaults
      $this->getParameterHolder()->set('twitter_error', 'Twitter username or password is not valid.');
      $this->getParameterHolder()->set('password_field', 'twitter_password');
      $this->getParameterHolder()->set('update_field', 'twitter_update');

      $this->getParameterHolder()->add($parameters);

      return true;
    }

    public function execute(&$value, &$error)
    {
      $password_field = $this->getParameterHolder()->get('password_field');
      $password = $this->getContext()->getRequest()->getParameter($password_field);

      $update = false;
      $update_field = $this->getParameterHolder()->get('update_field');
      $update = $this->getContext()->getRequest()->getParameter($update_field);

      $username = $value;
      
      // It's a valid account if the password is set to the standard null
      if ($password == sfConfig::get('app_profile_null_password')) return true;

      $twitter = new TwitterService($username, $password);

      if ($twitter->simpleVerifyCredentials() == true)
      {
        return true;
      }
      
      $error = $this->getParameterHolder()->get('twitter_error');

      return false;
    }

}
 