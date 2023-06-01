<?php 
//include('./includes/connect.php');
function getproducts(){
    global $con;
        //check
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $select_query='Select * from `products` order by rand() LIMIT 0,12';
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $brand_id=$row['brand_id'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $date=$row['date'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_id' style='margin-bottom: 10px'>
            <div class='card-body'>
              <h5 class='card-title' style='overflow-y: hidden'>$product_title</h5>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$product_price VNĐ</li>
            </ul>
            <div class='card-body'>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-success btn-outline-light'>Thêm vào giỏ </a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-primary btn-outline-light'>Xem thêm</a>
            </div>
          </div>          
        </div>";
        }
}
}
}
//hiển thị tất cả sản phẩm
function get_all_product(){
  global $con;
        //check
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $select_query='Select * from `products` order by rand() LIMIT 0,9';
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $brand_id=$row['brand_id'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $date=$row['date'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='./admin/product_images/$product_image1' alt='Card image cap'>
            <div class='card-body'>
              <h5 class='card-title' style='overflow-y: hidden'>$product_title</h5>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$product_price VNĐ</li>
            </ul>
            <div class='card-body'>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-success btn-outline-light'>Thêm vào giỏ </a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-primary btn-outline-light'>Xem thêm</a>
            </div>
          </div>          
        </div>";
        }
}
}
}
//hiển thị danh mục
function getcategories(){
    global $con;
    $select_categories = "Select * from `categories`";
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
          $category_title = $row_data['category_title'];
          $category_id = $row_data['category_id'];
          echo "<li class='nav-item bg-dark'>
      <a href='index.php?category=$category_id' class='nav-link text-light' style='font-family:monospace'>$category_title</a>
      </li>";
        }
}
//hiển thị danh mục được chọn
function get_unique_categories(){
    global $con;
        //check
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
        $select_query="Select * from `products` where category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center text-danger' style='overflow-y:hidden'>Không có hàng</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $brand_id=$row['brand_id'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $date=$row['date'];
          echo "<div class='col-md-4 mb-2' style='margin-bottom: 1.5rem!important;'>
          <div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='./admin/product_images/$product_image1' alt='Card image cap'>
            <div class='card-body'>
              <h5 class='card-title' style='overflow-y: hidden'>$product_title</h5>
            </div>

            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$product_price VNĐ</li>
            </ul>
            <div class='card-body'>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-success btn-outline-light'>Thêm vào giỏ </a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-primary btn-outline-light'>Xem thêm</a>
            </div>
          </div>
          
        </div>";
        }
}
}
function get_unique_brands(){
    global $con;
        //check
        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
        $select_query="Select * from `products` where brand_id=$brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center text-danger' style='overflow-y:hidden'>Không có hàng</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $brand_id=$row['brand_id'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $date=$row['date'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='./admin/product_images/$product_image1' alt='Card image cap'>
            <div class='card-body'>
              <h5 class='card-title' style='overflow-y: hidden'>$product_title</h5>
            </div>

            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$product_price VNĐ</li>
            </ul>
            <div class='card-body'>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-success btn-outline-light'>Thêm vào giỏ </a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-primary btn-outline-light'>Xem thêm</a>
            </div>
          </div>
          
        </div>";
        }
}
}

//Hiển thị brand
function getbrands(){
    global $con;
    $select_brands = "Select * from `brands`";
        $result_brands = mysqli_query($con, $select_brands);
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
          $brand_title = $row_data['brand_title'];
          $brand_id = $row_data['brand_id'];
          echo "<li class='nav-item bg-dark'>
      <a href='index.php?brand=$brand_id' class='nav-link text-light' style='font-family:monospace'>$brand_title</a>
      </li>";
        }
}
//tìm kiếm sản phẩm
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_values=$_GET['search_data'];
        $search_query="SELECT * from `products` where product_keywords LIKE '%$search_data_values%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
            echo"<h2 class='text-center text-danger' style='overflow-y:hidden'>Không có kết quả nào phù hợp</h2>";
          }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $date=$row['date'];
          echo "<div class='col-md-4 mb-2' >
          <div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_id'>
            <div class='card-body'>
              <h5 class='card-title' style='overflow-y: hidden'>$product_title</h5>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$product_price VNĐ</li>
            </ul>
            <div class='card-body'>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-success btn-outline-light'>Thêm vào giỏ </a>
              <a href='product_detail.php?product_id=$product_id' class='btn btn-primary btn-outline-light'>Xem thêm</a>
            </div>
          </div>          
        </div>";
        }
}
}

//view detail
function view_details(){
  global $con;
        //check
        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
              $product_id=$_GET['product_id'];
        $select_query="Select * from `products` where product_id='$product_id'";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $brand_id=$row['brand_id'];
        $product_keywords=$row['product_keywords'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $status=$row['status'];
        if($status=='true'){
          $status='Còn hàng';
        }
        else{
          $status='Hết hàng';
        }
        $date=$row['date'];
        
          echo "<div class='col-md-4 mb-2'>
          <div class='card' style='width: 18rem;'>
        <img style='border: solid 1px'class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_id'>
            <div class='card-body'>
              <h5 class='card-title' style='overflow-y: hidden'>$product_title</h5>
              <p class='card-text'>$product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>$product_price VNĐ</li>
              <li class='list-group-item'>Ngày nhập: $date</li>
                <li class='list-group-item'>Tình trạng: $status</li>
              </li>
            </ul>
            <div class='card-body'>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-success btn-outline-light'>Thêm vào giỏ </a>
              <a href='index.php' class='btn btn-primary btn-outline-light'>Trang chủ</a>
            </div>
          </div>          
        </div>
        <div class='col-md-8'>
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-dark mb-5' style='overflow-y: hidden'>Chi tiết sản phẩm</h4>
            </div>
            <div class='col-md-6'>
            <img class='card-img-top' src='./admin/product_images/$product_image2' alt='$product_title'>
            </div>
            <div class='col-md-6'>
            <img class='card-img-top' src='./admin/product_images/$product_image3' alt='$product_title'>
            </div>
        </div>
        </div>";
        }
}
}
}
}
//lấy địa chỉ ip 
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo"<script>alert('Sản phẩm đã tồn tại trong giỏ hàng, xin vui lòng chọn sản phẩm khác')</script>";
      echo"<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="insert into `cart_details` (product_id,ip_address, quantity) values('$get_product_id','$get_ip_add',1)";
      $result_query=mysqli_query($con,$insert_query);
      echo"<script>alert('Sản phẩm đã được thêm vào giỏ hàng')</script>";
      echo"<script>window.open('index.php','_self')</script>";
    }
  }
}
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add=getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);   
  }
  else{
    global $con;
    $get_ip_add=getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

//tổng tiền
function total_cart_price(){
  global $con;
  $get_ip_add= getIPAddress();
  $total_price=0;
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']);//tổng từng phần tử và lưu vào mảng [200,300]
      $product_values=array_sum($product_price);//tổng các phần từ [500]
      $total_price+=$product_values; //tổng = tổng + tổng các phần tử
    }
  }
  echo $total_price;
}

//lấy chi tiết đơn 
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='Đang chờ'";
            $result_orders_query=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0){
              echo"<h3 class='text-center text-success mt-5 mb-2' style='overflow-y:hidden'>Bạn đang có <span class='text-danger'>$row_count</span> đơn hàng đang chờ xác nhận</h3>
              <p class='text-center' style='overflow-y:hidden'><a class='text-dark' href='profile.php?my_orders'>Chi tiết đơn hàng</a></p>";
            }
            else{
              echo"<h3 class='text-center text-success mt-5 mb-2' style='overflow-y:hidden'> Bạn chưa có đơn hàng nào đang chờ xác nhận</h3>
              <p class='text-center' style='overflow-y:hidden'><a class='text-dark' href='profile.php?my_orders'>Chi tiết đơn hàng</a></p>";
            }
          }
        } 

      }
    }
}
?>