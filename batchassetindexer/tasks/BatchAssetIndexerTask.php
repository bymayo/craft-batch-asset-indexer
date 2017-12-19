<?php
/**
 * Batch Asset Indexer plugin for Craft CMS
 *
 * BatchAssetIndexer Task
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      http://bymayo.co.uk
 * @package   BatchAssetIndexer
 * @since     1.0.0
 */

namespace Craft;

class BatchAssetIndexerTask extends BaseTask
{
    /**
     * @access protected
     * @return array
     */

    protected function defineSettings()
    {
        return array(
            'assets' => AttributeType::Mixed,
            'sourceId' => AttributeType::Mixed,
        );
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return 'batchAssetIndexer Tasks';
    }

    /**
     * @return int
     */
    public function getTotalSteps()
    {
        return 1;
    }

    /**
     * @param int $step
     * @return bool
     */
    public function runStep($step)
    {

		$assets = $this->getSettings()->assets;
		$sourceId = $this->getSettings()->sourceId;
		
	    craft()->batchAssetIndexer->indexAssets($assets, $sourceId);
	    
		return true;

    }
    
}
