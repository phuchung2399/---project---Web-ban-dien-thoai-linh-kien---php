<?php
   @session_start();
   $name="";
    $name=$_SESSION['dangnhap'];
	$sql_user="select * from dangky where email = '$name' ";
	$row_user=mysqli_query($conn,$sql_user);
?>
<table width="100%" border="1">
  <tr>
    <td>STT</td>
    <td>ID</td>
    <td>Họ Tên</td>
     <td>Email</td>
    <td>Mật Khẩu</td>
    <td>Điện Thoại</td>
    <td>Địa chỉ nhận</td>
    <td>Quản lý</td>
  </tr>
  
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_user)){
  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['id_khachhang'] ?></td>
    <td><?php echo $dong['tenkhachhang'] ?></td>
    <td><?php echo $dong['email'] ?></td>
     <td><?php echo $dong['matkhau'] ?></td>
      <td><?php echo $dong['dienthoai'] ?></td>
       <td><?php echo $dong['diachinhan'] ?></td>
   
       <td><a href="?quanly=editInfo" ><center><img src="imgs/edit.png" width="40" height="40" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
