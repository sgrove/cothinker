<?php


abstract class BasenahoWikiWiki extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $title;


	
	protected $slug;


	
	protected $model;


	
	protected $model_id;


	
	protected $standalone;


	
	protected $created_at;

	
	protected $collnahoWikiPages;

	
	protected $lastnahoWikiPageCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
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
			$this->modifiedColumns[] = nahoWikiWikiPeer::ID;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = nahoWikiWikiPeer::TITLE;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = nahoWikiWikiPeer::SLUG;
		}

	} 
	
	public function setModel($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->model !== $v) {
			$this->model = $v;
			$this->modifiedColumns[] = nahoWikiWikiPeer::MODEL;
		}

	} 
	
	public function setModelId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->model_id !== $v) {
			$this->model_id = $v;
			$this->modifiedColumns[] = nahoWikiWikiPeer::MODEL_ID;
		}

	} 
	
	public function setStandalone($v)
	{

		if ($this->standalone !== $v) {
			$this->standalone = $v;
			$this->modifiedColumns[] = nahoWikiWikiPeer::STANDALONE;
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
			$this->modifiedColumns[] = nahoWikiWikiPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->title = $rs->getString($startcol + 1);

			$this->slug = $rs->getString($startcol + 2);

			$this->model = $rs->getString($startcol + 3);

			$this->model_id = $rs->getInt($startcol + 4);

			$this->standalone = $rs->getBoolean($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating nahoWikiWiki object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiWiki:delete:pre') as $callable)
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
			$con = Propel::getConnection(nahoWikiWikiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			nahoWikiWikiPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasenahoWikiWiki:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiWiki:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(nahoWikiWikiPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(nahoWikiWikiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasenahoWikiWiki:save:post') as $callable)
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
					$pk = nahoWikiWikiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += nahoWikiWikiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collnahoWikiPages !== null) {
				foreach($this->collnahoWikiPages as $referrerFK) {
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


			if (($retval = nahoWikiWikiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collnahoWikiPages !== null) {
					foreach($this->collnahoWikiPages as $referrerFK) {
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
		$pos = nahoWikiWikiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getSlug();
				break;
			case 3:
				return $this->getModel();
				break;
			case 4:
				return $this->getModelId();
				break;
			case 5:
				return $this->getStandalone();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = nahoWikiWikiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getSlug(),
			$keys[3] => $this->getModel(),
			$keys[4] => $this->getModelId(),
			$keys[5] => $this->getStandalone(),
			$keys[6] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = nahoWikiWikiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setSlug($value);
				break;
			case 3:
				$this->setModel($value);
				break;
			case 4:
				$this->setModelId($value);
				break;
			case 5:
				$this->setStandalone($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = nahoWikiWikiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setModel($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setModelId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStandalone($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(nahoWikiWikiPeer::DATABASE_NAME);

		if ($this->isColumnModified(nahoWikiWikiPeer::ID)) $criteria->add(nahoWikiWikiPeer::ID, $this->id);
		if ($this->isColumnModified(nahoWikiWikiPeer::TITLE)) $criteria->add(nahoWikiWikiPeer::TITLE, $this->title);
		if ($this->isColumnModified(nahoWikiWikiPeer::SLUG)) $criteria->add(nahoWikiWikiPeer::SLUG, $this->slug);
		if ($this->isColumnModified(nahoWikiWikiPeer::MODEL)) $criteria->add(nahoWikiWikiPeer::MODEL, $this->model);
		if ($this->isColumnModified(nahoWikiWikiPeer::MODEL_ID)) $criteria->add(nahoWikiWikiPeer::MODEL_ID, $this->model_id);
		if ($this->isColumnModified(nahoWikiWikiPeer::STANDALONE)) $criteria->add(nahoWikiWikiPeer::STANDALONE, $this->standalone);
		if ($this->isColumnModified(nahoWikiWikiPeer::CREATED_AT)) $criteria->add(nahoWikiWikiPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(nahoWikiWikiPeer::DATABASE_NAME);

		$criteria->add(nahoWikiWikiPeer::ID, $this->id);

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

		$copyObj->setTitle($this->title);

		$copyObj->setSlug($this->slug);

		$copyObj->setModel($this->model);

		$copyObj->setModelId($this->model_id);

		$copyObj->setStandalone($this->standalone);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getnahoWikiPages() as $relObj) {
				$copyObj->addnahoWikiPage($relObj->copy($deepCopy));
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
			self::$peer = new nahoWikiWikiPeer();
		}
		return self::$peer;
	}

	
	public function initnahoWikiPages()
	{
		if ($this->collnahoWikiPages === null) {
			$this->collnahoWikiPages = array();
		}
	}

	
	public function getnahoWikiPages($criteria = null, $con = null)
	{
				include_once 'plugins/nahoWikiPlugin/lib/model/om/BasenahoWikiPagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collnahoWikiPages === null) {
			if ($this->isNew()) {
			   $this->collnahoWikiPages = array();
			} else {

				$criteria->add(nahoWikiPagePeer::WIKI_ID, $this->getId());

				nahoWikiPagePeer::addSelectColumns($criteria);
				$this->collnahoWikiPages = nahoWikiPagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(nahoWikiPagePeer::WIKI_ID, $this->getId());

				nahoWikiPagePeer::addSelectColumns($criteria);
				if (!isset($this->lastnahoWikiPageCriteria) || !$this->lastnahoWikiPageCriteria->equals($criteria)) {
					$this->collnahoWikiPages = nahoWikiPagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastnahoWikiPageCriteria = $criteria;
		return $this->collnahoWikiPages;
	}

	
	public function countnahoWikiPages($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/nahoWikiPlugin/lib/model/om/BasenahoWikiPagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(nahoWikiPagePeer::WIKI_ID, $this->getId());

		return nahoWikiPagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addnahoWikiPage(nahoWikiPage $l)
	{
		$this->collnahoWikiPages[] = $l;
		$l->setnahoWikiWiki($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasenahoWikiWiki:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasenahoWikiWiki::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 