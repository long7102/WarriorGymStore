<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
    body {

        overflow-x: hidden;
        background-image: url(../Assets/Gym-background.jpg);
        background-repeat: no-repeat;
        background-size: 100%;
        box-shadow: 0px 5px 5px 5px;
    }
    </style>
</head>

<body>
    <div class="container-fluid mt-2 mb-2 ">

        <div class="row mt-5 algin-items-center justify-content-center ">
            <div class="col-lg-12 col-xl-6 border border-success border border-2 shadow-lg p-3 mb-5 bg-body rounded">
                <div>
                    <h2 class="text-center text-dark">Đăng nhập</h2>
                </div>
                <form action="" method="post">
                    <!--username-->
                    <div class="form-outline mb-4 ">
                        <label for="user-username" class="form-label">Tên đăng nhập</label>
                        <input type="search" id="user_username" class="form-control" placeholder="Nhập tên đăng nhập"
                            autocomplete="off" required="required" name="user_username" />
                    </div>
                    <!--password-->
                    <div class="form-outline mb-4">
                        <label for="user-password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Nhập mật khẩu"
                            required="required" name="user_password" />
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Đăng nhập" class="bg-success py-2 px-2 border-0 rounded text-light"
                            name="user_login" />
                        <p class="medium fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản, <a
                                href="./user_registration.php">đăng ký ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
if(isset($_POST['user_login'])){
    global $con;
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    //số sản phẩm trong giỏ hàng
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        if(password_verify($user_password,$row_data['user_password'])){
            $_SESSION['username']=$user_username;
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('./payment.php','_self')</script>";
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