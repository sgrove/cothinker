<?php


abstract class BasesfSimpleForumOwner extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $title;


	
	protected $slug;


	
	protected $model;


	
	protected $model_id;


	
	protected $standalone;


	
	protected $created_at;

	
	protected $collsfSimpleForumCategorys;

	
	protected $lastsfSimpleForumCategoryCriteria = null;

	
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

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getModel()
	{

		return $this->model;
	}

	
	public function getModelId()
	{

		return $this->model_id;
	}

	
	public function getStandalone()
	{

		return $this->standalone;
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
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::UUID;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::TITLE;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::SLUG;
		}

	} 
	
	public function setModel($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->model !== $v) {
			$this->model = $v;
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::MODEL;
		}

	} 
	
	public function setModelId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->model_id !== $v) {
			$this->model_id = $v;
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::MODEL_ID;
		}

	} 
	
	public function setStandalone($v)
	{

		if ($this->standalone !== $v) {
			$this->standalone = $v;
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::STANDALONE;
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
			$this->modifiedColumns[] = sfSimpleForumOwnerPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->slug = $rs->getString($startcol + 3);

			$this->model = $rs->getString($startcol + 4);

			$this->model_id = $rs->getInt($startcol + 5);

			$this->standalone = $rs->getBoolean($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfSimpleForumOwner object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumOwner:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfSimpleForumOwnerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfSimpleForumOwnerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfSimpleForumOwner:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleForumOwner:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfSimpleForumOwnerPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfSimpleForumOwnerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfSimpleForumOwner:save:post') as $callable)
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
					$pk = sfSimpleForumOwnerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfSimpleForumOwnerPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfSimpleForumCategorys !== null) {
				foreach($this->collsfSimpleForumCategorys as $referrerFK) {
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


			if (($retval = sfSimpleForumOwnerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfSimpleForumCategorys !== null) {
					foreach($this->collsfSimpleForumCategorys as $referrerFK) {
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
		$pos = sfSimpleForumOwnerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTitle();
				break;
			case 3:
				return $this->getSlug();
				break;
			case 4:
				return $this->getModel();
				break;
			case 5:
				return $this->getModelId();
				break;
			case 6:
				return $this->getStandalone();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfSimpleForumOwnerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getSlug(),
			$keys[4] => $this->getModel(),
			$keys[5] => $this->getModelId(),
			$keys[6] => $this->getStandalone(),
			$keys[7] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfSimpleForumOwnerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTitle($value);
				break;
			case 3:
				$this->setSlug($value);
				break;
			case 4:
				$this->setModel($value);
				break;
			case 5:
				$this->setModelId($value);
				break;
			case 6:
				$this->setStandalone($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfSimpleForumOwnerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSlug($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setModel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setModelId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStandalone($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfSimpleForumOwnerPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfSimpleForumOwnerPeer::ID)) $criteria->add(sfSimpleForumOwnerPeer::ID, $this->id);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::UUID)) $criteria->add(sfSimpleForumOwnerPeer::UUID, $this->uuid);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::TITLE)) $criteria->add(sfSimpleForumOwnerPeer::TITLE, $this->title);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::SLUG)) $criteria->add(sfSimpleForumOwnerPeer::SLUG, $this->slug);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::MODEL)) $criteria->add(sfSimpleForumOwnerPeer::MODEL, $this->model);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::MODEL_ID)) $criteria->add(sfSimpleForumOwnerPeer::MODEL_ID, $this->model_id);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::STANDALONE)) $criteria->add(sfSimpleForumOwnerPeer::STANDALONE, $this->standalone);
		if ($this->isColumnModified(sfSimpleForumOwnerPeer::CREATED_AT)) $criteria->add(sfSimpleForumOwnerPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfSimpleForumOwnerPeer::DATABASE_NAME);

		$criteria->add(sfSimpleForumOwnerPeer::ID, $this->id);

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

		$copyObj->setTitle($this->title);

		$copyObj->setSlug($this->slug);

		$copyObj->setModel($this->model);

		$copyObj->setModelId($this->model_id);

		$copyObj->setStandalone($this->standalone);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfSimpleForumCategorys() as $relObj) {
				$copyObj->addsfSimpleForumCategory($relObj->copy($deepCopy));
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
			self::$peer = new sfSimpleForumOwnerPeer();
		}
		return self::$peer;
	}

	
	public function initsfSimpleForumCategorys()
	{
		if ($this->collsfSimpleForumCategorys === null) {
			$this->collsfSimpleForumCategorys = array();
		}
	}

	
	public function getsfSimpleForumCategorys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleForumCategorys === null) {
			if ($this->isNew()) {
			   $this->collsfSimpleForumCategorys = array();
			} else {

				$criteria->add(sfSimpleForumCategoryPeer::OWNER_ID, $this->getId());

				sfSimpleForumCategoryPeer::addSelectColumns($criteria);
				$this->collsfSimpleForumCategorys = sfSimpleForumCategoryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfSimpleForumCategoryPeer::OWNER_ID, $this->getId());

				sfSimpleForumCategoryPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfSimpleForumCategoryCriteria) || !$this->lastsfSimpleForumCategoryCriteria->equals($criteria)) {
					$this->collsfSimpleForumCategorys = sfSimpleForumCategoryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfSimpleForumCategoryCriteria = $criteria;
		return $this->collsfSimpleForumCategorys;
	}

	
	public function countsfSimpleForumCategorys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasesfSimpleForumCategoryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfSimpleForumCategoryPeer::OWNER_ID, $this->getId());

		return sfSimpleForumCategoryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfSimpleForumCategory(sfSimpleForumCategory $l)
	{
		$this->collsfSimpleForumCategorys[] = $l;
		$l->setsfSimpleForumOwner($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfSimpleForumOwner:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfSimpleForumOwner::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 