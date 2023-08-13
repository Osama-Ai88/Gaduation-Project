<?php 
include 'DBconn.php';

if(isset($_POST['submit'])){
    $Name = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $sql = "insert into users values('','$Name','$Email','$Password',2)";
    mysqli_query($connection,$sql);
}


header('location:signup.php');


?>