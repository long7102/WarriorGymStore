<?php
$con=mysqli_connect('localhost','root','','mygymstore');
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
    echo"Kết nối thất bại";
}
?>