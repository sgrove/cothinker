<?php



class sfFileGalleryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.sfFileGalleryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_file_gallery');
		$tMap->setPhpName('sfFileGallery');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('GROUP_ID', 'GroupId', 'string', CreoleTypes::VARCHAR, false, 36);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('ENTITY', 'Entity', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ENTITY_ID', 'EntityId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MIME_TYPE', 'MimeType', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SIZE', 'Size', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SUFFIX', 'Suffix', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addForeignKey('UPLOADED_BY', 'UploadedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 