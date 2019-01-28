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
$id = $_POST['idsp'];
$star = $_POST['sao'];

if(!empty($_POST['sao'] && $_POST['idsp'])){

/////////////////////////////////////
    if(isset($_POST['danhgia'])){
        if($star == 1 ){
            $sql_mot = "update star set mot = mot + 1 where idsanpham = '$_GET[id]' ";
            mysqli_query($conn,$sql_mot);
        }
        if($star == 2 ){
            $sql_hai = "update star set hai= hai + 1 where idsanpham = '$_GET[id]' ";
             mysqli_query($conn,$sql_hai);
        }
        if($star == 3 ){
            $sql_ba = "update star set ba = ba + 1 where idsanpham = '$_GET[id]' ";
            mysqli_query($conn,$sql_ba);
        }
        if($star == 4 ){
            $sql_bon = "update star set bon = bon + 1 where idsanpham = '$_GET[id]' ";
             mysqli_query($conn,$sql_bon);
        }
        if($star == 5 ){
            $sql_nam = "update star set nam = nam + 1 where idsanpham = '$_GET[id]' ";
            mysqli_query($conn,$sql_nam);
        }
        
           header('location: ../../index.php?quanly=spmoi');
    } 
}
?>
