<?php 
	session_start();
	function landingPageSessionCheck(){
		if(empty($_SESSION["userDetails"])){
			header('location:view/login.php');
		}
	}

	function getCount($data){
		return count($data);
	}

	function loginPageSessionCheck(){
		if(!empty($_SESSION["userDetails"])){
			header('location: ../index.php');
		}
	}

	function extractUserDetails($details){
		$base64unserialized_details = base64_decode($details);
		$unserialized_details = unserialize($base64unserialized_details);
		return $unserialized_details;
	}
	function createSession($data){
		$userDetails['id'] = '1';
	 	$userDetails['username'] = 'testing';
	 	$userDetails['email'] = 'testing@gmail.com';
	 	$userDetails['password'] = 'testing';
	 	$userDetails['admin'] = '1';
		$_SESSION["userDetails"] = base64_encode(serialize($userDetails));
		if(isset($_SESSION['userDetails'])){
			return true;
		}
		return false;
	}

	
	function realEscape(&$data){
		mysqli_real_escape_string($data);
	}

	function isValidateUser($username, $password){
		realEscape($username);
		realEscape($password);
		if($username == "vanividyalaya" && $password == "vani1234"){
			return createSession($username);
		}else{
			return false;
		}
	}

	function logOut(){
		session_start();
		session_destroy();   
	    header('Location:login.php');  
	}

	function executeQuery($query, $link){
		return mysqli_query($link, $query);
	}
	function db_connect_local(){
		$connection = mysqli_connect('localhost', "root", "palaniM@67", "vani");
			if (!$connection) {
			    die("Connection failed: " . mysqli_connect_error());
			    exit();
			}
			return $connection;
	}

	function delete_file($path){
		if (!unlink($path))
		{
		  echo ("Error deleting $path");
		}
		else
		{
		  // echo ("Deleted $path");
		}
	}
