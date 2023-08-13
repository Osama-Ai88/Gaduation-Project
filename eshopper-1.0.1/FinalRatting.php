

<?php


include 'DBconn.php';



session_start();
//user id
$userID = $_SESSION['UserID'];

$_SESSION['ItemDelete'];
$_SESSION['ItemView'];
$_SESSION['ItemBuy'];





echo "This is Array for Delete Items";
echo "<pre>";
print_r($_SESSION['ItemDelete']);
echo "</pre>";


echo "This is Array for View Items";
echo "<pre>";
print_r($_SESSION['ItemView']);
echo "</pre>";



echo "This is Array for  Buy Items";
echo "<pre>";
print_r($_SESSION['ItemBuy']);
echo "</pre>";




$map = [];
function MergeData($arr){
    
    global $map;

    foreach ($arr as $item => $type) {
        
        if (!in_array([$item,$type], $map)){
            $map[rand(1,100)] = [$item,$type];
        }
    }
}


MergeData($_SESSION['ItemDelete']);
MergeData($_SESSION['ItemView']);
MergeData($_SESSION['ItemBuy']);



echo "<pre>";
print_r($map);
echo "</pre>";



            /*
            ★★★★★ = Masterpiece / Top Favorite

            ★★★★½ = Excellent / Favorite

            ★★★★☆ = Great / Loved It

            ★★★½☆ = Good / Liked It

            ★★★☆☆ = Decent / It Was Ok

            ★★½☆☆ = Mediocre / Did Not Like It

            ★★☆☆☆ = Bad

            ★½☆☆☆ = Terrible

            ★☆☆☆☆ = Hate It

            ♡ = Would watch it again

            */


function rattingOfItem($prodID,$type){

    
    $finalRattingItem = 0;
    $isItemBought=false;
    $isItemCartDelete=false;
    $isItemView=false;
    $isItemGood=false;
    $scoreItemBought = 4;
    $scoreItemCartDelete = 3;
    $scoreItemView= 2;


    //Item Delete
    if(array_key_exists($prodID,$_SESSION['ItemDelete']))
            $isItemCartDelete=true;

    if(array_key_exists($prodID,$_SESSION['ItemView']))
            $isItemView=true;

    if(array_key_exists($prodID,$_SESSION['ItemBuy']))
            $isItemBought=true;

    


    $avg =0;
    $c=0;
    
   global  $connection;
    //Get Ratting
    $q ="SELECT `rating` FROM `user_ratings` WHERE `item_id`='$prodID' and (`rating` != '0' and `Type`='$type')";
    $query = mysqli_query($connection,$q);
    while ($row = mysqli_fetch_assoc($query)) {
        $c++;
        $avg += $row['rating']; 
    }
    if($c!=0)
        $avg= $avg/ $c;




    if($avg >= 3 )
        $isItemGood=true;

        //S1-buy
        //Masterpiece / Top Favorite
        if($isItemBought && !$isItemCartDelete  && !$isItemView){
        // 4 + 1
        //★★★★★
        $finalRattingItem = $scoreItemBought + 1;
        if($isItemGood)
            $finalRattingItem++;
        }
        //S2-buy
        //Excellent / Favorite
        else if($isItemBought && $isItemCartDelete  && !$isItemView){
        // (3 + 4)/2 + 1 
        //★★★★½ 
        if($isItemGood)
            $finalRattingItem = (($scoreItemBought + $scoreItemCartDelete) + 1)/2;
        //★★★½☆ = Good / Liked It
        else
            $finalRattingItem = (($scoreItemBought + $scoreItemCartDelete))/2;
        }

        //S3-buy
        //★★★☆☆ = Decent / It Was Ok
        else if($isItemBought && !$isItemCartDelete  && $isItemView){
        // (2 + 3 + 3)/3 + 1 
        //★★★☆☆ = Decent / It Was Ok
        if($isItemGood)
            $finalRattingItem = (($scoreItemBought + $scoreItemView) + 1)/2;
        //(3 + 4)/2 + 0
        //★★½☆☆ = Mediocre / Did Not Like It
        else
            $finalRattingItem =  (($scoreItemBought + $scoreItemView))/2;
        
        }

        else if($isItemBought && $isItemCartDelete  && $isItemView){

            // (2 + 3 + 3)/3 + 1 
            //★★★☆☆ = Decent / It Was Ok
            if($isItemGood)
                $finalRattingItem =  (($scoreItemBought + $scoreItemCartDelete + $scoreItemView ) + 1)/3;
            //(3 + 4)/2 + 0
            //★★½☆☆ = Mediocre / Did Not Like It
            else
                $finalRattingItem =  (($scoreItemBought + $scoreItemCartDelete + $scoreItemView ))/3;
            
            }


        //////////////////////////////////////////////////////////////////////////
        // if not buy ---> good item :0.5

        //S4-Not buy

        else if(!$isItemBought && $isItemCartDelete  && !$isItemView){
        // 2.5 + 0.5
        //★★★☆☆ = Decent / It Was Ok
        if($isItemGood)
            $finalRattingItem = $scoreItemCartDelete + 1;
        //2.5 + 0 
        //★★½☆☆ = Mediocre / Did Not Like It
        else
            $finalRattingItem = $scoreItemCartDelete;
        }


        else if(!$isItemBought && !$isItemCartDelete  && $isItemView){
        // (2.5 + 2)/2 + 0.5
        //★★½☆☆ = Mediocre / Did Not Like It
        if($isItemGood)
            $finalRattingItem = $scoreItemView + 1;
        
        //(2.5 + 2)/2 
        //★★☆☆☆ = Bad
        else
            $finalRattingItem = $scoreItemView ;
        
        }


        else if(!$isItemBought && $isItemCartDelete  && $isItemView){
        // (2.5 + 2)/2 + 0.5
        //★★½☆☆ = Mediocre / Did Not Like It
        if($isItemGood)
            $finalRattingItem =  (($scoreItemCartDelete + $scoreItemView + 1 ))/2;
        
        //(2.5 + 2)/2 
        //★★☆☆☆ = Bad
        else
            $finalRattingItem =  (($scoreItemCartDelete + $scoreItemView ))/2;
        
        }

    echo $finalRattingItem."<br>";

    return $finalRattingItem;
    
}
if(count($map)){
    foreach($map  as $index => $item)
    {
        $prodID =$item[0];
        $type = strtoupper($item[1]);


        $finalRattingItem = rattingOfItem($prodID,$type);


        mysqli_query($connection,"INSERT INTO `recommend_items`(`userID`, `ItemID`, `rating`, `Type`) VALUES($userID,$prodID,$finalRattingItem,'$type')");

    }
}

?>