<?php 
include_once 'controllers/function.php';
$target_dir = "../temp/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if (file_exists($target_file)) {
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	echo "file saved";
    } else {
    	echo "Error in inserting";
    }
}