<?php


abstract class BaseCoField extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $form_id;


	
	protected $name;


	
	protected $slug;


	
	protected $description;


	
	protected $status;


	
	protected $type;


	
	protected $position;


	
	protected $created_at;


	
	protected $deleted_at;


	
	protected $updated_at;

	
	protected $aCoForm;

	
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

	
	public function getFormId()
	{

		return $this->form_id;
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

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getPosition()
	{

		return $this->position;
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
			$this->modifiedColumns[] = CoFieldPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = CoFieldPeer::UUID;
		}

	} 
	
	public function setFormId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->form_id !== $v) {
			$this->form_id = $v;
			$this->modifiedColumns[] = CoFieldPeer::FORM_ID;
		}

		if ($this->aCoForm !== null && $this->aCoForm->getId() !== $v) {
			$this->aCoForm = null;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = CoFieldPeer::NAME;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = CoFieldPeer::SLUG;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = CoFieldPeer::DESCRIPTION;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CoFieldPeer::STATUS;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = CoFieldPeer::TYPE;
		}

	} 
	
	public function setPosition($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->position !== $v) {
			$this->position = $v;
			$this->modifiedColumns[] = CoFieldPeer::POSITION;
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
			$this->modifiedColumns[] = CoFieldPeer::CREATED_AT;
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
			$this->modifiedColumns[] = CoFieldPeer::DELETED_AT;
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
			$this->modifiedColumns[] = CoFieldPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->form_id = $rs->getInt($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->slug = $rs->getString($startcol + 4);

			$this->description = $rs->getString($startcol + 5);

			$this->status = $rs->getInt($startcol + 6);

			$this->type = $rs->getInt($startcol + 7);

			$this->position = $rs->getInt($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CoField object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoField:delete:pre') as $callable)
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
			$con = Propel::getConnection(CoFieldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CoFieldPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseCoField:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoField:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(CoFieldPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CoFieldPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CoFieldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseCoField:save:post') as $callable)
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


												
			if ($this->aCoForm !== null) {
				if ($this->aCoForm->isModified()) {
					$affectedRows += $this->aCoForm->save($con);
				}
				$this->setCoForm($this->aCoForm);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CoFieldPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CoFieldPeer::doUpdate($this, $con);
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


												
			if ($this->aCoForm !== null) {
				if (!$this->aCoForm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCoForm->getValidationFailures());
				}
			}


			if (($retval = CoFieldPeer::doValidate($this, $columns)) !== true) {
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
		$pos = CoFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFormId();
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
				return $this->getStatus();
				break;
			case 7:
				return $this->getType();
				break;
			case 8:
				return $this->getPosition();
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
		$keys = CoFieldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getFormId(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getSlug(),
			$keys[5] => $this->getDescription(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getType(),
			$keys[8] => $this->getPosition(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getDeletedAt(),
			$keys[11] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFormId($value);
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
				$this->setStatus($value);
				break;
			case 7:
				$this->setType($value);
				break;
			case 8:
				$this->setPosition($value);
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
		$keys = CoFieldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFormId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSlug($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPosition($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDeletedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CoFieldPeer::DATABASE_NAME);

		if ($this->isColumnModified(CoFieldPeer::ID)) $criteria->add(CoFieldPeer::ID, $this->id);
		if ($this->isColumnModified(CoFieldPeer::UUID)) $criteria->add(CoFieldPeer::UUID, $this->uuid);
		if ($this->isColumnModified(CoFieldPeer::FORM_ID)) $criteria->add(CoFieldPeer::FORM_ID, $this->form_id);
		if ($this->isColumnModified(CoFieldPeer::NAME)) $criteria->add(CoFieldPeer::NAME, $this->name);
		if ($this->isColumnModified(CoFieldPeer::SLUG)) $criteria->add(CoFieldPeer::SLUG, $this->slug);
		if ($this->isColumnModified(CoFieldPeer::DESCRIPTION)) $criteria->add(CoFieldPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(CoFieldPeer::STATUS)) $criteria->add(CoFieldPeer::STATUS, $this->status);
		if ($this->isColumnModified(CoFieldPeer::TYPE)) $criteria->add(CoFieldPeer::TYPE, $this->type);
		if ($this->isColumnModified(CoFieldPeer::POSITION)) $criteria->add(CoFieldPeer::POSITION, $this->position);
		if ($this->isColumnModified(CoFieldPeer::CREATED_AT)) $criteria->add(CoFieldPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CoFieldPeer::DELETED_AT)) $criteria->add(CoFieldPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(CoFieldPeer::UPDATED_AT)) $criteria->add(CoFieldPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CoFieldPeer::DATABASE_NAME);

		$criteria->add(CoFieldPeer::ID, $this->id);

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

		$copyObj->setFormId($this->form_id);

		$copyObj->setName($this->name);

		$copyObj->setSlug($this->slug);

		$copyObj->setDescription($this->description);

		$copyObj->setStatus($this->status);

		$copyObj->setType($this->type);

		$copyObj->setPosition($this->position);

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
			self::$peer = new CoFieldPeer();
		}
		return self::$peer;
	}

	
	public function setCoForm($v)
	{


		if ($v === null) {
			$this->setFormId(NULL);
		} else {
			$this->setFormId($v->getId());
		}


		$this->aCoForm = $v;
	}


	
	public function getCoForm($con = null)
	{
		if ($this->aCoForm === null && ($this->form_id !== null)) {
						include_once 'lib/model/om/BaseCoFormPeer.php';

			$this->aCoForm = CoFormPeer::retrieveByPK($this->form_id, $con);

			
		}
		return $this->aCoForm;
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

				$criteria->add(CoApplicationFieldEntryPeer::FIELD_ID, $this->getId());

				CoApplicationFieldEntryPeer::addSelectColumns($criteria);
				$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoApplicationFieldEntryPeer::FIELD_ID, $this->getId());

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

		$criteria->add(CoApplicationFieldEntryPeer::FIELD_ID, $this->getId());

		return CoApplicationFieldEntryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoApplicationFieldEntry(CoApplicationFieldEntry $l)
	{
		$this->collCoApplicationFieldEntrys[] = $l;
		$l->setCoField($this);
	}


	
	public function getCoApplicationFieldEntrysJoinCoApplication($criteria = null, $con = null)
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

				$criteria->add(CoApplicationFieldEntryPeer::FIELD_ID, $this->getId());

				$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelectJoinCoApplication($criteria, $con);
			}
		} else {
									
			$criteria->add(CoApplicationFieldEntryPeer::FIELD_ID, $this->getId());

			if (!isset($this->lastCoApplicationFieldEntryCriteria) || !$this->lastCoApplicationFieldEntryCriteria->equals($criteria)) {
				$this->collCoApplicationFieldEntrys = CoApplicationFieldEntryPeer::doSelectJoinCoApplication($criteria, $con);
			}
		}
		$this->lastCoApplicationFieldEntryCriteria = $criteria;

		return $this->collCoApplicationFieldEntrys;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseCoField:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseCoField::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 