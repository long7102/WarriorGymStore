
<h3 class="text-center text-success" style="overflow-y:hidden">Tất cả đơn hàng</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-success">
    <?php 
    $get_orders="Select * from `user_orders`";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo"<h2 class='bg-danger text-center mt-5'>Chưa có đơn hàng nào</h2>";
    }
    else{
    echo "<tr class='text-center'>
        <th>Số thứ tự</th>
        <th>Mã hoá đơn</th>      
        <th>Số lượng</th>
        <th>Giá tiền</th>
        <th>Ngày đặt hàng</th>
        <th>Trạng thái</th>
        <th>Xoá</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
    
    
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            echo"
            <tr class='text-center'>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$amount_due VND</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='./index.php?delete_orders='<?php echo $order_id?><img src='../Assets/bin.png'></a></td>
            </tr>";

        }
    }
    ?>
        
    </tbody>
</table>