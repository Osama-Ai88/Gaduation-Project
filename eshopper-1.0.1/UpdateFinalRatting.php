<?php 
// include 'DBconn.php';


$recommendItems= [];
$userId= $_SESSION['UserID'];

$sql = "SELECT * FROM `recommend_items` where `userID` = $userId";
$result = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($result) ){

    array_push($recommendItems, [$row['userID'] ,$row['ItemID'] , $row['rating'],$row['Type']]);
}

// print_r($recommendItems);

if(count($recommendItems))
{
    foreach($recommendItems as $item ){
        $userID = $item[0];
        $itemID = $item[1];
        $rating = $item[2];
        $type =   $item[3];

        $sql = "SELECT * FROM `user_ratings` WHERE `user_id`=$userID and `item_id` = $itemID and `rating` = $rating and `Type` = '$type'";
        $isNotFind = mysqli_query($connection,$sql);
        if($isNotFind){

            $sql = "INSERT INTO `user_ratings`(`user_id`, `item_id`, `rating`, `Type`) VALUES ($userID,$itemID,$rating,'$type') ";
            mysqli_query($connection ,$sql);

        }
    }
}

$sql = "DELETE FROM `recommend_items` where `userID` = $userId";
$result = mysqli_query($connection,$sql);








?>