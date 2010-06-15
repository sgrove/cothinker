<?php


abstract class BaseCoForm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $owner_id;


	
	protected $name;


	
	protected $slug;


	
	protected $description;


	
	protected $status;


	
	protected $type;


	
	protected $created_at;


	
	protected $deleted_at;


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $collCoFields;

	
	protected $lastCoFieldCriteria = null;

	
	protected $collCoFormApplications;

	
	protected $lastCoFormApplicationCriteria = null;

	
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

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getType()
	{

		return $this->type;
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
			$this->modifiedColumns[] = CoFormPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = CoFormPeer::UUID;
		}

	} 
	
	public function setOwnerId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = CoFormPeer::OWNER_ID;
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
			$this->modifiedColumns[] = CoFormPeer::NAME;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = CoFormPeer::SLUG;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = CoFormPeer::DESCRIPTION;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CoFormPeer::STATUS;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = CoFormPeer::TYPE;
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
			$this->modifiedColumns[] = CoFormPeer::CREATED_AT;
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
			$this->modifiedColumns[] = CoFormPeer::DELETED_AT;
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
			$this->modifiedColumns[] = CoFormPeer::UPDATED_AT;
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

			$this->status = $rs->getInt($startcol + 6);

			$this->type = $rs->getInt($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 9, null);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CoForm object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoForm:delete:pre') as $callable)
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
			$con = Propel::getConnection(CoFormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CoFormPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseCoForm:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseCoForm:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(CoFormPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CoFormPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CoFormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseCoForm:save:post') as $callable)
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
					$pk = CoFormPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CoFormPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCoFields !== null) {
				foreach($this->collCoFields as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCoFormApplications !== null) {
				foreach($this->collCoFormApplications as $referrerFK) {
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


												
			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = CoFormPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCoFields !== null) {
					foreach($this->collCoFields as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCoFormApplications !== null) {
					foreach($this->collCoFormApplications as $referrerFK) {
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
		$pos = CoFormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getStatus();
				break;
			case 7:
				return $this->getType();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getDeletedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoFormPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getOwnerId(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getSlug(),
			$keys[5] => $this->getDescription(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getType(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getDeletedAt(),
			$keys[10] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CoFormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setStatus($value);
				break;
			case 7:
				$this->setType($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setDeletedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CoFormPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOwnerId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSlug($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeletedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CoFormPeer::DATABASE_NAME);

		if ($this->isColumnModified(CoFormPeer::ID)) $criteria->add(CoFormPeer::ID, $this->id);
		if ($this->isColumnModified(CoFormPeer::UUID)) $criteria->add(CoFormPeer::UUID, $this->uuid);
		if ($this->isColumnModified(CoFormPeer::OWNER_ID)) $criteria->add(CoFormPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(CoFormPeer::NAME)) $criteria->add(CoFormPeer::NAME, $this->name);
		if ($this->isColumnModified(CoFormPeer::SLUG)) $criteria->add(CoFormPeer::SLUG, $this->slug);
		if ($this->isColumnModified(CoFormPeer::DESCRIPTION)) $criteria->add(CoFormPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(CoFormPeer::STATUS)) $criteria->add(CoFormPeer::STATUS, $this->status);
		if ($this->isColumnModified(CoFormPeer::TYPE)) $criteria->add(CoFormPeer::TYPE, $this->type);
		if ($this->isColumnModified(CoFormPeer::CREATED_AT)) $criteria->add(CoFormPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CoFormPeer::DELETED_AT)) $criteria->add(CoFormPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(CoFormPeer::UPDATED_AT)) $criteria->add(CoFormPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CoFormPeer::DATABASE_NAME);

		$criteria->add(CoFormPeer::ID, $this->id);

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

		$copyObj->setStatus($this->status);

		$copyObj->setType($this->type);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCoFields() as $relObj) {
				$copyObj->addCoField($relObj->copy($deepCopy));
			}

			foreach($this->getCoFormApplications() as $relObj) {
				$copyObj->addCoFormApplication($relObj->copy($deepCopy));
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
			self::$peer = new CoFormPeer();
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

	
	public function initCoFields()
	{
		if ($this->collCoFields === null) {
			$this->collCoFields = array();
		}
	}

	
	public function getCoFields($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoFieldPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoFields === null) {
			if ($this->isNew()) {
			   $this->collCoFields = array();
			} else {

				$criteria->add(CoFieldPeer::FORM_ID, $this->getId());

				CoFieldPeer::addSelectColumns($criteria);
				$this->collCoFields = CoFieldPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoFieldPeer::FORM_ID, $this->getId());

				CoFieldPeer::addSelectColumns($criteria);
				if (!isset($this->lastCoFieldCriteria) || !$this->lastCoFieldCriteria->equals($criteria)) {
					$this->collCoFields = CoFieldPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCoFieldCriteria = $criteria;
		return $this->collCoFields;
	}

	
	public function countCoFields($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCoFieldPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CoFieldPeer::FORM_ID, $this->getId());

		return CoFieldPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoField(CoField $l)
	{
		$this->collCoFields[] = $l;
		$l->setCoForm($this);
	}

	
	public function initCoFormApplications()
	{
		if ($this->collCoFormApplications === null) {
			$this->collCoFormApplications = array();
		}
	}

	
	public function getCoFormApplications($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoFormApplications === null) {
			if ($this->isNew()) {
			   $this->collCoFormApplications = array();
			} else {

				$criteria->add(CoFormApplicationPeer::FORM_ID, $this->getId());

				CoFormApplicationPeer::addSelectColumns($criteria);
				$this->collCoFormApplications = CoFormApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoFormApplicationPeer::FORM_ID, $this->getId());

				CoFormApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastCoFormApplicationCriteria) || !$this->lastCoFormApplicationCriteria->equals($criteria)) {
					$this->collCoFormApplications = CoFormApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCoFormApplicationCriteria = $criteria;
		return $this->collCoFormApplications;
	}

	
	public function countCoFormApplications($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CoFormApplicationPeer::FORM_ID, $this->getId());

		return CoFormApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoFormApplication(CoFormApplication $l)
	{
		$this->collCoFormApplications[] = $l;
		$l->setCoForm($this);
	}


	
	public function getCoFormApplicationsJoinProjectPosition($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoFormApplications === null) {
			if ($this->isNew()) {
				$this->collCoFormApplications = array();
			} else {

				$criteria->add(CoFormApplicationPeer::FORM_ID, $this->getId());

				$this->collCoFormApplications = CoFormApplicationPeer::doSelectJoinProjectPosition($criteria, $con);
			}
		} else {
									
			$criteria->add(CoFormApplicationPeer::FORM_ID, $this->getId());

			if (!isset($this->lastCoFormApplicationCriteria) || !$this->lastCoFormApplicationCriteria->equals($criteria)) {
				$this->collCoFormApplications = CoFormApplicationPeer::doSelectJoinProjectPosition($criteria, $con);
			}
		}
		$this->lastCoFormApplicationCriteria = $criteria;

		return $this->collCoFormApplications;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseCoForm:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseCoForm::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 