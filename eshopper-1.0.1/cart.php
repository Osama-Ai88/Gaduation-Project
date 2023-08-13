<?php include 'header.php';

include 'Collaborative-Algorithm-2.php';
?>
<!-- Navbar End -->


<!-- Page Header Start -->

<!-- Page Header End -->

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    include 'DBconn.php';
                    //session_start();
                    $sql = 'select * from shppoingcart where UserId  = ' . $_SESSION['UserID'] . '';
                    $res = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($res)) {
                        $sql2 = 'select * from laptops2 where id =' . $row['ProductID'] . '';
                        $res2 = mysqli_query($connection, $sql2);
                        while ($row2 = mysqli_fetch_array($res2)) {
                            echo '<tr>
                                <td class="align-middle">' . $row2['manufacturer'] . ' - ' . $row2['model_name'] . '</td>
                                <td class="align-middle">$' . $row2['price'] . '</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$150</td>
                                <form method="post" action="Deletefromcart.php">
                                <input hidden name="prodId" value=' . $row['ProductID'] . '></input>
                                <td class="align-middle"><button value=l' . $row['Id'] . ' name="Delete" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                                
                                </form>
                            </tr>';
                        }
                    }
                    $sql = 'select * from hardwareshoppingcart where UserId  = ' . $_SESSION['UserID'] . '';
                    $res = mysqli_query($connection, $sql);



                    while ($row = mysqli_fetch_array($res)) {
                        $sql2 = 'select * from hardware where Id =' . $row['HardwareId'] . '';
                        $res2 = mysqli_query($connection, $sql2);
                        while ($row2 = mysqli_fetch_array($res2)) {
                            echo '<tr>
                                <td class="align-middle">' . $row2['Name'] . '</td>
                                <td class="align-middle">$' . $row2['Price'] . '</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$150</td>
                                <form method="post" action="Deletefromcart.php">
                                <td class="align-middle"><button value=h' . $row['Id'] . '  name="Delete" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                                <input hidden name="prodId" value=' . $row['HardwareId'] . '></input>
                                </form>
                            </tr>';
                        }
                    }


                    ?>


                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="addToOrder.php">


                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- Cart End -->




<?php $maxItem = $_SESSION['$getMaxRecommend_RattingOfItem'] ?>

<!-- <div class="container-fluid py-5">

    <h2>The Best Product For you</h2>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div> -->
<div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
</div>

<div class="row px-xl-5">
    <div class="col">
        <div class="owl-carousel related-carousel">

            <?php
            $listOfItem = $_SESSION['rattingOFAllRecommendationItems'];
            // echo"<pre>";
            // print_r($listOfItem);
            // echo"</pre>";

            
            if (isset($listOfItem)) {
                foreach ($listOfItem as $key => $item) {
                    $idOFItem = $item[0];
                    if($item[1]=='L'){

                        //echo $idOFItem." <br>";
                           
                        $sql  = "select * from laptops2 where id = $idOFItem ";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_array($result);
                        //print_r($row);
                        if ($row) {
                            echo '<div class="card product-item border-0">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="img/hp.png" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">' . $row['model_name'] . '</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                <form method="post" action="detail.php">
                                <button type="submit" class="btn btn-sm text-dark p-0" value="l' . $row['id'] . '"  name="detail" style="background-color:white" ><i class="fas fa-eye text-primary mr-1"></i>View Detail</button>
                                    <h5>&nbsp;</h5>
                                    </form>
                                    <form method="post" action="cartCode.php">
                                    <button type="submit" class="btn btn-sm text-dark p-0" value="l' . $row['id'] . '"  name="cart" style="background-color:white" ><i class="fas fa-shopping-cart text-primary mr-1"></i>Add Cart</button>
                                        <h5>&nbsp;</h5>
                                        </form>
                                </div>
                            </div>';
                        }
                    }
                    else{
                        $sql  = "select * from hardware where Id ='$idOFItem' ";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if ($row) {
                            echo '<div class="card product-item border-0">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="img/hp.png" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">' . $row['Name'] . '</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                <form method="post" action="detail.php">
                                <button type="submit" class="btn btn-sm text-dark p-0" value="H' . $row['Id'] . '"  name="detail" style="background-color:white" ><i class="fas fa-eye text-primary mr-1"></i>View Detail</button>
                                    <h5>&nbsp;</h5>
                                    </form>
                                    <form method="post" action="cartCode.php">
                                    <button type="submit" class="btn btn-sm text-dark p-0" value="H' . $row['Id'] . '"  name="cart" style="background-color:white" ><i class="fas fa-shopping-cart text-primary mr-1"></i>Add Cart</button>
                                        <h5>&nbsp;</h5>
                                        </form>
                                </div>
                            </div>';
                        }
                    }
  
                  
                }
            }


            ?>

            <!-- <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div> -->
        </div>
    </div>
</div>
</div>

<?php

//include 'FinalRatting.php';





?>

<?php include 'footer1.php' ?>