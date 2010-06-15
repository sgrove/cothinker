<?php


abstract class BaseTask extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $project_id;


	
	protected $owner_id;


	
	protected $name;


	
	protected $slug;


	
	protected $description;


	
	protected $begin;


	
	protected $finish;


	
	protected $status;


	
	protected $context;


	
	protected $priority;


	
	protected $privileged;


	
	protected $version;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $aProject;

	
	protected $asfGuardUser;

	
	protected $collTaskUsers;

	
	protected $lastTaskUserCriteria = null;

	
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

	
	public function getProjectId()
	{

		return $this->project_id;
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

	
	public function getBegin($format = 'Y-m-d H:i:s')
	{

		if ($this->begin === null || $this->begin === '') {
			return null;
		} elseif (!is_int($this->begin)) {
						$ts = strtotime($this->begin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [begin] as date/time value: " . var_export($this->begin, true));
			}
		} else {
			$ts = $this->begin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFinish($format = 'Y-m-d H:i:s')
	{

		if ($this->finish === null || $this->finish === '') {
			return null;
		} elseif (!is_int($this->finish)) {
						$ts = strtotime($this->finish);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [finish] as date/time value: " . var_export($this->finish, true));
			}
		} else {
			$ts = $this->finish;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getContext()
	{

		return $this->context;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getPrivileged()
	{

		return $this->privileged;
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
			$this->modifiedColumns[] = TaskPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = TaskPeer::UUID;
		}

	} 
	
	public function setProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_id !== $v) {
			$this->project_id = $v;
			$this->modifiedColumns[] = TaskPeer::PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setOwnerId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = TaskPeer::OWNER_ID;
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
			$this->modifiedColumns[] = TaskPeer::NAME;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = TaskPeer::SLUG;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = TaskPeer::DESCRIPTION;
		}

	} 
	
	public function setBegin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [begin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->begin !== $ts) {
			$this->begin = $ts;
			$this->modifiedColumns[] = TaskPeer::BEGIN;
		}

	} 
	
	public function setFinish($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [finish] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->finish !== $ts) {
			$this->finish = $ts;
			$this->modifiedColumns[] = TaskPeer::FINISH;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = TaskPeer::STATUS;
		}

	} 
	
	public function setContext($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->context !== $v) {
			$this->context = $v;
			$this->modifiedColumns[] = TaskPeer::CONTEXT;
		}

	} 
	
	public function setPriority($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v) {
			$this->priority = $v;
			$this->modifiedColumns[] = TaskPeer::PRIORITY;
		}

	} 
	
	public function setPrivileged($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->privileged !== $v) {
			$this->privileged = $v;
			$this->modifiedColumns[] = TaskPeer::PRIVILEGED;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = TaskPeer::VERSION;
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
			$this->modifiedColumns[] = TaskPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = TaskPeer::DELETED_AT;
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
			$this->modifiedColumns[] = TaskPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->project_id = $rs->getInt($startcol + 2);

			$this->owner_id = $rs->getInt($startcol + 3);

			$this->name = $rs->getString($startcol + 4);

			$this->slug = $rs->getString($startcol + 5);

			$this->description = $rs->getString($startcol + 6);

			$this->begin = $rs->getTimestamp($startcol + 7, null);

			$this->finish = $rs->getTimestamp($startcol + 8, null);

			$this->status = $rs->getInt($startcol + 9);

			$this->context = $rs->getString($startcol + 10);

			$this->priority = $rs->getInt($startcol + 11);

			$this->privileged = $rs->getInt($startcol + 12);

			$this->version = $rs->getInt($startcol + 13);

			$this->updated_at = $rs->getTimestamp($startcol + 14, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 15, null);

			$this->created_at = $rs->getTimestamp($startcol + 16, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Task object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTask:delete:pre') as $callable)
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
			$con = Propel::getConnection(TaskPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TaskPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTask:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTask:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(TaskPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(TaskPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TaskPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTask:save:post') as $callable)
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


												
			if ($this->aProject !== null) {
				if ($this->aProject->isModified()) {
					$affectedRows += $this->aProject->save($con);
				}
				$this->setProject($this->aProject);
			}

			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TaskPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TaskPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTaskUsers !== null) {
				foreach($this->collTaskUsers as $referrerFK) {
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


												
			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}

			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = TaskPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTaskUsers !== null) {
					foreach($this->collTaskUsers as $referrerFK) {
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
		$pos = TaskPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getProjectId();
				break;
			case 3:
				return $this->getOwnerId();
				break;
			case 4:
				return $this->getName();
				break;
			case 5:
				return $this->getSlug();
				break;
			case 6:
				return $this->getDescription();
				break;
			case 7:
				return $this->getBegin();
				break;
			case 8:
				return $this->getFinish();
				break;
			case 9:
				return $this->getStatus();
				break;
			case 10:
				return $this->getContext();
				break;
			case 11:
				return $this->getPriority();
				break;
			case 12:
				return $this->getPrivileged();
				break;
			case 13:
				return $this->getVersion();
				break;
			case 14:
				return $this->getUpdatedAt();
				break;
			case 15:
				return $this->getDeletedAt();
				break;
			case 16:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TaskPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getProjectId(),
			$keys[3] => $this->getOwnerId(),
			$keys[4] => $this->getName(),
			$keys[5] => $this->getSlug(),
			$keys[6] => $this->getDescription(),
			$keys[7] => $this->getBegin(),
			$keys[8] => $this->getFinish(),
			$keys[9] => $this->getStatus(),
			$keys[10] => $this->getContext(),
			$keys[11] => $this->getPriority(),
			$keys[12] => $this->getPrivileged(),
			$keys[13] => $this->getVersion(),
			$keys[14] => $this->getUpdatedAt(),
			$keys[15] => $this->getDeletedAt(),
			$keys[16] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TaskPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setProjectId($value);
				break;
			case 3:
				$this->setOwnerId($value);
				break;
			case 4:
				$this->setName($value);
				break;
			case 5:
				$this->setSlug($value);
				break;
			case 6:
				$this->setDescription($value);
				break;
			case 7:
				$this->setBegin($value);
				break;
			case 8:
				$this->setFinish($value);
				break;
			case 9:
				$this->setStatus($value);
				break;
			case 10:
				$this->setContext($value);
				break;
			case 11:
				$this->setPriority($value);
				break;
			case 12:
				$this->setPrivileged($value);
				break;
			case 13:
				$this->setVersion($value);
				break;
			case 14:
				$this->setUpdatedAt($value);
				break;
			case 15:
				$this->setDeletedAt($value);
				break;
			case 16:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TaskPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProjectId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOwnerId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSlug($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBegin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFinish($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatus($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setContext($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPriority($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPrivileged($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setVersion($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeletedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TaskPeer::DATABASE_NAME);

		if ($this->isColumnModified(TaskPeer::ID)) $criteria->add(TaskPeer::ID, $this->id);
		if ($this->isColumnModified(TaskPeer::UUID)) $criteria->add(TaskPeer::UUID, $this->uuid);
		if ($this->isColumnModified(TaskPeer::PROJECT_ID)) $criteria->add(TaskPeer::PROJECT_ID, $this->project_id);
		if ($this->isColumnModified(TaskPeer::OWNER_ID)) $criteria->add(TaskPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(TaskPeer::NAME)) $criteria->add(TaskPeer::NAME, $this->name);
		if ($this->isColumnModified(TaskPeer::SLUG)) $criteria->add(TaskPeer::SLUG, $this->slug);
		if ($this->isColumnModified(TaskPeer::DESCRIPTION)) $criteria->add(TaskPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(TaskPeer::BEGIN)) $criteria->add(TaskPeer::BEGIN, $this->begin);
		if ($this->isColumnModified(TaskPeer::FINISH)) $criteria->add(TaskPeer::FINISH, $this->finish);
		if ($this->isColumnModified(TaskPeer::STATUS)) $criteria->add(TaskPeer::STATUS, $this->status);
		if ($this->isColumnModified(TaskPeer::CONTEXT)) $criteria->add(TaskPeer::CONTEXT, $this->context);
		if ($this->isColumnModified(TaskPeer::PRIORITY)) $criteria->add(TaskPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(TaskPeer::PRIVILEGED)) $criteria->add(TaskPeer::PRIVILEGED, $this->privileged);
		if ($this->isColumnModified(TaskPeer::VERSION)) $criteria->add(TaskPeer::VERSION, $this->version);
		if ($this->isColumnModified(TaskPeer::UPDATED_AT)) $criteria->add(TaskPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(TaskPeer::DELETED_AT)) $criteria->add(TaskPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(TaskPeer::CREATED_AT)) $criteria->add(TaskPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TaskPeer::DATABASE_NAME);

		$criteria->add(TaskPeer::ID, $this->id);

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

		$copyObj->setProjectId($this->project_id);

		$copyObj->setOwnerId($this->owner_id);

		$copyObj->setName($this->name);

		$copyObj->setSlug($this->slug);

		$copyObj->setDescription($this->description);

		$copyObj->setBegin($this->begin);

		$copyObj->setFinish($this->finish);

		$copyObj->setStatus($this->status);

		$copyObj->setContext($this->context);

		$copyObj->setPriority($this->priority);

		$copyObj->setPrivileged($this->privileged);

		$copyObj->setVersion($this->version);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTaskUsers() as $relObj) {
				$copyObj->addTaskUser($relObj->copy($deepCopy));
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
			self::$peer = new TaskPeer();
		}
		return self::$peer;
	}

	
	public function setProject($v)
	{


		if ($v === null) {
			$this->setProjectId(NULL);
		} else {
			$this->setProjectId($v->getId());
		}


		$this->aProject = $v;
	}


	
	public function getProject($con = null)
	{
		if ($this->aProject === null && ($this->project_id !== null)) {
						include_once 'lib/model/om/BaseProjectPeer.php';

			$this->aProject = ProjectPeer::retrieveByPK($this->project_id, $con);

			
		}
		return $this->aProject;
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

	
	public function initTaskUsers()
	{
		if ($this->collTaskUsers === null) {
			$this->collTaskUsers = array();
		}
	}

	
	public function getTaskUsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTaskUsers === null) {
			if ($this->isNew()) {
			   $this->collTaskUsers = array();
			} else {

				$criteria->add(TaskUserPeer::TASK_ID, $this->getId());

				TaskUserPeer::addSelectColumns($criteria);
				$this->collTaskUsers = TaskUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskUserPeer::TASK_ID, $this->getId());

				TaskUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskUserCriteria) || !$this->lastTaskUserCriteria->equals($criteria)) {
					$this->collTaskUsers = TaskUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskUserCriteria = $criteria;
		return $this->collTaskUsers;
	}

	
	public function countTaskUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskUserPeer::TASK_ID, $this->getId());

		return TaskUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTaskUser(TaskUser $l)
	{
		$this->collTaskUsers[] = $l;
		$l->setTask($this);
	}


	
	public function getTaskUsersJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTaskUsers === null) {
			if ($this->isNew()) {
				$this->collTaskUsers = array();
			} else {

				$criteria->add(TaskUserPeer::TASK_ID, $this->getId());

				$this->collTaskUsers = TaskUserPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskUserPeer::TASK_ID, $this->getId());

			if (!isset($this->lastTaskUserCriteria) || !$this->lastTaskUserCriteria->equals($criteria)) {
				$this->collTaskUsers = TaskUserPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastTaskUserCriteria = $criteria;

		return $this->collTaskUsers;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTask:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTask::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 