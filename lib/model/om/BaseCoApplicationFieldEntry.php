<?php


abstract class BaseCoApplicationFieldEntry extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $application_id;


	
	protected $field_id;


	
	protected $value;


	
	protected $status;


	
	protected $created_at;


	
	protected $deleted_at;


	
	protected $updated_at;

	
	protected $aCoApplication;

	
	protected $aCoField;

	
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

	
	public function getFieldId()
	{

		return $this->field_id;
	}

	
	public function getValue()
	{

		return $this->value;
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
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::UUID;
		}

	} 
	
	public function setApplicationId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->application_id !== $v) {
			$this->application_id = $v;
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::APPLICATION_ID;
		}

		if ($this->aCoApplication !== null && $this->aCoApplication->getId() !== $v) {
			$this->aCoApplication = null;
		}

	} 
	
	public function setFieldId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->field_id !== $v) {
			$this->field_id = $v;
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::FIELD_ID;
		}

		if ($this->aCoField !== null && $this->aCoField->getId() !== $v) {
			$this->aCoField = null;
		}

	} 
	
	public function setValue($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->value !== $v) {
			$this->value = $v;
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::VALUE;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::STATUS;
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
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::CREATED_AT;
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
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::DELETED_AT;
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
			$this->modifiedColumns[] = CoApplicationFieldEntryPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->application_id = $rs->getInt($startcol + 2);

			$this->field_id = $rs->getInt($startcol + 3);

			$this->value = $rs->getString($startcol + 4);

			$this->status = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 7, null);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CoApplicationFieldEntry object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntry:delete:pre') as $callable)
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
			$con = Propel::getConnection(CoApplicationFieldEntryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CoApplicationFieldEntryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntry:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntry:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(CoApplicationFieldEntryPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CoApplicationFieldEntryPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CoApplicationFieldEntryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseCoApplicationFieldEntry:save:post') as $callable)
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


												
			if ($this->aCoApplication !== null) {
				if ($this->aCoApplication->isModified()) {
					$affectedRows += $this->aCoApplication->save($con);
				}
				$this->setCoApplication($this->aCoApplication);
			}

			if ($this->aCoField !== null) {
				if ($this->aCoField->isModified()) {
					$affectedRows += $this->aCoField->save($con);
				}
				$this->setCoField($this->aCoField);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CoApplicationFieldEntryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CoApplicationFieldEntryPeer::doUpdate($this, $con);
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


												
			if ($this->aCoApplication !== null) {
				if (!$this->aCoApplication->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCoApplication->getValidationFailures());
				}
			}

			if ($this->aCoField !== null) {
				if (!$this->aCoField->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCoField->getValidationFailures());
				}
			}


			if (($retval = CoApplicationFieldEntryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoApplicationFieldEntryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFieldId();
				break;
			case 4:
				return $this->getValue();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getDeletedAt();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoApplicationFieldEntryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getApplicationId(),
			$keys[3] => $this->getFieldId(),
			$keys[4] => $this->getValue(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getDeletedAt(),
			$keys[8] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoApplicationFieldEntryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFieldId($value);
				break;
			case 4:
				$this->setValue($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setDeletedAt($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoApplicationFieldEntryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApplicationId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFieldId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDeletedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CoApplicationFieldEntryPeer::DATABASE_NAME);

		if ($this->isColumnModified(CoApplicationFieldEntryPeer::ID)) $criteria->add(CoApplicationFieldEntryPeer::ID, $this->id);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::UUID)) $criteria->add(CoApplicationFieldEntryPeer::UUID, $this->uuid);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::APPLICATION_ID)) $criteria->add(CoApplicationFieldEntryPeer::APPLICATION_ID, $this->application_id);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::FIELD_ID)) $criteria->add(CoApplicationFieldEntryPeer::FIELD_ID, $this->field_id);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::VALUE)) $criteria->add(CoApplicationFieldEntryPeer::VALUE, $this->value);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::STATUS)) $criteria->add(CoApplicationFieldEntryPeer::STATUS, $this->status);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::CREATED_AT)) $criteria->add(CoApplicationFieldEntryPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::DELETED_AT)) $criteria->add(CoApplicationFieldEntryPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(CoApplicationFieldEntryPeer::UPDATED_AT)) $criteria->add(CoApplicationFieldEntryPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CoApplicationFieldEntryPeer::DATABASE_NAME);

		$criteria->add(CoApplicationFieldEntryPeer::ID, $this->id);

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

		$copyObj->setFieldId($this->field_id);

		$copyObj->setValue($this->value);

		$copyObj->setStatus($this->status);

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
			self::$peer = new CoApplicationFieldEntryPeer();
		}
		return self::$peer;
	}

	
	public function setCoApplication($v)
	{


		if ($v === null) {
			$this->setApplicationId(NULL);
		} else {
			$this->setApplicationId($v->getId());
		}


		$this->aCoApplication = $v;
	}


	
	public function getCoApplication($con = null)
	{
		if ($this->aCoApplication === null && ($this->application_id !== null)) {
						include_once 'lib/model/om/BaseCoApplicationPeer.php';

			$this->aCoApplication = CoApplicationPeer::retrieveByPK($this->application_id, $con);

			
		}
		return $this->aCoApplication;
	}

	
	public function setCoField($v)
	{


		if ($v === null) {
			$this->setFieldId(NULL);
		} else {
			$this->setFieldId($v->getId());
		}


		$this->aCoField = $v;
	}


	
	public function getCoField($con = null)
	{
		if ($this->aCoField === null && ($this->field_id !== null)) {
						include_once 'lib/model/om/BaseCoFieldPeer.php';

			$this->aCoField = CoFieldPeer::retrieveByPK($this->field_id, $con);

			
		}
		return $this->aCoField;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseCoApplicationFieldEntry:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseCoApplicationFieldEntry::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 