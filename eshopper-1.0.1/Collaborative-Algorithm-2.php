<?php
include 'DBconn.php';



$sql = "SELECT Id FROM `hardware` UNION SELECT id from `laptops2` ";
$result = mysqli_query($connection,$sql);
$items_Ratting = array();
while($row=mysqli_fetch_array($result)){
    $sql2 = 'SELECT ID  FROM users';
    $result2 = mysqli_query($connection,$sql2);
    while($row2=mysqli_fetch_array($result2)){
        $items_Ratting[$row["Id"]][$row2['ID']] = 0;
    }
}

//Gathering Dataset
$sql = "SELECT * FROM `user_ratings` ORDER by `user_id` ";
$result = mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)){
    if($row['rating']!=0){
        $items_Ratting[$row['item_id']][$row['user_id']]=$row['rating'];
    }
}
$items_Ratting2= $items_Ratting;


//make function to do a Centered vectors
function CenteredOfRattingItem($items_Ratting)
{

    foreach ($items_Ratting as $item_Id => $users) {
        $rate_Mean = 0;
        $countOfNonZero=count(array_filter($users));
        if($countOfNonZero){
            $rate_Mean = array_sum($users) / $countOfNonZero;
        }
            foreach($users as $userId => $rate ){
                if($rate!=0)
                    $items_Ratting[$item_Id][$userId]= round($rate-$rate_Mean,3);
            }
        }
        return $items_Ratting;
}



function Get_All_Predict_Items($userId)
{
    global $connection;

    $items_Predict = array();
    $query_get_items = mysqli_query($connection,"SELECT Id as `item_id` FROM `hardware` WHERE `Id` NOT IN (SELECT `item_id` FROM `user_ratings` WHERE `user_id` = $userId)");
    while($row = mysqli_fetch_assoc($query_get_items))
        {
            array_push($items_Predict,$row['item_id']);
        }


    $query_get_items = mysqli_query($connection,"SELECT Id as `item_id` FROM `laptops2` WHERE `ID` NOT IN (SELECT `item_id` FROM `user_ratings` WHERE `user_id` = $userId)");
    while($row = mysqli_fetch_assoc($query_get_items))
            array_push($items_Predict,$row['item_id']);
    return $items_Predict;
}


function Get_All_Ratting_Items_byUser($userId)
{
    global $connection;
    $items_Ratting_User = array();
    $query_get_items = mysqli_query($connection,"SELECT `item_id` FROM `user_ratings` WHERE `user_id`='$userId' and `rating` != 0");
    
    while($row = mysqli_fetch_assoc($query_get_items))
        array_push($items_Ratting_User,$row['item_id']);
    return $items_Ratting_User;
}


function similarity_item($item1, $item2) {
    
    $item1_Common = [];
    $item2_Common = [];
    foreach($item1 as $userId => $rate ){
        if(array_key_exists($userId,$item1) && array_key_exists($userId,$item2)){
            if ($item1[$userId] != 0 and $item2[$userId] != 0) {
                $item1_Common[] = $item1[$userId];
                $item2_Common[] = $item2[$userId];
            }
        }
    }
    if(count($item1_Common)!=0 && count($item2_Common)!=0){
        $dot_Product = array_sum(array_map(function($a, $b) { return $a * $b; }, $item1_Common, $item2_Common));
        $length_vector1 = array_sum(array_map(function($a) { return $a * $a; }, $item1_Common));
        $length_vector2 = array_sum(array_map(function($a) { return $a * $a; }, $item2_Common));
        return $dot_Product / sqrt($length_vector1 * $length_vector2);
    }
    return -1;
}



function Get_Recommend_Item($items_Ratting,$item,$nearNeighborItem)
{
    
    //this item will be recommended for the user
    $items_Similarity = [];
    foreach ($nearNeighborItem as $item_Neighbor) {
        $similarityValue = round(similarity_item($items_Ratting[$item],$items_Ratting[$item_Neighbor]),5);
        if($similarityValue > 0)
            $items_Similarity[$item_Neighbor] = $similarityValue;
    }
    arsort($items_Similarity);
    return $items_Similarity;
}

 //Get the rating that the item will be suggested by the user
function Get_Recommend_RattingOfItem($itemOfRecommendation,$items_Ratting,$predict_Item_user)
{
    $rattingOFAllRecommendationItems=array();
    foreach($itemOfRecommendation as $item =>$val)
    {
        $rattingOfRecommendItem=0;
        $sumOfWight=0;
        
        $i =0;
        foreach($val as $subItem => $wight)
        {
            if($i==2)break;

            $rattingOfRecommendItem += $wight*$items_Ratting[$subItem][$predict_Item_user];

            $sumOfWight+= $wight;
            
            $i++;
        }
        $rattingOFAllRecommendationItems[$item] =  round($rattingOfRecommendItem/$sumOfWight,2);
    }
    arsort($rattingOFAllRecommendationItems);
    return $rattingOFAllRecommendationItems;
}
    



//from the session.
$userID = $_SESSION['UserID'];
$itemOfRecommendation = [];
//get all items that the user has not rated until now aka ratting = 0.
$items_Predict = Get_All_Predict_Items($userID);

//get all items that the user  rated until now aka ratting != 0.
$items_Ratting_User = Get_All_Ratting_Items_byUser($userID);
$percentageOfItems_Ratting_User = count($items_Ratting_User)/count($items_Ratting2);
$percentageOfAllItems = 0.02;

if($percentageOfItems_Ratting_User >=  $percentageOfAllItems)
{
    asort($items_Predict);

    foreach($items_Predict as $item)
    {
        if(count(Get_Recommend_Item($items_Ratting2,$item,$items_Ratting_User))!=0)
            $itemOfRecommendation[$item] = Get_Recommend_Item($items_Ratting2,$item,$items_Ratting_User);
    }
    
    if(count($itemOfRecommendation)!=0){
        $rattingOFAllRecommendationItems = Get_Recommend_RattingOfItem($itemOfRecommendation,$items_Ratting,$userID);
        $getMaxRecommend_RattingOfItem =array_search(max($rattingOFAllRecommendationItems),$rattingOFAllRecommendationItems);
        $rattingOFAllRecommendationItemsWithType=array();
        foreach($rattingOFAllRecommendationItems as $id => $rate){
            $sql = "SELECT `Type` FROM `user_ratings` WHERE `item_id`=$id";
            $result = mysqli_query($connection,$sql);
            if($result)
                $typeOfItem =  mysqli_fetch_array($result)['Type'];    
            $rattingOFAllRecommendationItemsWithType[rand(1,1000)] = [$id,$typeOfItem];
        }
        $_SESSION['rattingOFAllRecommendationItems'] = $rattingOFAllRecommendationItemsWithType;
        $_SESSION['$getMaxRecommend_RattingOfItem'] = $getMaxRecommend_RattingOfItem;
    }
}


?>
