<?php


abstract class BasesfGuardUserProfile extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id;


	
	protected $uuid;


	
	protected $campus_id;


	
	protected $department_id;


	
	protected $subdepartment_id;


	
	protected $first_name;


	
	protected $last_name;


	
	protected $title;


	
	protected $gender;


	
	protected $about;


	
	protected $primary_email;


	
	protected $picture;


	
	protected $rating;


	
	protected $rating_count;


	
	protected $privacy_level;


	
	protected $private_key;


	
	protected $karma;


	
	protected $version;


	
	protected $is_approved;


	
	protected $token;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $asfGuardUser;

	
	protected $aCampus;

	
	protected $aDepartment;

	
	protected $aSubdepartment;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getUuid()
	{

		return $this->uuid;
	}

	
	public function getCampusId()
	{

		return $this->campus_id;
	}

	
	public function getDepartmentId()
	{

		return $this->department_id;
	}

	
	public function getSubdepartmentId()
	{

		return $this->subdepartment_id;
	}

	
	public function getFirstName()
	{

		return $this->first_name;
	}

	
	public function getLastName()
	{

		return $this->last_name;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getGender()
	{

		return $this->gender;
	}

	
	public function getAbout()
	{

		return $this->about;
	}

	
	public function getPrimaryEmail()
	{

		return $this->primary_email;
	}

	
	public function getPicture()
	{

		return $this->picture;
	}

	
	public function getRating()
	{

		return $this->rating;
	}

	
	public function getRatingCount()
	{

		return $this->rating_count;
	}

	
	public function getPrivacyLevel()
	{

		return $this->privacy_level;
	}

	
	public function getPrivateKey()
	{

		return $this->private_key;
	}

	
	public function getKarma()
	{

		return $this->karma;
	}

	
	public function getVersion()
	{

		return $this->version;
	}

	
	public function getIsApproved()
	{

		return $this->is_approved;
	}

	
	public function getToken()
	{

		return $this->token;
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
			$this->modifiedColumns[] = sfGuardUserProfilePeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::USER_ID;
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
			$this->modifiedColumns[] = sfGuardUserProfilePeer::UUID;
		}

	} 
	
	public function setCampusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->campus_id !== $v) {
			$this->campus_id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CAMPUS_ID;
		}

		if ($this->aCampus !== null && $this->aCampus->getId() !== $v) {
			$this->aCampus = null;
		}

	} 
	
	public function setDepartmentId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::DEPARTMENT_ID;
		}

		if ($this->aDepartment !== null && $this->aDepartment->getId() !== $v) {
			$this->aDepartment = null;
		}

	} 
	
	public function setSubdepartmentId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->subdepartment_id !== $v) {
			$this->subdepartment_id = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::SUBDEPARTMENT_ID;
		}

		if ($this->aSubdepartment !== null && $this->aSubdepartment->getId() !== $v) {
			$this->aSubdepartment = null;
		}

	} 
	
	public function setFirstName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::FIRST_NAME;
		}

	} 
	
	public function setLastName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::LAST_NAME;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::TITLE;
		}

	} 
	
	public function setGender($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::GENDER;
		}

	} 
	
	public function setAbout($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->about !== $v) {
			$this->about = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::ABOUT;
		}

	} 
	
	public function setPrimaryEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_email !== $v) {
			$this->primary_email = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PRIMARY_EMAIL;
		}

	} 
	
	public function setPicture($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->picture !== $v) {
			$this->picture = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PICTURE;
		}

	} 
	
	public function setRating($v)
	{

		if ($this->rating !== $v) {
			$this->rating = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::RATING;
		}

	} 
	
	public function setRatingCount($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rating_count !== $v) {
			$this->rating_count = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::RATING_COUNT;
		}

	} 
	
	public function setPrivacyLevel($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->privacy_level !== $v) {
			$this->privacy_level = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PRIVACY_LEVEL;
		}

	} 
	
	public function setPrivateKey($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->private_key !== $v) {
			$this->private_key = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::PRIVATE_KEY;
		}

	} 
	
	public function setKarma($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->karma !== $v) {
			$this->karma = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::KARMA;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::VERSION;
		}

	} 
	
	public function setIsApproved($v)
	{

		if ($this->is_approved !== $v) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::IS_APPROVED;
		}

	} 
	
	public function setToken($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->token !== $v) {
			$this->token = $v;
			$this->modifiedColumns[] = sfGuardUserProfilePeer::TOKEN;
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
			$this->modifiedColumns[] = sfGuardUserProfilePeer::UPDATED_AT;
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
			$this->modifiedColumns[] = sfGuardUserProfilePeer::DELETED_AT;
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
			$this->modifiedColumns[] = sfGuardUserProfilePeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->uuid = $rs->getString($startcol + 2);

			$this->campus_id = $rs->getInt($startcol + 3);

			$this->department_id = $rs->getInt($startcol + 4);

			$this->subdepartment_id = $rs->getInt($startcol + 5);

			$this->first_name = $rs->getString($startcol + 6);

			$this->last_name = $rs->getString($startcol + 7);

			$this->title = $rs->getString($startcol + 8);

			$this->gender = $rs->getInt($startcol + 9);

			$this->about = $rs->getString($startcol + 10);

			$this->primary_email = $rs->getString($startcol + 11);

			$this->picture = $rs->getString($startcol + 12);

			$this->rating = $rs->getFloat($startcol + 13);

			$this->rating_count = $rs->getInt($startcol + 14);

			$this->privacy_level = $rs->getInt($startcol + 15);

			$this->private_key = $rs->getString($startcol + 16);

			$this->karma = $rs->getInt($startcol + 17);

			$this->version = $rs->getInt($startcol + 18);

			$this->is_approved = $rs->getBoolean($startcol + 19);

			$this->token = $rs->getString($startcol + 20);

			$this->updated_at = $rs->getTimestamp($startcol + 21, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 22, null);

			$this->created_at = $rs->getTimestamp($startcol + 23, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 24; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardUserProfile object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfile:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardUserProfilePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfGuardUserProfile:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserProfile:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(sfGuardUserProfilePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(sfGuardUserProfilePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfGuardUserProfile:save:post') as $callable)
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

			if ($this->aCampus !== null) {
				if ($this->aCampus->isModified()) {
					$affectedRows += $this->aCampus->save($con);
				}
				$this->setCampus($this->aCampus);
			}

			if ($this->aDepartment !== null) {
				if ($this->aDepartment->isModified()) {
					$affectedRows += $this->aDepartment->save($con);
				}
				$this->setDepartment($this->aDepartment);
			}

			if ($this->aSubdepartment !== null) {
				if ($this->aSubdepartment->isModified()) {
					$affectedRows += $this->aSubdepartment->save($con);
				}
				$this->setSubdepartment($this->aSubdepartment);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfGuardUserProfilePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardUserProfilePeer::doUpdate($this, $con);
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

			if ($this->aCampus !== null) {
				if (!$this->aCampus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCampus->getValidationFailures());
				}
			}

			if ($this->aDepartment !== null) {
				if (!$this->aDepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
				}
			}

			if ($this->aSubdepartment !== null) {
				if (!$this->aSubdepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSubdepartment->getValidationFailures());
				}
			}


			if (($retval = sfGuardUserProfilePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getUuid();
				break;
			case 3:
				return $this->getCampusId();
				break;
			case 4:
				return $this->getDepartmentId();
				break;
			case 5:
				return $this->getSubdepartmentId();
				break;
			case 6:
				return $this->getFirstName();
				break;
			case 7:
				return $this->getLastName();
				break;
			case 8:
				return $this->getTitle();
				break;
			case 9:
				return $this->getGender();
				break;
			case 10:
				return $this->getAbout();
				break;
			case 11:
				return $this->getPrimaryEmail();
				break;
			case 12:
				return $this->getPicture();
				break;
			case 13:
				return $this->getRating();
				break;
			case 14:
				return $this->getRatingCount();
				break;
			case 15:
				return $this->getPrivacyLevel();
				break;
			case 16:
				return $this->getPrivateKey();
				break;
			case 17:
				return $this->getKarma();
				break;
			case 18:
				return $this->getVersion();
				break;
			case 19:
				return $this->getIsApproved();
				break;
			case 20:
				return $this->getToken();
				break;
			case 21:
				return $this->getUpdatedAt();
				break;
			case 22:
				return $this->getDeletedAt();
				break;
			case 23:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserProfilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getUuid(),
			$keys[3] => $this->getCampusId(),
			$keys[4] => $this->getDepartmentId(),
			$keys[5] => $this->getSubdepartmentId(),
			$keys[6] => $this->getFirstName(),
			$keys[7] => $this->getLastName(),
			$keys[8] => $this->getTitle(),
			$keys[9] => $this->getGender(),
			$keys[10] => $this->getAbout(),
			$keys[11] => $this->getPrimaryEmail(),
			$keys[12] => $this->getPicture(),
			$keys[13] => $this->getRating(),
			$keys[14] => $this->getRatingCount(),
			$keys[15] => $this->getPrivacyLevel(),
			$keys[16] => $this->getPrivateKey(),
			$keys[17] => $this->getKarma(),
			$keys[18] => $this->getVersion(),
			$keys[19] => $this->getIsApproved(),
			$keys[20] => $this->getToken(),
			$keys[21] => $this->getUpdatedAt(),
			$keys[22] => $this->getDeletedAt(),
			$keys[23] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setUuid($value);
				break;
			case 3:
				$this->setCampusId($value);
				break;
			case 4:
				$this->setDepartmentId($value);
				break;
			case 5:
				$this->setSubdepartmentId($value);
				break;
			case 6:
				$this->setFirstName($value);
				break;
			case 7:
				$this->setLastName($value);
				break;
			case 8:
				$this->setTitle($value);
				break;
			case 9:
				$this->setGender($value);
				break;
			case 10:
				$this->setAbout($value);
				break;
			case 11:
				$this->setPrimaryEmail($value);
				break;
			case 12:
				$this->setPicture($value);
				break;
			case 13:
				$this->setRating($value);
				break;
			case 14:
				$this->setRatingCount($value);
				break;
			case 15:
				$this->setPrivacyLevel($value);
				break;
			case 16:
				$this->setPrivateKey($value);
				break;
			case 17:
				$this->setKarma($value);
				break;
			case 18:
				$this->setVersion($value);
				break;
			case 19:
				$this->setIsApproved($value);
				break;
			case 20:
				$this->setToken($value);
				break;
			case 21:
				$this->setUpdatedAt($value);
				break;
			case 22:
				$this->setDeletedAt($value);
				break;
			case 23:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserProfilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUuid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCampusId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepartmentId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSubdepartmentId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFirstName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLastName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTitle($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setGender($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAbout($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPrimaryEmail($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPicture($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRating($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRatingCount($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPrivacyLevel($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPrivateKey($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setKarma($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setVersion($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setIsApproved($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setToken($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUpdatedAt($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDeletedAt($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCreatedAt($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserProfilePeer::ID)) $criteria->add(sfGuardUserProfilePeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::USER_ID)) $criteria->add(sfGuardUserProfilePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::UUID)) $criteria->add(sfGuardUserProfilePeer::UUID, $this->uuid);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CAMPUS_ID)) $criteria->add(sfGuardUserProfilePeer::CAMPUS_ID, $this->campus_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::DEPARTMENT_ID)) $criteria->add(sfGuardUserProfilePeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::SUBDEPARTMENT_ID)) $criteria->add(sfGuardUserProfilePeer::SUBDEPARTMENT_ID, $this->subdepartment_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::FIRST_NAME)) $criteria->add(sfGuardUserProfilePeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(sfGuardUserProfilePeer::LAST_NAME)) $criteria->add(sfGuardUserProfilePeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(sfGuardUserProfilePeer::TITLE)) $criteria->add(sfGuardUserProfilePeer::TITLE, $this->title);
		if ($this->isColumnModified(sfGuardUserProfilePeer::GENDER)) $criteria->add(sfGuardUserProfilePeer::GENDER, $this->gender);
		if ($this->isColumnModified(sfGuardUserProfilePeer::ABOUT)) $criteria->add(sfGuardUserProfilePeer::ABOUT, $this->about);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PRIMARY_EMAIL)) $criteria->add(sfGuardUserProfilePeer::PRIMARY_EMAIL, $this->primary_email);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PICTURE)) $criteria->add(sfGuardUserProfilePeer::PICTURE, $this->picture);
		if ($this->isColumnModified(sfGuardUserProfilePeer::RATING)) $criteria->add(sfGuardUserProfilePeer::RATING, $this->rating);
		if ($this->isColumnModified(sfGuardUserProfilePeer::RATING_COUNT)) $criteria->add(sfGuardUserProfilePeer::RATING_COUNT, $this->rating_count);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PRIVACY_LEVEL)) $criteria->add(sfGuardUserProfilePeer::PRIVACY_LEVEL, $this->privacy_level);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PRIVATE_KEY)) $criteria->add(sfGuardUserProfilePeer::PRIVATE_KEY, $this->private_key);
		if ($this->isColumnModified(sfGuardUserProfilePeer::KARMA)) $criteria->add(sfGuardUserProfilePeer::KARMA, $this->karma);
		if ($this->isColumnModified(sfGuardUserProfilePeer::VERSION)) $criteria->add(sfGuardUserProfilePeer::VERSION, $this->version);
		if ($this->isColumnModified(sfGuardUserProfilePeer::IS_APPROVED)) $criteria->add(sfGuardUserProfilePeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(sfGuardUserProfilePeer::TOKEN)) $criteria->add(sfGuardUserProfilePeer::TOKEN, $this->token);
		if ($this->isColumnModified(sfGuardUserProfilePeer::UPDATED_AT)) $criteria->add(sfGuardUserProfilePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(sfGuardUserProfilePeer::DELETED_AT)) $criteria->add(sfGuardUserProfilePeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(sfGuardUserProfilePeer::CREATED_AT)) $criteria->add(sfGuardUserProfilePeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(sfGuardUserProfilePeer::ID, $this->id);

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

		$copyObj->setCampusId($this->campus_id);

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setSubdepartmentId($this->subdepartment_id);

		$copyObj->setFirstName($this->first_name);

		$copyObj->setLastName($this->last_name);

		$copyObj->setTitle($this->title);

		$copyObj->setGender($this->gender);

		$copyObj->setAbout($this->about);

		$copyObj->setPrimaryEmail($this->primary_email);

		$copyObj->setPicture($this->picture);

		$copyObj->setRating($this->rating);

		$copyObj->setRatingCount($this->rating_count);

		$copyObj->setPrivacyLevel($this->privacy_level);

		$copyObj->setPrivateKey($this->private_key);

		$copyObj->setKarma($this->karma);

		$copyObj->setVersion($this->version);

		$copyObj->setIsApproved($this->is_approved);

		$copyObj->setToken($this->token);

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
			self::$peer = new sfGuardUserProfilePeer();
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

	
	public function setCampus($v)
	{


		if ($v === null) {
			$this->setCampusId(NULL);
		} else {
			$this->setCampusId($v->getId());
		}


		$this->aCampus = $v;
	}


	
	public function getCampus($con = null)
	{
		if ($this->aCampus === null && ($this->campus_id !== null)) {
						include_once 'lib/model/om/BaseCampusPeer.php';

			$this->aCampus = CampusPeer::retrieveByPK($this->campus_id, $con);

			
		}
		return $this->aCampus;
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

	
	public function setSubdepartment($v)
	{


		if ($v === null) {
			$this->setSubdepartmentId(NULL);
		} else {
			$this->setSubdepartmentId($v->getId());
		}


		$this->aSubdepartment = $v;
	}


	
	public function getSubdepartment($con = null)
	{
		if ($this->aSubdepartment === null && ($this->subdepartment_id !== null)) {
						include_once 'lib/model/om/BaseSubdepartmentPeer.php';

			$this->aSubdepartment = SubdepartmentPeer::retrieveByPK($this->subdepartment_id, $con);

			
		}
		return $this->aSubdepartment;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfGuardUserProfile:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardUserProfile::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 