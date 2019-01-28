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
if(!empty($_POST['tenkhachhangS']) &&!empty($_POST['matkhauS']) && !empty($_POST['matkhauS']) &&!empty($_POST['diachinhanS']) ){
    $tenkh=$_POST['tenkhachhangS'];
    $pass=$_POST['matkhauS'];
    $dienthoai=$_POST['dienthoaiS'];
    $diachi=$_POST['diachinhanS'];
    if(isset($_POST['sua'])){
        $sql_ten = "update dangky set tenkhachhang='$tenkh' where id_khachhang = '$_GET[id]'";
        $sql_mk = "update dangky set matkhau='$pass' where id_khachhang = '$_GET[id]'";
        $sql_dt = "update dangky set dienthoai='$dienthoai' where id_khachhang = '$_GET[id]'";
        $sql_dc = "update dangky set diachinhan='$diachi' where id_khachhang = '$_GET[id]'";
        mysqli_query($conn,$sql_ten);
        mysqli_query($conn,$sql_mk);
        mysqli_query($conn,$sql_dt);
        mysqli_query($conn,$sql_dc);
        header('location: ../../index.php?quanly=userInfo');
	}else{
      
    } 
}
    ?>
