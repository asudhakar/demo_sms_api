<?php 
	include_once '../controllers/function.php';
	print_r($_POST);
	$target_dir = "../temp/";
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
	    	delete_target_file($target_file);
	    	// header("Location: mark_upload.php");
	    } else {
	    	echo "Error in inserting";
	    }
	}


	function default_message_process($target_file){
		$link = db_connect();
		require('../php-excel-reader/excel_reader2.php');
		require('../SpreadsheetReader.php');
		echo "$target_file<br/><pre>";
		$Reader = new SpreadsheetReader($target_file);
		$i = 0;
		foreach ($Reader as $Row) {
			if($i == 0){
				$i++;
				continue;
			} else{
				$message_content = "Name of the exam :- ".$_POST['name_of_exam'].", Class :- ".$_POST['class'].", Section :- ".$_POST['section'].", ".$Row['1']." Scored Tam-I :- ".$Row['2'].", Tam-II :- ".$Row['3'].", Tamil Total :- ".$Row['4'].", Eng-I :- ".$Row['5'].", Eng-II :- ".$Row['6'].", Total English :- ".$Row['7'].", Phy :- ".$Row['8'].", Che :- ".$Row['9'].", Bio/CS :- ".$Row['10'].", Mat :- ".$Row['11'].", Total :- ".$Row['12'];

				// $sql = "INSERT INTO `MessageOut` (`MessageTo` , `MessageText`) VALUES ('$Row[14]', '$message_content')";
				// mysqli_set_charset($link, 'utf8mb4'); 
				// executeQuery($sql, $link);
			}
		}
	}

	function db_connect(){
		$connection = mysqli_connect('103.207.0.76', "demo", "demo1234", "demo", 3306);
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit();
		}
		return $connection;
	}

	function delete_target_file($path){
		if (!unlink($path))
		{
		  echo ("Error deleting $path");
		}
		else
		{
		  echo ("Deleted $path");
		}
	}
