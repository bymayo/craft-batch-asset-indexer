**This plugin was inspired by Matt Shearing's (From A Digital) Asset Indexer' plugin which works amazingly for indexing large amounts of Amazon S3 Assets** 

Looking to index Amazon S3 Assets in to Craft CMS? [Asset Indexer](https://github.com/a-digital/assetindexer)

# Batch Asset Indexer

> !!! This plugin as still under development, so please ensure you backup your database before attempting to import large amounts of assets. !!!

Batch Asset Indexer is a Craft CMS plugin that will index a large amount of local assets when Craft CMS fails to do so, or PHP times out.

## Installation

- Add the `batchassetindexer` directory into your `craft/plugins` directory.
- Navigate to `Settings -> Plugins` and click the "Install" button.
- Adjust the `Assets Per Batch` in to `Settings -> Batch Asset Indexer` to work with your environment. Reducing this value will result in far less failed tasks due to timeout issues.

## Useage

- Backup your database before attempting to import any large amounts of assets (`Settings -> Backup Database`)
- Click `Batch Asset Indexer` in the Craft CMS sidebar.
- Choose `Batch Index` on the asset source you want to index.

## Limitations

Currently this plugin only lets you index assets if they are all in the main source folder (E.g. `Uploads > Images`) and are not within any subfolders. It also only currently works when the asset source has **never** been indexed previously.

If you have any questions about this, please post an issue.

## Roadmap

- Index subfolders
- Delete previous indexed assets