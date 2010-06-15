<?php


abstract class BasesfFaqFaq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $question;


	
	protected $answer;


	
	protected $category_id;


	
	protected $created_at;

	
	protected $asfFaqCategory;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getQuestion()
	{

		return $this->question;
	}

	
	public function getAnswer()
	{

		return $this->answer;
	}

	
	public function getCategoryId()
	{

		return $this->category_id;
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
			$this->modifiedColumns[] = sfFaqFaqPeer::ID;
		}

	} 
	
	public function setQuestion($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->question !== $v) {
			$this->question = $v;
			$this->modifiedColumns[] = sfFaqFaqPeer::QUESTION;
		}

	} 
	
	public function setAnswer($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->answer !== $v) {
			$this->answer = $v;
			$this->modifiedColumns[] = sfFaqFaqPeer::ANSWER;
		}

	} 
	
	public function setCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->category_id !== $v) {
			$this->category_id = $v;
			$this->modifiedColumns[] = sfFaqFaqPeer::CATEGORY_ID;
		}

		if ($this->asfFaqCategory !== null && $this->asfFaqCategory->getId() !== $v) {
			$this->asfFaqCategory = null;
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
			$this->modifiedColumns[] = sfFaqFaqPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->question = $rs->getString($startcol + 1);

			$this->answer = $rs->getString($startcol + 2);

			$this->category_id = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfFaqFaq object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaq:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfFaqFaqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfFaqFaqPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfFaqFaq:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfFaqFaq:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfFaqFaqPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfFaqFaqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfFaqFaq:save:post') as $callable)
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


												
			if ($this->asfFaqCategory !== null) {
				if ($this->asfFaqCategory->isModified()) {
					$affectedRows += $this->asfFaqCategory->save($con);
				}
				$this->setsfFaqCategory($this->asfFaqCategory);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfFaqFaqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfFaqFaqPeer::doUpdate($this, $con);
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


												
			if ($this->asfFaqCategory !== null) {
				if (!$this->asfFaqCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfFaqCategory->getValidationFailures());
				}
			}


			if (($retval = sfFaqFaqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfFaqFaqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getQuestion();
				break;
			case 2:
				return $this->getAnswer();
				break;
			case 3:
				return $this->getCategoryId();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfFaqFaqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getQuestion(),
			$keys[2] => $this->getAnswer(),
			$keys[3] => $this->getCategoryId(),
			$keys[4] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfFaqFaqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setQuestion($value);
				break;
			case 2:
				$this->setAnswer($value);
				break;
			case 3:
				$this->setCategoryId($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfFaqFaqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setQuestion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnswer($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCategoryId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfFaqFaqPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfFaqFaqPeer::ID)) $criteria->add(sfFaqFaqPeer::ID, $this->id);
		if ($this->isColumnModified(sfFaqFaqPeer::QUESTION)) $criteria->add(sfFaqFaqPeer::QUESTION, $this->question);
		if ($this->isColumnModified(sfFaqFaqPeer::ANSWER)) $criteria->add(sfFaqFaqPeer::ANSWER, $this->answer);
		if ($this->isColumnModified(sfFaqFaqPeer::CATEGORY_ID)) $criteria->add(sfFaqFaqPeer::CATEGORY_ID, $this->category_id);
		if ($this->isColumnModified(sfFaqFaqPeer::CREATED_AT)) $criteria->add(sfFaqFaqPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfFaqFaqPeer::DATABASE_NAME);

		$criteria->add(sfFaqFaqPeer::ID, $this->id);

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

		$copyObj->setQuestion($this->question);

		$copyObj->setAnswer($this->answer);

		$copyObj->setCategoryId($this->category_id);

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
			self::$peer = new sfFaqFaqPeer();
		}
		return self::$peer;
	}

	
	public function setsfFaqCategory($v)
	{


		if ($v === null) {
			$this->setCategoryId(NULL);
		} else {
			$this->setCategoryId($v->getId());
		}


		$this->asfFaqCategory = $v;
	}


	
	public function getsfFaqCategory($con = null)
	{
		if ($this->asfFaqCategory === null && ($this->category_id !== null)) {
						include_once 'plugins/sfFaqPlugin/lib/model/om/BasesfFaqCategoryPeer.php';

			$this->asfFaqCategory = sfFaqCategoryPeer::retrieveByPK($this->category_id, $con);

			
		}
		return $this->asfFaqCategory;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfFaqFaq:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfFaqFaq::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 