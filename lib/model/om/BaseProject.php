<?php


abstract class BaseProject extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $created_by;


	
	protected $owner_id;


	
	protected $department_id;


	
	protected $campus_id;


	
	protected $title;


	
	protected $picture;


	
	protected $slug;


	
	protected $description;


	
	protected $notes;


	
	protected $keywords;


	
	protected $begin;


	
	protected $finish;


	
	protected $budget;


	
	protected $status;


	
	protected $applications;


	
	protected $season;


	
	protected $year;


	
	protected $scale;


	
	protected $commitment;


	
	protected $goals;


	
	protected $goals_complete;


	
	protected $hours_weekly;


	
	protected $hours_total;


	
	protected $published;


	
	protected $flagged_aup;


	
	protected $flagged_help;


	
	protected $main_form;


	
	protected $is_approved;


	
	protected $hits;


	
	protected $version;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByOwnerId;

	
	protected $aDepartment;

	
	protected $aCampus;

	
	protected $collProjectSettings;

	
	protected $lastProjectSettingCriteria = null;

	
	protected $collProjectForms;

	
	protected $lastProjectFormCriteria = null;

	
	protected $collProjectPositions;

	
	protected $lastProjectPositionCriteria = null;

	
	protected $collTasks;

	
	protected $lastTaskCriteria = null;

	
	protected $collUrls;

	
	protected $lastUrlCriteria = null;

	
	protected $collFeaturedProjects;

	
	protected $lastFeaturedProjectCriteria = null;

	
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

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getOwnerId()
	{

		return $this->owner_id;
	}

	
	public function getDepartmentId()
	{

		return $this->department_id;
	}

	
	public function getCampusId()
	{

		return $this->campus_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getPicture()
	{

		return $this->picture;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getNotes()
	{

		return $this->notes;
	}

	
	public function getKeywords()
	{

		return $this->keywords;
	}

	
	public function getBegin($format = 'Y-m-d')
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

	
	public function getFinish($format = 'Y-m-d')
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

	
	public function getBudget()
	{

		return $this->budget;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getApplications()
	{

		return $this->applications;
	}

	
	public function getSeason()
	{

		return $this->season;
	}

	
	public function getYear($format = 'Y-m-d')
	{

		if ($this->year === null || $this->year === '') {
			return null;
		} elseif (!is_int($this->year)) {
						$ts = strtotime($this->year);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [year] as date/time value: " . var_export($this->year, true));
			}
		} else {
			$ts = $this->year;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getScale()
	{

		return $this->scale;
	}

	
	public function getCommitment()
	{

		return $this->commitment;
	}

	
	public function getGoals()
	{

		return $this->goals;
	}

	
	public function getGoalsComplete()
	{

		return $this->goals_complete;
	}

	
	public function getHoursWeekly()
	{

		return $this->hours_weekly;
	}

	
	public function getHoursTotal()
	{

		return $this->hours_total;
	}

	
	public function getPublished()
	{

		return $this->published;
	}

	
	public function getFlaggedAup()
	{

		return $this->flagged_aup;
	}

	
	public function getFlaggedHelp()
	{

		return $this->flagged_help;
	}

	
	public function getMainForm()
	{

		return $this->main_form;
	}

	
	public function getIsApproved()
	{

		return $this->is_approved;
	}

	
	public function getHits()
	{

		return $this->hits;
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
			$this->modifiedColumns[] = ProjectPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = ProjectPeer::UUID;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ProjectPeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
		}

	} 
	
	public function setOwnerId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = ProjectPeer::OWNER_ID;
		}

		if ($this->asfGuardUserRelatedByOwnerId !== null && $this->asfGuardUserRelatedByOwnerId->getId() !== $v) {
			$this->asfGuardUserRelatedByOwnerId = null;
		}

	} 
	
	public function setDepartmentId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = ProjectPeer::DEPARTMENT_ID;
		}

		if ($this->aDepartment !== null && $this->aDepartment->getId() !== $v) {
			$this->aDepartment = null;
		}

	} 
	
	public function setCampusId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->campus_id !== $v) {
			$this->campus_id = $v;
			$this->modifiedColumns[] = ProjectPeer::CAMPUS_ID;
		}

		if ($this->aCampus !== null && $this->aCampus->getId() !== $v) {
			$this->aCampus = null;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ProjectPeer::TITLE;
		}

	} 
	
	public function setPicture($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->picture !== $v) {
			$this->picture = $v;
			$this->modifiedColumns[] = ProjectPeer::PICTURE;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = ProjectPeer::SLUG;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProjectPeer::DESCRIPTION;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = ProjectPeer::NOTES;
		}

	} 
	
	public function setKeywords($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keywords !== $v) {
			$this->keywords = $v;
			$this->modifiedColumns[] = ProjectPeer::KEYWORDS;
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
			$this->modifiedColumns[] = ProjectPeer::BEGIN;
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
			$this->modifiedColumns[] = ProjectPeer::FINISH;
		}

	} 
	
	public function setBudget($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget !== $v) {
			$this->budget = $v;
			$this->modifiedColumns[] = ProjectPeer::BUDGET;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ProjectPeer::STATUS;
		}

	} 
	
	public function setApplications($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->applications !== $v) {
			$this->applications = $v;
			$this->modifiedColumns[] = ProjectPeer::APPLICATIONS;
		}

	} 
	
	public function setSeason($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->season !== $v) {
			$this->season = $v;
			$this->modifiedColumns[] = ProjectPeer::SEASON;
		}

	} 
	
	public function setYear($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [year] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->year !== $ts) {
			$this->year = $ts;
			$this->modifiedColumns[] = ProjectPeer::YEAR;
		}

	} 
	
	public function setScale($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->scale !== $v) {
			$this->scale = $v;
			$this->modifiedColumns[] = ProjectPeer::SCALE;
		}

	} 
	
	public function setCommitment($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->commitment !== $v) {
			$this->commitment = $v;
			$this->modifiedColumns[] = ProjectPeer::COMMITMENT;
		}

	} 
	
	public function setGoals($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->goals !== $v) {
			$this->goals = $v;
			$this->modifiedColumns[] = ProjectPeer::GOALS;
		}

	} 
	
	public function setGoalsComplete($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->goals_complete !== $v) {
			$this->goals_complete = $v;
			$this->modifiedColumns[] = ProjectPeer::GOALS_COMPLETE;
		}

	} 
	
	public function setHoursWeekly($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hours_weekly !== $v) {
			$this->hours_weekly = $v;
			$this->modifiedColumns[] = ProjectPeer::HOURS_WEEKLY;
		}

	} 
	
	public function setHoursTotal($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hours_total !== $v) {
			$this->hours_total = $v;
			$this->modifiedColumns[] = ProjectPeer::HOURS_TOTAL;
		}

	} 
	
	public function setPublished($v)
	{

		if ($this->published !== $v) {
			$this->published = $v;
			$this->modifiedColumns[] = ProjectPeer::PUBLISHED;
		}

	} 
	
	public function setFlaggedAup($v)
	{

		if ($this->flagged_aup !== $v) {
			$this->flagged_aup = $v;
			$this->modifiedColumns[] = ProjectPeer::FLAGGED_AUP;
		}

	} 
	
	public function setFlaggedHelp($v)
	{

		if ($this->flagged_help !== $v) {
			$this->flagged_help = $v;
			$this->modifiedColumns[] = ProjectPeer::FLAGGED_HELP;
		}

	} 
	
	public function setMainForm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->main_form !== $v) {
			$this->main_form = $v;
			$this->modifiedColumns[] = ProjectPeer::MAIN_FORM;
		}

	} 
	
	public function setIsApproved($v)
	{

		if ($this->is_approved !== $v) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = ProjectPeer::IS_APPROVED;
		}

	} 
	
	public function setHits($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hits !== $v) {
			$this->hits = $v;
			$this->modifiedColumns[] = ProjectPeer::HITS;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = ProjectPeer::VERSION;
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
			$this->modifiedColumns[] = ProjectPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = ProjectPeer::DELETED_AT;
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
			$this->modifiedColumns[] = ProjectPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->created_by = $rs->getInt($startcol + 2);

			$this->owner_id = $rs->getInt($startcol + 3);

			$this->department_id = $rs->getInt($startcol + 4);

			$this->campus_id = $rs->getInt($startcol + 5);

			$this->title = $rs->getString($startcol + 6);

			$this->picture = $rs->getString($startcol + 7);

			$this->slug = $rs->getString($startcol + 8);

			$this->description = $rs->getString($startcol + 9);

			$this->notes = $rs->getString($startcol + 10);

			$this->keywords = $rs->getString($startcol + 11);

			$this->begin = $rs->getDate($startcol + 12, null);

			$this->finish = $rs->getDate($startcol + 13, null);

			$this->budget = $rs->getInt($startcol + 14);

			$this->status = $rs->getInt($startcol + 15);

			$this->applications = $rs->getInt($startcol + 16);

			$this->season = $rs->getInt($startcol + 17);

			$this->year = $rs->getDate($startcol + 18, null);

			$this->scale = $rs->getInt($startcol + 19);

			$this->commitment = $rs->getInt($startcol + 20);

			$this->goals = $rs->getInt($startcol + 21);

			$this->goals_complete = $rs->getInt($startcol + 22);

			$this->hours_weekly = $rs->getInt($startcol + 23);

			$this->hours_total = $rs->getInt($startcol + 24);

			$this->published = $rs->getBoolean($startcol + 25);

			$this->flagged_aup = $rs->getBoolean($startcol + 26);

			$this->flagged_help = $rs->getBoolean($startcol + 27);

			$this->main_form = $rs->getString($startcol + 28);

			$this->is_approved = $rs->getBoolean($startcol + 29);

			$this->hits = $rs->getInt($startcol + 30);

			$this->version = $rs->getInt($startcol + 31);

			$this->updated_at = $rs->getTimestamp($startcol + 32, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 33, null);

			$this->created_at = $rs->getTimestamp($startcol + 34, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 35; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Project object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProject:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProject:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProject:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(ProjectPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(ProjectPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProjectPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProject:save:post') as $callable)
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


												
			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if ($this->asfGuardUserRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
			}

			if ($this->asfGuardUserRelatedByOwnerId !== null) {
				if ($this->asfGuardUserRelatedByOwnerId->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByOwnerId->save($con);
				}
				$this->setsfGuardUserRelatedByOwnerId($this->asfGuardUserRelatedByOwnerId);
			}

			if ($this->aDepartment !== null) {
				if ($this->aDepartment->isModified()) {
					$affectedRows += $this->aDepartment->save($con);
				}
				$this->setDepartment($this->aDepartment);
			}

			if ($this->aCampus !== null) {
				if ($this->aCampus->isModified()) {
					$affectedRows += $this->aCampus->save($con);
				}
				$this->setCampus($this->aCampus);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProjectPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collProjectSettings !== null) {
				foreach($this->collProjectSettings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectForms !== null) {
				foreach($this->collProjectForms as $referrerFK) {
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

			if ($this->collTasks !== null) {
				foreach($this->collTasks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUrls !== null) {
				foreach($this->collUrls as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFeaturedProjects !== null) {
				foreach($this->collFeaturedProjects as $referrerFK) {
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


												
			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByOwnerId !== null) {
				if (!$this->asfGuardUserRelatedByOwnerId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByOwnerId->getValidationFailures());
				}
			}

			if ($this->aDepartment !== null) {
				if (!$this->aDepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
				}
			}

			if ($this->aCampus !== null) {
				if (!$this->aCampus->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCampus->getValidationFailures());
				}
			}


			if (($retval = ProjectPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProjectSettings !== null) {
					foreach($this->collProjectSettings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectForms !== null) {
					foreach($this->collProjectForms as $referrerFK) {
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

				if ($this->collTasks !== null) {
					foreach($this->collTasks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUrls !== null) {
					foreach($this->collUrls as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFeaturedProjects !== null) {
					foreach($this->collFeaturedProjects as $referrerFK) {
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
		$pos = ProjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCreatedBy();
				break;
			case 3:
				return $this->getOwnerId();
				break;
			case 4:
				return $this->getDepartmentId();
				break;
			case 5:
				return $this->getCampusId();
				break;
			case 6:
				return $this->getTitle();
				break;
			case 7:
				return $this->getPicture();
				break;
			case 8:
				return $this->getSlug();
				break;
			case 9:
				return $this->getDescription();
				break;
			case 10:
				return $this->getNotes();
				break;
			case 11:
				return $this->getKeywords();
				break;
			case 12:
				return $this->getBegin();
				break;
			case 13:
				return $this->getFinish();
				break;
			case 14:
				return $this->getBudget();
				break;
			case 15:
				return $this->getStatus();
				break;
			case 16:
				return $this->getApplications();
				break;
			case 17:
				return $this->getSeason();
				break;
			case 18:
				return $this->getYear();
				break;
			case 19:
				return $this->getScale();
				break;
			case 20:
				return $this->getCommitment();
				break;
			case 21:
				return $this->getGoals();
				break;
			case 22:
				return $this->getGoalsComplete();
				break;
			case 23:
				return $this->getHoursWeekly();
				break;
			case 24:
				return $this->getHoursTotal();
				break;
			case 25:
				return $this->getPublished();
				break;
			case 26:
				return $this->getFlaggedAup();
				break;
			case 27:
				return $this->getFlaggedHelp();
				break;
			case 28:
				return $this->getMainForm();
				break;
			case 29:
				return $this->getIsApproved();
				break;
			case 30:
				return $this->getHits();
				break;
			case 31:
				return $this->getVersion();
				break;
			case 32:
				return $this->getUpdatedAt();
				break;
			case 33:
				return $this->getDeletedAt();
				break;
			case 34:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getCreatedBy(),
			$keys[3] => $this->getOwnerId(),
			$keys[4] => $this->getDepartmentId(),
			$keys[5] => $this->getCampusId(),
			$keys[6] => $this->getTitle(),
			$keys[7] => $this->getPicture(),
			$keys[8] => $this->getSlug(),
			$keys[9] => $this->getDescription(),
			$keys[10] => $this->getNotes(),
			$keys[11] => $this->getKeywords(),
			$keys[12] => $this->getBegin(),
			$keys[13] => $this->getFinish(),
			$keys[14] => $this->getBudget(),
			$keys[15] => $this->getStatus(),
			$keys[16] => $this->getApplications(),
			$keys[17] => $this->getSeason(),
			$keys[18] => $this->getYear(),
			$keys[19] => $this->getScale(),
			$keys[20] => $this->getCommitment(),
			$keys[21] => $this->getGoals(),
			$keys[22] => $this->getGoalsComplete(),
			$keys[23] => $this->getHoursWeekly(),
			$keys[24] => $this->getHoursTotal(),
			$keys[25] => $this->getPublished(),
			$keys[26] => $this->getFlaggedAup(),
			$keys[27] => $this->getFlaggedHelp(),
			$keys[28] => $this->getMainForm(),
			$keys[29] => $this->getIsApproved(),
			$keys[30] => $this->getHits(),
			$keys[31] => $this->getVersion(),
			$keys[32] => $this->getUpdatedAt(),
			$keys[33] => $this->getDeletedAt(),
			$keys[34] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCreatedBy($value);
				break;
			case 3:
				$this->setOwnerId($value);
				break;
			case 4:
				$this->setDepartmentId($value);
				break;
			case 5:
				$this->setCampusId($value);
				break;
			case 6:
				$this->setTitle($value);
				break;
			case 7:
				$this->setPicture($value);
				break;
			case 8:
				$this->setSlug($value);
				break;
			case 9:
				$this->setDescription($value);
				break;
			case 10:
				$this->setNotes($value);
				break;
			case 11:
				$this->setKeywords($value);
				break;
			case 12:
				$this->setBegin($value);
				break;
			case 13:
				$this->setFinish($value);
				break;
			case 14:
				$this->setBudget($value);
				break;
			case 15:
				$this->setStatus($value);
				break;
			case 16:
				$this->setApplications($value);
				break;
			case 17:
				$this->setSeason($value);
				break;
			case 18:
				$this->setYear($value);
				break;
			case 19:
				$this->setScale($value);
				break;
			case 20:
				$this->setCommitment($value);
				break;
			case 21:
				$this->setGoals($value);
				break;
			case 22:
				$this->setGoalsComplete($value);
				break;
			case 23:
				$this->setHoursWeekly($value);
				break;
			case 24:
				$this->setHoursTotal($value);
				break;
			case 25:
				$this->setPublished($value);
				break;
			case 26:
				$this->setFlaggedAup($value);
				break;
			case 27:
				$this->setFlaggedHelp($value);
				break;
			case 28:
				$this->setMainForm($value);
				break;
			case 29:
				$this->setIsApproved($value);
				break;
			case 30:
				$this->setHits($value);
				break;
			case 31:
				$this->setVersion($value);
				break;
			case 32:
				$this->setUpdatedAt($value);
				break;
			case 33:
				$this->setDeletedAt($value);
				break;
			case 34:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedBy($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOwnerId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepartmentId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCampusId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTitle($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPicture($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSlug($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDescription($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNotes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setKeywords($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setBegin($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFinish($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBudget($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStatus($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setApplications($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSeason($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setYear($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setScale($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCommitment($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setGoals($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setGoalsComplete($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setHoursWeekly($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setHoursTotal($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPublished($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFlaggedAup($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFlaggedHelp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setMainForm($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setIsApproved($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setHits($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setVersion($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setUpdatedAt($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setDeletedAt($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCreatedAt($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectPeer::ID)) $criteria->add(ProjectPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectPeer::UUID)) $criteria->add(ProjectPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ProjectPeer::CREATED_BY)) $criteria->add(ProjectPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ProjectPeer::OWNER_ID)) $criteria->add(ProjectPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(ProjectPeer::DEPARTMENT_ID)) $criteria->add(ProjectPeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(ProjectPeer::CAMPUS_ID)) $criteria->add(ProjectPeer::CAMPUS_ID, $this->campus_id);
		if ($this->isColumnModified(ProjectPeer::TITLE)) $criteria->add(ProjectPeer::TITLE, $this->title);
		if ($this->isColumnModified(ProjectPeer::PICTURE)) $criteria->add(ProjectPeer::PICTURE, $this->picture);
		if ($this->isColumnModified(ProjectPeer::SLUG)) $criteria->add(ProjectPeer::SLUG, $this->slug);
		if ($this->isColumnModified(ProjectPeer::DESCRIPTION)) $criteria->add(ProjectPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProjectPeer::NOTES)) $criteria->add(ProjectPeer::NOTES, $this->notes);
		if ($this->isColumnModified(ProjectPeer::KEYWORDS)) $criteria->add(ProjectPeer::KEYWORDS, $this->keywords);
		if ($this->isColumnModified(ProjectPeer::BEGIN)) $criteria->add(ProjectPeer::BEGIN, $this->begin);
		if ($this->isColumnModified(ProjectPeer::FINISH)) $criteria->add(ProjectPeer::FINISH, $this->finish);
		if ($this->isColumnModified(ProjectPeer::BUDGET)) $criteria->add(ProjectPeer::BUDGET, $this->budget);
		if ($this->isColumnModified(ProjectPeer::STATUS)) $criteria->add(ProjectPeer::STATUS, $this->status);
		if ($this->isColumnModified(ProjectPeer::APPLICATIONS)) $criteria->add(ProjectPeer::APPLICATIONS, $this->applications);
		if ($this->isColumnModified(ProjectPeer::SEASON)) $criteria->add(ProjectPeer::SEASON, $this->season);
		if ($this->isColumnModified(ProjectPeer::YEAR)) $criteria->add(ProjectPeer::YEAR, $this->year);
		if ($this->isColumnModified(ProjectPeer::SCALE)) $criteria->add(ProjectPeer::SCALE, $this->scale);
		if ($this->isColumnModified(ProjectPeer::COMMITMENT)) $criteria->add(ProjectPeer::COMMITMENT, $this->commitment);
		if ($this->isColumnModified(ProjectPeer::GOALS)) $criteria->add(ProjectPeer::GOALS, $this->goals);
		if ($this->isColumnModified(ProjectPeer::GOALS_COMPLETE)) $criteria->add(ProjectPeer::GOALS_COMPLETE, $this->goals_complete);
		if ($this->isColumnModified(ProjectPeer::HOURS_WEEKLY)) $criteria->add(ProjectPeer::HOURS_WEEKLY, $this->hours_weekly);
		if ($this->isColumnModified(ProjectPeer::HOURS_TOTAL)) $criteria->add(ProjectPeer::HOURS_TOTAL, $this->hours_total);
		if ($this->isColumnModified(ProjectPeer::PUBLISHED)) $criteria->add(ProjectPeer::PUBLISHED, $this->published);
		if ($this->isColumnModified(ProjectPeer::FLAGGED_AUP)) $criteria->add(ProjectPeer::FLAGGED_AUP, $this->flagged_aup);
		if ($this->isColumnModified(ProjectPeer::FLAGGED_HELP)) $criteria->add(ProjectPeer::FLAGGED_HELP, $this->flagged_help);
		if ($this->isColumnModified(ProjectPeer::MAIN_FORM)) $criteria->add(ProjectPeer::MAIN_FORM, $this->main_form);
		if ($this->isColumnModified(ProjectPeer::IS_APPROVED)) $criteria->add(ProjectPeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(ProjectPeer::HITS)) $criteria->add(ProjectPeer::HITS, $this->hits);
		if ($this->isColumnModified(ProjectPeer::VERSION)) $criteria->add(ProjectPeer::VERSION, $this->version);
		if ($this->isColumnModified(ProjectPeer::UPDATED_AT)) $criteria->add(ProjectPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ProjectPeer::DELETED_AT)) $criteria->add(ProjectPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ProjectPeer::CREATED_AT)) $criteria->add(ProjectPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectPeer::DATABASE_NAME);

		$criteria->add(ProjectPeer::ID, $this->id);

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

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setOwnerId($this->owner_id);

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setCampusId($this->campus_id);

		$copyObj->setTitle($this->title);

		$copyObj->setPicture($this->picture);

		$copyObj->setSlug($this->slug);

		$copyObj->setDescription($this->description);

		$copyObj->setNotes($this->notes);

		$copyObj->setKeywords($this->keywords);

		$copyObj->setBegin($this->begin);

		$copyObj->setFinish($this->finish);

		$copyObj->setBudget($this->budget);

		$copyObj->setStatus($this->status);

		$copyObj->setApplications($this->applications);

		$copyObj->setSeason($this->season);

		$copyObj->setYear($this->year);

		$copyObj->setScale($this->scale);

		$copyObj->setCommitment($this->commitment);

		$copyObj->setGoals($this->goals);

		$copyObj->setGoalsComplete($this->goals_complete);

		$copyObj->setHoursWeekly($this->hours_weekly);

		$copyObj->setHoursTotal($this->hours_total);

		$copyObj->setPublished($this->published);

		$copyObj->setFlaggedAup($this->flagged_aup);

		$copyObj->setFlaggedHelp($this->flagged_help);

		$copyObj->setMainForm($this->main_form);

		$copyObj->setIsApproved($this->is_approved);

		$copyObj->setHits($this->hits);

		$copyObj->setVersion($this->version);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setDeletedAt($this->deleted_at);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getProjectSettings() as $relObj) {
				$copyObj->addProjectSetting($relObj->copy($deepCopy));
			}

			foreach($this->getProjectForms() as $relObj) {
				$copyObj->addProjectForm($relObj->copy($deepCopy));
			}

			foreach($this->getProjectPositions() as $relObj) {
				$copyObj->addProjectPosition($relObj->copy($deepCopy));
			}

			foreach($this->getTasks() as $relObj) {
				$copyObj->addTask($relObj->copy($deepCopy));
			}

			foreach($this->getUrls() as $relObj) {
				$copyObj->addUrl($relObj->copy($deepCopy));
			}

			foreach($this->getFeaturedProjects() as $relObj) {
				$copyObj->addFeaturedProject($relObj->copy($deepCopy));
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
			self::$peer = new ProjectPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy(NULL);
		} else {
			$this->setCreatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByCreatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByCreatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByCreatedBy = sfGuardUserPeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->asfGuardUserRelatedByCreatedBy;
	}

	
	public function setsfGuardUserRelatedByOwnerId($v)
	{


		if ($v === null) {
			$this->setOwnerId(NULL);
		} else {
			$this->setOwnerId($v->getId());
		}


		$this->asfGuardUserRelatedByOwnerId = $v;
	}


	
	public function getsfGuardUserRelatedByOwnerId($con = null)
	{
		if ($this->asfGuardUserRelatedByOwnerId === null && ($this->owner_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByOwnerId = sfGuardUserPeer::retrieveByPK($this->owner_id, $con);

			
		}
		return $this->asfGuardUserRelatedByOwnerId;
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

	
	public function initProjectSettings()
	{
		if ($this->collProjectSettings === null) {
			$this->collProjectSettings = array();
		}
	}

	
	public function getProjectSettings($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectSettingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectSettings === null) {
			if ($this->isNew()) {
			   $this->collProjectSettings = array();
			} else {

				$criteria->add(ProjectSettingPeer::PROJECT_ID, $this->getId());

				ProjectSettingPeer::addSelectColumns($criteria);
				$this->collProjectSettings = ProjectSettingPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectSettingPeer::PROJECT_ID, $this->getId());

				ProjectSettingPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectSettingCriteria) || !$this->lastProjectSettingCriteria->equals($criteria)) {
					$this->collProjectSettings = ProjectSettingPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectSettingCriteria = $criteria;
		return $this->collProjectSettings;
	}

	
	public function countProjectSettings($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectSettingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectSettingPeer::PROJECT_ID, $this->getId());

		return ProjectSettingPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectSetting(ProjectSetting $l)
	{
		$this->collProjectSettings[] = $l;
		$l->setProject($this);
	}

	
	public function initProjectForms()
	{
		if ($this->collProjectForms === null) {
			$this->collProjectForms = array();
		}
	}

	
	public function getProjectForms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectForms === null) {
			if ($this->isNew()) {
			   $this->collProjectForms = array();
			} else {

				$criteria->add(ProjectFormPeer::PROJECT_ID, $this->getId());

				ProjectFormPeer::addSelectColumns($criteria);
				$this->collProjectForms = ProjectFormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectFormPeer::PROJECT_ID, $this->getId());

				ProjectFormPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectFormCriteria) || !$this->lastProjectFormCriteria->equals($criteria)) {
					$this->collProjectForms = ProjectFormPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectFormCriteria = $criteria;
		return $this->collProjectForms;
	}

	
	public function countProjectForms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectFormPeer::PROJECT_ID, $this->getId());

		return ProjectFormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectForm(ProjectForm $l)
	{
		$this->collProjectForms[] = $l;
		$l->setProject($this);
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

				$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

				ProjectPositionPeer::addSelectColumns($criteria);
				$this->collProjectPositions = ProjectPositionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

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

		$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

		return ProjectPositionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectPosition(ProjectPosition $l)
	{
		$this->collProjectPositions[] = $l;
		$l->setProject($this);
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

				$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

			if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastProjectPositionCriteria = $criteria;

		return $this->collProjectPositions;
	}


	
	public function getProjectPositionsJoinCampus($criteria = null, $con = null)
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

				$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPositionPeer::PROJECT_ID, $this->getId());

			if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectPositionCriteria = $criteria;

		return $this->collProjectPositions;
	}

	
	public function initTasks()
	{
		if ($this->collTasks === null) {
			$this->collTasks = array();
		}
	}

	
	public function getTasks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
			   $this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::PROJECT_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasks = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::PROJECT_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
					$this->collTasks = TaskPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTaskCriteria = $criteria;
		return $this->collTasks;
	}

	
	public function countTasks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TaskPeer::PROJECT_ID, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTask(Task $l)
	{
		$this->collTasks[] = $l;
		$l->setProject($this);
	}


	
	public function getTasksJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTaskPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTasks === null) {
			if ($this->isNew()) {
				$this->collTasks = array();
			} else {

				$criteria->add(TaskPeer::PROJECT_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::PROJECT_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}

	
	public function initUrls()
	{
		if ($this->collUrls === null) {
			$this->collUrls = array();
		}
	}

	
	public function getUrls($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUrlPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUrls === null) {
			if ($this->isNew()) {
			   $this->collUrls = array();
			} else {

				$criteria->add(UrlPeer::PROJECT_ID, $this->getId());

				UrlPeer::addSelectColumns($criteria);
				$this->collUrls = UrlPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UrlPeer::PROJECT_ID, $this->getId());

				UrlPeer::addSelectColumns($criteria);
				if (!isset($this->lastUrlCriteria) || !$this->lastUrlCriteria->equals($criteria)) {
					$this->collUrls = UrlPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUrlCriteria = $criteria;
		return $this->collUrls;
	}

	
	public function countUrls($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUrlPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UrlPeer::PROJECT_ID, $this->getId());

		return UrlPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUrl(Url $l)
	{
		$this->collUrls[] = $l;
		$l->setProject($this);
	}

	
	public function initFeaturedProjects()
	{
		if ($this->collFeaturedProjects === null) {
			$this->collFeaturedProjects = array();
		}
	}

	
	public function getFeaturedProjects($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFeaturedProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFeaturedProjects === null) {
			if ($this->isNew()) {
			   $this->collFeaturedProjects = array();
			} else {

				$criteria->add(FeaturedProjectPeer::PROJECT_ID, $this->getId());

				FeaturedProjectPeer::addSelectColumns($criteria);
				$this->collFeaturedProjects = FeaturedProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FeaturedProjectPeer::PROJECT_ID, $this->getId());

				FeaturedProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastFeaturedProjectCriteria) || !$this->lastFeaturedProjectCriteria->equals($criteria)) {
					$this->collFeaturedProjects = FeaturedProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFeaturedProjectCriteria = $criteria;
		return $this->collFeaturedProjects;
	}

	
	public function countFeaturedProjects($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFeaturedProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FeaturedProjectPeer::PROJECT_ID, $this->getId());

		return FeaturedProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFeaturedProject(FeaturedProject $l)
	{
		$this->collFeaturedProjects[] = $l;
		$l->setProject($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProject:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProject::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 