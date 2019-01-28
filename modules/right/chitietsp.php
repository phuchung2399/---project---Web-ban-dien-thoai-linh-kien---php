
<?php
// fun dem
function dem_lan_xem($ma)
    {
        $countS =0;
        include('admincp/modules/config.php');
        $ma= intval($ma);
        $sql = "UPDATE sanpham SET product_thongke = product_thongke+1 WHERE idsanpham = $ma ";
        mysqli_query($conn,$sql);
        return;
    }
?>
<!---css cho đánh giá sao -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 100%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 100%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 100%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 100%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 100%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
<?php
    $sqls="select * from star where idsanpham='$_GET[id]'";
	$nums=mysqli_query($conn,$sqls);
	$dongs =mysqli_fetch_array($nums);
	
?>
<!-- ket thuc css cho đánh giá sao -->
<!-- ----------------------------- -->
<!--  css cho đánh giá sao -->
<style>
.comment-form-container {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.input-row {
    margin-bottom: 20px;
}

.input-field {
    width: 100%;
    border-radius: 2px;
    padding: 10px;
    border: #e0dfdf 1px solid;
}

.btn-submit {
    padding: 10px 20px;
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor:pointer;
}

ul {
    list-style-type: none;
}

.comment-row {
    border-bottom: #e0dfdf 1px solid;
    margin-bottom: 15px;
    padding: 15px;
}

.outer-comment {
    background: #F0F0F0;
    padding: 20px;
    border: #dedddd 1px solid;
}

span.commet-row-label {
    font-style: italic;
}

span.posted-by {
    color: #09F;
}

.comment-info {
    font-size: 0.8em;
}
.comment-text {
    margin: 10px 0px;
}
.btn-reply {
    font-size: 0.8em;
    text-decoration: underline;
    color: #888787;
    cursor:pointer;
}
#comment-message {
    margin-left: 20px;
    color: #189a18;
    display: none;
}
</style>
<script src="modules/right/jquery-3.2.1.min.js"></script>
</head> 
<?php
    $sql="select * from sanpham where idsanpham='$_GET[id]'";
    $idd = 0;
	$idd = $_GET['id'];
	$num=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($num);
	
?>
	<div class="tieude">Chi tiết sản phẩm</div>
   
                	<div class="box_chitietsp">
                    	<div class="box_hinhanh">
                        	<img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" data-zoom-image="imgs/op-lung-sony-z3-pelosi-50.jpg"  width="200" height="200" />
                            <?php
                            $sql_gallery=mysqli_query($conn,'select * from gallery where id_sp="$_GET[id]" limit 3');							
							$row_gallery=mysqli_num_rows($sql_gallery);
							
							?>
                            <ul class="hinhanhphongto">
                           	<?php
							if($row_gallery>0){
								while($dong_gallery=mysqli_fetch_array($sql_gallery,MYSQLI_BOTH)){
							?>
                            	<li><img src="admincp/modules/gallery/uploads/<?php echo $dong_gallery['hinhanhsp'] ?>" id="zoom_01" width="70" height="70" /></li>
                              <?php
								}
							}else{
								echo '<li><img src="admincp/modules/quanlysanpham/uploads/'.$dong['hinhanh'].'" id="zoom_01"  width="70" height="70" /></li>';
							
							}
							  ?>
                            </ul>
                        </div>
                        <div class="box_info">
                         <form action="update_cart.php?id=<?php echo $dong['idsanpham'] ?>" method="post" enctype="multipart/form-data">
                        	<p>
                            	<strong>Tên sản phẫm: </strong><em style="color:red"><?php echo $dong['tensp'] ?></em></p>

                                           <p><strong>Mã sản phẩm:</strong>  <?php echo $dong['masp'] ?> </p> 
                                           <p><strong>Giá bán:</strong><span style="color:red;"> <?php echo number_format($dong['giadexuat']).' '.'VNĐ'?></span></p> 
                                           <p style="text-decoration:underline;color:blue;"><strong> Tình trạng:</strong> Còn hàng </p> 
                                          
                                           <p><strong>Số lượng:</strong><input type="text" name="soluong" size="3" value="1" /></p>
										   <p><strong>Số lược xem:</strong> <?php dem_lan_xem($idd); echo $dong['product_thongke']?></p>
                                           	 <input type="submit" name="add_to_cart" value="Mua hàng" style="margin:10px;width:100px;height:40px;background:#9F6;color:#000;font-size:18px;border-radius:8px;" />                                 
                           </form>
                                       

                        </div><!-- Ket thuc box box_info -->
                    
                    </div><!-- Ket thuc box chitiet sp -->
     			
              		<div class="tabs_panel">
                    	<ul class="tabs">
                        	<li rel="panel1" class="active">Thông tin sản phẩm</li>
                            <li rel="panel2">Hình ảnh sản phẫm</li>
                            <li rel="panel3">Khách hàng đánh giá</li>
                        </ul>
                        <?php
					$sql_thongtinsp=mysqli_query($conn,"select * from sanpham where idsanpham='$_GET[id]'");
					$count_thongtinsp=mysqli_num_rows($sql_thongtinsp);
					if($count_thongtinsp>0){
					$dong_thongtinsp=mysqli_fetch_array($sql_thongtinsp,MYSQLI_BOTH);
					
				?>
                        <div id="panel1" class="panel active">
                        	<p><?php echo $dong_thongtinsp['noidung'] ?></p>
                        
                        </div>
                   <?php
					}else{
						echo '<p style="padding:30px;">Hiện chưa có thông tin chính thức</p>';
					}
				   ?>
                          <div id="panel2" class="panel">
                             <?php
					$sql_hinhanhsp=mysqli_query($conn,"select * from gallery where id_sp='$_GET[id]'");
					$count=mysqli_num_rows($sql_hinhanhsp);
					if($count>0){
					while($dong_hinhanhsp=mysqli_fetch_array($sql_hinhanhsp,MYSQLI_BOTH)){
						
				?>
                        	<p style="text-align:center;"><img src="admincp/modules/gallery/uploads/<?php echo $dong_hinhanhsp['hinhanhsp'] ?>" width="600" height="600" /></p>
                        <?php
					}
					}else{
						echo '<p>Chưa có hình ảnh</p>';
					}
						?>
                        </div>
                        
                          <div id="panel3" class="panel">
                          <span class="heading">1 = <span class="fa fa-star checked"></span>| 2 = <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>| 3 =<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>| 4 =<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>| 5= <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
                          </span>
<!-- dang gia-->                        
<form action="modules/right/xulydanhgia.php?id=<?php echo $dong['idsanpham'] ?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td width="300">Đánh đánh giá</td>
    Mã sản phẩm:<input class="input-field" type="text" name="idsp" id="idsp" value="<?php echo $dong['idsanpham'] ?>"/>
    <td width="200"><input type="text" name="sao" placeholder="Nhập số sao" value=""></td>
  </tr>
  <tr>
    <td colspan="1"><div align="center">
    <input type="submit" name="danhgia" value="Đánh giá">
    </div></td>
  </tr>
</table>
</form>
<br>
<strong>Đánh giá trung của khách hàng:</strong>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo $dongs['nam'];?> </div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
  <div><?php echo $dongs['bon'];?> </div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
  <div><?php echo $dongs['ba'];?> </div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
  <div><?php echo $dongs['hai'];?> </div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
  <div><?php echo $dongs['mot'];?> </div>
  </div>
</div>
                        </div>
                    
                    </div>
                   <?php
				   	$sql_lienquan="select * from sanpham where loaisp='$_GET[idloaisp]' and sanpham.idsanpham<>$_GET[id] ";
					$row_lienquan=mysqli_query($conn,$sql_lienquan);
					$count_lienquan=mysqli_num_rows($row_lienquan);
					if($count_lienquan>0){
				   ?>
                    <div class="sanphamlienquan">
                   	<div class="tieude">Sản phẩm liên quan</div>
                    	<ul>
                        <?php
						
						while($dong_lienquan=mysqli_fetch_array($row_lienquan,MYSQLI_BOTH)){
						?>
                        		 <li><a href="?quanly=chitietsp&idloaisp=<?php echo $dong_lienquan['loaisp'] ?>&id=<?php echo $dong_lienquan['idsanpham'] ?>">
                        	<img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_lienquan['hinhanh'] ?>" width="150" height="150" />
                            <p>Tên sp : <?php echo $dong_lienquan['tensp'] ?></p>
                            <p style="color:red;">Giá : <?php echo number_format($dong_lienquan['giadexuat']).' '.'VNĐ' ?></p>
                            
                        	
                        </a></li>
                        <?php
						}
					?>
                        </ul>
                    </div><!-- Ket thuc box sp liên quan -->
            <?php
					}else{
						echo'<div class="tieude">Sản phẩm liên quan</div>';
						echo '<p style="padding:30px;">Hiện chưa có thêm sản phẩm nào</p>';
					}
			?>
			<br>
			<br>
			<div class="comment-form-container">
        <form id="frm-comment">
            <div class="input-row">
			<input type="hidden" name="idsp" id="idsp"
			value="<?php echo $dong['tensp'] ?>" /><input class="input-field"
                    type="text" name="idsp" id="idsp" value="<?php echo $dong['idsanpham'] ?>"/>

                <input type="hidden" name="comment_id" id="commentId"
                    placeholder="Name" /> <input class="input-field"
                    type="text" name="name" id="name" placeholder="Name" />
            </div>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment"
                    id="comment" placeholder="Add a Comment">  </textarea>
            </div>
            <div>
                <input type="button" class="btn-submit" id="submitButton"
                    value="Publish" /><div id="comment-message">Comments Added Successfully!</div>
            </div>

        </form>
    </div>
    <div id="output"></div>
    <script>
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
                   $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "modules/right/comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                            $("#comment-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#comment").val("");
                            $("#commentId").val("");
                           listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
            });
            
            $(document).ready(function () {
                   listComment();
            });

            function listComment() {
                $.post("modules/right/comment-list.php",
                        function (data) {
                               var data = JSON.parse(data);
                            
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                if (parent == "0")
                                {
                                    comments = "<div class='comment-row'>"+
                                    "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                                    "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                                    "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>"+
                                    "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }
            function listReplies(commentId, data, list) {
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='comment-row'>"+
                        " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>"+
                        "</div>";
                        var item = $("<li>").html(comments);
                        var reply_list = $('<ul>');
                        list.append(item);
                        item.append(reply_list);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }
        </script>
