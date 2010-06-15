<?php


abstract class BasesfGuardUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $username;


	
	protected $algorithm = 'sha1';


	
	protected $salt;


	
	protected $password;


	
	protected $created_at;


	
	protected $last_login;


	
	protected $is_approved;


	
	protected $is_active = true;


	
	protected $is_super_admin = false;

	
	protected $collsfGuardUserPermissions;

	
	protected $lastsfGuardUserPermissionCriteria = null;

	
	protected $collsfGuardUserGroups;

	
	protected $lastsfGuardUserGroupCriteria = null;

	
	protected $collsfGuardRememberKeys;

	
	protected $lastsfGuardRememberKeyCriteria = null;

	
	protected $collsfTickets;

	
	protected $lastsfTicketCriteria = null;

	
	protected $collsfTicketThreads;

	
	protected $lastsfTicketThreadCriteria = null;

	
	protected $collsfUserRecommendations;

	
	protected $lastsfUserRecommendationCriteria = null;

	
	protected $collsfGuardUserProfiles;

	
	protected $lastsfGuardUserProfileCriteria = null;

	
	protected $collExternalServices;

	
	protected $lastExternalServiceCriteria = null;

	
	protected $collUserSettings;

	
	protected $lastUserSettingCriteria = null;

	
	protected $collContactInfos;

	
	protected $lastContactInfoCriteria = null;

	
	protected $collProjectsRelatedByCreatedBy;

	
	protected $lastProjectRelatedByCreatedByCriteria = null;

	
	protected $collProjectsRelatedByOwnerId;

	
	protected $lastProjectRelatedByOwnerIdCriteria = null;

	
	protected $collProjectApplicationsRelatedByCreatedBy;

	
	protected $lastProjectApplicationRelatedByCreatedByCriteria = null;

	
	protected $collProjectApplicationsRelatedByOwnerId;

	
	protected $lastProjectApplicationRelatedByOwnerIdCriteria = null;

	
	protected $collUserVotes;

	
	protected $lastUserVoteCriteria = null;

	
	protected $collProjectPositions;

	
	protected $lastProjectPositionCriteria = null;

	
	protected $collProjectUsers;

	
	protected $lastProjectUserCriteria = null;

	
	protected $collTaskUsers;

	
	protected $lastTaskUserCriteria = null;

	
	protected $collTasks;

	
	protected $lastTaskCriteria = null;

	
	protected $collToDos;

	
	protected $lastToDoCriteria = null;

	
	protected $collMessagesRelatedByOwnerId;

	
	protected $lastMessageRelatedByOwnerIdCriteria = null;

	
	protected $collMessagesRelatedBySenderId;

	
	protected $lastMessageRelatedBySenderIdCriteria = null;

	
	protected $collMessagesRelatedByRecipientId;

	
	protected $lastMessageRelatedByRecipientIdCriteria = null;

	
	protected $collHistoryGroupUsers;

	
	protected $lastHistoryGroupUserCriteria = null;

	
	protected $collHistoryEvents;

	
	protected $lastHistoryEventCriteria = null;

	
	protected $collSocialConnectionsRelatedByUser1Id;

	
	protected $lastSocialConnectionRelatedByUser1IdCriteria = null;

	
	protected $collSocialConnectionsRelatedByUser2Id;

	
	protected $lastSocialConnectionRelatedByUser2IdCriteria = null;

	
	protected $collsfFileGallerys;

	
	protected $lastsfFileGalleryCriteria = null;

	
	protected $collSuggestedFeatures;

	
	protected $lastSuggestedFeatureCriteria = null;

	
	protected $collContactCothinks;

	
	protected $lastContactCothinkCriteria = null;

	
	protected $collCoForms;

	
	protected $lastCoFormCriteria = null;

	
	protected $collCoApplications;

	
	protected $lastCoApplicationCriteria = null;

	
	protected $collPositionApplications;

	
	protected $lastPositionApplicationCriteria = null;

	
	protected $collsfSimpleForumTopics;

	
	protected $lastsfSimpleForumTopicCriteria = null;

	
	protected $collsfSimpleForumPosts;

	
	protected $lastsfSimpleForumPostCriteria = null;

	
	protected $collsfSimpleForumTopicViews;

	
	protected $lastsfSimpleForumTopicViewCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getAlgorithm()
	{

		return $this->algorithm;
	}

	
	public function getSalt()
	{

		return $this->salt;
	}

	
	public function getPassword()
	{

		return $this->password;
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

	
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login === null || $this->last_login === '') {
			return null;
		} elseif (!is_int($this->last_login)) {
						$ts = strtotime($this->last_login);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login] as date/time value: " . var_export($this->last_login, true));
			}
		} else {
			$ts = $this->last_login;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIsApproved()
	{

		return $this->is_approved;
	}

	
	public function getIsActive()
	{

		return $this->is_active;
	}

	
	public function getIsSuperAdmin()
	{

		return $this->is_super_admin;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ID;
		}

	} 
	
	public function setUsername($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::USERNAME;
		}

	} 
	
	public function setAlgorithm($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->algorithm !== $v || $v === 'sha1') {
			$this->algorithm = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ALGORITHM;
		}

	} 
	
	public function setSalt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::SALT;
		}

	} 
	
	public function setPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::PASSWORD;
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
			$this->modifiedColumns[] = sfGuardUserPeer::CREATED_AT;
		}

	} 
	
	public function setLastLogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login !== $ts) {
			$this->last_login = $ts;
			$this->modifiedColumns[] = sfGuardUserPeer::LAST_LOGIN;
		}

	} 
	
	public function setIsApproved($v)
	{

		if ($this->is_approved !== $v) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_APPROVED;
		}

	} 
	
	public function setIsActive($v)
	{

		if ($this->is_active !== $v || $v === true) {
			$this->is_active = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_ACTIVE;
		}

	} 
	
	public function setIsSuperAdmin($v)
	{

		if ($this->is_super_admin !== $v || $v === false) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_SUPER_ADMIN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->username = $rs->getString($startcol + 1);

			$this->algorithm = $rs->getString($startcol + 2);

			$this->salt = $rs->getString($startcol + 3);

			$this->password = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->last_login = $rs->getTimestamp($startcol + 6, null);

			$this->is_approved = $rs->getBoolean($startcol + 7);

			$this->is_active = $rs->getBoolean($startcol + 8);

			$this->is_super_admin = $rs->getBoolean($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardUser object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardUserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUser:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfGuardUserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfGuardUser:save:post') as $callable)
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
					$pk = sfGuardUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardUserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfGuardUserPermissions !== null) {
				foreach($this->collsfGuardUserPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserGroups !== null) {
				foreach($this->collsfGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardRememberKeys !== null) {
				foreach($this->collsfGuardRememberKeys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfTickets !== null) {
				foreach($this->collsfTickets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfTicketThreads !== null) {
				foreach($this->collsfTicketThreads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfUserRecommendations !== null) {
				foreach($this->collsfUserRecommendations as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserProfiles !== null) {
				foreach($this->collsfGuardUserProfiles as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collExternalServices !== null) {
				foreach($this->collExternalServices as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserSettings !== null) {
				foreach($this->collUserSettings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContactInfos !== null) {
				foreach($this->collContactInfos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectsRelatedByCreatedBy !== null) {
				foreach($this->collProjectsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectsRelatedByOwnerId !== null) {
				foreach($this->collProjectsRelatedByOwnerId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectApplicationsRelatedByCreatedBy !== null) {
				foreach($this->collProjectApplicationsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProjectApplicationsRelatedByOwnerId !== null) {
				foreach($this->collProjectApplicationsRelatedByOwnerId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserVotes !== null) {
				foreach($this->collUserVotes as $referrerFK) {
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

			if ($this->collProjectUsers !== null) {
				foreach($this->collProjectUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTaskUsers !== null) {
				foreach($this->collTaskUsers as $referrerFK) {
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

			if ($this->collToDos !== null) {
				foreach($this->collToDos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMessagesRelatedByOwnerId !== null) {
				foreach($this->collMessagesRelatedByOwnerId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMessagesRelatedBySenderId !== null) {
				foreach($this->collMessagesRelatedBySenderId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMessagesRelatedByRecipientId !== null) {
				foreach($this->collMessagesRelatedByRecipientId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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

			if ($this->collSocialConnectionsRelatedByUser1Id !== null) {
				foreach($this->collSocialConnectionsRelatedByUser1Id as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSocialConnectionsRelatedByUser2Id !== null) {
				foreach($this->collSocialConnectionsRelatedByUser2Id as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfFileGallerys !== null) {
				foreach($this->collsfFileGallerys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSuggestedFeatures !== null) {
				foreach($this->collSuggestedFeatures as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContactCothinks !== null) {
				foreach($this->collContactCothinks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCoForms !== null) {
				foreach($this->collCoForms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCoApplications !== null) {
				foreach($this->collCoApplications as $referrerFK) {
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

			if ($this->collsfSimpleForumTopics !== null) {
				foreach($this->collsfSimpleForumTopics as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfSimpleForumPosts !== null) {
				foreach($this->collsfSimpleForumPosts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfSimpleForumTopicViews !== null) {
				foreach($this->collsfSimpleForumTopicViews as $referrerFK) {
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


			if (($retval = sfGuardUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardUserPermissions !== null) {
					foreach($this->collsfGuardUserPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserGroups !== null) {
					foreach($this->collsfGuardUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardRememberKeys !== null) {
					foreach($this->collsfGuardRememberKeys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfTickets !== null) {
					foreach($this->collsfTickets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfTicketThreads !== null) {
					foreach($this->collsfTicketThreads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfUserRecommendations !== null) {
					foreach($this->collsfUserRecommendations as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserProfiles !== null) {
					foreach($this->collsfGuardUserProfiles as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collExternalServices !== null) {
					foreach($this->collExternalServices as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserSettings !== null) {
					foreach($this->collUserSettings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContactInfos !== null) {
					foreach($this->collContactInfos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectsRelatedByCreatedBy !== null) {
					foreach($this->collProjectsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectsRelatedByOwnerId !== null) {
					foreach($this->collProjectsRelatedByOwnerId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectApplicationsRelatedByCreatedBy !== null) {
					foreach($this->collProjectApplicationsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProjectApplicationsRelatedByOwnerId !== null) {
					foreach($this->collProjectApplicationsRelatedByOwnerId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserVotes !== null) {
					foreach($this->collUserVotes as $referrerFK) {
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

				if ($this->collProjectUsers !== null) {
					foreach($this->collProjectUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTaskUsers !== null) {
					foreach($this->collTaskUsers as $referrerFK) {
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

				if ($this->collToDos !== null) {
					foreach($this->collToDos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMessagesRelatedByOwnerId !== null) {
					foreach($this->collMessagesRelatedByOwnerId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMessagesRelatedBySenderId !== null) {
					foreach($this->collMessagesRelatedBySenderId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMessagesRelatedByRecipientId !== null) {
					foreach($this->collMessagesRelatedByRecipientId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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

				if ($this->collSocialConnectionsRelatedByUser1Id !== null) {
					foreach($this->collSocialConnectionsRelatedByUser1Id as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSocialConnectionsRelatedByUser2Id !== null) {
					foreach($this->collSocialConnectionsRelatedByUser2Id as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfFileGallerys !== null) {
					foreach($this->collsfFileGallerys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSuggestedFeatures !== null) {
					foreach($this->collSuggestedFeatures as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContactCothinks !== null) {
					foreach($this->collContactCothinks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCoForms !== null) {
					foreach($this->collCoForms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCoApplications !== null) {
					foreach($this->collCoApplications as $referrerFK) {
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

				if ($this->collsfSimpleForumTopics !== null) {
					foreach($this->collsfSimpleForumTopics as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfSimpleForumPosts !== null) {
					foreach($this->collsfSimpleForumPosts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfSimpleForumTopicViews !== null) {
					foreach($this->collsfSimpleForumTopicViews as $referrerFK) {
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
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getAlgorithm();
				break;
			case 3:
				return $this->getSalt();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getLastLogin();
				break;
			case 7:
				return $this->getIsApproved();
				break;
			case 8:
				return $this->getIsActive();
				break;
			case 9:
				return $this->getIsSuperAdmin();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getAlgorithm(),
			$keys[3] => $this->getSalt(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getLastLogin(),
			$keys[7] => $this->getIsApproved(),
			$keys[8] => $this->getIsActive(),
			$keys[9] => $this->getIsSuperAdmin(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setAlgorithm($value);
				break;
			case 3:
				$this->setSalt($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setLastLogin($value);
				break;
			case 7:
				$this->setIsApproved($value);
				break;
			case 8:
				$this->setIsActive($value);
				break;
			case 9:
				$this->setIsSuperAdmin($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsApproved($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsActive($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsSuperAdmin($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserPeer::ID)) $criteria->add(sfGuardUserPeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardUserPeer::USERNAME)) $criteria->add(sfGuardUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(sfGuardUserPeer::ALGORITHM)) $criteria->add(sfGuardUserPeer::ALGORITHM, $this->algorithm);
		if ($this->isColumnModified(sfGuardUserPeer::SALT)) $criteria->add(sfGuardUserPeer::SALT, $this->salt);
		if ($this->isColumnModified(sfGuardUserPeer::PASSWORD)) $criteria->add(sfGuardUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(sfGuardUserPeer::CREATED_AT)) $criteria->add(sfGuardUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfGuardUserPeer::LAST_LOGIN)) $criteria->add(sfGuardUserPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(sfGuardUserPeer::IS_APPROVED)) $criteria->add(sfGuardUserPeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(sfGuardUserPeer::IS_ACTIVE)) $criteria->add(sfGuardUserPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(sfGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(sfGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		$criteria->add(sfGuardUserPeer::ID, $this->id);

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

		$copyObj->setUsername($this->username);

		$copyObj->setAlgorithm($this->algorithm);

		$copyObj->setSalt($this->salt);

		$copyObj->setPassword($this->password);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setLastLogin($this->last_login);

		$copyObj->setIsApproved($this->is_approved);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setIsSuperAdmin($this->is_super_admin);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfGuardUserPermissions() as $relObj) {
				$copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserGroups() as $relObj) {
				$copyObj->addsfGuardUserGroup($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardRememberKeys() as $relObj) {
				$copyObj->addsfGuardRememberKey($relObj->copy($deepCopy));
			}

			foreach($this->getsfTickets() as $relObj) {
				$copyObj->addsfTicket($relObj->copy($deepCopy));
			}

			foreach($this->getsfTicketThreads() as $relObj) {
				$copyObj->addsfTicketThread($relObj->copy($deepCopy));
			}

			foreach($this->getsfUserRecommendations() as $relObj) {
				$copyObj->addsfUserRecommendation($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserProfiles() as $relObj) {
				$copyObj->addsfGuardUserProfile($relObj->copy($deepCopy));
			}

			foreach($this->getExternalServices() as $relObj) {
				$copyObj->addExternalService($relObj->copy($deepCopy));
			}

			foreach($this->getUserSettings() as $relObj) {
				$copyObj->addUserSetting($relObj->copy($deepCopy));
			}

			foreach($this->getContactInfos() as $relObj) {
				$copyObj->addContactInfo($relObj->copy($deepCopy));
			}

			foreach($this->getProjectsRelatedByCreatedBy() as $relObj) {
				$copyObj->addProjectRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getProjectsRelatedByOwnerId() as $relObj) {
				$copyObj->addProjectRelatedByOwnerId($relObj->copy($deepCopy));
			}

			foreach($this->getProjectApplicationsRelatedByCreatedBy() as $relObj) {
				$copyObj->addProjectApplicationRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getProjectApplicationsRelatedByOwnerId() as $relObj) {
				$copyObj->addProjectApplicationRelatedByOwnerId($relObj->copy($deepCopy));
			}

			foreach($this->getUserVotes() as $relObj) {
				$copyObj->addUserVote($relObj->copy($deepCopy));
			}

			foreach($this->getProjectPositions() as $relObj) {
				$copyObj->addProjectPosition($relObj->copy($deepCopy));
			}

			foreach($this->getProjectUsers() as $relObj) {
				$copyObj->addProjectUser($relObj->copy($deepCopy));
			}

			foreach($this->getTaskUsers() as $relObj) {
				$copyObj->addTaskUser($relObj->copy($deepCopy));
			}

			foreach($this->getTasks() as $relObj) {
				$copyObj->addTask($relObj->copy($deepCopy));
			}

			foreach($this->getToDos() as $relObj) {
				$copyObj->addToDo($relObj->copy($deepCopy));
			}

			foreach($this->getMessagesRelatedByOwnerId() as $relObj) {
				$copyObj->addMessageRelatedByOwnerId($relObj->copy($deepCopy));
			}

			foreach($this->getMessagesRelatedBySenderId() as $relObj) {
				$copyObj->addMessageRelatedBySenderId($relObj->copy($deepCopy));
			}

			foreach($this->getMessagesRelatedByRecipientId() as $relObj) {
				$copyObj->addMessageRelatedByRecipientId($relObj->copy($deepCopy));
			}

			foreach($this->getHistoryGroupUsers() as $relObj) {
				$copyObj->addHistoryGroupUser($relObj->copy($deepCopy));
			}

			foreach($this->getHistoryEvents() as $relObj) {
				$copyObj->addHistoryEvent($relObj->copy($deepCopy));
			}

			foreach($this->getSocialConnectionsRelatedByUser1Id() as $relObj) {
				$copyObj->addSocialConnectionRelatedByUser1Id($relObj->copy($deepCopy));
			}

			foreach($this->getSocialConnectionsRelatedByUser2Id() as $relObj) {
				$copyObj->addSocialConnectionRelatedByUser2Id($relObj->copy($deepCopy));
			}

			foreach($this->getsfFileGallerys() as $relObj) {
				$copyObj->addsfFileGallery($relObj->copy($deepCopy));
			}

			foreach($this->getSuggestedFeatures() as $relObj) {
				$copyObj->addSuggestedFeature($relObj->copy($deepCopy));
			}

			foreach($this->getContactCothinks() as $relObj) {
				$copyObj->addContactCothink($relObj->copy($deepCopy));
			}

			foreach($this->getCoForms() as $relObj) {
				$copyObj->addCoForm($relObj->copy($deepCopy));
			}

			foreach($this->getCoApplications() as $relObj) {
				$copyObj->addCoApplication($relObj->copy($deepCopy));
			}

			foreach($this->getPositionApplications() as $relObj) {
				$copyObj->addPositionApplication($relObj->copy($deepCopy));
			}

			foreach($this->getsfSimpleForumTopics() as $relObj) {
				$copyObj->addsfSimpleForumTopic($relObj->copy($deepCopy));
			}

			foreach($this->getsfSimpleForumPosts() as $relObj) {
				$copyObj->addsfSimpleForumPost($relObj->copy($deepCopy));
			}

			foreach($this->getsfSimpleForumTopicViews() as $relObj) {
				$copyObj->addsfSimpleForumTopicView($relObj->copy($deepCopy));
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
			self::$peer = new sfGuardUserPeer();
		}
		return self::$peer;
	}

	
	public function initsfGuardUserPermissions()
	{
		if ($this->collsfGuardUserPermissions === null) {
			$this->collsfGuardUserPermissions = array();
		}
	}

	
	public function getsfGuardUserPermissions($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
					$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;
		return $this->collsfGuardUserPermissions;
	}

	
	public function countsfGuardUserPermissions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

		return sfGuardUserPermissionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserPermission(sfGuardUserPermission $l)
	{
		$this->collsfGuardUserPermissions[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserPermissionsJoinsfGuardPermission($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardPermission($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardPermission($criteria, $con);
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;

		return $this->collsfGuardUserPermissions;
	}

	
	public function initsfGuardUserGroups()
	{
		if ($this->collsfGuardUserGroups === null) {
			$this->collsfGuardUserGroups = array();
		}
	}

	
	public function getsfGuardUserGroups($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserGroups === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserGroups = array();
			} else {

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				sfGuardUserGroupPeer::addSelectColumns($criteria);
				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				sfGuardUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserGroupCriteria) || !$this->lastsfGuardUserGroupCriteria->equals($criteria)) {
					$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserGroupCriteria = $criteria;
		return $this->collsfGuardUserGroups;
	}

	
	public function countsfGuardUserGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

		return sfGuardUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserGroup(sfGuardUserGroup $l)
	{
		$this->collsfGuardUserGroups[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserGroupsJoinsfGuardGroup($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserGroups === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserGroups = array();
			} else {

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelectJoinsfGuardGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserGroupCriteria) || !$this->lastsfGuardUserGroupCriteria->equals($criteria)) {
				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelectJoinsfGuardGroup($criteria, $con);
			}
		}
		$this->lastsfGuardUserGroupCriteria = $criteria;

		return $this->collsfGuardUserGroups;
	}

	
	public function initsfGuardRememberKeys()
	{
		if ($this->collsfGuardRememberKeys === null) {
			$this->collsfGuardRememberKeys = array();
		}
	}

	
	public function getsfGuardRememberKeys($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardRememberKeys === null) {
			if ($this->isNew()) {
			   $this->collsfGuardRememberKeys = array();
			} else {

				$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

				sfGuardRememberKeyPeer::addSelectColumns($criteria);
				$this->collsfGuardRememberKeys = sfGuardRememberKeyPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

				sfGuardRememberKeyPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardRememberKeyCriteria) || !$this->lastsfGuardRememberKeyCriteria->equals($criteria)) {
					$this->collsfGuardRememberKeys = sfGuardRememberKeyPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardRememberKeyCriteria = $criteria;
		return $this->collsfGuardRememberKeys;
	}

	
	public function countsfGuardRememberKeys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

		return sfGuardRememberKeyPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardRememberKey(sfGuardRememberKey $l)
	{
		$this->collsfGuardRememberKeys[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initsfTickets()
	{
		if ($this->collsfTickets === null) {
			$this->collsfTickets = array();
		}
	}

	
	public function getsfTickets($criteria = null, $con = null)
	{
				include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfTickets === null) {
			if ($this->isNew()) {
			   $this->collsfTickets = array();
			} else {

				$criteria->add(sfTicketPeer::USER_ID, $this->getId());

				sfTicketPeer::addSelectColumns($criteria);
				$this->collsfTickets = sfTicketPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfTicketPeer::USER_ID, $this->getId());

				sfTicketPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfTicketCriteria) || !$this->lastsfTicketCriteria->equals($criteria)) {
					$this->collsfTickets = sfTicketPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfTicketCriteria = $criteria;
		return $this->collsfTickets;
	}

	
	public function countsfTickets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfTicketPeer::USER_ID, $this->getId());

		return sfTicketPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfTicket(sfTicket $l)
	{
		$this->collsfTickets[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfTicketsJoinsfTicketStatus($criteria = null, $con = null)
	{
				include_once 'plugins/sfSupportPlugin/lib/model/om/BasesfTicketPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfTickets === null) {
			if ($this->isNew()) {
				$this->collsfTickets = array();
			} else {

				$criteria->add(sfTicketPeer::USER_ID, $this->getId());

				$this->collsfTickets = sfTicketPeer::doSelectJoinsfTicketStatus($criteria, $con);
			}
		} else {
									
			$criteria->add(sfTicketPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfTicketCriteria) || !$this->lastsfTicketCriteria->equals($criteria)) {
				$this->collsfTickets = sfTicketPeer::doSelectJoinsfTicketStatus($criteria, $con);
			}
		}
		$this->lastsfTicketCriteria = $criteria;

		return $this->collsfTickets;
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

				$criteria->add(sfTicketThreadPeer::USER_ID, $this->getId());

				sfTicketThreadPeer::addSelectColumns($criteria);
				$this->collsfTicketThreads = sfTicketThreadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfTicketThreadPeer::USER_ID, $this->getId());

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

		$criteria->add(sfTicketThreadPeer::USER_ID, $this->getId());

		return sfTicketThreadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfTicketThread(sfTicketThread $l)
	{
		$this->collsfTicketThreads[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfTicketThreadsJoinsfTicket($criteria = null, $con = null)
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

				$criteria->add(sfTicketThreadPeer::USER_ID, $this->getId());

				$this->collsfTicketThreads = sfTicketThreadPeer::doSelectJoinsfTicket($criteria, $con);
			}
		} else {
									
			$criteria->add(sfTicketThreadPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfTicketThreadCriteria) || !$this->lastsfTicketThreadCriteria->equals($criteria)) {
				$this->collsfTicketThreads = sfTicketThreadPeer::doSelectJoinsfTicket($criteria, $con);
			}
		}
		$this->lastsfTicketThreadCriteria = $criteria;

		return $this->collsfTicketThreads;
	}

	
	public function initsfUserRecommendations()
	{
		if ($this->collsfUserRecommendations === null) {
			$this->collsfUserRecommendations = array();
		}
	}

	
	public function getsfUserRecommendations($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelActAsRecommendableBehaviorPlugin/lib/model/om/BasesfUserRecommendationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfUserRecommendations === null) {
			if ($this->isNew()) {
			   $this->collsfUserRecommendations = array();
			} else {

				$criteria->add(sfUserRecommendationPeer::USER_ID, $this->getId());

				sfUserRecommendationPeer::addSelectColumns($criteria);
				$this->collsfUserRecommendations = sfUserRecommendationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfUserRecommendationPeer::USER_ID, $this->getId());

				sfUserRecommendationPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfUserRecommendationCriteria) || !$this->lastsfUserRecommendationCriteria->equals($criteria)) {
					$this->collsfUserRecommendations = sfUserRecommendationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfUserRecommendationCriteria = $criteria;
		return $this->collsfUserRecommendations;
	}

	
	public function countsfUserRecommendations($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelActAsRecommendableBehaviorPlugin/lib/model/om/BasesfUserRecommendationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfUserRecommendationPeer::USER_ID, $this->getId());

		return sfUserRecommendationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfUserRecommendation(sfUserRecommendation $l)
	{
		$this->collsfUserRecommendations[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initsfGuardUserProfiles()
	{
		if ($this->collsfGuardUserProfiles === null) {
			$this->collsfGuardUserProfiles = array();
		}
	}

	
	public function getsfGuardUserProfiles($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				sfGuardUserProfilePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
					$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;
		return $this->collsfGuardUserProfiles;
	}

	
	public function countsfGuardUserProfiles($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

		return sfGuardUserProfilePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserProfile(sfGuardUserProfile $l)
	{
		$this->collsfGuardUserProfiles[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserProfilesJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}


	
	public function getsfGuardUserProfilesJoinDepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}


	
	public function getsfGuardUserProfilesJoinSubdepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfGuardUserProfilePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserProfiles === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserProfiles = array();
			} else {

				$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinSubdepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserProfilePeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserProfileCriteria) || !$this->lastsfGuardUserProfileCriteria->equals($criteria)) {
				$this->collsfGuardUserProfiles = sfGuardUserProfilePeer::doSelectJoinSubdepartment($criteria, $con);
			}
		}
		$this->lastsfGuardUserProfileCriteria = $criteria;

		return $this->collsfGuardUserProfiles;
	}

	
	public function initExternalServices()
	{
		if ($this->collExternalServices === null) {
			$this->collExternalServices = array();
		}
	}

	
	public function getExternalServices($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseExternalServicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collExternalServices === null) {
			if ($this->isNew()) {
			   $this->collExternalServices = array();
			} else {

				$criteria->add(ExternalServicePeer::USER_ID, $this->getId());

				ExternalServicePeer::addSelectColumns($criteria);
				$this->collExternalServices = ExternalServicePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ExternalServicePeer::USER_ID, $this->getId());

				ExternalServicePeer::addSelectColumns($criteria);
				if (!isset($this->lastExternalServiceCriteria) || !$this->lastExternalServiceCriteria->equals($criteria)) {
					$this->collExternalServices = ExternalServicePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastExternalServiceCriteria = $criteria;
		return $this->collExternalServices;
	}

	
	public function countExternalServices($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseExternalServicePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ExternalServicePeer::USER_ID, $this->getId());

		return ExternalServicePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addExternalService(ExternalService $l)
	{
		$this->collExternalServices[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initUserSettings()
	{
		if ($this->collUserSettings === null) {
			$this->collUserSettings = array();
		}
	}

	
	public function getUserSettings($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserSettingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserSettings === null) {
			if ($this->isNew()) {
			   $this->collUserSettings = array();
			} else {

				$criteria->add(UserSettingPeer::USER_ID, $this->getId());

				UserSettingPeer::addSelectColumns($criteria);
				$this->collUserSettings = UserSettingPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserSettingPeer::USER_ID, $this->getId());

				UserSettingPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserSettingCriteria) || !$this->lastUserSettingCriteria->equals($criteria)) {
					$this->collUserSettings = UserSettingPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserSettingCriteria = $criteria;
		return $this->collUserSettings;
	}

	
	public function countUserSettings($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserSettingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserSettingPeer::USER_ID, $this->getId());

		return UserSettingPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUserSetting(UserSetting $l)
	{
		$this->collUserSettings[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initContactInfos()
	{
		if ($this->collContactInfos === null) {
			$this->collContactInfos = array();
		}
	}

	
	public function getContactInfos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContactInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContactInfos === null) {
			if ($this->isNew()) {
			   $this->collContactInfos = array();
			} else {

				$criteria->add(ContactInfoPeer::USER_ID, $this->getId());

				ContactInfoPeer::addSelectColumns($criteria);
				$this->collContactInfos = ContactInfoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContactInfoPeer::USER_ID, $this->getId());

				ContactInfoPeer::addSelectColumns($criteria);
				if (!isset($this->lastContactInfoCriteria) || !$this->lastContactInfoCriteria->equals($criteria)) {
					$this->collContactInfos = ContactInfoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContactInfoCriteria = $criteria;
		return $this->collContactInfos;
	}

	
	public function countContactInfos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseContactInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ContactInfoPeer::USER_ID, $this->getId());

		return ContactInfoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContactInfo(ContactInfo $l)
	{
		$this->collContactInfos[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initProjectsRelatedByCreatedBy()
	{
		if ($this->collProjectsRelatedByCreatedBy === null) {
			$this->collProjectsRelatedByCreatedBy = array();
		}
	}

	
	public function getProjectsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;
		return $this->collProjectsRelatedByCreatedBy;
	}

	
	public function countProjectsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectRelatedByCreatedBy(Project $l)
	{
		$this->collProjectsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getProjectsRelatedByCreatedByJoinDepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectsRelatedByCreatedBy;
	}


	
	public function getProjectsRelatedByCreatedByJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectRelatedByCreatedByCriteria) || !$this->lastProjectRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectsRelatedByCreatedBy = ProjectPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectsRelatedByCreatedBy;
	}

	
	public function initProjectsRelatedByOwnerId()
	{
		if ($this->collProjectsRelatedByOwnerId === null) {
			$this->collProjectsRelatedByOwnerId = array();
		}
	}

	
	public function getProjectsRelatedByOwnerId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByOwnerId === null) {
			if ($this->isNew()) {
			   $this->collProjectsRelatedByOwnerId = array();
			} else {

				$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				$this->collProjectsRelatedByOwnerId = ProjectPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

				ProjectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectRelatedByOwnerIdCriteria) || !$this->lastProjectRelatedByOwnerIdCriteria->equals($criteria)) {
					$this->collProjectsRelatedByOwnerId = ProjectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectRelatedByOwnerIdCriteria = $criteria;
		return $this->collProjectsRelatedByOwnerId;
	}

	
	public function countProjectsRelatedByOwnerId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

		return ProjectPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectRelatedByOwnerId(Project $l)
	{
		$this->collProjectsRelatedByOwnerId[] = $l;
		$l->setsfGuardUserRelatedByOwnerId($this);
	}


	
	public function getProjectsRelatedByOwnerIdJoinDepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByOwnerId === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByOwnerId = array();
			} else {

				$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

				$this->collProjectsRelatedByOwnerId = ProjectPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

			if (!isset($this->lastProjectRelatedByOwnerIdCriteria) || !$this->lastProjectRelatedByOwnerIdCriteria->equals($criteria)) {
				$this->collProjectsRelatedByOwnerId = ProjectPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastProjectRelatedByOwnerIdCriteria = $criteria;

		return $this->collProjectsRelatedByOwnerId;
	}


	
	public function getProjectsRelatedByOwnerIdJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectsRelatedByOwnerId === null) {
			if ($this->isNew()) {
				$this->collProjectsRelatedByOwnerId = array();
			} else {

				$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

				$this->collProjectsRelatedByOwnerId = ProjectPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPeer::OWNER_ID, $this->getId());

			if (!isset($this->lastProjectRelatedByOwnerIdCriteria) || !$this->lastProjectRelatedByOwnerIdCriteria->equals($criteria)) {
				$this->collProjectsRelatedByOwnerId = ProjectPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectRelatedByOwnerIdCriteria = $criteria;

		return $this->collProjectsRelatedByOwnerId;
	}

	
	public function initProjectApplicationsRelatedByCreatedBy()
	{
		if ($this->collProjectApplicationsRelatedByCreatedBy === null) {
			$this->collProjectApplicationsRelatedByCreatedBy = array();
		}
	}

	
	public function getProjectApplicationsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplicationsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collProjectApplicationsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				$this->collProjectApplicationsRelatedByCreatedBy = ProjectApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectApplicationRelatedByCreatedByCriteria) || !$this->lastProjectApplicationRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collProjectApplicationsRelatedByCreatedBy = ProjectApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectApplicationRelatedByCreatedByCriteria = $criteria;
		return $this->collProjectApplicationsRelatedByCreatedBy;
	}

	
	public function countProjectApplicationsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

		return ProjectApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectApplicationRelatedByCreatedBy(ProjectApplication $l)
	{
		$this->collProjectApplicationsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getProjectApplicationsRelatedByCreatedByJoinDepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplicationsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectApplicationsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

				$this->collProjectApplicationsRelatedByCreatedBy = ProjectApplicationPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectApplicationRelatedByCreatedByCriteria) || !$this->lastProjectApplicationRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectApplicationsRelatedByCreatedBy = ProjectApplicationPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastProjectApplicationRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectApplicationsRelatedByCreatedBy;
	}


	
	public function getProjectApplicationsRelatedByCreatedByJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplicationsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collProjectApplicationsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

				$this->collProjectApplicationsRelatedByCreatedBy = ProjectApplicationPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastProjectApplicationRelatedByCreatedByCriteria) || !$this->lastProjectApplicationRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collProjectApplicationsRelatedByCreatedBy = ProjectApplicationPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectApplicationRelatedByCreatedByCriteria = $criteria;

		return $this->collProjectApplicationsRelatedByCreatedBy;
	}

	
	public function initProjectApplicationsRelatedByOwnerId()
	{
		if ($this->collProjectApplicationsRelatedByOwnerId === null) {
			$this->collProjectApplicationsRelatedByOwnerId = array();
		}
	}

	
	public function getProjectApplicationsRelatedByOwnerId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplicationsRelatedByOwnerId === null) {
			if ($this->isNew()) {
			   $this->collProjectApplicationsRelatedByOwnerId = array();
			} else {

				$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				$this->collProjectApplicationsRelatedByOwnerId = ProjectApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

				ProjectApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastProjectApplicationRelatedByOwnerIdCriteria) || !$this->lastProjectApplicationRelatedByOwnerIdCriteria->equals($criteria)) {
					$this->collProjectApplicationsRelatedByOwnerId = ProjectApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProjectApplicationRelatedByOwnerIdCriteria = $criteria;
		return $this->collProjectApplicationsRelatedByOwnerId;
	}

	
	public function countProjectApplicationsRelatedByOwnerId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

		return ProjectApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectApplicationRelatedByOwnerId(ProjectApplication $l)
	{
		$this->collProjectApplicationsRelatedByOwnerId[] = $l;
		$l->setsfGuardUserRelatedByOwnerId($this);
	}


	
	public function getProjectApplicationsRelatedByOwnerIdJoinDepartment($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplicationsRelatedByOwnerId === null) {
			if ($this->isNew()) {
				$this->collProjectApplicationsRelatedByOwnerId = array();
			} else {

				$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

				$this->collProjectApplicationsRelatedByOwnerId = ProjectApplicationPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

			if (!isset($this->lastProjectApplicationRelatedByOwnerIdCriteria) || !$this->lastProjectApplicationRelatedByOwnerIdCriteria->equals($criteria)) {
				$this->collProjectApplicationsRelatedByOwnerId = ProjectApplicationPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastProjectApplicationRelatedByOwnerIdCriteria = $criteria;

		return $this->collProjectApplicationsRelatedByOwnerId;
	}


	
	public function getProjectApplicationsRelatedByOwnerIdJoinCampus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProjectApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProjectApplicationsRelatedByOwnerId === null) {
			if ($this->isNew()) {
				$this->collProjectApplicationsRelatedByOwnerId = array();
			} else {

				$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

				$this->collProjectApplicationsRelatedByOwnerId = ProjectApplicationPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectApplicationPeer::OWNER_ID, $this->getId());

			if (!isset($this->lastProjectApplicationRelatedByOwnerIdCriteria) || !$this->lastProjectApplicationRelatedByOwnerIdCriteria->equals($criteria)) {
				$this->collProjectApplicationsRelatedByOwnerId = ProjectApplicationPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectApplicationRelatedByOwnerIdCriteria = $criteria;

		return $this->collProjectApplicationsRelatedByOwnerId;
	}

	
	public function initUserVotes()
	{
		if ($this->collUserVotes === null) {
			$this->collUserVotes = array();
		}
	}

	
	public function getUserVotes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserVotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserVotes === null) {
			if ($this->isNew()) {
			   $this->collUserVotes = array();
			} else {

				$criteria->add(UserVotePeer::USER_ID, $this->getId());

				UserVotePeer::addSelectColumns($criteria);
				$this->collUserVotes = UserVotePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserVotePeer::USER_ID, $this->getId());

				UserVotePeer::addSelectColumns($criteria);
				if (!isset($this->lastUserVoteCriteria) || !$this->lastUserVoteCriteria->equals($criteria)) {
					$this->collUserVotes = UserVotePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserVoteCriteria = $criteria;
		return $this->collUserVotes;
	}

	
	public function countUserVotes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserVotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserVotePeer::USER_ID, $this->getId());

		return UserVotePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUserVote(UserVote $l)
	{
		$this->collUserVotes[] = $l;
		$l->setsfGuardUser($this);
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

				$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

				ProjectPositionPeer::addSelectColumns($criteria);
				$this->collProjectPositions = ProjectPositionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

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

		$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

		return ProjectPositionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectPosition(ProjectPosition $l)
	{
		$this->collProjectPositions[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getProjectPositionsJoinProject($criteria = null, $con = null)
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

				$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

			if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinProject($criteria, $con);
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

				$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinCampus($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectPositionPeer::USER_ID, $this->getId());

			if (!isset($this->lastProjectPositionCriteria) || !$this->lastProjectPositionCriteria->equals($criteria)) {
				$this->collProjectPositions = ProjectPositionPeer::doSelectJoinCampus($criteria, $con);
			}
		}
		$this->lastProjectPositionCriteria = $criteria;

		return $this->collProjectPositions;
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

				$criteria->add(ProjectUserPeer::USER_ID, $this->getId());

				ProjectUserPeer::addSelectColumns($criteria);
				$this->collProjectUsers = ProjectUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProjectUserPeer::USER_ID, $this->getId());

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

		$criteria->add(ProjectUserPeer::USER_ID, $this->getId());

		return ProjectUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProjectUser(ProjectUser $l)
	{
		$this->collProjectUsers[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getProjectUsersJoinProjectPosition($criteria = null, $con = null)
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

				$criteria->add(ProjectUserPeer::USER_ID, $this->getId());

				$this->collProjectUsers = ProjectUserPeer::doSelectJoinProjectPosition($criteria, $con);
			}
		} else {
									
			$criteria->add(ProjectUserPeer::USER_ID, $this->getId());

			if (!isset($this->lastProjectUserCriteria) || !$this->lastProjectUserCriteria->equals($criteria)) {
				$this->collProjectUsers = ProjectUserPeer::doSelectJoinProjectPosition($criteria, $con);
			}
		}
		$this->lastProjectUserCriteria = $criteria;

		return $this->collProjectUsers;
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

				$criteria->add(TaskUserPeer::USER_ID, $this->getId());

				TaskUserPeer::addSelectColumns($criteria);
				$this->collTaskUsers = TaskUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskUserPeer::USER_ID, $this->getId());

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

		$criteria->add(TaskUserPeer::USER_ID, $this->getId());

		return TaskUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTaskUser(TaskUser $l)
	{
		$this->collTaskUsers[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getTaskUsersJoinTask($criteria = null, $con = null)
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

				$criteria->add(TaskUserPeer::USER_ID, $this->getId());

				$this->collTaskUsers = TaskUserPeer::doSelectJoinTask($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskUserPeer::USER_ID, $this->getId());

			if (!isset($this->lastTaskUserCriteria) || !$this->lastTaskUserCriteria->equals($criteria)) {
				$this->collTaskUsers = TaskUserPeer::doSelectJoinTask($criteria, $con);
			}
		}
		$this->lastTaskUserCriteria = $criteria;

		return $this->collTaskUsers;
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

				$criteria->add(TaskPeer::OWNER_ID, $this->getId());

				TaskPeer::addSelectColumns($criteria);
				$this->collTasks = TaskPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TaskPeer::OWNER_ID, $this->getId());

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

		$criteria->add(TaskPeer::OWNER_ID, $this->getId());

		return TaskPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTask(Task $l)
	{
		$this->collTasks[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getTasksJoinProject($criteria = null, $con = null)
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

				$criteria->add(TaskPeer::OWNER_ID, $this->getId());

				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		} else {
									
			$criteria->add(TaskPeer::OWNER_ID, $this->getId());

			if (!isset($this->lastTaskCriteria) || !$this->lastTaskCriteria->equals($criteria)) {
				$this->collTasks = TaskPeer::doSelectJoinProject($criteria, $con);
			}
		}
		$this->lastTaskCriteria = $criteria;

		return $this->collTasks;
	}

	
	public function initToDos()
	{
		if ($this->collToDos === null) {
			$this->collToDos = array();
		}
	}

	
	public function getToDos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseToDoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collToDos === null) {
			if ($this->isNew()) {
			   $this->collToDos = array();
			} else {

				$criteria->add(ToDoPeer::OWNER_ID, $this->getId());

				ToDoPeer::addSelectColumns($criteria);
				$this->collToDos = ToDoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ToDoPeer::OWNER_ID, $this->getId());

				ToDoPeer::addSelectColumns($criteria);
				if (!isset($this->lastToDoCriteria) || !$this->lastToDoCriteria->equals($criteria)) {
					$this->collToDos = ToDoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastToDoCriteria = $criteria;
		return $this->collToDos;
	}

	
	public function countToDos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseToDoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ToDoPeer::OWNER_ID, $this->getId());

		return ToDoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addToDo(ToDo $l)
	{
		$this->collToDos[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initMessagesRelatedByOwnerId()
	{
		if ($this->collMessagesRelatedByOwnerId === null) {
			$this->collMessagesRelatedByOwnerId = array();
		}
	}

	
	public function getMessagesRelatedByOwnerId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMessagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMessagesRelatedByOwnerId === null) {
			if ($this->isNew()) {
			   $this->collMessagesRelatedByOwnerId = array();
			} else {

				$criteria->add(MessagePeer::OWNER_ID, $this->getId());

				MessagePeer::addSelectColumns($criteria);
				$this->collMessagesRelatedByOwnerId = MessagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MessagePeer::OWNER_ID, $this->getId());

				MessagePeer::addSelectColumns($criteria);
				if (!isset($this->lastMessageRelatedByOwnerIdCriteria) || !$this->lastMessageRelatedByOwnerIdCriteria->equals($criteria)) {
					$this->collMessagesRelatedByOwnerId = MessagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMessageRelatedByOwnerIdCriteria = $criteria;
		return $this->collMessagesRelatedByOwnerId;
	}

	
	public function countMessagesRelatedByOwnerId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMessagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MessagePeer::OWNER_ID, $this->getId());

		return MessagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMessageRelatedByOwnerId(Message $l)
	{
		$this->collMessagesRelatedByOwnerId[] = $l;
		$l->setsfGuardUserRelatedByOwnerId($this);
	}

	
	public function initMessagesRelatedBySenderId()
	{
		if ($this->collMessagesRelatedBySenderId === null) {
			$this->collMessagesRelatedBySenderId = array();
		}
	}

	
	public function getMessagesRelatedBySenderId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMessagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMessagesRelatedBySenderId === null) {
			if ($this->isNew()) {
			   $this->collMessagesRelatedBySenderId = array();
			} else {

				$criteria->add(MessagePeer::SENDER_ID, $this->getId());

				MessagePeer::addSelectColumns($criteria);
				$this->collMessagesRelatedBySenderId = MessagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MessagePeer::SENDER_ID, $this->getId());

				MessagePeer::addSelectColumns($criteria);
				if (!isset($this->lastMessageRelatedBySenderIdCriteria) || !$this->lastMessageRelatedBySenderIdCriteria->equals($criteria)) {
					$this->collMessagesRelatedBySenderId = MessagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMessageRelatedBySenderIdCriteria = $criteria;
		return $this->collMessagesRelatedBySenderId;
	}

	
	public function countMessagesRelatedBySenderId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMessagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MessagePeer::SENDER_ID, $this->getId());

		return MessagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMessageRelatedBySenderId(Message $l)
	{
		$this->collMessagesRelatedBySenderId[] = $l;
		$l->setsfGuardUserRelatedBySenderId($this);
	}

	
	public function initMessagesRelatedByRecipientId()
	{
		if ($this->collMessagesRelatedByRecipientId === null) {
			$this->collMessagesRelatedByRecipientId = array();
		}
	}

	
	public function getMessagesRelatedByRecipientId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMessagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMessagesRelatedByRecipientId === null) {
			if ($this->isNew()) {
			   $this->collMessagesRelatedByRecipientId = array();
			} else {

				$criteria->add(MessagePeer::RECIPIENT_ID, $this->getId());

				MessagePeer::addSelectColumns($criteria);
				$this->collMessagesRelatedByRecipientId = MessagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MessagePeer::RECIPIENT_ID, $this->getId());

				MessagePeer::addSelectColumns($criteria);
				if (!isset($this->lastMessageRelatedByRecipientIdCriteria) || !$this->lastMessageRelatedByRecipientIdCriteria->equals($criteria)) {
					$this->collMessagesRelatedByRecipientId = MessagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMessageRelatedByRecipientIdCriteria = $criteria;
		return $this->collMessagesRelatedByRecipientId;
	}

	
	public function countMessagesRelatedByRecipientId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMessagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MessagePeer::RECIPIENT_ID, $this->getId());

		return MessagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMessageRelatedByRecipientId(Message $l)
	{
		$this->collMessagesRelatedByRecipientId[] = $l;
		$l->setsfGuardUserRelatedByRecipientId($this);
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

				$criteria->add(HistoryGroupUserPeer::USER_ID, $this->getId());

				HistoryGroupUserPeer::addSelectColumns($criteria);
				$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HistoryGroupUserPeer::USER_ID, $this->getId());

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

		$criteria->add(HistoryGroupUserPeer::USER_ID, $this->getId());

		return HistoryGroupUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHistoryGroupUser(HistoryGroupUser $l)
	{
		$this->collHistoryGroupUsers[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getHistoryGroupUsersJoinHistoryGroup($criteria = null, $con = null)
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

				$criteria->add(HistoryGroupUserPeer::USER_ID, $this->getId());

				$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelectJoinHistoryGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(HistoryGroupUserPeer::USER_ID, $this->getId());

			if (!isset($this->lastHistoryGroupUserCriteria) || !$this->lastHistoryGroupUserCriteria->equals($criteria)) {
				$this->collHistoryGroupUsers = HistoryGroupUserPeer::doSelectJoinHistoryGroup($criteria, $con);
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

				$criteria->add(HistoryEventPeer::USER_ID, $this->getId());

				HistoryEventPeer::addSelectColumns($criteria);
				$this->collHistoryEvents = HistoryEventPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HistoryEventPeer::USER_ID, $this->getId());

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

		$criteria->add(HistoryEventPeer::USER_ID, $this->getId());

		return HistoryEventPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHistoryEvent(HistoryEvent $l)
	{
		$this->collHistoryEvents[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getHistoryEventsJoinHistoryGroup($criteria = null, $con = null)
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

				$criteria->add(HistoryEventPeer::USER_ID, $this->getId());

				$this->collHistoryEvents = HistoryEventPeer::doSelectJoinHistoryGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(HistoryEventPeer::USER_ID, $this->getId());

			if (!isset($this->lastHistoryEventCriteria) || !$this->lastHistoryEventCriteria->equals($criteria)) {
				$this->collHistoryEvents = HistoryEventPeer::doSelectJoinHistoryGroup($criteria, $con);
			}
		}
		$this->lastHistoryEventCriteria = $criteria;

		return $this->collHistoryEvents;
	}

	
	public function initSocialConnectionsRelatedByUser1Id()
	{
		if ($this->collSocialConnectionsRelatedByUser1Id === null) {
			$this->collSocialConnectionsRelatedByUser1Id = array();
		}
	}

	
	public function getSocialConnectionsRelatedByUser1Id($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSocialConnectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSocialConnectionsRelatedByUser1Id === null) {
			if ($this->isNew()) {
			   $this->collSocialConnectionsRelatedByUser1Id = array();
			} else {

				$criteria->add(SocialConnectionPeer::USER1_ID, $this->getId());

				SocialConnectionPeer::addSelectColumns($criteria);
				$this->collSocialConnectionsRelatedByUser1Id = SocialConnectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SocialConnectionPeer::USER1_ID, $this->getId());

				SocialConnectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSocialConnectionRelatedByUser1IdCriteria) || !$this->lastSocialConnectionRelatedByUser1IdCriteria->equals($criteria)) {
					$this->collSocialConnectionsRelatedByUser1Id = SocialConnectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSocialConnectionRelatedByUser1IdCriteria = $criteria;
		return $this->collSocialConnectionsRelatedByUser1Id;
	}

	
	public function countSocialConnectionsRelatedByUser1Id($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSocialConnectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SocialConnectionPeer::USER1_ID, $this->getId());

		return SocialConnectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSocialConnectionRelatedByUser1Id(SocialConnection $l)
	{
		$this->collSocialConnectionsRelatedByUser1Id[] = $l;
		$l->setsfGuardUserRelatedByUser1Id($this);
	}

	
	public function initSocialConnectionsRelatedByUser2Id()
	{
		if ($this->collSocialConnectionsRelatedByUser2Id === null) {
			$this->collSocialConnectionsRelatedByUser2Id = array();
		}
	}

	
	public function getSocialConnectionsRelatedByUser2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSocialConnectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSocialConnectionsRelatedByUser2Id === null) {
			if ($this->isNew()) {
			   $this->collSocialConnectionsRelatedByUser2Id = array();
			} else {

				$criteria->add(SocialConnectionPeer::USER2_ID, $this->getId());

				SocialConnectionPeer::addSelectColumns($criteria);
				$this->collSocialConnectionsRelatedByUser2Id = SocialConnectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SocialConnectionPeer::USER2_ID, $this->getId());

				SocialConnectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSocialConnectionRelatedByUser2IdCriteria) || !$this->lastSocialConnectionRelatedByUser2IdCriteria->equals($criteria)) {
					$this->collSocialConnectionsRelatedByUser2Id = SocialConnectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSocialConnectionRelatedByUser2IdCriteria = $criteria;
		return $this->collSocialConnectionsRelatedByUser2Id;
	}

	
	public function countSocialConnectionsRelatedByUser2Id($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSocialConnectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SocialConnectionPeer::USER2_ID, $this->getId());

		return SocialConnectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSocialConnectionRelatedByUser2Id(SocialConnection $l)
	{
		$this->collSocialConnectionsRelatedByUser2Id[] = $l;
		$l->setsfGuardUserRelatedByUser2Id($this);
	}

	
	public function initsfFileGallerys()
	{
		if ($this->collsfFileGallerys === null) {
			$this->collsfFileGallerys = array();
		}
	}

	
	public function getsfFileGallerys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfFileGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfFileGallerys === null) {
			if ($this->isNew()) {
			   $this->collsfFileGallerys = array();
			} else {

				$criteria->add(sfFileGalleryPeer::UPLOADED_BY, $this->getId());

				sfFileGalleryPeer::addSelectColumns($criteria);
				$this->collsfFileGallerys = sfFileGalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfFileGalleryPeer::UPLOADED_BY, $this->getId());

				sfFileGalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfFileGalleryCriteria) || !$this->lastsfFileGalleryCriteria->equals($criteria)) {
					$this->collsfFileGallerys = sfFileGalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfFileGalleryCriteria = $criteria;
		return $this->collsfFileGallerys;
	}

	
	public function countsfFileGallerys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfFileGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfFileGalleryPeer::UPLOADED_BY, $this->getId());

		return sfFileGalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfFileGallery(sfFileGallery $l)
	{
		$this->collsfFileGallerys[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initSuggestedFeatures()
	{
		if ($this->collSuggestedFeatures === null) {
			$this->collSuggestedFeatures = array();
		}
	}

	
	public function getSuggestedFeatures($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSuggestedFeaturePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSuggestedFeatures === null) {
			if ($this->isNew()) {
			   $this->collSuggestedFeatures = array();
			} else {

				$criteria->add(SuggestedFeaturePeer::USER_ID, $this->getId());

				SuggestedFeaturePeer::addSelectColumns($criteria);
				$this->collSuggestedFeatures = SuggestedFeaturePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SuggestedFeaturePeer::USER_ID, $this->getId());

				SuggestedFeaturePeer::addSelectColumns($criteria);
				if (!isset($this->lastSuggestedFeatureCriteria) || !$this->lastSuggestedFeatureCriteria->equals($criteria)) {
					$this->collSuggestedFeatures = SuggestedFeaturePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSuggestedFeatureCriteria = $criteria;
		return $this->collSuggestedFeatures;
	}

	
	public function countSuggestedFeatures($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSuggestedFeaturePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SuggestedFeaturePeer::USER_ID, $this->getId());

		return SuggestedFeaturePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSuggestedFeature(SuggestedFeature $l)
	{
		$this->collSuggestedFeatures[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initContactCothinks()
	{
		if ($this->collContactCothinks === null) {
			$this->collContactCothinks = array();
		}
	}

	
	public function getContactCothinks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContactCothinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContactCothinks === null) {
			if ($this->isNew()) {
			   $this->collContactCothinks = array();
			} else {

				$criteria->add(ContactCothinkPeer::USER_ID, $this->getId());

				ContactCothinkPeer::addSelectColumns($criteria);
				$this->collContactCothinks = ContactCothinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContactCothinkPeer::USER_ID, $this->getId());

				ContactCothinkPeer::addSelectColumns($criteria);
				if (!isset($this->lastContactCothinkCriteria) || !$this->lastContactCothinkCriteria->equals($criteria)) {
					$this->collContactCothinks = ContactCothinkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContactCothinkCriteria = $criteria;
		return $this->collContactCothinks;
	}

	
	public function countContactCothinks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseContactCothinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ContactCothinkPeer::USER_ID, $this->getId());

		return ContactCothinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContactCothink(ContactCothink $l)
	{
		$this->collContactCothinks[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initCoForms()
	{
		if ($this->collCoForms === null) {
			$this->collCoForms = array();
		}
	}

	
	public function getCoForms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoForms === null) {
			if ($this->isNew()) {
			   $this->collCoForms = array();
			} else {

				$criteria->add(CoFormPeer::OWNER_ID, $this->getId());

				CoFormPeer::addSelectColumns($criteria);
				$this->collCoForms = CoFormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoFormPeer::OWNER_ID, $this->getId());

				CoFormPeer::addSelectColumns($criteria);
				if (!isset($this->lastCoFormCriteria) || !$this->lastCoFormCriteria->equals($criteria)) {
					$this->collCoForms = CoFormPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCoFormCriteria = $criteria;
		return $this->collCoForms;
	}

	
	public function countCoForms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCoFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CoFormPeer::OWNER_ID, $this->getId());

		return CoFormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoForm(CoForm $l)
	{
		$this->collCoForms[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initCoApplications()
	{
		if ($this->collCoApplications === null) {
			$this->collCoApplications = array();
		}
	}

	
	public function getCoApplications($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoApplications === null) {
			if ($this->isNew()) {
			   $this->collCoApplications = array();
			} else {

				$criteria->add(CoApplicationPeer::USER_ID, $this->getId());

				CoApplicationPeer::addSelectColumns($criteria);
				$this->collCoApplications = CoApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CoApplicationPeer::USER_ID, $this->getId());

				CoApplicationPeer::addSelectColumns($criteria);
				if (!isset($this->lastCoApplicationCriteria) || !$this->lastCoApplicationCriteria->equals($criteria)) {
					$this->collCoApplications = CoApplicationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCoApplicationCriteria = $criteria;
		return $this->collCoApplications;
	}

	
	public function countCoApplications($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCoApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CoApplicationPeer::USER_ID, $this->getId());

		return CoApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCoApplication(CoApplication $l)
	{
		$this->collCoApplications[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getCoApplicationsJoinCoFormApplication($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCoApplicationPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCoApplications === null) {
			if ($this->isNew()) {
				$this->collCoApplications = array();
			} else {

				$criteria->add(CoApplicationPeer::USER_ID, $this->getId());

				$this->collCoApplications = CoApplicationPeer::doSelectJoinCoFormApplication($criteria, $con);
			}
		} else {
									
			$criteria->add(CoApplicationPeer::USER_ID, $this->getId());

			if (!isset($this->lastCoApplicationCriteria) || !$this->lastCoApplicationCriteria->equals($criteria)) {
				$this->collCoApplications = CoApplicationPeer::doSelectJoinCoFormApplication($criteria, $con);
			}
		}
		$this->lastCoApplicationCriteria = $criteria;

		return $this->collCoApplications;
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

				$criteria->add(PositionApplicationPeer::USER_ID, $this->getId());

				PositionApplicationPeer::addSelectColumns($criteria);
				$this->collPositionApplications = PositionApplicationPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PositionApplicationPeer::USER_ID, $this->getId());

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

		$criteria->add(PositionApplicationPeer::USER_ID, $this->getId());

		return PositionApplicationPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPositionApplication(PositionApplication $l)
	{
		$this->collPositionApplications[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getPositionApplicationsJoinProjectPosition($criteria = null, $con = null)
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

				$criteria->add(PositionApplicationPeer::USER_ID, $this->getId());

				$this->collPositionApplications = PositionApplicationPeer::doSelectJoinProjectPosition($criteria, $con);
			}
		} else {
									
			$criteria->add(PositionApplicationPeer::USER_ID, $this->getId());

			if (!isset($this->lastPositionApplicationCriteria) || !$this->lastPositionApplicationCriteria->equals($criteria)) {
				$this->collPositionApplications = PositionApplicationPeer::doSelectJoinProjectPosition($criteria, $con);
			}
		}
		$this->lastPositionApplicationCriteria = $criteria;

		return $this->collPositionApplications;
	}

	
	public function initsfSimpleForumTopics()
	{
		if ($this->collsfSimpleForumTopics === null) {
			$this->collsfSimpleForumTopics = array();
		}
	}

	
	public function getsfSimpleForumTopics($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumTopics === null) {
			if ($this->isNew()) {
			   $this->collsfSimpleForumTopics = array();
			} else {

				$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

				sfSimpleForumTopicPeer::addSelectColumns($criteria);
				$this->collsfSimpleForumTopics = sfSimpleForumTopicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

				sfSimpleForumTopicPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfSimpleForumTopicCriteria) || !$this->lastsfSimpleForumTopicCriteria->equals($criteria)) {
					$this->collsfSimpleForumTopics = sfSimpleForumTopicPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfSimpleForumTopicCriteria = $criteria;
		return $this->collsfSimpleForumTopics;
	}

	
	public function countsfSimpleForumTopics($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

		return sfSimpleForumTopicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfSimpleForumTopic(sfSimpleForumTopic $l)
	{
		$this->collsfSimpleForumTopics[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfSimpleForumTopicsJoinsfSimpleForumForum($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumTopics === null) {
			if ($this->isNew()) {
				$this->collsfSimpleForumTopics = array();
			} else {

				$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

				$this->collsfSimpleForumTopics = sfSimpleForumTopicPeer::doSelectJoinsfSimpleForumForum($criteria, $con);
			}
		} else {
									
			$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfSimpleForumTopicCriteria) || !$this->lastsfSimpleForumTopicCriteria->equals($criteria)) {
				$this->collsfSimpleForumTopics = sfSimpleForumTopicPeer::doSelectJoinsfSimpleForumForum($criteria, $con);
			}
		}
		$this->lastsfSimpleForumTopicCriteria = $criteria;

		return $this->collsfSimpleForumTopics;
	}


	
	public function getsfSimpleForumTopicsJoinsfSimpleForumPost($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumTopics === null) {
			if ($this->isNew()) {
				$this->collsfSimpleForumTopics = array();
			} else {

				$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

				$this->collsfSimpleForumTopics = sfSimpleForumTopicPeer::doSelectJoinsfSimpleForumPost($criteria, $con);
			}
		} else {
									
			$criteria->add(sfSimpleForumTopicPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfSimpleForumTopicCriteria) || !$this->lastsfSimpleForumTopicCriteria->equals($criteria)) {
				$this->collsfSimpleForumTopics = sfSimpleForumTopicPeer::doSelectJoinsfSimpleForumPost($criteria, $con);
			}
		}
		$this->lastsfSimpleForumTopicCriteria = $criteria;

		return $this->collsfSimpleForumTopics;
	}

	
	public function initsfSimpleForumPosts()
	{
		if ($this->collsfSimpleForumPosts === null) {
			$this->collsfSimpleForumPosts = array();
		}
	}

	
	public function getsfSimpleForumPosts($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumPostPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumPosts === null) {
			if ($this->isNew()) {
			   $this->collsfSimpleForumPosts = array();
			} else {

				$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

				sfSimpleForumPostPeer::addSelectColumns($criteria);
				$this->collsfSimpleForumPosts = sfSimpleForumPostPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

				sfSimpleForumPostPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfSimpleForumPostCriteria) || !$this->lastsfSimpleForumPostCriteria->equals($criteria)) {
					$this->collsfSimpleForumPosts = sfSimpleForumPostPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfSimpleForumPostCriteria = $criteria;
		return $this->collsfSimpleForumPosts;
	}

	
	public function countsfSimpleForumPosts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumPostPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

		return sfSimpleForumPostPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfSimpleForumPost(sfSimpleForumPost $l)
	{
		$this->collsfSimpleForumPosts[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfSimpleForumPostsJoinsfSimpleForumTopic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumPostPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumPosts === null) {
			if ($this->isNew()) {
				$this->collsfSimpleForumPosts = array();
			} else {

				$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

				$this->collsfSimpleForumPosts = sfSimpleForumPostPeer::doSelectJoinsfSimpleForumTopic($criteria, $con);
			}
		} else {
									
			$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfSimpleForumPostCriteria) || !$this->lastsfSimpleForumPostCriteria->equals($criteria)) {
				$this->collsfSimpleForumPosts = sfSimpleForumPostPeer::doSelectJoinsfSimpleForumTopic($criteria, $con);
			}
		}
		$this->lastsfSimpleForumPostCriteria = $criteria;

		return $this->collsfSimpleForumPosts;
	}


	
	public function getsfSimpleForumPostsJoinsfSimpleForumForum($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumPostPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumPosts === null) {
			if ($this->isNew()) {
				$this->collsfSimpleForumPosts = array();
			} else {

				$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

				$this->collsfSimpleForumPosts = sfSimpleForumPostPeer::doSelectJoinsfSimpleForumForum($criteria, $con);
			}
		} else {
									
			$criteria->add(sfSimpleForumPostPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfSimpleForumPostCriteria) || !$this->lastsfSimpleForumPostCriteria->equals($criteria)) {
				$this->collsfSimpleForumPosts = sfSimpleForumPostPeer::doSelectJoinsfSimpleForumForum($criteria, $con);
			}
		}
		$this->lastsfSimpleForumPostCriteria = $criteria;

		return $this->collsfSimpleForumPosts;
	}

	
	public function initsfSimpleForumTopicViews()
	{
		if ($this->collsfSimpleForumTopicViews === null) {
			$this->collsfSimpleForumTopicViews = array();
		}
	}

	
	public function getsfSimpleForumTopicViews($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicViewPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumTopicViews === null) {
			if ($this->isNew()) {
			   $this->collsfSimpleForumTopicViews = array();
			} else {

				$criteria->add(sfSimpleForumTopicViewPeer::USER_ID, $this->getId());

				sfSimpleForumTopicViewPeer::addSelectColumns($criteria);
				$this->collsfSimpleForumTopicViews = sfSimpleForumTopicViewPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfSimpleForumTopicViewPeer::USER_ID, $this->getId());

				sfSimpleForumTopicViewPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfSimpleForumTopicViewCriteria) || !$this->lastsfSimpleForumTopicViewCriteria->equals($criteria)) {
					$this->collsfSimpleForumTopicViews = sfSimpleForumTopicViewPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfSimpleForumTopicViewCriteria = $criteria;
		return $this->collsfSimpleForumTopicViews;
	}

	
	public function countsfSimpleForumTopicViews($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicViewPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfSimpleForumTopicViewPeer::USER_ID, $this->getId());

		return sfSimpleForumTopicViewPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfSimpleForumTopicView(sfSimpleForumTopicView $l)
	{
		$this->collsfSimpleForumTopicViews[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfSimpleForumTopicViewsJoinsfSimpleForumTopic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumTopicViewPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumTopicViews === null) {
			if ($this->isNew()) {
				$this->collsfSimpleForumTopicViews = array();
			} else {

				$criteria->add(sfSimpleForumTopicViewPeer::USER_ID, $this->getId());

				$this->collsfSimpleForumTopicViews = sfSimpleForumTopicViewPeer::doSelectJoinsfSimpleForumTopic($criteria, $con);
			}
		} else {
									
			$criteria->add(sfSimpleForumTopicViewPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfSimpleForumTopicViewCriteria) || !$this->lastsfSimpleForumTopicViewCriteria->equals($criteria)) {
				$this->collsfSimpleForumTopicViews = sfSimpleForumTopicViewPeer::doSelectJoinsfSimpleForumTopic($criteria, $con);
			}
		}
		$this->lastsfSimpleForumTopicViewCriteria = $criteria;

		return $this->collsfSimpleForumTopicViews;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfGuardUser:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardUser::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 