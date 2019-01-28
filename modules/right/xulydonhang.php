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

	if(isset($_POST['sua'])){	
		// 
	}else{
		$sql_xoa = "delete from cart_detail where cart_id = $_GET[id]";
		mysqli_query($conn,$sql_xoa);
		 header('location: ../../index.php?quanly=donhang');
	}
?>

