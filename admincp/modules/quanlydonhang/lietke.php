<?php
	$sql_lietketk=" SELECT * FROM demowebsite.hoadon order by cart_id desc ";
	$row_lietketk=mysqli_query($conn,$sql_lietketk);
?>

<table width="100%" border="1">
  <tr>
    <td>STT</td>
    <td>Mã Đơn Hàng</td>
    <td>Email Người Mua</td>
    <td>Mã Sản Phẩm</td>
    <td>Tên Sản Phẩm</td>
    <td>Số Lượng</td>
    <td>Giá</td>
    <td>Điện Thoại</td>
    <td>Địa Chỉ Nhận</td>
    <td>Ngày Mua</td>
    <td>Tình trạng</td>
    <td colspan="4" >Quản Lý</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietketk,MYSQLI_BOTH)){
  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['cart_id'] ?></td>
    <td><?php echo $dong['fullname'] ?></td>
     <td><?php echo $dong['product_id'] ?></td>
      <td><?php echo $dong['tensp'] ?></td>
      <td><?php echo $dong['quantity'] ?></td>
      <td><?php echo $dong['price'] ?></td>
      <td><?php echo $dong['dienthoai'] ?></td>
      <td><?php echo $dong['diachinhan'] ?></td>
      <td><?php echo $dong['createdate'] ?></td>
      <td><?php echo $dong['tinhtrang'] ?></td>
      <td><a href="modules/quanlydonhang/tick.php?id=<?php echo $dong['cart_id']?>"><center><img src="../imgs/tick.png" width="30" height="30" /></center></a></td>
     <td><a href="modules/quanlydonhang/xoa.php?id=<?php echo $dong['cart_id']?>" class="delete_link"><center><img src="../imgs/delete.png" width="30" height="30" /></center></a></td>
     <td><a href="modules/quanlydonhang/giaohang.php?id=<?php echo $dong['cart_id']?>"><center><img src="../imgs/giao-hang.jpg" width="30" height="30" /></center></a></td>
     <td><a href="modules/quanlydonhang/dagiao.php?id=<?php echo $dong['cart_id']?>"><center><img src="../imgs/finish.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
