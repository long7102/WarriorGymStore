<?php
include('../includes/connect.php');
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_products="Delete from `products` where product_id=$delete_id";
    $result_product=mysqli_query($con,$delete_products);
    if($result_product){
        echo "<script>alert('Sản phẩm đã xoá khỏi hệ thống thành công')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>