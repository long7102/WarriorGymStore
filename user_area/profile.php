<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style>
  body {
    overflow-x: hidden;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS//style.css">
  <title>Thông tin tài khoản</title>
  <script src="./Js/Header.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <style>
  </style>

</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif;">
    <a href="../index.php"><img src="../Image/logo_200x200-1.png" style="height: 100px; width: 100px;margin-right: 15px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="flex-basis: 70%">
        <li class="nav-item active">
          <a class="nav-link" href="../index.php" style="color:bisque; ">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a style="color:bisque" class="nav-link" href="../display_all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sản phẩm
          </a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:bisque">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:bisque">Liên hệ</a>
        </li>
        <li class="nav-item" style="font-family:monospace;">
          <a class="nav-link" href="../cart.php" style="color:bisque"><img src="../Assets/bag.png"><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:bisque">Tổng: <?php total_cart_price(); ?> VND</a>
        </li>

      </ul>
      <form action="../search_product.php" method="get" class="form-inline my-1 my-lg-0 d-flex" style="margin-right: 45px;flex-basis: 30%">
        <input type="text" name="search-data" style="margin-right: 15px" class="form-control me-2" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
        <input name="search-data-product" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Tìm"><?php search_product(); ?>
      </form>
    </div>
  </nav>
  <!--gọi hàm cart-->
  <?php
  cart();
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <ul class="navbar-nav me-auto">
      <?php
      if (!isset($_SESSION['username'])) {
        echo "
        <li class='nav-item'>
        <a class='nav-link'>Chào mừng</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='./user_login.php'>Đăng nhập</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='./user_registration.php' style='color:bisque;'>Chưa có tài khoản, đăng ký ngay</a>
        </li>
        ";
      } else {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='./profile.php'>Chào mừng " . $_SESSION['username'] . "</a>
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
    <h3 class="text-light text-center" style="overflow-y:hidden">Welcome <?php echo $_SESSION['username'] ?></h3>
    <h3 class="text-light text-center" style="overflow-y:hidden">Chúc bạn mua hàng vui vẻ</h3>
  </div>

  <!-- fourth child -->
  <div class="row d-flex mb-3">
    <div class="col-md-2 p-0" style=" margin-right: 0px">
      <ul class="p-0 navbar-nav bg-success text-center" style="margin-left:25px; font-family:monospace;">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light">
            <h4>Thông tin cá nhân</h4>
          </a>
        </li>
        <!-- hình ảnh của user -->
        <?php
        $username = $_SESSION['username'];
        $user_image = "Select * from `user_table` where username='$username'";
        $user_image = mysqli_query($con, $user_image);
        $row_image = mysqli_fetch_array($user_image);
        $user_image = $row_image['user_image'];
        echo "
        <li class='nav-item bg-dark'>
            <img class='my-2' src='./user_images/$user_image' style='width:100%;height:100%;display:block;object-fit:contain'>
        </li>
        ";
        ?>

        <li class="nav-item bg-dark">
          <a href="profile.php" class="nav-link text-light">Đơn hàng</a>
        </li>
        <li class="nav-item bg-dark">
          <a href="profile.php?edit_account" class="nav-link text-light">Chỉnh sửa</a>
        </li>
        <li class="nav-item bg-dark">
          <a href="profile.php?my_orders" class="nav-link text-light">Đơn hàng của tôi</a>
        </li>
        <li class="nav-item bg-dark">
          <a href="profile.php?delete_account" class="nav-link text-light">Xóa tài khoản</a>
        </li>
        <li class="nav-item bg-dark">
          <a href="user_logout.php" class="nav-link text-light">Đăng xuất</a>
        </li>
      </ul>
    </div>
    <div class="col-md-10 text-center" style=" margin-left: 0px">
      <?php get_user_order_details();
      if (isset($_GET['edit_account'])) {
        include('edit_account.php');
      }
      if (isset($_GET['my_orders'])) {
        include('user_orders.php');
      }
      if (isset($_GET['delete_account'])) {
        include('delete_account.php');
      }
      ?>
    </div>
  </div>
</body>
<!--footer -->
<div style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif; color: white" class="bg-success p-3 text-center">
  <h3 style="text-align:center">Binh yeu Long</h3>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</div>

</html>