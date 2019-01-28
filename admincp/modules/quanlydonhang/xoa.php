<?php
	include('../config.php');	
	if(isset($_POST['dagiao'])){	
		$sql_tick = "update cart_detail set tinhtrang ='Đã Giao' where cart_id ='$_GET[id]'";
        mysqli_query($conn,$sql_tick);
      header('location:../../index.php?quanly=donhang&ac=lietke');
	}else{
		$sql_xoa = "delete from cart_detail where cart_id = $_GET[id]";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=donhang&ac=lietke');
	}
?>
