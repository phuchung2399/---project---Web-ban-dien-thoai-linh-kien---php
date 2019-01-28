<?php
if (isset($_POST['gui'])) {
	# code...
  $tenkh=$_POST['hoten'];
  $email=$_POST['email'];
  $diachi=$_POST['diachi'];
  $pass=$_POST['pass'];
  $pass1=$_POST['pass1'];
  $dienthoai=$_POST['dienthoai'];

			if ($tenkh=='') {
				echo "<script>alert('Vui lòng nhập tên')</script>";
				exit();
				# code...
			}
			if ($email=='') {
				echo "<script>alert('Vui lòng nhập Email')</script>";
				exit();
				# code...
			}
			if ($diachi=='') {
				echo "<script>alert('Vui lòng nhập địa chỉ')</script>";
				exit();
				# code...
			}
			if ($pass=='') {
				echo "<script>alert('Vui lòng nhập mật khẩu')</script>";
				exit();
				# code...
			}
			if ($pass1=='') {
				echo "<script>alert('Vui lòng nhập mật khẩu')</script>";
				exit();
				# code...
      }
      if ($dienthoai ==''){
        echo "<script>alert('Vui lòng nhập số điện thoại')</script>";
				exit();
      }
      // kiem tra trung
      if($pass1 != $pass){
        echo "<script>alert('Mật khẩu không trùng')</script>";
// load trang
				exit();
      }
			// Kiem tra email trung nhau

			$duplicate=mysqli_query($conn,"select email from dangky where email ='$email'");
			if (mysqli_num_rows($duplicate)>0)
			{
      echo "<script>alert('Email đã tồn tại')</script>";// load trang
			}
			else{
			
			$sql = "INSERT INTO dangky (tenkhachhang, email,matkhau,dienthoai,diachinhan)
        VALUES ('$tenkh','$email','$pass','$dienthoai','$diachi')";
if($conn->query($sql) === TRUE){
  echo '<h3 style="margin-left:5px;">Bạn đã đăng ký thành công</h3>';
  echo '<a href="?quanly=dangnhap" style="margin:20px;text-decoration:none;">Quay lại để đăng nhập mua hàng</a>';
}
			
			}
	
}
?>
	

<div class="tieude">
	HOAN NGHÊNH QUÝ BẠN ĐẶT HÀNG TẠI XƯỞNG PHỤ KIỆN
</div>
<div class="thongbao">
	<p><img src="imgs/chu-y-mua-hang.gif" width="100" height="50"></p>
	<p>- Vui lòng không đặt số lượng 1 sản phẩm</p>
    <p>- Không đặt đơn hàng có tổng giá trị dưới 200.000đ</p>
    <p>- Đơn hàng nhiều sản phẩm. Vui lòng liệt kê danh sách + số lượng qua Email, Zalo</p>
</div>
<div class="dangky">
  <p style="font-size:18px; color:red;margin:5px;">Các mục dấu * là bắt buộc tối thiểu. Vui lòng điền đầy đủ và chính xác (Số nhà, Ngõ, thôn xóm/ấp, Phường/xã, huyện/quận, tỉnh, TP)</p>
  <form action="" method="post" enctype="multipart/form-data">
	<table width="100%" border="1" style="border-collapse:collapse;">
  <tr>
    <td width="40%">Họ tên người mua <strong style="color:red;"> (*)</strong></td>
    <td width="60%"><input type="text" name="hoten" size="50"></td>
  </tr>
  <tr>
    <td>Địa chỉ Email <strong style="color:red;"> (*)</strong></td>
    <td width="60%"><input type="text" name="email" size="50"></td>
  </tr>
  <tr>
    <td>Mật khẩu  <strong style="color:red;"> (*)</strong></td>
    <td width="60%"><input type="password" name="pass" size="50"></td>
  </tr>
  <tr>
    <td>Nhập lại mật khẩu  <strong style="color:red;"> (*)</strong></td>
    <td width="60%"><input type="password" name="pass1" size="50"></td>
  </tr>
  <tr>
    <td>Điện thoại <strong style="color:red;"> (*)</strong></td>
     <td width="60%"><input type="text" name="dienthoai" size="50"></td>
  </tr>
  <tr>
    <td>Địa chỉ nhận hàng <strong style="color:red;"> (*)</strong></td>
   <td width="60%"><input type="text" name="diachi" size="50"></td>
  </tr>
  <tr>
    <td colspan="2">
    	 	
           <p><input type="submit" name="gui" value="Gửi thông tin" /></p>
         
    </td>
    </tr>
</table>
</form>
<div class="ghichu">
	<p>Ghi chú nếu có :</p>
	<textarea name="ghichu">
    
    </textarea>

