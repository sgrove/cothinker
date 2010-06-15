<?php

/**
 * Subclass for representing a row from the 'ct_message' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Message extends BaseMessage
{
  public function __toString()
  {
    return $this->getSubject();
  }
  
  public function isOwner()
  {
    if ($this->getOwnerId() == sfContext::getInstance()->getUser()->getProfile()->getUserId())
    {
      return true;
    }
    return false;
  }

  public function isMyMessage()
  {
    if ($this->isSender() ||
    $this->isRecipient())
    {
      return true;
    }
    return false;
  }
 
    
    public function isSender()
    {
      if ($this->getSenderId() == sfContext::getInstance()->getUser()->getId())
      {
        return true;
      }
      return false;
    }
    
    public function isRecipient()
    {
      if ($this->getRecipientId() == sfContext::getInstance()->getUser()->getId())
      {
        return true;
      }
      return false;
    }
    
    public function makeSimpleCopy($owner_id, $folder = 'sent')
    {
      $message = new Message();
  		
      $message->setSenderId($this->getSenderId());
  		$message->setOwnerId($owner_id);
  		$message->setRecipientId($this->getRecipientId());
  		$message->setParentId($this->getParentId());
  		$message->setSubject($this->getSubject());
  		$message->setBody($this->getBody());
  		$message->setHtmlBody($this->getBody());
  		$message->setFolder($folder);
  		
  		$message->save();
    }

  /**
   * function getAbbrSubject
   * gets an abbreviate subject of $length characters
   *
   * @return string
   * @author Sean Grove
   **/
  public function getAbbrSubject($length = 200)
  {
    if (strlen($this->getSubject()) > ($length + 3))
    {
      return ucwords(substr($this->getSubject(), 0, $length))."...";
    }
    return ucwords($this->getSubject());
  }
  
  public function formatMessageReply($lineLength = 80)
  {
    return "\n\n\n---------------- Original Message ------------- \n\n".$this->getBody();
  }
  
    /**
   * function getFormattedBodyo
   * retrieves markedup version of message. Currently only uses nl2br
   *
   * @return string
   * @author Sean Grove
   **/
  public function getFormattedBody()
  {
    return nl2br($this->getBody());
  }

  /**
   * function generateReplyMessage
   * makes a reply message for this message object
   *
   * @return Message
   * @author Sean Grove
   **/  
  public function generateReplyMessage()
  {
    $message = new Message();
    
    $message->setRecipientId($this->getSenderId());
    $message->setSenderId(sfContext::getInstance()->getUser()->getProfile()->getUserId());
    $message->setParentId($this->getUuid());
    $message->setSubject('re: '.$this->getSubject());
    $message->setBody($this->formatMessageReply());
    
    sfContext::getInstance()->getLogger()->info('Set Msg parent id to :['.$message->getParentId().'], should be ['.$this->getUuid().']');
    
    if ($message->getRecipientId() == sfContext::getInstance()->getUser()->getProfile()->getUserId())
    {
      $message->setRecipientId($this->getRecipientId());
    }
    
    return $message;
  }
  
  public function isNew()
  {
    if ($this->getReadAt() == null)
    {
      return true;
    }
    
    return false;
  }
  
  public function getParent()
  {
    return MessagePeer::retrieveParent($this->getId());
  }
  
  public function getThread()
  {
    return MessagePeer::retrieveThread($this->getId());
  }
}
sfPropelBehavior::add('Message', array('sfPropelUuidBehavior'));