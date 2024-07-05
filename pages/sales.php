<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshbite | Sales</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
        .posBox-container{
            width: 100%;
        }
        .top-txt{
            display: flex;
            justify-content: space-between;
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
           
            <div class="posBox-container"  id="posContainer">
                <div class="posBox">
                    <div class="top-txt">
                    <h2>SALES </h2>
                    <a href="salesreport.php"><button>generate report</button></a>
                    </div>
                </div>
                <div class="table-div">
                <table class="tableSales">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>PRODUCT</th>
                            <th>QUANTITY</th>
                            <th>METHOD</th>
                            <th>AMOUNT</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn=mysqli_connect("localhost","root","","freshbite");
                            $sql_get="SELECT * FROM `sales` WHERE 1";
                            $exec_get=mysqli_query($conn,$sql_get);
                            $count=mysqli_num_rows($exec_get);
                        
                            if ($count==0) {
                              echo "no data";
                            }else{
                              while ($row=mysqli_fetch_array($exec_get)) {
                                $product=$row['product'];
                                $size=$row['size'];
                                $quantity=$row['quantity'];
                                $amout=$row['price'];
                                $date=$row['date'];
                                $id=$row['id'];
                                $method=$row['method'];
                              
                        ?>
                        <tr>
                            <td><?php echo $date ?></td>
                            <td><?php echo $product ?></td>
                            <td><?php echo $quantity ?></td>
                            <td>KES <?php echo $amout ?></td>
                            <td> <?php echo $method ?></td>
                            <td>
                                <form action="editsales.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="hidden" name="date" value="<?php echo $date ?>">
                                    <input type="hidden" name="size" value="<?php echo $size ?>">
                                    <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                    <input type="hidden" name="price" value="<?php echo $amout ?>">
                                    <input type="hidden" name="product" value="<?php echo $product ?>">
                                    <button class="btn btnEdit" name="btnEdit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <button class="btn btnDelete" name="btnDelete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            </div>
           <div class="checkoutDiv">
               
           </div>
        </div>
        </div>
    </div>
    <?php
    if (isset($_POST['btnDelete'])) {
        $conn=mysqli_connect("localhost","root","","freshbite");
        $product=$_POST['product'];
        $size=$_POST['size'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $id=$_POST['id'];

        $sql_insert="DELETE FROM `sales` WHERE id='$id'";
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
                            <small>Sales Deleted !</small>
                        </div>
                        <div><a href="sales.php"><button class="btnOK">Ok</button></a></div>
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