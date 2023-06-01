<h3 class="text-center text-success" style="overflow-y: hidden ;">Tất cả thương hiệu</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
        <tr class="text-center">
            <th>Số thứ tự</th>
            <th>Tên thương hiệu</th>
            <th>Chỉnh sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $select_brand="Select * from `brands`";
        $result=mysqli_query($con,$select_brand);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href="index.php?edit_brands=<?php echo $brand_id ?>" class="text-light"><img src="../Assets/edit.png"></a></td>
            <td><a href="index.php?delete_brands=<?php echo $brand_id ?>" class="text-light" type="button" data-toggle="modal" data-target="#exampleModal"><img src='../Assets/bin.png'></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="overflow-y: hidden;">Bạn có chắc muốn xoá thương hiệu này không</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a class="text-light text-decoration-none" href="./index.php?view_brands">Đóng</a></button>
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./index.php?delete_brands=<?php echo $brand_id ?>">Xoá</a></button>
      </div>
    </div>
  </div>
</div>