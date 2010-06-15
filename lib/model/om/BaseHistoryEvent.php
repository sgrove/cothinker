<?php


abstract class BaseHistoryEvent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $history_group_id;


	
	protected $category;


	
	protected $title;


	
	protected $text;


	
	protected $user_id;


	
	protected $slug;


	
	protected $version;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $aHistoryGroup;

	
	protected $asfGuardUser;

	
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

	
	public function getHistoryGroupId()
	{

		return $this->history_group_id;
	}

	
	public function getCategory()
	{

		return $this->category;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getText()
	{

		return $this->text;
	}

	
	public function getUserId()
	{

		return $this->user_id;
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
			$this->modifiedColumns[] = HistoryEventPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = HistoryEventPeer::UUID;
		}

	} 
	
	public function setHistoryGroupId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->history_group_id !== $v) {
			$this->history_group_id = $v;
			$this->modifiedColumns[] = HistoryEventPeer::HISTORY_GROUP_ID;
		}

		if ($this->aHistoryGroup !== null && $this->aHistoryGroup->getId() !== $v) {
			$this->aHistoryGroup = null;
		}

	} 
	
	public function setCategory($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->category !== $v) {
			$this->category = $v;
			$this->modifiedColumns[] = HistoryEventPeer::CATEGORY;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = HistoryEventPeer::TITLE;
		}

	} 
	
	public function setText($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = HistoryEventPeer::TEXT;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = HistoryEventPeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = HistoryEventPeer::SLUG;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = HistoryEventPeer::VERSION;
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
			$this->modifiedColumns[] = HistoryEventPeer::DELETED_AT;
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
			$this->modifiedColumns[] = HistoryEventPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->history_group_id = $rs->getInt($startcol + 2);

			$this->category = $rs->getString($startcol + 3);

			$this->title = $rs->getString($startcol + 4);

			$this->text = $rs->getString($startcol + 5);

			$this->user_id = $rs->getInt($startcol + 6);

			$this->slug = $rs->getString($startcol + 7);

			$this->version = $rs->getInt($startcol + 8);

			$this->deleted_at = $rs->getTimestamp($startcol + 9, null);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HistoryEvent object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEvent:delete:pre') as $callable)
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
			$con = Propel::getConnection(HistoryEventPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HistoryEventPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseHistoryEvent:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryEvent:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(HistoryEventPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HistoryEventPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseHistoryEvent:save:post') as $callable)
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


												
			if ($this->aHistoryGroup !== null) {
				if ($this->aHistoryGroup->isModified()) {
					$affectedRows += $this->aHistoryGroup->save($con);
				}
				$this->setHistoryGroup($this->aHistoryGroup);
			}

			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HistoryEventPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HistoryEventPeer::doUpdate($this, $con);
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


												
			if ($this->aHistoryGroup !== null) {
				if (!$this->aHistoryGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHistoryGroup->getValidationFailures());
				}
			}

			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = HistoryEventPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HistoryEventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getHistoryGroupId();
				break;
			case 3:
				return $this->getCategory();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getText();
				break;
			case 6:
				return $this->getUserId();
				break;
			case 7:
				return $this->getSlug();
				break;
			case 8:
				return $this->getVersion();
				break;
			case 9:
				return $this->getDeletedAt();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HistoryEventPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getHistoryGroupId(),
			$keys[3] => $this->getCategory(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getText(),
			$keys[6] => $this->getUserId(),
			$keys[7] => $this->getSlug(),
			$keys[8] => $this->getVersion(),
			$keys[9] => $this->getDeletedAt(),
			$keys[10] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HistoryEventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setHistoryGroupId($value);
				break;
			case 3:
				$this->setCategory($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setText($value);
				break;
			case 6:
				$this->setUserId($value);
				break;
			case 7:
				$this->setSlug($value);
				break;
			case 8:
				$this->setVersion($value);
				break;
			case 9:
				$this->setDeletedAt($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HistoryEventPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHistoryGroupId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCategory($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setText($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUserId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSlug($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVersion($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeletedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HistoryEventPeer::DATABASE_NAME);

		if ($this->isColumnModified(HistoryEventPeer::ID)) $criteria->add(HistoryEventPeer::ID, $this->id);
		if ($this->isColumnModified(HistoryEventPeer::UUID)) $criteria->add(HistoryEventPeer::UUID, $this->uuid);
		if ($this->isColumnModified(HistoryEventPeer::HISTORY_GROUP_ID)) $criteria->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->history_group_id);
		if ($this->isColumnModified(HistoryEventPeer::CATEGORY)) $criteria->add(HistoryEventPeer::CATEGORY, $this->category);
		if ($this->isColumnModified(HistoryEventPeer::TITLE)) $criteria->add(HistoryEventPeer::TITLE, $this->title);
		if ($this->isColumnModified(HistoryEventPeer::TEXT)) $criteria->add(HistoryEventPeer::TEXT, $this->text);
		if ($this->isColumnModified(HistoryEventPeer::USER_ID)) $criteria->add(HistoryEventPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(HistoryEventPeer::SLUG)) $criteria->add(HistoryEventPeer::SLUG, $this->slug);
		if ($this->isColumnModified(HistoryEventPeer::VERSION)) $criteria->add(HistoryEventPeer::VERSION, $this->version);
		if ($this->isColumnModified(HistoryEventPeer::DELETED_AT)) $criteria->add(HistoryEventPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(HistoryEventPeer::CREATED_AT)) $criteria->add(HistoryEventPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HistoryEventPeer::DATABASE_NAME);

		$criteria->add(HistoryEventPeer::ID, $this->id);

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

		$copyObj->setHistoryGroupId($this->history_group_id);

		$copyObj->setCategory($this->category);

		$copyObj->setTitle($this->title);

		$copyObj->setText($this->text);

		$copyObj->setUserId($this->user_id);

		$copyObj->setSlug($this->slug);

		$copyObj->setVersion($this->version);

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
			self::$peer = new HistoryEventPeer();
		}
		return self::$peer;
	}

	
	public function setHistoryGroup($v)
	{


		if ($v === null) {
			$this->setHistoryGroupId(NULL);
		} else {
			$this->setHistoryGroupId($v->getId());
		}


		$this->aHistoryGroup = $v;
	}


	
	public function getHistoryGroup($con = null)
	{
		if ($this->aHistoryGroup === null && ($this->history_group_id !== null)) {
						include_once 'lib/model/om/BaseHistoryGroupPeer.php';

			$this->aHistoryGroup = HistoryGroupPeer::retrieveByPK($this->history_group_id, $con);

			
		}
		return $this->aHistoryGroup;
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
    if (!$callable = sfMixer::getCallable('BaseHistoryEvent:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseHistoryEvent::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 