<?php
// $db_dir='';
$servername = "localhost";
$database = "demowebsite";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  //  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//  mysqli_close($conn);
?>

<?php
   @session_start();
    $name="";
    $name=$_SESSION['dangnhap'];
	  $sql_user="select * from dangky where email = '$name' ";
    $row=mysqli_query($conn,$sql_user);
	$dong=mysqli_fetch_array($row);
?>
<form action="modules/right/xulyInfo.php?id=<?php echo $dong['id_khachhang']?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Sửa thông tin </td>
  </tr>
  <tr>
    <td width="300">Họ Tên</td>
    <td width="200"><input type="text" name="tenkhachhangS" value="<?php echo $dong['tenkhachhang'] ?>"></td>
  </tr>
  <tr>
    <td>Mật Khẩu</td>
    <td width="200"><input type="text" name="matkhauS" value="<?php echo $dong['matkhau'] ?>"></td>
  </tr>
  <tr>
    <td>Điện Thoại</td>
    <td width="200"><input type="text" name="dienthoaiS" value="<?php echo $dong['dienthoai'] ?>"></td>
  </tr>
  <tr>
    <td>Địa Chỉ</td>
    <td width="200"><input type="text" name="diachinhanS" value="<?php echo $dong['diachinhan'] ?>"></td>
  </tr>
  <tr>
    <td colspan="1"><div align="center">
    <input type="submit" name="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</form>