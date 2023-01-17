<?php
include 'connect.php';
$id=$_GET['deleteid'];
$sql="delete from `users` where id=$id";
$result=mysqli_query($conn, $sql); 
if($result){
    header('Location: home.php?msg=Data Deleted Successfully');
} 
else{
    echo "Failed: "  . mysqli_error($conn);
}
?>