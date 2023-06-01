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
    <title>Giỏ hàng</title>
    <script src="./Js/Header.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="styleshee" href="./CSS/style.css">
    <style>
    .cart_img {
        height: 125px;
        width: 125px;
        object-fit: contain;
    }

    .empty_cart_img {
        height: 392px;
        width: 592px;
        justify-content: center;
        margin: auto;
    }
    </style>

</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light"
        style="background-color:  rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif;">
        <a href="index.php"><img src="./Image/logo_200x200-1.png"
                style="height: 100px; width: 100px;margin-right: 15px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="flex-basis: 70%">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color:bisque; ">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a style="color:bisque" class="nav-link dropdown-toggle" href="display_all.php" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <li class="nav-item" style="font-family:monospace;">
                    <a class="nav-link" href="#" style="color:bisque"><img
                            src="./Assets/bag.png"><sup><?php cart_item();?></sup></a>
                </li>
            </ul>
        </div>
    </nav>
    <!--gọi hàm cart-->
    <?php 
 cart();
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <ul class="navbar-nav me-auto">
            <?php 
      if(!isset($_SESSION['username'])){
        echo"
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
        <a class='nav-link' href='./user_area/user_logout.php'>Đăng xuất</a>
        </li>
        ";
      }
      ?>

        </ul>
    </nav>
    <div class="bg-dark" style="margin-bottom: 20px">
        <h3 class="text-light text-center" style="overflow-y:hidden">Website GymWarrior</h3>
        <h3 class="text-light text-center" style="overflow-y:hidden">Nơi bán sản phẩm tập gym tốt nhất</h3>
    </div>

    <!--giỏ hàng-->
    <div class="container">

        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center shadow-lg p-3 mb-5 bg-body rounded">

                    <tbody>
                        <!-- hiển thị dữ liệu -->
                        <?php 
                global $con;
                $get_ip_add= getIPAddress();
                $total_price=0;
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0)
                {
                  echo"
                  <thead >
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xoá</th>
                    <th colspan='2'>Quản lí</th>
                </tr>
            </thead>";
                while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products="Select * from `products` where product_id='$product_id'";
                  $result_products=mysqli_query($con,$select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);//tổng từng phần tử và lưu vào mảng [200,300]
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_values=array_sum($product_price);//tổng các phần từ [500]
                    $total_price+=$product_values; //tổng = tổng + tổng các phần tử
                  ?>
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./admin//product_images/<?php echo$product_image1?>" class="cart_img" alt="">
                            </td>
                            <td><input type="number" name="qty" id="" class="form-input w-50" min="1"></td>
                            <?php 
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update_cart="Update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                      $result_products_quantity=mysqli_query($con,$update_cart);
                      $total_price= (int)$total_price *$quantities;
                    }
                    ?>
                            <td><?php echo $price_table ?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo$product_id?>"></td>
                            <td>
                                <input class="bg-success px-3 text-light border-0 py-2 mx-3 rounded" type="submit"
                                    value="Cập nhật" name="update_cart">
                                <!-- <button class="bg-success px-3 text-light border-0 py-2 mx-3 "value="Xoá">Xoá</button> -->
                                <input class="bg-success px-3 text-light border-0 py-2 mx-3 rounded" type="submit"
                                    value="Xoá" name="remove_cart">
                            </td>
                        </tr>
                        <?php }}}
                
                ?>
                    </tbody>
                </table>
                <?php 
                global $con;
                $get_ip_add= getIPAddress();
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0)
                { 
                         
                  echo"
                  <div class='d-flex mb-5'>
                  <h4 class='px-3' style='overflow-y:hidden'>Tổng: <strong class='text-dark' style='overflow-y:hidden'>$total_price VND</strong></h4>                 
                  <input type='submit' name='continue_shopping' class='bg-success p-3 text-light border-0 py-2 mx-3 rounded' value='Tiếp tục mua sắm'></input>
                  <button class='bg-success p-3 text-light border-0 py-2 rounded'><a href='./user_area/checkout.php' class='text-light text-decoration-none rounded'>Thanh toán</a></button>
                  </div>
                  ";

                }
                else{
                  echo"
                  <div class='mx-auto text-center mb-2'>
                  <img class='empty_cart_img rounded ' src='./Assets/preview.png' align='bottom'>
                  <h3 class='text-danger' style='overflow-y:hidden'>Không có sản phẩm trong giỏ</h3>
                  <h3 class='mb-2' style='overflow-y:hidden'>Có vẻ như bạn chưa có có sản phẩm nào trong giỏ hàng</h3>
                  <input type='submit' name='continue_shopping' class='bg-success p-3 text-light border-0 py-2 mx-3 rounded' value='Tiếp tục mua sắm'></input>
                  </div>
                  ";

                } 
                if(isset($_POST['continue_shopping'])){
                  echo"<script>window.open('./index.php','_self')</script>";
                }
                ?>


        </div>
    </div>
    </form>

    <!-- xoá sản phẩm khỏi giỏ -->
    <?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        $delete_query="Delete from `cart_details` where product_id=$remove_id";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
          echo"<script>window.open('cart.php','_self')</script>";
          echo"<script>alert('Sản phẩm đã được xoá khỏi giỏ hàng')</script>";
        }
      }
    }
}
echo $remove_item=remove_cart_item();
?>
</body>
<!--footer -->
<!--footer -->
<div style="background-color: rgb(34, 24, 24); font-family:monospace, Helvetica, sans-serif; color: white"
    class="row mt-3 p-3 text-center">
    <div class="col" style="display: collumn; margin-left: 25px; text-align:justify;">
        <h3>Thông tin liên hệ</h3>
        <p>GymWarrior cung cấp các mặt hàng thể thao chất lượng cao với giá cả phải chăng, phù hợp với mọi người</p>
        <a href="https://www.google.com/maps/dir/21.011016,105.9347387/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+%C4%90i%E1%BB%87n+L%E1%BB%B1c,+235+Ho%C3%A0ng+Qu%E1%BB%91c+Vi%E1%BB%87t,+C%E1%BB%95+Nhu%E1%BA%BF,+B%E1%BA%AFc+T%E1%BB%AB+Li%C3%AAm,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0453892,105.7882272,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3135abb158a2305d:0x5c357d21c785ea3d!2m2!1d105.7849436!2d21.046388?hl=vi-VN"
            style="text-decoration:none;" class="text-light"><img src="./Assets/location.png">Hoàng Quốc Việt, Cổ Nhuế,
            Bắc Từ Liêm, Hà Nội</a>
        <br>
        <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/phone.png"> 0123456789</a>
        <br>
        <a href="https://mail.google.com/mail/u/0/?pli=1#inbox?compose=CllgCJfmrkmrHNSKFvnmsmqSkftGzzHWCzFQVthQFKQQZfHPhHFFFzSvtgRljgTvCsKDmSgZHzL"
            style="text-decoration:none;" class="text-light"><img src="./Assets/gmail.png"> hotboy7102@epu.gmail.com</a>
        <p style="margin-bottom: 0px;">>Sáng: 7h - 11h30</p>
        <p>>Chiều: 12h30 - 5h30</p>
    </div>
    <div class="col-3" style="display: collumn; margin-left: 25px; text-align:justify;">
        <h3>Xã hội</h3>
        <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/facebook.png"
                style="width: 25px; height: 25px;  margin-bottom:10px"> Facebook</a>
        <br>
        <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/instagram.png"
                style="width: 25px; height: 25px; margin-bottom:10px"> Instagram</a>
        <br>
        <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/youtube.png"
                style="width: 25px; height: 25px; margin-bottom:10px"> Youtube</a>
        <br>
        <a href="#" style="text-decoration:none;" class="text-light"><img src="./Assets/twitter.png"
                style="width: 25px; height: 25px; margin-bottom:10px"> Twitter</a>
        <br>
    </div>
    <div class="col" style="display: collumn; margin-left: 25px; text-align:justify;">
        <h3>Vị trí</h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657325566268!2d105.78274954991844!3d21.046392992484613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1680239251495!5m2!1svi!2s"
            width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</html>