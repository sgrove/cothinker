<?php


abstract class BaseDepartment extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $name;


	
	protected $abbreviation;


	
	protected $slug;


	
	protected $version;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $collsfGuardUserProfiles;

	
	protected $lastsfGuardUserProfileCriteria = null;

	
	protected $collSubdepartments;

	
	protected $lastSubdepartmentCriteria = null;

	
	protected $collProjects;

	
	protected $lastProjectCriteria = null;

	
	protected $collProjectApplications;

	
	protected $lastProjectApplicationCriteria = null;

	
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

	
	public function getVersion()
	{

		return $this->version;
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
			$this->modifiedColumns[] = DepartmentPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = DepartmentPeer::UUID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DepartmentPeer::NAME;
		}

	} 
	
	public function setAbbreviation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->abbreviation !== $v) {
			$this->abbreviation = $v;
			$this->modifiedColumns[] = DepartmentPeer::ABBREVIATION;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = DepartmentPeer::SLUG;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = DepartmentPeer::VERSION;
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
			$this->modifiedColumns[] = DepartmentPeer::DELETED_AT;
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
			$this->modifiedColumns[] = DepartmentPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->abbreviation = $rs->getString($startcol + 3);

			$this->slug = $rs->getString($startcol + 4);

			$this->version = $rs->getInt($startcol + 5);

			$this->deleted_at = $rs->getTimestamp($startcol + 6, null);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Department object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseDepartment:delete:pre') as $callable)
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
			$con = Propel::getConnection(DepartmentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DepartmentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseDepartment:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseDepartment:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(DepartmentPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DepartmentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseDepartment:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DepartmentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DepartmentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfGuardUserProfiles !== null) {
				foreach($this->collsfGuardUserProfiles as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSubdepartments !== null) {
				foreach($this->collSubdepartments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjects !== null) {
				foreach($this->collProjects as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectApplications !== null) {
				foreach($this->collProjectApplications as $referrerFK) {
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


			if (($retval = DepartmentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardUserProfiles !== null) {
					foreach($this->collsfGuardUserProfiles as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSubdepartments !== null) {
					foreach($this->collSubdepartments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjects !== null) {
					foreach($this->collProjects as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectApplications !== null) {
					foreach($this->collProjectApplications as $referrerFK) {
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
		$pos = DepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 3:
				return $this->getAbbreviation();
				break;
			case 4:
				return $this->getSlug();
				break;
			case 5:
				return $this->getVersion();
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
		$keys = DepartmentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getAbbreviation(),
			$keys[4] => $this->getSlug(),
			$keys[5] => $this->getVersion(),
			$keys[6] => $this->getDeletedAt(),
			$keys[7] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 3:
				$this->setAbbreviation($value);
				break;
			case 4:
				$this->setSlug($value);
				break;
			case 5:
				$this->setVersion($value);
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
		$keys = DepartmentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAbbreviation($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSlug($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVersion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDeletedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DepartmentPeer::DATABASE_NAME);

		if ($this->isColumnModified(DepartmentPeer::ID)) $criteria->add(DepartmentPeer::ID, $this->id);
		if ($this->isColumnModified(DepartmentPeer::UUID)) $criteria->add(DepartmentPeer::UUID, $this->uuid);
		if ($this->isColumnModified(DepartmentPeer::NAME)) $criteria->add(DepartmentPeer::NAME, $this->name);
		if ($this->isColumnModified(DepartmentPeer::ABBREVIATION)) $criteria->add(DepartmentPeer::ABBREVIATION, $this->abbreviation);
		if ($this->isColumnModified(DepartmentPeer::SLUG)) $criteria->add(DepartmentPeer::SLUG, $this->slug);
		if ($this->isColumnModified(DepartmentPeer::VERSION)) $criteria->add(DepartmentPeer::VERSION, $this->version);
		if ($this->isColumnModified(DepartmentPeer::DELETED_AT)) $criteria->add(DepartmentPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(DepartmentPeer::CREATED_AT)) $criteria->add(DepartmentPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DepartmentPeer::DATABASE_NAME);

		$criteria->add(DepartmentPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setAbbreviation($this->abbreviation);

		$copyObj->setSlug($this->slug);

		$copyObj->setVersion($this->version);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfGuardUserProfiles() as $relObj) {
				$copyObj->addsfGuardUserProfile($relObj->copy($deepCopy));
			}

			foreach($this->getSubdepartments() as $relObj) {
				$copyObj->addSubdepartment($relObj->copy($deepCopy));
			}

			foreach($this->getProjects() as $relObj) {
				$copyObj->addProject($relObj->copy($deepCopy));
			}

			foreach($this->getProjectApplications() as $relObj) {
				$copyObj->addProjectApplication($relObj->copy($deepCopy));
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
			self::$peer = new DepartmentPeer();
		}
		return self::$peer;
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

				$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

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

		$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfile(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfiles[] = $l;
		$l->setDepartment($this);
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

				$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

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

				$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}


	
	public function getsfGuardUserProfilesJoinSubdepartment($criteria = null, $con = null)
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

				$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinSubdepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinSubdepartment($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}

	
	public function initSubdepartments()
	{
		if ($this->collSubdepartments === null) {
			$this->collSubdepartments = array();
		}
	}

	
	public function getSubdepartments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSubdepartmentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSubdepartments === null) {
			if ($this->isNew()) {
			   $this->collSubdepartments = array();
			} else {

				$criteria->add(SubdepartmentPeer::DEPARTMENT_ID, $this->getId());

				SubdepartmentPeer::addSelectColumns($criteria);
				$this->collSubdepartments = SubdepartmentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SubdepartmentPeer::DEPARTMENT_ID, $this->getId());

				SubdepartmentPeer::addSelectColumns($criteria);
				if (!isset($this->lastSubdepartmentCriteria) || !$this->lastSubdepartmentCriteria->equals($criteria)) {
					$this->collSubdepartments = SubdepartmentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSubdepartmentCriteria = $criteria;
		return $this->collSubdepartments;
	}

	
	public function countSubdepartments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSubdepartmentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SubdepartmentPeer::DEPARTMENT_ID, $this->getId());

		return SubdepartmentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSubdepartment(Subdepartment $l)
	{
		$this->collSubdepartments[] = $l;
		$l->setDepartment($this);
	}

	
	public function initProjects()
	{
		if ($this->collProjects === null) {
			$this->collProjects = array();
		}
	}

	
	public function getProjects($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
			   $this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjects = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
					$this->collProjects = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectCriteria = $criteria;
		return $this->collProjects;
	}

	
	public function countProjects($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProject(Project $l)
	{
		$this->collProjects[] = $l;
		$l->setDepartment($this);
	}


	
	public function getProjectsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinsfGuardUserRelatedByOwnerId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjects === null) {
			if ($this->isNew()) {
				$this->collProjects = array();
			} else {

				$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}

	
	public function initProjectApplications()
	{
		if ($this->collProjectApplications === null) {
			$this->collProjectApplications = array();
		}
	}

	
	public function getProjectApplications($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplications === null) {
			if ($this->isNew()) {
			   $this->collProjectApplications = array();
			} else {

				$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				$this->collProjectApplications = ProjectApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectApplicationCriteria) || !$this->lastProjectApplicationCriteria->equals($criteria)) {
					$this->collProjectApplications = ProjectApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectApplicationCriteria = $criteria;
		return $this->collProjectApplications;
	}

	
	public function countProjectApplications($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

		return ProjectApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectApplication(ProjectApplication $l)
	{
		$this->collProjectApplications[] = $l;
		$l->setDepartment($this);
	}


	
	public function getProjectApplicationsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplications === null) {
			if ($this->isNew()) {
				$this->collProjectApplications = array();
			} else {

				$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastProjectApplicationCriteria) || !$this->lastProjectApplicationCriteria->equals($criteria)) {
				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastProjectApplicationCriteria = $criteria;

		return $this->collProjectApplications;
	}


	
	public function getProjectApplicationsJoinsfGuardUserRelatedByOwnerId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplications === null) {
			if ($this->isNew()) {
				$this->collProjectApplications = array();
			} else {

				$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastProjectApplicationCriteria) || !$this->lastProjectApplicationCriteria->equals($criteria)) {
				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		}
		$this->lastProjectApplicationCriteria = $criteria;

		return $this->collProjectApplications;
	}


	
	public function getProjectApplicationsJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplications === null) {
			if ($this->isNew()) {
				$this->collProjectApplications = array();
			} else {

				$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastProjectApplicationCriteria) || !$this->lastProjectApplicationCriteria->equals($criteria)) {
				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectApplicationCriteria = $criteria;

		return $this->collProjectApplications;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseDepartment:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDepartment::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 