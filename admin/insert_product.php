<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'Còn hàng';
    //image name
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    //image tmpname
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    //kiểm tra rỗng
    if (
        $product_title == '' or $description == '' or $product_keywords == '' or
        $product_brands == '' or $product_price == '' or $product_image1 == '' or
        $product_image2 == '' or $product_category == '') {
        echo "<script>alert('Xin vui lòng điền đầy đủ thông tin')</script>";
        die();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        //Thêm
        $insert_products = "insert into `products` (product_title,product_description
        ,product_keywords,category_id,brand_id,product_image1,product_image2
        ,product_image3,product_price,date,status) values ('$product_title',
        '$description','$product_keywords','$product_category','$product_brands',
        '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Thêm mới sản phẩm thành công')</script>";
            $product_title == '';
            $description == '';
            $product_keywords == '';
            $product_brands == '';
            $product_price == '';
            $product_image1 == '';
            $product_image2 == '';
            $product_category == '';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm vào hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS//style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center" style="overflow-y: hidden;">Thêm sản phẩm</h1>
    </div>
    <!---form--->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- thêm sản phẩm -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product-title" class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_title" id="product-title" class="form-control" autocomplete="off"
                required="required">
        </div>
        <!-- mô tả -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Mô tả</label>
            <input type="text" name="description" id="description" class="form-control" autocomplete="off"
                required="required">
        </div>
        <!-- từ khóa -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Từ khóa tìm kiếm</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" autocomplete="off"
                required="required">
        </div>
        <!--danh mục -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-label">Danh mục sản phẩm</label>
            <select name="product_category" id="" class="form-select">
                <option value="">Chọn danh mục</option>
                <?php
                $select_query = "SELECT * from `categories`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>
        <!--thương hiệu-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_brands" class="form-label">Thương hiệu sản phẩm</label>
            <select name="product_brands" id="" class="form-select">
                <option value="">Chọn thương hiệu</option>
                <?php
                $select_query = "SELECT * from `brands`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
        <!-- hình ảnh sản phẩm -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Hình ảnh sản phẩm 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off"
                required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Hình ảnh sản phẩm 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off"
                required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Hình ảnh sản phẩm 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off"
                required="required">
        </div>
        <!--Giá tiền-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Giá</label>
            <input type="text" name="product_price" id="product_price" class="form-control" autocomplete="off"
                required="required">
        </div>
        <!--Thêm sản phẩm-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" id="product_price" class="btn btn-success mb-5 px-5"
                required="required" value="Thêm sản phẩm">
        </div>

    </form>
</body>

</html>