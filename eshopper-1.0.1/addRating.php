<?php
include 'DBconn.php';
session_start();
$id = substr($_POST["ratebtn"],1,);
$userId= $_SESSION['UserID'];
$rateing = $_POST['rate'];
$itemId = $_POST["ratebtn"][0];
$sql = "SELECT * FROM user_ratings WHERE user_id = $userId AND item_id = $id";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

if($itemId=='l'){
    if($row['rating']==0){
        $sql = "update  user_ratings set rating = $rateing where user_id = $userId and item_id = $id";
        mysqli_query($connection,$sql);
    }
    if(!$row ){
    $sql = "insert into user_ratings values('',$userId,$id,$rateing,'L')";
    mysqli_query($connection,$sql);
    }
    
    header('location:Laptop.php');
}
else{
    if($row['rating']==0){
        $sql = "update  user_ratings set rating = $rateing where user_id = $userId and item_id = $id";
        mysqli_query($connection,$sql);
    }
    if(!$row ){
    $sql = "insert into user_ratings values('',$userId,$id,$rateing,'H')";
    mysqli_query($connection,$sql);
    }
    
    header('location:Hardware.php');
}

?>