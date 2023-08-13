<?php
include 'DBconn.php';


//Gathering Dataset
$sql = "SELECT Id FROM `hardware` UNION SELECT id from `laptops2` ";
$result = mysqli_query($connection,$sql);
$items_Ratting = array();
while($row=mysqli_fetch_array($result)){
    $sql2 = 'SELECT ID  FROM users';
    $result2 = mysqli_query($connection,$sql2);
    while($row2=mysqli_fetch_array($result2)){
        $items_Ratting[$row["Id"]][$row2['ID']] = 4;    
    }
}

$sql = "SELECT * FROM user_ratings ";
$result = mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)){
    if($row['rating']!=0){
        $items_Ratting[$row['item_id']][$row['user_id']]=$row['rating'];
    }
}
echo"<pre>";
print_r($items_Ratting);
echo"</pre>";



$sql = "INSERT INTO `user_ratings`(`ID`, `user_id`, `item_id`, `rating`, `Type`) VALUES ()"


?>