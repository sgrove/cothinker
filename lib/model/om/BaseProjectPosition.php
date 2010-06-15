<?php


abstract class BaseProjectPosition extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $project_id;


	
	protected $user_id;


	
	protected $title;


	
	protected $qualifications;


	
	protected $description;


	
	protected $deadline;


	
	protected $weekly_hours;


	
	protected $status;


	
	protected $filled;


	
	protected $milestone_count;


	
	protected $campus_preference;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $aProject;

	
	protected $asfGuardUser;

	
	protected $aCampus;

	
	protected $collPositionMilestones;

	
	protected $lastPositionMilestoneCriteria = null;

	
	protected $collProjectUsers;

	
	protected $lastProjectUserCriteria = null;

	
	protected $collCoFormApplications;

	
	protected $lastCoFormApplicationCriteria = null;

	
	protected $collPositionApplications;

	
	protected $lastPositionApplicationCriteria = null;

	
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

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getQualifications()
	{

		return $this->qualifications;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getDeadline($format = 'Y-m-d')
	{

		if ($this->deadline === null || $this->deadline === '') {
			return null;
		} elseif (!is_int($this->deadline)) {
						$ts = strtotime($this->deadline);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deadline] as date/time value: " . var_export($this->deadline, true));
			}
		} else {
			$ts = $this->deadline;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getWeeklyHours()
	{

		return $this->weekly_hours;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getFilled()
	{

		return $this->filled;
	}

	
	public function getMilestoneCount()
	{

		return $this->milestone_count;
	}

	
	public function getCampusPreference()
	{

		return $this->campus_preference;
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
			$this->modifiedColumns[] = ProjectPositionPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::UUID;
		}

	} 
	
	public function setProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_id !== $v) {
			$this->project_id = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::TITLE;
		}

	} 
	
	public function setQualifications($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->qualifications !== $v) {
			$this->qualifications = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::QUALIFICATIONS;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::DESCRIPTION;
		}

	} 
	
	public function setDeadline($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deadline] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deadline !== $ts) {
			$this->deadline = $ts;
			$this->modifiedColumns[] = ProjectPositionPeer::DEADLINE;
		}

	} 
	
	public function setWeeklyHours($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->weekly_hours !== $v) {
			$this->weekly_hours = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::WEEKLY_HOURS;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::STATUS;
		}

	} 
	
	public function setFilled($v)
	{

		if ($this->filled !== $v) {
			$this->filled = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::FILLED;
		}

	} 
	
	public function setMilestoneCount($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->milestone_count !== $v) {
			$this->milestone_count = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::MILESTONE_COUNT;
		}

	} 
	
	public function setCampusPreference($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->campus_preference !== $v) {
			$this->campus_preference = $v;
			$this->modifiedColumns[] = ProjectPositionPeer::CAMPUS_PREFERENCE;
		}

		if ($this->aCampus !== null && $this->aCampus->getId() !== $v) {
			$this->aCampus = null;
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
			$this->modifiedColumns[] = ProjectPositionPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = ProjectPositionPeer::DELETED_AT;
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
			$this->modifiedColumns[] = ProjectPositionPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->project_id = $rs->getInt($startcol + 2);

			$this->user_id = $rs->getInt($startcol + 3);

			$this->title = $rs->getString($startcol + 4);

			$this->qualifications = $rs->getString($startcol + 5);

			$this->description = $rs->getString($startcol + 6);

			$this->deadline = $rs->getDate($startcol + 7, null);

			$this->weekly_hours = $rs->getInt($startcol + 8);

			$this->status = $rs->getInt($startcol + 9);

			$this->filled = $rs->getBoolean($startcol + 10);

			$this->milestone_count = $rs->getInt($startcol + 11);

			$this->campus_preference = $rs->getInt($startcol + 12);

			$this->updated_at = $rs->getTimestamp($startcol + 13, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 14, null);

			$this->created_at = $rs->getTimestamp($startcol + 15, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ProjectPosition object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPosition:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectPositionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectPositionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProjectPosition:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPosition:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(ProjectPositionPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(ProjectPositionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProjectPositionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProjectPosition:save:post') as $callable)
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

			if ($this->aCampus !== null) {
				if ($this->aCampus->isModified()) {
					$affectedRows += $this->aCampus->save($con);
				}
				$this->setCampus($this->aCampus);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProjectPositionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectPositionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPositionMilestones !== null) {
				foreach($this->collPositionMilestones as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectUsers !== null) {
				foreach($this->collProjectUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCoFormApplications !== null) {
				foreach($this->collCoFormApplications as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPositionApplications !== null) {
				foreach($this->collPositionApplications as $referrerFK) {
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

			if ($this->aCampus !== null) {
				if (!$this->aCampus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCampus->getValidationFailures());
				}
			}


			if (($retval = ProjectPositionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPositionMilestones !== null) {
					foreach($this->collPositionMilestones as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectUsers !== null) {
					foreach($this->collProjectUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCoFormApplications !== null) {
					foreach($this->collCoFormApplications as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPositionApplications !== null) {
					foreach($this->collPositionApplications as $referrerFK) {
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
		$pos = ProjectPositionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUserId();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getQualifications();
				break;
			case 6:
				return $this->getDescription();
				break;
			case 7:
				return $this->getDeadline();
				break;
			case 8:
				return $this->getWeeklyHours();
				break;
			case 9:
				return $this->getStatus();
				break;
			case 10:
				return $this->getFilled();
				break;
			case 11:
				return $this->getMilestoneCount();
				break;
			case 12:
				return $this->getCampusPreference();
				break;
			case 13:
				return $this->getUpdatedAt();
				break;
			case 14:
				return $this->getDeletedAt();
				break;
			case 15:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectPositionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getProjectId(),
			$keys[3] => $this->getUserId(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getQualifications(),
			$keys[6] => $this->getDescription(),
			$keys[7] => $this->getDeadline(),
			$keys[8] => $this->getWeeklyHours(),
			$keys[9] => $this->getStatus(),
			$keys[10] => $this->getFilled(),
			$keys[11] => $this->getMilestoneCount(),
			$keys[12] => $this->getCampusPreference(),
			$keys[13] => $this->getUpdatedAt(),
			$keys[14] => $this->getDeletedAt(),
			$keys[15] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectPositionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUserId($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setQualifications($value);
				break;
			case 6:
				$this->setDescription($value);
				break;
			case 7:
				$this->setDeadline($value);
				break;
			case 8:
				$this->setWeeklyHours($value);
				break;
			case 9:
				$this->setStatus($value);
				break;
			case 10:
				$this->setFilled($value);
				break;
			case 11:
				$this->setMilestoneCount($value);
				break;
			case 12:
				$this->setCampusPreference($value);
				break;
			case 13:
				$this->setUpdatedAt($value);
				break;
			case 14:
				$this->setDeletedAt($value);
				break;
			case 15:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectPositionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProjectId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQualifications($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDeadline($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWeeklyHours($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatus($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFilled($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMilestoneCount($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCampusPreference($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedAt($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectPositionPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectPositionPeer::ID)) $criteria->add(ProjectPositionPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectPositionPeer::UUID)) $criteria->add(ProjectPositionPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ProjectPositionPeer::PROJECT_ID)) $criteria->add(ProjectPositionPeer::PROJECT_ID, $this->project_id);
		if ($this->isColumnModified(ProjectPositionPeer::USER_ID)) $criteria->add(ProjectPositionPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(ProjectPositionPeer::TITLE)) $criteria->add(ProjectPositionPeer::TITLE, $this->title);
		if ($this->isColumnModified(ProjectPositionPeer::QUALIFICATIONS)) $criteria->add(ProjectPositionPeer::QUALIFICATIONS, $this->qualifications);
		if ($this->isColumnModified(ProjectPositionPeer::DESCRIPTION)) $criteria->add(ProjectPositionPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProjectPositionPeer::DEADLINE)) $criteria->add(ProjectPositionPeer::DEADLINE, $this->deadline);
		if ($this->isColumnModified(ProjectPositionPeer::WEEKLY_HOURS)) $criteria->add(ProjectPositionPeer::WEEKLY_HOURS, $this->weekly_hours);
		if ($this->isColumnModified(ProjectPositionPeer::STATUS)) $criteria->add(ProjectPositionPeer::STATUS, $this->status);
		if ($this->isColumnModified(ProjectPositionPeer::FILLED)) $criteria->add(ProjectPositionPeer::FILLED, $this->filled);
		if ($this->isColumnModified(ProjectPositionPeer::MILESTONE_COUNT)) $criteria->add(ProjectPositionPeer::MILESTONE_COUNT, $this->milestone_count);
		if ($this->isColumnModified(ProjectPositionPeer::CAMPUS_PREFERENCE)) $criteria->add(ProjectPositionPeer::CAMPUS_PREFERENCE, $this->campus_preference);
		if ($this->isColumnModified(ProjectPositionPeer::UPDATED_AT)) $criteria->add(ProjectPositionPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ProjectPositionPeer::DELETED_AT)) $criteria->add(ProjectPositionPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ProjectPositionPeer::CREATED_AT)) $criteria->add(ProjectPositionPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectPositionPeer::DATABASE_NAME);

		$criteria->add(ProjectPositionPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setTitle($this->title);

		$copyObj->setQualifications($this->qualifications);

		$copyObj->setDescription($this->description);

		$copyObj->setDeadline($this->deadline);

		$copyObj->setWeeklyHours($this->weekly_hours);

		$copyObj->setStatus($this->status);

		$copyObj->setFilled($this->filled);

		$copyObj->setMilestoneCount($this->milestone_count);

		$copyObj->setCampusPreference($this->campus_preference);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPositionMilestones() as $relObj) {
				$copyObj->addPositionMilestone($relObj->copy($deepCopy));
			}

			foreach($this->getProjectUsers() as $relObj) {
				$copyObj->addProjectUser($relObj->copy($deepCopy));
			}

			foreach($this->getCoFormApplications() as $relObj) {
				$copyObj->addCoFormApplication($relObj->copy($deepCopy));
			}

			foreach($this->getPositionApplications() as $relObj) {
				$copyObj->addPositionApplication($relObj->copy($deepCopy));
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
			self::$peer = new ProjectPositionPeer();
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
			$this->setCampusPreference(NULL);
		} else {
			$this->setCampusPreference($v->getId());
		}


		$this->aCampus = $v;
	}


	
	public function getCampus($con = null)
	{
		if ($this->aCampus === null && ($this->campus_preference !== null)) {
						include_once 'lib/model/om/BaseCampusPeer.php';

			$this->aCampus = CampusPeer::retrieveByPK($this->campus_preference, $con);

			
		}
		return $this->aCampus;
	}

	
	public function initPositionMilestones()
	{
		if ($this->collPositionMilestones === null) {
			$this->collPositionMilestones = array();
		}
	}

	
	public function getPositionMilestones($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePositionMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPositionMilestones === null) {
			if ($this->isNew()) {
			   $this->collPositionMilestones = array();
			} else {

				$criteria->add(PositionMilestonePeer::POSITION_ID, $this->getId());

				PositionMilestonePeer::addSelectColumns($criteria);
				$this->collPositionMilestones = PositionMilestonePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PositionMilestonePeer::POSITION_ID, $this->getId());

				PositionMilestonePeer::addSelectColumns($criteria);
				if (!isset($this->lastPositionMilestoneCriteria) || !$this->lastPositionMilestoneCriteria->equals($criteria)) {
					$this->collPositionMilestones = PositionMilestonePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPositionMilestoneCriteria = $criteria;
		return $this->collPositionMilestones;
	}

	
	public function countPositionMilestones($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePositionMilestonePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PositionMilestonePeer::POSITION_ID, $this->getId());

		return PositionMilestonePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPositionMilestone(PositionMilestone $l)
	{
		$this->collPositionMilestones[] = $l;
		$l->setProjectPosition($this);
	}

	
	public function initProjectUsers()
	{
		if ($this->collProjectUsers === null) {
			$this->collProjectUsers = array();
		}
	}

	
	public function getProjectUsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectUsers === null) {
			if ($this->isNew()) {
			   $this->collProjectUsers = array();
			} else {

				$criteria->add(ProjectUserPeer::POSITION_ID, $this->getId());

				ProjectUserPeer::addSelectColumns($criteria);
				$this->collProjectUsers = ProjectUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectUserPeer::POSITION_ID, $this->getId());

				ProjectUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectUserCriteria) || !$this->lastProjectUserCriteria->equals($criteria)) {
					$this->collProjectUsers = ProjectUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectUserCriteria = $criteria;
		return $this->collProjectUsers;
	}

	
	public function countProjectUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectUserPeer::POSITION_ID, $this->getId());

		return ProjectUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectUser(ProjectUser $l)
	{
		$this->collProjectUsers[] = $l;
		$l->setProjectPosition($this);
	}


	
	public function getProjectUsersJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectUsers === null) {
			if ($this->isNew()) {
				$this->collProjectUsers = array();
			} else {

				$criteria->add(ProjectUserPeer::POSITION_ID, $this->getId());

				$this->collProjectUsers = ProjectUserPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectUserPeer::POSITION_ID, $this->getId());

			if (!isset($this->lastProjectUserCriteria) || !$this->lastProjectUserCriteria->equals($criteria)) {
				$this->collProjectUsers = ProjectUserPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastProjectUserCriteria = $criteria;

		return $this->collProjectUsers;
	}

	
	public function initCoFormApplications()
	{
		if ($this->collCoFormApplications === null) {
			$this->collCoFormApplications = array();
		}
	}

	
	public function getCoFormApplications($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoFormApplications === null) {
			if ($this->isNew()) {
			   $this->collCoFormApplications = array();
			} else {

				$criteria->add(CoFormApplicationPeer::POSITION_ID, $this->getId());

				CoFormApplicationPeer::addSelectColumns($criteria);
				$this->collCoFormApplications = CoFormApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoFormApplicationPeer::POSITION_ID, $this->getId());

				CoFormApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastCoFormApplicationCriteria) || !$this->lastCoFormApplicationCriteria->equals($criteria)) {
					$this->collCoFormApplications = CoFormApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCoFormApplicationCriteria = $criteria;
		return $this->collCoFormApplications;
	}

	
	public function countCoFormApplications($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CoFormApplicationPeer::POSITION_ID, $this->getId());

		return CoFormApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoFormApplication(CoFormApplication $l)
	{
		$this->collCoFormApplications[] = $l;
		$l->setProjectPosition($this);
	}


	
	public function getCoFormApplicationsJoinCoForm($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoFormApplications === null) {
			if ($this->isNew()) {
				$this->collCoFormApplications = array();
			} else {

				$criteria->add(CoFormApplicationPeer::POSITION_ID, $this->getId());

				$this->collCoFormApplications = CoFormApplicationPeer::doSelectJoinCoForm($criteria, $con);
			}
		} else {
									
			$criteria->add(CoFormApplicationPeer::POSITION_ID, $this->getId());

			if (!isset($this->lastCoFormApplicationCriteria) || !$this->lastCoFormApplicationCriteria->equals($criteria)) {
				$this->collCoFormApplications = CoFormApplicationPeer::doSelectJoinCoForm($criteria, $con);
			}
		}
		$this->lastCoFormApplicationCriteria = $criteria;

		return $this->collCoFormApplications;
	}

	
	public function initPositionApplications()
	{
		if ($this->collPositionApplications === null) {
			$this->collPositionApplications = array();
		}
	}

	
	public function getPositionApplications($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePositionApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPositionApplications === null) {
			if ($this->isNew()) {
			   $this->collPositionApplications = array();
			} else {

				$criteria->add(PositionApplicationPeer::POSITION_ID, $this->getId());

				PositionApplicationPeer::addSelectColumns($criteria);
				$this->collPositionApplications = PositionApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PositionApplicationPeer::POSITION_ID, $this->getId());

				PositionApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastPositionApplicationCriteria) || !$this->lastPositionApplicationCriteria->equals($criteria)) {
					$this->collPositionApplications = PositionApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPositionApplicationCriteria = $criteria;
		return $this->collPositionApplications;
	}

	
	public function countPositionApplications($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePositionApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PositionApplicationPeer::POSITION_ID, $this->getId());

		return PositionApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPositionApplication(PositionApplication $l)
	{
		$this->collPositionApplications[] = $l;
		$l->setProjectPosition($this);
	}


	
	public function getPositionApplicationsJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePositionApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPositionApplications === null) {
			if ($this->isNew()) {
				$this->collPositionApplications = array();
			} else {

				$criteria->add(PositionApplicationPeer::POSITION_ID, $this->getId());

				$this->collPositionApplications = PositionApplicationPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(PositionApplicationPeer::POSITION_ID, $this->getId());

			if (!isset($this->lastPositionApplicationCriteria) || !$this->lastPositionApplicationCriteria->equals($criteria)) {
				$this->collPositionApplications = PositionApplicationPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastPositionApplicationCriteria = $criteria;

		return $this->collPositionApplications;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProjectPosition:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProjectPosition::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 