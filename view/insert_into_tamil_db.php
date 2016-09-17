<?php 

include_once '../controllers/function.php';

$name_and_numbers = $_POST['name_and_number'];
$message = $_POST['message'];
$name_and_numbers = unserialize(base64_decode($name_and_numbers));
$path = $_POST['path'];
$link = db_connect();





foreach ($name_and_numbers as $key => $namenumbers) {
$namenumber = explode(",", $namenumbers);
	$final = str_replace("#name","$namenumber[0]","$message");
	$sql = "INSERT INTO `MessageOut` (`MessageFrom`, `MessageTo` , `MessageText`) VALUES ('SVSEDU', '$namenumber[1]', '$message')";
	mysqli_set_charset($link, 'utf8mb4'); 
	executeQuery($sql, $link);
	
}
header('Location: ../index.php?value=sent_successfully');


	function db_connect(){
        $connection = mysqli_connect('103.207.4.235', "smpp", "smpp1234", "smpp", 3306);
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
            exit();
        }
        return $connection;
	}

