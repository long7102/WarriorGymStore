<?php
include('../includes/connect.php');
session_start();
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
        /* overflow-y: hidden; */
    }
    </style>

</head>

<body>
    <!-- header -->


    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <ul class="navbar-nav me-auto">
            <?php 
      if(!isset($_SESSION['username'])){
        echo"
        <li class='nav-item'>
        <a class='nav-link'>Chào mừng</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='user_login.php'>Đăng nhập</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='user_registration.php' style='color:bisque;'>Chưa có tài khoản, đăng ký ngay</a>
        </li>
        ";
      }
      else{
        echo"
        <li class='nav-item'>
        <a class='nav-link'>Xin chào ".$_SESSION['username']."</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='user_logout.php'>Đăng xuất</a>
        </li>
        ";
      }
      ?>
        </ul>
    </nav> -->
    <!-- <div class="bg-dark" style="margin-bottom: 20px">
        <h3 class="text-light text-center">Website GymWarrior</h3>
        <h3 class="text-light text-center">Nơi bán sản phẩm tập gym tốt nhất</h3>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <div class="row px-1">
                <?php
        if(!isset($_SESSION['username'])){
            include('user_login.php');
        }
        else{
            include('payment.php');
        }
        ?>
            </div>
        </div>
    </div>
</body>
<!--footer -->
<div style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif; color: white"
    class="bg-success p-3 text-center">
    <h3 style="text-align:center">Design by @BML 2023</h3>
    <!--link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</div>

</html>