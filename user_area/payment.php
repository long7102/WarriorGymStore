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
    <link rel="stylesheet" href="./CSS//style.css">
    <title>Thanh toán sản phẩm</title>
    <script src="./Js/Header.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
    body {
        overflow-x: hidden;
    }

    #item {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <?php
  $user_ip=getIPAddress();
  $get_user="Select * from `user_table` where user_ip='$user_ip'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];

?>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light"
        style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif;">
        <a href="../index.php"><img src="../Image/logo_200x200-1.png"
                style="height: 100px; width: 100px;margin-right: 15px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="flex-basis: 70%">
                <li class="nav-item active">
                    <a class="nav-link" href="..//index.php" style="color:bisque; ">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a style="color:bisque" class="nav-link dropdown-toggle" href="..//display_all.php"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" style="color:bisque">Action</a>
                        <a class="dropdown-item" href="#" style="color:bisque">Another action</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:bisque">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:bisque">Liên hệ</a>
                </li>

            </ul>
            <form action="search_product.php" method="get" class="form-inline my-1 my-lg-0 d-flex"
                style="margin-right: 45px;flex-basis: 30%">
                <input type="text" name="search-data" style="margin-right: 20px" class="form-control me-2"
                    placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                <input name="search-data-product" class="btn btn-outline-success my-3 my-sm-0" type="submit"
                    value="Tìm kiếm">
            </form>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <ul class="navbar-nav me-auto">
            <?php 
      if(!isset($_SESSION['username'])){
        echo"
        <li class='nav-item'>
        <a class='nav-link'>Chào mừng</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='.user_login.php'>Đăng nhập</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='.user_registration.php' style='color:bisque;'>Chưa có tài khoản, đăng ký ngay</a>
        </li>
        ";
      }
      else{
        echo"
        <li class='nav-item'>
        <a class='nav-link'>Xin chào ".$_SESSION['username']."</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='./user_logout.php'>Đăng xuất</a>
        </li>
        ";
      }
      ?>
        </ul>
    </nav>
    <div class="bg-dark" style="margin-bottom: 20px">
        <h3 class="text-light text-center">Website GymWarrior</h3>
        <h3 class="text-light text-center">Nơi bán sản phẩm tập gym tốt nhất</h3>
    </div>

    <div class="container">
        <h2 class="text-center text-info">Lựa chọn phương thức thanh toán</h2>
        <div class="row d-flex justify-content-center algin-items-center">
            <div class="col-md-6" id="item">
                <a href="https://www.paypal.com/vn/home?locale.x=vi_VN" target="_blank">
                    <img src="../Assets/payment.jpg" style="width:500px; " alt="">
                    <h2 class="text-center">Thanh toán online</h2>
                </a>
            </div>
            <div class="col-md-6 " id="item">
                <a href="order.php?user_id=<?php echo $user_id ?>">
                    <img src="../Assets/Lai-Suat-Ngan-Hang-C-01.jpg" style="width:500px; height:377px;" alt="">
                    <h2 class="text-center">Thanh toán trực tiếp</h2>
                </a>
            </div>
        </div>
    </div>
</body>



<!--footer -->
<div style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif; color: white"
    class="bg-success p-3 text-center">
    <h3 style="text-align:center">@BML 2023</h3>
    <!--link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</div>

</html>