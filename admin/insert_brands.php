<?php 
include('../includes/connect.php'); 
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    $select_query="SELECT * from `brands` where brand_title ='$brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo"<script> alert('Thương hiệu đã tồn tại')</script>";
    }else{
    $insert_query="INSERT INTO `brands` (brand_title) values ('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script> alert('Thêm thương hiệu sản phẩm thành công')</script>";
    }}
}
?>
<h2 class="text-center" style="overflow-y: hidden;">Thêm thương hiệu sản phẩm</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
<span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
<input type="text" class="form-control" name="brand_title" placeholder="Nhập thương hiệu sản phẩm" 
aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-success border-0 p-2 my-2 text-light rounded" name="insert_brand" value= "Thêm thương hiệu">

</div>
</form>