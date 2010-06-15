<?php


abstract class BaseToDo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $owner_id;


	
	protected $name;


	
	protected $slug;


	
	protected $description;


	
	protected $begin;


	
	protected $finish;


	
	protected $status;


	
	protected $context = 'personal';


	
	protected $priority;


	
	protected $privileged;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $asfGuardUser;

	
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

	
	public function getOwnerId()
	{

		return $this->owner_id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getBegin($format = 'Y-m-d H:i:s')
	{

		if ($this->begin === null || $this->begin === '') {
			return null;
		} elseif (!is_int($this->begin)) {
						$ts = strtotime($this->begin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [begin] as date/time value: " . var_export($this->begin, true));
			}
		} else {
			$ts = $this->begin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFinish($format = 'Y-m-d H:i:s')
	{

		if ($this->finish === null || $this->finish === '') {
			return null;
		} elseif (!is_int($this->finish)) {
						$ts = strtotime($this->finish);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [finish] as date/time value: " . var_export($this->finish, true));
			}
		} else {
			$ts = $this->finish;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getContext()
	{

		return $this->context;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getPrivileged()
	{

		return $this->privileged;
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
			$this->modifiedColumns[] = ToDoPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = ToDoPeer::UUID;
		}

	} 
	
	public function setOwnerId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = ToDoPeer::OWNER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ToDoPeer::NAME;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = ToDoPeer::SLUG;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ToDoPeer::DESCRIPTION;
		}

	} 
	
	public function setBegin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [begin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->begin !== $ts) {
			$this->begin = $ts;
			$this->modifiedColumns[] = ToDoPeer::BEGIN;
		}

	} 
	
	public function setFinish($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [finish] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->finish !== $ts) {
			$this->finish = $ts;
			$this->modifiedColumns[] = ToDoPeer::FINISH;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ToDoPeer::STATUS;
		}

	} 
	
	public function setContext($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->context !== $v || $v === 'personal') {
			$this->context = $v;
			$this->modifiedColumns[] = ToDoPeer::CONTEXT;
		}

	} 
	
	public function setPriority($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v) {
			$this->priority = $v;
			$this->modifiedColumns[] = ToDoPeer::PRIORITY;
		}

	} 
	
	public function setPrivileged($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->privileged !== $v) {
			$this->privileged = $v;
			$this->modifiedColumns[] = ToDoPeer::PRIVILEGED;
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
			$this->modifiedColumns[] = ToDoPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = ToDoPeer::DELETED_AT;
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
			$this->modifiedColumns[] = ToDoPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->owner_id = $rs->getInt($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->slug = $rs->getString($startcol + 4);

			$this->description = $rs->getString($startcol + 5);

			$this->begin = $rs->getTimestamp($startcol + 6, null);

			$this->finish = $rs->getTimestamp($startcol + 7, null);

			$this->status = $rs->getInt($startcol + 8);

			$this->context = $rs->getString($startcol + 9);

			$this->priority = $rs->getInt($startcol + 10);

			$this->privileged = $rs->getInt($startcol + 11);

			$this->updated_at = $rs->getTimestamp($startcol + 12, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 13, null);

			$this->created_at = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ToDo object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseToDo:delete:pre') as $callable)
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
			$con = Propel::getConnection(ToDoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ToDoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseToDo:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseToDo:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(ToDoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(ToDoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ToDoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseToDo:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ToDoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ToDoPeer::doUpdate($this, $con);
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


			if (($retval = ToDoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ToDoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOwnerId();
				break;
			case 3:
				return $this->getName();
				break;
			case 4:
				return $this->getSlug();
				break;
			case 5:
				return $this->getDescription();
				break;
			case 6:
				return $this->getBegin();
				break;
			case 7:
				return $this->getFinish();
				break;
			case 8:
				return $this->getStatus();
				break;
			case 9:
				return $this->getContext();
				break;
			case 10:
				return $this->getPriority();
				break;
			case 11:
				return $this->getPrivileged();
				break;
			case 12:
				return $this->getUpdatedAt();
				break;
			case 13:
				return $this->getDeletedAt();
				break;
			case 14:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ToDoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getOwnerId(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getSlug(),
			$keys[5] => $this->getDescription(),
			$keys[6] => $this->getBegin(),
			$keys[7] => $this->getFinish(),
			$keys[8] => $this->getStatus(),
			$keys[9] => $this->getContext(),
			$keys[10] => $this->getPriority(),
			$keys[11] => $this->getPrivileged(),
			$keys[12] => $this->getUpdatedAt(),
			$keys[13] => $this->getDeletedAt(),
			$keys[14] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ToDoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOwnerId($value);
				break;
			case 3:
				$this->setName($value);
				break;
			case 4:
				$this->setSlug($value);
				break;
			case 5:
				$this->setDescription($value);
				break;
			case 6:
				$this->setBegin($value);
				break;
			case 7:
				$this->setFinish($value);
				break;
			case 8:
				$this->setStatus($value);
				break;
			case 9:
				$this->setContext($value);
				break;
			case 10:
				$this->setPriority($value);
				break;
			case 11:
				$this->setPrivileged($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
				break;
			case 13:
				$this->setDeletedAt($value);
				break;
			case 14:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ToDoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOwnerId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSlug($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBegin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFinish($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setContext($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPriority($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPrivileged($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDeletedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedAt($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ToDoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ToDoPeer::ID)) $criteria->add(ToDoPeer::ID, $this->id);
		if ($this->isColumnModified(ToDoPeer::UUID)) $criteria->add(ToDoPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ToDoPeer::OWNER_ID)) $criteria->add(ToDoPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(ToDoPeer::NAME)) $criteria->add(ToDoPeer::NAME, $this->name);
		if ($this->isColumnModified(ToDoPeer::SLUG)) $criteria->add(ToDoPeer::SLUG, $this->slug);
		if ($this->isColumnModified(ToDoPeer::DESCRIPTION)) $criteria->add(ToDoPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ToDoPeer::BEGIN)) $criteria->add(ToDoPeer::BEGIN, $this->begin);
		if ($this->isColumnModified(ToDoPeer::FINISH)) $criteria->add(ToDoPeer::FINISH, $this->finish);
		if ($this->isColumnModified(ToDoPeer::STATUS)) $criteria->add(ToDoPeer::STATUS, $this->status);
		if ($this->isColumnModified(ToDoPeer::CONTEXT)) $criteria->add(ToDoPeer::CONTEXT, $this->context);
		if ($this->isColumnModified(ToDoPeer::PRIORITY)) $criteria->add(ToDoPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(ToDoPeer::PRIVILEGED)) $criteria->add(ToDoPeer::PRIVILEGED, $this->privileged);
		if ($this->isColumnModified(ToDoPeer::UPDATED_AT)) $criteria->add(ToDoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ToDoPeer::DELETED_AT)) $criteria->add(ToDoPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ToDoPeer::CREATED_AT)) $criteria->add(ToDoPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ToDoPeer::DATABASE_NAME);

		$criteria->add(ToDoPeer::ID, $this->id);

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

		$copyObj->setOwnerId($this->owner_id);

		$copyObj->setName($this->name);

		$copyObj->setSlug($this->slug);

		$copyObj->setDescription($this->description);

		$copyObj->setBegin($this->begin);

		$copyObj->setFinish($this->finish);

		$copyObj->setStatus($this->status);

		$copyObj->setContext($this->context);

		$copyObj->setPriority($this->priority);

		$copyObj->setPrivileged($this->privileged);

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
			self::$peer = new ToDoPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setOwnerId(NULL);
		} else {
			$this->setOwnerId($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->owner_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUser = sfGuardUserPeer::retrieveByPK($this->owner_id, $con);

			
		}
		return $this->asfGuardUser;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseToDo:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseToDo::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 