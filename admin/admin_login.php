<?php 
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../CSS//style.css">
    <style>
        body 
        {
            overflow:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-3" style="overflow-y: hidden">Đăng nhập quyền admin</h2>
            <div class="row d-flex justtify-content-center algin-items-center shadow-lg">
                <div class="col-lg-6 col-xl-5">
                    <img src="../Assets/mobile-login-concept-illustration_114360-83.jpg" alt="Admin Image" class="img-fluid">
                </div>
                <div class="col-lg-6 col-xl-5 mt-5">
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required="required">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required="required">
                        </div>
                        <div>
                            <input type="submit" class="bg-success py-2 px-3 border-0 rounded text-light" name="admin_login" value="Đăng nhập">
                            <p class="small fw-bold mt-2 pt-1">Chưa có tài khoản <a href="admin_registration.php" class="link-danger"> đăng ký ngay</a></p>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>
<?php
if(isset($_POST['admin_login'])){
    global $con;
    $admin_name=$_POST['username'];
    $admin_password=$_POST['password'];
    $select_query="Select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
        if(password_verify($admin_password,$row_data['admin_password'])){
            $_SESSION['username']=$admin_name;
            if($row_count==1){
                $_SESSION['username']=$admin_name;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$admin_name;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Thông tin đăng nhập không hợp lệ')</script>";
        }
    }
    else{
        echo "<script>alert('Thông tin đăng nhập không hợp lệ')</script>";
    }
}
?>
</html>