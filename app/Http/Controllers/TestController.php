<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class TestController extends Controller
{

    /**
     * Function down below is example from AWS SDK EXAMPLE REPOSITORY
     * Docummentation : https://github.com/awsdocs/aws-doc-sdk-examples/blob/main/php/example_code/s3/PresignedURL.php
     * Access this funciton : http://localhost:8000/test
     */
    public function index() {
        //Creating a presigned request
        $s3Client = new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => true,
        ]);

        //Creating a presigned URL
        $cmd = $s3Client->getCommand('GetObject', [
            'Bucket' => 'emr',
            'Key' => 'BackgroundLogin/background_06092023_155157_FAZ.png'
        ]);

        $request = $s3Client->createPresignedRequest($cmd, '+1 minutes');

        // Get the actual presigned-url
        $presignedUrl = (string)$request->getUri();

        return dd($presignedUrl);
    }


    /**
     * Function down below is example we are used in production with minio s3 storage
     * Docummentation : https://laravel.com/docs/10.x/filesystem#temporary-urls
     * Access this funciton : http://localhost:8000/test2
     */
    public function conventional()  {
        $url = Storage::disk('s3_bucket_emr')->temporaryUrl('BackgroundLogin/background_06092023_155157_FAZ.png', now()->addMinutes(1));
        return dd($url);
    }

}
