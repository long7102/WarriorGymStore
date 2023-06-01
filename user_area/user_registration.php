<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
    body {
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <div class="container-fluid mt-5 mb-2 my-3 ">
        <div class="row d-flex algin-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 border border-success border border-2 shadow-lg p-3 mb-5 bg-body rounded">
                <h2 class="text-center">Đăng ký tài khoản mới</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--username-->
                    <div class="form-outline mb-4 ">
                        <label for="user-username" class="form-label">Tên đăng nhập</label>
                        <input type="search" id="user_username" class="form-control" placeholder="Nhập tên đăng nhập"
                            autocomplete="off" required="required" name="user_username" />
                    </div>
                    <!--mail-->
                    <div class="form-outline mb-4">
                        <label for="user-email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Nhập email"
                            autocomplete="off" required="required" name="user_email" />
                    </div>
                    <!--image-->
                    <div class="form-outline mb-4">
                        <label for="user-image" class="form-label">Ảnh đại diện</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image" />
                    </div>
                    <!--password-->
                    <div class="form-outline mb-4">
                        <label for="user-password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Nhập mật khẩu"
                            required="required" name="user_password" />
                    </div>
                    <!--password-->
                    <div class="form-outline mb-4">
                        <label for="conf_user-password" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" id="conf_user_password" class="form-control"
                            placeholder="Nhập lại mật khẩu" required="required" name="conf_user_password" />
                    </div>
                    <!--address-->
                    <div class="form-outline mb-4">
                        <label for="user-address" class="form-label">Địa chỉ</label>
                        <input type="search" id="user_address" class="form-control" placeholder="Nhập địa chỉ"
                            required="required" name="user_address" />
                    </div>
                    <!--phone-->
                    <div class="form-outline mb-4">
                        <label for="user-contact" class="form-label">Số điện thoại</label>
                        <input type="search" id="user_contact" class="form-control" placeholder="Nhập địa chỉ"
                            required="required" name="user_contact" />
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Đăng ký" class="bg-success py-2 px-2 border-0 rounded text-light"
                            name="user_register" />
                        <p class="medium fw-bold mt-2 pt-1 mb-0">Đã có tài khoản, <a href="./user_login.php">đăng nhập
                                ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    //Điều kiện

    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
            echo"<script>alert('Tên người dùng hoặc email đã tồn tại')</script>";
    }
    else if($user_password<6){
        echo"<script>alert('Mật khẩu nên có từ 6 kí tự trở lên')</script>";
    }
    else if($user_password!=$conf_user_password){
        echo"<script>alert('Xác nhận mật khẩu không trùng khớp')</script>";
    }
    
    else
        {
    //thêm vào database
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (username,user_email,user_password,
    user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image'
    ,'$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo"<script>alert('Đăng ký tài khoản thành công')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }
    else{
        die(mysqli_error($con));
    }
}
//select cart
$user_ip=getIPAddress();
$select_cart_items="Select * from `cart_details` where ip_address='$user_ip";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count_cart=mysqli_num_rows($result_cart);
if($rows_count_cart>0){
    $_SESSION['username']=$user_username;
    echo"<script>alert('Bạn có sản phẩm trong giỏ hàng')</script>";
    echo"<script>window.open('checkout.php','_self')</script>";
}
else{
    echo"<script>window.open('../index.php','_self')</script>";
}
}
?>