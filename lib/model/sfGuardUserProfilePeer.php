<?php

/**
 * Subclass for performing query and update operations on the 'ct_user' table.
 *
 * 
 *
 * @package lib.model
 */ 
class sfGuardUserProfilePeer extends BasesfGuardUserProfilePeer
{
  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    $c->add(self::UUID, $value);
    return self::doSelectOne($c);
  }
  
  // TODO: this is a temporary stopgap, doSelectOne must be doSelect for multiple people with the same name
  public static function retrieveByFullName($value)
  {
    $c = new Criteria();
    
    $c->add(self::FIRST_NAME, 'UPPER(CONCAT('.self::FIRST_NAME.', " ", '.self::LAST_NAME.'))=UPPER("'.$value.'")', Criteria::CUSTOM);
    
    return self::doSelectOne($c);
  }
  
  public static function getUserNicknamesLike($text, $max)
  {
    $users = array();

    $con = Propel::getConnection();
    $query = '
      SELECT DISTINCT %s AS sf_guard_user_profile
      FROM %s
      WHERE %s LIKE ?
      ORDER BY %s
    ';
   
    $query = sprintf($query,
      self::FIRST_NAME,
      self::TABLE_NAME,
      self::FIRST_NAME,
      self::FIRST_NAME
    );
    
    //sfLogger::getInstance()->logMessage('query: '.$query);
    sfContext::getInstance()->getLogger()->info($query);
   
    $stmt = $con->prepareStatement($query);
    $stmt->setString(1, $text.'%');
    $stmt->setLimit($max);
    $rs = $stmt->executeQuery();
    while ($rs->next())
    {
      $users[] = $rs->getString('sf_guard_user_profile');
    }
   
    return $users;
  }
  
  public static function retrievePager($c = null, $page = 1, $max = 10)
  {
    if ($c == null)
    {
      $c = new Criteria();
    }

    $c->addDescendingOrderByColumn(self::LAST_NAME);
    $c->setIgnoreCase( true );
    $pager = new sfPropelPager('sfGuardUserProfile', $max);
    $pager->setCriteria($c);
    $pager->setPeerMethod('doSelectJoinSfGuardUser');
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function retrieveByUsername($value)
  {
    $user = sfGuardUserPeer::retrieveByUsername($value);
    
    if ($user != null)
    {
      return $user->getProfile();
    }
    
    return null;
  }
  
  public static function retrieveByEmail($email)
  {
    $contact = ContactInfoPeer::retrieveByEmail( $email );
 
    if ($contact != null)
    {
      return $contact->getsfGuardUser()->getProfile();
    }
    
    return null;
  }
  
  public static function retrieveByUserId($user_id)
  {
    $c = new Criteria();
    $c->add(self::USER_ID, $user_id);
    return self::doSelectOne($c);    
  }
}
