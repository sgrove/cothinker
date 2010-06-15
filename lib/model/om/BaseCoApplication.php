<?php


abstract class BaseCoApplication extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $application_id;


	
	protected $user_id;


	
	protected $status;


	
	protected $created_at;


	
	protected $deleted_at;


	
	protected $updated_at;

	
	protected $aCoFormApplication;

	
	protected $asfGuardUser;

	
	protected $collCoApplicationFieldEntrys;

	
	protected $lastCoApplicationFieldEntryCriteria = null;

	
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

	
	public function getApplicationId()
	{

		return $this->application_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getStatus()
	{

		return $this->status;
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
			$this->modifiedColumns[] = CoApplicationPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = CoApplicationPeer::UUID;
		}

	} 
	
	public function setApplicationId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->application_id !== $v) {
			$this->application_id = $v;
			$this->modifiedColumns[] = CoApplicationPeer::APPLICATION_ID;
		}

		if ($this->aCoFormApplication !== null && $this->aCoFormApplication->getId() !== $v) {
			$this->aCoFormApplication = null;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = CoApplicationPeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CoApplicationPeer::STATUS;
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
			$this->modifiedColumns[] = CoApplicationPeer::CREATED_AT;
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
			$this->modifiedColumns[] = CoApplicationPeer::DELETED_AT;
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
			$this->modifiedColumns[] = CoApplicationPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->application_id = $rs->getInt($startcol + 2);

			$this->user_id = $rs->getInt($startcol + 3);

			$this->status = $rs->getInt($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CoApplication object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplication:delete:pre') as $callable)
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
			$con = Propel::getConnection(CoApplicationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CoApplicationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseCoApplication:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplication:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(CoApplicationPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CoApplicationPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CoApplicationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseCoApplication:save:post') as $callable)
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


												
			if ($this->aCoFormApplication !== null) {
				if ($this->aCoFormApplication->isModified()) {
					$affectedRows += $this->aCoFormApplication->save($con);
				}
				$this->setCoFormApplication($this->aCoFormApplication);
			}

			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CoApplicationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CoApplicationPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCoApplicationFieldEntrys !== null) {
				foreach($this->collCoApplicationFieldEntrys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCoFormApplication !== null) {
				if (!$this->aCoFormApplication->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCoFormApplication->getValidationFailures());
				}
			}

			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = CoApplicationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCoApplicationFieldEntrys !== null) {
					foreach($this->collCoApplicationFieldEntrys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoApplicationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getApplicationId();
				break;
			case 3:
				return $this->getUserId();
				break;
			case 4:
				return $this->getStatus();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getDeletedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoApplicationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getApplicationId(),
			$keys[3] => $this->getUserId(),
			$keys[4] => $this->getStatus(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getDeletedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoApplicationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setApplicationId($value);
				break;
			case 3:
				$this->setUserId($value);
				break;
			case 4:
				$this->setStatus($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setDeletedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoApplicationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApplicationId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDeletedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CoApplicationPeer::DATABASE_NAME);

		if ($this->isColumnModified(CoApplicationPeer::ID)) $criteria->add(CoApplicationPeer::ID, $this->id);
		if ($this->isColumnModified(CoApplicationPeer::UUID)) $criteria->add(CoApplicationPeer::UUID, $this->uuid);
		if ($this->isColumnModified(CoApplicationPeer::APPLICATION_ID)) $criteria->add(CoApplicationPeer::APPLICATION_ID, $this->application_id);
		if ($this->isColumnModified(CoApplicationPeer::USER_ID)) $criteria->add(CoApplicationPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(CoApplicationPeer::STATUS)) $criteria->add(CoApplicationPeer::STATUS, $this->status);
		if ($this->isColumnModified(CoApplicationPeer::CREATED_AT)) $criteria->add(CoApplicationPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CoApplicationPeer::DELETED_AT)) $criteria->add(CoApplicationPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(CoApplicationPeer::UPDATED_AT)) $criteria->add(CoApplicationPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CoApplicationPeer::DATABASE_NAME);

		$criteria->add(CoApplicationPeer::ID, $this->id);

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

		$copyObj->setApplicationId($this->application_id);

		$copyObj->setUserId($this->user_id);

		$copyObj->setStatus($this->status);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCoApplicationFieldEntrys() as $relObj) {
				$copyObj->addCoApplicationFieldEntry($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CoApplicationPeer();
		}
		return self::$peer;
	}

	
	public function setCoFormApplication($v)
	{


		if ($v === null) {
			$this->setApplicationId(NULL);
		} else {
			$this->setApplicationId($v->getId());
		}


		$this->aCoFormApplication = $v;
	}


	
	public function getCoFormApplication($con = null)
	{
		if ($this->aCoFormApplication === null && ($this->application_id !== null)) {
						include_once 'lib/model/om/BaseCoFormApplicationPeer.php';

			$this->aCoFormApplication = CoFormApplicationPeer::retrieveByPK($this->application_id, $con);

			
		}
		return $this->aCoFormApplication;
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

	
	public function initCoApplicationFieldEntrys()
	{
		if ($this->collCoApplicationFieldEntrys === null) {
			$this->collCoApplicationFieldEntrys = array();
		}
	}

	
	public function getCoApplicationFieldEntrys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoApplicationFieldEntryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoApplicationFieldEntrys === null) {
			if ($this->isNew()) {
			   $this->collCoApplicationFieldEntrys = array();
			} else {

				$criteria->add(CoApplicationFieldEntryPeer::APPLICATION_ID, $this->getId());

				CoApplicationFieldEntryPeer::addSelectColumns($criteria);
				$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoApplicationFieldEntryPeer::APPLICATION_ID, $this->getId());

				CoApplicationFieldEntryPeer::addSelectColumns($criteria);
				if (!isset($this->lastCoApplicationFieldEntryCriteria) || !$this->lastCoApplicationFieldEntryCriteria->equals($criteria)) {
					$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCoApplicationFieldEntryCriteria = $criteria;
		return $this->collCoApplicationFieldEntrys;
	}

	
	public function countCoApplicationFieldEntrys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCoApplicationFieldEntryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CoApplicationFieldEntryPeer::APPLICATION_ID, $this->getId());

		return CoApplicationFieldEntryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoApplicationFieldEntry(CoApplicationFieldEntry $l)
	{
		$this->collCoApplicationFieldEntrys[] = $l;
		$l->setCoApplication($this);
	}


	
	public function getCoApplicationFieldEntrysJoinCoField($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoApplicationFieldEntryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoApplicationFieldEntrys === null) {
			if ($this->isNew()) {
				$this->collCoApplicationFieldEntrys = array();
			} else {

				$criteria->add(CoApplicationFieldEntryPeer::APPLICATION_ID, $this->getId());

				$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelectJoinCoField($criteria, $con);
			}
		} else {
									
			$criteria->add(CoApplicationFieldEntryPeer::APPLICATION_ID, $this->getId());

			if (!isset($this->lastCoApplicationFieldEntryCriteria) || !$this->lastCoApplicationFieldEntryCriteria->equals($criteria)) {
				$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelectJoinCoField($criteria, $con);
			}
		}
		$this->lastCoApplicationFieldEntryCriteria = $criteria;

		return $this->collCoApplicationFieldEntrys;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseCoApplication:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseCoApplication::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 