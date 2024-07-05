<?php
if (isset($_POST['btnAddCart'])) {
    // $size=$_POST['size'];
    $quantity=$_POST['quantity'];
    $GLOBALS['product']="Normal Beef";
    $GLOBALS['method']="CASH";

    if (isset($_POST['product'])) {
        $prod=$_POST['product'];

        // global $category="Beef";

        switch ($prod) {
            case 'Normal Beef':
                $product="Normal Beef";
                break;
            case 'Broilers Beef':
                $product="Broilers Beef";
                break;
            case 'Kienyeji':
                $product="Kienyeji";
                break;
            case 'Egg':
                $product="Egg";
                break;
            default:
                $product="Normal Beef";
                break;
        }
    }
    if (isset($_POST['method'])) {
        $meth=$_POST['method'];


        switch ($meth) {
            case 'CASH':
                $method="CASH";
                break;
            case 'MPESA':
                $method="MPESA";
                break;
            case 'CREDIT':
                $method="CREDIT";
                break;
            default:
                $method="CASH";
                break;
        }
    }
    $conn=mysqli_connect("localhost","root","","freshbite");
    $date=date('d/m/y');
    $sql_get="SELECT * FROM `products` WHERE product='$product'";
    $exec_get=mysqli_query($conn,$sql_get);
    $count=mysqli_num_rows($exec_get);
    

    if ($count==0) {
      echo "no data";
    }else{
      while ($row=mysqli_fetch_array($exec_get)) {
          $product=$row['product'];
          $price=$row['price'];
          $amout=$quantity*$price;
          $sql_insert="INSERT INTO `pos`(`id`, `product`, `quantity`, `size`, `amount`, `date`, `method`) VALUES (null,'$product','$quantity','N/A','$amout','$date','$method')";
          $exec_insert=mysqli_query($conn,$sql_insert);
          $q_db=$row['quantity'];
          $new_quantity=$q_db-$quantity;
          $sql_update_quantity="UPDATE `products` SET `quantity`='$new_quantity' WHERE product='$product'";
          $update_q=mysqli_query($conn,$sql_update_quantity);
          if ($exec_insert) {
            $sql_insert_sales="INSERT INTO `sales`(`id`, `product`, `size`, `quantity`, `price`, `date`,`method`) VALUES (null,'$product','$size','$quantity','$amout','$date','$method')";
            $exe_sales=mysqli_query($conn,$sql_insert_sales);
            if ($exe_sales) {
                
                header('location:../pages/dashboard.php');
            }else{
                echo "sql error";
            }

          }else{
            echo "sql error";
          }
      }

}

}

?>