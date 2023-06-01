<h3 class="text-center text-success" style="overflow-y: hidden ;">Tất cả danh mục</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
        <tr class="text-center">
            <th>Số thứ tự</th>
            <th>Tên danh mục</th>
            <th>Chỉnh sửa</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $select_cat="Select * from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href="index.php?edit_category=<?php echo $category_id ?>" class="text-light"><img src="../Assets/edit.png"></a></td>
            <td><a href="index.php?delete_category=<?php echo $category_id ?>" class="text-light" type="button" data-toggle="modal" data-target="#exampleModal"><img src='../Assets/bin.png'></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="overflow-y:hidden">Bạn có chắc muốn xoá thương hiệu này không</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a class="text-light text-decoration-none" href="./index.php?view_categories">Đóng</a></button>
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./index.php?delete_category=<?php echo $category_id ?>">Xoá</a></button>
      </div>
    </div>
  </div>
</div>