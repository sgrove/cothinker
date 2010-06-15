<?php


abstract class BaseHistoryGroup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $name;


	
	protected $public_title;


	
	protected $version;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $collHistoryGroupUsers;

	
	protected $lastHistoryGroupUserCriteria = null;

	
	protected $collHistoryEvents;

	
	protected $lastHistoryEventCriteria = null;

	
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

	
	public function getPublicTitle()
	{

		return $this->public_title;
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
			$this->modifiedColumns[] = HistoryGroupPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = HistoryGroupPeer::UUID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = HistoryGroupPeer::NAME;
		}

	} 
	
	public function setPublicTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->public_title !== $v) {
			$this->public_title = $v;
			$this->modifiedColumns[] = HistoryGroupPeer::PUBLIC_TITLE;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = HistoryGroupPeer::VERSION;
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
			$this->modifiedColumns[] = HistoryGroupPeer::DELETED_AT;
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
			$this->modifiedColumns[] = HistoryGroupPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->public_title = $rs->getString($startcol + 3);

			$this->version = $rs->getInt($startcol + 4);

			$this->deleted_at = $rs->getTimestamp($startcol + 5, null);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HistoryGroup object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroup:delete:pre') as $callable)
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
			$con = Propel::getConnection(HistoryGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HistoryGroupPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseHistoryGroup:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseHistoryGroup:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(HistoryGroupPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HistoryGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseHistoryGroup:save:post') as $callable)
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
					$pk = HistoryGroupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HistoryGroupPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collHistoryGroupUsers !== null) {
				foreach($this->collHistoryGroupUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collHistoryEvents !== null) {
				foreach($this->collHistoryEvents as $referrerFK) {
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


			if (($retval = HistoryGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collHistoryGroupUsers !== null) {
					foreach($this->collHistoryGroupUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collHistoryEvents !== null) {
					foreach($this->collHistoryEvents as $referrerFK) {
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
		$pos = HistoryGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPublicTitle();
				break;
			case 4:
				return $this->getVersion();
				break;
			case 5:
				return $this->getDeletedAt();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HistoryGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getPublicTitle(),
			$keys[4] => $this->getVersion(),
			$keys[5] => $this->getDeletedAt(),
			$keys[6] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HistoryGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPublicTitle($value);
				break;
			case 4:
				$this->setVersion($value);
				break;
			case 5:
				$this->setDeletedAt($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HistoryGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPublicTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setVersion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDeletedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HistoryGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(HistoryGroupPeer::ID)) $criteria->add(HistoryGroupPeer::ID, $this->id);
		if ($this->isColumnModified(HistoryGroupPeer::UUID)) $criteria->add(HistoryGroupPeer::UUID, $this->uuid);
		if ($this->isColumnModified(HistoryGroupPeer::NAME)) $criteria->add(HistoryGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(HistoryGroupPeer::PUBLIC_TITLE)) $criteria->add(HistoryGroupPeer::PUBLIC_TITLE, $this->public_title);
		if ($this->isColumnModified(HistoryGroupPeer::VERSION)) $criteria->add(HistoryGroupPeer::VERSION, $this->version);
		if ($this->isColumnModified(HistoryGroupPeer::DELETED_AT)) $criteria->add(HistoryGroupPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(HistoryGroupPeer::CREATED_AT)) $criteria->add(HistoryGroupPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HistoryGroupPeer::DATABASE_NAME);

		$criteria->add(HistoryGroupPeer::ID, $this->id);

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

		$copyObj->setPublicTitle($this->public_title);

		$copyObj->setVersion($this->version);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getHistoryGroupUsers() as $relObj) {
				$copyObj->addHistoryGroupUser($relObj->copy($deepCopy));
			}

			foreach($this->getHistoryEvents() as $relObj) {
				$copyObj->addHistoryEvent($relObj->copy($deepCopy));
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
			self::$peer = new HistoryGroupPeer();
		}
		return self::$peer;
	}

	
	public function initHistoryGroupUsers()
	{
		if ($this->collHistoryGroupUsers === null) {
			$this->collHistoryGroupUsers = array();
		}
	}

	
	public function getHistoryGroupUsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHistoryGroupUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHistoryGroupUsers === null) {
			if ($this->isNew()) {
			   $this->collHistoryGroupUsers = array();
			} else {

				$criteria->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $this->getId());

				HistoryGroupUserPeer::addSelectColumns($criteria);
				$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $this->getId());

				HistoryGroupUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastHistoryGroupUserCriteria) || !$this->lastHistoryGroupUserCriteria->equals($criteria)) {
					$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHistoryGroupUserCriteria = $criteria;
		return $this->collHistoryGroupUsers;
	}

	
	public function countHistoryGroupUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseHistoryGroupUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $this->getId());

		return HistoryGroupUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHistoryGroupUser(HistoryGroupUser $l)
	{
		$this->collHistoryGroupUsers[] = $l;
		$l->setHistoryGroup($this);
	}


	
	public function getHistoryGroupUsersJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHistoryGroupUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHistoryGroupUsers === null) {
			if ($this->isNew()) {
				$this->collHistoryGroupUsers = array();
			} else {

				$criteria->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $this->getId());

				$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(HistoryGroupUserPeer::HISTORY_GROUP_ID, $this->getId());

			if (!isset($this->lastHistoryGroupUserCriteria) || !$this->lastHistoryGroupUserCriteria->equals($criteria)) {
				$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastHistoryGroupUserCriteria = $criteria;

		return $this->collHistoryGroupUsers;
	}

	
	public function initHistoryEvents()
	{
		if ($this->collHistoryEvents === null) {
			$this->collHistoryEvents = array();
		}
	}

	
	public function getHistoryEvents($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHistoryEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHistoryEvents === null) {
			if ($this->isNew()) {
			   $this->collHistoryEvents = array();
			} else {

				$criteria->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->getId());

				HistoryEventPeer::addSelectColumns($criteria);
				$this->collHistoryEvents = HistoryEventPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->getId());

				HistoryEventPeer::addSelectColumns($criteria);
				if (!isset($this->lastHistoryEventCriteria) || !$this->lastHistoryEventCriteria->equals($criteria)) {
					$this->collHistoryEvents = HistoryEventPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHistoryEventCriteria = $criteria;
		return $this->collHistoryEvents;
	}

	
	public function countHistoryEvents($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseHistoryEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->getId());

		return HistoryEventPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHistoryEvent(HistoryEvent $l)
	{
		$this->collHistoryEvents[] = $l;
		$l->setHistoryGroup($this);
	}


	
	public function getHistoryEventsJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseHistoryEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHistoryEvents === null) {
			if ($this->isNew()) {
				$this->collHistoryEvents = array();
			} else {

				$criteria->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->getId());

				$this->collHistoryEvents = HistoryEventPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(HistoryEventPeer::HISTORY_GROUP_ID, $this->getId());

			if (!isset($this->lastHistoryEventCriteria) || !$this->lastHistoryEventCriteria->equals($criteria)) {
				$this->collHistoryEvents = HistoryEventPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastHistoryEventCriteria = $criteria;

		return $this->collHistoryEvents;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseHistoryGroup:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseHistoryGroup::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 