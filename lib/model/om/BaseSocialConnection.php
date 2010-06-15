<?php


abstract class BaseSocialConnection extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $user1_id;


	
	protected $user2_id;


	
	protected $notes;


	
	protected $status;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $asfGuardUserRelatedByUser1Id;

	
	protected $asfGuardUserRelatedByUser2Id;

	
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

	
	public function getUser1Id()
	{

		return $this->user1_id;
	}

	
	public function getUser2Id()
	{

		return $this->user2_id;
	}

	
	public function getNotes()
	{

		return $this->notes;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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
			$this->modifiedColumns[] = SocialConnectionPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = SocialConnectionPeer::UUID;
		}

	} 
	
	public function setUser1Id($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user1_id !== $v) {
			$this->user1_id = $v;
			$this->modifiedColumns[] = SocialConnectionPeer::USER1_ID;
		}

		if ($this->asfGuardUserRelatedByUser1Id !== null && $this->asfGuardUserRelatedByUser1Id->getId() !== $v) {
			$this->asfGuardUserRelatedByUser1Id = null;
		}

	} 
	
	public function setUser2Id($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user2_id !== $v) {
			$this->user2_id = $v;
			$this->modifiedColumns[] = SocialConnectionPeer::USER2_ID;
		}

		if ($this->asfGuardUserRelatedByUser2Id !== null && $this->asfGuardUserRelatedByUser2Id->getId() !== $v) {
			$this->asfGuardUserRelatedByUser2Id = null;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = SocialConnectionPeer::NOTES;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = SocialConnectionPeer::STATUS;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = SocialConnectionPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = SocialConnectionPeer::DELETED_AT;
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
			$this->modifiedColumns[] = SocialConnectionPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->user1_id = $rs->getInt($startcol + 2);

			$this->user2_id = $rs->getInt($startcol + 3);

			$this->notes = $rs->getString($startcol + 4);

			$this->status = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 7, null);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SocialConnection object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSocialConnection:delete:pre') as $callable)
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
			$con = Propel::getConnection(SocialConnectionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SocialConnectionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSocialConnection:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSocialConnection:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(SocialConnectionPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(SocialConnectionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SocialConnectionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSocialConnection:save:post') as $callable)
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


												
			if ($this->asfGuardUserRelatedByUser1Id !== null) {
				if ($this->asfGuardUserRelatedByUser1Id->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUser1Id->save($con);
				}
				$this->setsfGuardUserRelatedByUser1Id($this->asfGuardUserRelatedByUser1Id);
			}

			if ($this->asfGuardUserRelatedByUser2Id !== null) {
				if ($this->asfGuardUserRelatedByUser2Id->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUser2Id->save($con);
				}
				$this->setsfGuardUserRelatedByUser2Id($this->asfGuardUserRelatedByUser2Id);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SocialConnectionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SocialConnectionPeer::doUpdate($this, $con);
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


												
			if ($this->asfGuardUserRelatedByUser1Id !== null) {
				if (!$this->asfGuardUserRelatedByUser1Id->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUser1Id->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUser2Id !== null) {
				if (!$this->asfGuardUserRelatedByUser2Id->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUser2Id->getValidationFailures());
				}
			}


			if (($retval = SocialConnectionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SocialConnectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUser1Id();
				break;
			case 3:
				return $this->getUser2Id();
				break;
			case 4:
				return $this->getNotes();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getDeletedAt();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SocialConnectionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getUser1Id(),
			$keys[3] => $this->getUser2Id(),
			$keys[4] => $this->getNotes(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getDeletedAt(),
			$keys[8] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SocialConnectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUser1Id($value);
				break;
			case 3:
				$this->setUser2Id($value);
				break;
			case 4:
				$this->setNotes($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setDeletedAt($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SocialConnectionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUser1Id($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUser2Id($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNotes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDeletedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SocialConnectionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SocialConnectionPeer::ID)) $criteria->add(SocialConnectionPeer::ID, $this->id);
		if ($this->isColumnModified(SocialConnectionPeer::UUID)) $criteria->add(SocialConnectionPeer::UUID, $this->uuid);
		if ($this->isColumnModified(SocialConnectionPeer::USER1_ID)) $criteria->add(SocialConnectionPeer::USER1_ID, $this->user1_id);
		if ($this->isColumnModified(SocialConnectionPeer::USER2_ID)) $criteria->add(SocialConnectionPeer::USER2_ID, $this->user2_id);
		if ($this->isColumnModified(SocialConnectionPeer::NOTES)) $criteria->add(SocialConnectionPeer::NOTES, $this->notes);
		if ($this->isColumnModified(SocialConnectionPeer::STATUS)) $criteria->add(SocialConnectionPeer::STATUS, $this->status);
		if ($this->isColumnModified(SocialConnectionPeer::UPDATED_AT)) $criteria->add(SocialConnectionPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(SocialConnectionPeer::DELETED_AT)) $criteria->add(SocialConnectionPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(SocialConnectionPeer::CREATED_AT)) $criteria->add(SocialConnectionPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SocialConnectionPeer::DATABASE_NAME);

		$criteria->add(SocialConnectionPeer::ID, $this->id);

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

		$copyObj->setUser1Id($this->user1_id);

		$copyObj->setUser2Id($this->user2_id);

		$copyObj->setNotes($this->notes);

		$copyObj->setStatus($this->status);

		$copyObj->setUpdatedAt($this->updated_at);

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
			self::$peer = new SocialConnectionPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByUser1Id($v)
	{


		if ($v === null) {
			$this->setUser1Id(NULL);
		} else {
			$this->setUser1Id($v->getId());
		}


		$this->asfGuardUserRelatedByUser1Id = $v;
	}


	
	public function getsfGuardUserRelatedByUser1Id($con = null)
	{
		if ($this->asfGuardUserRelatedByUser1Id === null && ($this->user1_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUser1Id = sfGuardUserPeer::retrieveByPK($this->user1_id, $con);

			
		}
		return $this->asfGuardUserRelatedByUser1Id;
	}

	
	public function setsfGuardUserRelatedByUser2Id($v)
	{


		if ($v === null) {
			$this->setUser2Id(NULL);
		} else {
			$this->setUser2Id($v->getId());
		}


		$this->asfGuardUserRelatedByUser2Id = $v;
	}


	
	public function getsfGuardUserRelatedByUser2Id($con = null)
	{
		if ($this->asfGuardUserRelatedByUser2Id === null && ($this->user2_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUser2Id = sfGuardUserPeer::retrieveByPK($this->user2_id, $con);

			
		}
		return $this->asfGuardUserRelatedByUser2Id;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSocialConnection:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSocialConnection::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 