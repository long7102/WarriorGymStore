<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $get_categories="Select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    $update_query="Update `categories` set category_title='$cat_title' where category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo"<script>alert('Cập nhật danh mục thành công')</script>";
        echo"<script>window.open('./index.php','_self')</script>";
    }
}
?>
<div class="container mt-3">
<h2 class="text-center" style="overflow-y: hidden;">
    Sửa danh mục sản phẩm
</h2>
<form action="" method="post" class="text-center mb-2">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="category_title" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="category_title" value="<?php  echo $category_title?>" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <input type="submit" class="bg-success border-0 p-2 my-2 text-light rounded text-center" name="edit_cat" value="Sửa danh mục">
</form>
</div>