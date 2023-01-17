<?php
    session_start();
    include 'connect.php';
    // print_r("Error") ;die();
    $id=$_GET['updateid'];   // accessing parameter
    
    $sql = "SELECT * FROM `users` WHERE id=$id";
    // print_r($sql) ;die();
    $result = mysqli_query($conn, $sql);
    // print_r($result) ;die();
   
    $row = mysqli_fetch_assoc($result); 
    $firstname = $row['firstname']; 
    $lastname = $row['lastname']; 
    $contact = $row['contact']; 
    $email = $row['email']; 
    $address = $row['address'];

    if(isset($_POST['submit'])) {
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
                header('location: update.php?updateid='.$id.'&firstnameErr=Required');
                exit();
            } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["firstname"])) {
                header('location: update.php?updateid='.$id.'&firstnameErr=Enter a valid Name');
                exit();
            } else {
                $firstname = test_input($_POST["firstname"]);
            }

            if (empty($_POST["lastname"])) {
                header('location: update.php?updateid='.$id.'&lastnameErr=Required');
                exit();
            } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["lastname"])) {
                header('location: update.php?updateid='.$id.'&lastnameErr=Enter a valid Name');
                exit();
            } else {
                $lastname = test_input($_POST["lastname"]);
            }

            if (empty($_POST["contact"])) {
                header('location: update.php?updateid='.$id.'&contactErr=Required');
                exit();
            } else if(strlen($_POST["contact"]) != 10) {
                header('location: update.php?updateid='.$id.'&contactErr=Contact Should be 10 digits');
                exit();
            } else if (!preg_match("/^[0-9]+$/" ,$_POST["contact"])) {
                header('location: update.php?updateid='.$id.'&contactErr=Enter a valid Number !');
                exit();
            }else {
                $contact = test_input($_POST["contact"]);
            }
            
            if (empty($_POST["email"])) {
                header('location: update.php?updateid='.$id.'&emailErr=Required');
                exit();
            } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $_POST["email"])) {
                header('location: update.php?updateid='.$id.'&emailErr=Enter a valid email');
                exit();
            }else {
                $email = test_input($_POST["email"]);
            }
            
            
            if (empty($_POST["address"])) {
                header('location: update.php?addressErr=Required');
                exit();
            } else if (!preg_match("/^[a-zA-Z0-9\s,'-]*\d+[a-zA-Z0-9\s,'-]*$/",$_POST["address"])) {
                header('location: update.php?addressErr=Enter a valid Address');
                exit();
            } else {
                $address = test_input($_POST["address"]);
            } 

        
            // insert query
            $sql="UPDATE `users` SET id=$id , firstname ='$firstname' , lastname = '$lastname', contact = '$contact', email = '$email', address = '$address' WHERE id=$id ";
            
            // to execute query
            $result =mysqli_query($conn, $sql);
            
            // If query executed succesfully
            if($result){
                //echo "Data Updated Successfully";
                header('Location:home.php?msg=Data Updated Successfully');
            } else {
                die("Connection failed: " . mysqli_connect_error());
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >

    <title>Crud Operations.</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label >First Name</label>
                <input type="text" autocomplete="off" name="firstname" class="form-control" placeholder="Enter your First Name" 
                value="<?php echo $firstname;?>" >
                <span>
                    <?php if(isset($_GET["firstnameErr"])) { ?>
                            <p> <?php echo $_GET["firstnameErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input type="text" autocomplete="off" name="lastname" class="form-control" placeholder="Enter your Last Name"
                value="<?php echo $lastname;?>" >
                <span>
                    <?php if(isset($_GET["lastnameErr"])) { ?>
                            <p> <?php echo $_GET["lastnameErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Contact</label>
                <input type="text" autocomplete="off" name="contact" class="form-control" placeholder="Enter your Number"
                value="<?php echo $contact;?>" >
                <span>
                    <?php if(isset($_GET["contactErr"])) { ?>
                            <p> <?php echo $_GET["contactErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="text" autocomplete="off" name="email" class="form-control" placeholder="Enter your Email"
                value="<?php echo $email;?>" >
                <span>
                    <?php if(isset($_GET["emailErr"])) { ?>
                            <p> <?php echo $_GET["emailErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="text" autocomplete="off" name="address" class="form-control" placeholder="Enter your Address"
                value="<?php echo $address;?>" >
                <span>
                    <?php if(isset($_GET["addressErr"])) { ?>
                            <p> <?php echo $_GET["addressErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
  </body>
</html>
