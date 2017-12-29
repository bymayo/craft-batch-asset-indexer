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
        return count($this->getSettings()->assets);
    }

    /**
     * @param int $step
     * @return bool
     */
    public function runStep($step)
    {

		$asset = $this->getSettings()->assets[$step];
		$sourceId = $this->getSettings()->sourceId;
		
	    craft()->batchAssetIndexer->indexAsset($asset, $sourceId, $step);
	    
		return true;

    }
    
}
