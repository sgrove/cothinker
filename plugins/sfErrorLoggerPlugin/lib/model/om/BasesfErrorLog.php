<?php


abstract class BasesfErrorLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $type;


	
	protected $class_name;


	
	protected $message;


	
	protected $module_name;


	
	protected $action_name;


	
	protected $exception_object;


	
	protected $request;


	
	protected $uri;


	
	protected $created_at;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getClassName()
	{

		return $this->class_name;
	}

	
	public function getMessage()
	{

		return $this->message;
	}

	
	public function getModuleName()
	{

		return $this->module_name;
	}

	
	public function getActionName()
	{

		return $this->action_name;
	}

	
	public function getExceptionObject()
	{

		return $this->exception_object;
	}

	
	public function getRequest()
	{

		return $this->request;
	}

	
	public function getUri()
	{

		return $this->uri;
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

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::TYPE;
		}

	} 
	
	public function setClassName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->class_name !== $v) {
			$this->class_name = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::CLASS_NAME;
		}

	} 
	
	public function setMessage($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->message !== $v) {
			$this->message = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::MESSAGE;
		}

	} 
	
	public function setModuleName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->module_name !== $v) {
			$this->module_name = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::MODULE_NAME;
		}

	} 
	
	public function setActionName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->action_name !== $v) {
			$this->action_name = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::ACTION_NAME;
		}

	} 
	
	public function setExceptionObject($v)
	{

								if ($v instanceof Lob && $v === $this->exception_object) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->exception_object !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Clob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->exception_object = $obj;
			$this->modifiedColumns[] = sfErrorLogPeer::EXCEPTION_OBJECT;
		}

	} 
	
	public function setRequest($v)
	{

								if ($v instanceof Lob && $v === $this->request) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->request !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Clob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->request = $obj;
			$this->modifiedColumns[] = sfErrorLogPeer::REQUEST;
		}

	} 
	
	public function setUri($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uri !== $v) {
			$this->uri = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::URI;
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
			$this->modifiedColumns[] = sfErrorLogPeer::CREATED_AT;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfErrorLogPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->type = $rs->getString($startcol + 0);

			$this->class_name = $rs->getString($startcol + 1);

			$this->message = $rs->getString($startcol + 2);

			$this->module_name = $rs->getString($startcol + 3);

			$this->action_name = $rs->getString($startcol + 4);

			$this->exception_object = $rs->getClob($startcol + 5);

			$this->request = $rs->getClob($startcol + 6);

			$this->uri = $rs->getString($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfErrorLog object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfErrorLog:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfErrorLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfErrorLogPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfErrorLog:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfErrorLog:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfErrorLogPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfErrorLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfErrorLog:save:post') as $callable)
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
					$pk = sfErrorLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfErrorLogPeer::doUpdate($this, $con);
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


			if (($retval = sfErrorLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfErrorLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getType();
				break;
			case 1:
				return $this->getClassName();
				break;
			case 2:
				return $this->getMessage();
				break;
			case 3:
				return $this->getModuleName();
				break;
			case 4:
				return $this->getActionName();
				break;
			case 5:
				return $this->getExceptionObject();
				break;
			case 6:
				return $this->getRequest();
				break;
			case 7:
				return $this->getUri();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfErrorLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getType(),
			$keys[1] => $this->getClassName(),
			$keys[2] => $this->getMessage(),
			$keys[3] => $this->getModuleName(),
			$keys[4] => $this->getActionName(),
			$keys[5] => $this->getExceptionObject(),
			$keys[6] => $this->getRequest(),
			$keys[7] => $this->getUri(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfErrorLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setType($value);
				break;
			case 1:
				$this->setClassName($value);
				break;
			case 2:
				$this->setMessage($value);
				break;
			case 3:
				$this->setModuleName($value);
				break;
			case 4:
				$this->setActionName($value);
				break;
			case 5:
				$this->setExceptionObject($value);
				break;
			case 6:
				$this->setRequest($value);
				break;
			case 7:
				$this->setUri($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfErrorLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setType($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setClassName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMessage($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setModuleName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActionName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setExceptionObject($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRequest($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUri($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfErrorLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfErrorLogPeer::TYPE)) $criteria->add(sfErrorLogPeer::TYPE, $this->type);
		if ($this->isColumnModified(sfErrorLogPeer::CLASS_NAME)) $criteria->add(sfErrorLogPeer::CLASS_NAME, $this->class_name);
		if ($this->isColumnModified(sfErrorLogPeer::MESSAGE)) $criteria->add(sfErrorLogPeer::MESSAGE, $this->message);
		if ($this->isColumnModified(sfErrorLogPeer::MODULE_NAME)) $criteria->add(sfErrorLogPeer::MODULE_NAME, $this->module_name);
		if ($this->isColumnModified(sfErrorLogPeer::ACTION_NAME)) $criteria->add(sfErrorLogPeer::ACTION_NAME, $this->action_name);
		if ($this->isColumnModified(sfErrorLogPeer::EXCEPTION_OBJECT)) $criteria->add(sfErrorLogPeer::EXCEPTION_OBJECT, $this->exception_object);
		if ($this->isColumnModified(sfErrorLogPeer::REQUEST)) $criteria->add(sfErrorLogPeer::REQUEST, $this->request);
		if ($this->isColumnModified(sfErrorLogPeer::URI)) $criteria->add(sfErrorLogPeer::URI, $this->uri);
		if ($this->isColumnModified(sfErrorLogPeer::CREATED_AT)) $criteria->add(sfErrorLogPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfErrorLogPeer::ID)) $criteria->add(sfErrorLogPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfErrorLogPeer::DATABASE_NAME);

		$criteria->add(sfErrorLogPeer::ID, $this->id);

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

		$copyObj->setType($this->type);

		$copyObj->setClassName($this->class_name);

		$copyObj->setMessage($this->message);

		$copyObj->setModuleName($this->module_name);

		$copyObj->setActionName($this->action_name);

		$copyObj->setExceptionObject($this->exception_object);

		$copyObj->setRequest($this->request);

		$copyObj->setUri($this->uri);

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
			self::$peer = new sfErrorLogPeer();
		}
		return self::$peer;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfErrorLog:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfErrorLog::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 