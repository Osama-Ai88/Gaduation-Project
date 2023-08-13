<?php include 'header.php' ?>
<!-- Navbar End -->





<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->










        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include "DBconn.php";
                    $sql = "select * from hardware";
                    $res = mysqli_query($connection, $sql);
                    
                    for ($i = 0; $i < 15; $i++){
                        $row = mysqli_fetch_array($res);
                        echo ' <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/Keyboard.png" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">' . $row['Name'] . '</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>' . $row['Price']. '</h6><h6 class="text-muted ml-2">$' .$row['Id'].'</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                            <form method="post" action="detail.php">
                            <button type="submit" class="btn btn-sm text-dark p-0" value="h' . $row['Id'] . '" name="detail" style="background-color:white" ><i class="fas fa-eye text-primary mr-1"></i>View Detail</button>
                        <h5>&nbsp;</h5>
                        </form>
                        <form method="post" action="cartCode.php">
                        <button type="submit" class="btn btn-sm text-dark p-0" value="h' . $row['Id'] . '"  name="cart" style="background-color:white" ><i class="fas fa-shopping-cart text-primary mr-1"></i>Add Cart</button>
                            <h5>&nbsp;</h5>
                            </form>    
                            </div>
                        </div>
                    </div>';
                    }
                ?>

            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->


<!-- Footer Start -->
<?php include'footer1.php'?>