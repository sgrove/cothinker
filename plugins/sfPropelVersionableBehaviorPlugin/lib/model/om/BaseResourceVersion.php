<?php


abstract class BaseResourceVersion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $resource_id;


	
	protected $resource_name;


	
	protected $number;


	
	protected $title;


	
	protected $comment;


	
	protected $created_by;


	
	protected $created_at;


	
	protected $resource_version_id;

	
	protected $aResourceVersionRelatedByResourceVersionId;

	
	protected $collResourceVersionsRelatedByResourceVersionId;

	
	protected $lastResourceVersionRelatedByResourceVersionIdCriteria = null;

	
	protected $collResourceAttributeVersions;

	
	protected $lastResourceAttributeVersionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getResourceId()
	{

		return $this->resource_id;
	}

	
	public function getResourceName()
	{

		return $this->resource_name;
	}

	
	public function getNumber()
	{

		return $this->number;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
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

	
	public function getResourceVersionId()
	{

		return $this->resource_version_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::ID;
		}

	} 
	
	public function setResourceId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->resource_id !== $v) {
			$this->resource_id = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::RESOURCE_ID;
		}

	} 
	
	public function setResourceName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->resource_name !== $v) {
			$this->resource_name = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::RESOURCE_NAME;
		}

	} 
	
	public function setNumber($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->number !== $v) {
			$this->number = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::NUMBER;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::TITLE;
		}

	} 
	
	public function setComment($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::COMMENT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ResourceVersionPeer::CREATED_AT;
		}

	} 
	
	public function setResourceVersionId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->resource_version_id !== $v) {
			$this->resource_version_id = $v;
			$this->modifiedColumns[] = ResourceVersionPeer::RESOURCE_VERSION_ID;
		}

		if ($this->aResourceVersionRelatedByResourceVersionId !== null && $this->aResourceVersionRelatedByResourceVersionId->getId() !== $v) {
			$this->aResourceVersionRelatedByResourceVersionId = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->resource_id = $rs->getInt($startcol + 1);

			$this->resource_name = $rs->getString($startcol + 2);

			$this->number = $rs->getInt($startcol + 3);

			$this->title = $rs->getString($startcol + 4);

			$this->comment = $rs->getString($startcol + 5);

			$this->created_by = $rs->getString($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->resource_version_id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ResourceVersion object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseResourceVersion:delete:pre') as $callable)
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
			$con = Propel::getConnection(ResourceVersionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ResourceVersionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseResourceVersion:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseResourceVersion:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ResourceVersionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResourceVersionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseResourceVersion:save:post') as $callable)
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


												
			if ($this->aResourceVersionRelatedByResourceVersionId !== null) {
				if ($this->aResourceVersionRelatedByResourceVersionId->isModified()) {
					$affectedRows += $this->aResourceVersionRelatedByResourceVersionId->save($con);
				}
				$this->setResourceVersionRelatedByResourceVersionId($this->aResourceVersionRelatedByResourceVersionId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ResourceVersionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ResourceVersionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collResourceVersionsRelatedByResourceVersionId !== null) {
				foreach($this->collResourceVersionsRelatedByResourceVersionId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collResourceAttributeVersions !== null) {
				foreach($this->collResourceAttributeVersions as $referrerFK) {
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


												
			if ($this->aResourceVersionRelatedByResourceVersionId !== null) {
				if (!$this->aResourceVersionRelatedByResourceVersionId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResourceVersionRelatedByResourceVersionId->getValidationFailures());
				}
			}


			if (($retval = ResourceVersionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collResourceAttributeVersions !== null) {
					foreach($this->collResourceAttributeVersions as $referrerFK) {
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
		$pos = ResourceVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getResourceId();
				break;
			case 2:
				return $this->getResourceName();
				break;
			case 3:
				return $this->getNumber();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getComment();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getResourceVersionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResourceVersionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getResourceId(),
			$keys[2] => $this->getResourceName(),
			$keys[3] => $this->getNumber(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getComment(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getResourceVersionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResourceVersionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setResourceId($value);
				break;
			case 2:
				$this->setResourceName($value);
				break;
			case 3:
				$this->setNumber($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setComment($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setResourceVersionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResourceVersionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setResourceId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setResourceName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumber($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setComment($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setResourceVersionId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ResourceVersionPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResourceVersionPeer::ID)) $criteria->add(ResourceVersionPeer::ID, $this->id);
		if ($this->isColumnModified(ResourceVersionPeer::RESOURCE_ID)) $criteria->add(ResourceVersionPeer::RESOURCE_ID, $this->resource_id);
		if ($this->isColumnModified(ResourceVersionPeer::RESOURCE_NAME)) $criteria->add(ResourceVersionPeer::RESOURCE_NAME, $this->resource_name);
		if ($this->isColumnModified(ResourceVersionPeer::NUMBER)) $criteria->add(ResourceVersionPeer::NUMBER, $this->number);
		if ($this->isColumnModified(ResourceVersionPeer::TITLE)) $criteria->add(ResourceVersionPeer::TITLE, $this->title);
		if ($this->isColumnModified(ResourceVersionPeer::COMMENT)) $criteria->add(ResourceVersionPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(ResourceVersionPeer::CREATED_BY)) $criteria->add(ResourceVersionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ResourceVersionPeer::CREATED_AT)) $criteria->add(ResourceVersionPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ResourceVersionPeer::RESOURCE_VERSION_ID)) $criteria->add(ResourceVersionPeer::RESOURCE_VERSION_ID, $this->resource_version_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ResourceVersionPeer::DATABASE_NAME);

		$criteria->add(ResourceVersionPeer::ID, $this->id);

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

		$copyObj->setResourceId($this->resource_id);

		$copyObj->setResourceName($this->resource_name);

		$copyObj->setNumber($this->number);

		$copyObj->setTitle($this->title);

		$copyObj->setComment($this->comment);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setResourceVersionId($this->resource_version_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getResourceVersionsRelatedByResourceVersionId() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addResourceVersionRelatedByResourceVersionId($relObj->copy($deepCopy));
			}

			foreach($this->getResourceAttributeVersions() as $relObj) {
				$copyObj->addResourceAttributeVersion($relObj->copy($deepCopy));
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
			self::$peer = new ResourceVersionPeer();
		}
		return self::$peer;
	}

	
	public function setResourceVersionRelatedByResourceVersionId($v)
	{


		if ($v === null) {
			$this->setResourceVersionId(NULL);
		} else {
			$this->setResourceVersionId($v->getId());
		}


		$this->aResourceVersionRelatedByResourceVersionId = $v;
	}


	
	public function getResourceVersionRelatedByResourceVersionId($con = null)
	{
		if ($this->aResourceVersionRelatedByResourceVersionId === null && ($this->resource_version_id !== null)) {
						include_once 'plugins/sfPropelVersionableBehaviorPlugin/lib/model/om/BaseResourceVersionPeer.php';

			$this->aResourceVersionRelatedByResourceVersionId = ResourceVersionPeer::retrieveByPK($this->resource_version_id, $con);

			
		}
		return $this->aResourceVersionRelatedByResourceVersionId;
	}

	
	public function initResourceVersionsRelatedByResourceVersionId()
	{
		if ($this->collResourceVersionsRelatedByResourceVersionId === null) {
			$this->collResourceVersionsRelatedByResourceVersionId = array();
		}
	}

	
	public function getResourceVersionsRelatedByResourceVersionId($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelVersionableBehaviorPlugin/lib/model/om/BaseResourceVersionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResourceVersionsRelatedByResourceVersionId === null) {
			if ($this->isNew()) {
			   $this->collResourceVersionsRelatedByResourceVersionId = array();
			} else {

				$criteria->add(ResourceVersionPeer::RESOURCE_VERSION_ID, $this->getId());

				ResourceVersionPeer::addSelectColumns($criteria);
				$this->collResourceVersionsRelatedByResourceVersionId = ResourceVersionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResourceVersionPeer::RESOURCE_VERSION_ID, $this->getId());

				ResourceVersionPeer::addSelectColumns($criteria);
				if (!isset($this->lastResourceVersionRelatedByResourceVersionIdCriteria) || !$this->lastResourceVersionRelatedByResourceVersionIdCriteria->equals($criteria)) {
					$this->collResourceVersionsRelatedByResourceVersionId = ResourceVersionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResourceVersionRelatedByResourceVersionIdCriteria = $criteria;
		return $this->collResourceVersionsRelatedByResourceVersionId;
	}

	
	public function countResourceVersionsRelatedByResourceVersionId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelVersionableBehaviorPlugin/lib/model/om/BaseResourceVersionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ResourceVersionPeer::RESOURCE_VERSION_ID, $this->getId());

		return ResourceVersionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResourceVersionRelatedByResourceVersionId(ResourceVersion $l)
	{
		$this->collResourceVersionsRelatedByResourceVersionId[] = $l;
		$l->setResourceVersionRelatedByResourceVersionId($this);
	}

	
	public function initResourceAttributeVersions()
	{
		if ($this->collResourceAttributeVersions === null) {
			$this->collResourceAttributeVersions = array();
		}
	}

	
	public function getResourceAttributeVersions($criteria = null, $con = null)
	{
				include_once 'plugins/sfPropelVersionableBehaviorPlugin/lib/model/om/BaseResourceAttributeVersionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResourceAttributeVersions === null) {
			if ($this->isNew()) {
			   $this->collResourceAttributeVersions = array();
			} else {

				$criteria->add(ResourceAttributeVersionPeer::RESOURCE_VERSION_ID, $this->getId());

				ResourceAttributeVersionPeer::addSelectColumns($criteria);
				$this->collResourceAttributeVersions = ResourceAttributeVersionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResourceAttributeVersionPeer::RESOURCE_VERSION_ID, $this->getId());

				ResourceAttributeVersionPeer::addSelectColumns($criteria);
				if (!isset($this->lastResourceAttributeVersionCriteria) || !$this->lastResourceAttributeVersionCriteria->equals($criteria)) {
					$this->collResourceAttributeVersions = ResourceAttributeVersionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResourceAttributeVersionCriteria = $criteria;
		return $this->collResourceAttributeVersions;
	}

	
	public function countResourceAttributeVersions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfPropelVersionableBehaviorPlugin/lib/model/om/BaseResourceAttributeVersionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ResourceAttributeVersionPeer::RESOURCE_VERSION_ID, $this->getId());

		return ResourceAttributeVersionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResourceAttributeVersion(ResourceAttributeVersion $l)
	{
		$this->collResourceAttributeVersions[] = $l;
		$l->setResourceVersion($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseResourceVersion:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseResourceVersion::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 