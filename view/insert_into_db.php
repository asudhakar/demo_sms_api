<?php 

include_once '../controllers/function.php';

$name_and_numbers = $_POST['name_and_number'];
$message = $_POST['message'];
$name_and_numbers = unserialize(base64_decode($name_and_numbers));
$path = $_POST['path'];
$link = db_connect();


print_r(strpos($message, '$name'));

// foreach ($name_and_numbers as $key => $number) {
// 	$sql = "INSERT INTO `MessageOut` (`MessageTo` , `MessageText`) VALUES ('$number', '$message')";
// 	mysqli_set_charset($link, 'utf8mb4'); 
// 	executeQuery($sql, $link);
	
// }
// header('Location: ../index.php');

	function db_connect(){
		$connection = mysqli_connect('103.207.0.76', "demo", "demo1234", "demo", 3306);
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit();
		}
		return $connection;
	}






	