<?php


abstract class BaseProjectSetting extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $project_id;


	
	protected $uuid;


	
	protected $group;


	
	protected $title;


	
	protected $setting;


	
	protected $description;

	
	protected $aProject;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getProjectId()
	{

		return $this->project_id;
	}

	
	public function getUuid()
	{

		return $this->uuid;
	}

	
	public function getGroup()
	{

		return $this->group;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getSetting()
	{

		return $this->setting;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::ID;
		}

	} 
	
	public function setProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_id !== $v) {
			$this->project_id = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::PROJECT_ID;
		}

		if ($this->aProject !== null && $this->aProject->getId() !== $v) {
			$this->aProject = null;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::UUID;
		}

	} 
	
	public function setGroup($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->group !== $v) {
			$this->group = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::GROUP;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::TITLE;
		}

	} 
	
	public function setSetting($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->setting !== $v) {
			$this->setting = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::SETTING;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProjectSettingPeer::DESCRIPTION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->project_id = $rs->getInt($startcol + 1);

			$this->uuid = $rs->getString($startcol + 2);

			$this->group = $rs->getString($startcol + 3);

			$this->title = $rs->getString($startcol + 4);

			$this->setting = $rs->getString($startcol + 5);

			$this->description = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ProjectSetting object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectSetting:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectSettingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectSettingPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProjectSetting:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectSetting:save:pre') as $callable)
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
			$con = Propel::getConnection(ProjectSettingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProjectSetting:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProjectSettingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectSettingPeer::doUpdate($this, $con);
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


												
			if ($this->aProject !== null) {
				if (!$this->aProject->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
				}
			}


			if (($retval = ProjectSettingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getProjectId();
				break;
			case 2:
				return $this->getUuid();
				break;
			case 3:
				return $this->getGroup();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getSetting();
				break;
			case 6:
				return $this->getDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectSettingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getProjectId(),
			$keys[2] => $this->getUuid(),
			$keys[3] => $this->getGroup(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getSetting(),
			$keys[6] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setProjectId($value);
				break;
			case 2:
				$this->setUuid($value);
				break;
			case 3:
				$this->setGroup($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setSetting($value);
				break;
			case 6:
				$this->setDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectSettingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProjectId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUuid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGroup($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSetting($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectSettingPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectSettingPeer::ID)) $criteria->add(ProjectSettingPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectSettingPeer::PROJECT_ID)) $criteria->add(ProjectSettingPeer::PROJECT_ID, $this->project_id);
		if ($this->isColumnModified(ProjectSettingPeer::UUID)) $criteria->add(ProjectSettingPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ProjectSettingPeer::GROUP)) $criteria->add(ProjectSettingPeer::GROUP, $this->group);
		if ($this->isColumnModified(ProjectSettingPeer::TITLE)) $criteria->add(ProjectSettingPeer::TITLE, $this->title);
		if ($this->isColumnModified(ProjectSettingPeer::SETTING)) $criteria->add(ProjectSettingPeer::SETTING, $this->setting);
		if ($this->isColumnModified(ProjectSettingPeer::DESCRIPTION)) $criteria->add(ProjectSettingPeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectSettingPeer::DATABASE_NAME);

		$criteria->add(ProjectSettingPeer::ID, $this->id);

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

		$copyObj->setProjectId($this->project_id);

		$copyObj->setUuid($this->uuid);

		$copyObj->setGroup($this->group);

		$copyObj->setTitle($this->title);

		$copyObj->setSetting($this->setting);

		$copyObj->setDescription($this->description);


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
			self::$peer = new ProjectSettingPeer();
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


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProjectSetting:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProjectSetting::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 