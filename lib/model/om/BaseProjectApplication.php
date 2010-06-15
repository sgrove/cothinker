<?php


abstract class BaseProjectApplication extends BaseObject  implements Persistent {


	
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


	
	protected $community_benefits;


	
	protected $student_reasons;


	
	protected $keywords;


	
	protected $begin;


	
	protected $finish;


	
	protected $budget;


	
	protected $status;


	
	protected $applications;


	
	protected $season;


	
	protected $length;


	
	protected $preferred_term_length;


	
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


	
	protected $page1_complete;


	
	protected $page2_complete;


	
	protected $page3_complete;


	
	protected $page4_complete;


	
	protected $liability;


	
	protected $liability_details;


	
	protected $profit;


	
	protected $profit_details;


	
	protected $is_approved;


	
	protected $points;


	
	protected $approved_by;


	
	protected $hits;


	
	protected $version;


	
	protected $updated_at;


	
	protected $deleted_at;


	
	protected $created_at;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByOwnerId;

	
	protected $aDepartment;

	
	protected $aCampus;

	
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

	
	public function getCommunityBenefits()
	{

		return $this->community_benefits;
	}

	
	public function getStudentReasons()
	{

		return $this->student_reasons;
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

	
	public function getLength()
	{

		return $this->length;
	}

	
	public function getPreferredTermLength()
	{

		return $this->preferred_term_length;
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

	
	public function getPage1Complete()
	{

		return $this->page1_complete;
	}

	
	public function getPage2Complete()
	{

		return $this->page2_complete;
	}

	
	public function getPage3Complete()
	{

		return $this->page3_complete;
	}

	
	public function getPage4Complete()
	{

		return $this->page4_complete;
	}

	
	public function getLiability()
	{

		return $this->liability;
	}

	
	public function getLiabilityDetails()
	{

		return $this->liability_details;
	}

	
	public function getProfit()
	{

		return $this->profit;
	}

	
	public function getProfitDetails()
	{

		return $this->profit_details;
	}

	
	public function getIsApproved()
	{

		return $this->is_approved;
	}

	
	public function getPoints()
	{

		return $this->points;
	}

	
	public function getApprovedBy()
	{

		return $this->approved_by;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::UUID;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::OWNER_ID;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::DEPARTMENT_ID;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::CAMPUS_ID;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::TITLE;
		}

	} 
	
	public function setPicture($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->picture !== $v) {
			$this->picture = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PICTURE;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::SLUG;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::DESCRIPTION;
		}

	} 
	
	public function setNotes($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::NOTES;
		}

	} 
	
	public function setCommunityBenefits($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->community_benefits !== $v) {
			$this->community_benefits = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::COMMUNITY_BENEFITS;
		}

	} 
	
	public function setStudentReasons($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->student_reasons !== $v) {
			$this->student_reasons = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::STUDENT_REASONS;
		}

	} 
	
	public function setKeywords($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keywords !== $v) {
			$this->keywords = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::KEYWORDS;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::BEGIN;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::FINISH;
		}

	} 
	
	public function setBudget($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->budget !== $v) {
			$this->budget = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::BUDGET;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::STATUS;
		}

	} 
	
	public function setApplications($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->applications !== $v) {
			$this->applications = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::APPLICATIONS;
		}

	} 
	
	public function setSeason($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->season !== $v) {
			$this->season = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::SEASON;
		}

	} 
	
	public function setLength($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->length !== $v) {
			$this->length = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::LENGTH;
		}

	} 
	
	public function setPreferredTermLength($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->preferred_term_length !== $v) {
			$this->preferred_term_length = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PREFERRED_TERM_LENGTH;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::YEAR;
		}

	} 
	
	public function setScale($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->scale !== $v) {
			$this->scale = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::SCALE;
		}

	} 
	
	public function setCommitment($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->commitment !== $v) {
			$this->commitment = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::COMMITMENT;
		}

	} 
	
	public function setGoals($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->goals !== $v) {
			$this->goals = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::GOALS;
		}

	} 
	
	public function setGoalsComplete($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->goals_complete !== $v) {
			$this->goals_complete = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::GOALS_COMPLETE;
		}

	} 
	
	public function setHoursWeekly($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hours_weekly !== $v) {
			$this->hours_weekly = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::HOURS_WEEKLY;
		}

	} 
	
	public function setHoursTotal($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hours_total !== $v) {
			$this->hours_total = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::HOURS_TOTAL;
		}

	} 
	
	public function setPublished($v)
	{

		if ($this->published !== $v) {
			$this->published = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PUBLISHED;
		}

	} 
	
	public function setFlaggedAup($v)
	{

		if ($this->flagged_aup !== $v) {
			$this->flagged_aup = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::FLAGGED_AUP;
		}

	} 
	
	public function setFlaggedHelp($v)
	{

		if ($this->flagged_help !== $v) {
			$this->flagged_help = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::FLAGGED_HELP;
		}

	} 
	
	public function setPage1Complete($v)
	{

		if ($this->page1_complete !== $v) {
			$this->page1_complete = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PAGE1_COMPLETE;
		}

	} 
	
	public function setPage2Complete($v)
	{

		if ($this->page2_complete !== $v) {
			$this->page2_complete = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PAGE2_COMPLETE;
		}

	} 
	
	public function setPage3Complete($v)
	{

		if ($this->page3_complete !== $v) {
			$this->page3_complete = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PAGE3_COMPLETE;
		}

	} 
	
	public function setPage4Complete($v)
	{

		if ($this->page4_complete !== $v) {
			$this->page4_complete = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PAGE4_COMPLETE;
		}

	} 
	
	public function setLiability($v)
	{

		if ($this->liability !== $v) {
			$this->liability = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::LIABILITY;
		}

	} 
	
	public function setLiabilityDetails($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->liability_details !== $v) {
			$this->liability_details = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::LIABILITY_DETAILS;
		}

	} 
	
	public function setProfit($v)
	{

		if ($this->profit !== $v) {
			$this->profit = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PROFIT;
		}

	} 
	
	public function setProfitDetails($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->profit_details !== $v) {
			$this->profit_details = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::PROFIT_DETAILS;
		}

	} 
	
	public function setIsApproved($v)
	{

		if ($this->is_approved !== $v) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::IS_APPROVED;
		}

	} 
	
	public function setPoints($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->points !== $v) {
			$this->points = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::POINTS;
		}

	} 
	
	public function setApprovedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->approved_by !== $v) {
			$this->approved_by = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::APPROVED_BY;
		}

	} 
	
	public function setHits($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hits !== $v) {
			$this->hits = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::HITS;
		}

	} 
	
	public function setVersion($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = ProjectApplicationPeer::VERSION;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::UPDATED_AT;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::DELETED_AT;
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
			$this->modifiedColumns[] = ProjectApplicationPeer::CREATED_AT;
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

			$this->community_benefits = $rs->getString($startcol + 11);

			$this->student_reasons = $rs->getString($startcol + 12);

			$this->keywords = $rs->getString($startcol + 13);

			$this->begin = $rs->getDate($startcol + 14, null);

			$this->finish = $rs->getDate($startcol + 15, null);

			$this->budget = $rs->getInt($startcol + 16);

			$this->status = $rs->getInt($startcol + 17);

			$this->applications = $rs->getInt($startcol + 18);

			$this->season = $rs->getInt($startcol + 19);

			$this->length = $rs->getInt($startcol + 20);

			$this->preferred_term_length = $rs->getInt($startcol + 21);

			$this->year = $rs->getDate($startcol + 22, null);

			$this->scale = $rs->getInt($startcol + 23);

			$this->commitment = $rs->getInt($startcol + 24);

			$this->goals = $rs->getInt($startcol + 25);

			$this->goals_complete = $rs->getInt($startcol + 26);

			$this->hours_weekly = $rs->getInt($startcol + 27);

			$this->hours_total = $rs->getInt($startcol + 28);

			$this->published = $rs->getBoolean($startcol + 29);

			$this->flagged_aup = $rs->getBoolean($startcol + 30);

			$this->flagged_help = $rs->getBoolean($startcol + 31);

			$this->page1_complete = $rs->getBoolean($startcol + 32);

			$this->page2_complete = $rs->getBoolean($startcol + 33);

			$this->page3_complete = $rs->getBoolean($startcol + 34);

			$this->page4_complete = $rs->getBoolean($startcol + 35);

			$this->liability = $rs->getBoolean($startcol + 36);

			$this->liability_details = $rs->getString($startcol + 37);

			$this->profit = $rs->getBoolean($startcol + 38);

			$this->profit_details = $rs->getString($startcol + 39);

			$this->is_approved = $rs->getBoolean($startcol + 40);

			$this->points = $rs->getInt($startcol + 41);

			$this->approved_by = $rs->getString($startcol + 42);

			$this->hits = $rs->getInt($startcol + 43);

			$this->version = $rs->getInt($startcol + 44);

			$this->updated_at = $rs->getTimestamp($startcol + 45, null);

			$this->deleted_at = $rs->getTimestamp($startcol + 46, null);

			$this->created_at = $rs->getTimestamp($startcol + 47, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 48; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ProjectApplication object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplication:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectApplicationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectApplicationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProjectApplication:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectApplication:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isModified() && !$this->isColumnModified(ProjectApplicationPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(ProjectApplicationPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProjectApplicationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProjectApplication:save:post') as $callable)
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
					$pk = ProjectApplicationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectApplicationPeer::doUpdate($this, $con);
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


			if (($retval = ProjectApplicationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectApplicationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCommunityBenefits();
				break;
			case 12:
				return $this->getStudentReasons();
				break;
			case 13:
				return $this->getKeywords();
				break;
			case 14:
				return $this->getBegin();
				break;
			case 15:
				return $this->getFinish();
				break;
			case 16:
				return $this->getBudget();
				break;
			case 17:
				return $this->getStatus();
				break;
			case 18:
				return $this->getApplications();
				break;
			case 19:
				return $this->getSeason();
				break;
			case 20:
				return $this->getLength();
				break;
			case 21:
				return $this->getPreferredTermLength();
				break;
			case 22:
				return $this->getYear();
				break;
			case 23:
				return $this->getScale();
				break;
			case 24:
				return $this->getCommitment();
				break;
			case 25:
				return $this->getGoals();
				break;
			case 26:
				return $this->getGoalsComplete();
				break;
			case 27:
				return $this->getHoursWeekly();
				break;
			case 28:
				return $this->getHoursTotal();
				break;
			case 29:
				return $this->getPublished();
				break;
			case 30:
				return $this->getFlaggedAup();
				break;
			case 31:
				return $this->getFlaggedHelp();
				break;
			case 32:
				return $this->getPage1Complete();
				break;
			case 33:
				return $this->getPage2Complete();
				break;
			case 34:
				return $this->getPage3Complete();
				break;
			case 35:
				return $this->getPage4Complete();
				break;
			case 36:
				return $this->getLiability();
				break;
			case 37:
				return $this->getLiabilityDetails();
				break;
			case 38:
				return $this->getProfit();
				break;
			case 39:
				return $this->getProfitDetails();
				break;
			case 40:
				return $this->getIsApproved();
				break;
			case 41:
				return $this->getPoints();
				break;
			case 42:
				return $this->getApprovedBy();
				break;
			case 43:
				return $this->getHits();
				break;
			case 44:
				return $this->getVersion();
				break;
			case 45:
				return $this->getUpdatedAt();
				break;
			case 46:
				return $this->getDeletedAt();
				break;
			case 47:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectApplicationPeer::getFieldNames($keyType);
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
			$keys[11] => $this->getCommunityBenefits(),
			$keys[12] => $this->getStudentReasons(),
			$keys[13] => $this->getKeywords(),
			$keys[14] => $this->getBegin(),
			$keys[15] => $this->getFinish(),
			$keys[16] => $this->getBudget(),
			$keys[17] => $this->getStatus(),
			$keys[18] => $this->getApplications(),
			$keys[19] => $this->getSeason(),
			$keys[20] => $this->getLength(),
			$keys[21] => $this->getPreferredTermLength(),
			$keys[22] => $this->getYear(),
			$keys[23] => $this->getScale(),
			$keys[24] => $this->getCommitment(),
			$keys[25] => $this->getGoals(),
			$keys[26] => $this->getGoalsComplete(),
			$keys[27] => $this->getHoursWeekly(),
			$keys[28] => $this->getHoursTotal(),
			$keys[29] => $this->getPublished(),
			$keys[30] => $this->getFlaggedAup(),
			$keys[31] => $this->getFlaggedHelp(),
			$keys[32] => $this->getPage1Complete(),
			$keys[33] => $this->getPage2Complete(),
			$keys[34] => $this->getPage3Complete(),
			$keys[35] => $this->getPage4Complete(),
			$keys[36] => $this->getLiability(),
			$keys[37] => $this->getLiabilityDetails(),
			$keys[38] => $this->getProfit(),
			$keys[39] => $this->getProfitDetails(),
			$keys[40] => $this->getIsApproved(),
			$keys[41] => $this->getPoints(),
			$keys[42] => $this->getApprovedBy(),
			$keys[43] => $this->getHits(),
			$keys[44] => $this->getVersion(),
			$keys[45] => $this->getUpdatedAt(),
			$keys[46] => $this->getDeletedAt(),
			$keys[47] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectApplicationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCommunityBenefits($value);
				break;
			case 12:
				$this->setStudentReasons($value);
				break;
			case 13:
				$this->setKeywords($value);
				break;
			case 14:
				$this->setBegin($value);
				break;
			case 15:
				$this->setFinish($value);
				break;
			case 16:
				$this->setBudget($value);
				break;
			case 17:
				$this->setStatus($value);
				break;
			case 18:
				$this->setApplications($value);
				break;
			case 19:
				$this->setSeason($value);
				break;
			case 20:
				$this->setLength($value);
				break;
			case 21:
				$this->setPreferredTermLength($value);
				break;
			case 22:
				$this->setYear($value);
				break;
			case 23:
				$this->setScale($value);
				break;
			case 24:
				$this->setCommitment($value);
				break;
			case 25:
				$this->setGoals($value);
				break;
			case 26:
				$this->setGoalsComplete($value);
				break;
			case 27:
				$this->setHoursWeekly($value);
				break;
			case 28:
				$this->setHoursTotal($value);
				break;
			case 29:
				$this->setPublished($value);
				break;
			case 30:
				$this->setFlaggedAup($value);
				break;
			case 31:
				$this->setFlaggedHelp($value);
				break;
			case 32:
				$this->setPage1Complete($value);
				break;
			case 33:
				$this->setPage2Complete($value);
				break;
			case 34:
				$this->setPage3Complete($value);
				break;
			case 35:
				$this->setPage4Complete($value);
				break;
			case 36:
				$this->setLiability($value);
				break;
			case 37:
				$this->setLiabilityDetails($value);
				break;
			case 38:
				$this->setProfit($value);
				break;
			case 39:
				$this->setProfitDetails($value);
				break;
			case 40:
				$this->setIsApproved($value);
				break;
			case 41:
				$this->setPoints($value);
				break;
			case 42:
				$this->setApprovedBy($value);
				break;
			case 43:
				$this->setHits($value);
				break;
			case 44:
				$this->setVersion($value);
				break;
			case 45:
				$this->setUpdatedAt($value);
				break;
			case 46:
				$this->setDeletedAt($value);
				break;
			case 47:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectApplicationPeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[11], $arr)) $this->setCommunityBenefits($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStudentReasons($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setKeywords($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBegin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFinish($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBudget($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStatus($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setApplications($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setSeason($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setLength($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPreferredTermLength($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setYear($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setScale($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCommitment($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setGoals($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setGoalsComplete($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setHoursWeekly($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setHoursTotal($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setPublished($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFlaggedAup($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setFlaggedHelp($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setPage1Complete($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setPage2Complete($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setPage3Complete($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setPage4Complete($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setLiability($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setLiabilityDetails($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setProfit($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setProfitDetails($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setIsApproved($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setPoints($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setApprovedBy($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setHits($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setVersion($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setUpdatedAt($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setDeletedAt($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setCreatedAt($arr[$keys[47]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectApplicationPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectApplicationPeer::ID)) $criteria->add(ProjectApplicationPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectApplicationPeer::UUID)) $criteria->add(ProjectApplicationPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ProjectApplicationPeer::CREATED_BY)) $criteria->add(ProjectApplicationPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ProjectApplicationPeer::OWNER_ID)) $criteria->add(ProjectApplicationPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(ProjectApplicationPeer::DEPARTMENT_ID)) $criteria->add(ProjectApplicationPeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(ProjectApplicationPeer::CAMPUS_ID)) $criteria->add(ProjectApplicationPeer::CAMPUS_ID, $this->campus_id);
		if ($this->isColumnModified(ProjectApplicationPeer::TITLE)) $criteria->add(ProjectApplicationPeer::TITLE, $this->title);
		if ($this->isColumnModified(ProjectApplicationPeer::PICTURE)) $criteria->add(ProjectApplicationPeer::PICTURE, $this->picture);
		if ($this->isColumnModified(ProjectApplicationPeer::SLUG)) $criteria->add(ProjectApplicationPeer::SLUG, $this->slug);
		if ($this->isColumnModified(ProjectApplicationPeer::DESCRIPTION)) $criteria->add(ProjectApplicationPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProjectApplicationPeer::NOTES)) $criteria->add(ProjectApplicationPeer::NOTES, $this->notes);
		if ($this->isColumnModified(ProjectApplicationPeer::COMMUNITY_BENEFITS)) $criteria->add(ProjectApplicationPeer::COMMUNITY_BENEFITS, $this->community_benefits);
		if ($this->isColumnModified(ProjectApplicationPeer::STUDENT_REASONS)) $criteria->add(ProjectApplicationPeer::STUDENT_REASONS, $this->student_reasons);
		if ($this->isColumnModified(ProjectApplicationPeer::KEYWORDS)) $criteria->add(ProjectApplicationPeer::KEYWORDS, $this->keywords);
		if ($this->isColumnModified(ProjectApplicationPeer::BEGIN)) $criteria->add(ProjectApplicationPeer::BEGIN, $this->begin);
		if ($this->isColumnModified(ProjectApplicationPeer::FINISH)) $criteria->add(ProjectApplicationPeer::FINISH, $this->finish);
		if ($this->isColumnModified(ProjectApplicationPeer::BUDGET)) $criteria->add(ProjectApplicationPeer::BUDGET, $this->budget);
		if ($this->isColumnModified(ProjectApplicationPeer::STATUS)) $criteria->add(ProjectApplicationPeer::STATUS, $this->status);
		if ($this->isColumnModified(ProjectApplicationPeer::APPLICATIONS)) $criteria->add(ProjectApplicationPeer::APPLICATIONS, $this->applications);
		if ($this->isColumnModified(ProjectApplicationPeer::SEASON)) $criteria->add(ProjectApplicationPeer::SEASON, $this->season);
		if ($this->isColumnModified(ProjectApplicationPeer::LENGTH)) $criteria->add(ProjectApplicationPeer::LENGTH, $this->length);
		if ($this->isColumnModified(ProjectApplicationPeer::PREFERRED_TERM_LENGTH)) $criteria->add(ProjectApplicationPeer::PREFERRED_TERM_LENGTH, $this->preferred_term_length);
		if ($this->isColumnModified(ProjectApplicationPeer::YEAR)) $criteria->add(ProjectApplicationPeer::YEAR, $this->year);
		if ($this->isColumnModified(ProjectApplicationPeer::SCALE)) $criteria->add(ProjectApplicationPeer::SCALE, $this->scale);
		if ($this->isColumnModified(ProjectApplicationPeer::COMMITMENT)) $criteria->add(ProjectApplicationPeer::COMMITMENT, $this->commitment);
		if ($this->isColumnModified(ProjectApplicationPeer::GOALS)) $criteria->add(ProjectApplicationPeer::GOALS, $this->goals);
		if ($this->isColumnModified(ProjectApplicationPeer::GOALS_COMPLETE)) $criteria->add(ProjectApplicationPeer::GOALS_COMPLETE, $this->goals_complete);
		if ($this->isColumnModified(ProjectApplicationPeer::HOURS_WEEKLY)) $criteria->add(ProjectApplicationPeer::HOURS_WEEKLY, $this->hours_weekly);
		if ($this->isColumnModified(ProjectApplicationPeer::HOURS_TOTAL)) $criteria->add(ProjectApplicationPeer::HOURS_TOTAL, $this->hours_total);
		if ($this->isColumnModified(ProjectApplicationPeer::PUBLISHED)) $criteria->add(ProjectApplicationPeer::PUBLISHED, $this->published);
		if ($this->isColumnModified(ProjectApplicationPeer::FLAGGED_AUP)) $criteria->add(ProjectApplicationPeer::FLAGGED_AUP, $this->flagged_aup);
		if ($this->isColumnModified(ProjectApplicationPeer::FLAGGED_HELP)) $criteria->add(ProjectApplicationPeer::FLAGGED_HELP, $this->flagged_help);
		if ($this->isColumnModified(ProjectApplicationPeer::PAGE1_COMPLETE)) $criteria->add(ProjectApplicationPeer::PAGE1_COMPLETE, $this->page1_complete);
		if ($this->isColumnModified(ProjectApplicationPeer::PAGE2_COMPLETE)) $criteria->add(ProjectApplicationPeer::PAGE2_COMPLETE, $this->page2_complete);
		if ($this->isColumnModified(ProjectApplicationPeer::PAGE3_COMPLETE)) $criteria->add(ProjectApplicationPeer::PAGE3_COMPLETE, $this->page3_complete);
		if ($this->isColumnModified(ProjectApplicationPeer::PAGE4_COMPLETE)) $criteria->add(ProjectApplicationPeer::PAGE4_COMPLETE, $this->page4_complete);
		if ($this->isColumnModified(ProjectApplicationPeer::LIABILITY)) $criteria->add(ProjectApplicationPeer::LIABILITY, $this->liability);
		if ($this->isColumnModified(ProjectApplicationPeer::LIABILITY_DETAILS)) $criteria->add(ProjectApplicationPeer::LIABILITY_DETAILS, $this->liability_details);
		if ($this->isColumnModified(ProjectApplicationPeer::PROFIT)) $criteria->add(ProjectApplicationPeer::PROFIT, $this->profit);
		if ($this->isColumnModified(ProjectApplicationPeer::PROFIT_DETAILS)) $criteria->add(ProjectApplicationPeer::PROFIT_DETAILS, $this->profit_details);
		if ($this->isColumnModified(ProjectApplicationPeer::IS_APPROVED)) $criteria->add(ProjectApplicationPeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(ProjectApplicationPeer::POINTS)) $criteria->add(ProjectApplicationPeer::POINTS, $this->points);
		if ($this->isColumnModified(ProjectApplicationPeer::APPROVED_BY)) $criteria->add(ProjectApplicationPeer::APPROVED_BY, $this->approved_by);
		if ($this->isColumnModified(ProjectApplicationPeer::HITS)) $criteria->add(ProjectApplicationPeer::HITS, $this->hits);
		if ($this->isColumnModified(ProjectApplicationPeer::VERSION)) $criteria->add(ProjectApplicationPeer::VERSION, $this->version);
		if ($this->isColumnModified(ProjectApplicationPeer::UPDATED_AT)) $criteria->add(ProjectApplicationPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ProjectApplicationPeer::DELETED_AT)) $criteria->add(ProjectApplicationPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(ProjectApplicationPeer::CREATED_AT)) $criteria->add(ProjectApplicationPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectApplicationPeer::DATABASE_NAME);

		$criteria->add(ProjectApplicationPeer::ID, $this->id);

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

		$copyObj->setCommunityBenefits($this->community_benefits);

		$copyObj->setStudentReasons($this->student_reasons);

		$copyObj->setKeywords($this->keywords);

		$copyObj->setBegin($this->begin);

		$copyObj->setFinish($this->finish);

		$copyObj->setBudget($this->budget);

		$copyObj->setStatus($this->status);

		$copyObj->setApplications($this->applications);

		$copyObj->setSeason($this->season);

		$copyObj->setLength($this->length);

		$copyObj->setPreferredTermLength($this->preferred_term_length);

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

		$copyObj->setPage1Complete($this->page1_complete);

		$copyObj->setPage2Complete($this->page2_complete);

		$copyObj->setPage3Complete($this->page3_complete);

		$copyObj->setPage4Complete($this->page4_complete);

		$copyObj->setLiability($this->liability);

		$copyObj->setLiabilityDetails($this->liability_details);

		$copyObj->setProfit($this->profit);

		$copyObj->setProfitDetails($this->profit_details);

		$copyObj->setIsApproved($this->is_approved);

		$copyObj->setPoints($this->points);

		$copyObj->setApprovedBy($this->approved_by);

		$copyObj->setHits($this->hits);

		$copyObj->setVersion($this->version);

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
			self::$peer = new ProjectApplicationPeer();
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


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProjectApplication:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProjectApplication::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 