<?php



class sfAssetMapBuilder {

	
	const CLASS_NAME = 'plugins.sfAssetsLibraryPlugin.lib.model.map.sfAssetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_asset');
		$tMap->setPhpName('sfAsset');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FOLDER_ID', 'FolderId', 'int', CreoleTypes::INTEGER, 'sf_asset_folder', 'ID', true, null);

		$tMap->addColumn('FILENAME', 'Filename', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('AUTHOR', 'Author', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('COPYRIGHT', 'Copyright', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FILESIZE', 'Filesize', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 