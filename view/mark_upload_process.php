<?php 
include_once '../controllers/function.php';
$target_dir = "../temp/";
$target_file = $target_dir . basename($_FILES["markUpload"]["name"]);
$uploadOk = 1;
if (file_exists($target_file)) {
    $uploadOk = 0;
}
echo $target_file;
if ($_FILES["markUpload"]["size"] > 500000) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
} else {
    if (move_uploaded_file($_FILES["markUpload"]["tmp_name"], $target_file)) {
    	echo "file saved";
    } else {
    	echo "Error in inserting";
    }
}