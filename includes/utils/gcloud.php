<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

/**
 * Class to upload/download files to bucket
 *
 *
 * @copyright  2021 Chanvichet Vong
 * @license    MIT
 */
class GStorage
{
    protected $bucket;
    public function __construct(string $bucket_name = 'hajimaaa')
    {
        global $google_service_path;

        $storage = new StorageClient([
            'keyFilePath' => $google_service_path
        ]);
        $this->bucket = $storage->bucket($bucket_name);
    }

    /**
     * Upload file to a bucket destination
     *
     * @param string $srcPath  The location of the file before upload
     * @param string $destPath  The location of the file after upload in the bucket
     * 
     * @throws die The script will die and stop execution
     * @author Chanvichet Vong
     */
    function upload(string $srcPath, string $destPath)
    {
        // Upload a file to the bucket.
        try {
            $this->bucket->upload(
                fopen($srcPath, 'r'),
                ['name' => $destPath]
            );
        } catch (Exception $e) {
            die('An error occurred uploading the file with exception: ' . $e->getMessage());
        }
    }

    /**
     * Download file from a bucket destination
     *
     * @param string $srcPath  The location of the file before download in the bucket
     * @param string $destPath  The location of the file after download
     * 
     * @throws die The script will die and stop execution
     * @author Chanvichet Vong
     */
    function download(string $srcPath, string $destPath)
    {
        // Download and store an object from the bucket locally.
        try {
            $object = $this->bucket->object($srcPath);
            $object->downloadToFile($destPath);
        } catch (Exception $e) {
            die('An error occurred downloading the file with exception: ' . $e->getMessage());
        }
    }
}