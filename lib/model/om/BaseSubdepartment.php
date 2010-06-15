<?php


abstract class BaseSubdepartment extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $department_id;


	
	protected $name;


	
	protected $abbreviation;


	
	protected $slug;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $aDepartment;

	
	protected $collsfGuardUserProfiles;

	
	protected $lastsfGuardUserProfileCriteria = null;

	
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

	
	public function getDepartmentId()
	{

		return $this->department_id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getAbbreviation()
	{

		return $this->abbreviation;
	}

	
	public function getSlug()
	{

		return $this->slug;
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
			$this->modifiedColumns[] = SubdepartmentPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = SubdepartmentPeer::UUID;
		}

	} 
	
	public function setDepartmentId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = SubdepartmentPeer::DEPARTMENT_ID;
		}

		if ($this->aDepartment !== null && $this->aDepartment->getId() !== $v) {
			$this->aDepartment = null;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SubdepartmentPeer::NAME;
		}

	} 
	
	public function setAbbreviation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->abbreviation !== $v) {
			$this->abbreviation = $v;
			$this->modifiedColumns[] = SubdepartmentPeer::ABBREVIATION;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = SubdepartmentPeer::SLUG;
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
			$this->modifiedColumns[] = SubdepartmentPeer::DELETED_AT;
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
			$this->modifiedColumns[] = SubdepartmentPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->department_id = $rs->getInt($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->abbreviation = $rs->getString($startcol + 4);

			$this->slug = $rs->getString($startcol + 5);

			$this->deleted_at = $rs->getTimestamp($startcol + 6, null);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Subdepartment object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartment:delete:pre') as $callable)
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
			$con = Propel::getConnection(SubdepartmentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SubdepartmentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSubdepartment:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSubdepartment:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(SubdepartmentPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SubdepartmentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSubdepartment:save:post') as $callable)
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


												
			if ($this->aDepartment !== null) {
				if ($this->aDepartment->isModified()) {
					$affectedRows += $this->aDepartment->save($con);
				}
				$this->setDepartment($this->aDepartment);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SubdepartmentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SubdepartmentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfGuardUserProfiles !== null) {
				foreach($this->collsfGuardUserProfiles as $referrerFK) {
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


												
			if ($this->aDepartment !== null) {
				if (!$this->aDepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
				}
			}


			if (($retval = SubdepartmentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardUserProfiles !== null) {
					foreach($this->collsfGuardUserProfiles as $referrerFK) {
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
		$pos = SubdepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDepartmentId();
				break;
			case 3:
				return $this->getName();
				break;
			case 4:
				return $this->getAbbreviation();
				break;
			case 5:
				return $this->getSlug();
				break;
			case 6:
				return $this->getDeletedAt();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SubdepartmentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getDepartmentId(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getAbbreviation(),
			$keys[5] => $this->getSlug(),
			$keys[6] => $this->getDeletedAt(),
			$keys[7] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SubdepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDepartmentId($value);
				break;
			case 3:
				$this->setName($value);
				break;
			case 4:
				$this->setAbbreviation($value);
				break;
			case 5:
				$this->setSlug($value);
				break;
			case 6:
				$this->setDeletedAt($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SubdepartmentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDepartmentId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAbbreviation($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSlug($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDeletedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SubdepartmentPeer::DATABASE_NAME);

		if ($this->isColumnModified(SubdepartmentPeer::ID)) $criteria->add(SubdepartmentPeer::ID, $this->id);
		if ($this->isColumnModified(SubdepartmentPeer::UUID)) $criteria->add(SubdepartmentPeer::UUID, $this->uuid);
		if ($this->isColumnModified(SubdepartmentPeer::DEPARTMENT_ID)) $criteria->add(SubdepartmentPeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(SubdepartmentPeer::NAME)) $criteria->add(SubdepartmentPeer::NAME, $this->name);
		if ($this->isColumnModified(SubdepartmentPeer::ABBREVIATION)) $criteria->add(SubdepartmentPeer::ABBREVIATION, $this->abbreviation);
		if ($this->isColumnModified(SubdepartmentPeer::SLUG)) $criteria->add(SubdepartmentPeer::SLUG, $this->slug);
		if ($this->isColumnModified(SubdepartmentPeer::DELETED_AT)) $criteria->add(SubdepartmentPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(SubdepartmentPeer::CREATED_AT)) $criteria->add(SubdepartmentPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SubdepartmentPeer::DATABASE_NAME);

		$criteria->add(SubdepartmentPeer::ID, $this->id);

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

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setName($this->name);

		$copyObj->setAbbreviation($this->abbreviation);

		$copyObj->setSlug($this->slug);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfGuardUserProfiles() as $relObj) {
				$copyObj->addsfGuardUserProfile($relObj->copy($deepCopy));
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
			self::$peer = new SubdepartmentPeer();
		}
		return self::$peer;
	}

	
	public function setDepartment($v)
	{


		if ($v === null) {
			$this->setDepartmentId(NULL);
		} else {
			$this->setDepartmentId($v->getId());
		}


		$this->aDepartment = $v;
	}


	
	public function getDepartment($con = null)
	{
		if ($this->aDepartment === null && ($this->department_id !== null)) {
						include_once 'lib/model/om/BaseDepartmentPeer.php';

			$this->aDepartment = DepartmentPeer::retrieveByPK($this->department_id, $con);

			
		}
		return $this->aDepartment;
	}

	
	public function initsfGuardUserProfiles()
	{
		if ($this->collsfGuardUserProfiles === null) {
			$this->collsfGuardUserProfiles = array();
		}
	}

	
	public function getsfGuardUserProfiles($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
					$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;
		return $this->collsfGuardUserProfiles;
	}

	
	public function countsfGuardUserProfiles($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfile(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfiles[] = $l;
		$l->setSubdepartment($this);
	}


	
	public function getsfGuardUserProfilesJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}


	
	public function getsfGuardUserProfilesJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}


	
	public function getsfGuardUserProfilesJoinDepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSubdepartment:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSubdepartment::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 