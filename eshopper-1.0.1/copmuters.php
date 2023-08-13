<?php
include "DBconn.php";
include "MyKNN.php";
$sql = "select * from laptops";
$res = mysqli_query($connection,$sql);
$sql2 = "select min(Price) as minprice from laptops";
$resminprice = mysqli_query($connection,$sql2);
$MinPrice = $row=mysqli_fetch_array($resminprice)["minprice"];
//print_r($row=mysqli_fetch_array($res));


while($row=mysqli_fetch_array($res)){
    $sample[] = [$row['Manufacturer'],$row['Price'],$row['Category'],$row["RAM"],$row['CPU'],$row['GPU'],$row['Storage'],$row['ID']];
}

//print_r($sample[0][1]);
$s=ForMin($sample,["Dell",1000,"Gaming","16GB","Intel Core i5 2.3GHz","ntel Iris Plus Graphics 640","128GB SSD"],$MinPrice);
//print_r($s);
for($i=0;$i<100;$i++){
    $a = $s[$i][1];
    //print_r($s[$i]);
    $sql = "select * from laptops where ID='$a'";
    $res = mysqli_query($connection,$sql);
    print_r($row=mysqli_fetch_array($res));
    echo"<hr>";
}







?>