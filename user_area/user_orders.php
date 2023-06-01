<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hang của tôi</title>
</head>

<body>
    <?php 
    $username=$_SESSION['username'];
    $get_user="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    
    ?>
    <h3 class="text-success">Đơn của tôi</h3>
    <table class="table table-borered mt-5 shadow-lg">
        <thead class="bg-success">
            <tr>
                <th>Số thứ tự</th>
                <th>Giá tiền</th>
                <th>Số sản phẩm</th>
                <th>Mã đơn</th>
                <th>Ngày đặt</th>
                <th>Hoàn thành/Chưa hoàn thành</th>
                <th>Trạng thái</th>
            </tr>
        </thead>

        <tbody class="bg-dark text-light">
            <?php 
        $get_order_details="Select * from `user_orders` where user_id=$user_id";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=0;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            if($order_status=='Đang chờ'){
                $order_status='Chưa hoàn thành'; 
                $number++;            
            }
            else{
                $order_status='Hoàn thành';
                $number++;
            }
            $order_date=$row_orders['order_date'];

            echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$total_products</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td>";
        ?>
            <?php 
                if($order_status=='Hoàn thành'){
                echo"<td>Đã thanh toán</td>";
                }
                else{
                echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Xác nhận</a></td>
                </tr>";
                }
            }
            ?>

        </tbody>
    </table>
</body>

</html>