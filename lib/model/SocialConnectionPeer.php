<?php

/**
 * Subclass for performing query and update operations on the 'ct_social_connection' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SocialConnectionPeer extends BaseSocialConnectionPeer
{
  public static function retrieveByUserId($user_id, $status = null)
  {
    $c = new Criteria();
    
    $crit0 = $c->getNewCriterion(self::USER1_ID, $user_id);
    $crit1 = $c->getNewCriterion(self::USER2_ID, $user_id);
    
    $crit0->addOr($crit1);
    
    $c->add($crit0);
    
    if ($status != null)
    {
      $c->add(self::STATUS, $status);
    }
    
    return self::doSelect($c);
  }

  public static function retrieveByUuid($value)
  {
    $c = new Criteria();
    
    $c->add(self::UUID, $value);

    return self::doSelectOne($c);
  }

  public static function retrieveByUsers($user1_id, $user2_id, $status = null)
  {
    /*
    $c = new Criteria();
    $crit0 = $c->getNewCriterion(self::USER1_ID, $user1_id);
    $crit1 = $c->getNewCriterion(self::USER2_ID, $user2_id);
    
    // Perform OR at level 1 ($crit0 $crit1 )
    $crit0->addOr($crit1);
    $crit2 = $c->getNewCriterion(self::USER2_ID, $user1_id);
    $crit3 = $c->getNewCriterion(self::USER2_ID, $user2_id);
    
    // Perform OR at level 1 ($crit2 $crit3 )
    $crit2->addOr($crit3);
    
    // Perform AND at level 0 ($crit0 $crit2 )
    $crit0->addAnd($crit2);
    
    // Remember to change the peer class here for the correct one in your model
    $c->add($crit0);
    
    if (!$status == null)
    {
      $c->add(self::STATUS, $status);
    }
    
    return self::doSelectOne($c);
    */
    
    $c = new Criteria();
    $crit0 = $c->getNewCriterion(self::USER1_ID, $user1_id);
    $crit1 = $c->getNewCriterion(self::USER2_ID, $user2_id);
    
    // Perform AND at level 1 ($crit0 $crit1 )
    $crit0->addAnd($crit1);
    $crit2 = $c->getNewCriterion(self::USER1_ID, $user2_id);
    $crit3 = $c->getNewCriterion(self::USER2_ID, $user1_id);
    
    // Perform AND at level 1 ($crit2 $crit3 )
    $crit2->addAnd($crit3);
    
    // Perform OR at level 0 ($crit0 $crit2 )
    $crit0->addOr($crit2);
    
    // Remember to change the peer class here for the correct one in your model
    $c->add($crit0);
    
    if (!$status == null)
    {
      $c->add(self::STATUS, $status);
    }
    
    return self::doSelectOne($c);
  }
  
  public static function retrievePendingByUserId($user_id)
  {
    $c = new Criteria();
    
    $c->add(self::USER1_ID, $user_id);
    $c->add(self::STATUS, sfConfig::get('app_socon_status_pending'));
    
    return self::doSelect($c);
  }
  
  public static function retrieveApprovableByUserId($user_id)
  {
    $c = new Criteria();
    
    $c->add(self::USER2_ID, $user_id);
    $c->add(self::STATUS, sfConfig::get('app_socon_status_pending'));
    
    return self::doSelect($c);
  }

}
