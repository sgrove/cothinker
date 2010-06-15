<?php



class MessageMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MessageMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('ct_message');
		$tMap->setPhpName('Message');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, true, 36);

		$tMap->addColumn('PUBLIC_ID', 'PublicId', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('OWNER_ID', 'OwnerId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('SENDER_ID', 'SenderId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('RECIPIENT_ID', 'RecipientId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('SUBJECT', 'Subject', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('BODY', 'Body', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('HTML_BODY', 'HtmlBody', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('FOLDER', 'Folder', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('READ_AT', 'ReadAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('PARENT_ID', 'ParentId', 'string', CreoleTypes::VARCHAR, false, 36);

		$tMap->addColumn('MESSAGE_TYPE', 'MessageType', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VERSION', 'Version', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('IS_HIDDEN', 'IsHidden', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 