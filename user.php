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
        <form action="user-validation.php" method="post">
            <div class="form-group">
                <label >First Name</label>
                <input type="text" autocomplete="off" name="firstname" class="form-control" placeholder="Enter your First Name" >
                <span>
                    <?php if(isset($_GET["firstnameErr"])) { ?>
                            <p> <?php echo $_GET["firstnameErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input type="text" autocomplete="off" name="lastname" class="form-control" placeholder="Enter your Last Name" >
                <span>
                    <?php if(isset($_GET["lastnameErr"])) { ?>
                            <p> <?php echo $_GET["lastnameErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Contact</label>
                <input type="text" autocomplete="off" name="contact" class="form-control" placeholder="Enter your Number" >
                <span>
                    <?php if(isset($_GET["contactErr"])) { ?>
                            <p> <?php echo $_GET["contactErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="text" autocomplete="off" name="email" class="form-control" placeholder="Enter your Email" >
                <span>
                    <?php if(isset($_GET["emailErr"])) { ?>
                            <p> <?php echo $_GET["emailErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="text" autocomplete="off" name="address" class="form-control" placeholder="Enter your Address" >
                <span>
                    <?php if(isset($_GET["addressErr"])) { ?>
                            <p> <?php echo $_GET["addressErr"]; ?></p>
                       <?php }?>
                </span>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </body>
</html>
