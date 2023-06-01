<?php
if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];
    $get_brands="Select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}
if(isset($_POST['edit_brand'])){
    $brand_tit=$_POST['brand_title'];
    $update_query="Update `brands` set brand_title='$brand_tit' where brand_id=$edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo"<script>alert('Cập nhật thương hiệu thành công')</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>
<div class="container mt-3">
<h2 class="text-center" style="overflow-y: hidden;">
    Sửa thương hiệu sản phẩm
</h2>
<form action="" method="post" class="text-center mb-2">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="brand_title" class="form-label">Tên thương hiệu</label>
        <input type="text" class="form-control" name="brand_title" value="<?php echo $brand_title?>" aria-label="brands" aria-describedby="basic-addon1">
    </div>
    <input type="submit" class="bg-success border-0 p-2 my-2 text-light rounded text-center" name="edit_brand" value="Sửa thương hiệu">
</form>
</div>