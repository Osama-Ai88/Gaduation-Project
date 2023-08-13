<?php
include 'DBconn.php';
session_start();


$id = substr($_POST["Delete"],1,);
$userId=$_SESSION['UserID'];
$prodId = $_POST["prodId"];
echo $prodId;
$_SESSION['ItemDelete'][$prodId]=$_POST["Delete"][0];


if($_POST["Delete"][0]=='l'){
    $sql = "delete from shppoingcart where Id = $id ";
}
else{
    $sql = "delete from hardwareshoppingcart where Id = $id ";
}

mysqli_query($connection,$sql);
header('location:cart.php');
$_SESSION['$isItemCartDelete'] = true;
?>