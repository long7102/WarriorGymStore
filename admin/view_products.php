<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success" style="overflow-y: hidden;">Tất cả sản phẩm</h3>
    <table class="table table-bordered-mt-5 shadow-lg text-light">
        <thead class="bg-success text-center">
            <tr>
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá tiền</th>
                <th>Đã bán</th>
                <th>Trạng thái</th>
                <th>Chỉnh sửa</th>
                <th>Xoá</th>
            </tr>
        </thead>
        
        <tbody class="bg-secondary text-light">
        <?php 
        $get_products="Select * from `products`";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            if($status=='true'){
                $status='Còn hàng';
            }
            $number+=1;
            ?>
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img style='width: 25%;object-fit:contain;' src='./product_images/<?php echo $product_image1; ?>'></td>
            <td><?php echo $product_price; ?> VNĐ</td>
            <td><?php 
            $get_count="Select * from `orders_pending` where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo $rows_count;
            ?></td>
            <td><?php echo $status ?></td>
            <td><a href="index.php?edit_products=<?php echo $product_id ?>" class="text-light"><img src='../Assets/edit.png'></a></td>
            <td><a href="index.php?delete_products=<?php echo $product_id ?>" class="text-light"><img src='../Assets/bin.png'></td>
        </tr>
        <?php } ?>
            
        </tbody>
    </table>
</body>
</html>