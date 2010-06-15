<?php


abstract class BaseProjectForm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $project_id;


	
	protected $uuid;


	
	protected $title;


	
	protected $setting;


	
	protected $description;


	
	protected $widget_1;


	
	protected $wigest_1_setting;


	
	protected $widget_2;


	
	protected $wigest_2_setting;


	
	protected $widget_3;


	
	protected $wigest_3_setting;


	
	protected $widget_4;


	
	protected $wigest_4_setting;

	
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

	
	public function getWidget1()
	{

		return $this->widget_1;
	}

	
	public function getWigest1Setting()
	{

		return $this->wigest_1_setting;
	}

	
	public function getWidget2()
	{

		return $this->widget_2;
	}

	
	public function getWigest2Setting()
	{

		return $this->wigest_2_setting;
	}

	
	public function getWidget3()
	{

		return $this->widget_3;
	}

	
	public function getWigest3Setting()
	{

		return $this->wigest_3_setting;
	}

	
	public function getWidget4()
	{

		return $this->widget_4;
	}

	
	public function getWigest4Setting()
	{

		return $this->wigest_4_setting;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProjectFormPeer::ID;
		}

	} 
	
	public function setProjectId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->project_id !== $v) {
			$this->project_id = $v;
			$this->modifiedColumns[] = ProjectFormPeer::PROJECT_ID;
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
			$this->modifiedColumns[] = ProjectFormPeer::UUID;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ProjectFormPeer::TITLE;
		}

	} 
	
	public function setSetting($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->setting !== $v) {
			$this->setting = $v;
			$this->modifiedColumns[] = ProjectFormPeer::SETTING;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ProjectFormPeer::DESCRIPTION;
		}

	} 
	
	public function setWidget1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->widget_1 !== $v) {
			$this->widget_1 = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIDGET_1;
		}

	} 
	
	public function setWigest1Setting($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->wigest_1_setting !== $v) {
			$this->wigest_1_setting = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIGEST_1_SETTING;
		}

	} 
	
	public function setWidget2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->widget_2 !== $v) {
			$this->widget_2 = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIDGET_2;
		}

	} 
	
	public function setWigest2Setting($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->wigest_2_setting !== $v) {
			$this->wigest_2_setting = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIGEST_2_SETTING;
		}

	} 
	
	public function setWidget3($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->widget_3 !== $v) {
			$this->widget_3 = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIDGET_3;
		}

	} 
	
	public function setWigest3Setting($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->wigest_3_setting !== $v) {
			$this->wigest_3_setting = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIGEST_3_SETTING;
		}

	} 
	
	public function setWidget4($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->widget_4 !== $v) {
			$this->widget_4 = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIDGET_4;
		}

	} 
	
	public function setWigest4Setting($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->wigest_4_setting !== $v) {
			$this->wigest_4_setting = $v;
			$this->modifiedColumns[] = ProjectFormPeer::WIGEST_4_SETTING;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->project_id = $rs->getInt($startcol + 1);

			$this->uuid = $rs->getString($startcol + 2);

			$this->title = $rs->getString($startcol + 3);

			$this->setting = $rs->getString($startcol + 4);

			$this->description = $rs->getString($startcol + 5);

			$this->widget_1 = $rs->getString($startcol + 6);

			$this->wigest_1_setting = $rs->getString($startcol + 7);

			$this->widget_2 = $rs->getString($startcol + 8);

			$this->wigest_2_setting = $rs->getString($startcol + 9);

			$this->widget_3 = $rs->getString($startcol + 10);

			$this->wigest_3_setting = $rs->getString($startcol + 11);

			$this->widget_4 = $rs->getString($startcol + 12);

			$this->wigest_4_setting = $rs->getString($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ProjectForm object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectForm:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProjectFormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProjectFormPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProjectForm:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectForm:save:pre') as $callable)
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
			$con = Propel::getConnection(ProjectFormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProjectForm:save:post') as $callable)
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
					$pk = ProjectFormPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProjectFormPeer::doUpdate($this, $con);
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


			if (($retval = ProjectFormPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectFormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTitle();
				break;
			case 4:
				return $this->getSetting();
				break;
			case 5:
				return $this->getDescription();
				break;
			case 6:
				return $this->getWidget1();
				break;
			case 7:
				return $this->getWigest1Setting();
				break;
			case 8:
				return $this->getWidget2();
				break;
			case 9:
				return $this->getWigest2Setting();
				break;
			case 10:
				return $this->getWidget3();
				break;
			case 11:
				return $this->getWigest3Setting();
				break;
			case 12:
				return $this->getWidget4();
				break;
			case 13:
				return $this->getWigest4Setting();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectFormPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getProjectId(),
			$keys[2] => $this->getUuid(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getSetting(),
			$keys[5] => $this->getDescription(),
			$keys[6] => $this->getWidget1(),
			$keys[7] => $this->getWigest1Setting(),
			$keys[8] => $this->getWidget2(),
			$keys[9] => $this->getWigest2Setting(),
			$keys[10] => $this->getWidget3(),
			$keys[11] => $this->getWigest3Setting(),
			$keys[12] => $this->getWidget4(),
			$keys[13] => $this->getWigest4Setting(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProjectFormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTitle($value);
				break;
			case 4:
				$this->setSetting($value);
				break;
			case 5:
				$this->setDescription($value);
				break;
			case 6:
				$this->setWidget1($value);
				break;
			case 7:
				$this->setWigest1Setting($value);
				break;
			case 8:
				$this->setWidget2($value);
				break;
			case 9:
				$this->setWigest2Setting($value);
				break;
			case 10:
				$this->setWidget3($value);
				break;
			case 11:
				$this->setWigest3Setting($value);
				break;
			case 12:
				$this->setWidget4($value);
				break;
			case 13:
				$this->setWigest4Setting($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProjectFormPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProjectId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUuid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSetting($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setWidget1($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setWigest1Setting($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWidget2($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setWigest2Setting($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setWidget3($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setWigest3Setting($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setWidget4($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setWigest4Setting($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProjectFormPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProjectFormPeer::ID)) $criteria->add(ProjectFormPeer::ID, $this->id);
		if ($this->isColumnModified(ProjectFormPeer::PROJECT_ID)) $criteria->add(ProjectFormPeer::PROJECT_ID, $this->project_id);
		if ($this->isColumnModified(ProjectFormPeer::UUID)) $criteria->add(ProjectFormPeer::UUID, $this->uuid);
		if ($this->isColumnModified(ProjectFormPeer::TITLE)) $criteria->add(ProjectFormPeer::TITLE, $this->title);
		if ($this->isColumnModified(ProjectFormPeer::SETTING)) $criteria->add(ProjectFormPeer::SETTING, $this->setting);
		if ($this->isColumnModified(ProjectFormPeer::DESCRIPTION)) $criteria->add(ProjectFormPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ProjectFormPeer::WIDGET_1)) $criteria->add(ProjectFormPeer::WIDGET_1, $this->widget_1);
		if ($this->isColumnModified(ProjectFormPeer::WIGEST_1_SETTING)) $criteria->add(ProjectFormPeer::WIGEST_1_SETTING, $this->wigest_1_setting);
		if ($this->isColumnModified(ProjectFormPeer::WIDGET_2)) $criteria->add(ProjectFormPeer::WIDGET_2, $this->widget_2);
		if ($this->isColumnModified(ProjectFormPeer::WIGEST_2_SETTING)) $criteria->add(ProjectFormPeer::WIGEST_2_SETTING, $this->wigest_2_setting);
		if ($this->isColumnModified(ProjectFormPeer::WIDGET_3)) $criteria->add(ProjectFormPeer::WIDGET_3, $this->widget_3);
		if ($this->isColumnModified(ProjectFormPeer::WIGEST_3_SETTING)) $criteria->add(ProjectFormPeer::WIGEST_3_SETTING, $this->wigest_3_setting);
		if ($this->isColumnModified(ProjectFormPeer::WIDGET_4)) $criteria->add(ProjectFormPeer::WIDGET_4, $this->widget_4);
		if ($this->isColumnModified(ProjectFormPeer::WIGEST_4_SETTING)) $criteria->add(ProjectFormPeer::WIGEST_4_SETTING, $this->wigest_4_setting);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProjectFormPeer::DATABASE_NAME);

		$criteria->add(ProjectFormPeer::ID, $this->id);

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

		$copyObj->setTitle($this->title);

		$copyObj->setSetting($this->setting);

		$copyObj->setDescription($this->description);

		$copyObj->setWidget1($this->widget_1);

		$copyObj->setWigest1Setting($this->wigest_1_setting);

		$copyObj->setWidget2($this->widget_2);

		$copyObj->setWigest2Setting($this->wigest_2_setting);

		$copyObj->setWidget3($this->widget_3);

		$copyObj->setWigest3Setting($this->wigest_3_setting);

		$copyObj->setWidget4($this->widget_4);

		$copyObj->setWigest4Setting($this->wigest_4_setting);


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
			self::$peer = new ProjectFormPeer();
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
    if (!$callable = sfMixer::getCallable('BaseProjectForm:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProjectForm::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 