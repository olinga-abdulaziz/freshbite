<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshbite | Dashboard</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box1">

            <div class="box-top">
                <h2 class="dashboardTXT">Dashboard</h2>
            </div>
            <div class="box-content">
                <ul class="ul1">
                    <a href="dashboard.php"><li>Point of sale</li></a>
                    <li><a href="products.php">Poducts</a></li>
                    <li><a href="addproduct.php">Add product</a></li>
                    <li><a href="sales.php">Sales</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="box2">
        <div class="nav">
            <div><h2>FRESHBITE  PRODUCTS MANAGEMENT SYSTEM</h2></div>
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
                    <h2>POS</h2>
                    </div>
                    <form class="pos-form" action="../handlers/addpos.php" method="POST">
                        <div class="sale-form">
                            <div class="input-div">
                                <label for="" class="input-label">Select Product</label> <br>

                                <select name="product" id="product" class="prod-select">
                                    <?php
                                         $conn=mysqli_connect("localhost","root","","freshbite");
                                         $sql_get="SELECT * FROM `products` WHERE 1";
                                         $exec_get=mysqli_query($conn,$sql_get);
                                         $count=mysqli_num_rows($exec_get);
                                     
                                         if ($count==0) {
                                           
                                         }else{
                                           while ($row=mysqli_fetch_array($exec_get)) {
                                             $product=$row['product'];
                                             $size=$row['size'];
                                             $quantity=$row['quantity'];
                                             $amout=$row['amount'];
                                    ?>
                                        <option value="<?php echo $product ?>"><?php echo $product ?></option>
                                    <?php }}?>
                                        <!-- <option value="Broilers Beef">Broilers Beef</option>
                                        <option value="Kienyeji">Kienyeji</option>
                                        <option value="Egg">Egg</option> -->
                                </select>
                            </div>
                            <!-- <div class="input-div">
                               <label for="" class="input-label">Size /KGS</label> <br>
                                <input type="text" name="size" class="input">
                            </div> -->
                            <div class="input-div">
                               <label for="" class="input-label">Quantity/KGS</label> <br>
                                <input type="number" name="quantity" class="input">
                            </div>
                        </div>
                        <div class="total-form">
                            <div>
                            <?php
                                $conn=mysqli_connect("localhost","root","","freshbite");
                                $sql_get="SELECT *, SUM(amount) AS totalprice FROM `pos`  WHERE  1 ";
                                $exec=mysqli_query($conn,$sql_get);
                                $fetch=mysqli_fetch_array($exec);
                                ?>
                                <h1><?php echo $fetch['totalprice'] ?>.00 Ksh.</h1>
                                <strong>Total PRICE</strong>
                                <div>
                                    <button class="btnTocart" name="btnAddCart">Add to cart</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="table-div">
                <table class="tableSales">
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>QUANTITY/KGS</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn=mysqli_connect("localhost","root","","freshbite");
                            $sql_get="SELECT * FROM `pos` WHERE 1";
                            $exec_get=mysqli_query($conn,$sql_get);
                            $count=mysqli_num_rows($exec_get);
                        
                            if ($count==0) {
                              
                            }else{
                              while ($row=mysqli_fetch_array($exec_get)) {
                                $product=$row['product'];
                                $size=$row['size'];
                                $quantity=$row['quantity'];
                                $amout=$row['amount'];

                              
                        ?>
                        <tr>
                            <td><?php echo $product ?></td>
                            <td><?php echo $quantity ?></td>
                            <td>KES <?php echo $amout ?></td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            </div>
           <div class="checkoutDiv">
                     <?php
                            $conn=mysqli_connect("localhost","root","","freshbite");
                            $sql_get="SELECT * FROM `pos` WHERE 1";
                            $exec_get=mysqli_query($conn,$sql_get);
                            $count=mysqli_num_rows($exec_get);

                           
                            if ($count==0) {
                              
                            }else{
                                $sql_get1="SELECT *, SUM(amount) AS totalprice FROM `pos`  WHERE  1 ";
                                $exec=mysqli_query($conn,$sql_get1);
                                $fetch=mysqli_fetch_array($exec);

                                echo '
                                 <form action="receipt.php" method="post">
                                    <label for="" class="input-label">Payment Method</label> <br>
                                    <select name="" id="" class="input">
                                        <option value="">CASH</option>
                                        <option value="">MPESA</option>
                                        <option value="">CREDIT</option>
                                    </select>
                                    <br><br>
                                     
                                    <label for="" class="input-label">Amount KES</label> <br>
                                    <input type="number" name="totalamount" class="input">
                                    <button class="btnCheckOUt" name="btnCheckout" id="btnCheckout">Check Out</button>
                                </form>
                                
                                ';
                                
                            }
                              
                        ?>
               
           </div>
        </div>
        </div>
    </div>
    
</body>
</html>
<script src="../js/app.js"></script>
