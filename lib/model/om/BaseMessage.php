<?php


abstract class BaseMessage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $public_id;


	
	protected $owner_id;


	
	protected $sender_id;


	
	protected $recipient_id;


	
	protected $subject;


	
	protected $body;


	
	protected $html_body;


	
	protected $folder;


	
	protected $read_at;


	
	protected $parent_id;


	
	protected $message_type;


	
	protected $version;


	
	protected $is_hidden;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $asfGuardUserRelatedByOwnerId;

	
	protected $asfGuardUserRelatedBySenderId;

	
	protected $asfGuardUserRelatedByRecipientId;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUuid()
	{

		return $this->uuid;
	}

	
	public function getPublicId()
	{

		return $this->public_id;
	}

	
	public function getOwnerId()
	{

		return $this->owner_id;
	}

	
	public function getSenderId()
	{

		return $this->sender_id;
	}

	
	public function getRecipientId()
	{

		return $this->recipient_id;
	}

	
	public function getSubject()
	{

		return $this->subject;
	}

	
	public function getBody()
	{

		return $this->body;
	}

	
	public function getHtmlBody()
	{

		return $this->html_body;
	}

	
	public function getFolder()
	{

		return $this->folder;
	}

	
	public function getReadAt($format = 'Y-m-d H:i:s')
	{

		if ($this->read_at === null || $this->read_at === '') {
			return null;
		} elseif (!is_int($this->read_at)) {
						$ts = strtotime($this->read_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [read_at] as date/time value: " . var_export($this->read_at, true));
			}
		} else {
			$ts = $this->read_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getParentId()
	{

		return $this->parent_id;
	}

	
	public function getMessageType()
	{

		return $this->message_type;
	}

	
	public function getVersion()
	{

		return $this->version;
	}

	
	public function getIsHidden()
	{

		return $this->is_hidden;
	}

	
	public function getDeletedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->deleted_at === null || $this->deleted_at === '') {
			return null;
		} elseif (!is_int($this->deleted_at)) {
						$ts = strtotime($this->deleted_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deleted_at] as date/time value: " . var_export($this->deleted_at, true));
			}
		} else {
			$ts = $this->deleted_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MessagePeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = MessagePeer::UUID;
		}

	} 
	
	public function setPublicId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->public_id !== $v) {
			$this->public_id = $v;
			$this->modifiedColumns[] = MessagePeer::PUBLIC_ID;
		}

	} 
	
	public function setOwnerId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = MessagePeer::OWNER_ID;
		}

		if ($this->asfGuardUserRelatedByOwnerId !== null && $this->asfGuardUserRelatedByOwnerId->getId() !== $v) {
			$this->asfGuardUserRelatedByOwnerId = null;
		}

	} 
	
	public function setSenderId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sender_id !== $v) {
			$this->sender_id = $v;
			$this->modifiedColumns[] = MessagePeer::SENDER_ID;
		}

		if ($this->asfGuardUserRelatedBySenderId !== null && $this->asfGuardUserRelatedBySenderId->getId() !== $v) {
			$this->asfGuardUserRelatedBySenderId = null;
		}

	} 
	
	public function setRecipientId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->recipient_id !== $v) {
			$this->recipient_id = $v;
			$this->modifiedColumns[] = MessagePeer::RECIPIENT_ID;
		}

		if ($this->asfGuardUserRelatedByRecipientId !== null && $this->asfGuardUserRelatedByRecipientId->getId() !== $v) {
			$this->asfGuardUserRelatedByRecipientId = null;
		}

	} 
	
	public function setSubject($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = MessagePeer::SUBJECT;
		}

	} 
	
	public function setBody($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = MessagePeer::BODY;
		}

	} 
	
	public function setHtmlBody($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->html_body !== $v) {
			$this->html_body = $v;
			$this->modifiedColumns[] = MessagePeer::HTML_BODY;
		}

	} 
	
	public function setFolder($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->folder !== $v) {
			$this->folder = $v;
			$this->modifiedColumns[] = MessagePeer::FOLDER;
		}

	} 
	
	public function setReadAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [read_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->read_at !== $ts) {
			$this->read_at = $ts;
			$this->modifiedColumns[] = MessagePeer::READ_AT;
		}

	} 
	
	public function setParentId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->parent_id !== $v) {
			$this->parent_id = $v;
			$this->modifiedColumns[] = MessagePeer::PARENT_ID;
		}

	} 
	
	public function setMessageType($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->message_type !== $v) {
			$this->message_type = $v;
			$this->modifiedColumns[] = MessagePeer::MESSAGE_TYPE;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = MessagePeer::VERSION;
		}

	} 
	
	public function setIsHidden($v)
	{

		if ($this->is_hidden !== $v) {
			$this->is_hidden = $v;
			$this->modifiedColumns[] = MessagePeer::IS_HIDDEN;
		}

	} 
	
	public function setDeletedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deleted_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deleted_at !== $ts) {
			$this->deleted_at = $ts;
			$this->modifiedColumns[] = MessagePeer::DELETED_AT;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = MessagePeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->public_id = $rs->getString($startcol + 2);

			$this->owner_id = $rs->getInt($startcol + 3);

			$this->sender_id = $rs->getInt($startcol + 4);

			$this->recipient_id = $rs->getInt($startcol + 5);

			$this->subject = $rs->getString($startcol + 6);

			$this->body = $rs->getString($startcol + 7);

			$this->html_body = $rs->getString($startcol + 8);

			$this->folder = $rs->getString($startcol + 9);

			$this->read_at = $rs->getTimestamp($startcol + 10, null);

			$this->parent_id = $rs->getString($startcol + 11);

			$this->message_type = $rs->getInt($startcol + 12);

			$this->version = $rs->getInt($startcol + 13);

			$this->is_hidden = $rs->getBoolean($startcol + 14);

			$this->deleted_at = $rs->getTimestamp($startcol + 15, null);

			$this->created_at = $rs->getTimestamp($startcol + 16, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Message object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseMessage:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MessagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MessagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseMessage:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseMessage:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(MessagePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MessagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseMessage:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->asfGuardUserRelatedByOwnerId !== null) {
				if ($this->asfGuardUserRelatedByOwnerId->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByOwnerId->save($con);
				}
				$this->setsfGuardUserRelatedByOwnerId($this->asfGuardUserRelatedByOwnerId);
			}

			if ($this->asfGuardUserRelatedBySenderId !== null) {
				if ($this->asfGuardUserRelatedBySenderId->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedBySenderId->save($con);
				}
				$this->setsfGuardUserRelatedBySenderId($this->asfGuardUserRelatedBySenderId);
			}

			if ($this->asfGuardUserRelatedByRecipientId !== null) {
				if ($this->asfGuardUserRelatedByRecipientId->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByRecipientId->save($con);
				}
				$this->setsfGuardUserRelatedByRecipientId($this->asfGuardUserRelatedByRecipientId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MessagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MessagePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->asfGuardUserRelatedByOwnerId !== null) {
				if (!$this->asfGuardUserRelatedByOwnerId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByOwnerId->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedBySenderId !== null) {
				if (!$this->asfGuardUserRelatedBySenderId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedBySenderId->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByRecipientId !== null) {
				if (!$this->asfGuardUserRelatedByRecipientId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByRecipientId->getValidationFailures());
				}
			}


			if (($retval = MessagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MessagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUuid();
				break;
			case 2:
				return $this->getPublicId();
				break;
			case 3:
				return $this->getOwnerId();
				break;
			case 4:
				return $this->getSenderId();
				break;
			case 5:
				return $this->getRecipientId();
				break;
			case 6:
				return $this->getSubject();
				break;
			case 7:
				return $this->getBody();
				break;
			case 8:
				return $this->getHtmlBody();
				break;
			case 9:
				return $this->getFolder();
				break;
			case 10:
				return $this->getReadAt();
				break;
			case 11:
				return $this->getParentId();
				break;
			case 12:
				return $this->getMessageType();
				break;
			case 13:
				return $this->getVersion();
				break;
			case 14:
				return $this->getIsHidden();
				break;
			case 15:
				return $this->getDeletedAt();
				break;
			case 16:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MessagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getPublicId(),
			$keys[3] => $this->getOwnerId(),
			$keys[4] => $this->getSenderId(),
			$keys[5] => $this->getRecipientId(),
			$keys[6] => $this->getSubject(),
			$keys[7] => $this->getBody(),
			$keys[8] => $this->getHtmlBody(),
			$keys[9] => $this->getFolder(),
			$keys[10] => $this->getReadAt(),
			$keys[11] => $this->getParentId(),
			$keys[12] => $this->getMessageType(),
			$keys[13] => $this->getVersion(),
			$keys[14] => $this->getIsHidden(),
			$keys[15] => $this->getDeletedAt(),
			$keys[16] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MessagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUuid($value);
				break;
			case 2:
				$this->setPublicId($value);
				break;
			case 3:
				$this->setOwnerId($value);
				break;
			case 4:
				$this->setSenderId($value);
				break;
			case 5:
				$this->setRecipientId($value);
				break;
			case 6:
				$this->setSubject($value);
				break;
			case 7:
				$this->setBody($value);
				break;
			case 8:
				$this->setHtmlBody($value);
				break;
			case 9:
				$this->setFolder($value);
				break;
			case 10:
				$this->setReadAt($value);
				break;
			case 11:
				$this->setParentId($value);
				break;
			case 12:
				$this->setMessageType($value);
				break;
			case 13:
				$this->setVersion($value);
				break;
			case 14:
				$this->setIsHidden($value);
				break;
			case 15:
				$this->setDeletedAt($value);
				break;
			case 16:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MessagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPublicId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOwnerId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSenderId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRecipientId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSubject($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBody($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHtmlBody($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFolder($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setReadAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setParentId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMessageType($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setVersion($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIsHidden($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeletedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MessagePeer::DATABASE_NAME);

		if ($this->isColumnModified(MessagePeer::ID)) $criteria->add(MessagePeer::ID, $this->id);
		if ($this->isColumnModified(MessagePeer::UUID)) $criteria->add(MessagePeer::UUID, $this->uuid);
		if ($this->isColumnModified(MessagePeer::PUBLIC_ID)) $criteria->add(MessagePeer::PUBLIC_ID, $this->public_id);
		if ($this->isColumnModified(MessagePeer::OWNER_ID)) $criteria->add(MessagePeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(MessagePeer::SENDER_ID)) $criteria->add(MessagePeer::SENDER_ID, $this->sender_id);
		if ($this->isColumnModified(MessagePeer::RECIPIENT_ID)) $criteria->add(MessagePeer::RECIPIENT_ID, $this->recipient_id);
		if ($this->isColumnModified(MessagePeer::SUBJECT)) $criteria->add(MessagePeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(MessagePeer::BODY)) $criteria->add(MessagePeer::BODY, $this->body);
		if ($this->isColumnModified(MessagePeer::HTML_BODY)) $criteria->add(MessagePeer::HTML_BODY, $this->html_body);
		if ($this->isColumnModified(MessagePeer::FOLDER)) $criteria->add(MessagePeer::FOLDER, $this->folder);
		if ($this->isColumnModified(MessagePeer::READ_AT)) $criteria->add(MessagePeer::READ_AT, $this->read_at);
		if ($this->isColumnModified(MessagePeer::PARENT_ID)) $criteria->add(MessagePeer::PARENT_ID, $this->parent_id);
		if ($this->isColumnModified(MessagePeer::MESSAGE_TYPE)) $criteria->add(MessagePeer::MESSAGE_TYPE, $this->message_type);
		if ($this->isColumnModified(MessagePeer::VERSION)) $criteria->add(MessagePeer::VERSION, $this->version);
		if ($this->isColumnModified(MessagePeer::IS_HIDDEN)) $criteria->add(MessagePeer::IS_HIDDEN, $this->is_hidden);
		if ($this->isColumnModified(MessagePeer::DELETED_AT)) $criteria->add(MessagePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(MessagePeer::CREATED_AT)) $criteria->add(MessagePeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MessagePeer::DATABASE_NAME);

		$criteria->add(MessagePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUuid($this->uuid);

		$copyObj->setPublicId($this->public_id);

		$copyObj->setOwnerId($this->owner_id);

		$copyObj->setSenderId($this->sender_id);

		$copyObj->setRecipientId($this->recipient_id);

		$copyObj->setSubject($this->subject);

		$copyObj->setBody($this->body);

		$copyObj->setHtmlBody($this->html_body);

		$copyObj->setFolder($this->folder);

		$copyObj->setReadAt($this->read_at);

		$copyObj->setParentId($this->parent_id);

		$copyObj->setMessageType($this->message_type);

		$copyObj->setVersion($this->version);

		$copyObj->setIsHidden($this->is_hidden);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MessagePeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByOwnerId($v)
	{


		if ($v === null) {
			$this->setOwnerId(NULL);
		} else {
			$this->setOwnerId($v->getId());
		}


		$this->asfGuardUserRelatedByOwnerId = $v;
	}


	
	public function getsfGuardUserRelatedByOwnerId($con = null)
	{
		if ($this->asfGuardUserRelatedByOwnerId === null && ($this->owner_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByOwnerId = sfGuardUserPeer::retrieveByPK($this->owner_id, $con);

			
		}
		return $this->asfGuardUserRelatedByOwnerId;
	}

	
	public function setsfGuardUserRelatedBySenderId($v)
	{


		if ($v === null) {
			$this->setSenderId(NULL);
		} else {
			$this->setSenderId($v->getId());
		}


		$this->asfGuardUserRelatedBySenderId = $v;
	}


	
	public function getsfGuardUserRelatedBySenderId($con = null)
	{
		if ($this->asfGuardUserRelatedBySenderId === null && ($this->sender_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedBySenderId = sfGuardUserPeer::retrieveByPK($this->sender_id, $con);

			
		}
		return $this->asfGuardUserRelatedBySenderId;
	}

	
	public function setsfGuardUserRelatedByRecipientId($v)
	{


		if ($v === null) {
			$this->setRecipientId(NULL);
		} else {
			$this->setRecipientId($v->getId());
		}


		$this->asfGuardUserRelatedByRecipientId = $v;
	}


	
	public function getsfGuardUserRelatedByRecipientId($con = null)
	{
		if ($this->asfGuardUserRelatedByRecipientId === null && ($this->recipient_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByRecipientId = sfGuardUserPeer::retrieveByPK($this->recipient_id, $con);

			
		}
		return $this->asfGuardUserRelatedByRecipientId;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseMessage:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseMessage::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 