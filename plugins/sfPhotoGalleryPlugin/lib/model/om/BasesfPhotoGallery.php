<?php


abstract class BasesfPhotoGallery extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uuid;


	
	protected $entity;


	
	protected $entity_id;


	
	protected $name;


	
	protected $mime_type;


	
	protected $size;


	
	protected $suffix;


	
	protected $title;


	
	protected $description;


	
	protected $rank;


	
	protected $created_at;

	
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

	
	public function getEntity()
	{

		return $this->entity;
	}

	
	public function getEntityId()
	{

		return $this->entity_id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getMimeType()
	{

		return $this->mime_type;
	}

	
	public function getSize()
	{

		return $this->size;
	}

	
	public function getSuffix()
	{

		return $this->suffix;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getRank()
	{

		return $this->rank;
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
			$this->modifiedColumns[] = sfPhotoGalleryPeer::ID;
		}

	} 
	
	public function setUuid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uuid !== $v) {
			$this->uuid = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::UUID;
		}

	} 
	
	public function setEntity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->entity !== $v) {
			$this->entity = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::ENTITY;
		}

	} 
	
	public function setEntityId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->entity_id !== $v) {
			$this->entity_id = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::ENTITY_ID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::NAME;
		}

	} 
	
	public function setMimeType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mime_type !== $v) {
			$this->mime_type = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::MIME_TYPE;
		}

	} 
	
	public function setSize($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->size !== $v) {
			$this->size = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::SIZE;
		}

	} 
	
	public function setSuffix($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->suffix !== $v) {
			$this->suffix = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::SUFFIX;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::TITLE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::DESCRIPTION;
		}

	} 
	
	public function setRank($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = sfPhotoGalleryPeer::RANK;
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
			$this->modifiedColumns[] = sfPhotoGalleryPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uuid = $rs->getString($startcol + 1);

			$this->entity = $rs->getString($startcol + 2);

			$this->entity_id = $rs->getInt($startcol + 3);

			$this->name = $rs->getString($startcol + 4);

			$this->mime_type = $rs->getString($startcol + 5);

			$this->size = $rs->getInt($startcol + 6);

			$this->suffix = $rs->getString($startcol + 7);

			$this->title = $rs->getString($startcol + 8);

			$this->description = $rs->getString($startcol + 9);

			$this->rank = $rs->getInt($startcol + 10);

			$this->created_at = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfPhotoGallery object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfPhotoGallery:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfPhotoGalleryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfPhotoGalleryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfPhotoGallery:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfPhotoGallery:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfPhotoGalleryPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfPhotoGalleryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfPhotoGallery:save:post') as $callable)
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
					$pk = sfPhotoGalleryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfPhotoGalleryPeer::doUpdate($this, $con);
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


			if (($retval = sfPhotoGalleryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPhotoGalleryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEntity();
				break;
			case 3:
				return $this->getEntityId();
				break;
			case 4:
				return $this->getName();
				break;
			case 5:
				return $this->getMimeType();
				break;
			case 6:
				return $this->getSize();
				break;
			case 7:
				return $this->getSuffix();
				break;
			case 8:
				return $this->getTitle();
				break;
			case 9:
				return $this->getDescription();
				break;
			case 10:
				return $this->getRank();
				break;
			case 11:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPhotoGalleryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUuid(),
			$keys[2] => $this->getEntity(),
			$keys[3] => $this->getEntityId(),
			$keys[4] => $this->getName(),
			$keys[5] => $this->getMimeType(),
			$keys[6] => $this->getSize(),
			$keys[7] => $this->getSuffix(),
			$keys[8] => $this->getTitle(),
			$keys[9] => $this->getDescription(),
			$keys[10] => $this->getRank(),
			$keys[11] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfPhotoGalleryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEntity($value);
				break;
			case 3:
				$this->setEntityId($value);
				break;
			case 4:
				$this->setName($value);
				break;
			case 5:
				$this->setMimeType($value);
				break;
			case 6:
				$this->setSize($value);
				break;
			case 7:
				$this->setSuffix($value);
				break;
			case 8:
				$this->setTitle($value);
				break;
			case 9:
				$this->setDescription($value);
				break;
			case 10:
				$this->setRank($value);
				break;
			case 11:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfPhotoGalleryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUuid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEntity($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEntityId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMimeType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSize($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSuffix($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTitle($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDescription($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRank($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedAt($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfPhotoGalleryPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfPhotoGalleryPeer::ID)) $criteria->add(sfPhotoGalleryPeer::ID, $this->id);
		if ($this->isColumnModified(sfPhotoGalleryPeer::UUID)) $criteria->add(sfPhotoGalleryPeer::UUID, $this->uuid);
		if ($this->isColumnModified(sfPhotoGalleryPeer::ENTITY)) $criteria->add(sfPhotoGalleryPeer::ENTITY, $this->entity);
		if ($this->isColumnModified(sfPhotoGalleryPeer::ENTITY_ID)) $criteria->add(sfPhotoGalleryPeer::ENTITY_ID, $this->entity_id);
		if ($this->isColumnModified(sfPhotoGalleryPeer::NAME)) $criteria->add(sfPhotoGalleryPeer::NAME, $this->name);
		if ($this->isColumnModified(sfPhotoGalleryPeer::MIME_TYPE)) $criteria->add(sfPhotoGalleryPeer::MIME_TYPE, $this->mime_type);
		if ($this->isColumnModified(sfPhotoGalleryPeer::SIZE)) $criteria->add(sfPhotoGalleryPeer::SIZE, $this->size);
		if ($this->isColumnModified(sfPhotoGalleryPeer::SUFFIX)) $criteria->add(sfPhotoGalleryPeer::SUFFIX, $this->suffix);
		if ($this->isColumnModified(sfPhotoGalleryPeer::TITLE)) $criteria->add(sfPhotoGalleryPeer::TITLE, $this->title);
		if ($this->isColumnModified(sfPhotoGalleryPeer::DESCRIPTION)) $criteria->add(sfPhotoGalleryPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(sfPhotoGalleryPeer::RANK)) $criteria->add(sfPhotoGalleryPeer::RANK, $this->rank);
		if ($this->isColumnModified(sfPhotoGalleryPeer::CREATED_AT)) $criteria->add(sfPhotoGalleryPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfPhotoGalleryPeer::DATABASE_NAME);

		$criteria->add(sfPhotoGalleryPeer::ID, $this->id);

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

		$copyObj->setEntity($this->entity);

		$copyObj->setEntityId($this->entity_id);

		$copyObj->setName($this->name);

		$copyObj->setMimeType($this->mime_type);

		$copyObj->setSize($this->size);

		$copyObj->setSuffix($this->suffix);

		$copyObj->setTitle($this->title);

		$copyObj->setDescription($this->description);

		$copyObj->setRank($this->rank);

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
			self::$peer = new sfPhotoGalleryPeer();
		}
		return self::$peer;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfPhotoGallery:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfPhotoGallery::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 