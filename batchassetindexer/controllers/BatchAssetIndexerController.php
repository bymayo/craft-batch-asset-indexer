<?php
/**
 * Batch Asset Indexer plugin for Craft CMS
 *
 * BatchAssetIndexer Controller
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      http://bymayo.co.uk
 * @package   BatchAssetIndexer
 * @since     1.0.0
 */

namespace Craft;

class BatchAssetIndexerController extends BaseController
{

	protected $allowAnonymous = array('actionImport');
	
	public function actionImport($handle)
	{
		craft()->batchAssetIndexer->getAssets($handle);
		$this->redirect('/admin/batchAssetIndexer');
		return;
	}

}