
<h3 class="text-center text-success" style="overflow-y:hidden">Tất cả khách hàng</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-success">
    <?php 
    $get_orders="Select * from `user_table`";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo"<h2 class='bg-danger text-center mt-5'>Chưa có khách hàng nào</h2>";
    }
    else{
    echo "<tr class='text-center'>
        <th>Số thứ tự</th>
        <th>Tên khách hàng</th>      
        
        <th>Hình ảnh</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Xoá</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
    
    
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;
            echo"
            <tr class='text-center'>
            <td>$number</td>
            <td>$username</td>
            <td><img style='width: 125px; object-fit:contain' src='../user_area/user_images/$user_image' alt='$username'></td>
            <td>$user_email</td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='#' class='text-light'><img src='../Assets/bin.png'></a></td>
            </tr>";

        }
    }
    ?>
        
    </tbody>
</table>