<?php
 
// This is just a simple example, not to be used in production!!!
 
// ------------------------
// Input parameters: optional means that you can ignore it, and required means that you
// must use it to provide the data back to CKEditor.
// ------------------------
 
// Optional: instance name (might be used to adjust the server folders for example)
$CKEditor = $_GET['CKEditor'] ;
 
// Required: Function number as indicated by CKEditor.
$funcNum = $_GET['CKEditorFuncNum'] ;
 
// Optional: To provide localized messages
$langCode = $_GET['langCode'] ;
 
// ------------------------
// Data processing
// ------------------------
 
// The returned url of the uploaded file
$url = '' ;
 
// Optional message to show to the user (file renamed, invalid file, not authenticated...)
$message = '';
 
// In FCKeditor the uploaded file was sent as 'NewFile' but in CKEditor is 'upload'
if (isset($_FILES['upload'])) {
    // ToDo: save the file :-)
    // Be careful about all the data that it's sent!!!
    // Check that the user is authenticated, that the file isn't too big,
    // that it matches the kind of allowed resources...
    $name = $_FILES['upload']['name'];
 
    // example: Build the url that should be used for this file   
    $url = "/images/" . $name ;
    // Usually you don't need any message when everything is OK.
//    $message = 'new file uploaded';   
}
else
{
    $message = 'No file has been sent';
}
// ------------------------
// Write output
// ------------------------
// We are in an iframe, so we must talk to the object in window.parent
echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message')</script>";
 
?>