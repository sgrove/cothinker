<?php


abstract class BaseExternalService extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id;


	
	protected $uuid;


	
	protected $twitter_username;


	
	protected $twitter_password;


	
	protected $twitter_update;


	
	protected $twitter_status_update;


	
	protected $twitter_confirmed;


	
	protected $facebook_account;


	
	protected $facebook_update;


	
	protected $facebook_confirmed;

	
	protected $asfGuardUser;

	
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

	
	public function getTwitterUsername()
	{

		return $this->twitter_username;
	}

	
	public function getTwitterPassword()
	{

		return $this->twitter_password;
	}

	
	public function getTwitterUpdate()
	{

		return $this->twitter_update;
	}

	
	public function getTwitterStatusUpdate()
	{

		return $this->twitter_status_update;
	}

	
	public function getTwitterConfirmed()
	{

		return $this->twitter_confirmed;
	}

	
	public function getFacebookAccount()
	{

		return $this->facebook_account;
	}

	
	public function getFacebookUpdate()
	{

		return $this->facebook_update;
	}

	
	public function getFacebookConfirmed()
	{

		return $this->facebook_confirmed;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ExternalServicePeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = ExternalServicePeer::USER_ID;
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
			$this->modifiedColumns[] = ExternalServicePeer::UUID;
		}

	} 
	
	public function setTwitterUsername($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->twitter_username !== $v) {
			$this->twitter_username = $v;
			$this->modifiedColumns[] = ExternalServicePeer::TWITTER_USERNAME;
		}

	} 
	
	public function setTwitterPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->twitter_password !== $v) {
			$this->twitter_password = $v;
			$this->modifiedColumns[] = ExternalServicePeer::TWITTER_PASSWORD;
		}

	} 
	
	public function setTwitterUpdate($v)
	{

		if ($this->twitter_update !== $v) {
			$this->twitter_update = $v;
			$this->modifiedColumns[] = ExternalServicePeer::TWITTER_UPDATE;
		}

	} 
	
	public function setTwitterStatusUpdate($v)
	{

		if ($this->twitter_status_update !== $v) {
			$this->twitter_status_update = $v;
			$this->modifiedColumns[] = ExternalServicePeer::TWITTER_STATUS_UPDATE;
		}

	} 
	
	public function setTwitterConfirmed($v)
	{

		if ($this->twitter_confirmed !== $v) {
			$this->twitter_confirmed = $v;
			$this->modifiedColumns[] = ExternalServicePeer::TWITTER_CONFIRMED;
		}

	} 
	
	public function setFacebookAccount($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->facebook_account !== $v) {
			$this->facebook_account = $v;
			$this->modifiedColumns[] = ExternalServicePeer::FACEBOOK_ACCOUNT;
		}

	} 
	
	public function setFacebookUpdate($v)
	{

		if ($this->facebook_update !== $v) {
			$this->facebook_update = $v;
			$this->modifiedColumns[] = ExternalServicePeer::FACEBOOK_UPDATE;
		}

	} 
	
	public function setFacebookConfirmed($v)
	{

		if ($this->facebook_confirmed !== $v) {
			$this->facebook_confirmed = $v;
			$this->modifiedColumns[] = ExternalServicePeer::FACEBOOK_CONFIRMED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->uuid = $rs->getString($startcol + 2);

			$this->twitter_username = $rs->getString($startcol + 3);

			$this->twitter_password = $rs->getString($startcol + 4);

			$this->twitter_update = $rs->getBoolean($startcol + 5);

			$this->twitter_status_update = $rs->getBoolean($startcol + 6);

			$this->twitter_confirmed = $rs->getBoolean($startcol + 7);

			$this->facebook_account = $rs->getString($startcol + 8);

			$this->facebook_update = $rs->getBoolean($startcol + 9);

			$this->facebook_confirmed = $rs->getBoolean($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ExternalService object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalService:delete:pre') as $callable)
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
			$con = Propel::getConnection(ExternalServicePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ExternalServicePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseExternalService:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseExternalService:save:pre') as $callable)
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
			$con = Propel::getConnection(ExternalServicePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseExternalService:save:post') as $callable)
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
					$pk = ExternalServicePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ExternalServicePeer::doUpdate($this, $con);
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


			if (($retval = ExternalServicePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExternalServicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTwitterUsername();
				break;
			case 4:
				return $this->getTwitterPassword();
				break;
			case 5:
				return $this->getTwitterUpdate();
				break;
			case 6:
				return $this->getTwitterStatusUpdate();
				break;
			case 7:
				return $this->getTwitterConfirmed();
				break;
			case 8:
				return $this->getFacebookAccount();
				break;
			case 9:
				return $this->getFacebookUpdate();
				break;
			case 10:
				return $this->getFacebookConfirmed();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExternalServicePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getUuid(),
			$keys[3] => $this->getTwitterUsername(),
			$keys[4] => $this->getTwitterPassword(),
			$keys[5] => $this->getTwitterUpdate(),
			$keys[6] => $this->getTwitterStatusUpdate(),
			$keys[7] => $this->getTwitterConfirmed(),
			$keys[8] => $this->getFacebookAccount(),
			$keys[9] => $this->getFacebookUpdate(),
			$keys[10] => $this->getFacebookConfirmed(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExternalServicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTwitterUsername($value);
				break;
			case 4:
				$this->setTwitterPassword($value);
				break;
			case 5:
				$this->setTwitterUpdate($value);
				break;
			case 6:
				$this->setTwitterStatusUpdate($value);
				break;
			case 7:
				$this->setTwitterConfirmed($value);
				break;
			case 8:
				$this->setFacebookAccount($value);
				break;
			case 9:
				$this->setFacebookUpdate($value);
				break;
			case 10:
				$this->setFacebookConfirmed($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExternalServicePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUuid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTwitterUsername($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTwitterPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTwitterUpdate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTwitterStatusUpdate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTwitterConfirmed($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFacebookAccount($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFacebookUpdate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFacebookConfirmed($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ExternalServicePeer::DATABASE_NAME);

		if ($this->isColumnModified(ExternalServicePeer::ID)) $criteria->add(ExternalServicePeer::ID, $this->id);
		if ($this->isColumnModified(ExternalServicePeer::USER_ID)) $criteria->add(ExternalServicePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(ExternalServicePeer::UUID)) $criteria->add(ExternalServicePeer::UUID, $this->uuid);
		if ($this->isColumnModified(ExternalServicePeer::TWITTER_USERNAME)) $criteria->add(ExternalServicePeer::TWITTER_USERNAME, $this->twitter_username);
		if ($this->isColumnModified(ExternalServicePeer::TWITTER_PASSWORD)) $criteria->add(ExternalServicePeer::TWITTER_PASSWORD, $this->twitter_password);
		if ($this->isColumnModified(ExternalServicePeer::TWITTER_UPDATE)) $criteria->add(ExternalServicePeer::TWITTER_UPDATE, $this->twitter_update);
		if ($this->isColumnModified(ExternalServicePeer::TWITTER_STATUS_UPDATE)) $criteria->add(ExternalServicePeer::TWITTER_STATUS_UPDATE, $this->twitter_status_update);
		if ($this->isColumnModified(ExternalServicePeer::TWITTER_CONFIRMED)) $criteria->add(ExternalServicePeer::TWITTER_CONFIRMED, $this->twitter_confirmed);
		if ($this->isColumnModified(ExternalServicePeer::FACEBOOK_ACCOUNT)) $criteria->add(ExternalServicePeer::FACEBOOK_ACCOUNT, $this->facebook_account);
		if ($this->isColumnModified(ExternalServicePeer::FACEBOOK_UPDATE)) $criteria->add(ExternalServicePeer::FACEBOOK_UPDATE, $this->facebook_update);
		if ($this->isColumnModified(ExternalServicePeer::FACEBOOK_CONFIRMED)) $criteria->add(ExternalServicePeer::FACEBOOK_CONFIRMED, $this->facebook_confirmed);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ExternalServicePeer::DATABASE_NAME);

		$criteria->add(ExternalServicePeer::ID, $this->id);

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

		$copyObj->setTwitterUsername($this->twitter_username);

		$copyObj->setTwitterPassword($this->twitter_password);

		$copyObj->setTwitterUpdate($this->twitter_update);

		$copyObj->setTwitterStatusUpdate($this->twitter_status_update);

		$copyObj->setTwitterConfirmed($this->twitter_confirmed);

		$copyObj->setFacebookAccount($this->facebook_account);

		$copyObj->setFacebookUpdate($this->facebook_update);

		$copyObj->setFacebookConfirmed($this->facebook_confirmed);


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
			self::$peer = new ExternalServicePeer();
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
    if (!$callable = sfMixer::getCallable('BaseExternalService:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseExternalService::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 