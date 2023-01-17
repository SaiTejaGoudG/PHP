<?php 
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operations</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
</head>
<body>

    <div class="container ">
    <?php
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class=" mt-3 text-center alert alert-success alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        ?>  
        
        <div class="mt-5 mb-5 d-flex justift-content-center">
            <button class="btn btn-success mx-auto ">
                <a class="text-light mt-5" href="user.php">Add Student</a>
            </button>
        </div>      
        <table class="table table-hover table-center mt-1" >
        <thead class="thead-dark ">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
             <?php
             $sql = "SELECT * FROM  `users`";
             $result = mysqli_query($conn, $sql);
             if($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $contact = $row['contact'];
                    $email = $row['email'];
                    $address = $row['address'];
                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <th>'.$firstname.'</th>
                    <td>'.$lastname.'</td>
                    <td>'.$contact.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>
                    <button class="btn btn-primary ">
                    <a class="text-light" href="update.php?updateid='.$id.'">Update</a></button>
                    </td>
                    <td>
                    <button class="btn btn-danger">
                    <a class="text-light" href="delete.php?deleteid='.$id.'">Delete</a></button></td>
                    </tr>';
                }
             }
             ?>
        </tbody>
    </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>