<?php


abstract class BasePositionMilestone extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $position_id;


	
	protected $title;


	
	protected $description;


	
	protected $deliverables;


	
	protected $deadline;


	
	protected $status;


	
	protected $rank;


	
	protected $filled;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
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

	
	public function getPositionId()
	{

		return $this->position_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getDeliverables()
	{

		return $this->deliverables;
	}

	
	public function getDeadline($format = 'Y-m-d')
	{

		if ($this->deadline === null || $this->deadline === '') {
			return null;
		} elseif (!is_int($this->deadline)) {
						$ts = strtotime($this->deadline);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deadline] as date/time value: " . var_export($this->deadline, true));
			}
		} else {
			$ts = $this->deadline;
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

	
	public function getRank()
	{

		return $this->rank;
	}

	
	public function getFilled()
	{

		return $this->filled;
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
			$this->modifiedColumns[] = PositionMilestonePeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::UUID;
		}

	} 
	
	public function setPositionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->position_id !== $v) {
			$this->position_id = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::POSITION_ID;
		}

		if ($this->aProjectPosition !== null && $this->aProjectPosition->getId() !== $v) {
			$this->aProjectPosition = null;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::TITLE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::DESCRIPTION;
		}

	} 
	
	public function setDeliverables($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->deliverables !== $v) {
			$this->deliverables = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::DELIVERABLES;
		}

	} 
	
	public function setDeadline($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deadline] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deadline !== $ts) {
			$this->deadline = $ts;
			$this->modifiedColumns[] = PositionMilestonePeer::DEADLINE;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::STATUS;
		}

	} 
	
	public function setRank($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::RANK;
		}

	} 
	
	public function setFilled($v)
	{

		if ($this->filled !== $v) {
			$this->filled = $v;
			$this->modifiedColumns[] = PositionMilestonePeer::FILLED;
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
			$this->modifiedColumns[] = PositionMilestonePeer::UPDATED_AT;
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
			$this->modifiedColumns[] = PositionMilestonePeer::DELETED_AT;
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
			$this->modifiedColumns[] = PositionMilestonePeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->position_id = $rs->getInt($startcol + 2);

			$this->title = $rs->getString($startcol + 3);

			$this->description = $rs->getString($startcol + 4);

			$this->deliverables = $rs->getString($startcol + 5);

			$this->deadline = $rs->getDate($startcol + 6, null);

			$this->status = $rs->getInt($startcol + 7);

			$this->rank = $rs->getInt($startcol + 8);

			$this->filled = $rs->getBoolean($startcol + 9);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 11, null);

			$this->created_at = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PositionMilestone object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestone:delete:pre') as $callable)
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
			$con = Propel::getConnection(PositionMilestonePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PositionMilestonePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePositionMilestone:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePositionMilestone:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(PositionMilestonePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(PositionMilestonePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PositionMilestonePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePositionMilestone:save:post') as $callable)
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


												
			if ($this->aProjectPosition !== null) {
				if ($this->aProjectPosition->isModified()) {
					$affectedRows += $this->aProjectPosition->save($con);
				}
				$this->setProjectPosition($this->aProjectPosition);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PositionMilestonePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PositionMilestonePeer::doUpdate($this, $con);
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


												
			if ($this->aProjectPosition !== null) {
				if (!$this->aProjectPosition->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProjectPosition->getValidationFailures());
				}
			}


			if (($retval = PositionMilestonePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PositionMilestonePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPositionId();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getDeliverables();
				break;
			case 6:
				return $this->getDeadline();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getRank();
				break;
			case 9:
				return $this->getFilled();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getDeletedAt();
				break;
			case 12:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PositionMilestonePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getPositionId(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getDeliverables(),
			$keys[6] => $this->getDeadline(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getRank(),
			$keys[9] => $this->getFilled(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getDeletedAt(),
			$keys[12] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PositionMilestonePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPositionId($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setDeliverables($value);
				break;
			case 6:
				$this->setDeadline($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setRank($value);
				break;
			case 9:
				$this->setFilled($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setDeletedAt($value);
				break;
			case 12:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PositionMilestonePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPositionId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDeliverables($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDeadline($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRank($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFilled($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDeletedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedAt($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PositionMilestonePeer::DATABASE_NAME);

		if ($this->isColumnModified(PositionMilestonePeer::ID)) $criteria->add(PositionMilestonePeer::ID, $this->id);
		if ($this->isColumnModified(PositionMilestonePeer::UUID)) $criteria->add(PositionMilestonePeer::UUID, $this->uuid);
		if ($this->isColumnModified(PositionMilestonePeer::POSITION_ID)) $criteria->add(PositionMilestonePeer::POSITION_ID, $this->position_id);
		if ($this->isColumnModified(PositionMilestonePeer::TITLE)) $criteria->add(PositionMilestonePeer::TITLE, $this->title);
		if ($this->isColumnModified(PositionMilestonePeer::DESCRIPTION)) $criteria->add(PositionMilestonePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PositionMilestonePeer::DELIVERABLES)) $criteria->add(PositionMilestonePeer::DELIVERABLES, $this->deliverables);
		if ($this->isColumnModified(PositionMilestonePeer::DEADLINE)) $criteria->add(PositionMilestonePeer::DEADLINE, $this->deadline);
		if ($this->isColumnModified(PositionMilestonePeer::STATUS)) $criteria->add(PositionMilestonePeer::STATUS, $this->status);
		if ($this->isColumnModified(PositionMilestonePeer::RANK)) $criteria->add(PositionMilestonePeer::RANK, $this->rank);
		if ($this->isColumnModified(PositionMilestonePeer::FILLED)) $criteria->add(PositionMilestonePeer::FILLED, $this->filled);
		if ($this->isColumnModified(PositionMilestonePeer::UPDATED_AT)) $criteria->add(PositionMilestonePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(PositionMilestonePeer::DELETED_AT)) $criteria->add(PositionMilestonePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(PositionMilestonePeer::CREATED_AT)) $criteria->add(PositionMilestonePeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PositionMilestonePeer::DATABASE_NAME);

		$criteria->add(PositionMilestonePeer::ID, $this->id);

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

		$copyObj->setPositionId($this->position_id);

		$copyObj->setTitle($this->title);

		$copyObj->setDescription($this->description);

		$copyObj->setDeliverables($this->deliverables);

		$copyObj->setDeadline($this->deadline);

		$copyObj->setStatus($this->status);

		$copyObj->setRank($this->rank);

		$copyObj->setFilled($this->filled);

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
			self::$peer = new PositionMilestonePeer();
		}
		return self::$peer;
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
    if (!$callable = sfMixer::getCallable('BasePositionMilestone:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePositionMilestone::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 