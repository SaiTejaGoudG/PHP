<?php 
session_start(); 
include "connect.php";

if (isset($_POST['name']) && isset($_POST['userEmail'])
    && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $name = validate($_POST['name']);
	$userEmail = validate($_POST['userEmail']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);

	if (empty($name)) {
		header("Location: signup.php?error=User Name is required");
	    exit();
	} 
    else if(empty($userEmail)){
        header("Location: signup.php?error=User Email is required");
	    exit();
	} else if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $_POST["userEmail"])) {
		header('location: signup.php?error=Enter a valid email');
		exit();
	}
    else if(empty($pass)){
        header("Location: signup.php?error=Password is required");  
	    exit();
	} else if (strlen($pass) < 8) {
		header("Location: signup.php?error=Password must be at least 8 characters long");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match");
	    exit();
	}
	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM `application_user` WHERE userEmail='$userEmail' ";
		$result = mysqli_query($conn, $sql);  

 
		if(mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The userEmail is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO `application_user`(name, userEmail, password) VALUES('$name' ,'$userEmail', '$pass' )";
		//    print_r($sql2); die();
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$");
		        exit();
           }
		}
	}

}else{
	header("Location: signup.php");
	exit();
}