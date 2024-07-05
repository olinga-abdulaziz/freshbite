<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshbite | Receipt</title>
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
                    <h2>Receipt</h2>
                    </div>
                    <table class="tableSales receiptTable">
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>QUANTITY</th>
                            <th>SIZE</th>
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
                              echo "no data";
                            }else{
                              while ($row=mysqli_fetch_array($exec_get)) {
                                $product=$row['product'];
                                $size=$row['size'];
                                $quantity=$row['quantity'];
                                $amout=$row['amount'];
                                $date=date('d/m/y');
                              
                        ?>
                        <tr>
                            <td><?php echo $product ?></td>
                            <td><?php echo $size ?></td>
                            <td><?php echo $quantity ?></td>
                            <td>KES <?php echo $amout ?></td>
                        </tr>
                        <?php }} ?>
                        
                    </tbody>
                    
                </table>
                    <div class="totalDiv">
                    <?php
                 $conn=mysqli_connect("localhost","root","","freshbite");
                 $sql_get="SELECT *, SUM(amount) AS totalprice FROM `pos`  WHERE  1 ";
                 $exec=mysqli_query($conn,$sql_get);
                 $fetch=mysqli_fetch_array($exec);
                ?>
                        <h2>ToTAL KES <?php echo $fetch['totalprice'] ?> </h2>
                    </div>
                </div>
            </div>
           <div class="checkoutDiv">
            <form action="receipt.php" method="post">
                <button class="btnCheckOUt" name="btnPrint" id="btnCheckout">Print</button>
            </form>
           </div>
        </div>
        </div>
    </div>
   <?php
   if (isset($_POST['btnPrint'])) {
    $conn=mysqli_connect("localhost","root","","freshbite");
    $sql_del="DELETE FROM `pos` WHERE 1";
    $exec_del=mysqli_query($conn,$sql_del);

    if ($exec_del) {
        echo '
             
        <section>
        <div class="darkJacket"></div>
        <div class="pop-container">
            <div class="pop-up">
                <center>
                    <div><strong>Success</strong></div>
                    <br>
                    <div>
                        <small>Checked out successfully !</small>
                    </div>
                    <div><a href="dashboard.php"><button class="btnOK">Ok</button></a></div>
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