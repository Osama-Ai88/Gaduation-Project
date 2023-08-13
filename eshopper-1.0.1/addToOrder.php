<?php
include 'DBconn.php';
session_start();


$userId=$_SESSION['UserID'];
//echo $userId;

///Insert Hardware
$sql = "SELECT * FROM `hardwareshoppingcart` WHERE UserId  =$userId ";
$result = mysqli_query($connection,$sql);
while($rwo = mysqli_fetch_array($result)){
    $proId  = $rwo['HardwareId'];
    $_SESSION['ItemBuy'][$proId] = 'h';

    $sql3 = "delete from hardwareshoppingcart where UserId   = $userId";
    mysqli_query($connection,$sql3);
    header('location:cart.php');
   
    $sql2="insert into orders values('',$userId,$proId)";
    mysqli_query($connection,$sql2);
}


echo "<hr>";
//insert Laptop
$sql3 = "SELECT * FROM `shppoingcart` WHERE UserId  =$userId ";
$result = mysqli_query($connection,$sql3);
while($rwo = mysqli_fetch_array($result)){
    $proId  = $rwo['ProductID'];
    $_SESSION['ItemBuy'][$proId] = 'l';
    

    $sql3 = "delete from shppoingcart where UserId   = $userId";
    mysqli_query($connection,$sql3);
    header('location:cart.php');
   

    
}


$sql3 = "delete from hardwareshoppingcart where UserId   = $userId";
mysqli_query($connection,$sql3);
header('location:cart.php');





?>