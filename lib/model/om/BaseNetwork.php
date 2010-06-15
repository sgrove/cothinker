<?php


abstract class BaseNetwork extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $user1_id;


	
	protected $user2_id;

	
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NetworkPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = NetworkPeer::UUID;
		}

	} 
	
	public function setUser1Id($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user1_id !== $v) {
			$this->user1_id = $v;
			$this->modifiedColumns[] = NetworkPeer::USER1_ID;
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
			$this->modifiedColumns[] = NetworkPeer::USER2_ID;
		}

		if ($this->asfGuardUserRelatedByUser2Id !== null && $this->asfGuardUserRelatedByUser2Id->getId() !== $v) {
			$this->asfGuardUserRelatedByUser2Id = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->user1_id = $rs->getInt($startcol + 2);

			$this->user2_id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Network object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseNetwork:delete:pre') as $callable)
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
			$con = Propel::getConnection(NetworkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NetworkPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseNetwork:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseNetwork:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NetworkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseNetwork:save:post') as $callable)
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
					$pk = NetworkPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NetworkPeer::doUpdate($this, $con);
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


			if (($retval = NetworkPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NetworkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NetworkPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getUser1Id(),
			$keys[3] => $this->getUser2Id(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NetworkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NetworkPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUser1Id($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUser2Id($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NetworkPeer::DATABASE_NAME);

		if ($this->isColumnModified(NetworkPeer::ID)) $criteria->add(NetworkPeer::ID, $this->id);
		if ($this->isColumnModified(NetworkPeer::UUID)) $criteria->add(NetworkPeer::UUID, $this->uuid);
		if ($this->isColumnModified(NetworkPeer::USER1_ID)) $criteria->add(NetworkPeer::USER1_ID, $this->user1_id);
		if ($this->isColumnModified(NetworkPeer::USER2_ID)) $criteria->add(NetworkPeer::USER2_ID, $this->user2_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NetworkPeer::DATABASE_NAME);

		$criteria->add(NetworkPeer::ID, $this->id);

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
			self::$peer = new NetworkPeer();
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
    if (!$callable = sfMixer::getCallable('BaseNetwork:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseNetwork::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 