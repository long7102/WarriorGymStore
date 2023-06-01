<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS//style.css">
  <title>Warrior Gym</title>
  <script src="./Js/Header.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    body {
    overflow-x: hidden;
  }

  .card{
    z-index: 5;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    overflow: hidden;

  }
  .card img {
    transition-duration: 0.5s;
    /* Safari & Google Chrome */
    -webkit-transition-duration: 0.5s;
  }

  .card img:hover {
    transform: scale(1.25);
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -o-transform: scale(1.25);
    -ms-transform: scale(1.25);
    cursor: pointer;
    opacity:0.2;
  }
  </style>
</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif;">
    <a href="index.php"><img src="./Image/logo_200x200-1.png" style="height: 100px; width: 100px;margin-right: 15px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="flex-basis: 70%">
        <li class="nav-item active">
          <a class="nav-link" href="index.php" style="color:bisque; ">Trang chủ</a>
        </li>
        <li class="nav-item dropdown">
          <a style="color:bisque" class="nav-link dropdown-toggle" href="display_all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <li class="nav-item">
          <a class="nav-link" href="cart.php" style="color:bisque"><img src="./Assets/bag.png"><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php" style="color:bisque">Tổng: <?php total_cart_price();?></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" style="display: flex; margin-right: 45px;flex-basis: 30%" action="" method="get">
        <input name="search_data" style="margin-right: 20px" class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <input name="search_data_product" type="submit" class="btn btn-outline-success my-2 my-sm-0"  value="Tìm">
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
        <a class='nav-link' href='./user_area/user_login.php'>Đăng nhập</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='./user_area/user_registration.php' style='color:bisque;'>Chưa có tài khoản, đăng ký ngay</a>
        </li>
        ";
      }
      else{
        echo"
        <li class='nav-item'>
        <a class='nav-link'>Xin chào ".$_SESSION['username']."</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='./user_area/user_logout.php'>Đăng xuất</a>
        </li>
        ";
      }
      ?>
    </ul>
  </nav>
  <div class="bg-dark">
    <h3 class="text-center text-light" style="overflow-y:hidden">Website GymWarrior</h3>
    <h3 class="text-center text-light" style="overflow-y:hidden">Nơi bán sản phẩm tập gym tốt nhất</h3>
  </div>

  <div class="row">
    <!-- thanh điều hướng -->
    <div class="col-md-2 bg-dark p-0" style="margin-top: 20px;margin-left: 20px">
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light">
            <h4 style="overflow-y:hidden">Thương hiệu</h4>
          </a>
        </li>
        <?php
        getbrands();
        ?>
      </ul>
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light">
            <h4 style="overflow-y:hidden">Danh mục sản phẩm</h4>
          </a>
        </li>
        <?php
        getcategories();
        ?>
      </ul>
    </div>
    <div class="col-md-9" >
      <!-- sản phẩm -->
      <div class="row px-1" style="margin-top: 20px">
        <!-- fetching product -->
        <?php
        search_product();
        get_unique_categories();
        get_unique_brands();
        ?>        

      </div>
    </div>
  </div>
</body>
        <!--footer -->
        <!--footer -->
<div style="background-color: rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif; color: white" class="row mt-3 p-3 text-center">
    <div class="col" style="display: collumn; margin-left: 25px; text-align:justify;">
    <h3>Thông tin liên hệ</h3>
    <p style="margin-bottom: 0;">GymWarrior cung cấp các mặt hàng thể thao chất lượng cao với giá cả phải chăng, phù hợp với mọi người</p>
    <a href="https://www.google.com/maps/dir/21.011016,105.9347387/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+%C4%90i%E1%BB%87n+L%E1%BB%B1c,+235+Ho%C3%A0ng+Qu%E1%BB%91c+Vi%E1%BB%87t,+C%E1%BB%95+Nhu%E1%BA%BF,+B%E1%BA%AFc+T%E1%BB%AB+Li%C3%AAm,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0453892,105.7882272,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3135abb158a2305d:0x5c357d21c785ea3d!2m2!1d105.7849436!2d21.046388?hl=vi-VN" style="text-decoration:none;" class="text-light"><img src="./Assets/location.png">Hoàng Quốc Việt, Cổ Nhuế, Bắc Từ Liêm, Hà Nội</a>
    <br>
    <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/phone.png">  0123456789</a>
    <br>
    <a href="https://mail.google.com/mail/u/0/?pli=1#inbox?compose=CllgCJfmrkmrHNSKFvnmsmqSkftGzzHWCzFQVthQFKQQZfHPhHFFFzSvtgRljgTvCsKDmSgZHzL" style="text-decoration:none;" class="text-light"><img src="./Assets/gmail.png">  hotboy7102@epu.gmail.com</a>
    <p style="margin-bottom: 0px;">>Sáng: 7h - 11h30</p>
    <p>>Chiều: 12h30 - 5h30</p>
  </div>
    <div class="col-3" style="display: collumn; margin-left: 25px; text-align:justify;">
      <h3>Xã hội</h3>
      <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/facebook.png" style="width: 25px; height: 25px;  margin-bottom:10px">  Facebook</a>
      <br>
      <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/instagram.png"  style="width: 25px; height: 25px; margin-bottom:10px">  Instagram</a>
      <br>
      <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/youtube.png"  style="width: 25px; height: 25px; margin-bottom:10px">  Youtube</a>
      <br>
      <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/twitter.png"  style="width: 25px; height: 25px; margin-bottom:10px">  Twitter</a>
      <br>
    </div>
    <div class="col" style="display: collumn; margin-left: 25px; text-align:justify;"> 
      <h3>Vị trí</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657325566268!2d105.78274954991844!3d21.046392992484613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1680239251495!5m2!1svi!2s" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
</html>