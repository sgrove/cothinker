<?php


abstract class BasePositionApplication extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $user_id;


	
	protected $position_id;


	
	protected $interest;


	
	protected $qualification;


	
	protected $notes;


	
	protected $status;


	
	protected $read_at;


	
	protected $created_at;


	
	protected $deleted_at;


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $aProjectPosition;

	
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

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getPositionId()
	{

		return $this->position_id;
	}

	
	public function getInterest()
	{

		return $this->interest;
	}

	
	public function getQualification()
	{

		return $this->qualification;
	}

	
	public function getNotes()
	{

		return $this->notes;
	}

	
	public function getStatus()
	{

		return $this->status;
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::UUID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setPositionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->position_id !== $v) {
			$this->position_id = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::POSITION_ID;
		}

		if ($this->aProjectPosition !== null && $this->aProjectPosition->getId() !== $v) {
			$this->aProjectPosition = null;
		}

	} 
	
	public function setInterest($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->interest !== $v) {
			$this->interest = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::INTEREST;
		}

	} 
	
	public function setQualification($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->qualification !== $v) {
			$this->qualification = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::QUALIFICATION;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::NOTES;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PositionApplicationPeer::STATUS;
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
			$this->modifiedColumns[] = PositionApplicationPeer::READ_AT;
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
			$this->modifiedColumns[] = PositionApplicationPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PositionApplicationPeer::DELETED_AT;
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
			$this->modifiedColumns[] = PositionApplicationPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->position_id = $rs->getInt($startcol + 3);

			$this->interest = $rs->getString($startcol + 4);

			$this->qualification = $rs->getString($startcol + 5);

			$this->notes = $rs->getString($startcol + 6);

			$this->status = $rs->getInt($startcol + 7);

			$this->read_at = $rs->getTimestamp($startcol + 8, null);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PositionApplication object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplication:delete:pre') as $callable)
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
			$con = Propel::getConnection(PositionApplicationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PositionApplicationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePositionApplication:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePositionApplication:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(PositionApplicationPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PositionApplicationPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PositionApplicationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePositionApplication:save:post') as $callable)
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


												
			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}

			if ($this->aProjectPosition !== null) {
				if ($this->aProjectPosition->isModified()) {
					$affectedRows += $this->aProjectPosition->save($con);
				}
				$this->setProjectPosition($this->aProjectPosition);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PositionApplicationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PositionApplicationPeer::doUpdate($this, $con);
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


												
			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}

			if ($this->aProjectPosition !== null) {
				if (!$this->aProjectPosition->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProjectPosition->getValidationFailures());
				}
			}


			if (($retval = PositionApplicationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PositionApplicationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUserId();
				break;
			case 3:
				return $this->getPositionId();
				break;
			case 4:
				return $this->getInterest();
				break;
			case 5:
				return $this->getQualification();
				break;
			case 6:
				return $this->getNotes();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getReadAt();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getDeletedAt();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PositionApplicationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getPositionId(),
			$keys[4] => $this->getInterest(),
			$keys[5] => $this->getQualification(),
			$keys[6] => $this->getNotes(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getReadAt(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getDeletedAt(),
			$keys[11] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PositionApplicationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUserId($value);
				break;
			case 3:
				$this->setPositionId($value);
				break;
			case 4:
				$this->setInterest($value);
				break;
			case 5:
				$this->setQualification($value);
				break;
			case 6:
				$this->setNotes($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setReadAt($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setDeletedAt($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PositionApplicationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPositionId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInterest($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQualification($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNotes($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setReadAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDeletedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PositionApplicationPeer::DATABASE_NAME);

		if ($this->isColumnModified(PositionApplicationPeer::ID)) $criteria->add(PositionApplicationPeer::ID, $this->id);
		if ($this->isColumnModified(PositionApplicationPeer::UUID)) $criteria->add(PositionApplicationPeer::UUID, $this->uuid);
		if ($this->isColumnModified(PositionApplicationPeer::USER_ID)) $criteria->add(PositionApplicationPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(PositionApplicationPeer::POSITION_ID)) $criteria->add(PositionApplicationPeer::POSITION_ID, $this->position_id);
		if ($this->isColumnModified(PositionApplicationPeer::INTEREST)) $criteria->add(PositionApplicationPeer::INTEREST, $this->interest);
		if ($this->isColumnModified(PositionApplicationPeer::QUALIFICATION)) $criteria->add(PositionApplicationPeer::QUALIFICATION, $this->qualification);
		if ($this->isColumnModified(PositionApplicationPeer::NOTES)) $criteria->add(PositionApplicationPeer::NOTES, $this->notes);
		if ($this->isColumnModified(PositionApplicationPeer::STATUS)) $criteria->add(PositionApplicationPeer::STATUS, $this->status);
		if ($this->isColumnModified(PositionApplicationPeer::READ_AT)) $criteria->add(PositionApplicationPeer::READ_AT, $this->read_at);
		if ($this->isColumnModified(PositionApplicationPeer::CREATED_AT)) $criteria->add(PositionApplicationPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PositionApplicationPeer::DELETED_AT)) $criteria->add(PositionApplicationPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(PositionApplicationPeer::UPDATED_AT)) $criteria->add(PositionApplicationPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PositionApplicationPeer::DATABASE_NAME);

		$criteria->add(PositionApplicationPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setPositionId($this->position_id);

		$copyObj->setInterest($this->interest);

		$copyObj->setQualification($this->qualification);

		$copyObj->setNotes($this->notes);

		$copyObj->setStatus($this->status);

		$copyObj->setReadAt($this->read_at);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setUpdatedAt($this->updated_at);


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
			self::$peer = new PositionApplicationPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUser = sfGuardUserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->asfGuardUser;
	}

	
	public function setProjectPosition($v)
	{


		if ($v === null) {
			$this->setPositionId(NULL);
		} else {
			$this->setPositionId($v->getId());
		}


		$this->aProjectPosition = $v;
	}


	
	public function getProjectPosition($con = null)
	{
		if ($this->aProjectPosition === null && ($this->position_id !== null)) {
						include_once 'lib/model/om/BaseProjectPositionPeer.php';

			$this->aProjectPosition = ProjectPositionPeer::retrieveByPK($this->position_id, $con);

			
		}
		return $this->aProjectPosition;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasePositionApplication:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePositionApplication::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 