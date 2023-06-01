<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" coXntent="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../CSS//style.css">
    <style>
    body {
        overflow: hidden;
    }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-3" style="overflow-y: hidden">Thêm tài khoản admin</h2>
        <div class="row d-flex justtify-content-center algin-items-center shadow-lg">
            <div class="col-lg-6 col-xl-5">
                <img src="../Assets/mobile-login-concept-illustration_114360-83.jpg" alt="Admin Image"
                    class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="admin_name"
                            placeholder="Tên đăng nhập" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="admin_email" placeholder="Email"
                            required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="admin_password"
                            placeholder="Mật khẩu" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Xác nhận mật khẩu" required="required">
                    </div>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0 rounded text-light"
                            name="admin_registration" value="Đăng ký">
                        <p class="small fw-bold mt-2 pt-1">Đã có tài khoản <a href="admin_login.php"
                                class="link-danger"> đăng nhập ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php 
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);//hash mật khẩu
    $conf_admin_password=$_POST['confirm_password'];
    //Điều kiện

    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
            echo"<script>alert('Tên người dùng hoặc email đã tồn tại')</script>";
    }
    else if($admin_password<6){
        echo"<script>alert('Mật khẩu nên có từ 6 kí tự trở lên')</script>";
    }
    else if($admin_password!=$conf_admin_password){
        echo"<script>alert('Xác nhận mật khẩu không trùng khớp')</script>";
    }
    
    else
        {
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo"<script>alert('Thêm tài khoản admin thành công')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    else{
        die(mysqli_error($con));
    }
}
}
?>

</html>