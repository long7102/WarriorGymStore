<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện quản lý</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../CSS//style.css">
</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light"
            style="background-color: rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif;">
            <div class="container-fluid">
                <img src="../Image//logo_200x200-1.png" style="width: 70x; height: 70px">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link" style="color:bisque">Welcome, Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second-child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Giao diện quản lí</h3>
        </div>
        <!-- third-child -->
        <div class="row">
            <div class="col-md-12 bg-dark p-1 d-flex algin-items-center">
                <div class="px-3">
                    <a href="../index.php"><img style="width: 100x; height: 100px; object-fit: contain"
                            src="../Image/logo_200x200.png"></a>
                    <p class="text-light text-center">GymWarrior's <br> Admin</p>
                </div>
                <!-- button-button*10>nav.link.text-light.my-1 -->
                <div class="button text-center">
                    <button class=" btn btn btn-success my-2 "><a href="index.php?insert_products"
                            class="nav-link text-light my-1">Thêm sản phẩm</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?view_products"
                            class="nav-link text-light my-1">Xem sản phẩm</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?insert_category"
                            class="nav-link text-light my-1">Thêm danh mục</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?view_categories"
                            class="nav-link text-light my-1">Xem danh mục</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?insert_brands"
                            class="nav-link text-light my-1">Thêm thương hiệu</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?view_brands"
                            class="nav-link text-light my-1">Xem thương hiệu</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?list_orders"
                            class="nav-link text-light my-1">Đơn hàng</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?list_payments"
                            class="nav-link text-light my-1">Hoá đơn</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="index.php?list_users"
                            class="nav-link text-light my-1">Khách hàng</a></button>
                    <button class=" btn btn btn-success my-3 "><a href="admin_login.php"
                            class="nav-link text-light my-1">Đăng xuất</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- fourth-child -->
    <div class="container my-5">
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brands'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['insert_products'])) {
            include('insert_product.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_products'])) {
            include('delete_products.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
            include('view_brands.php');
        }
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }
        if (isset($_GET['edit_brands'])) {
            include('edit_brands.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brands'])) {
            include('delete_brands.php');
        }
        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }
        if (isset($_GET['delete_orders'])) {
            include('delete_orders.php');
        }
        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>