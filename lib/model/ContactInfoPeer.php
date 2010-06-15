<?php

/**
 * Subclass for performing query and update operations on the 'ct_contactinfo' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ContactInfoPeer extends BaseContactInfoPeer
{
  public static function getAllUserContactInfo($value)
  {
    $c = new Criteria();
    $c->add(self::USER_ID, $value);
    return self::doSelect($c);
  }
  
  public static function getUserContactInfo($value, $title = primary)
  {
    $c = new Criteria();
    $c->add(self::USER_ID, $value);
    $c->add(self::TITLE, $title);
    return self::doSelectOne($c);
  }
  
  public static function retrieveByEmail($email)
  {
    $c = new Criteria();
    
    $c->add(ContactInfoPeer::EMAIL, $email);
    
    return ContactInfoPeer::doSelectOne( $c );
  }
}
