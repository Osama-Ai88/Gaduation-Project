<?php include 'header.php' ?>
<!-- Navbar End -->





<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <!-- <div class="col-lg-3 col-md-12"> -->
        <!-- Price Start -->



        <!-- <form action="Laptop.php" method="post">
                <select style="padding: 10px;  background:#edf2ff; border:none;" name="man">
                    <?php
                    include 'DBconn.php';
                    $S1 = "SELECT  DISTINCT(manufacturer) as manufacturer from Laptops2";
                    $ram = mysqli_query($connection, $S1);
                    while ($row = mysqli_fetch_array($ram)) {
                        echo '<option value="' . $row['manufacturer'] . '">' . $row['manufacturer'] . '</option>';
                    }



                    ?>
                </select>
                <select style="padding: 10px;  background:#edf2ff; border:none;" name="ram">
                    <?php
                    include 'DBconn.php';
                    $S1 = "SELECT  DISTINCT(RAM) as RAM from Laptops2";
                    $ram = mysqli_query($connection, $S1);
                    while ($row = mysqli_fetch_array($ram)) {
                        echo '<option value="' . $row['RAM'] . '">' . $row['RAM'] . '</option>';
                    }



                    ?>
                </select>

                <select style="padding: 10px;  background:#edf2ff; border:none;" name="cat">
                    <?php
                    include 'DBconn.php';
                    $S1 = "SELECT  DISTINCT(Category) as Category from Laptops2";
                    $ram = mysqli_query($connection, $S1);
                    while ($row = mysqli_fetch_array($ram)) {
                        echo '<option value="' . $row['Category'] . '">' . $row['Category'] . '</option>';
                    }



                    ?>
                </select>
                <select style="padding: 10px;  background:#edf2ff; border:none;" name="cpu">
                    <?php
                    include 'DBconn.php';
                    $S1 = "SELECT  DISTINCT(CPU) as CPU from Laptops2";
                    $ram = mysqli_query($connection, $S1);
                    while ($row = mysqli_fetch_array($ram)) {
                        echo '<option value="' . $row['CPU'] . '">' . $row['CPU'] . '</option>';
                    }



                    ?>
                </select>

                <select style="padding: 10px;  background:#edf2ff; border:none;" name="storage">
                    <?php
                    include 'DBconn.php';
                    $S1 = "SELECT  DISTINCT(Storage) as Storage from Laptops2";
                    $ram = mysqli_query($connection, $S1);
                    while ($row = mysqli_fetch_array($ram)) {
                        echo '<option value="' . $row['Storage'] . '">' . $row['Storage'] . '</option>';
                    }


                    ?>
                </select>
                <input type="text" required name="price">
                <input type="submit" name="sub">




            </form> -->

        <!-- <form action="shop.php" method="post">
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>Manufacturer</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Manufacturer) as Manufacturer from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Manufacturer'] . '">' . $row['Manufacturer'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>RAM</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(RAM) as RAM from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['RAM'] . '">' . $row['RAM'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>Category</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Category) as Category from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Category'] . '">' . $row['Category'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>CPU</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(CPU) as CPU from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['CPU'] . '">' . $row['CPU'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>Storage</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Storage) as Storage from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Storage'] . '">' . $row['Storage'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="nav-link text-center" style="border: 1px solid black; color: #D19C97;">
                            <input type="range" class="w-100" id="price-filter" name="price-filter" min="0" max="3000" value="1500">
                            <span id="price-value">$1500</span>
                    </div>
                    </form> -->











        <!-- </div> -->
        <!-- <div class="col-lg-3 d-none d-lg-block">

            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Laptops</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 318px">


                    <form action="Laptop.php" method="post">
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" name="man" id="mySelect">
                                <option selected value="HP" disabled>Manufacturer</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Manufacturer) as Manufacturer from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Manufacturer'] . '">' . $row['Manufacturer'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" name="ram" data-toggle="dropdown" id="mySelect">
                                <option selected value="4" disabled>RAM</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(RAM) as RAM from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['RAM'] . '">' . $row['RAM'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" name="cat" id="mySelect">
                                <option selected value="Gaming" disabled>Category</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Category) as Category from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Category'] . '">' . $row['Category'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" name="cpu" id="mySelect">
                                <option selected value="Intel Core i7" disabled>CPU</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(CPU) as CPU from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['CPU'] . '">' . $row['CPU'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" data-toggle="dropdown" name="storage" id="mySelect">
                                <option selected value="512GB SSD" disabled>Storage</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Storage) as Storage from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Storage'] . '">' . $row['Storage'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="nav-link text-center" style="border: 1px solid black; color: #D19C97;">
                            <input type="range" class="w-100" id="price-filter" name="price" min="0" max="3000" value="1500">
                            <span id="price-value">$1500</span>
                        </div>

                        <div class="nav-item dropdown d-flex" style="border: 1px solid black; color: #D19C97;">
                            <input type="submit" name="sub">

                        </div>

                    </form>
                   
                </div>

            </nav>
        </div> -->

        <!-- Shop Sidebar End -->

        <div class="col-lg-3 d-none d-lg-block">

            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" id="lap" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Laptops</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 300px">


                    <form action="Laptop.php" method="post">
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" name="man" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>Manufacturer</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Manufacturer) as Manufacturer from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Manufacturer'] . '">' . $row['Manufacturer'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" name="ram" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>RAM</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(RAM) as RAM from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['RAM'] . '">' . $row['RAM'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" name="cat" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>Category</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Category) as Category from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Category'] . '">' . $row['Category'] . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" name="cpu" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>CPU</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(CPU) as CPU from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['CPU'] . '">' . $row['CPU'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nav-item dropdown d-flex">
                            <select class="nav-link w-100 dropdown-select" name="storage" data-toggle="dropdown" id="mySelect">
                                <option selected disabled>Storage</option>
                                <?php
                                include 'DBconn.php';
                                $S1 = "SELECT  DISTINCT(Storage) as Storage from Laptops2";
                                $ram = mysqli_query($connection, $S1);
                                while ($row = mysqli_fetch_array($ram)) {
                                    echo '<option value="' . $row['Storage'] . '">' . $row['Storage'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nav-link text-center" style="border: 1px solid black; color:#D19C97;">
                            <span id="price-value">$1500</span>
                            <input style="border-radius:2px; color:#D19C97;" type="range" class="w-75" id="price-filter" name="price" min="200" max="3000" value="1500">

                        </div>
                        <div style="text-align: center;" id="sub">
                            <button type="submit" name="sub" class="btn btn-primary btn-lg w-100">Submit</button>
                        </div>
                </div>



                </form>
            </nav>


        </div>
























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
                include "MyKNN.php";
                $sql = "select * from laptops2";
                $res = mysqli_query($connection, $sql);
                $sql2 = "select min(Price) as minprice from laptops";
                $resminprice = mysqli_query($connection, $sql2);
                $MinPrice = $row = mysqli_fetch_array($resminprice)["minprice"];
                //print_r($row=mysqli_fetch_array($res));


                while ($row = mysqli_fetch_array($res)) {
                    $sample[] = [$row['manufacturer'], $row['price'], $row['category'], $row["ram"], $row['cpu'], $row['storage'], $row['id']];
                }

                //print_r($sample[0][1]);
                if (isset($_POST['sub']) and isset($_POST['cat']) and isset($_POST['man']) and isset($_POST['ram'])  and isset($_POST['cpu']) and isset($_POST['price']) and isset($_POST['storage'])) {
                    $man = $_POST['man'];
                    $cat = $_POST['cat'];
                    $ram = $_POST['ram'];
                    $cpu = $_POST['cpu'];
                    $storage = $_POST['storage'];
                    $price = $_POST['price'];
                    $s = ForMin($sample, [$man, $price, $cat, $ram, $cpu, $storage], $MinPrice);
                } else {
                    $s = ForMin($sample, ["HP", 1000, "Gaming", "16GB", "Intel Core i5", "512GB SSD"], $MinPrice);
                }
                //print_r($s);
                
                for ($i = 0; $i < 5; $i++) {
                    $a = $s[$i][1];
                    
                    //print_r($s[$i]);
                    $sql = "select * from laptops2 where ID='$a'";
                    $res = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($res);
                    echo ' <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/asus.png" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">' . $row['manufacturer'] . '</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>$' . $row['price'] . '</h6><h6 class="text-muted ml-2">' . $row['ram']  .'GB   ' . $row['category'] . '</h6>
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
<?php include 'footer1.php' ?>