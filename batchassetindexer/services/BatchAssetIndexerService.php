<?php
/**
 * Batch Asset Indexer plugin for Craft CMS
 *
 * BatchAssetIndexer Service
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      http://bymayo.co.uk
 * @package   BatchAssetIndexer
 * @since     1.0.0
 */

namespace Craft;

class BatchAssetIndexerService extends BaseApplicationComponent
{

	public function getSetting($name)
	{
		return craft()->plugins->getPlugin('batchAssetIndexer')->getSettings()->$name;
	}

	public function assetSources()
    {
	    $query = craft()->db->createCommand();
		$entryRecord = $query->select('*')->from('assetsources')->queryAll();
		return $entryRecord;
    }
    
    public function parsePath($path)
    {
		return craft()->config->parseEnvironmentString($path);
    }
    
    public function sourceSettings($sourceId)
    {
	    $source = craft()->db->createCommand()->select('*')->from('assetsources')->where('id="' . $sourceId . '"')->queryRow();
		return json_decode($source["settings"]);
    }
    
	public function getAssets($sourceId)
	{
		
		$files = array_diff(scandir($this->parsePath($this->sourceSettings($sourceId)->path)), array('..', '.'));
		$filesSplits = array_chunk($files, $this->getSetting('assetsPerBatch'));
		
		foreach ($filesSplits as $split) {
			$this->createTask($split, $sourceId);
		}
			
	}
	
	public function createTask($assets, $sourceId)
	{
		
		craft()->tasks->createTask(
			'batchAssetIndexer',
			'Batch Index Assets', 
			array(
				'assets' => $assets,
				'sourceId' => $sourceId
			)
		);		
		
	}
	
	public function indexAssets($assets, $sourceId)
	{
		
		$sessionId = craft()->assetIndexing->getIndexingSessionId();
		
		// $missingFiles = craft()->assetIndexing->getMissingFiles(array($sourceId), $sessionId);	
		// craft()->assetIndexing->removeObsoleteFileRecords($missingFiles);
		
		for ($offset = 0; $offset <= count($assets) - 1; $offset++) { 
					
			// Inset Index
			craft()->db->createCommand()->insert(
				'assetindexdata', 
				array(
					"sessionId" => $sessionId,
					"sourceId" => $sourceId,
					"offset" => $offset,
					"uri" => $this->parsePath($this->sourceSettings($sourceId)->path) . $assets[$offset],
					"size" => filesize($this->parsePath($this->sourceSettings($sourceId)->path) . $assets[$offset])
				)
			);
			
			// Process Index
			craft()->assetIndexing->processIndexForSource($sessionId, $offset, $sourceId);
			
			// Delete Index
			craft()->db->createCommand()->delete('assetindexdata', array('AND', 'sessionId=:sessionId', 'offset=:offset'), array(':offset'=> $offset, ':sessionId'=> $sessionId));
			
		}
	
	}

}