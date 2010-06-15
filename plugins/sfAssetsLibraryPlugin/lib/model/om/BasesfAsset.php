<?php


abstract class BasesfAsset extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $folder_id;


	
	protected $filename;


	
	protected $description;


	
	protected $author;


	
	protected $copyright;


	
	protected $type;


	
	protected $filesize;


	
	protected $created_at;

	
	protected $asfAssetFolder;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFolderId()
	{

		return $this->folder_id;
	}

	
	public function getFilename()
	{

		return $this->filename;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getAuthor()
	{

		return $this->author;
	}

	
	public function getCopyright()
	{

		return $this->copyright;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getFilesize()
	{

		return $this->filesize;
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
			$this->modifiedColumns[] = sfAssetPeer::ID;
		}

	} 
	
	public function setFolderId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->folder_id !== $v) {
			$this->folder_id = $v;
			$this->modifiedColumns[] = sfAssetPeer::FOLDER_ID;
		}

		if ($this->asfAssetFolder !== null && $this->asfAssetFolder->getId() !== $v) {
			$this->asfAssetFolder = null;
		}

	} 
	
	public function setFilename($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filename !== $v) {
			$this->filename = $v;
			$this->modifiedColumns[] = sfAssetPeer::FILENAME;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = sfAssetPeer::DESCRIPTION;
		}

	} 
	
	public function setAuthor($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->author !== $v) {
			$this->author = $v;
			$this->modifiedColumns[] = sfAssetPeer::AUTHOR;
		}

	} 
	
	public function setCopyright($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->copyright !== $v) {
			$this->copyright = $v;
			$this->modifiedColumns[] = sfAssetPeer::COPYRIGHT;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = sfAssetPeer::TYPE;
		}

	} 
	
	public function setFilesize($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->filesize !== $v) {
			$this->filesize = $v;
			$this->modifiedColumns[] = sfAssetPeer::FILESIZE;
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
			$this->modifiedColumns[] = sfAssetPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->folder_id = $rs->getInt($startcol + 1);

			$this->filename = $rs->getString($startcol + 2);

			$this->description = $rs->getString($startcol + 3);

			$this->author = $rs->getString($startcol + 4);

			$this->copyright = $rs->getString($startcol + 5);

			$this->type = $rs->getString($startcol + 6);

			$this->filesize = $rs->getInt($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfAsset object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfAsset:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfAssetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfAssetPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfAsset:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfAsset:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfAssetPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfAssetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfAsset:save:post') as $callable)
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


												
			if ($this->asfAssetFolder !== null) {
				if ($this->asfAssetFolder->isModified()) {
					$affectedRows += $this->asfAssetFolder->save($con);
				}
				$this->setsfAssetFolder($this->asfAssetFolder);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfAssetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfAssetPeer::doUpdate($this, $con);
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


												
			if ($this->asfAssetFolder !== null) {
				if (!$this->asfAssetFolder->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfAssetFolder->getValidationFailures());
				}
			}


			if (($retval = sfAssetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfAssetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFolderId();
				break;
			case 2:
				return $this->getFilename();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getAuthor();
				break;
			case 5:
				return $this->getCopyright();
				break;
			case 6:
				return $this->getType();
				break;
			case 7:
				return $this->getFilesize();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfAssetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFolderId(),
			$keys[2] => $this->getFilename(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getAuthor(),
			$keys[5] => $this->getCopyright(),
			$keys[6] => $this->getType(),
			$keys[7] => $this->getFilesize(),
			$keys[8] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfAssetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFolderId($value);
				break;
			case 2:
				$this->setFilename($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setAuthor($value);
				break;
			case 5:
				$this->setCopyright($value);
				break;
			case 6:
				$this->setType($value);
				break;
			case 7:
				$this->setFilesize($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfAssetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFolderId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFilename($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAuthor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCopyright($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFilesize($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfAssetPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfAssetPeer::ID)) $criteria->add(sfAssetPeer::ID, $this->id);
		if ($this->isColumnModified(sfAssetPeer::FOLDER_ID)) $criteria->add(sfAssetPeer::FOLDER_ID, $this->folder_id);
		if ($this->isColumnModified(sfAssetPeer::FILENAME)) $criteria->add(sfAssetPeer::FILENAME, $this->filename);
		if ($this->isColumnModified(sfAssetPeer::DESCRIPTION)) $criteria->add(sfAssetPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(sfAssetPeer::AUTHOR)) $criteria->add(sfAssetPeer::AUTHOR, $this->author);
		if ($this->isColumnModified(sfAssetPeer::COPYRIGHT)) $criteria->add(sfAssetPeer::COPYRIGHT, $this->copyright);
		if ($this->isColumnModified(sfAssetPeer::TYPE)) $criteria->add(sfAssetPeer::TYPE, $this->type);
		if ($this->isColumnModified(sfAssetPeer::FILESIZE)) $criteria->add(sfAssetPeer::FILESIZE, $this->filesize);
		if ($this->isColumnModified(sfAssetPeer::CREATED_AT)) $criteria->add(sfAssetPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfAssetPeer::DATABASE_NAME);

		$criteria->add(sfAssetPeer::ID, $this->id);

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

		$copyObj->setFolderId($this->folder_id);

		$copyObj->setFilename($this->filename);

		$copyObj->setDescription($this->description);

		$copyObj->setAuthor($this->author);

		$copyObj->setCopyright($this->copyright);

		$copyObj->setType($this->type);

		$copyObj->setFilesize($this->filesize);

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
			self::$peer = new sfAssetPeer();
		}
		return self::$peer;
	}

	
	public function setsfAssetFolder($v)
	{


		if ($v === null) {
			$this->setFolderId(NULL);
		} else {
			$this->setFolderId($v->getId());
		}


		$this->asfAssetFolder = $v;
	}


	
	public function getsfAssetFolder($con = null)
	{
		if ($this->asfAssetFolder === null && ($this->folder_id !== null)) {
						include_once 'plugins/sfAssetsLibraryPlugin/lib/model/om/BasesfAssetFolderPeer.php';

			$this->asfAssetFolder = sfAssetFolderPeer::retrieveByPK($this->folder_id, $con);

			
		}
		return $this->asfAssetFolder;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfAsset:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfAsset::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 