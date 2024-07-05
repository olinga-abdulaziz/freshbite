<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshbite | Add product</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <div class="container">
        <div class="box1">
            <div class="box-top">
                <h2 class="dashboardTXT">Dashboard</h2>
            </div>
            <div class="box-content">
                <ul class="ul1">
                    <li><a href="dashboard.php">Point of sale</a></li>
                    <li><a href="products.php">Poducts</a></li>
                    <li><a href="addproduct.php">Add product</a></li>
                    <li><a href="sales.php">Sales</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="box2">
        <div class="nav">
            <div><h2>FRESHBITE MEAT PRODUCTS MANAGEMENT SYSTEM</h2></div>
            <div><small>welcome : <?php echo $_SESSION['username']  ?></div>
        </div>
        <div class="box-main">
            <div class="pos-main">
                <div class="products-list">
                    <!-- <h3 class="newSaleTXT">START NEW SALE</h3> -->
                    <!-- <button class="btnNewsale" id="btnNewSale" onclick="enablePos()">New Sale</button> -->
                </div>
            </div>
            <div class="posBox-container"  id="posContainer">
                <div class="posBox">
                    <div class="top-txt">
                    <h2>Add Product</h2>
                    </div>
                    <form class="pos-form" action="addproduct.php" method="POST">
                        <div class="sale-form">
                            <div class="input-div">
                                <label for="" class="input-label">Select Product</label> <br>
                                <input type="text" name="product" placeholder="Enter product name" class="input">
                            </div>
                            <div class="input-div">
                               <label for="" class="input-label">Size /KGS</label> <br>
                                <input type="text" name="size" placeholder="Enter size" class="input">
                            </div>
                            <div class="input-div">
                               <label for="" class="input-label">Quantity</label> <br>
                                <input type="number" name="quantity" placeholder="Enter quantity" class="input">
                            </div>
                            <div class="input-div">
                               <label for="" class="input-label">Price</label> <br>
                                <input type="number" name="price" placeholder="Enter price" class="input">
                            </div>
                            <div class="input-div">
                                <button class="btnTocart" name="btnAddproduct">Add product</button>
                            </div>
                        </div>
                        

                    </form>
                </div>
                
            </div>
           <div class="checkoutDiv">
           </div>
        </div>
        </div>
    </div>
    <?php
    if (isset($_POST['btnAddproduct'])) {
        $conn=mysqli_connect("localhost","root","","freshbite");
        $product=$_POST['product'];
        $size=$_POST['size'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];

        $sql_insert="INSERT INTO `products`(`id`, `product`, `quantity`, `price`, `size`) VALUES (null,'$product','$quantity','$price','$size')";
        $exec=mysqli_query($conn,$sql_insert);

        if ($exec) {
            echo '
            
            <section>
            <div class="darkJacket"></div>
            <div class="pop-container">
                <div class="pop-up">
                    <center>
                        <div><strong>Success</strong></div>
                        <br>
                        <div>
                            <small>Product added successfully !</small>
                        </div>
                        <div><a href="addproduct.php"><button class="btnOK">Ok</button></a></div>
                    </center>
                </div>
            </div>
        </section>
            ';
        }else{
            echo "sql error";
        }
    }


    ?>
 
</body>
</html>
<script src="../js/app.js"></script>