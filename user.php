<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >

    <title>Register Page</title>
  </head>
  <style>
    .error {color: #FF0000;}
  </style>
  <body>
    <div class="bg-dark py-3 ">
        <div class="container d-flex justify-content-center">
            <div class="text-white h4">PHP CRUD APPLICATION</div>
        </div>
    </div>
    <div class="container my-5">
        <form action="user-validation.php" method="post">
            <div class="form-group">
                <label >First Name</label>
                <input  type="text" 
                        autocomplete="off" 
                        name="firstname" 
                        class="form-control" 
                        placeholder="Enter your First Name" required
                        value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>">
                <span>
                    <?php if(isset($_GET["firstnameErr"])) { ?>
                        <p class="error"> <?php echo $_GET["firstnameErr"]; ?></p>
                    <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input  type="text" 
                        autocomplete="off" 
                        name="lastname" 
                        class="form-control"
                        placeholder="Enter your Last Name" required
                        value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>">
                <span>
                    <?php if(isset($_GET["lastnameErr"])) { ?>
                        <p class="error"> <?php echo $_GET["lastnameErr"]; ?></p>
                    <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Contact</label>
                <input  type="text" 
                        autocomplete="off" 
                        name="contact" 
                        class="form-control" 
                        placeholder="Enter your Number" required
                        value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : ''; ?>">
                <span>
                    <?php if(isset($_GET["contactErr"])) { ?>
                        <p class="error"> <?php echo $_GET["contactErr"]; ?></p>
                    <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Email</label>
                <input  type="text" 
                        autocomplete="off" 
                        name="email" 
                        class="form-control" 
                        placeholder="Enter your Email" required
                        value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                <span>
                    <?php if(isset($_GET["emailErr"])) { ?>
                        <p class="error"> <?php echo $_GET["emailErr"]; ?></p>
                    <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Address</label>
                <input  type="text" 
                        autocomplete="off" 
                        name="address" 
                        class="form-control" 
                        placeholder="Enter your Address" required
                        value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
                <span>
                    <?php if(isset($_GET["addressErr"])) { ?>
                        <p class="error"> <?php echo $_GET["addressErr"]; ?></p>
                    <?php }?>
                </span>
            </div>
            <div class="d-flex justify-content-between p-3 mt-5 mb-5">
                <div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                <div>
                    <a href="home.php" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
  </body>
</html>
