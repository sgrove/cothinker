<?php


abstract class BasenahoWikiPage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $wiki_id;


	
	protected $name;


	
	protected $latest_revision = 1;

	
	protected $anahoWikiWiki;

	
	protected $collnahoWikiRevisions;

	
	protected $lastnahoWikiRevisionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getWikiId()
	{

		return $this->wiki_id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getLatestRevision()
	{

		return $this->latest_revision;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = nahoWikiPagePeer::ID;
		}

	} 
	
	public function setWikiId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->wiki_id !== $v) {
			$this->wiki_id = $v;
			$this->modifiedColumns[] = nahoWikiPagePeer::WIKI_ID;
		}

		if ($this->anahoWikiWiki !== null && $this->anahoWikiWiki->getId() !== $v) {
			$this->anahoWikiWiki = null;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = nahoWikiPagePeer::NAME;
		}

	} 
	
	public function setLatestRevision($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->latest_revision !== $v || $v === 1) {
			$this->latest_revision = $v;
			$this->modifiedColumns[] = nahoWikiPagePeer::LATEST_REVISION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->wiki_id = $rs->getInt($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->latest_revision = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating nahoWikiPage object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiPage:delete:pre') as $callable)
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
			$con = Propel::getConnection(nahoWikiPagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			nahoWikiPagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasenahoWikiPage:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasenahoWikiPage:save:pre') as $callable)
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
			$con = Propel::getConnection(nahoWikiPagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasenahoWikiPage:save:post') as $callable)
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


												
			if ($this->anahoWikiWiki !== null) {
				if ($this->anahoWikiWiki->isModified()) {
					$affectedRows += $this->anahoWikiWiki->save($con);
				}
				$this->setnahoWikiWiki($this->anahoWikiWiki);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = nahoWikiPagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += nahoWikiPagePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collnahoWikiRevisions !== null) {
				foreach($this->collnahoWikiRevisions as $referrerFK) {
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


												
			if ($this->anahoWikiWiki !== null) {
				if (!$this->anahoWikiWiki->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->anahoWikiWiki->getValidationFailures());
				}
			}


			if (($retval = nahoWikiPagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collnahoWikiRevisions !== null) {
					foreach($this->collnahoWikiRevisions as $referrerFK) {
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
		$pos = nahoWikiPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getWikiId();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getLatestRevision();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = nahoWikiPagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getWikiId(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getLatestRevision(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = nahoWikiPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setWikiId($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setLatestRevision($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = nahoWikiPagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setWikiId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLatestRevision($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(nahoWikiPagePeer::DATABASE_NAME);

		if ($this->isColumnModified(nahoWikiPagePeer::ID)) $criteria->add(nahoWikiPagePeer::ID, $this->id);
		if ($this->isColumnModified(nahoWikiPagePeer::WIKI_ID)) $criteria->add(nahoWikiPagePeer::WIKI_ID, $this->wiki_id);
		if ($this->isColumnModified(nahoWikiPagePeer::NAME)) $criteria->add(nahoWikiPagePeer::NAME, $this->name);
		if ($this->isColumnModified(nahoWikiPagePeer::LATEST_REVISION)) $criteria->add(nahoWikiPagePeer::LATEST_REVISION, $this->latest_revision);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(nahoWikiPagePeer::DATABASE_NAME);

		$criteria->add(nahoWikiPagePeer::ID, $this->id);

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

		$copyObj->setWikiId($this->wiki_id);

		$copyObj->setName($this->name);

		$copyObj->setLatestRevision($this->latest_revision);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getnahoWikiRevisions() as $relObj) {
				$copyObj->addnahoWikiRevision($relObj->copy($deepCopy));
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
			self::$peer = new nahoWikiPagePeer();
		}
		return self::$peer;
	}

	
	public function setnahoWikiWiki($v)
	{


		if ($v === null) {
			$this->setWikiId(NULL);
		} else {
			$this->setWikiId($v->getId());
		}


		$this->anahoWikiWiki = $v;
	}


	
	public function getnahoWikiWiki($con = null)
	{
		if ($this->anahoWikiWiki === null && ($this->wiki_id !== null)) {
						include_once 'plugins/nahoWikiPlugin/lib/model/om/BasenahoWikiWikiPeer.php';

			$this->anahoWikiWiki = nahoWikiWikiPeer::retrieveByPK($this->wiki_id, $con);

			
		}
		return $this->anahoWikiWiki;
	}

	
	public function initnahoWikiRevisions()
	{
		if ($this->collnahoWikiRevisions === null) {
			$this->collnahoWikiRevisions = array();
		}
	}

	
	public function getnahoWikiRevisions($criteria = null, $con = null)
	{
				include_once 'plugins/nahoWikiPlugin/lib/model/om/BasenahoWikiRevisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collnahoWikiRevisions === null) {
			if ($this->isNew()) {
			   $this->collnahoWikiRevisions = array();
			} else {

				$criteria->add(nahoWikiRevisionPeer::PAGE_ID, $this->getId());

				nahoWikiRevisionPeer::addSelectColumns($criteria);
				$this->collnahoWikiRevisions = nahoWikiRevisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(nahoWikiRevisionPeer::PAGE_ID, $this->getId());

				nahoWikiRevisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastnahoWikiRevisionCriteria) || !$this->lastnahoWikiRevisionCriteria->equals($criteria)) {
					$this->collnahoWikiRevisions = nahoWikiRevisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastnahoWikiRevisionCriteria = $criteria;
		return $this->collnahoWikiRevisions;
	}

	
	public function countnahoWikiRevisions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/nahoWikiPlugin/lib/model/om/BasenahoWikiRevisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(nahoWikiRevisionPeer::PAGE_ID, $this->getId());

		return nahoWikiRevisionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addnahoWikiRevision(nahoWikiRevision $l)
	{
		$this->collnahoWikiRevisions[] = $l;
		$l->setnahoWikiPage($this);
	}


	
	public function getnahoWikiRevisionsJoinnahoWikiContent($criteria = null, $con = null)
	{
				include_once 'plugins/nahoWikiPlugin/lib/model/om/BasenahoWikiRevisionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collnahoWikiRevisions === null) {
			if ($this->isNew()) {
				$this->collnahoWikiRevisions = array();
			} else {

				$criteria->add(nahoWikiRevisionPeer::PAGE_ID, $this->getId());

				$this->collnahoWikiRevisions = nahoWikiRevisionPeer::doSelectJoinnahoWikiContent($criteria, $con);
			}
		} else {
									
			$criteria->add(nahoWikiRevisionPeer::PAGE_ID, $this->getId());

			if (!isset($this->lastnahoWikiRevisionCriteria) || !$this->lastnahoWikiRevisionCriteria->equals($criteria)) {
				$this->collnahoWikiRevisions = nahoWikiRevisionPeer::doSelectJoinnahoWikiContent($criteria, $con);
			}
		}
		$this->lastnahoWikiRevisionCriteria = $criteria;

		return $this->collnahoWikiRevisions;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasenahoWikiPage:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasenahoWikiPage::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 