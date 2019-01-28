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
    <td>Hủy Đơn Hàng</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietketk,MYSQLI_BOTH)){
    if($dong['tinhtrang'] == "Xác nhận" || $dong['tinhtrang'] == "Đang giao hàng"){
      $kiemtra = "display: none;";
    }
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
      <td ><?php echo $dong['tinhtrang'] ?></td>
    <td style="<?php echo $kiemtra;?>;"><a href="modules/right/xulydonhang.php?id=<?php echo $dong['cart_id']?>" class="delete_link"><center><img src="imgs/delete.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>

