<?php



class sfPhotoGalleryMapBuilder {

	
	const CLASS_NAME = 'plugins.sfPhotoGalleryPlugin.lib.model.map.sfPhotoGalleryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('photo');
		$tMap->setPhpName('sfPhotoGallery');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UUID', 'Uuid', 'string', CreoleTypes::VARCHAR, false, 36);

		$tMap->addColumn('ENTITY', 'Entity', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ENTITY_ID', 'EntityId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MIME_TYPE', 'MimeType', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SIZE', 'Size', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SUFFIX', 'Suffix', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('RANK', 'Rank', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 