<?php
include('../config.php');
//
$sql_tick = "update cart_detail set tinhtrang ='Xác nhận' where cart_id ='$_GET[id]'";
    mysqli_query($conn,$sql_tick);
    header('location:../../index.php?quanly=donhang&ac=lietke');
?>
<?php
/////////////////////////////////////////- Gửi Email-///////////////////////////////////////////////////////////
$sql_lietketk=" SELECT * FROM demowebsite.hoadon where cart_id = '$_GET[id]' ";
$row_lietketk=mysqli_query($conn,$sql_lietketk);
$diachinhan = $_POST['diachinhan'];
include('sendEmail.php');
$mailSubject = "Shop Hung - Thinh -  Cam Vietnam" ;
// 
while($dong=mysqli_fetch_array($row_lietketk,MYSQLI_BOTH)){
$mailTo = $dong['fullname'];
$bodyContent = "<strong style='color: red;font-size: 40px;'>Thông tin đơn hàng:</strong><br>----------------------------------------------------------------<br>Mã Đơn Hàng: ".$dong['cart_id']."<br>Email khách hàng: ".$dong['fullname']."<br>Mã sản phẩm: ".$dong['product_id']."<br>Tên sản phẩm: ".$dong['tensp']."<br>Số lượng: ".$dong['quantity']."<br>Giá: ".$dong['price']."<br>Địa chỉ nhận hàng: ".$dong['diachinhan']."<br>Thời gian đặt: ".$dong['createdate']."<br>----------------------------------------------------------------<br><strong>Đơn hàng của bản đã được xác nhận.</strong>";
}
sendMail($mailTo, $bodyContent, $mailSubject);

?>
