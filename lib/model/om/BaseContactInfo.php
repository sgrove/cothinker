<?php


abstract class BaseContactInfo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $uuid;


	
	protected $title;


	
	protected $email;


	
	protected $phone;


	
	protected $address1;


	
	protected $address2;


	
	protected $city;


	
	protected $state;


	
	protected $postal;


	
	protected $published;


	
	protected $privacy_level;


	
	protected $deleted_at;


	
	protected $version;


	
	protected $updated_at;


	
	protected $created_at;


	
	protected $id;

	
	protected $asfGuardUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getUuid()
	{

		return $this->uuid;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getPhone()
	{

		return $this->phone;
	}

	
	public function getAddress1()
	{

		return $this->address1;
	}

	
	public function getAddress2()
	{

		return $this->address2;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getPostal()
	{

		return $this->postal;
	}

	
	public function getPublished()
	{

		return $this->published;
	}

	
	public function getPrivacyLevel()
	{

		return $this->privacy_level;
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

	
	public function getVersion()
	{

		return $this->version;
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

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = ContactInfoPeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = ContactInfoPeer::UUID;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ContactInfoPeer::TITLE;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ContactInfoPeer::EMAIL;
		}

	} 
	
	public function setPhone($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = ContactInfoPeer::PHONE;
		}

	} 
	
	public function setAddress1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address1 !== $v) {
			$this->address1 = $v;
			$this->modifiedColumns[] = ContactInfoPeer::ADDRESS1;
		}

	} 
	
	public function setAddress2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address2 !== $v) {
			$this->address2 = $v;
			$this->modifiedColumns[] = ContactInfoPeer::ADDRESS2;
		}

	} 
	
	public function setCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = ContactInfoPeer::CITY;
		}

	} 
	
	public function setState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = ContactInfoPeer::STATE;
		}

	} 
	
	public function setPostal($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->postal !== $v) {
			$this->postal = $v;
			$this->modifiedColumns[] = ContactInfoPeer::POSTAL;
		}

	} 
	
	public function setPublished($v)
	{

		if ($this->published !== $v) {
			$this->published = $v;
			$this->modifiedColumns[] = ContactInfoPeer::PUBLISHED;
		}

	} 
	
	public function setPrivacyLevel($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->privacy_level !== $v) {
			$this->privacy_level = $v;
			$this->modifiedColumns[] = ContactInfoPeer::PRIVACY_LEVEL;
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
			$this->modifiedColumns[] = ContactInfoPeer::DELETED_AT;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = ContactInfoPeer::VERSION;
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
			$this->modifiedColumns[] = ContactInfoPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = ContactInfoPeer::CREATED_AT;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContactInfoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->email = $rs->getString($startcol + 3);

			$this->phone = $rs->getString($startcol + 4);

			$this->address1 = $rs->getString($startcol + 5);

			$this->address2 = $rs->getString($startcol + 6);

			$this->city = $rs->getString($startcol + 7);

			$this->state = $rs->getString($startcol + 8);

			$this->postal = $rs->getString($startcol + 9);

			$this->published = $rs->getBoolean($startcol + 10);

			$this->privacy_level = $rs->getInt($startcol + 11);

			$this->deleted_at = $rs->getTimestamp($startcol + 12, null);

			$this->version = $rs->getInt($startcol + 13);

			$this->updated_at = $rs->getTimestamp($startcol + 14, null);

			$this->created_at = $rs->getTimestamp($startcol + 15, null);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ContactInfo object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfo:delete:pre') as $callable)
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
			$con = Propel::getConnection(ContactInfoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContactInfoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseContactInfo:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseContactInfo:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(ContactInfoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(ContactInfoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContactInfoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseContactInfo:save:post') as $callable)
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
					$pk = ContactInfoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContactInfoPeer::doUpdate($this, $con);
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


			if (($retval = ContactInfoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContactInfoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getUuid();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getEmail();
				break;
			case 4:
				return $this->getPhone();
				break;
			case 5:
				return $this->getAddress1();
				break;
			case 6:
				return $this->getAddress2();
				break;
			case 7:
				return $this->getCity();
				break;
			case 8:
				return $this->getState();
				break;
			case 9:
				return $this->getPostal();
				break;
			case 10:
				return $this->getPublished();
				break;
			case 11:
				return $this->getPrivacyLevel();
				break;
			case 12:
				return $this->getDeletedAt();
				break;
			case 13:
				return $this->getVersion();
				break;
			case 14:
				return $this->getUpdatedAt();
				break;
			case 15:
				return $this->getCreatedAt();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContactInfoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getEmail(),
			$keys[4] => $this->getPhone(),
			$keys[5] => $this->getAddress1(),
			$keys[6] => $this->getAddress2(),
			$keys[7] => $this->getCity(),
			$keys[8] => $this->getState(),
			$keys[9] => $this->getPostal(),
			$keys[10] => $this->getPublished(),
			$keys[11] => $this->getPrivacyLevel(),
			$keys[12] => $this->getDeletedAt(),
			$keys[13] => $this->getVersion(),
			$keys[14] => $this->getUpdatedAt(),
			$keys[15] => $this->getCreatedAt(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContactInfoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setUuid($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setEmail($value);
				break;
			case 4:
				$this->setPhone($value);
				break;
			case 5:
				$this->setAddress1($value);
				break;
			case 6:
				$this->setAddress2($value);
				break;
			case 7:
				$this->setCity($value);
				break;
			case 8:
				$this->setState($value);
				break;
			case 9:
				$this->setPostal($value);
				break;
			case 10:
				$this->setPublished($value);
				break;
			case 11:
				$this->setPrivacyLevel($value);
				break;
			case 12:
				$this->setDeletedAt($value);
				break;
			case 13:
				$this->setVersion($value);
				break;
			case 14:
				$this->setUpdatedAt($value);
				break;
			case 15:
				$this->setCreatedAt($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContactInfoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPhone($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAddress1($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAddress2($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCity($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setState($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPostal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPublished($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPrivacyLevel($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDeletedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setVersion($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContactInfoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContactInfoPeer::USER_ID)) $criteria->add(ContactInfoPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(ContactInfoPeer::UUID)) $criteria->add(ContactInfoPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ContactInfoPeer::TITLE)) $criteria->add(ContactInfoPeer::TITLE, $this->title);
		if ($this->isColumnModified(ContactInfoPeer::EMAIL)) $criteria->add(ContactInfoPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ContactInfoPeer::PHONE)) $criteria->add(ContactInfoPeer::PHONE, $this->phone);
		if ($this->isColumnModified(ContactInfoPeer::ADDRESS1)) $criteria->add(ContactInfoPeer::ADDRESS1, $this->address1);
		if ($this->isColumnModified(ContactInfoPeer::ADDRESS2)) $criteria->add(ContactInfoPeer::ADDRESS2, $this->address2);
		if ($this->isColumnModified(ContactInfoPeer::CITY)) $criteria->add(ContactInfoPeer::CITY, $this->city);
		if ($this->isColumnModified(ContactInfoPeer::STATE)) $criteria->add(ContactInfoPeer::STATE, $this->state);
		if ($this->isColumnModified(ContactInfoPeer::POSTAL)) $criteria->add(ContactInfoPeer::POSTAL, $this->postal);
		if ($this->isColumnModified(ContactInfoPeer::PUBLISHED)) $criteria->add(ContactInfoPeer::PUBLISHED, $this->published);
		if ($this->isColumnModified(ContactInfoPeer::PRIVACY_LEVEL)) $criteria->add(ContactInfoPeer::PRIVACY_LEVEL, $this->privacy_level);
		if ($this->isColumnModified(ContactInfoPeer::DELETED_AT)) $criteria->add(ContactInfoPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ContactInfoPeer::VERSION)) $criteria->add(ContactInfoPeer::VERSION, $this->version);
		if ($this->isColumnModified(ContactInfoPeer::UPDATED_AT)) $criteria->add(ContactInfoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ContactInfoPeer::CREATED_AT)) $criteria->add(ContactInfoPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ContactInfoPeer::ID)) $criteria->add(ContactInfoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContactInfoPeer::DATABASE_NAME);

		$criteria->add(ContactInfoPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setUuid($this->uuid);

		$copyObj->setTitle($this->title);

		$copyObj->setEmail($this->email);

		$copyObj->setPhone($this->phone);

		$copyObj->setAddress1($this->address1);

		$copyObj->setAddress2($this->address2);

		$copyObj->setCity($this->city);

		$copyObj->setState($this->state);

		$copyObj->setPostal($this->postal);

		$copyObj->setPublished($this->published);

		$copyObj->setPrivacyLevel($this->privacy_level);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setVersion($this->version);

		$copyObj->setUpdatedAt($this->updated_at);

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
			self::$peer = new ContactInfoPeer();
		}
		return self::$peer;
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


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseContactInfo:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseContactInfo::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 