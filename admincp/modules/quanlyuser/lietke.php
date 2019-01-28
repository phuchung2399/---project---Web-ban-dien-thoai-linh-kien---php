<?php
	$sql_lietketk="select * from dangky order by id_khachhang desc ";
	$row_lietketk=mysqli_query($conn,$sql_lietketk);

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
  while($dong=mysqli_fetch_array($row_lietketk,MYSQLI_BOTH)){

  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['id_khachhang'] ?></td>
    <td><?php echo $dong['tenkhachhang'] ?></td>
    <td><?php echo $dong['email'] ?></td>
     <td><?php echo $dong['matkhau'] ?></td>
      <td><?php echo $dong['dienthoai'] ?></td>
       <td><?php echo $dong['diachinhan'] ?></td>
   
    <td><a href="modules/quanlyuser/xuly.php?id=<?php echo $dong['id_khachhang']?>" class="delete_link"><center><img src="../imgs/delete.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
