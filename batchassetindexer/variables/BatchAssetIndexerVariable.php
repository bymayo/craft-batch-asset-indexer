<?php
/**
 * Batch Asset Indexer plugin for Craft CMS
 *
 * Batch Asset Indexer Variable
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      http://bymayo.co.uk
 * @package   BatchAssetIndexer
 * @since     1.0.0
 */

namespace Craft;

class BatchAssetIndexerVariable
{

    public function assetSources()
    {
        return craft()->batchAssetIndexer->assetSources();
    }
    
	public function getAssets($handle)
	{	
		return craft()->batchAssetIndexer->getAssets($handle);		
	}
	
	public function sourceAssetCount($sourceId)
	{
		return craft()->batchAssetIndexer->sourceAssetCount($sourceId);
	}

}