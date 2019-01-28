<?php
include('../config.php');
//
$sql_tick = "update cart_detail set tinhtrang ='Đã nhận hàng' where cart_id ='$_GET[id]'";
    mysqli_query($conn,$sql_tick);
    header('location:../../index.php?quanly=donhang&ac=lietke');
?>