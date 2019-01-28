
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
    die("Connection failed: " . mysqli_connect_error());
}
 echo "<marquee>Hưng - Thịnh - Cam chào quý khách</marquee>";
// mysqli_close($conn);
?>

<?php

	$sql_loai="select * from loaisp order by idloaisp asc";
	$row_loai=mysqli_query($conn,$sql_loai);
?>
<div class="box_list">
            <div class="tieude">
            	<h3>Loại phụ kiện</h3>
            </div>
            	<ul class="list">
                <?php
				while($dong_loai=mysqli_fetch_array($row_loai, MYSQLI_BOTH)){
				?>
                	<li><a href="index.php?quanly=loaisp&id=<?php echo $dong_loai['idloaisp'] ?>"><?php echo $dong_loai['tenloaisp'] ?></a></li>
                  <?php
				}
				  ?>
                </ul>
                </div><!--Ket thuc div box loai phu kien -->
               <?php
	$sql_hieu="select * from hieusp order by idhieusp asc";
	$row_hieu=mysqli_query($conn,$sql_hieu);
?>
                <div class="box_list">
            <div class="tieude">
            	<h3>Thương hiệu</h3>
            </div>
            	<ul class="list">
                <?php
				while($dong_hieu=mysqli_fetch_array($row_hieu,MYSQLI_BOTH)){
				?>
                	<li><a href="index.php?quanly=hieusp&id=<?php echo $dong_hieu['idhieusp'] ?>"><?php echo $dong_hieu['tenhieusp'] ?></a></li>
                  <?php
				}
				  ?>
                </ul>
                </div><!--Ket thuc div box thuong hieu -->
                 <div class="box_list">
                 <?php
				 	$sql=mysqli_query($conn,"select * from tintuc");
					
				 ?>
                   <div class="tieude">
            	<h3>Tin tức sản phẩm</h3>
            		</div>
            	<ul class="tintucsp">	
                <?php
				while($dong_tin=mysqli_fetch_array($sql,MYSQLI_BOTH)){
				?>
                	<li><a href="#">
                    	<p style="float:left;"><img src="admincp/modules/quanlytintuc/uploads/<?php echo $dong_tin['hinhanh'] ?>" width="40" height="30" /></p>
                        <p style="overflow:hidden;padding-left:5px;"><?php echo $dong_tin['tentintuc'] ?></p>
                    </a></li>
                    <?php
				}
					?>
                </ul>
                </div><!--Ket thuc div box tin tức -->