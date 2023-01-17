<?php
session_start();
include "connect.php";

if (isset($_POST['firstname']) && 
    isset($_POST['lastname']) && 
    isset($_POST['contact']) && 
    isset($_POST['email']) && 
    isset($_POST['address'])) {

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (empty($_POST["firstname"])) {
            header('location: user.php?firstnameErr=Required');
            exit();
        } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["firstname"])) {
            header('location: user.php?firstnameErr=Enter a valid Name');
            exit();
        } else {
            $firstname = test_input($_POST["firstname"]);
        }

        if (empty($_POST["lastname"])) {
            header('location: user.php?lastnameErr=Required');
            exit();
        } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["lastname"])) {
            header('location: user.php?lastnameErr=Enter a valid Name');
            exit();
        } else {
            $lastname = test_input($_POST["lastname"]);
        }

        if (empty($_POST["contact"])) {
            header('location: user.php?contactErr=Required');
            exit();
        } else if(strlen($_POST["contact"]) != 10) {
            header('location: user.php?contactErr=Contact Should be 10 digits');
            exit();
        } else if (!preg_match("/^[0-9]+$/" ,$_POST["contact"])) {
            header('location: user.php?contactErr=Enter a valid Number !');
            exit();
        }
        else {
            $contact = test_input($_POST["contact"]);
        }
        
        if (empty($_POST["email"])) {
            header('location: user.php?emailErr=Required');
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $_POST["email"])) {
            header('location: user.php?emailErr=Enter a valid email');
            exit();
        }
        else {
            $email = test_input($_POST["email"]);
        }
        
        
        if (empty($_POST["address"])) {
            header('location: user.php?addressErr=Required');
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9\s,'-]*\d+[a-zA-Z0-9\s,'-]*$/",$_POST["address"])) {
            header('location: user.php?addressErr=Enter a valid Address');
            exit();
        } else {
            $address = test_input($_POST["address"]);
        }

        $sql1 = "SELECT * FROM `users` WHERE contact='$contact' ";
		$result1 = mysqli_query($conn, $sql1); 

        $sql2 = "SELECT * FROM `users` WHERE email='$email' ";
		$result2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($result1) > 0) {
			header("Location: user.php?contactErr=The Contact is taken try another");
	        exit();
		} else if(mysqli_num_rows($result2) > 0)  {
            header("Location: user.php?emailErr=The Email is taken try another");
	        exit();
         }else {
            // insert query
            $sql = "INSERT INTO `users` (firstname, lastname, contact, email, address)
            values ('$firstname', '$lastname', '$contact' , '$email' , '$address')";

            // to execute query
            $result = mysqli_query($conn, $sql);
            
            // If query executed succesfully
            if($result) {
                //echo "Data Inserted Successfully";
                header('location:home.php?msg=Data Inserted Successfully');
            } else {
                //die("Connection failed: " . mysqli_connect_error());
            }
        }
    }
?>