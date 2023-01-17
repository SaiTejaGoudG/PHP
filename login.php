<?php 
session_start(); 
include "connect.php";

if (isset($_POST['userEmail']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$userEmail = validate($_POST['userEmail']);
	$pass = validate($_POST['password']);

	if (empty($userEmail)) {
		header("Location: index.php?error=User Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);
        
		$sql = "SELECT * FROM `application_user` WHERE userEmail='$userEmail' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			// print_r($row); die();
            if ($row['userEmail'] === $userEmail && $row['password'] === $pass) {
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User Email or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User Email or password");
	        exit();
		}
	}	
} 
// else{
// 	header("Location: index.php");
// 	exit();
// }