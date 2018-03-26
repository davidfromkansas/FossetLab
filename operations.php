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

// header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json
if(isset($_POST['name'])){
  $blobOps = new BlobOperations();
  echo $blobOps->deleteBlobs($_POST['name']);
  echo $blobOps->modifyMetaText();
  echo $blobOps->displayBlobs();
}





class BlobOperations{

  public function displayBlobs(){
    $connectionString = Config::getConnectionString();
    $blobService = ServicesBuilder::getInstance()->createBlobService($connectionString);

    try {
      # List all the blobs in the container
      $listBlobsResult = $blobService->listBlobs("paramaribo");  //paramaribo is the name of the container

      foreach ($listBlobsResult->getBlobs() as $blob) {
        echo "File Name: <b>".$blob->getName()."</b>    ";
        echo "(<a href=".$blob->getUrl().">".$blob->getUrl()."</a>)";
        echo "<button class='deleteBlob' value='".$blob->getName()."'>Delete</button>";
        echo "<br>";


      }


    }
    catch(ServiceException $e) {
      echo "Error occurred in the sample.".$e->getMessage().PHP_EOL;
    }



  }

  public function deleteBlobs($name){
    $connectionString = Config::getConnectionString();
    $blobService = ServicesBuilder::getInstance()->createBlobService($connectionString);
     //$targetBlob = $_POST['name'];
     $blobService->deleteBlob("paramaribo",$name);
  }

  public function modifyMetaText(){
    $metaURL = "https://langsdorf.blob.core.windows.net/paramaribo/metadata.txt";
    $file = fopen($metaURL, "w"); //open file for writing
    $newLine = "testing\n";      //$newLine will be the new line of text we will be adding
    fwrite($file,$newLine);      //write to file
    fclose($file);

  }










}



 ?>
