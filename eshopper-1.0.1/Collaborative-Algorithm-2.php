<?php
include 'DBconn.php';



$sql = "SELECT Id FROM `hardware` UNION SELECT id from `laptops2` ";
$result = mysqli_query($connection,$sql);
$items_Ratting = array();
while($row=mysqli_fetch_array($result)){
    $sql2 = 'SELECT ID  FROM users';
    $result2 = mysqli_query($connection,$sql2);
    //echo $row['Id']."<br>";
    while($row2=mysqli_fetch_array($result2)){

        

        // $rate = 0;
        // if($row["Id"] < 22 )
        // {
        //     if($row2['ID']%2==0)
        //         $rate = 4;
            
            
        // }

        // if($row["Id"] > 22 && $row["Id"] < 44 )
        // {
        //     if($row2['ID']%2==0)
        //         $rate = 3;
          
            
        // }

        // else {

        //     if($row2['ID']%2==0)
        //         $rate = 5;

        // }
        // //else if( $row["Id"] < 22 )

        $items_Ratting[$row["Id"]][$row2['ID']] = 0;

        
    }
}


// echo "<pre>";
//     print_r($items_Ratting);
// echo "</pre>";

//Gathering Dataset
$sql = "SELECT * FROM `user_ratings` ORDER by `user_id` ";
$result = mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)){
    if($row['rating']!=0){
        $items_Ratting[$row['item_id']][$row['user_id']]=$row['rating'];
        
    }
    
}

// echo "<pre>";
//     print_r($items_Ratting);
// echo "</pre>";

//make function to do a Centered vectors
function CenteredOfRattingItem($items_Ratting)
{

    foreach ($items_Ratting as $item_Id => $users) {
        $rate_Mean = 0;
    

        $countOfNonZero=count(array_filter($users));

        //echo $countOfNonZero;

        //print_r( $users);

        if($countOfNonZero){
            $rate_Mean = array_sum($users) / $countOfNonZero;
        }
       // echo $rate_Mean."<br>";
        
    

            foreach($users as $userId => $rate ){
                if($rate!=0){
                    
                    $items_Ratting[$item_Id][$userId]= round($rate-$rate_Mean,3);
                    //echo $items_Ratting[$item_Id][$userId];
                }
            }

            // for ($i=0; $i <count($users); $i++) { 
                
            //     if ($users[$i] != 0) {
    
            //         $users[$i] = $users[$i]-$rate_Mean;
                    
                    
            //     }
    
            // }
            
            //$items_Ratting[$item_Id]= $users;
    
        }

        
        return $items_Ratting;
    
}

// echo "<pre>";
// print_r($items_Ratting[45]);
// echo "</pre>";

$items_Ratting2= $items_Ratting;//CenteredOfRattingItem($items_Ratting);




//Test Data
// $items_Ratting2 = array(
//     1 => array(1.0,0.0,3.0,0.0,0.0,5.0,0.0,0.0,5.0,0.0,4.0,0.0),
//     2 => array(0.0,0.0,5.0,4.0,0.0,0.0,4.0,0.0,0.0,2.0,1.0,3.0),
//     3 => array(2.0,4.0,0.0,1.0,2.0,0.0,3.0,0.0,4.0,3.0,5.0,0.0),
//     4 => array(0.0,2.0,4.0,0.0,5.0,0.0,0.0,4.0,0.0,0.0,2.0,0.0),
//     5 => array(0.0,0.0,4.0,3.0,4.0,2.0,0.0,0.0,0.0,0.0,2.0,5.0),
//     6 => array(1.0,0.0,3.0,0.0,3.0,0.0,0.0,2.0,0.0,0.0,4.0,0.0)
// );

// foreach($items_Ratting2 as $key=>$value){
//     foreach($value as $key2=>$value2){
//         if($items_Ratting[$key][$key2]!=$value2){
//             echo"NotEquals ";
//             echo $key.'   '.$key2.'   '.$value2.'<br>';
        
            
//         }
//     }
// }





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
        {
            array_push($items_Predict,$row['item_id']);
        }
    

    // echo "<pre>";
    // print_r( $items_Predict);
    // echo "</pre>";

    return $items_Predict;
    

}


function Get_All_Ratting_Items_byUser($userId)
{
    
    global $connection;

    $items_Ratting_User = array();
    $query_get_items = mysqli_query($connection,"SELECT `item_id` FROM `user_ratings` WHERE `user_id`='$userId' and `rating` != 0");
    
    while($row = mysqli_fetch_assoc($query_get_items))
    {
        array_push($items_Ratting_User,$row['item_id']);
    }


    // echo "<pre>";
    // print_r($items_Ratting_User);
    // echo "</pre>";


    return $items_Ratting_User;
    

}


function similarity_item($item1, $item2) {

    $item1_Common = [];
    $item2_Common = [];
    
    
    // echo "<pre>";
    // print_r($item1);
    // echo "</pre>"; $userID

    //  echo "<pre>";
    // print_r($item2);
    // echo "</pre>";
    // echo "<hr>";

    foreach($item1 as $userId => $rate ){

        //echo $userId." <br>";
        
        if(array_key_exists($userId,$item1) && array_key_exists($userId,$item2)){
        
            if ($item1[$userId] != 0 and $item2[$userId] != 0) {
                $item1_Common[] = $item1[$userId];
                $item2_Common[] = $item2[$userId];
            }
        }
    }


    // echo "<pre>";
    // print_r($item1);
    // echo "</pre>";

   

    // echo"<hr>";

    // echo "<pre>";
    // print_r($item1_Common);
    // echo "</pre>";


    // echo "<pre>";
    // print_r($item2_Common);
    // echo "</pre>";
   // echo "HI";

   

    



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
    
    //this item will be recommend for user
    $items_Similarity = [];
    //echo $item."    "; 
    // echo $item; 
    foreach ($nearNeighborItem as $item_Neighbor) {
        
        
        $similarityValue = round(similarity_item($items_Ratting[$item],$items_Ratting[$item_Neighbor]),5);
        
        //Ignore for Negative Similarity(aka Dissimilarity)  
        if($similarityValue > 0)
        {
            $items_Similarity[$item_Neighbor] = $similarityValue;
        }
        
    
    }

    
    arsort($items_Similarity);

    return $items_Similarity;
}


 //Get the rating that the item will be suggested by the user
    function Get_Recommend_RattingOfItem($itemOfRecommendation,$items_Ratting,$predict_Item_user)
    {
        $rattingOFAllRecommendationItems=array();
        
        //print_r($val);

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
    


//from session.
$userID = $_SESSION['UserID'];
$itemOfRecommendation = [];


//get all item that user not rated until now aka ratting = 0.
$items_Predict = Get_All_Predict_Items($userID);

//get all item that user  rated until now aka ratting != 0.
$items_Ratting_User = Get_All_Ratting_Items_byUser($userID);


// echo "<pre>";
// print_r($items_Predict);
// echo "</pre>";

// echo "<pre>";
// print_r($items_Ratting_User);
// echo "</pre>";

$percentageOfItems_Ratting_User = count($items_Ratting_User)/count($items_Ratting2);
$percentageOfAllItems = 0.02;

//echo $percentageOfItems_Ratting_User;


if($percentageOfItems_Ratting_User >=  $percentageOfAllItems)
{
    
    asort($items_Predict);

    
    // echo "<pre>";
    // print_r($items_Ratting_User);
    // echo "</pre>";


//------------------

//---------------------



    foreach($items_Predict as $item)
    {
        
        if(count(Get_Recommend_Item($items_Ratting2,$item,$items_Ratting_User))!=0)
            $itemOfRecommendation[$item] = Get_Recommend_Item($items_Ratting2,$item,$items_Ratting_User);
    }
    
    
    
    // $recommendItem  = array_search(max($items_Similarity),$items_Similarity);
    // echo "<pre>";
    // print_r($itemOfRecommendation);
    // echo "</pre>";
    //Get_Recommend_RattingOfItem($itemOfRecommendation,$items_Ratting,$predict_Item_user);



    
    if(count($itemOfRecommendation)!=0){
    
    
        $rattingOFAllRecommendationItems = Get_Recommend_RattingOfItem($itemOfRecommendation,$items_Ratting,$userID);
        
        // echo "<pre>";
        // print_r($rattingOFAllRecommendationItems);
        // echo "</pre>";
        
        //get Item
        $getMaxRecommend_RattingOfItem =array_search(max($rattingOFAllRecommendationItems),$rattingOFAllRecommendationItems);
        
        

        $rattingOFAllRecommendationItemsWithType=array();
        foreach($rattingOFAllRecommendationItems as $id => $rate){

            $sql = "SELECT `Type` FROM `user_ratings` WHERE `item_id`=$id";
            $result = mysqli_query($connection,$sql);
            if($result)
                $typeOfItem =  mysqli_fetch_array($result)['Type'];    
            // echo $typeOfItem;
            $rattingOFAllRecommendationItemsWithType[rand(1,1000)] = [$id,$typeOfItem];
        }

        // echo "<pre>";
        // print_r($rattingOFAllRecommendationItemsWithType);
        // echo "</pre>";
        
        $_SESSION['rattingOFAllRecommendationItems'] = $rattingOFAllRecommendationItemsWithType;
        $_SESSION['$getMaxRecommend_RattingOfItem'] = $getMaxRecommend_RattingOfItem;
    }

       

}


?>