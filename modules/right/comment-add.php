<?php
// $db_dir='';
$servername = "localhost";
$database = "demowebsite";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
$idsp = isset($_POST['idsp']) ? $_POST['idsp'] : "";
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderName = isset($_POST['name']) ? $_POST['name'] : "";
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO tbl_comment(idsanpham,parent_comment_id,comment,comment_sender_name,date) VALUES ('" .$idsp."','".$commentId . "','" . $comment . "','" . $commentSenderName . "','" . $date . "')";

$result = mysqli_query($conn, $sql);

if (! $result) {
    $result = mysqli_error($conn);
}
echo $result;
?>
