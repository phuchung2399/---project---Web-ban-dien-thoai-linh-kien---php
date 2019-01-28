<?php
	include('../config.php');
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$matkhau=$_POST['matkhau'];
	$dienthoai=$_POST['dienthoai'];
	$diachi=$_POST['diachi'];
	
	if(isset($_POST['them'])){
		//them
		$sql_them=("insert into dangky (id_khachhang,tenkhachhang,email,matkhau,dienthoai,diachinhan) value('$id','$name',$email,$matkhau,$dienthoai,$diachi)");
		mysqli_query($conn,$sql_them);
		header('location:../../index.php?quanly=userp&ac=lietke');
	}else{
		$sql_xoa = "delete from dangky where id_khachhang = $_GET[id]";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=user&ac=lietke');
	}
?>
