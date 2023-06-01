<?php
include('../includes/connect.php');
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    
    //danh mục
    $select_category="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    //thương hiệu
    $select_brand="Select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
}
?>

    <div class="container mt-3">
        <h2 class="text-center" style="overflow-y: hidden;">Chỉnh sửa thông tin sản phẩm</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control " value="<?php echo $product_title ?>" name="product_title" id="product_title" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">Mô tả</label>
                <input type="text" class="form-control" value="<?php echo $product_description ?>" name="product_desc" id="product_desc" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Từ khoá</label>
                <input type="text" class="form-control" value="<?php echo $product_keywords ?>" name="product_keywords" id="product_keywords" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Danh mục sản phẩm</label>
                <select class="form-select" name="product_category">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                    <?php 
                    $select_category_all="Select * from `categories`";
                    $result_category_all=mysqli_query($con,$select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>      
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Thương hiệu</label>
                <select class="form-select" name="product_brands">
                    <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                    <?php 
                    $select_brand_all="Select * from `brands`";
                    $result_brand_all=mysqli_query($con,$select_brand_all);
                    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_brand_all['brand_title'];
                    $brand_id=$row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>

                </select>      
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Hình ảnh 1 </label>
                <div class="d-flex">
                <input type="file" class="form-control" name="product_image1" id="product_image1" required="required">
                <img src="../product_images/<?php echo $product_image1?>" alt="Hình ảnh 1"  style="width: 30%">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Hình ảnh 2 </label>
                <div class="d-flex">
                <input type="file" class="form-control" name="product_image2" id="product_image2" required="required">
                <img src="../product_images/<?php echo $product_image2?>" alt="Hình ảnh 2"  style="width: 30%">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Hình ảnh 3 </label>
                <div class="d-flex">
                <input type="file" class="form-control" name="product_image3" id="product_image3" required="required">
                <img src="../product_images/<?php echo $product_image3?>" alt="Hình ảnh 3"  style="width: 30%">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Giá</label>
                <input type="text" class="form-control" value="<?php echo $product_price ?>" name="product_price" id="product_price" required="required">
            </div>
            <div class="text-center m-auto">
             <input type="submit" name="edit_product" value="Cập nhật thông tin" class="btn btn-success px-3 mb-3 rounded">
            </div>
        </form>
    </div>
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //kiểm tra rỗng
    if($product_title=='' or $product_desc=='' or $product_keywords=='' or
    $product_category=='' or $product_brands=='' or $product_image1=='' or
    $product_image2=='' or $product_image3=='' or $product_price==''){
        echo"<script>alert('Xin vui lòng điển đầy đủ thông tin')</script>";
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        //cập nhật
        $update_product="Update `products` set product_title='$product_title',product_description='$product_desc', 
        product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brands', product_image1='$product_image1',
        product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Sản phẩm đã được cập nhật thành công')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
}
?>
