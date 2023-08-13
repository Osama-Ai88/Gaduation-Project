<?php
include 'DBconn.php';
if(isset($_POST['submit'])){
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $sql = "select * from users where Email  = '$Email' and Password ='$Password'";
    $res  = mysqli_query($connection,$sql);



    $row = mysqli_fetch_array($res);
        
    session_start();
    $_SESSION['UserID']=$row['ID'];
    $_SESSION['Email']=$row['Email'];
    $_SESSION['RoleFk'] = $row['Role'];
    $_SESSION['Name'] = $row['Name'];
   
    $_SESSION['ItemDelete'] = array();
    $_SESSION['ItemView']   = array();
    $_SESSION['ItemBuy'] = array();
    $_SESSION['rattingOFAllRecommendationItems'] = array();
    $_SESSION['$getMaxRecommend_RattingOfItem'] = 0;


    //add zero ratting for new user
    //1- retrive data form laptops 
    // $userID = $row['ID'];
    // $query_IsUserExisting = "SELECT `userID` FROM `recommend_items` WHERE `userID`=$userID";
    
    // //check if user is new or not
    // $IsUserExisting =mysqli_fetch_assoc(mysqli_query($connection,$query_IsUserExisting)); 
    // if(!$IsUserExisting)
    // {
    //     $query_laptops = "SELECT `id` FROM `laptops2`";
    //     $execution_Query =mysqli_query($connection,$query_laptops); 
        
    //     while($listOfLaptops = mysqli_fetch_assoc($execution_Query))
    //     {
    //         $prodID = $listOfLaptops['id'];
    //         mysqli_query($connection,"INSERT INTO `recommend_items`(`userID`, `ItemID`, `rating`,`Type`) VALUES ('$userID','$prodID','0','l')");
    //     }

    //     $query_Hardwares = "SELECT `id` FROM `hardware`";
    //     $execution_Query =mysqli_query($connection,$query_Hardwares); 
        
    //     while($listOfHardwares = mysqli_fetch_assoc($execution_Query))
    //     {
    //         $prodID = $listOfHardwares['id'];
    //         mysqli_query($connection,"INSERT INTO `recommend_items`(`userID`, `ItemID`, `rating`,`Type`) VALUES ('$userID','$prodID','0','h')");
    //     }

    
    // }

    if($row){
        if($row['Role']==2){
        header('location:index1.php');

    }
    else{
        header('location:Dashbord.php');
    }
    }
    else{
        header('location:signin.php');
    }
    
}



?>