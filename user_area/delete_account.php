<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá tài khoản</title>
</head>
<body>
    <h3 class="text-danger mb-4">Xoá tài khoản</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4 ">
            <input type="submit" class="form-control w-50 m-auto bg-success text-light" name="delete" value="Xoá tài khoản" type="button" data-toggle="modal" data-target="#exampleModal">
        </div>
        <div class="form-outline">
            <input type="submit" class="form-control w-50 m-auto bg-success text-light" name="dont_delete" value="Không xoá tài khoản">
        </div>
    </form>
    <?php 
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `user_table` where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        
        if($result){
            session_destroy();
            echo"<script>alert('Xoá tài khoản thành công')</script>";
            echo"<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";
    }
    ?>
</body>
</html>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4 style="overflow-y:hidden">Bạn có chắc muốn tài khoản không, hành động này không thể hoàn tác</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a class="text-light text-decoration-none" href="profile.php">Đóng</a></button>
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="../index.php?delete_account">Xoá</a></button>
      </div>
    </div>
  </div>
</div>