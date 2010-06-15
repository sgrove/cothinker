<?php

/**
 * Subclass for performing query and update operations on the 'ct_message' table.
 *
 * 
 *
 * @package lib.model
 */ 
class MessagePeer extends BaseMessagePeer
{
  /**
   * function getUserMailBox()
   * retrieves the *currently authenticated* user's mailbox
   *
   * @author Sean Grove
   **/
  public static function getUserMailBox($folder, $page, $max = 10)
  {
    $user_id = sfContext::getInstance()->getUser()->getProfile()->getUserId();
    $pager = new sfPropelPager('Message', $max);
    $c = new Criteria();
    $c->add(self::RECIPIENT_ID, $user_id);
    $c->add(self::OWNER_ID, $user_id);
    $c->add(self::FOLDER, $folder);
    $c->addDescendingOrderByColumn(MessagePeer::CREATED_AT);
    $pager->setCriteria($c);
    //$pager->setPeerMethod('doSelectJoinAll');
    $pager->setPage($page);
    
    $pager->init();
    return $pager;
  }

  /**
   * function getNbNewMessages
   * retrieves number of new messages in a user's mailbox folder
   *
   * @return int
   * @author Sean Grove
   **/
  
  public static function getNbNewMessages($folder = 'inbox')
  {
    $user_id = sfContext::getInstance()->getUser()->getProfile()->getUserId();
    $c = new Criteria();
    $c->add(self::RECIPIENT_ID, $user_id);
    $c->add(self::OWNER_ID, $user_id);
    $c->add(self::FOLDER, $folder);
    $c->add(self::READ_AT, null);
    
    $messages = MessagePeer::doSelect($c);

    return count($messages);
  }

  /**
   * function getNbNewMessages
   * special function just for the outbox
   *
   * @return sfPager
   * @author Sean Grove
   **/  
  public static function getUserOutBox($page, $max = 10)
  {
    $user_id = sfContext::getInstance()->getUser()->getProfile()->getUserId();
    $pager = new sfPropelPager('Message', $max);
    $c = new Criteria();
    $c->add(MessagePeer::SENDER_ID, $user_id);
    $c->add(MessagePeer::OWNER_ID, $user_id);
    $c->addDescendingOrderByColumn(MessagePeer::CREATED_AT);
    $pager->setCriteria($c);
    $pager->setPage($page);
    
    $pager->init();
    return $pager;
  }

    /**
   * function sendSimpleMessage
   * primary function for sending messages via array
   *
   * @return void
   * @author Sean Grove
   **/
  public static function sendSimpleMessage($messageArray, $options = null)
  	{
  	  // TODO: allow an email copy of the message to be sent out
  	  sfContext::getInstance()->getLogger()->log("message:".print_r($messageArray, true));
  	  sfContext::getInstance()->getLogger()->log("options:".print_r($options, true));

  	  if (!isset($messageArray["message_type"])) { 
  	    $messageArray["message_type"] = 1; 
  	  }
  		sfContext::getInstance()->getLogger()->log('sending Message, owner sender');
  		$message = new Message();
  		$message->setSenderId($messageArray["from"]);
  		sfContext::getInstance()->getLogger()->log('set from: '.$messageArray["from"]);
  		$message->setOwnerId($messageArray["owner"]);
  		$message->setRecipientId($messageArray["to"]);
  		$message->setParentId($messageArray["parent"]);
  		$message->setSubject($messageArray["subject"]);
  		$message->setBody($messageArray["text"]);
  		$message->setHtmlBody('me');
  		$message->setFolder($messageArray["folder"]);
  		$message->setMessageType($messageArray["message_type"]);
  		
  		$message->save();
  		
  		if ($message->getMessageType() == 21)
  		{
  		  EventUserPeer::addUser($message->getUuid(), $options["event_id"], $messageArray["from"], $options["points"], $options["comment"], $options["status"]);
  		}

  		if (isset($options["copyTo"]) && $options["copyTo"] == "sent")
  		{
    		sfContext::getInstance()->getLogger()->log('sending Message, owner recipient');
    		
    		$message2 = array();
    		$message2["from"]    = $messageArray["from"];
    		$message2["owner"]    = $messageArray["from"];
        $message2["to"]      = $messageArray["to"];
        $message2["parent"]  = $messageArray["parent"];
        $message2["subject"] = $messageArray["subject"];
        $message2["text"]    = $messageArray["text"];
        $message2["folder"]    = "sent";
  			
    		self::sendSimpleMessage($message2);
    	}
    	
    	if (!isset($options["notify"]) || $options["notify"] == true) {
    	  $sender = $message->getsfGuardUserRelatedBySenderId()->getProfile();
    	  $recipient = $message->getsfGuardUserRelatedByRecipientId()->getProfile();
    	  
    	  $text = '"'.$message->getSubject().' :: '.$message->getBody().'"';
    	  $notification = 'New message from '.$sender->getFullName().' on Cothink! ';
    	  $notification .= $text;

    	  $recipient->notify($notification);
    	}
    	
  		sfContext::getInstance()->getLogger()->log('message sent');
  	}
 
   /**
   * function retrieveByUuid
   * retrieves specific message by its uuid
   *
   * @return Message
   * @author Sean Grove
   **/ 	
  public static function retrieveByUUID($uuid)
  {
    $c = new Criteria();
    $c->add(self::UUID, $uuid);
    return self::doSelectOne($c);
  }
  
  /**
   * function retrieveParent
   * retrieves parent of message if it exists
   *
   * @return Message
   * @author Sean Grove
   **/ 	
  public static function retrieveParent($id)
  {
    $c = new Criteria();
    $c->add(self::ID, $id);
    $message = self::doSelectOne($c);
    
    if ($message == null)
    {
      return null;
    }
    
    $c = new Criteria();
    $c->add(self::UUID, $message->getParentId());
    return self::doSelectOne( $c );
  }
  
  public static function retrieveThread($id)
  {
    $messages = array();
    
    $message = MessagePeer::retrieveByPK($id);

    while ($message != null)
    {
      $messages[] = $message;
      
      $message = MessagePeer::retrieveByUUID($message->getParentId());
    }
    
    return array_reverse($messages);
  }
  
}
