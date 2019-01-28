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
if(!empty($_POST['diachi']) ){
    $diachi=$_POST['diachi'];
    if(isset($_POST['sua'])){
        $sql_dc = "update dangky set diachinhan='$diachi' where id_khachhang = '$_GET[id]'";
        mysqli_query($conn,$sql_dc);
        header('location: ../../index.php?quanly=dathang');
	}else{
      
    } 
}
    ?>
