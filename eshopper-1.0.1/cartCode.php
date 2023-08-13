<?php
include 'DBconn.php';
session_start();
$id = substr($_POST["cart"],1,);
$userId= $_SESSION['UserID'];
$sqlLap = "select * from shppoingcart where ProductID  = $id and UserId = $userId";
$resLap = mysqli_query($connection,$sqlLap);
$rowLap =  mysqli_fetch_array($resLap);
$sqlHard = "select * from hardwareshoppingcart where HardwareId  = $id and UserId = $userId";
$resLapHard = mysqli_query($connection,$sqlHard);
$rowHard =  mysqli_fetch_array($resLapHard);
//echo $_POST["cart"][0];
if($_POST["cart"][0]=='l'){

    if(!$rowLap){
        $sql = "insert into shppoingcart values('',$id,$userId)";
        mysqli_query($connection,$sql);
    }
    
    header('location:Laptop.php');
}
else{
    print_r($resLapHard);
    if(!$rowHard){
        $sql = "insert into hardwareshoppingcart values('',$id,$userId)";
        mysqli_query($connection,$sql);
    }

    
    header('location:Hardware.php');
}
