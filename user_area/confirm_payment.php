<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values ('$order_id','$invoice_number','$amount','$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Thanh toán thành công')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Hoàn thành' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url(../Assets//Gym-background.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>

<body class="bg-dark">
    <div class="container my-5 text-light" style="opacity: 1;">
        <h1 class="text-center">Thanh toán</h1>
        <form action="" method="post">
            <div class="form-outline text-center my-4 w-50 m-auto">
                <label for="" class="text-light">Mã đơn</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                    value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <label for="" class="text-light">Giá tiền</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <select name="payment_mode" id="" class="form-select m-auto w-50">
                    <option>Chọn phương thức</option>
                    <option>Net Banking</option>
                    <option>Apple Pay</option>
                    <option>Trả tiền khi lấy hàng</option>
                    <option>VN Pay</option>
                </select>
            </div>
            <div class="form-outline text-center my-4 w-50 m-auto">
                <input type="submit" class="bg-success text-light rounded py-2 px-3 boder-0" value="Thanh toán"
                    name="confirm_payment">
            </div>
        </form>
    </div>

</body>

</html>