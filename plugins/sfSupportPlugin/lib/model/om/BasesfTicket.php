<?php


abstract class BasesfTicket extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id;


	
	protected $sf_ticket_status_id;


	
	protected $subject;


	
	protected $message;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $asfTicketStatus;

	
	protected $collsfTicketThreads;

	
	protected $lastsfTicketThreadCriteria = null;

	
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

	
	public function getSfTicketStatusId()
	{

		return $this->sf_ticket_status_id;
	}

	
	public function getSubject()
	{

		return $this->subject;
	}

	
	public function getMessage()
	{

		return $this->message;
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
			$this->modifiedColumns[] = sfTicketPeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = sfTicketPeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setSfTicketStatusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sf_ticket_status_id !== $v) {
			$this->sf_ticket_status_id = $v;
			$this->modifiedColumns[] = sfTicketPeer::SF_TICKET_STATUS_ID;
		}

		if ($this->asfTicketStatus !== null && $this->asfTicketStatus->getId() !== $v) {
			$this->asfTicketStatus = null;
		}

	} 
	
	public function setSubject($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = sfTicketPeer::SUBJECT;
		}

	} 
	
	public function setMessage($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->message !== $v) {
			$this->message = $v;
			$this->modifiedColumns[] = sfTicketPeer::MESSAGE;
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
			$this->modifiedColumns[] = sfTicketPeer::CREATED_AT;
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
			$this->modifiedColumns[] = sfTicketPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->sf_ticket_status_id = $rs->getInt($startcol + 2);

			$this->subject = $rs->getString($startcol + 3);

			$this->message = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfTicket object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfTicket:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfTicketPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfTicketPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfTicket:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfTicket:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfTicketPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfTicketPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfTicketPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfTicket:save:post') as $callable)
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

			if ($this->asfTicketStatus !== null) {
				if ($this->asfTicketStatus->isModified()) {
					$affectedRows += $this->asfTicketStatus->save($con);
				}
				$this->setsfTicketStatus($this->asfTicketStatus);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfTicketPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfTicketPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfTicketThreads !== null) {
				foreach($this->collsfTicketThreads as $referrerFK) {
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

			if ($this->asfTicketStatus !== null) {
				if (!$this->asfTicketStatus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfTicketStatus->getValidationFailures());
				}
			}


			if (($retval = sfTicketPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfTicketThreads !== null) {
					foreach($this->collsfTicketThreads as $referrerFK) {
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
		$pos = sfTicketPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSfTicketStatusId();
				break;
			case 3:
				return $this->getSubject();
				break;
			case 4:
				return $this->getMessage();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfTicketPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getSfTicketStatusId(),
			$keys[3] => $this->getSubject(),
			$keys[4] => $this->getMessage(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfTicketPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSfTicketStatusId($value);
				break;
			case 3:
				$this->setSubject($value);
				break;
			case 4:
				$this->setMessage($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfTicketPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSfTicketStatusId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSubject($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMessage($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfTicketPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfTicketPeer::ID)) $criteria->add(sfTicketPeer::ID, $this->id);
		if ($this->isColumnModified(sfTicketPeer::USER_ID)) $criteria->add(sfTicketPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(sfTicketPeer::SF_TICKET_STATUS_ID)) $criteria->add(sfTicketPeer::SF_TICKET_STATUS_ID, $this->sf_ticket_status_id);
		if ($this->isColumnModified(sfTicketPeer::SUBJECT)) $criteria->add(sfTicketPeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(sfTicketPeer::MESSAGE)) $criteria->add(sfTicketPeer::MESSAGE, $this->message);
		if ($this->isColumnModified(sfTicketPeer::CREATED_AT)) $criteria->add(sfTicketPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfTicketPeer::UPDATED_AT)) $criteria->add(sfTicketPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfTicketPeer::DATABASE_NAME);

		$criteria->add(sfTicketPeer::ID, $this->id);

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

		$copyObj->setSfTicketStatusId($this->sf_ticket_status_id);

		$copyObj->setSubject($this->subject);

		$copyObj->setMessage($this->message);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfTicketThreads() as $relObj) {
				$copyObj->addsfTicketThread($relObj->copy($deepCopy));
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
			self::$peer = new sfTicketPeer();
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

	
	public function setsfTicketStatus($v)
	{


		if ($v === null) {
			$this->setSfTicketStatusId(NULL);
		} else {
			$this->setSfTicketStatusId($v->getId());
		}


		$this->asfTicketStatus = $v;
	}


	
	public function getsfTicketStatus($con = null)
	{
		if ($this->asfTicketStatus === null && ($this->sf_ticket_status_id !== null)) {
						include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketStatusPeer.php';

			$this->asfTicketStatus = sfTicketStatusPeer::retrieveByPK($this->sf_ticket_status_id, $con);

			
		}
		return $this->asfTicketStatus;
	}

	
	public function initsfTicketThreads()
	{
		if ($this->collsfTicketThreads === null) {
			$this->collsfTicketThreads = array();
		}
	}

	
	public function getsfTicketThreads($criteria = null, $con = null)
	{
				include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketThreadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfTicketThreads === null) {
			if ($this->isNew()) {
			   $this->collsfTicketThreads = array();
			} else {

				$criteria->add(sfTicketThreadPeer::SF_TICKET_ID, $this->getId());

				sfTicketThreadPeer::addSelectColumns($criteria);
				$this->collsfTicketThreads = sfTicketThreadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfTicketThreadPeer::SF_TICKET_ID, $this->getId());

				sfTicketThreadPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfTicketThreadCriteria) || !$this->lastsfTicketThreadCriteria->equals($criteria)) {
					$this->collsfTicketThreads = sfTicketThreadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfTicketThreadCriteria = $criteria;
		return $this->collsfTicketThreads;
	}

	
	public function countsfTicketThreads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketThreadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfTicketThreadPeer::SF_TICKET_ID, $this->getId());

		return sfTicketThreadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfTicketThread(sfTicketThread $l)
	{
		$this->collsfTicketThreads[] = $l;
		$l->setsfTicket($this);
	}


	
	public function getsfTicketThreadsJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketThreadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfTicketThreads === null) {
			if ($this->isNew()) {
				$this->collsfTicketThreads = array();
			} else {

				$criteria->add(sfTicketThreadPeer::SF_TICKET_ID, $this->getId());

				$this->collsfTicketThreads = sfTicketThreadPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(sfTicketThreadPeer::SF_TICKET_ID, $this->getId());

			if (!isset($this->lastsfTicketThreadCriteria) || !$this->lastsfTicketThreadCriteria->equals($criteria)) {
				$this->collsfTicketThreads = sfTicketThreadPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastsfTicketThreadCriteria = $criteria;

		return $this->collsfTicketThreads;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfTicket:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfTicket::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 