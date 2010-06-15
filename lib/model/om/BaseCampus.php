<?php


abstract class BaseCampus extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $name;


	
	protected $slug;


	
	protected $address;


	
	protected $city;


	
	protected $state;


	
	protected $zip;


	
	protected $url;


	
	protected $phone;


	
	protected $email;


	
	protected $about;


	
	protected $version;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $collsfGuardUserProfiles;

	
	protected $lastsfGuardUserProfileCriteria = null;

	
	protected $collProjects;

	
	protected $lastProjectCriteria = null;

	
	protected $collProjectApplications;

	
	protected $lastProjectApplicationCriteria = null;

	
	protected $collProjectPositions;

	
	protected $lastProjectPositionCriteria = null;

	
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

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getAddress()
	{

		return $this->address;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getZip()
	{

		return $this->zip;
	}

	
	public function getUrl()
	{

		return $this->url;
	}

	
	public function getPhone()
	{

		return $this->phone;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getAbout()
	{

		return $this->about;
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
			$this->modifiedColumns[] = CampusPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = CampusPeer::UUID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = CampusPeer::NAME;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = CampusPeer::SLUG;
		}

	} 
	
	public function setAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = CampusPeer::ADDRESS;
		}

	} 
	
	public function setCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = CampusPeer::CITY;
		}

	} 
	
	public function setState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = CampusPeer::STATE;
		}

	} 
	
	public function setZip($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->zip !== $v) {
			$this->zip = $v;
			$this->modifiedColumns[] = CampusPeer::ZIP;
		}

	} 
	
	public function setUrl($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = CampusPeer::URL;
		}

	} 
	
	public function setPhone($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = CampusPeer::PHONE;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = CampusPeer::EMAIL;
		}

	} 
	
	public function setAbout($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->about !== $v) {
			$this->about = $v;
			$this->modifiedColumns[] = CampusPeer::ABOUT;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = CampusPeer::VERSION;
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
			$this->modifiedColumns[] = CampusPeer::DELETED_AT;
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
			$this->modifiedColumns[] = CampusPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->slug = $rs->getString($startcol + 3);

			$this->address = $rs->getString($startcol + 4);

			$this->city = $rs->getString($startcol + 5);

			$this->state = $rs->getString($startcol + 6);

			$this->zip = $rs->getString($startcol + 7);

			$this->url = $rs->getString($startcol + 8);

			$this->phone = $rs->getString($startcol + 9);

			$this->email = $rs->getString($startcol + 10);

			$this->about = $rs->getString($startcol + 11);

			$this->version = $rs->getInt($startcol + 12);

			$this->deleted_at = $rs->getTimestamp($startcol + 13, null);

			$this->created_at = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Campus object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseCampus:delete:pre') as $callable)
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
			$con = Propel::getConnection(CampusPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CampusPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseCampus:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseCampus:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(CampusPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CampusPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseCampus:save:post') as $callable)
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
					$pk = CampusPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CampusPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfGuardUserProfiles !== null) {
				foreach($this->collsfGuardUserProfiles as $referrerFK) {
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

			if ($this->collProjectPositions !== null) {
				foreach($this->collProjectPositions as $referrerFK) {
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


			if (($retval = CampusPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardUserProfiles !== null) {
					foreach($this->collsfGuardUserProfiles as $referrerFK) {
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

				if ($this->collProjectPositions !== null) {
					foreach($this->collProjectPositions as $referrerFK) {
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
		$pos = CampusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSlug();
				break;
			case 4:
				return $this->getAddress();
				break;
			case 5:
				return $this->getCity();
				break;
			case 6:
				return $this->getState();
				break;
			case 7:
				return $this->getZip();
				break;
			case 8:
				return $this->getUrl();
				break;
			case 9:
				return $this->getPhone();
				break;
			case 10:
				return $this->getEmail();
				break;
			case 11:
				return $this->getAbout();
				break;
			case 12:
				return $this->getVersion();
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
		$keys = CampusPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getSlug(),
			$keys[4] => $this->getAddress(),
			$keys[5] => $this->getCity(),
			$keys[6] => $this->getState(),
			$keys[7] => $this->getZip(),
			$keys[8] => $this->getUrl(),
			$keys[9] => $this->getPhone(),
			$keys[10] => $this->getEmail(),
			$keys[11] => $this->getAbout(),
			$keys[12] => $this->getVersion(),
			$keys[13] => $this->getDeletedAt(),
			$keys[14] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CampusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSlug($value);
				break;
			case 4:
				$this->setAddress($value);
				break;
			case 5:
				$this->setCity($value);
				break;
			case 6:
				$this->setState($value);
				break;
			case 7:
				$this->setZip($value);
				break;
			case 8:
				$this->setUrl($value);
				break;
			case 9:
				$this->setPhone($value);
				break;
			case 10:
				$this->setEmail($value);
				break;
			case 11:
				$this->setAbout($value);
				break;
			case 12:
				$this->setVersion($value);
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
		$keys = CampusPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSlug($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAddress($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCity($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setState($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setZip($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUrl($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPhone($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAbout($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setVersion($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDeletedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedAt($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CampusPeer::DATABASE_NAME);

		if ($this->isColumnModified(CampusPeer::ID)) $criteria->add(CampusPeer::ID, $this->id);
		if ($this->isColumnModified(CampusPeer::UUID)) $criteria->add(CampusPeer::UUID, $this->uuid);
		if ($this->isColumnModified(CampusPeer::NAME)) $criteria->add(CampusPeer::NAME, $this->name);
		if ($this->isColumnModified(CampusPeer::SLUG)) $criteria->add(CampusPeer::SLUG, $this->slug);
		if ($this->isColumnModified(CampusPeer::ADDRESS)) $criteria->add(CampusPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(CampusPeer::CITY)) $criteria->add(CampusPeer::CITY, $this->city);
		if ($this->isColumnModified(CampusPeer::STATE)) $criteria->add(CampusPeer::STATE, $this->state);
		if ($this->isColumnModified(CampusPeer::ZIP)) $criteria->add(CampusPeer::ZIP, $this->zip);
		if ($this->isColumnModified(CampusPeer::URL)) $criteria->add(CampusPeer::URL, $this->url);
		if ($this->isColumnModified(CampusPeer::PHONE)) $criteria->add(CampusPeer::PHONE, $this->phone);
		if ($this->isColumnModified(CampusPeer::EMAIL)) $criteria->add(CampusPeer::EMAIL, $this->email);
		if ($this->isColumnModified(CampusPeer::ABOUT)) $criteria->add(CampusPeer::ABOUT, $this->about);
		if ($this->isColumnModified(CampusPeer::VERSION)) $criteria->add(CampusPeer::VERSION, $this->version);
		if ($this->isColumnModified(CampusPeer::DELETED_AT)) $criteria->add(CampusPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(CampusPeer::CREATED_AT)) $criteria->add(CampusPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CampusPeer::DATABASE_NAME);

		$criteria->add(CampusPeer::ID, $this->id);

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

		$copyObj->setSlug($this->slug);

		$copyObj->setAddress($this->address);

		$copyObj->setCity($this->city);

		$copyObj->setState($this->state);

		$copyObj->setZip($this->zip);

		$copyObj->setUrl($this->url);

		$copyObj->setPhone($this->phone);

		$copyObj->setEmail($this->email);

		$copyObj->setAbout($this->about);

		$copyObj->setVersion($this->version);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfGuardUserProfiles() as $relObj) {
				$copyObj->addsfGuardUserProfile($relObj->copy($deepCopy));
			}

			foreach($this->getProjects() as $relObj) {
				$copyObj->addProject($relObj->copy($deepCopy));
			}

			foreach($this->getProjectApplications() as $relObj) {
				$copyObj->addProjectApplication($relObj->copy($deepCopy));
			}

			foreach($this->getProjectPositions() as $relObj) {
				$copyObj->addProjectPosition($relObj->copy($deepCopy));
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
			self::$peer = new CampusPeer();
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

				$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

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

		$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfile(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfiles[] = $l;
		$l->setCampus($this);
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

				$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinsfGuardUser($criteria, $con);
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

				$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinDepartment($criteria, $con);
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

				$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinSubdepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinSubdepartment($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
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

				$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjects = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

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

		$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProject(Project $l)
	{
		$this->collProjects[] = $l;
		$l->setCampus($this);
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

				$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

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

				$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		}
		$this->lastProjectCriteria = $criteria;

		return $this->collProjects;
	}


	
	public function getProjectsJoinDepartment($criteria = null, $con = null)
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

				$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

				$this->collProjects = ProjectPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastProjectCriteria) || !$this->lastProjectCriteria->equals($criteria)) {
				$this->collProjects = ProjectPeer::doSelectJoinDepartment($criteria, $con);
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

				$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				$this->collProjectApplications = ProjectApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

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

		$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

		return ProjectApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectApplication(ProjectApplication $l)
	{
		$this->collProjectApplications[] = $l;
		$l->setCampus($this);
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

				$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

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

				$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastProjectApplicationCriteria) || !$this->lastProjectApplicationCriteria->equals($criteria)) {
				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinsfGuardUserRelatedByOwnerId($criteria, $con);
			}
		}
		$this->lastProjectApplicationCriteria = $criteria;

		return $this->collProjectApplications;
	}


	
	public function getProjectApplicationsJoinDepartment($criteria = null, $con = null)
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

				$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->getId());

			if (!isset($this->lastProjectApplicationCriteria) || !$this->lastProjectApplicationCriteria->equals($criteria)) {
				$this->collProjectApplications = ProjectApplicationPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastProjectApplicationCriteria = $criteria;

		return $this->collProjectApplications;
	}

	
	public function initProjectPositions()
	{
		if ($this->collProjectPositions === null) {
			$this->collProjectPositions = array();
		}
	}

	
	public function getProjectPositions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPositionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectPositions === null) {
			if ($this->isNew()) {
			   $this->collProjectPositions = array();
			} else {

				$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

				ProjectPositionPeer::addSelectColumns($criteria);
				$this->collProjectPositions = ProjectPositionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

				ProjectPositionPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
					$this->collProjectPositions = ProjectPositionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectPositionCriteria = $criteria;
		return $this->collProjectPositions;
	}

	
	public function countProjectPositions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPositionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

		return ProjectPositionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectPosition(ProjectPosition $l)
	{
		$this->collProjectPositions[] = $l;
		$l->setCampus($this);
	}


	
	public function getProjectPositionsJoinProject($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPositionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectPositions === null) {
			if ($this->isNew()) {
				$this->collProjectPositions = array();
			} else {

				$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

			if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastProjectPositionCriteria = $criteria;

		return $this->collProjectPositions;
	}


	
	public function getProjectPositionsJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPositionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectPositions === null) {
			if ($this->isNew()) {
				$this->collProjectPositions = array();
			} else {

				$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->getId());

			if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastProjectPositionCriteria = $criteria;

		return $this->collProjectPositions;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseCampus:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseCampus::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 