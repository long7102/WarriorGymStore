<h3 class="text-center text-success" style="overflow-y:hidden">Tất cả đơn hàng</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-success">
        <?php 
    $get_payments="Select * from `user_payments`";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5' style='overflow-y:hidden'>Chưa có đơn hàng nào</h2>";
    }
    else{
    echo "<tr class='text-center'>
        <th>Số thứ tự</th>
        <th>Mã hoá đơn</th>      
        <th>Giá tiền</th>
        <th>Hình thức chi trả</th>
        <th>Ngày đặt hàng</th>
        <th>Xoá</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            echo"
            <tr class='text-center'>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount VND</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a class='text-light' href='./index.php?delete_payments='<?php echo $order_id?><img
            src='../Assets/bin.png'></a></td>
        </tr>";

        }
        }
        ?>

        </tbody>
</table>