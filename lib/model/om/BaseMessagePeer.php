<?php


abstract class BaseMessagePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ct_message';

	
	const CLASS_DEFAULT = 'lib.model.Message';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ct_message.ID';

	
	const UUID = 'ct_message.UUID';

	
	const PUBLIC_ID = 'ct_message.PUBLIC_ID';

	
	const OWNER_ID = 'ct_message.OWNER_ID';

	
	const SENDER_ID = 'ct_message.SENDER_ID';

	
	const RECIPIENT_ID = 'ct_message.RECIPIENT_ID';

	
	const SUBJECT = 'ct_message.SUBJECT';

	
	const BODY = 'ct_message.BODY';

	
	const HTML_BODY = 'ct_message.HTML_BODY';

	
	const FOLDER = 'ct_message.FOLDER';

	
	const READ_AT = 'ct_message.READ_AT';

	
	const PARENT_ID = 'ct_message.PARENT_ID';

	
	const MESSAGE_TYPE = 'ct_message.MESSAGE_TYPE';

	
	const VERSION = 'ct_message.VERSION';

	
	const IS_HIDDEN = 'ct_message.IS_HIDDEN';

	
	const DELETED_AT = 'ct_message.DELETED_AT';

	
	const CREATED_AT = 'ct_message.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uuid', 'PublicId', 'OwnerId', 'SenderId', 'RecipientId', 'Subject', 'Body', 'HtmlBody', 'Folder', 'ReadAt', 'ParentId', 'MessageType', 'Version', 'IsHidden', 'DeletedAt', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (MessagePeer::ID, MessagePeer::UUID, MessagePeer::PUBLIC_ID, MessagePeer::OWNER_ID, MessagePeer::SENDER_ID, MessagePeer::RECIPIENT_ID, MessagePeer::SUBJECT, MessagePeer::BODY, MessagePeer::HTML_BODY, MessagePeer::FOLDER, MessagePeer::READ_AT, MessagePeer::PARENT_ID, MessagePeer::MESSAGE_TYPE, MessagePeer::VERSION, MessagePeer::IS_HIDDEN, MessagePeer::DELETED_AT, MessagePeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uuid', 'public_id', 'owner_id', 'sender_id', 'recipient_id', 'subject', 'body', 'html_body', 'folder', 'read_at', 'parent_id', 'message_type', 'version', 'is_hidden', 'deleted_at', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uuid' => 1, 'PublicId' => 2, 'OwnerId' => 3, 'SenderId' => 4, 'RecipientId' => 5, 'Subject' => 6, 'Body' => 7, 'HtmlBody' => 8, 'Folder' => 9, 'ReadAt' => 10, 'ParentId' => 11, 'MessageType' => 12, 'Version' => 13, 'IsHidden' => 14, 'DeletedAt' => 15, 'CreatedAt' => 16, ),
		BasePeer::TYPE_COLNAME => array (MessagePeer::ID => 0, MessagePeer::UUID => 1, MessagePeer::PUBLIC_ID => 2, MessagePeer::OWNER_ID => 3, MessagePeer::SENDER_ID => 4, MessagePeer::RECIPIENT_ID => 5, MessagePeer::SUBJECT => 6, MessagePeer::BODY => 7, MessagePeer::HTML_BODY => 8, MessagePeer::FOLDER => 9, MessagePeer::READ_AT => 10, MessagePeer::PARENT_ID => 11, MessagePeer::MESSAGE_TYPE => 12, MessagePeer::VERSION => 13, MessagePeer::IS_HIDDEN => 14, MessagePeer::DELETED_AT => 15, MessagePeer::CREATED_AT => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uuid' => 1, 'public_id' => 2, 'owner_id' => 3, 'sender_id' => 4, 'recipient_id' => 5, 'subject' => 6, 'body' => 7, 'html_body' => 8, 'folder' => 9, 'read_at' => 10, 'parent_id' => 11, 'message_type' => 12, 'version' => 13, 'is_hidden' => 14, 'deleted_at' => 15, 'created_at' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.MessageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MessagePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(MessagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MessagePeer::ID);

		$criteria->addSelectColumn(MessagePeer::UUID);

		$criteria->addSelectColumn(MessagePeer::PUBLIC_ID);

		$criteria->addSelectColumn(MessagePeer::OWNER_ID);

		$criteria->addSelectColumn(MessagePeer::SENDER_ID);

		$criteria->addSelectColumn(MessagePeer::RECIPIENT_ID);

		$criteria->addSelectColumn(MessagePeer::SUBJECT);

		$criteria->addSelectColumn(MessagePeer::BODY);

		$criteria->addSelectColumn(MessagePeer::HTML_BODY);

		$criteria->addSelectColumn(MessagePeer::FOLDER);

		$criteria->addSelectColumn(MessagePeer::READ_AT);

		$criteria->addSelectColumn(MessagePeer::PARENT_ID);

		$criteria->addSelectColumn(MessagePeer::MESSAGE_TYPE);

		$criteria->addSelectColumn(MessagePeer::VERSION);

		$criteria->addSelectColumn(MessagePeer::IS_HIDDEN);

		$criteria->addSelectColumn(MessagePeer::DELETED_AT);

		$criteria->addSelectColumn(MessagePeer::CREATED_AT);

	}

	const COUNT = 'COUNT(ct_message.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ct_message.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = MessagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MessagePeer::populateObjects(MessagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MessagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MessagePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByOwnerId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MessagePeer::OWNER_ID, sfGuardUserPeer::ID);

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedBySenderId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MessagePeer::SENDER_ID, sfGuardUserPeer::ID);

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByRecipientId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MessagePeer::RECIPIENT_ID, sfGuardUserPeer::ID);

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByOwnerId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MessagePeer::OWNER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByOwnerId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMessageRelatedByOwnerId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMessagesRelatedByOwnerId();
				$obj2->addMessageRelatedByOwnerId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedBySenderId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MessagePeer::SENDER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedBySenderId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMessageRelatedBySenderId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMessagesRelatedBySenderId();
				$obj2->addMessageRelatedBySenderId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByRecipientId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MessagePeer::RECIPIENT_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByRecipientId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMessageRelatedByRecipientId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMessagesRelatedByRecipientId();
				$obj2->addMessageRelatedByRecipientId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MessagePeer::OWNER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(MessagePeer::SENDER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(MessagePeer::RECIPIENT_ID, sfGuardUserPeer::ID);

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol2 = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(MessagePeer::OWNER_ID, sfGuardUserPeer::ID);

		$c->addJoin(MessagePeer::SENDER_ID, sfGuardUserPeer::ID);

		$c->addJoin(MessagePeer::RECIPIENT_ID, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByOwnerId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMessageRelatedByOwnerId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMessagesRelatedByOwnerId();
				$obj2->addMessageRelatedByOwnerId($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedBySenderId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMessageRelatedBySenderId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMessagesRelatedBySenderId();
				$obj3->addMessageRelatedBySenderId($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByRecipientId(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addMessageRelatedByRecipientId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initMessagesRelatedByRecipientId();
				$obj4->addMessageRelatedByRecipientId($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByOwnerId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedBySenderId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByRecipientId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MessagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MessagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MessagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByOwnerId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol2 = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedBySenderId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol2 = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByRecipientId(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MessagePeer::addSelectColumns($c);
		$startcol2 = (MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MessagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return MessagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMessagePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MessagePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseMessagePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMessagePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMessagePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(MessagePeer::ID);
			$selectCriteria->add(MessagePeer::ID, $criteria->remove(MessagePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseMessagePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseMessagePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(MessagePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(MessagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Message) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MessagePeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Message $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MessagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MessagePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(MessagePeer::DATABASE_NAME, MessagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MessagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MessagePeer::DATABASE_NAME);

		$criteria->add(MessagePeer::ID, $pk);


		$v = MessagePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(MessagePeer::ID, $pks, Criteria::IN);
			$objs = MessagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMessagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.MessageMapBuilder');
}
