<?php


abstract class BasesfAssetFolder extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $tree_left;


	
	protected $tree_right;


	
	protected $tree_parent;


	
	protected $static_scope;


	
	protected $name;


	
	protected $relative_path;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collsfAssets;

	
	protected $lastsfAssetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTreeLeft()
	{

		return $this->tree_left;
	}

	
	public function getTreeRight()
	{

		return $this->tree_right;
	}

	
	public function getTreeParent()
	{

		return $this->tree_parent;
	}

	
	public function getStaticScope()
	{

		return $this->static_scope;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getRelativePath()
	{

		return $this->relative_path;
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::ID;
		}

	} 
	
	public function setTreeLeft($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_left !== $v) {
			$this->tree_left = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::TREE_LEFT;
		}

	} 
	
	public function setTreeRight($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_right !== $v) {
			$this->tree_right = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::TREE_RIGHT;
		}

	} 
	
	public function setTreeParent($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_parent !== $v) {
			$this->tree_parent = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::TREE_PARENT;
		}

	} 
	
	public function setStaticScope($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->static_scope !== $v) {
			$this->static_scope = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::STATIC_SCOPE;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::NAME;
		}

	} 
	
	public function setRelativePath($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->relative_path !== $v) {
			$this->relative_path = $v;
			$this->modifiedColumns[] = sfAssetFolderPeer::RELATIVE_PATH;
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
			$this->modifiedColumns[] = sfAssetFolderPeer::CREATED_AT;
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
			$this->modifiedColumns[] = sfAssetFolderPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->tree_left = $rs->getInt($startcol + 1);

			$this->tree_right = $rs->getInt($startcol + 2);

			$this->tree_parent = $rs->getInt($startcol + 3);

			$this->static_scope = $rs->getInt($startcol + 4);

			$this->name = $rs->getString($startcol + 5);

			$this->relative_path = $rs->getString($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfAssetFolder object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetFolder:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfAssetFolderPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfAssetFolderPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfAssetFolder:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfAssetFolder:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfAssetFolderPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfAssetFolderPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfAssetFolderPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfAssetFolder:save:post') as $callable)
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
					$pk = sfAssetFolderPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfAssetFolderPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfAssets !== null) {
				foreach($this->collsfAssets as $referrerFK) {
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


			if (($retval = sfAssetFolderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfAssets !== null) {
					foreach($this->collsfAssets as $referrerFK) {
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
		$pos = sfAssetFolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTreeLeft();
				break;
			case 2:
				return $this->getTreeRight();
				break;
			case 3:
				return $this->getTreeParent();
				break;
			case 4:
				return $this->getStaticScope();
				break;
			case 5:
				return $this->getName();
				break;
			case 6:
				return $this->getRelativePath();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfAssetFolderPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTreeLeft(),
			$keys[2] => $this->getTreeRight(),
			$keys[3] => $this->getTreeParent(),
			$keys[4] => $this->getStaticScope(),
			$keys[5] => $this->getName(),
			$keys[6] => $this->getRelativePath(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfAssetFolderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTreeLeft($value);
				break;
			case 2:
				$this->setTreeRight($value);
				break;
			case 3:
				$this->setTreeParent($value);
				break;
			case 4:
				$this->setStaticScope($value);
				break;
			case 5:
				$this->setName($value);
				break;
			case 6:
				$this->setRelativePath($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfAssetFolderPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTreeLeft($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTreeRight($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTreeParent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStaticScope($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRelativePath($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfAssetFolderPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfAssetFolderPeer::ID)) $criteria->add(sfAssetFolderPeer::ID, $this->id);
		if ($this->isColumnModified(sfAssetFolderPeer::TREE_LEFT)) $criteria->add(sfAssetFolderPeer::TREE_LEFT, $this->tree_left);
		if ($this->isColumnModified(sfAssetFolderPeer::TREE_RIGHT)) $criteria->add(sfAssetFolderPeer::TREE_RIGHT, $this->tree_right);
		if ($this->isColumnModified(sfAssetFolderPeer::TREE_PARENT)) $criteria->add(sfAssetFolderPeer::TREE_PARENT, $this->tree_parent);
		if ($this->isColumnModified(sfAssetFolderPeer::STATIC_SCOPE)) $criteria->add(sfAssetFolderPeer::STATIC_SCOPE, $this->static_scope);
		if ($this->isColumnModified(sfAssetFolderPeer::NAME)) $criteria->add(sfAssetFolderPeer::NAME, $this->name);
		if ($this->isColumnModified(sfAssetFolderPeer::RELATIVE_PATH)) $criteria->add(sfAssetFolderPeer::RELATIVE_PATH, $this->relative_path);
		if ($this->isColumnModified(sfAssetFolderPeer::CREATED_AT)) $criteria->add(sfAssetFolderPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfAssetFolderPeer::UPDATED_AT)) $criteria->add(sfAssetFolderPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfAssetFolderPeer::DATABASE_NAME);

		$criteria->add(sfAssetFolderPeer::ID, $this->id);

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

		$copyObj->setTreeLeft($this->tree_left);

		$copyObj->setTreeRight($this->tree_right);

		$copyObj->setTreeParent($this->tree_parent);

		$copyObj->setStaticScope($this->static_scope);

		$copyObj->setName($this->name);

		$copyObj->setRelativePath($this->relative_path);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfAssets() as $relObj) {
				$copyObj->addsfAsset($relObj->copy($deepCopy));
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
			self::$peer = new sfAssetFolderPeer();
		}
		return self::$peer;
	}

	
	public function initsfAssets()
	{
		if ($this->collsfAssets === null) {
			$this->collsfAssets = array();
		}
	}

	
	public function getsfAssets($criteria = null, $con = null)
	{
				include_once 'plugins/sfAssetsLibraryPlugin/lib/model/om/BasesfAssetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfAssets === null) {
			if ($this->isNew()) {
			   $this->collsfAssets = array();
			} else {

				$criteria->add(sfAssetPeer::FOLDER_ID, $this->getId());

				sfAssetPeer::addSelectColumns($criteria);
				$this->collsfAssets = sfAssetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfAssetPeer::FOLDER_ID, $this->getId());

				sfAssetPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfAssetCriteria) || !$this->lastsfAssetCriteria->equals($criteria)) {
					$this->collsfAssets = sfAssetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfAssetCriteria = $criteria;
		return $this->collsfAssets;
	}

	
	public function countsfAssets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfAssetsLibraryPlugin/lib/model/om/BasesfAssetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfAssetPeer::FOLDER_ID, $this->getId());

		return sfAssetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfAsset(sfAsset $l)
	{
		$this->collsfAssets[] = $l;
		$l->setsfAssetFolder($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfAssetFolder:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfAssetFolder::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 