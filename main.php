<?php
/**----------------------------------------------------------------------------------
* Microsoft Developer & Platform Evangelism
*
* Copyright (c) Microsoft Corporation. All rights reserved.
*
* THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND,
* EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES
* OF MERCHANTABILITY AND/OR FITNESS FOR A PARTICULAR PURPOSE.
*----------------------------------------------------------------------------------
* The example companies, organizations, products, domain names,
* e-mail addresses, logos, people, places, and events depicted
* herein are fictitious.  No association with any real company,
* organization, product, domain name, email address, logo, person,
* places, or events is intended or should be inferred.
*----------------------------------------------------------------------------------
**/
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php";
require_once "./blob_basic.php";
require_once "./blob_advanced.php";
 require_once "operations.php";

?>
<!DOCTYPE html>
<html>
<head>
  <title>Fosset</title>
</head>
<body>

<h1>Upload and View Files in Blob Storage <i>A very rough draft by David Lietjauw</i></h1>

<br>
<br>

<div style="border-style:solid; background-color:#f1c40f;">
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />

  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>
</div>

<br>
<br>
<h2>Files in Blob Storage</h2>
<?php





// $blobBasicSamples = new BlobBasicSamples();
// $blobBasicSamples->runAllSamples();

$blobOperations = new BlobOperations();
$blobOperations->displayBlobs();
$blobOperations->modifyMetaText();
// $blobOperations->deleteBlobs();




//$blobAdvancedSamples = new BlobAdvancedSamples();
//$blobAdvancedSamples->runAllSamples();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>


</html>
