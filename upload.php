<?php
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php";
require_once "./config.php";
require_once "./random_string.php";

use Config;
use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\PageRange;
use MicrosoftAzure\Storage\Blob\Models\ListPageBlobRangesOptions;
use MicrosoftAzure\Storage\Blob\Models\GetBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\DeleteBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;


  $connectionString = Config::getConnectionString();
  $blobService = ServicesBuilder::getInstance()->createBlobService($connectionString);

  $filename = basename($_FILES['fileToUpload']['name']);
  echo $filename;
  try {
    $containerName = "paramaribo";

    if(isset($_FILES['fileToUpload']['name'])){
    upload($blobService, $containerName);
    header("Location: main.php");
    exit;
}
  }
  catch(ServiceException $e) {
    echo "Error occurred in the sample.".$e->getMessage().PHP_EOL;
  }


    function upload($blobService, $containerName) {
    //  $fileToUpload = "HelloWorld.png";

      # Upload file as a block blob
    //  echo "Uploading BlockBlob".PHP_EOL;
      $fileToUpload = $_FILES['fileToUpload']['tmp_name'];
      $content = file_get_contents($fileToUpload, "r");//fopen($fileToUpload, "r");
      $filename = $_FILES['fileToUpload']['name'];
      $formatted_filename = str_replace(' ', '', $filename);

      $blobService->createBlockBlob("paramaribo", $formatted_filename, $content);




      //echo "FILE CONTENT";
    //  echo $content;


    }



 ?>
