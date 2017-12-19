<?php
/**
 * Batch Asset Indexer plugin for Craft CMS
 *
 * Batch index large asset sources in Craft CMS
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      http://bymayo.co.uk
 * @package   BatchAssetIndexer
 * @since     1.0.0
 */

namespace Craft;

class BatchAssetIndexerPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Batch Asset Indexer');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Batch index large asset sources in Craft CMS');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/ByMayo/batchassetindexer/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/ByMayo/batchassetindexer/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Jason Mayo';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://bymayo.co.uk';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return true;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'assetsPerBatch' => array(AttributeType::String, 'default' => 100)
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
	   return craft()->templates->render(
			'batchassetindexer/settings', 
			array(
				'settings' => $this->getSettings()
			)
		);
    }

    /**
     * @param mixed $settings  The plugin's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }

}