<?php 

	$target_dir = "../files/";
	$target_file = $target_dir . basename($_FILES["markUpload"]["name"]);
	$uploadOk = 1;
	if (file_exists($target_file)) {
	    $uploadOk = 0;
	}

	if ($_FILES["markUpload"]["size"] > 500000) {
	    $uploadOk = 0;
	}

	if ($uploadOk == 0) {
	} else {
	    if (move_uploaded_file($_FILES["markUpload"]["tmp_name"], $target_file)) {
	    	default_message_process($target_file);
	    } else {
	    	echo "Error in inserting";
	    }
	}


	function default_message_process($target_file){
		require('../php-excel-reader/excel_reader2.php');
		require('../SpreadsheetReader.php');
		echo "$target_file<br/><pre>";
		$Reader = new SpreadsheetReader($target_file);
		print_r($Reader);
	}